<?php
namespace App\Services;
use App\Models\Store\Product;
use App\Repositories\CartRepository;
// use Session;

class CartService
{
    protected $cartRepository;

    public function __construct(CartRepository $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    public function getCart(): array
    {
        // $cart = session()->get('cart', []);

        // // Add product details (e.g., price) to the cart items
        // foreach ($cart as &$item) {
        //     $product = Product::find($item['product_id']); // Assuming your cart stores product IDs
        //     if ($product) {
        //         $item['name'] = $product->name;
        //         $item['image'] = $product->image;
        //         $item['price'] = $product->price * $item['quantity'];
        //     }
        // }

        return $this->cartRepository->all();
    }

    public function add($id, $quantity)
    {
        $product = Product::find($id);
        if (!$product) throw new \Exception("Product not found");
        if ($product->stock == 0) throw new \Exception("Product is out of stock");
        if ($product->stock < $quantity) throw new \Exception("Not enough quantity available");
        if ($this->cartRepository->checkIfProductExists($id)) throw new \Exception("Product already exists in cart");
        return $this->cartRepository->create($id, $quantity);
    }

    public function updateProductQuantity($userId, $productId, $quantity)
    {
        return $this->cartRepository->updateQuantity($userId, $productId, $quantity);
    }

    public function transferGuestCartToUser($guestSessionId, $userId)
    {
        return $this->cartRepository->transferCart($guestSessionId, $userId);
    }

    public function getCartForUser($userId)
    {
        return $this->cartRepository->getUserCart($userId);
    }
}
