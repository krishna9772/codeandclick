<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Http\Service\ServiceService;
use App\Models\Service;
use App\Models\Venture;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $serviceService;

    public function __construct(ServiceService $serviceService)
    {
        $this->serviceService = $serviceService;
    }

    public function index()
    {
       $tag = request('tag', '');
        $search = request('search', '');

        $services = new Service();

        if ($tag === 'trashed') {
            $services = $services->onlyTrashed();
        }

        if ($search) {
            $services = $services->where('name', 'like', '%' . $search . '%')->orWhere('link', 'like', '%' . $search . '%');
        }

        $services = $services->orderBy('created_at', 'desc')->paginate(10);

        $startPage = max($services->currentPage() - 2, 1);
        $endPage = $startPage + 4;

        if ($endPage >= $services->lastPage()) {
            $endPage = $services->lastPage();
            $startPage = max($endPage - 4, 1);
        }

        $meta = [
            'current_page' => $services->currentPage(),
            'last_page' => $services->lastPage(),
            'pages' => range($startPage, $endPage),
        ];

       return view('Dashboard.Services.index', compact('tag', 'search','services','meta'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Dashboard.Services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceRequest $request)
    {
        $this->serviceService->store($request);

        return redirect()->route('services.index')->with('success', 'Service created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $service = Service::find($id);

        return view('Dashboard.Services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceRequest $request, string $id)
    {
        $this->serviceService->update($request, $id);

        return redirect()->route('services.index')->with('success', 'Service updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->serviceService->delete($id);

        return redirect()->back()->with('success', 'Service deleted successfully');
    }

    public function changeStatus($id)
    {
        $this->serviceService->changeStatus($id);

        return redirect()->back()->with('success', 'Service status changed successfully');
    }

    public function restore($id)
    {
        $this->serviceService->restore($id);

        return redirect()->back()->with('success', 'Service restored successfully');
    }
}
