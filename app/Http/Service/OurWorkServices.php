<?php

namespace App\Http\Service;

use App\Models\OurWork;

class OurWorkServices
{
    public function store($data)
    {
        $ourwork = OurWork::create($data->except(['image', 'workImages']));

        if ($data->hasFile('image')) {
            $ourwork->addMediaFromRequest('image')->toMediaCollection('ourwork-header');
        }

        if ($data->hasFile('workImages')) {
            foreach ($data->file('workImages') as $image) {
                $ourwork
                    ->addMedia($image)
                    ->toMediaCollection('ourwork-images');
            }
        }

        return true;
    }

    public function update($data, $id)
    {

        $ourwork = OurWork::find($id);


        $ourwork->update($data->except(['image', 'workImages']));

        if ($data->hasFile('image')) {

            if ($ourwork->hasMedia('ourwork-header')) {
                $ourwork->getFirstMedia('ourwork-header')->delete();
            }

            $ourwork->addMediaFromRequest('image')->toMediaCollection('ourwork-header');
        }

        if ($data->hasFile('workImages')) {

            $ourwork->clearMediaCollection('ourwork-images');

            foreach ($data->file('workImages') as $image) {
                $ourwork
                    ->addMedia($image)
                    ->toMediaCollection('ourwork-images');
            }
        }

        return true;
    }

    public function delete($id)
    {
        $service = OurWork::withTrashed()->find($id);


        if ($service->trashed()) {
            $service->forceDelete();
        } else {
            $service->delete();
        }

        return true;
    }

    public function restore($id)
    {
        $service = OurWork::withTrashed()->find($id);

        if ($service->trashed()) {
            $service->restore();
        }

        return true;
    }

    public function changeStatus($id)
    {
        $service = OurWork::find($id);

        $service->update([
            'status' => $service->status == 'published' ? 'draft' : 'published',
        ]);

        return true;
    }
}
