<?php
namespace App\Services;

use App\Repositories\CartRepository;
use Session;

class CartService
{
    protected $cartRepository;

    public function __construct(CartRepository $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    public function addProductToCart($product, $quantity)
    {

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
