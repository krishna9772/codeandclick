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
                <form action="{{ route('careers.update', $career->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 font-bold mb-2">Title</label>
                        <input type="text" value="{{ $career->title }}" name="title" id="title" class="border border-gray-300 rounded w-full p-2" required>
                    </div>
                    <div class="mb-4">
                        <label for="location" class="block text-gray-700 font-bold mb-2">Location</label>
                        <select value="{{ $career->location }}" name="location" id="location" class="border border-gray-300 rounded w-full p-2" required>
                            @foreach (config('base.location') as $location)
                            <option value="{{ $location }}">{{ $location }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="salary" class="block text-gray-700 font-bold mb-2">Salary</label>
                        <input type="number" value="{{ $career->salary }}" name="salary" id="salary" class="border border-gray-300 rounded w-full p-2" required>
                    </div>
                    <div class="mb-4">
                        <label for="ignite" class="block text-gray-700 font-bold mb-2">Ignite</label>
                        <textarea rows="10" name="ignite" id="ignite" class="border border-gray-300 rounded w-full p-2" required>{{ $career->ignite }}</textarea>
                    </div>
                    <div class="mb-4">
                        <label for="role" class="block text-gray-700 font-bold mb-2">Role</label>
                        <textarea rows="10" name="role" id="role" class="border border-gray-300 rounded w-full p-2" required>{{ $career->role }}</textarea>
                    </div>
                    <div class="mb-4">
                        <label for="responsibilitiesInput" class="block text-gray-700 font-bold mb-2">Responsibilities</label>
                        <div class="flex gap-2">
                            <input type="text" id="responsibilitiesInput" class="border border-gray-300 rounded w-full p-2">
                            <button type="button" id="addResponsibility" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Add</button>
                        </div>
                        <input type="hidden" value="{{ $career->responsibilities }}" name="responsibilities" id="responsibilities" required>
                        <div id="responsibilitiesList" class="py-2 space-y-1">

                            @foreach (explode('/', $career->responsibilities) as $responsibility)
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
                        <div class="flex gap-2">
                            <input type="text" id="requirementsInput" class="border border-gray-300 rounded w-full p-2">
                            <button id="addRequirement" type="button" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Add</button>
                        </div>
                        <input type="hidden" value="{{ $career->requirements }}" name="requirements" id="requirements" required>
                        <div id="requirementsList" class="py-2 space-y-1">
                            @foreach (explode('/', $career->requirements) as $requirement)
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
                        <div class="flex gap-2">
                            <input type="text" id="benefitsInput" class="border border-gray-300 rounded w-full p-2">
                            <button id="addBenefit" type="button" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Add</button>
                        </div>
                        <input type="hidden" value="{{ $career->benefits }}" name="benefits" id="benefits" required>
                        <div id="benefitsList" class="py-2 space-y-1">
                            @foreach (explode('/', $career->benefits) as $benefit)
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
            setupList('responsibilitiesList', 'responsibilitiesInput', 'addResponsibility', 'responsibilities');
            setupList('requirementsList', 'requirementsInput', 'addRequirement', 'requirements');
            setupList('benefitsList', 'benefitsInput', 'addBenefit', 'benefits');
        });
    </script>

</x-app-layout>