<?php

namespace App\Http\Service;

use App\Models\Testimornial;

class TestimornialService
{
    public function store($request)
    {

        $testimornial = Testimornial::create($request->except('image'));

        if ($request->hasFile('image')) {
            $testimornial->addMediaFromRequest('image')->toMediaCollection('testimornials');
        }

        return true;
    }

     public function update($request, $id)
    {
        $testimornial = Testimornial::find($id);

        $testimornial->update($request->except('image'));

        if ($request->hasFile('image')) {
            if ($testimornial->hasMedia('testimornials')) {
                $testimornial->getFirstMedia('testimornials')->delete();
            }
            $testimornial->addMediaFromRequest('image')->toMediaCollection('testimornials');
        }

        return true;

    }
    
    public function delete($id)
    {
        $testimornial = Testimornial::find($id);

        $testimornial->getFirstMedia('testimornials')->delete();
        $testimornial->delete();

        return true;
    }
}