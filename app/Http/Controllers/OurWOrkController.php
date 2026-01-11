<?php

namespace App\Http\Controllers;

use App\Http\Requests\OurWorkRequest;
use App\Http\Service\OurWorkServices;
use App\Models\OurWork;
use App\Models\Service;
use Illuminate\Http\Request;

class OurWOrkController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $ourWorkService;

    public function __construct(OurWorkServices $ourWorkService)
    {
        $this->ourWorkService = $ourWorkService;
    }

    public function index()
    {
        $tag = request('tag', '');
        $search = request('search', '');

        $works = new OurWork();

        if ($tag === 'trashed') {
            $works = $works->onlyTrashed();
        }

        if ($search) {
            $works = $works->where('title', 'like', '%' . $search . '%');
        }

        $works = $works->orderBy('created_at', 'desc')->paginate(10);

        $startPage = max($works->currentPage() - 2, 1);
        $endPage = $startPage + 4;

        if ($endPage >= $works->lastPage()) {
            $endPage = $works->lastPage();
            $startPage = max($endPage - 4, 1);
        }

        $meta = [
            'current_page' => $works->currentPage(),
            'last_page' => $works->lastPage(),
            'pages' => range($startPage, $endPage),
        ];

        return view('Dashboard.OurWork.index', compact('tag', 'search', 'works', 'meta'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $services = Service::query()->where('status', 'published')->get();

        return view('Dashboard.OurWork.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OurWorkRequest $request)
    {
        $this->ourWorkService->store($request);

        return redirect()->route('our-work.index')->with('success', 'Service created successfully');
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
        $ourwork = OurWork::find($id);
        $services = Service::query()->where('status', 'published')->get();

   return view('Dashboard.OurWork.edit', compact('services','ourwork'));
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OurWorkRequest $request, string $id)
    {
          $this->ourWorkService->update($request, $id);

        return redirect()->route('services.index')->with('success', 'Service updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
           $this->ourWorkService->delete($id);

        return redirect()->back()->with('success', 'Our Work deleted successfully');
 
    }

     public function changeStatus($id)
    {
        $this->ourWorkService->changeStatus($id);

        return redirect()->back()->with('success', 'Our Work status changed successfully');
    }

    public function restore($id)
    {
        $this->ourWorkService->restore($id);

        return redirect()->back()->with('success', 'Our Work restored successfully');
    }
}
