<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\LandingPages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class LandingPage extends Component
{
    public $images = [];
    public $uploadedUrl;
    public $ranId;

    protected $listeners = ['refreshImages' => '$refresh'];

    public function mount()
    {
        $this->ranId = \Str::random(10);
        $this->loadImage();
    }

    public function loadImage()
    {
        $this->images = LandingPages::latest()->get()->toArray();
    }

    public function imagesUpdate()
    {
        $this->loadImage();
    }

    public function uploadImage(Request $request)
    {
        $validator = Validator::make($request->all(), [
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
                foreach ($request->images as $image) {
                    $cloud = Cloudinary::upload($image->getRealPath(), [
                        'folder' => 'landing-page'
                    ]);
        
                    $data = LandingPages::create([
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
            ]);
        }
        
    }

    public function deleteImage($id)
    {
        $image = landingPages::find($id);

        Cloudinary::destroy($image->public_id);

        $image->delete();
        
        $this->loadImage();
    }

    public function download($id)
    {
        $image = LandingPages::find($id);

        return response()->streamDownload(function() use ($image){
            echo file_get_contents($image->image);
        }, $image->title);
    }

    public function placeholder()
    {
        return view('livewire.placeholder.skeleton');
    }

    public function render()
    {
        return view('livewire.landing-page');
    }
}
