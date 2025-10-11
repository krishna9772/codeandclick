<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Enquiry List') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl space-y-6 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-4 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between items-center">
                    <form class="flex items-center gap-3" action="{{ route('enquiry.index') }}" method="GET">
                        <input type="text" name="search" value="{{ $search }}" placeholder="Search Enquiry" class="border border-gray-300 rounded w-full p-2">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            <x-bi-search class="h-6 w-6 text-white" />

                        </button>
                    </form>
                </div>
            </div>
            <div class="bg-white p-4 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-sm">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Name</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Business</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Contact</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Service Looking For</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Budget</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Receive Insight</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Created At</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Action</th>


                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($enquiries as $enquiry)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    <div class="flex flex-col gap-2 "><span>{{ $enquiry->first_name }} {{ $enquiry->last_name }}</span>@if ($enquiry->website)<a href="{{ $enquiry->website }}" target="_blank" class="text-gray-600">Website</a>@endif</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    <div class="flex flex-col gap-2 "><span>{{ $enquiry->business_name }}</span><span class="text-gray-600">{{ $enquiry->business_type }}</span></div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    <div class="flex flex-col gap-2">
                                        <span>{{ $enquiry->phone }}</span>
                                        <span>{{ $enquiry->email }}</span>
                                        <span>{{ $enquiry->location }}</span>
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    <div class="flex flex-wrap justify-start gap-2 max-w-[400px] items-center text-center mx-auto">
                                        @foreach (explode('/', $enquiry->service_looking_for) as $service)
                                        <span class="px-2 py-1 bg-blue-100 rounded">{{ $service }}</span>
                                        @endforeach
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $enquiry->budget }}</td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $enquiry->receive_insight? 'Yes' : 'No' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{ $enquiry->created_at->format('Y-m-d') }}</td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    <a href="{{ route('enquiry.show', $enquiry->id) }}" class="flex items-center bg-blue-300 rounded-md p-2 cursor-pointer gap-2">
                                        Details
                                    </a>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <x-pagination :meta="$meta" :params="['search' => $search]" />
                </div>
            </div>
        </div>
    </div>


</x-app-layout>