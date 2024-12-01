<?php
namespace App\Repositories;

use App\Models\Blog;

class BlogRepository
{
    public function create(array $data)
    {
        return Blog::create($data);
    }

    public function getAll()
    {
        return Blog::all();
    }

    public function findById($id)
    {
        return Blog::findOrFail($id);
    }

    public function update($id, array $data)
    {
        $blog = Blog::findOrFail($id);
        $blog->update($data);
        return $blog;
    }

    public function delete($id)
    {
        return Blog::destroy($id);
    }
}
