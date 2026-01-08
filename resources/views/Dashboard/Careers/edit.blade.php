<x-app-layout>
    <x-slot name="header">
        <a href="{{ route('careers.index') }}" class="border border-blue-800 text-blue-800 font-bold py-2 px-4 rounded">
            Back to Career List
        </a>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Career
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

                <form action="{{ route('careers.update', $career->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 font-bold mb-2">Title</label>
                        @error('title')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <input type="text" value="{{ old('title', $career->title) }}" name="title" id="title" class="border rounded w-full p-2 {{ $errors->has('title') ? 'border-red-500' : 'border-gray-300' }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="location" class="block text-gray-700 font-bold mb-2">Location</label>
                        @error('location')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <select name="location" id="location" class="border rounded w-full p-2 {{ $errors->has('location') ? 'border-red-500' : 'border-gray-300' }}" required>
                            @foreach (config('base.location') as $location)
                            <option value="{{ $location }}" {{ old('location', $career->location) === $location ? 'selected' : '' }}>{{ $location }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="salary" class="block text-gray-700 font-bold mb-2">Salary</label>
                        @error('salary')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <input type="number" value="{{ old('salary', $career->salary) }}" name="salary" id="salary" class="border rounded w-full p-2 {{ $errors->has('salary') ? 'border-red-500' : 'border-gray-300' }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="ignite" class="block text-gray-700 font-bold mb-2">Description</label>
                        @error('ignite')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <textarea rows="10" name="ignite" id="ignite" class="border rounded w-full p-2 {{ $errors->has('ignite') ? 'border-red-500' : 'border-gray-300' }}" required>{{ old('ignite', $career->ignite) }}</textarea>
                    </div>
                    <div class="mb-4">
                        <label for="role" class="block text-gray-700 font-bold mb-2">Role</label>
                        @error('role')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <textarea rows="10" name="role" id="role" class="border rounded w-full p-2 {{ $errors->has('role') ? 'border-red-500' : 'border-gray-300' }}" required>{{ old('role', $career->role) }}</textarea>
                    </div>
                    <div class="mb-4">
                        <label for="responsibilitiesInput" class="block text-gray-700 font-bold mb-2">Responsibilities</label>
                        @error('responsibilities')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <div class="flex gap-2">
                            <input type="text" id="responsibilitiesInput" class="border border-gray-300 rounded w-full p-2">
                            <button type="button" id="addResponsibility" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Add</button>
                        </div>
                        <input type="hidden" value="{{ old('responsibilities', $career->responsibilities) }}" name="responsibilities" id="responsibilities" required>
                        <div id="responsibilitiesList" class="py-2 space-y-1">

                            @foreach (explode('/', old('responsibilities', $career->responsibilities)) as $responsibility)
                            <button type="button"
                                class="bg-blue-500 hover:bg-red-600 text-white py-1 px-2 rounded-full ml-2 remove-item"
                                data-index="{{ $responsibility }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            @endforeach
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="requirementsInput" class="block text-gray-700 font-bold mb-2">Requirements</label>
                        @error('requirements')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <div class="flex gap-2">
                            <input type="text" id="requirementsInput" class="border border-gray-300 rounded w-full p-2">
                            <button id="addRequirement" type="button" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Add</button>
                        </div>
                        <input type="hidden" value="{{ old('requirements', $career->requirements) }}" name="requirements" id="requirements" required>
                        <div id="requirementsList" class="py-2 space-y-1">
                            @foreach (explode('/', old('requirements', $career->requirements)) as $requirement)
                            <button type="button"
                                class="bg-blue-500 hover:bg-red-600 text-white py-1 px-2 rounded-full ml-2 remove-item"
                                data-index="{{ $requirement }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            @endforeach
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="benefitsInput" class="block text-gray-700 font-bold mb-2">Benefits</label>
                        @error('benefits')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <div class="flex gap-2">
                            <input type="text" id="benefitsInput" class="border border-gray-300 rounded w-full p-2">
                            <button id="addBenefit" type="button" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Add</button>
                        </div>
                        <input type="hidden" value="{{ old('benefits', $career->benefits) }}" name="benefits" id="benefits" required>
                        <div id="benefitsList" class="py-2 space-y-1">
                            @foreach (explode('/', old('benefits', $career->benefits)) as $benefit)
                            <button type="button"
                                class="bg-blue-500 hover:bg-red-600 text-white py-1 px-2 rounded-full ml-2 remove-item"
                                data-index="{{ $benefit }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            @endforeach
                        </div>
                    </div>

                    <div class="flex justify-end gap-3 pt-6 border-t border-gray-100">
                        <a href="{{ url()->previous() }}" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Cancel
                        </a>
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Edit Career
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
            const editor = Jodit.make('#ignite', {
                // optional config
                height: 400,
                buttons: ['bold', 'italic', 'underline', '|', 'ul', 'ol', '|', 'link', 'image', 'source']
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const editor = Jodit.make('#role', {
                // optional config
                height: 400,
                buttons: ['bold', 'italic', 'underline', '|', 'ul', 'ol', '|', 'link', 'image', 'source']
            });
        });

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
            setupList('responsibilitiesList', 'responsibilitiesInput', 'addResponsibility', 'responsibilities');
            setupList('requirementsList', 'requirementsInput', 'addRequirement', 'requirements');
            setupList('benefitsList', 'benefitsInput', 'addBenefit', 'benefits');
        });
    </script>

</x-app-layout>