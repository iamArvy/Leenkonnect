<?php
namespace App\Repositories;

use App\Models\Order;

class OrderRepository
{
    public function getAll()
    {
        return Order::with('orderItems', 'user')->get();
    }

    public function create(array $data)
    {
        return Order::create($data);
    }

    public function findById($id)
    {
        return Order::with('orderItems', 'user')->findOrFail($id);
    }

    public function updateStatus($orderId, $status)
    {
        $order = Order::findOrFail($orderId);
        $order->status = $status;
        $order->save();
        return $order;
    }
}
