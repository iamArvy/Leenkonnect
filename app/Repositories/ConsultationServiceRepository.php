<?php
namespace App\Repositories;

use App\Models\ConsultationService;

class ConsultationServiceRepository
{
    public function create(array $data)
    {
        return ConsultationService::create($data);
    }

    public function findById($id)
    {
        return ConsultationService::findOrFail($id);
    }

    public function getAll()
    {
        return ConsultationService::all();
    }
}
