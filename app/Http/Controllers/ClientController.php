<?php

namespace App\Http\Controllers;

use App\Http\Service\ClientService;
use App\Models\Client;
use Illuminate\Http\Request;



class ClientController extends Controller
{

    protected $clientService;
    

    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $search = $request->input('search');

        $clients = Client::where('name', 'like', '%' . $search . '%')->orderBy('created_at', 'desc')->get();

        return view('Dashboard.Clients.index', compact('search', 'clients'));
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Dashboard.Clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $this->clientService->store($request);

        return redirect()->route('clients.index')->with('success', 'Client created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->clientService->destroy($id);

        return redirect()->route('clients.index')->with('success', 'Client deleted successfully.');
    }
}
