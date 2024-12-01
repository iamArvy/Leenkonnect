<?php
namespace App\Services;

use App\Repositories\TestimonialRepository;

class TestimonialService
{
    protected $testimonialRepository;

    public function __construct(TestimonialRepository $testimonialRepository)
    {
        $this->testimonialRepository = $testimonialRepository;
    }

    public function createTestimonial($data)
    {
        return $this->testimonialRepository->create($data);
    }

    public function getAllTestimonials()
    {
        return $this->testimonialRepository->getAll();
    }

    public function getTestimonialById($id)
    {
        return $this->testimonialRepository->findById($id);
    }
}
