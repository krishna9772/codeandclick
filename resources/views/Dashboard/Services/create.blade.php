<x-app-layout>
    <x-slot name="header">
        <a href="{{ route('services.index') }}" class="border border-blue-800 text-blue-800 font-bold py-2 px-4 rounded">
            Back to Services List
        </a>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create New Service
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

                <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data" id="serviceForm" novalidate>
                    @csrf
                    <div class="mb-6">
                        <label for="image" class="block text-gray-700 font-bold mb-2">Image</label>
                        @error('image')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror

                        <div id="imagePreviewContainer" class="hidden mb-4">
                            <img id="imagePreview" src="#" alt="Image Preview" class="w-full object-cover rounded-lg border border-gray-200">
                        </div>

                        <div class="mt-1 flex items-center">
                            <label for="image" class="cursor-pointer bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                <span>Choose an image</span>
                                <input id="image" name="image" type="file" class="sr-only" accept=".jpeg,.jpg,.png,.gif,image/jpeg,image/png,image/gif" onchange="previewImage(this)" required>
                            </label>
                            <span id="fileName" class="ml-4 text-sm text-gray-600">No file chosen</span>
                        </div>
                        <p class="mt-1 text-sm text-gray-500">JPG, JPEG, PNG, or GIF (Max: 5MB)</p>
                    </div>

                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
                        @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <input type="text" name="name" id="name" maxlength="255" class="border rounded w-full p-2 {{ $errors->has('name') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('name') }}" required>
                        <p class="mt-1 text-sm text-gray-500">Maximum 255 characters.</p>
                    </div>

                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 font-bold mb-2">Title</label>
                        @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <input type="text" name="title" id="title" maxlength="255" class="border rounded w-full p-2 {{ $errors->has('title') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('title') }}" required>
                        <p class="mt-1 text-sm text-gray-500">Maximum 255 characters.</p>
                    </div>

                    <div class="mb-4">
                        <label for="main_content" class="block text-gray-700 font-bold mb-2">Main Content</label>
                        @error('main_content')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <textarea rows="10" name="main_content" id="main_content" class="border rounded w-full p-2 {{ $errors->has('main_content') ? 'border-red-500' : 'border-gray-300' }}" required data-required-message="The main content field is required.">{{ old('main_content') }}</textarea>
                        <p id="main_content_error" class="hidden text-red-500 text-sm mt-1"></p>
                    </div>

                    <div class="mb-4">
                        <label for="tagInput" class="block text-gray-700 font-bold mb-2">Tags</label>
                        @error('tags')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <div class="flex gap-2">
                            <input type="text" id="tagInput" class="border border-gray-300 rounded w-full p-2" maxlength="255" placeholder="Type a tag and click Add">
                            <button id="addTag" type="button" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Add</button>
                        </div>
                        <input type="hidden" name="tags" id="tags" value="{{ old('tags') }}" required data-required-message="The tags field is required.">
                        <p class="mt-1 text-sm text-gray-500">Add at least one tag.</p>
                        <div id="tagList" class="py-2 flex flex-wrap gap-2"></div>
                    </div>

                    <div class="mb-4">
                        <label for="sub_content" class="block text-gray-700 font-bold mb-2">Sub Content</label>
                        @error('sub_content')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <textarea name="sub_content" id="sub_content" class="border h-[200px] rounded w-full p-2 {{ $errors->has('sub_content') ? 'border-red-500' : 'border-gray-300' }}" required data-required-message="The sub content field is required.">{{ old('sub_content') }}</textarea>
                        <p id="sub_content_error" class="hidden text-red-500 text-sm mt-1"></p>
                    </div>
                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Myanmar Content</h3>
                        <div class="mb-4">
                            <label for="name_mm" class="block text-gray-700 font-bold mb-2">Name (Myanmar)</label>
                            @error('name_mm')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                            <input type="text" name="name_mm" id="name_mm" maxlength="255" class="border rounded w-full p-2 {{ $errors->has('name_mm') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('name_mm') }}">
                        </div>
                        <div class="mb-4">
                            <label for="title_mm" class="block text-gray-700 font-bold mb-2">Title (Myanmar)</label>
                            @error('title_mm')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                            <input type="text" name="title_mm" id="title_mm" maxlength="255" class="border rounded w-full p-2 {{ $errors->has('title_mm') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('title_mm') }}">
                        </div>
                        <div class="mb-4">
                            <label for="main_content_mm" class="block text-gray-700 font-bold mb-2">Main Content (Myanmar)</label>
                            @error('main_content_mm')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                            <textarea rows="10" name="main_content_mm" id="main_content_mm" class="border rounded w-full p-2 {{ $errors->has('main_content_mm') ? 'border-red-500' : 'border-gray-300' }}">{{ old('main_content_mm') }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label for="tags_mm" class="block text-gray-700 font-bold mb-2">Tags (Myanmar)</label>
                            @error('tags_mm')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                            <textarea name="tags_mm" id="tags_mm" class="border rounded w-full p-2 {{ $errors->has('tags_mm') ? 'border-red-500' : 'border-gray-300' }}" placeholder="Use / between each tag">{{ old('tags_mm') }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label for="sub_content_mm" class="block text-gray-700 font-bold mb-2">Sub Content (Myanmar)</label>
                            @error('sub_content_mm')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                            <textarea name="sub_content_mm" id="sub_content_mm" class="border h-[200px] rounded w-full p-2 {{ $errors->has('sub_content_mm') ? 'border-red-500' : 'border-gray-300' }}">{{ old('sub_content_mm') }}</textarea>
                        </div>
                    </div>

                    <div class="flex justify-end gap-3 pt-6 border-t border-gray-100">
                        <a href="{{ url()->previous() }}" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Cancel
                        </a>
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Create Service
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jodit@latest/es2021/jodit.fat.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const subContentEditor = Jodit.make('#sub_content', {
                height: 400,
                buttons: ['bold', 'italic', 'underline', 'fontsize', 'link']
            });
            const subContentMmEditor = Jodit.make('#sub_content_mm', {
                height: 400,
                buttons: ['bold', 'italic', 'underline', 'fontsize', 'link']
            });

            const mainContentEditor = Jodit.make('#main_content', {
                height: 400,
                buttons: ['bold', 'italic', 'underline', 'fontsize', 'link']
            });
            const mainContentMmEditor = Jodit.make('#main_content_mm', {
                height: 400,
                buttons: ['bold', 'italic', 'underline', 'fontsize', 'link']
            });

            const form = document.getElementById('serviceForm');
            const imageInput = document.getElementById('image');
            const mainContentField = document.getElementById('main_content');
            const mainContentMmField = document.getElementById('main_content_mm');
            const subContentField = document.getElementById('sub_content');
            const subContentMmField = document.getElementById('sub_content_mm');
            const tagsInput = document.getElementById('tags');
            const tagList = document.getElementById('tagList');
            const tagInput = document.getElementById('tagInput');
            const addTagButton = document.getElementById('addTag');
            const allowedImageTypes = ['image/jpeg', 'image/png', 'image/gif'];
            const maxImageSize = 5 * 1024 * 1024;
            let items = tagsInput.value ? tagsInput.value.split('/').filter(Boolean) : [];

            function getPlainTextFromHtml(value) {
                const parser = new DOMParser();
                const doc = parser.parseFromString(value, 'text/html');
                return (doc.body.textContent || '').replace(/\u00A0/g, ' ').trim();
            }

            function syncEditorContent(editor, field) {
                field.value = editor.value;
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
                syncEditorContent(editor, field);

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

            function updateTagsValue() {
                tagsInput.value = items.join('/');
                const tagErrorMessage = items.length ? '' : (tagsInput.dataset.requiredMessage || 'Please add at least one tag.');
                tagsInput.setCustomValidity(tagErrorMessage);
                tagInput.setCustomValidity(tagErrorMessage);
            }

            function renderTags() {
                tagList.innerHTML = '';

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
                    tagList.appendChild(itemElement);
                });

                updateTagsValue();
            }

            function addTag() {
                const value = tagInput.value.trim();

                if (!value) {
                    return;
                }

                if (value.length > 255) {
                    tagInput.setCustomValidity('Each tag may not be greater than 255 characters.');
                    tagInput.reportValidity();
                    return;
                }

                tagInput.setCustomValidity('');
                items.push(value);
                tagInput.value = '';
                renderTags();
            }

            addTagButton.addEventListener('click', addTag);

            tagInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    addTag();
                }
            });

            tagInput.addEventListener('input', function() {
                tagInput.setCustomValidity('');
            });

            tagList.addEventListener('click', function(e) {
                const removeButton = e.target.closest('.remove-item');

                if (!removeButton) {
                    return;
                }

                items.splice(Number(removeButton.dataset.index), 1);
                renderTags();
            });

            renderTags();

            mainContentEditor.events.on('change', function() {
                validateRichTextField(mainContentEditor, mainContentField);
            });

            subContentEditor.events.on('change', function() {
                validateRichTextField(subContentEditor, subContentField);
            });

            form.addEventListener('submit', function(event) {
                const isMainContentValid = validateRichTextField(mainContentEditor, mainContentField);
                const isSubContentValid = validateRichTextField(subContentEditor, subContentField);
                mainContentMmField.value = mainContentMmEditor.value;
                subContentMmField.value = subContentMmEditor.value;

                if (imageInput.files.length > 0) {
                    const file = imageInput.files[0];

                    if (!allowedImageTypes.includes(file.type)) {
                        imageInput.setCustomValidity('The image must be a file of type: jpeg, png, jpg, gif.');
                    } else if (file.size > maxImageSize) {
                        imageInput.setCustomValidity('The image may not be greater than 5120 kilobytes.');
                    } else {
                        imageInput.setCustomValidity('');
                    }
                } else {
                    imageInput.setCustomValidity('Please choose an image.');
                }

                updateTagsValue();

                if (!isMainContentValid || !isSubContentValid || !form.checkValidity()) {
                    event.preventDefault();
                    form.reportValidity();
                }
            });
        });

        function previewImage(input) {
            const previewContainer = document.getElementById('imagePreviewContainer');
            const preview = document.getElementById('imagePreview');
            const fileName = document.getElementById('fileName');
            const allowedImageTypes = ['image/jpeg', 'image/png', 'image/gif'];
            const maxImageSize = 5 * 1024 * 1024;

            input.setCustomValidity('');

            if (input.files && input.files[0]) {
                const file = input.files[0];

                if (!allowedImageTypes.includes(file.type)) {
                    previewContainer.classList.add('hidden');
                    preview.src = '#';
                    fileName.textContent = 'Only JPG, JPEG, PNG, and GIF files are allowed';
                    input.value = '';
                    input.setCustomValidity('The image must be a file of type: jpeg, png, jpg, gif.');
                    input.reportValidity();
                    return;
                }

                if (file.size > maxImageSize) {
                    previewContainer.classList.add('hidden');
                    preview.src = '#';
                    fileName.textContent = 'File is larger than 5MB';
                    input.value = '';
                    input.setCustomValidity('The image may not be greater than 5120 kilobytes.');
                    input.reportValidity();
                    return;
                }

                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    previewContainer.classList.remove('hidden');
                    fileName.textContent = file.name;
                };

                reader.readAsDataURL(file);
                return;
            }

            previewContainer.classList.add('hidden');
            preview.src = '#';
            fileName.textContent = 'No file chosen';
        }
    </script>
</x-app-layout>
