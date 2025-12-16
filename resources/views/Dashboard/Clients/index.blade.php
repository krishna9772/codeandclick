<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clients List') }}
        </h2>
        <a href="{{ route('clients.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Create New Client
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl space-y-6 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-4 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between items-center">
                       <form class="flex items-center gap-3" action="{{ route('clients.index') }}" method="GET">
                            <input type="text" name="search" value="{{ $search }}" placeholder="Search Client" class="border border-gray-300 rounded w-full p-2">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                <x-bi-search class="h-6 w-6 text-white" />

                            </button>
                        </form>
                    
                 
                </div>
            </div>
            <div class="bg-white p-4 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="overflow-x-auto grid grid-cols-4 gap-4">
                   @foreach ($clients as $client)
                   <div class="col-span-1 p-3 border border-gray-200">
                       <img src="{{ $client->getFirstMediaUrl('clients') }}" alt="Client Image" class="w-full h-64 object-cover">
                       <p class="text-center my-3 text-lg font-medium">{{ $client->name }}</p>
                       <div class="flex justify-end gap-3">
                              <x-confirm-delete :action="route('clients.destroy', $client->id)" />

                       </div>
                   </div>
                   @endforeach
                   
                </div>
            </div>
        </div>
    </div>

  

</x-app-layout>