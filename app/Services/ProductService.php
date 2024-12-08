<?php
namespace App\Services;

use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Storage;
class ProductService
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getAllProducts()
    {
        return $this->productRepository->getAll();
    }

    public function createProduct($data)
    {
        return $this->productRepository->create($data);
    }

    public function getProductById($id)
    {
        return $this->productRepository->findById($id);
    }

    public function updateProduct($id, $data)
    {
        return $this->productRepository->update($id, $data);
    }

    public function deleteProduct($id)
    {
        return $this->productRepository->delete($id);
    }

    public function storeImage($image)
    {
        $path = $image->store('products/images', 'public');
        return \Storage::url($path);
    }

    public function storeGallery($gallery)
    {
        $galleryPaths = [];
        foreach ($gallery as $galleryFile) {
            $path = $galleryFile->store('products/gallery', 'public');
            $galleryPaths[] = \Storage::url($path);
        }
        return $galleryPaths;
    }

    public function updateImage($image, $currentImage)
    {
        if ($currentImage)
        {
            $path = str_replace(Storage::url(''), '', $currentImage);
            if(\Storage::disk('public')->exists($path)) \Storage::disk('public')->delete($currentImage);
        }
        return $request->$image->store('products', 'public');
    }

    public function addToGallery($image, $currentGallery)
    {
        $galleryPaths = $currentGallery ?? [];
        $path = $image->store('products/gallery', 'public');
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
