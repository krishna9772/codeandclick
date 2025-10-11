<?php

namespace App\Http\Service;

use App\Models\Career;

class CareerService
{
    public function store($request)
    {

        $career = Career::create($request->all());

        return true;

    }

    public function restore($id)
    {
        $career = Career::withTrashed()->find($id);

        if ($career->trashed()) {
            $career->restore();
        }

        return true;
    }

    public function update($request, $id)
    {
        $career = Career::find($id);

        $career->update($request->all());

        return true;

    }

    public function changeStatus($id)
    {
        $career = Career::find($id);

        $career->update([
            'status' => $career->status == 'published' ? 'draft' : 'published',
        ]);

        return true;
    }

    public function delete($id)
    {
        $career = Career::withTrashed()->find($id);

        if ($career->trashed()) {
            $career->forceDelete();
        } else {
            $career->delete();
        }

        return true;
    }
}
