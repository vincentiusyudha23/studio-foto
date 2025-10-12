<?php

namespace App\Livewire;

use App\Models\Foto;
use Livewire\Component;
use App\Models\Pemesanan;
use Livewire\Attributes\On;
use App\Models\QRCodeGaleri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class KelolaFoto extends Component
{
    public $pesanan_id;
    public $bookingId;
    public $images = [];
    public $qrCode = null;

    protected $listeners = ['refreshImages' => '$refresh'];

    public function mount($pemesanan_id, $booking_id)
    {
        $this->pesanan_id = $pemesanan_id;
        $this->bookingId = $booking_id;
        
        $qrCode = QRCodeGaleri::where('pesanan_id', $this->pesanan_id)->first();

        if($qrCode){
            $this->qrCode = "https://api.qrserver.com/v1/create-qr-code/?size=300x300&data={$qrCode->link}";
        }

        $this->loadImage();
    }

    public function loadImage()
    {
        $this->images = Foto::where('pesanan_id', $this->pesanan_id)->get()->toArray();
    }

    public function imagesUpdate()
    {
        $this->loadImage();
    }

    public function uploadImage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pesanan_id' => 'required',
            'images' => 'required|array',
            'images.*' => 'image|max:10240'
        ], [
            'images.*.max' => 'Foto tidak boleh lebih dari 10 MB'
        ]);

        if($validator->fails()){
            return response()->json([
                'type' => 'error',
                'msg' => $validator->errors()->all()
            ], 422);
        }

        try{
            if($request->images){
                $pesanan = Pemesanan::find($request->pesanan_id);

                foreach ($request->images as $image) {
                    $cloud = Cloudinary::upload($image->getRealPath(), [
                        'folder' => 'booking-'.$pesanan->bookingFormattedId()
                    ]);
        
                    Foto::create([
                        'pesanan_id' => $request->pesanan_id,
                        'public_id' => $cloud->getPublicId(),
                        'title' => $image->getClientOriginalName(),
                        'image' => $cloud->getSecurePath()
                    ]);
                }
            }

            return response()->json([
                'type' => 'success',
                'msg' => 'Upload Foto Berhasil.'
            ], 200);

        } catch (\Exception $e){
            return response()->json([
                'type' => 'error',
                'msg' => $e->getMessage()
            ], 422);
        }
        
    }

    public function deleteImage($id)
    {
        $image = Foto::find($id);

        Cloudinary::destroy($image->public_id);

        $image->delete();
        
        $this->loadImage();
    }

    public function download($id)
    {
        $image = Foto::find($id);

        return response()->streamDownload(function() use ($image){
            echo file_get_contents($image->image);
        }, $image->title);
    }

    #[On('generateQRCode')]
    #[Renderless]
    public function generateQRCode()
    {
        $data = QRCodeGaleri::updateOrCreate([
            'pesanan_id' => $this->pesanan_id,
        ], [
            'pesanan_id' => $this->pesanan_id,
            'link' => 'www',
            'status' => 1,
            'expired_at' => now()->addHours(24)
        ]);

        if($data){
            $data->link = route('customer.galeri-umum', ['id' => $data->id]);
            $data->save();
        }

        $qrCode = "https://api.qrserver.com/v1/create-qr-code/?size=300x300&data={$data->link}";

        $this->dispatch('off-generateQRCode', $qrCode);
    }

    public function placeholder()
    {
        return view('livewire.placeholder.skeleton');
    }
    
    public function render()
    {
        return view('livewire.kelola-foto');
    }
}
