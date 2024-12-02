<?php
namespace App\Repositories;
use App\Models\Product;

class CartRepository
{
    protected $cart;

    public function __construct()
    {
        $this->cart = session()->get('cart', []);
    }

    public function all()
    {
        $productIds = array_column($this->cart, 'id');
        $products = Product::whereIn('id', $productIds)->get(['id', 'name', 'image', 'price']);
         // Map over products and add quantity and total
        $items = collect($this->cart)->map(function ($cartItem) use ($products) {
            $product = $products->firstWhere('id', $cartItem['id']); // Find corresponding product
            if ($product) {
                $product->quantity = $cartItem['quantity'];
                $product->total = $product->price * $product->quantity;
                return $product->toArray(); // Convert to array
            }
        });

        // Remove any null values and return as an array
        return $items->filter()->values()->toArray();
    }

    public function create($id, $quantity)
    {
        $this->cart[$id] = [
            'id' => $id,
            'quantity' => $quantity,
        ];
        return session()->put('cart', $this->cart);
    }
    public function checkIfProductExists($id)
    {
        if (!isset($this->cart[$id])) {
            return false;
        }
        return true;
    }

    public function changeQuantity($id, $quantity)
    {
        $this->cart[$id] = [
            'quantity' => $quantity,
        ];
        return session()->put('cart', $this->cart);
    }

    public function delete($id)
    {
        unset($this->cart[$id]);
        return session()->put('cart', $this->cart);
    }

    public function clear()
    {
        session()->forget('cart');
    }
}
