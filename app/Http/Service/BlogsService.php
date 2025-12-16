<?php

namespace App\Http\Service;

use App\Models\Blogs;

class BlogsService
{
    public function store($request)
    {

        $request->merge([
            'user_id' => auth()->user()->id,
        ]);

        $blog = Blogs::create($request->except('image'));

        if ($request->hasFile('image')) {
            $blog->addMediaFromRequest('image')->toMediaCollection('blog_images');
        }

        return true;

    }

    public function restore($id)
    {
        $blog = Blogs::withTrashed()->find($id);

        if ($blog->trashed()) {
            $blog->restore();
        }

        return true;
    }

    public function update($request, $id)
    {
        $blog = Blogs::find($id);

        $blog->update($request->except('image'));

        if ($request->hasFile('image')) {
            if ($blog->hasMedia('blog_images')) {
                $blog->getFirstMedia('blog_images')->delete();
            }
            $blog->addMediaFromRequest('image')->toMediaCollection('blog_images');
        }

        return true;

    }

    public function changeStatus($id)
    {
        $blog = Blogs::find($id);

        $blog->update([
            'status' => $blog->status == 'published' ? 'draft' : 'published',
        ]);

        return true;
    }

    public function delete($id)
    {
        $blog = Blogs::withTrashed()->find($id);

        $blog->getFirstMedia('blog_images')->delete();

        if ($blog->trashed()) {
            $blog->forceDelete();
        } else {
            $blog->delete();
        }

        return true;
    }
}
