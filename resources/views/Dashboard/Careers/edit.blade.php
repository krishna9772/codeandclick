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

                <form action="{{ route('careers.update', $career->id) }}" method="POST" enctype="multipart/form-data" id="careerForm" novalidate>
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 font-bold mb-2">Title</label>
                        @error('title')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <input type="text" value="{{ old('title', $career->title) }}" name="title" id="title" maxlength="255" class="border rounded w-full p-2 {{ $errors->has('title') ? 'border-red-500' : 'border-gray-300' }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="location" class="block text-gray-700 font-bold mb-2">Location</label>
                        @error('location')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <select name="location" id="location" class="border rounded w-full p-2 {{ $errors->has('location') ? 'border-red-500' : 'border-gray-300' }}" required>
                            <option value="" disabled {{ old('location', $career->location) ? '' : 'selected' }}>Select a location</option>
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
                        <input type="number" value="{{ old('salary', $career->salary) }}" name="salary" id="salary" min="0" step="1" class="border rounded w-full p-2 {{ $errors->has('salary') ? 'border-red-500' : 'border-gray-300' }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="ignite" class="block text-gray-700 font-bold mb-2">Description</label>
                        @error('ignite')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <textarea rows="10" name="ignite" id="ignite" class="border rounded w-full p-2 {{ $errors->has('ignite') ? 'border-red-500' : 'border-gray-300' }}" required data-required-message="The ignite field is required.">{{ old('ignite', $career->ignite) }}</textarea>
                        <p id="ignite_error" class="hidden text-red-500 text-sm mt-1"></p>
                    </div>
                    <div class="mb-4">
                        <label for="role" class="block text-gray-700 font-bold mb-2">Role</label>
                        @error('role')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <textarea rows="10" name="role" id="role" class="border rounded w-full p-2 {{ $errors->has('role') ? 'border-red-500' : 'border-gray-300' }}" required data-required-message="The role field is required.">{{ old('role', $career->role) }}</textarea>
                        <p id="role_error" class="hidden text-red-500 text-sm mt-1"></p>
                    </div>
                    <div class="mb-4">
                        <label for="responsibilitiesInput" class="block text-gray-700 font-bold mb-2">Responsibilities</label>
                        @error('responsibilities')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <div class="flex gap-2">
                            <input type="text" id="responsibilitiesInput" class="border border-gray-300 rounded w-full p-2" maxlength="255" placeholder="Type a responsibility and click Add">
                            <button type="button" id="addResponsibility" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Add</button>
                        </div>
                        <input type="hidden" value="{{ old('responsibilities', $career->responsibilities) }}" name="responsibilities" id="responsibilities" required data-required-message="The responsibilities field is required.">
                        <p class="mt-1 text-sm text-gray-500">Add at least one responsibility.</p>
                        <div id="responsibilitiesList" class="py-2 flex flex-wrap gap-2"></div>
                    </div>
                    <div class="mb-4">
                        <label for="requirementsInput" class="block text-gray-700 font-bold mb-2">Requirements</label>
                        @error('requirements')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <div class="flex gap-2">
                            <input type="text" id="requirementsInput" class="border border-gray-300 rounded w-full p-2" maxlength="255" placeholder="Type a requirement and click Add">
                            <button id="addRequirement" type="button" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Add</button>
                        </div>
                        <input type="hidden" value="{{ old('requirements', $career->requirements) }}" name="requirements" id="requirements" required data-required-message="The requirements field is required.">
                        <p class="mt-1 text-sm text-gray-500">Add at least one requirement.</p>
                        <div id="requirementsList" class="py-2 flex flex-wrap gap-2"></div>
                    </div>
                    <div class="mb-4">
                        <label for="benefitsInput" class="block text-gray-700 font-bold mb-2">Benefits</label>
                        @error('benefits')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <div class="flex gap-2">
                            <input type="text" id="benefitsInput" class="border border-gray-300 rounded w-full p-2" maxlength="255" placeholder="Type a benefit and click Add">
                            <button id="addBenefit" type="button" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Add</button>
                        </div>
                        <input type="hidden" value="{{ old('benefits', $career->benefits) }}" name="benefits" id="benefits" required data-required-message="The benefits field is required.">
                        <p class="mt-1 text-sm text-gray-500">Add at least one benefit.</p>
                        <div id="benefitsList" class="py-2 flex flex-wrap gap-2"></div>
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
    <script src="https://cdn.jsdelivr.net/npm/jodit@latest/es2021/jodit.fat.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const igniteEditor = Jodit.make('#ignite', {
                height: 400,
                buttons: ['bold', 'italic', 'underline', 'fontsize', 'link']
            });

            const roleEditor = Jodit.make('#role', {
                height: 400,
                buttons: ['bold', 'italic', 'underline', 'fontsize', 'link']
            });

            const form = document.getElementById('careerForm');
            const igniteField = document.getElementById('ignite');
            const roleField = document.getElementById('role');

            function getPlainTextFromHtml(value) {
                const parser = new DOMParser();
                const doc = parser.parseFromString(value, 'text/html');
                return (doc.body.textContent || '').replace(/\u00A0/g, ' ').trim();
            }

            function getEditorContainer(field) {
                return field.closest('.mb-4')?.querySelector('.jodit-container');
            }

            function setEditorError(field, message) {
                const errorElement = document.getElementById(`${field.id}_error`);
                const editorContainer = getEditorContainer(field);

                if (errorElement) {
                    errorElement.textContent = message || '';
                    errorElement.classList.toggle('hidden', !message);
                }

                if (editorContainer) {
                    editorContainer.classList.toggle('border-red-500', Boolean(message));
                }
            }

            function validateRichTextField(editor, field) {
                field.value = editor.value;

                if (!getPlainTextFromHtml(field.value)) {
                    const message = field.dataset.requiredMessage || 'This field is required.';
                    field.value = '';
                    field.setCustomValidity(message);
                    setEditorError(field, message);
                    return false;
                }

                field.setCustomValidity('');
                setEditorError(field, '');
                return true;
            }

            function setupList(containerId, inputId, addButtonId, hiddenInputId) {
                const container = document.getElementById(containerId);
                const input = document.getElementById(inputId);
                const addButton = document.getElementById(addButtonId);
                const hiddenInput = document.getElementById(hiddenInputId);
                let items = hiddenInput.value ? hiddenInput.value.split('/').filter(Boolean) : [];

                function updateHiddenInput() {
                    hiddenInput.value = items.join('/');
                    const message = items.length ? '' : (hiddenInput.dataset.requiredMessage || 'This field is required.');
                    hiddenInput.setCustomValidity(message);
                    input.setCustomValidity(message);
                }

                function renderList() {
                    container.innerHTML = '';

                    items.forEach((item, index) => {
                        const itemElement = document.createElement('div');
                        itemElement.className = 'px-3 py-1 flex items-center gap-2 text-white text-sm border w-fit bg-blue-800 border-gray-300 rounded';
                        itemElement.innerHTML = `
                            <span>${item}</span>
                            <button type="button" class="bg-blue-500 hover:bg-red-600 text-white py-1 px-2 rounded-full remove-item" data-index="${index}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        `;
                        container.appendChild(itemElement);
                    });

                    updateHiddenInput();
                }

                function addItem() {
                    const value = input.value.trim();

                    if (!value) {
                        return;
                    }

                    if (value.length > 255) {
                        input.setCustomValidity('Each item may not be greater than 255 characters.');
                        input.reportValidity();
                        return;
                    }

                    input.setCustomValidity('');
                    items.push(value);
                    input.value = '';
                    renderList();
                }

                addButton.addEventListener('click', addItem);

                input.addEventListener('keypress', function(e) {
                    if (e.key === 'Enter') {
                        e.preventDefault();
                        addItem();
                    }
                });

                input.addEventListener('input', function() {
                    input.setCustomValidity('');
                });

                container.addEventListener('click', function(e) {
                    const removeButton = e.target.closest('.remove-item');

                    if (!removeButton) {
                        return;
                    }

                    items.splice(Number(removeButton.dataset.index), 1);
                    renderList();
                });

                renderList();
            }

            setupList('responsibilitiesList', 'responsibilitiesInput', 'addResponsibility', 'responsibilities');
            setupList('requirementsList', 'requirementsInput', 'addRequirement', 'requirements');
            setupList('benefitsList', 'benefitsInput', 'addBenefit', 'benefits');

            igniteEditor.events.on('change', function() {
                validateRichTextField(igniteEditor, igniteField);
            });

            roleEditor.events.on('change', function() {
                validateRichTextField(roleEditor, roleField);
            });

            form.addEventListener('submit', function(event) {
                const isIgniteValid = validateRichTextField(igniteEditor, igniteField);
                const isRoleValid = validateRichTextField(roleEditor, roleField);

                if (!isIgniteValid || !isRoleValid || !form.checkValidity()) {
                    event.preventDefault();
                    form.reportValidity();
                }
            });
        });
    </script>

</x-app-layout>
