<?php
namespace App\Services;

use Illuminate\Support\Facades\Storage;
class ImageService
{

    public function storeImage($image, $fpath)
    {
        $path = $image->store($fpath, 'public');
        return \Storage::url($path);
    }

    public function storeGallery($gallery, $fpath)
    {
        $galleryPaths = [];
        foreach ($gallery as $galleryFile) {
            $path = $galleryFile->store($fpath, 'public');
            $galleryPaths[] = \Storage::url($path);
        }
        return $galleryPaths;
    }

    public function updateImage($image, $currentImage, $fpath)
    {
        if ($currentImage)
        {
            $path = str_replace(Storage::url(''), '', $currentImage);
            if(\Storage::disk('public')->exists($path)) \Storage::disk('public')->delete($currentImage);
        }
        return $request->$image->store($fpath, 'public');
    }

    public function addToGallery($image, $currentGallery, $fpath)
    {
        $galleryPaths = $currentGallery ?? [];
        $path = $image->store($fpath, 'public');
        $galleryPaths[] = \Storage::url($path);
        return $galleryPaths;
    }

    public function removeFromGallery($image, $currentGallery)
    {
        $galleryPaths = $currentGallery ?? [];
        $path = str_replace(Storage::url(''), '', $image);
        if(\Storage::disk('public')->exists($path)) \Storage::disk('public')->delete($image);
        $key = array_search($image, $galleryPaths);
        unset($galleryPaths[$key]);
        return $galleryPaths;
    }

    public function deleteImage($currentImage)
    {

        if ($currentImage){
            $path = str_replace(Storage::url(''), '', $currentImage);
            if(\Storage::disk('public')->exists($path)) return \Storage::disk('public')->delete($currentImage);
        }
    }

    public function deleteGallery($currentGallery)
    {
        if ($currentGallery) {
            foreach ($currentGallery as $galleryFile) {
                $path = str_replace(Storage::url(''), '', $galleryFile);
                if(\Storage::disk('public')->exists($path)) return \Storage::disk('public')->delete($currentImage);
            }
        }
    }
}
