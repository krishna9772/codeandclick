<x-app-layout>
    <x-slot name="header">
        <div class="flex w-full items-center">
            <a href="{{ route('careers.index') }}" class="rounded border border-blue-800 px-4 py-2 font-bold text-blue-800">
                Back to Career List
            </a>
            <h2 class="ml-auto text-right text-xl font-semibold leading-tight text-gray-800">
                {{ $pageTitle ?? 'Edit Career' }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-5xl sm:px-6 lg:px-8">
            <div class="overflow-hidden rounded-lg bg-white shadow-sm">
                <div class="p-8">
                    <form action="{{ route('careers.update', $career->id) }}" method="POST" enctype="multipart/form-data" id="careerForm" class="space-y-8" novalidate>
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="title" class="mb-2 block text-sm font-semibold text-gray-800">Title</label>
                            <input type="text" name="title" id="title" maxlength="255" class="w-full rounded-lg border border-gray-300 p-3" value="{{ old('title', $career->title) }}" required>
                            @error('title')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="location" class="mb-2 block text-sm font-semibold text-gray-800">Location</label>
                            <select name="location" id="location" class="w-full rounded-lg border border-gray-300 p-3" required>
                                <option value="" disabled {{ old('location', $career->location) ? '' : 'selected' }}>Select a location</option>
                                @foreach (config('base.location') as $location)
                                    <option value="{{ $location }}" {{ old('location', $career->location) === $location ? 'selected' : '' }}>{{ $location }}</option>
                                @endforeach
                            </select>
                            @error('location')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="salary" class="mb-2 block text-sm font-semibold text-gray-800">Salary</label>
                            <input type="number" name="salary" id="salary" min="0" step="1" class="w-full rounded-lg border border-gray-300 p-3" value="{{ old('salary', $career->salary) }}" required>
                            @error('salary')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-6 border-t border-gray-200 pt-8">
                            <div>
                                <label for="ignite" class="mb-2 block text-sm font-semibold text-gray-800">Description</label>
                                <textarea rows="10" name="ignite" id="ignite" class="w-full rounded-lg border border-gray-300 p-3" required data-required-message="The ignite field is required.">{{ old('ignite', $career->ignite) }}</textarea>
                                <p id="ignite_error" class="mt-2 hidden text-sm text-red-500"></p>
                                @error('ignite')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="role" class="mb-2 block text-sm font-semibold text-gray-800">Role</label>
                                <textarea rows="10" name="role" id="role" class="w-full rounded-lg border border-gray-300 p-3" required data-required-message="The role field is required.">{{ old('role', $career->role) }}</textarea>
                                <p id="role_error" class="mt-2 hidden text-sm text-red-500"></p>
                                @error('role')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="space-y-6 border-t border-gray-200 pt-8">
                            <div>
                                <label for="responsibilitiesInput" class="mb-2 block text-sm font-semibold text-gray-800">Responsibilities</label>
                                <div class="flex gap-3">
                                    <input type="text" id="responsibilitiesInput" class="w-full rounded-lg border border-gray-300 p-3" maxlength="255" placeholder="Type a responsibility and click Add">
                                    <button type="button" id="addResponsibility" class="rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700">Add</button>
                                </div>
                                <input type="hidden" name="responsibilities" id="responsibilities" value="{{ old('responsibilities', $career->responsibilities) }}" required data-required-message="The responsibilities field is required.">
                                <p class="mt-2 text-sm text-gray-500">Add at least one responsibility.</p>
                                <p id="responsibilities_error" class="mt-2 hidden text-sm text-red-500"></p>
                                <div id="responsibilitiesList" class="mt-3 flex flex-wrap gap-2"></div>
                                @error('responsibilities')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="requirementsInput" class="mb-2 block text-sm font-semibold text-gray-800">Requirements</label>
                                <div class="flex gap-3">
                                    <input type="text" id="requirementsInput" class="w-full rounded-lg border border-gray-300 p-3" maxlength="255" placeholder="Type a requirement and click Add">
                                    <button type="button" id="addRequirement" class="rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700">Add</button>
                                </div>
                                <input type="hidden" name="requirements" id="requirements" value="{{ old('requirements', $career->requirements) }}" required data-required-message="The requirements field is required.">
                                <p class="mt-2 text-sm text-gray-500">Add at least one requirement.</p>
                                <p id="requirements_error" class="mt-2 hidden text-sm text-red-500"></p>
                                <div id="requirementsList" class="mt-3 flex flex-wrap gap-2"></div>
                                @error('requirements')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="benefitsInput" class="mb-2 block text-sm font-semibold text-gray-800">Benefits</label>
                                <div class="flex gap-3">
                                    <input type="text" id="benefitsInput" class="w-full rounded-lg border border-gray-300 p-3" maxlength="255" placeholder="Type a benefit and click Add">
                                    <button type="button" id="addBenefit" class="rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700">Add</button>
                                </div>
                                <input type="hidden" name="benefits" id="benefits" value="{{ old('benefits', $career->benefits) }}" required data-required-message="The benefits field is required.">
                                <p class="mt-2 text-sm text-gray-500">Add at least one benefit.</p>
                                <p id="benefits_error" class="mt-2 hidden text-sm text-red-500"></p>
                                <div id="benefitsList" class="mt-3 flex flex-wrap gap-2"></div>
                                @error('benefits')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="space-y-6 border-t border-gray-200 pt-8">
                            <h3 class="text-lg font-semibold text-gray-900">Myanmar Content</h3>

                            <div>
                                <label for="title_mm" class="mb-2 block text-sm font-semibold text-gray-800">Title (Myanmar)</label>
                                <input type="text" name="title_mm" id="title_mm" maxlength="255" class="w-full rounded-lg border border-gray-300 p-3" value="{{ old('title_mm', $career->title_mm) }}">
                                @error('title_mm')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="ignite_mm" class="mb-2 block text-sm font-semibold text-gray-800">Description (Myanmar)</label>
                                <textarea rows="10" name="ignite_mm" id="ignite_mm" class="w-full rounded-lg border border-gray-300 p-3">{{ old('ignite_mm', $career->ignite_mm) }}</textarea>
                                @error('ignite_mm')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="role_mm" class="mb-2 block text-sm font-semibold text-gray-800">Role (Myanmar)</label>
                                <textarea rows="10" name="role_mm" id="role_mm" class="w-full rounded-lg border border-gray-300 p-3">{{ old('role_mm', $career->role_mm) }}</textarea>
                                @error('role_mm')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="responsibilities_mm" class="mb-2 block text-sm font-semibold text-gray-800">Responsibilities (Myanmar)</label>
                                <div class="flex gap-3">
                                    <input type="text" id="responsibilitiesMmInput" class="w-full rounded-lg border border-gray-300 p-3" maxlength="255" placeholder="Type a responsibility and click Add">
                                    <button type="button" id="addResponsibilityMm" class="rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700">Add</button>
                                </div>
                                <input type="hidden" name="responsibilities_mm" id="responsibilities_mm" value="{{ old('responsibilities_mm', $career->responsibilities_mm) }}">
                                <p class="mt-2 text-sm text-gray-500">Add Myanmar responsibilities one by one.</p>
                                <div id="responsibilitiesMmList" class="mt-3 flex flex-wrap gap-2"></div>
                                @error('responsibilities_mm')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="requirements_mm" class="mb-2 block text-sm font-semibold text-gray-800">Requirements (Myanmar)</label>
                                <div class="flex gap-3">
                                    <input type="text" id="requirementsMmInput" class="w-full rounded-lg border border-gray-300 p-3" maxlength="255" placeholder="Type a requirement and click Add">
                                    <button type="button" id="addRequirementMm" class="rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700">Add</button>
                                </div>
                                <input type="hidden" name="requirements_mm" id="requirements_mm" value="{{ old('requirements_mm', $career->requirements_mm) }}">
                                <p class="mt-2 text-sm text-gray-500">Add Myanmar requirements one by one.</p>
                                <div id="requirementsMmList" class="mt-3 flex flex-wrap gap-2"></div>
                                @error('requirements_mm')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="benefits_mm" class="mb-2 block text-sm font-semibold text-gray-800">Benefits (Myanmar)</label>
                                <div class="flex gap-3">
                                    <input type="text" id="benefitsMmInput" class="w-full rounded-lg border border-gray-300 p-3" maxlength="255" placeholder="Type a benefit and click Add">
                                    <button type="button" id="addBenefitMm" class="rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700">Add</button>
                                </div>
                                <input type="hidden" name="benefits_mm" id="benefits_mm" value="{{ old('benefits_mm', $career->benefits_mm) }}">
                                <p class="mt-2 text-sm text-gray-500">Add Myanmar benefits one by one.</p>
                                <div id="benefitsMmList" class="mt-3 flex flex-wrap gap-2"></div>
                                @error('benefits_mm')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex justify-end gap-3 border-t border-gray-200 pt-6">
                            <a href="{{ route('careers.index') }}" class="rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">
                                Cancel
                            </a>
                            <button type="submit" class="rounded-md bg-blue-600 px-5 py-2 text-sm font-medium text-white hover:bg-blue-700">
                                Update Career
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
            const editorConfig = {
                height: 420,
                buttons: ['bold', 'italic', 'underline', 'ul', 'ol', 'fontsize', 'link', 'image'],
                uploader: {
                    insertImageAsBase64URI: true,
                },
                filebrowser: {
                    ajax: {
                        url: '',
                    },
                },
            };

            const igniteEditor = Jodit.make('#ignite', editorConfig);
            const igniteMmEditor = Jodit.make('#ignite_mm', editorConfig);
            const roleEditor = Jodit.make('#role', editorConfig);
            const roleMmEditor = Jodit.make('#role_mm', editorConfig);

            const form = document.getElementById('careerForm');
            const titleField = document.getElementById('title');
            const locationField = document.getElementById('location');
            const salaryField = document.getElementById('salary');
            const igniteField = document.getElementById('ignite');
            const igniteMmField = document.getElementById('ignite_mm');
            const roleField = document.getElementById('role');
            const roleMmField = document.getElementById('role_mm');
            let hasSubmitted = false;

            function getPlainTextFromHtml(value) {
                const parser = new DOMParser();
                const doc = parser.parseFromString(value, 'text/html');
                return (doc.body.textContent || '').replace(/\u00A0/g, ' ').trim();
            }

            function getEditorContainer(field) {
                return field.parentElement.querySelector('.jodit-container');
            }

            function setEditorError(field, message) {
                const errorElement = document.getElementById(field.id + '_error');
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

            function setFieldError(field, message) {
                if (!field) {
                    return;
                }

                field.setCustomValidity(message || '');
                field.classList.toggle('border-red-500', Boolean(message));
            }

            function validateBasicField(field) {
                if (!field) {
                    return true;
                }

                let message = '';
                const value = field.value.trim();

                if (field.id === 'title' && !value) {
                    message = 'The title field is required.';
                }

                if (field.id === 'location' && !value) {
                    message = 'The location field is required.';
                }

                if (field.id === 'salary') {
                    if (!value) {
                        message = 'The salary field is required.';
                    } else if (Number(value) < 0) {
                        message = 'The salary must be at least 0.';
                    }
                }

                setFieldError(field, message);
                return !message;
            }

            function setupList(containerId, inputId, addButtonId, hiddenInputId) {
                const container = document.getElementById(containerId);
                const input = document.getElementById(inputId);
                const addButton = document.getElementById(addButtonId);
                const hiddenInput = document.getElementById(hiddenInputId);
                let items = hiddenInput.value ? hiddenInput.value.split('/').filter(Boolean) : [];

                function setListError(message) {
                    const errorElement = document.getElementById(hiddenInputId + '_error');

                    if (errorElement) {
                        errorElement.textContent = message || '';
                        errorElement.classList.toggle('hidden', !message);
                    }
                }

                function updateHiddenInput() {
                    hiddenInput.value = items.join('/');
                    const message = items.length || !hasSubmitted ? '' : (hiddenInput.dataset.requiredMessage || 'This field is required.');
                    hiddenInput.setCustomValidity(message);
                    input.setCustomValidity(message);
                    setListError(message);
                }

                function renderList() {
                    container.innerHTML = '';

                    items.forEach((item, index) => {
                        const itemElement = document.createElement('div');
                        itemElement.className = 'flex items-center gap-2 rounded-full bg-blue-50 px-3 py-2 text-sm text-blue-800';
                        itemElement.innerHTML = `
                            <span>${item}</span>
                            <button type="button" class="remove-item inline-flex h-5 w-5 items-center justify-center rounded-full bg-blue-600 text-white hover:bg-red-600" data-index="${index}">
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
            setupList('responsibilitiesMmList', 'responsibilitiesMmInput', 'addResponsibilityMm', 'responsibilities_mm');
            setupList('requirementsMmList', 'requirementsMmInput', 'addRequirementMm', 'requirements_mm');
            setupList('benefitsMmList', 'benefitsMmInput', 'addBenefitMm', 'benefits_mm');

            igniteEditor.events.on('change', function() {
                validateRichTextField(igniteEditor, igniteField);
            });

            roleEditor.events.on('change', function() {
                validateRichTextField(roleEditor, roleField);
            });

            [titleField, locationField, salaryField].forEach(function(field) {
                if (!field) {
                    return;
                }

                field.addEventListener('input', function() {
                    validateBasicField(field);
                });

                field.addEventListener('change', function() {
                    validateBasicField(field);
                });

                field.addEventListener('blur', function() {
                    validateBasicField(field);
                });
            });

            form.addEventListener('submit', function(event) {
                hasSubmitted = true;
                const isTitleValid = validateBasicField(titleField);
                const isLocationValid = validateBasicField(locationField);
                const isSalaryValid = validateBasicField(salaryField);
                const isIgniteValid = validateRichTextField(igniteEditor, igniteField);
                const isRoleValid = validateRichTextField(roleEditor, roleField);
                igniteMmField.value = igniteMmEditor.value;
                roleMmField.value = roleMmEditor.value;

                [
                    ['responsibilities', 'responsibilitiesInput'],
                    ['requirements', 'requirementsInput'],
                    ['benefits', 'benefitsInput']
                ].forEach(function(fieldIds) {
                    const hiddenInput = document.getElementById(fieldIds[0]);
                    const visibleInput = document.getElementById(fieldIds[1]);

                    if (!hiddenInput || !visibleInput) {
                        return;
                    }

                    const values = hiddenInput.value ? hiddenInput.value.split('/').filter(Boolean) : [];
                    const message = values.length ? '' : (hiddenInput.dataset.requiredMessage || 'This field is required.');
                    hiddenInput.setCustomValidity(message);
                    visibleInput.setCustomValidity(message);

                    const errorElement = document.getElementById(fieldIds[0] + '_error');
                    if (errorElement) {
                        errorElement.textContent = message || '';
                        errorElement.classList.toggle('hidden', !message);
                    }
                });

                if (!isTitleValid || !isLocationValid || !isSalaryValid || !isIgniteValid || !isRoleValid || !form.checkValidity()) {
                    event.preventDefault();
                    form.reportValidity();
                }
            });
        });
    </script>
</x-app-layout>
