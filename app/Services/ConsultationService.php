<?php
namespace App\Services;

use App\Repositories\ConsultationServiceRepository;

class ConsultationService
{
    protected $consultationServiceRepository;

    public function __construct(ConsultationServiceRepository $consultationServiceRepository)
    {
        $this->consultationServiceRepository = $consultationServiceRepository;
    }

    public function createService($data)
    {
        return $this->consultationServiceRepository->create($data);
    }

    public function getServiceById($id)
    {
        return $this->consultationServiceRepository->findById($id);
    }

    public function getAllServices()
    {
        return $this->consultationServiceRepository->getAll();
    }
}
