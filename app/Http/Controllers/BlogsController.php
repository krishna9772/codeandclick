<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogsRequest;
use App\Http\Requests\UpdateBlogsRequest;
use App\Http\Resources\BlogResource;
use App\Models\Blogs;
use App\Http\Service\BlogsService;
use Illuminate\Support\Facades\Log;

class BlogsController extends Controller
{

    protected $blogsService;

    public function __construct(BlogsService $blogsService)
    {
        $this->blogsService = $blogsService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $tag = request('tag', '');
        $search = request('search', '');


        $blogs = new Blogs();

        if ($tag === 'trashed') {
            $blogs = $blogs->onlyTrashed();
        }

        if ($search) {
            $blogs = $blogs->where('title', 'like', '%' . $search . '%')->orWhere('content', 'like', '%' . $search . '%');
        }

        $blogs = $blogs->paginate(10);

        $startPage = max($blogs->currentPage() - 2, 1);
        $endPage = $startPage + 4;

        if ($endPage >= $blogs->lastPage()) {
            $endPage = $blogs->lastPage();
            $startPage = max($endPage - 4, 1);
        }

        $meta = [
            'current_page' => $blogs->currentPage(),
            'last_page' => $blogs->lastPage(),
            'pages' => range($startPage, $endPage),
        ];

        return view('Dashboard.Blogs.bloglist', compact('tag','blogs','search','meta'));
    
    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Dashboard.Blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogsRequest $request)
    {

        Log::info($request->all());
        $this->blogsService->store($request);

        return redirect()->route('bloglist.index')->with('success', 'Blog created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blogs $blogs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $blog = Blogs::findOrFail($id);

        
        return view('Dashboard.Blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogsRequest $request, $id)
    {
        $this->blogsService->update($request, $id);

        return redirect()->route('bloglist.index')->with('success', 'Blog updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->blogsService->delete($id);

        return redirect()->back()->with('success', 'Blog deleted successfully');
    }

    public function restore($id)
    {
        $this->blogsService->restore($id);

        return redirect()->back()->with('success', 'Blog restored successfully');
    }

    public function changeStatus($id)
    {
        $this->blogsService->changeStatus($id);

        return redirect()->back()->with('success', 'Blog status changed successfully');
    }

    
}
