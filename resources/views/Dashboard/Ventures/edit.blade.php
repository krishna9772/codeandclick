<x-app-layout>
    <x-slot name="header">
        <a href="{{ route('bloglist.index') }}" class="border border-blue-800 text-blue-800 font-bold py-2 px-4 rounded">
            Back to Ventures List
        </a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Venture
            </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl space-y-6 mx-auto sm:px-6 lg:px-8">
            <div style="width: 800px;" class="bg-white mx-auto p-4 overflow-hidden shadow-sm sm:rounded-lg">
              <form action="{{ route('ventures.update',$venture->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <!-- Image Upload with Preview -->
                        <div class="mb-6">
                             <label for="image" class="block text-gray-700 font-bold mb-2">Image</label>
                      
                            <!-- Image Preview Container -->
                            <div id="imagePreviewContainer" class="mb-4">
                                <img id="imagePreview" src="{{ asset($venture->getFirstMediaUrl('ventures')) }}" alt="Image Preview" class=" w-full object-cover rounded-lg border border-gray-200">
                            </div>
                            
                            <div class="mt-1 flex items-center">
                                <label for="image" class="cursor-pointer bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    <span>Choose an image</span>
                                    <input id="image"  name="image" type="file" class="sr-only" accept="image/*" onchange="previewImage(this)">
                                </label>
                                <span id="fileName" class="ml-4 text-sm text-gray-600">No file chosen</span>
                            </div>
                            <p class="mt-1 text-sm text-gray-500">JPG, PNG, or WebP (Max: 5MB)</p>
                        </div>
                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 font-bold mb-2">Title</label>
                        <input type="text" name="title" id="title" class="border border-gray-300 rounded w-full p-2" required value="{{ $venture->title }}">
                    </div>
                     <div class="mb-4">
                        <label for="link" class="block text-gray-700 font-bold mb-2">Link</label>
                        <input type="text" name="link" id="link" class="border border-gray-300 rounded w-full p-2" value="{{ $venture->link }}">
                    </div>
                     
                    <div class="mb-4">
                        <label for="content" class="block text-gray-700 font-bold mb-2">Content</label>
                        <textarea rows="10" name="content" id="content" class="border border-gray-300 rounded w-full p-2" required>{{ $venture->content }}</textarea>
                    </div>
                        <div class="flex justify-end gap-3 pt-6 border-t border-gray-100">
                            <a href="{{ url()->previous() }}" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Cancel
                            </a>
                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Edit Venture
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage(input) {
            const previewContainer = document.getElementById('imagePreviewContainer');
            const preview = document.getElementById('imagePreview');
            const fileName = document.getElementById('fileName');

            const MAX_SIZE = 5 * 1024 * 1024; // 5MB

            if (input.files && input.files[0]) {
                const file = input.files[0];

                // Check file size
                if (file.size > MAX_SIZE) {
                    previewContainer.classList.add('hidden');
                    preview.src = '';
                    fileName.textContent = 'File is larger than 5MB';
                    return;
                }

                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    previewContainer.classList.remove('hidden');
                    fileName.textContent = file.name;
                };

                reader.readAsDataURL(file);
            } else {
                previewContainer.classList.add('hidden');
                preview.src = '';
                fileName.textContent = 'No file chosen';
            }
        }
    </script>
</x-app-layout>