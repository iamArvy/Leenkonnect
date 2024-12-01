<?php
namespace App\Repositories;

use App\Models\Testimonial;

class TestimonialRepository
{
    public function create(array $data)
    {
        return Testimonial::create($data);
    }

    public function getAll()
    {
        return Testimonial::all();
    }

    public function findById($id)
    {
        return Testimonial::findOrFail($id);
    }
}
