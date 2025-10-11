<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Subscribers List') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl space-y-6 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-4 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between items-center">
                    <form class="flex items-center gap-3" action="{{ route('subscribers.index') }}" method="GET">
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
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">First Name</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Last Name</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Email</th>
                                <th class="px-6 py-3 text-sm font-semibold text-gray-700 text-center">Receive Newsletter</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Created At</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($subscribers as $subscriber)
                                <tr>
                                    <td class="px-6 py-4 text-gray-800 font-medium">{{ $subscriber->first_name }}</td>
                                    <td class="px-6 py-4 text-gray-800 font-medium">{{ $subscriber->last_name }}</td>
                                    <td class="px-6 py-4 text-gray-800 font-medium">{{ $subscriber->email }}</td>
                                    <td class="px-6 py-4 text-gray-800 font-medium text-center">{{ $subscriber->receive_newsletter ? 'Yes' : 'No' }}</td>
                                    <td class="px-6 py-4 text-gray-800 font-medium">{{ $subscriber->created_at->format('Y-m-d') }}</td>
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