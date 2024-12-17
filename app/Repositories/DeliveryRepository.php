<?php
namespace App\Repositories;

use App\Models\Store\Delivery;

class DeliveryRepository
{
    public function create(array $data)
    {
        return Delivery::create($data);
    }

    public function updateStatus($deliveryId, $status)
    {
        $delivery = Delivery::findOrFail($deliveryId);
        $delivery->status = $status;
        $delivery->save();
        return $delivery;
    }

    public function findByOrderId($orderId)
    {
        return Delivery::where('order_id', $orderId)->first();
    }
}
