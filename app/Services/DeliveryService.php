<?php
namespace App\Services;

use App\Repositories\DeliveryRepository;

class DeliveryService
{
    protected $deliveryRepository;

    public function __construct(DeliveryRepository $deliveryRepository)
    {
        $this->deliveryRepository = $deliveryRepository;
    }

    public function createDelivery($data)
    {
        return $this->deliveryRepository->create($data);
    }

    public function updateDeliveryStatus($deliveryId, $status)
    {
        return $this->deliveryRepository->updateStatus($deliveryId, $status);
    }

    public function getDeliveryByOrderId($orderId)
    {
        return $this->deliveryRepository->findByOrderId($orderId);
    }
}
