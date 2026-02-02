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
        $venture = Venture::withTrashed()->find($id);

        if ($venture->trashed()) {
            $venture->restore();
        }

        return true;
    }

    public function update($request, $id)
    {
        $venture = Venture::find($id);

        $venture->update($request->except('image'));

        if ($request->hasFile('image')) {
            if ($venture->hasMedia('ventures')) {
                $venture->getFirstMedia('ventures')->delete();
            }
            $venture->addMediaFromRequest('image')->toMediaCollection('ventures');
        }

        return true;

    }

    public function changeStatus($id)
    {
        $venture = Venture::find($id);

        $venture->update([
            'status' => $venture->status == 'published' ? 'draft' : 'published',
        ]);

        return true;
    }

    public function delete($id)
    {
        $venture = Venture::withTrashed()->find($id);

        if ($venture->trashed()) {
            $venture->getFirstMedia('ventures')->delete();
            $venture->forceDelete();
        } else {
            $venture->delete();
        }

        return true;
    }
}
