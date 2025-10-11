<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blog List') }}
        </h2>
        <a href="{{ route('bloglist.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Create New Blog
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl space-y-6 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-4 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between items-center">
                       <form class="flex items-center gap-3" action="{{ route('bloglist.index') }}" method="GET">
                            <input type="text" name="search" value="{{ $search }}" placeholder="Search Blogs" class="border border-gray-300 rounded w-full p-2">
                            <input type="hidden" name="tag" value="{{ $tag }}">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                <x-bi-search class="h-6 w-6 text-white" />

                            </button>
                        </form>
                    
                    <div class="flex gap-3 items-center p-1 border border-gray-100">
                        <a href="{{ route('bloglist.index') }}" class="{{ $tag === '' ? 'bg-blue-300 shadow-md' : 'bg-gray-100' }} p-3  cursor-pointer border border-gray-100  rounded">
                            <x-bi-globe-americas-fill class="w-5 h-5 text-blue-800" />
                        </a>
                        <a href="{{ route('bloglist.index', ['tag' => 'trashed']) }}" class="{{ $tag === 'trashed' ? 'bg-red-300 shadow-md' : 'bg-gray-100' }} p-3 cursor-pointer border border-gray-100 rounded">
                            <x-heroicon-o-trash class="text-red-800 w-5 h-5" />
                        </a>
                    </div>

                </div>
            </div>
            <div class="bg-white p-4 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-sm">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Image</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Title</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Type</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Content</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Date</th>
                                @if ($tag != 'trashed')
                                <th class="px-6 py-3 text-center text-sm font-semibold text-gray-700">Status</th>
                                @endif
                                <th class="px-6 py-3 text-center text-sm font-semibold text-gray-700">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($blogs as $blog)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4">
                                    <img class="h-12" src="{{ asset($blog->getFirstMediaUrl('blog_images')) }}" alt="{{ $blog->title }}">

                                </td>
                                <td class="px-6 py-4 text-gray-800 font-medium">{{ $blog->title }}</td>
                                <td class="px-6 py-4 text-gray-800">{{ $blog->type }}</td>
                                <td class="px-6 py-4 text-gray-800">
                                    <div class="line-clamp-3 max-w-[400px] text-justify">{{ $blog->content }}</div>
                                </td>
                                <td class="px-6 py-4 text-gray-800 text-sm">{{ $blog->created_at->format('Y-m-d') }}</td>
                                
                                @if ($tag != 'trashed')
                                <td class="px-6 py-4 text-center">
                                    <x-status-change action="bloglist.change-status" :status="$blog->status" :id="$blog->id" />
                                </td>
                                @endif


                                <td class="px-6 py-4  text-center ">
                                    <div class="flex items-center justify-center gap-2">
                                        @if ($tag !== 'trashed')
                                        <a href="{{ route('bloglist.edit', $blog->id) }}" class="text-blue-800 rounded-md p-2 bg-blue-300 hover:text-blue-700">
                                            <x-heroicon-o-pencil class="w-5 h-5" />
                                        </a>
                                        @else
                                        <form action="{{ route('bloglist.restore', $blog->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="text-blue-800 rounded-md p-2 bg-blue-300 hover:text-blue-700">
                                                <x-bi-cloud-upload class="w-5 h-5" />
                                            </button>
                                        </form>
                                        @endif
                                        <a href="{{ route('bloglist.show', $blog->id) }}" class="text-gray-800 rounded-md p-2 bg-gray-300 hover:text-gray-700">
                                            <x-bi-eye class="w-5 h-5" />
                                        </a>
                                        <x-confirm-delete :action="route('bloglist.destroy', $blog->id)" />

                                    </div>
                                </td>
                            </tr>
                            @endforeach



                        </tbody>
                    </table>
                   <x-pagination :meta="$meta" :params="['tag' => $tag, 'search' => $search]" />
                </div>
            </div>
        </div>
    </div>


</x-app-layout>