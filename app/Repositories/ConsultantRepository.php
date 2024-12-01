namespace App\Repositories;

use App\Models\Consultant;

class ConsultantRepository
{
    public function create(array $data)
    {
        return Consultant::create($data);
    }

    public function findById($id)
    {
        return Consultant::with('service')->findOrFail($id);
    }

    public function getAll()
    {
        return Consultant::all();
    }
}
