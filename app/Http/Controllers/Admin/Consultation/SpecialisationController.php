<?php

namespace App\Http\Controllers\Admin\Consultation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Consultation\Specialisation;
use App\Http\Requests\Consultation\SpecialisationRequest;
class SpecialisationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $q = request()->query('q') ?? null;
        $filters = [
            'q' =>$q,
        ];

        $query = Specialisation::latest() ?? null;
        if ($q) {
            $query->where('name', 'LIKE', "%{$q}%");
        }

        // Apply price range filter
        // if ($priceRange) {
        //     [$minPrice, $maxPrice] = explode('-', $priceRange);
        //     $query->whereBetween('price', [(float)$minPrice, (float)$maxPrice]);
        // }

        // Get paginated results
        $specialisations = $query->paginate(12)->withQueryString(); // Ensure query string persists
        return inertia('Admin/Consultation/Specialisations', [
            'title' => 'Specialisations',
            'specialisations'=> $specialisations,
            'filters' =>$filters,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SpecialisationRequest $request)
    {
        $validated = $request->validated();
        Specialisation::create($validated);
        return back()->with('message', 'Specialisation created successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Specialisation $specialisation)
    {
        $validated = $request->validated();
        $specialisation->update($validated);
        return back()->with('message', 'Specialisation updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Specialisation $specialisation)
    {
        $specialisation->delete();
        return back()->with('message', 'Specialisation deleted successfully');
    }
}
