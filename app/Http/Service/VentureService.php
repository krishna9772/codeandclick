<?php

namespace App\Http\Service;

use App\Models\Venture;

class VentureService
{
    public function store($request)
    {

        

        $venture = Venture::create($request->except('image'));

        if ($request->hasFile('image')) {
            $venture->addMediaFromRequest('image')->toMediaCollection('ventures');
        }

        return true;

    }

    public function restore($id)
    {
        $blog = Venture::withTrashed()->find($id);

        if ($blog->trashed()) {
            $blog->restore();
        }

        return true;
    }

    public function update($request, $id)
    {
        $blog = Venture::find($id);

        $blog->update($request->except('image'));

        if ($request->hasFile('image')) {
            if ($blog->hasMedia('ventures')) {
                $blog->getFirstMedia('ventures')->delete();
            }
            $blog->addMediaFromRequest('image')->toMediaCollection('ventures');
        }

        return true;

    }

    public function changeStatus($id)
    {
        $blog = Venture::find($id);

        $blog->update([
            'status' => $blog->status == 'published' ? 'draft' : 'published',
        ]);

        return true;
    }

    public function delete($id)
    {
        $blog = Venture::withTrashed()->find($id);

        if ($blog->trashed()) {
            $blog->forceDelete();
        } else {
            $blog->delete();
        }

        return true;
    }
}
