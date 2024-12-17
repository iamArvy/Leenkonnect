<?php

namespace App\Http\Controllers\Admin\Consultation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Consultation\Consultant;
use App\Http\Requests\Consultation\ConsultantRequest;
use App\Models\Consultation\Specialisation;
class ConsultantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $q = request()->query('q') ?? null;
        $s = request()->query('s') ?? null;
        $filters = [
            'q' =>$q,
            's' => $s
        ];

        $query = Consultant::with('specialisation')->latest() ?? null;
        if ($q) {
            $query->where('name', 'LIKE', "%{$q}%");
        }

        if ($s) {
            $query->where('specialisation_id' , '=' , $s);
        }

        // Get paginated results
        $consultants = $query->paginate(12)->withQueryString(); // Ensure query string persists
        return inertia('Admin/Consultation/Consultants', [
            'title' => 'Consultants',
            'consultants'=> $consultants,
            'specialisations' => Specialisation::all(),
            'filters' =>$filters,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ConsultantRequest $request)
    {
        $validated = $request->validated();
        Consultant::create($validated);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Consultant $consultant)
    {
        $validated = $request->validate([
            'name' => 'required',
            'specialisation_id' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        $consultant->update($validated);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Consultant $consultant)
    {
        $consultant->delete();
    }
}
