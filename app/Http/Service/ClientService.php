<?php

namespace App\Http\Service;

use App\Models\Client;

class ClientService
{
    public function store($request)
    {

    
        $client = Client::create($request->except('image'));

        if ($request->hasFile('image')) {
            $client->addMediaFromRequest('image')->toMediaCollection('clients');
        }

        return true;

    }

    public function destroy($id)
    {
        $client = Client::findOrFail($id);

        $client->getFirstMedia('clients')->delete();

        $client->delete();

        return true;
    }

}
