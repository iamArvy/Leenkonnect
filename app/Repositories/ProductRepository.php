<?php
namespace App\Repositories;

use App\Models\Store\Product;

class ProductRepository
{
    public function getAll()
    {
        return Product::all();
    }

    public function create(array $data)
    {
        return Product::create($data);
    }

    public function findById($id)
    {
        return Product::findOrFail($id);
    }

    public function update($id, array $data)
    {
        $product = Product::findOrFail($id);
        $product->update($data);
        return $product;
    }

    public function delete($id)
    {
        return Product::destroy($id);
    }

    /**
     * Apply scopes dynamically and return the result.
     *
     * @param array $scopes
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getWithScopes(array $scopes = [])
    {
        $query = $this->model->newQuery();

        foreach ($scopes as $scope => $parameters) {
            if (method_exists($this->model, 'scope' . ucfirst($scope))) {
                $query->{$scope}(...(array) $parameters);
            }
        }

        return $query->get();
    }
}
