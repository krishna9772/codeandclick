<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestimornialRequest;
use App\Http\Service\TestimornialService;
use App\Models\Testimornial;
use Illuminate\Http\Request;

class TestimornialController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $testimornialService;
    public function __construct(TestimornialService $testimornialService)
    {
        $this->testimornialService = $testimornialService;
    }
    
    public function index(Request $request)
    {

        $search = request('search', '');

        $testimornials = Testimornial::where('name', 'like', '%' . $search . '%')->get();
        return view('Dashboard.Testimornial.index', compact( 'testimornials', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Dashboard.Testimornial.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TestimornialRequest $request)
    {
        $testimornial = $this->testimornialService->store($request);
        return redirect()->route('testimornials.index')->with('success', 'Testimornial created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $testimornial = Testimornial::findOrFail($id);
        return view('Dashboard.Testimornial.edit', compact('testimornial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->testimornialService->update($request, $id);
        return redirect()->route('testimornials.index')->with('success', 'Testimornial updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->testimornialService->delete($id);
        return redirect()->back()->with('success', 'Testimornial deleted successfully');
    }
}
