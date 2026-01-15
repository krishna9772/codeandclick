<x-app-layout>
    <x-slot name="header">
        <a href="{{ route('our-work.index') }}" class="border border-blue-800 text-blue-800 font-bold py-2 px-4 rounded">
            Back to Our Work List
        </a>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create New Work
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl space-y-6 mx-auto sm:px-6 lg:px-8">
            <div style="width: 800px;" class="bg-white mx-auto p-4 overflow-hidden shadow-sm sm:rounded-lg">
                <!-- Display validation errors -->
                @if ($errors->any())
                <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-red-800">
                                There were {{ count($errors) }} error(s) with your submission:
                            </h3>
                            <div class="mt-2 text-sm text-red-700">
                                <ul class="list-disc list-inside space-y-1">
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <form action="{{ route('our-work.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Image Upload with Preview -->
                    <div class="mb-6">
                        <label for="image" class="block text-gray-700 font-bold mb-2">Image</label>
                        @error('image')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror

                        <!-- Image Preview Container -->
                        <div id="imagePreviewContainer" class="hidden mb-4">
                            <img id="imagePreview" src="#" alt="Image Preview" class=" w-full object-cover rounded-lg border border-gray-200">
                        </div>

                        <div class="mt-1 flex items-center">
                            <label for="image" class="cursor-pointer bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                <span>Choose an image</span>
                                <input id="image" name="image" type="file" class="sr-only" accept="image/*" onchange="previewImage(this)" required>
                            </label>
                            <span id="fileName" class="ml-4 text-sm text-gray-600">No file chosen</span>
                        </div>
                        <p class="mt-1 text-sm text-gray-500">JPG, PNG, or WebP (Max: 5MB)</p>
                    </div>


                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 font-bold mb-2">Title</label>
                        @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <input type="text" name="title" id="title" class="border rounded w-full p-2 {{ $errors->has('title') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('title') }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 font-bold mb-2">Type of Service</label>
                        @error('serviceID')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <select name="serviceID" required class="border rounded w-full p-2 {{ $errors->has('serviceID') ? 'border-red-500' : 'border-gray-300' }}">
                            @foreach($services as $service)
                            <option value="{{$service->id}}">{{$service->name}}</option>
                            @endforeach
                        </select>

                    </div>


                    <div class="mb-4">
                        <label for="preview" class="block text-gray-700 font-bold mb-2">Conent</label>
                        @error('content')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <textarea name="content" id="content" class="border h-[200px] rounded w-full p-2 {{ $errors->has('content') ? 'border-red-500' : 'border-gray-300' }}" required>{{ old('content') }}</textarea>
                    </div>

                    <div class="mb-6">
                        <label for="workImages" class="block text-gray-700 font-bold mb-2">Work Images</label>
                        @error('workImages')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror

                        <!-- Multiple Image Preview Container -->
                        <div id="workImagesPreviewContainer" class="mb-4 grid grid-cols-3 gap-4">
                            <!-- Previews will be added here dynamically -->
                        </div>

                        <div class="mt-1">
                            <label for="workImages" class="cursor-pointer bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 inline-block">
                                <span>Choose Work Images</span>
                                <input id="workImages" name="workImages[]" type="file" class="sr-only" accept="image/*" multiple onchange="previewWorkImages(this)" required>
                            </label>
                            <span id="workImagesCount" class="ml-4 text-sm text-gray-600">No files chosen</span>
                        </div>
                        <p class="mt-1 text-sm text-gray-500">JPG, PNG, or WebP (Max: 5MB per image, multiple files allowed)</p>
                    </div>


                    <div class="flex justify-end gap-3 pt-6 border-t border-gray-100">
                        <a href="{{ url()->previous() }}" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Cancel
                        </a>
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Create Work
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editor = Jodit.make('#content', {
                height: 400,
               buttons: ["bold","italic","underline","fontsize","link"]
            });
        });

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

        function previewWorkImages(input) {
            const previewContainer = document.getElementById('workImagesPreviewContainer');
            const countSpan = document.getElementById('workImagesCount');

            const MAX_SIZE = 5 * 1024 * 1024; // 5MB

            // Clear existing previews
            previewContainer.innerHTML = '';

            if (input.files && input.files.length > 0) {
                let validFilesCount = 0;

                Array.from(input.files).forEach((file, index) => {
                    // Skip files over 5MB
                    if (file.size > MAX_SIZE) {
                        return;
                    }

                    validFilesCount++;

                    const reader = new FileReader();

                    reader.onload = function(e) {
                        const previewDiv = document.createElement('div');
                        previewDiv.className = 'relative group';
                        previewDiv.innerHTML = `
                    <img src="${e.target.result}" alt="Work Image ${index + 1}" class="w-full h-32 object-cover rounded-lg border border-gray-200">
                    <button type="button" onclick="removeWorkImagePreview(this)" class="absolute top-2 right-2 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                `;
                        previewContainer.appendChild(previewDiv);
                    };

                    reader.readAsDataURL(file);
                });

                countSpan.textContent =
                    validFilesCount > 0 ?
                    `${validFilesCount} file(s) chosen` :
                    'No valid files (max 5MB each)';
            } else {
                countSpan.textContent = 'No files chosen';
            }
        }

        function removeWorkImagePreview(button) {
            const previewDiv = button.parentElement;
            previewDiv.remove();
        }
    </script>
</x-app-layout>