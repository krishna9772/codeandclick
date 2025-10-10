@props([
    'meta',
])

 
 <div class="flex justify-center mt-6">
     <nav class="inline-flex -space-x-px rounded-md shadow-sm">


         <button {{ $meta['current_page'] === 1 ? 'disabled' : '' }} class="px-3 py-2 ml-0 disabled:opacity-50 rounded-l-md border border-gray-300 bg-white text-gray-700 hover:bg-gray-50">
             <x-heroicon-o-arrow-left class="w-5 h-5" />
         </button>

         @foreach ($meta['pages'] as $page)
         <button class="px-3 py-2 border border-gray-300 {{ $meta['current_page'] === $page ? 'bg-blue-500 text-white' : 'bg-white text-gray-700 hover:bg-gray-50' }}">{{ $page }}</button>
         @endforeach

         <!-- Next Page -->

         <button {{ $meta['current_page'] === $meta['last_page'] ? 'disabled' : '' }} class="px-3 py-2 disabled:opacity-50 rounded-r-md border border-gray-300 bg-white text-gray-700 hover:bg-gray-50">
             <x-heroicon-o-arrow-right class="w-5 h-5" />
         </button>



     </nav>
 </div>