<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use App\Http\Service\BlogsService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
            $blogs = $blogs->where('title', 'like', '%' . $search . '%')
                ->orWhere('title_mm', 'like', '%' . $search . '%')
                ->orWhere('content', 'like', '%' . $search . '%')
                ->orWhere('content_mm', 'like', '%' . $search . '%');
        }

        $blogs = $blogs->orderBy('created_at', 'desc')->paginate(10);

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
        $blogTypes = config('base.blog_types');

        return view('Dashboard.Blogs.create', compact('blogTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
            'title' => 'required|string|max:255',
            'title_mm' => 'nullable|string|max:255',
            'type' => 'required|array|min:1',
            'type.*' => 'required|string|in:' . implode(',', config('base.blog_types')),
            'content' => 'required|string',
            'content_mm' => 'nullable|string',
        ], [
            'image.required' => 'The image field is required.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
            'image.max' => 'The image may not be greater than 5120 kilobytes.',
            'title.required' => 'The title field is required.',
            'type.required' => 'Please select at least one type.',
            'type.array' => 'The type field format is invalid.',
            'type.min' => 'Please select at least one type.',
            'type.*.in' => 'One of the selected types is invalid.',
            'content.required' => 'The content field is required.',
        ]);

        $preview = $this->buildPreview($validated['content']);

        $previewMm = filled($validated['content_mm'] ?? null)
            ? $this->buildPreview($validated['content_mm'])
            : null;

        $blog = Blogs::create([
            'user_id' => auth()->id(),
            'title' => $validated['title'],
            'title_mm' => $validated['title_mm'] ?? null,
            'type' => implode(',', $validated['type']),
            'content' => $validated['content'],
            'content_mm' => $validated['content_mm'] ?? null,
            'preview' => $preview,
            'preview_mm' => $previewMm,
            'status' => 'published',
        ]);

        if ($request->hasFile('image')) {
            $blog->addMediaFromRequest('image')->toMediaCollection('blog_images');
        }

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
        $blogTypes = config('base.blog_types');
        $selectedTypes = array_filter(array_map('trim', explode(',', (string) $blog->type)));

        return view('Dashboard.Blogs.edit', compact('blog', 'blogTypes', 'selectedTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'title' => 'required|string|max:255',
            'title_mm' => 'nullable|string|max:255',
            'type' => 'required|array|min:1',
            'type.*' => 'required|string|in:' . implode(',', config('base.blog_types')),
            'content' => 'required|string',
            'content_mm' => 'nullable|string',
        ], [
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
            'image.max' => 'The image may not be greater than 5120 kilobytes.',
            'title.required' => 'The title field is required.',
            'type.required' => 'Please select at least one type.',
            'type.array' => 'The type field format is invalid.',
            'type.min' => 'Please select at least one type.',
            'type.*.in' => 'One of the selected types is invalid.',
            'content.required' => 'The content field is required.',
        ]);

        $blog = Blogs::findOrFail($id);

        $blog->update([
            'title' => $validated['title'],
            'title_mm' => $validated['title_mm'] ?? null,
            'type' => implode(',', $validated['type']),
            'content' => $validated['content'],
            'content_mm' => $validated['content_mm'] ?? null,
            'preview' => $this->buildPreview($validated['content']),
            'preview_mm' => filled($validated['content_mm'] ?? null)
                ? $this->buildPreview($validated['content_mm'])
                : null,
        ]);

        if ($request->hasFile('image')) {
            if ($blog->hasMedia('blog_images')) {
                $blog->getFirstMedia('blog_images')->delete();
            }

            $blog->addMediaFromRequest('image')->toMediaCollection('blog_images');
        }

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

    private function buildPreview(string $content): string
    {
        $plainText = html_entity_decode(strip_tags($content), ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $plainText = preg_replace('/\s+/u', ' ', trim($plainText));
        $plainText = $plainText ?? '';

        return mb_strimwidth($plainText, 0, 240, '...', 'UTF-8');
    }
}
