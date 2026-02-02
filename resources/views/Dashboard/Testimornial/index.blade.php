<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Testimornial List') }}
        </h2>
        <a href="{{ route('testimornials.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Create New Testimornial
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl space-y-6 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-4 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between items-center">
                       <form class="flex items-center gap-3" action="{{ route('testimornials.index') }}" method="GET">
                            <input type="text" name="search" value="{{ $search }}" placeholder="Search Testimornial" class="border border-gray-300 rounded w-full p-2">
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
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Image</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Name</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Description</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Date</th>
                                <th class="px-6 py-3 text-center text-sm font-semibold text-gray-700">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($testimornials as $testimornial)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4">
                                    <img class="h-12" src="{{ $testimornial->getFirstMediaUrl('testimornials') }}" alt="{{ $testimornial->name }}">

                                </td>
                                <td class="px-6 py-4 text-gray-800 font-medium">{{ $testimornial->name }}</td>
                               <td class="px-6 py-4 text-gray-800">
                                    <div class="line-clamp-3 max-w-[400px] text-justify">{{ $testimornial->description }}</div>
                                </td>
                                <td class="px-6 py-4 text-gray-800 text-sm">{{ $testimornial->created_at->format('Y-m-d') }}</td>
                                



                                <td class="px-6 py-4  text-center ">
                                    <div class="flex items-center justify-center gap-2">
                                       
                                        <a href="{{ route('testimornials.edit', $testimornial->id) }}" class="text-blue-800 rounded-md p-2 bg-blue-300 hover:text-blue-700">
                                            <x-heroicon-o-pencil class="w-5 h-5" />
                                        </a>               
                                        <x-confirm-delete :action="route('testimornials.destroy', $testimornial->id)" />

                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                 </div>
            </div>
        </div>
    </div>


</x-app-layout>