<?php
namespace App\Services;

use App\Repositories\ConsultantRepository;

class ConsultantService
{
    protected $consultantRepository;

    public function __construct(ConsultantRepository $consultantRepository)
    {
        $this->consultantRepository = $consultantRepository;
    }

    public function createConsultant($data)
    {
        return $this->consultantRepository->create($data);
    }

    public function getConsultantById($id)
    {
        return $this->consultantRepository->findById($id);
    }

    public function getAllConsultants()
    {
        return $this->consultantRepository->getAll();
    }
}
