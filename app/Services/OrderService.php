<?php
namespace App\Services;

use App\Repositories\OrderRepository;

class OrderService
{
    protected $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function createOrder($data)
    {
        return $this->orderRepository->create($data);
    }

    public function updateOrderStatus($orderId, $status)
    {
        return $this->orderRepository->updateStatus($orderId, $status);
    }

    public function getOrderDetails($orderId)
    {
        return $this->orderRepository->findById($orderId);
    }

    public function getAllOrders()
    {
        return $this->orderRepository->getAll();
    }
}
