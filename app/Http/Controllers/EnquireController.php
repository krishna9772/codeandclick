<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEnquireRequest;
use App\Models\Enquiry;
use Illuminate\Support\Facades\Log;

class EnquireController extends Controller
{

    public function index()
    {

        $search = request('search', '');

        $enquiries = new Enquiry();

        if ($search) {
            $enquiries = $enquiries->where('first_name', 'like', "%{$search}%")->orWhere('last_name', 'like', "%{$search}%")->orWhere('email', 'like', "%{$search}%")->orWhere('phone', 'like', "%{$search}%")->orWhere('business_name', 'like', "%{$search}%")->orWhere('business_type', 'like', "%{$search}%")->orWhere('location', 'like', "%{$search}%")->orWhere('about_project', 'like', "%{$search}%")->orWhere('service_looking_for', 'like', "%{$search}%")->orWhere('budget', 'like', "%{$search}%")->orWhere('hear_about_us', 'like', "%{$search}%")->orWhere('website', 'like', "%{$search}%")->orWhere('first_name', 'like', "%{$search}%")->orWhere('last_name', 'like', "%{$search}%");
        }

        $enquiries = $enquiries->orderBy('created_at', 'desc');

        $enquiries = $enquiries->paginate(10);

        $startPage = max($enquiries->currentPage() - 2, 1);
        $endPage = $startPage + 4;

        if ($endPage >= $enquiries->lastPage()) {
            $endPage = $enquiries->lastPage();
            $startPage = max($endPage - 4, 1);
        }

        $meta = [
            'current_page' => $enquiries->currentPage(),
            'last_page' => $enquiries->lastPage(),
            'pages' => range($startPage, $endPage),
        ];

        return view('Dashboard.Enquiry.index', compact('enquiries','search','meta'));
    }

    public function store(StoreEnquireRequest $request)
    {

        $validated = $request->validated();

        $validated['service_looking_for'] = implode('/', $validated['service_looking_for']);
        $validated['receive_insight'] = $request->has('receive_insight');

        $enquiry = Enquiry::create($validated);

        return redirect()->back()->with('success', 'Enquiry submitted successfully');
    }

    public function show($id)
    {
        $enquiry = Enquiry::findOrFail($id);

        return view('Dashboard.Enquiry.show', compact('enquiry'));
    }
}
