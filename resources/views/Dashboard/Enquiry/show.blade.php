<x-app-layout>
    <x-slot name="header">
        <a href="{{ route('enquiry.index') }}" class="border border-blue-800 text-blue-800 font-bold py-2 px-4 rounded">
            Back to Enquiry List
        </a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Enquiry Details
            </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Header Section -->
                    <div class="mb-8">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                            <div>
                                <h3 class="text-2xl font-bold text-gray-900">
                                    {{ $enquiry->first_name }} {{ $enquiry->last_name }}
                                </h3>
                                <p class="text-sm text-gray-500">
                                    {{ $enquiry->business_name }} • {{ $enquiry->business_type }}
                                    @if($enquiry->website)
                                        - <a href="{{ Str::startsWith($enquiry->website, 'http') ? $enquiry->website : 'https://' . $enquiry->website }}" 
                                           target="_blank" 
                                           class="text-blue-600 hover:underline">
                                            {{ parse_url($enquiry->website, PHP_URL_HOST) }}
                                        </a>
                                    @endif
                                </p>
                            </div>
                            <div class="mt-4 md:mt-0">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $enquiry->receive_insight ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                    {{ $enquiry->receive_insight ? 'Subscribed to Insights' : 'Not Subscribed' }}
                                </span>
                            </div>
                        </div>
                        <div class="mt-4 border-t border-gray-200 pt-4">
                            <div class="flex flex-wrap gap-4 text-sm text-gray-500">
                                <div class="flex items-center">
                                    <x-bi-envelope class="h-4 w-4 mr-1" />
                                    {{ $enquiry->email }}
                                </div>
                                @if($enquiry->phone)
                                <div class="flex items-center">
                                    <x-bi-telephone class="h-4 w-4 mr-1" />
                                    {{ $enquiry->phone }}
                                </div>
                                @endif
                                @if($enquiry->location)
                                <div class="flex items-center">
                                    <x-bi-geo-alt class="h-4 w-4 mr-1" />
                                    {{ $enquiry->location }}
                                </div>
                                @endif
                                <div class="flex items-center">
                                    <x-bi-calendar3 class="h-4 w-4 mr-1" />
                                    {{ $enquiry->created_at->format('F j, Y \\a\\t g:i A') }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Services Section -->
                    <div class="mb-8">
                        <h4 class="text-lg font-medium text-gray-900 mb-3">Services Interested In</h4>
                        <div class="flex flex-wrap gap-2">
                            @if(is_string($enquiry->service_looking_for))
                                @foreach(explode('/', $enquiry->service_looking_for) as $service)
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                        {{ trim($service) }}
                                    </span>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <!-- Budget Section -->
                    @if($enquiry->budget)
                    <div class="mb-8">
                        <h4 class="text-lg font-medium text-gray-900 mb-2">Budget</h4>
                        <p class="text-gray-700">{{ $enquiry->budget }}</p>
                    </div>
                    @endif

                    <!-- Project Details -->
                    @if($enquiry->about_project)
                    <div class="mb-8">
                        <h4 class="text-lg font-medium text-gray-900 mb-2">Project Details</h4>
                        <div class="bg-gray-50 py-4 rounded-lg">
                            <p class="text-gray-700 whitespace-pre-line">{{ $enquiry->about_project }}</p>
                        </div>
                    </div>
                    @endif

                    <!-- How They Heard About Us -->
                    @if($enquiry->hear_about_us)
                    <div>
                        <h4 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">How they heard about us</h4>
                        <p class="text-gray-700">{{ $enquiry->hear_about_us }}</p>
                    </div>
                    @endif
                </div>
            </div>
            
            <!-- Actions -->
            <div class="mt-6 flex justify-between items-center">
                <div class="text-sm text-gray-500">
                    Enquiry ID: {{ $enquiry->id }}
                </div>
                <div class="flex space-x-3">
                    <a href="mailto:{{ $enquiry->email }}" 
                       class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <x-bi-envelope class="h-4 w-4 mr-2" />
                        Email
                    </a>
                    @if($enquiry->phone)
                    <a href="tel:{{ preg_replace('/[^0-9+]/', '', $enquiry->phone) }}" 
                       class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <x-bi-telephone class="h-4 w-4 mr-2" />
                        Call
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>