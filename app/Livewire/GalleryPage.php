<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\GalleryPages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class GalleryPage extends Component
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
        $this->images = GalleryPages::latest()->get()->toArray();
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

        if(GalleryPages::all()->count() >= 20){
            return response()->json([
                'type' => 'error',
                'msg' => 'Foto untuk galleri page sudah melebihi maksimal, sebanyak 20 Foto'
            ], 422);
        }

        try{
            if($request->images){
                foreach ($request->images as $image) {
                    $cloud = Cloudinary::upload($image->getRealPath(), [
                        'folder' => 'galeri-page'
                    ]);
        
                    GalleryPages::create([
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
        $image = GalleryPages::find($id);

        Cloudinary::destroy($image->public_id);

        $image->delete();
        
        $this->loadImage();
    }

    public function download($id)
    {
        $image = GalleryPages::find($id);

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
        return view('livewire.gallery-page');
    }
}
