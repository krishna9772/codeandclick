<?php

namespace App\Http\Service;

use App\Models\Service;

class ServiceService
{
    public function store($data)
    {
        $service = Service::create($data->except('image'));

        if ($data->hasFile('image')) {
            $service->addMediaFromRequest('image')->toMediaCollection('services');
        }

        return true;
    }

    public function update($data, $id)
    {
        $service = Service::find($id);

        $service->update($data->except('image'));

        if ($data->hasFile('image')) {
            if ($service->hasMedia('services')) {
                $service->getFirstMedia('services')->delete();
            }
            $service->addMediaFromRequest('image')->toMediaCollection('services');
        }

        return true;
    }

    public function delete($id)
    {
        $service = Service::withTrashed()->find($id);


        if ($service->trashed()) {
            $service->forceDelete();
        } else {
            $service->delete();
        }

        return true;
    }

    public function restore($id)
    {
        $service = Service::withTrashed()->find($id);

        if ($service->trashed()) {
            $service->restore();
        }

        return true;
    }

    public function changeStatus($id)
    {
        $service = Service::find($id);

        $service->update([
            'status' => $service->status == 'published' ? 'draft' : 'published',
        ]);

        return true;
    }
}