<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage SEO') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl space-y-6 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-4 overflow-hidden shadow-sm sm:rounded-lg">
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
                <form action="{{ route('seo.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                 
                   
                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 font-bold mb-2">Name</label>

                        @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <input type="text" name="title" id="title" class="border border-gray-300 rounded w-full p-2" required value="{{ old('title',$seo->title) }}">
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
                        @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <textarea rows="10" name="description" id="description" class="border rounded w-full p-2 {{ $errors->has('description') ? 'border-red-500' : 'border-gray-300' }}" required>{{ old('description',$seo->description) }}</textarea>
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
                        <input type="hidden" name="keyword" value="{{old('keyword',$seo->keyword)}}" id="keywords" required>
                        <div id="tagList" class="py-2 space-y-1">
                            @foreach (explode('/',  old('keyword',$seo->keyword)) as $tag)
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

                  
                    <div class="flex justify-end gap-3 pt-6 border-t border-gray-100">
                        
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Update SEO
                        </button>
                    </div>
                </form>
            </div>
            </div>
            
        </div>
    </div>

    <script>
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
            setupList('tagList', 'tagInput', 'addTag', 'keywords');


        });
    </script>


</x-app-layout>