<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCareerRequest;
use App\Http\Requests\UpdateCareerRequest;
use App\Http\Service\CareerService;
use App\Models\Career;
use Illuminate\Support\Facades\Log;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $careerService;

    public function __construct(CareerService $careerService)
    {
        $this->careerService = $careerService;
    }

    public function index()
    {
        $tag = request('tag', '');
        $search = request('search', '');

        $careers = new Career();

        if ($tag === 'trashed') {
            $careers = $careers->onlyTrashed();
        }

        if ($search) {
            $careers = $careers->where('title', 'like', '%' . $search . '%')->orWhere('ignite', 'like', '%' . $search . '%')->orWhere('role', 'like', '%' . $search . '%')->orWhere('responsibilities', 'like', '%' . $search . '%')->orWhere('requirements', 'like', '%' . $search . '%')->orWhere('benefits', 'like', '%' . $search . '%');
        }

        $careers = $careers->orderBy('created_at', 'desc')
            ->paginate(10);

        $startPage = max($careers->currentPage() - 2, 1);
        $endPage = $startPage + 4;

        if ($endPage >= $careers->lastPage()) {
            $endPage = $careers->lastPage();
            $startPage = max($endPage - 4, 1);
        }

        $meta = [
            'current_page' => $careers->currentPage(),
            'last_page' => $careers->lastPage(),
            'pages' => range($startPage, $endPage),
        ];

        return view('Dashboard.Careers.index', compact('careers', 'tag', 'search', 'meta'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Dashboard.Careers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCareerRequest $request)
    {


        $this->careerService->store($request);

        return redirect()->route('careers.index')->with('success', 'Career created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Career $career)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $career = Career::findOrFail($id);
        return view('Dashboard.Careers.edit', compact('career'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCareerRequest $request, $id)
    {
        $this->careerService->update($request, $id);

        return redirect()->route('careers.index')->with('success', 'Career updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->careerService->delete($id);

        return redirect()->back()->with('success', 'Career deleted successfully');
    }

    public function restore($id)
    {
        $this->careerService->restore($id);

        return redirect()->back()->with('success', 'Career restored successfully');
    }

    public function changeStatus($id)
    {

        $this->careerService->changeStatus($id);

        return redirect()->back()->with('success', 'Career status changed successfully');
    }
}
