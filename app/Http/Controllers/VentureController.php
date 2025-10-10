<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreventureRequest;
use App\Http\Requests\UpdateventureRequest;
use App\Http\Service\VentureService;
use App\Models\Venture;

class VentureController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     protected $ventureService;
    public function __construct(VentureService $ventureService)
    {
        $this->ventureService = $ventureService;
    }
    

    public function index()
    {
        $tag = request('tag', '');
        $search = request('search', '');

        $ventures = new Venture();

        if ($tag === 'trashed') {
            $ventures = $ventures->onlyTrashed();
        }

        if ($search) {
            $ventures = $ventures->where('title', 'like', '%' . $search . '%')->orWhere('content', 'like', '%' . $search . '%');
        }

        $ventures = $ventures->paginate(10);

        $startPage = max($ventures->currentPage() - 2, 1);
        $endPage = $startPage + 4;

        if ($endPage >= $ventures->lastPage()) {
            $endPage = $ventures->lastPage();
            $startPage = max($endPage - 4, 1);
        }

        $meta = [
            'current_page' => $ventures->currentPage(),
            'last_page' => $ventures->lastPage(),
            'pages' => range($startPage, $endPage),
        ];

       return view('Dashboard.Ventures.index', compact('tag', 'search','ventures','meta'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {



        return view('Dashboard.Ventures.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreventureRequest $request)
    {
        $this->ventureService->store($request);

        return redirect()->route('ventures.index')->with('success', 'Venture created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(venture $venture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $venture = Venture::findOrFail($id);
        return view('Dashboard.Ventures.edit', compact('venture'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateventureRequest $request, $id)
    {
        $this->ventureService->update($request, $id);

        return redirect()->route('ventures.index')->with('success', 'Venture updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->ventureService->delete($id);

        return redirect()->back()->with('success', 'Venture deleted successfully');
    }

    public function restore($id)
    {
        $this->ventureService->restore($id);

        return redirect()->back()->with('success', 'Venture restored successfully');
    }

    public function changeStatus($id)
    {
        $this->ventureService->changeStatus($id);

        return redirect()->back()->with('success', 'Venture status changed successfully');
    }
}
