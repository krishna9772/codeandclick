<x-app-layout>
    <x-slot name="header">
        <a href="{{ route('services.index') }}" class="border border-blue-800 text-blue-800 font-bold py-2 px-4 rounded">
            Back to Services List
        </a>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Service
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl space-y-6 mx-auto sm:px-6 lg:px-8">
            <div style="width: 800px;" class="bg-white mx-auto p-4 overflow-hidden shadow-sm sm:rounded-lg">

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
                <form action="{{ route('services.update',$service->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <!-- Image Upload with Preview -->
                    <div class="mb-6">
                        <label for="image" class="block text-gray-700 font-bold mb-2">Image</label>

                        @error('image')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <!-- Image Preview Container -->
                        <div id="imagePreviewContainer" class="mb-4">
                            <img id="imagePreview" src="{{ asset($service->getFirstMediaUrl('services')) }}" alt="Image Preview" class=" w-full object-cover rounded-lg border border-gray-200">
                        </div>

                        <div class="mt-1 flex items-center">
                            <label for="image" class="cursor-pointer bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                <span>Choose an image</span>
                                <input id="image" name="image" type="file" class="sr-only" accept="image/*" onchange="previewImage(this)">
                            </label>
                            <span id="fileName" class="ml-4 text-sm text-gray-600">No file chosen</span>
                        </div>
                        <p class="mt-1 text-sm text-gray-500">JPG, PNG, or WebP (Max: 5MB)</p>
                    </div>
                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 font-bold mb-2">Name</label>

                        @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <input type="text" name="name" id="name" class="border border-gray-300 rounded w-full p-2" required value="{{ $service->name }}">
                    </div>

                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 font-bold mb-2">Title</label>
                        @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <input type="text" name="title" id="title" class="border rounded w-full p-2 {{ $errors->has('title') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('title',$service->title) }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="main_content" class="block text-gray-700 font-bold mb-2">Main Content</label>
                        @error('main_content')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <textarea rows="10" name="main_content" id="main_content" class="border rounded w-full p-2 {{ $errors->has('main_content') ? 'border-red-500' : 'border-gray-300' }}" required>{{ old('main_content',$service->main_content) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="tagInput" class="block text-gray-700 font-bold mb-2">Tags</label>
                        @error('tags')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <div class="flex gap-2">
                            <input type="text" id="tagInput" class="border border-gray-300 rounded w-full p-2">
                            <button id="addTag" type="button" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Add</button>
                        </div>
                        <input type="hidden" name="tags" value="{{old('tags',$service->tags)}}" id="tags" required>
                        <div id="tagList" class="py-2 space-y-1">
                            @foreach (explode('/',  old('tags',$service->tags)) as $tag)
                            <button type="button"
                                class="bg-blue-500 hover:bg-red-600 text-white py-1 px-2 rounded-full ml-2 remove-item"
                                data-index="{{ $tag }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            @endforeach
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="preview" class="block text-gray-700 font-bold mb-2">Sub Conent</label>
                        @error('sub_content')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <textarea name="sub_content" id="sub_content" class="border h-[200px] rounded w-full p-2 {{ $errors->has('sub_content') ? 'border-red-500' : 'border-gray-300' }}" required>{{ old('sub_content',$service->sub_content) }}</textarea>
                    </div>


                    <div class="flex justify-end gap-3 pt-6 border-t border-gray-100">
                        <a href="{{ url()->previous() }}" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Cancel
                        </a>
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Edit Service
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jodit@latest/es2021/jodit.fat.min.js"></script>

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


        document.addEventListener('DOMContentLoaded', function() {
            // Function to handle adding items to a list
            function setupList(containerId, inputId, addButtonId, hiddenInputId) {
                const container = document.getElementById(containerId);
                const input = document.getElementById(inputId);
                const addButton = document.getElementById(addButtonId);
                const hiddenInput = document.getElementById(hiddenInputId);

                // Initialize empty array if hidden input is empty
                let items = hiddenInput.value ? hiddenInput.value.split('/').filter(Boolean) : [];

                // Function to update the hidden input value
                function updateHiddenInput() {
                    hiddenInput.value = items.join('/');
                    hiddenInput.dispatchEvent(new Event('input')); // Trigger validation
                }

                // Function to render the list
                function renderList() {
                    container.innerHTML = '';
                    items.forEach((item, index) => {
                        if (item.trim() === '') return;


                        const itemElement = document.createElement('div');
                        itemElement.className = 'px-3 py-1 gap-3 flex items-center text-white text-sm border w-fit bg-blue-800 border-gray-300 rounded">Hello World Kaung Pyae Aung <button type="button" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded';
                        itemElement.innerHTML = `
                            ${item}
                           <button type="button" 
                                    class="bg-blue-500 hover:bg-red-600 text-white py-1 px-2 rounded-full ml-2 remove-item" 
                                    data-index="${index}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        `;
                        container.appendChild(itemElement);
                    });

                    updateHiddenInput();
                }

                // Add item to the list
                function addItem() {
                    const value = input.value.trim();

                    console.log(value);
                    console.log(container)

                    if (value) {
                        items.push(value);
                        input.value = '';
                        renderList();
                    }
                }

                // Add button click handler
                addButton.addEventListener('click', addItem);

                // Allow pressing Enter to add item
                input.addEventListener('keypress', function(e) {
                    if (e.key === 'Enter') {
                        e.preventDefault();
                        addItem();
                    }
                });

                // Remove item from the list
                container.addEventListener('click', function(e) {
                    const removeButton = e.target.closest('.remove-item');
                    if (removeButton) {
                        const index = removeButton.dataset.index;
                        items.splice(index, 1);
                        renderList();
                    }
                });

                // Initial render
                renderList();
            }

            // Set up each list
            setupList('tagList', 'tagInput', 'addTag', 'tags');


        });
    </script>
</x-app-layout>