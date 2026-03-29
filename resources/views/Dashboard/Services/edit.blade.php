<x-app-layout>
    <x-slot name="header">
        <div class="flex w-full items-center">
            <a href="{{ route('services.index') }}" class="border border-blue-800 px-4 py-2 font-bold text-blue-800 rounded">
                Back to Services List
            </a>
            <h2 class="ml-auto text-right text-xl font-semibold leading-tight text-gray-800">
                Edit Service
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-5xl sm:px-6 lg:px-8">
            <div class="overflow-hidden rounded-lg bg-white shadow-sm">
                <div class="p-8">
                    @if ($errors->any())
                        <div class="mb-6 rounded-lg border border-red-200 bg-red-50 p-4 text-sm text-red-700">
                            <ul class="list-disc pl-5 space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data" id="serviceEditForm" class="space-y-8" novalidate>
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="image" class="mb-2 block text-sm font-semibold text-gray-800">Featured Image</label>
                            <div id="imageFieldWrapper" class="rounded-2xl border border-dashed border-gray-300 p-4">
                                <div id="imagePreviewWrapper" class="mb-4 overflow-hidden rounded-xl border border-gray-200 {{ $service->getFirstMediaUrl('services') ? '' : 'hidden' }}">
                                    <img id="imagePreview" src="{{ $service->getFirstMediaUrl('services') ?: '#' }}" alt="Image preview" class="h-56 w-full object-cover">
                                </div>
                                <label for="image" class="inline-flex cursor-pointer items-center rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700">
                                    Choose image
                                </label>
                                <input id="image" name="image" type="file" class="hidden" accept=".jpeg,.jpg,.png,.gif,image/jpeg,image/png,image/gif">
                                <p id="imageFileName" class="mt-3 text-sm text-gray-500">
                                    {{ $service->getFirstMedia('services') ? 'Current image selected. Upload a new file to replace it.' : 'JPG, JPEG, PNG, or GIF up to 5MB.' }}
                                </p>
                                <p id="imageError" class="mt-2 hidden text-sm text-red-500"></p>
                                @error('image')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="name" class="mb-2 block text-sm font-semibold text-gray-800">Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $service->name) }}" maxlength="255" class="w-full rounded-lg border border-gray-300 p-3" required>
                            @error('name')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="title" class="mb-2 block text-sm font-semibold text-gray-800">Title</label>
                            <input type="text" name="title" id="title" value="{{ old('title', $service->title) }}" maxlength="255" class="w-full rounded-lg border border-gray-300 p-3" required>
                            @error('title')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-6 border-t border-gray-200 pt-8">
                            <div>
                                <label for="main_content" class="mb-2 block text-sm font-semibold text-gray-800">Main Content</label>
                                <textarea name="main_content" id="main_content" class="w-full rounded-lg border border-gray-300 p-3" required data-required-message="The main content field is required.">{{ old('main_content', $service->main_content) }}</textarea>
                                <p id="main_content_error" class="hidden mt-2 text-sm text-red-500"></p>
                                @error('main_content')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="tagInput" class="mb-2 block text-sm font-semibold text-gray-800">Tags</label>
                                <div class="flex gap-3">
                                    <input type="text" id="tagInput" maxlength="255" class="w-full rounded-lg border border-gray-300 p-3" placeholder="Type a tag and click Add">
                                    <button id="addTag" type="button" class="rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700">
                                        Add
                                    </button>
                                </div>
                                <input type="hidden" name="tags" id="tags" value="{{ old('tags', $service->tags) }}" required data-required-message="The tags field is required.">
                                <p class="mt-2 text-sm text-gray-500">Add at least one tag.</p>
                                <div id="tagList" class="mt-3 flex flex-wrap gap-2"></div>
                                @error('tags')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="sub_content" class="mb-2 block text-sm font-semibold text-gray-800">Sub Content</label>
                                <textarea name="sub_content" id="sub_content" class="w-full rounded-lg border border-gray-300 p-3" required data-required-message="The sub content field is required.">{{ old('sub_content', $service->sub_content) }}</textarea>
                                <p id="sub_content_error" class="hidden mt-2 text-sm text-red-500"></p>
                                @error('sub_content')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="space-y-6 border-t border-gray-200 pt-8">
                            <h3 class="text-lg font-semibold text-gray-900">Myanmar Content</h3>

                            <div>
                                <label for="name_mm" class="mb-2 block text-sm font-semibold text-gray-800">Name (Myanmar)</label>
                                <input type="text" name="name_mm" id="name_mm" value="{{ old('name_mm', $service->name_mm) }}" maxlength="255" class="w-full rounded-lg border border-gray-300 p-3">
                                @error('name_mm')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="title_mm" class="mb-2 block text-sm font-semibold text-gray-800">Title (Myanmar)</label>
                                <input type="text" name="title_mm" id="title_mm" value="{{ old('title_mm', $service->title_mm) }}" maxlength="255" class="w-full rounded-lg border border-gray-300 p-3">
                                @error('title_mm')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="main_content_mm" class="mb-2 block text-sm font-semibold text-gray-800">Main Content (Myanmar)</label>
                                <textarea name="main_content_mm" id="main_content_mm" class="w-full rounded-lg border border-gray-300 p-3">{{ old('main_content_mm', $service->main_content_mm) }}</textarea>
                                @error('main_content_mm')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="tagInputMm" class="mb-2 block text-sm font-semibold text-gray-800">Tags (Myanmar)</label>
                                <div class="flex gap-3">
                                    <input type="text" id="tagInputMm" maxlength="255" class="w-full rounded-lg border border-gray-300 p-3" placeholder="Type a tag and click Add">
                                    <button id="addTagMm" type="button" class="rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700">
                                        Add
                                    </button>
                                </div>
                                <input type="hidden" name="tags_mm" id="tags_mm" value="{{ old('tags_mm', $service->tags_mm) }}">
                                <p class="mt-2 text-sm text-gray-500">Add Myanmar tags one by one.</p>
                                <div id="tagListMm" class="mt-3 flex flex-wrap gap-2"></div>
                                @error('tags_mm')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="sub_content_mm" class="mb-2 block text-sm font-semibold text-gray-800">Sub Content (Myanmar)</label>
                                <textarea name="sub_content_mm" id="sub_content_mm" class="w-full rounded-lg border border-gray-300 p-3">{{ old('sub_content_mm', $service->sub_content_mm) }}</textarea>
                                @error('sub_content_mm')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex justify-end gap-3 border-t border-gray-200 pt-6">
                            <a href="{{ route('services.index') }}" class="rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">
                                Cancel
                            </a>
                            <button type="submit" class="rounded-md bg-blue-600 px-5 py-2 text-sm font-medium text-white hover:bg-blue-700">
                                Update Service
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

            const mainContentEditor = Jodit.make('#main_content', editorConfig);
            const subContentEditor = Jodit.make('#sub_content', editorConfig);
            const mainContentMmEditor = Jodit.make('#main_content_mm', editorConfig);
            const subContentMmEditor = Jodit.make('#sub_content_mm', editorConfig);

            const form = document.getElementById('serviceEditForm');
            const imageInput = document.getElementById('image');
            const imageFieldWrapper = document.getElementById('imageFieldWrapper');
            const imagePreviewWrapper = document.getElementById('imagePreviewWrapper');
            const imagePreview = document.getElementById('imagePreview');
            const imageFileName = document.getElementById('imageFileName');
            const imageError = document.getElementById('imageError');
            const tagInput = document.getElementById('tagInput');
            const addTagButton = document.getElementById('addTag');
            const tagList = document.getElementById('tagList');
            const tagsInput = document.getElementById('tags');
            const tagInputMm = document.getElementById('tagInputMm');
            const addTagButtonMm = document.getElementById('addTagMm');
            const tagListMm = document.getElementById('tagListMm');
            const tagsInputMm = document.getElementById('tags_mm');
            const mainContentField = document.getElementById('main_content');
            const subContentField = document.getElementById('sub_content');
            const mainContentMmField = document.getElementById('main_content_mm');
            const subContentMmField = document.getElementById('sub_content_mm');
            const allowedImageTypes = ['image/jpeg', 'image/png', 'image/gif'];
            const maxImageSize = 5 * 1024 * 1024;
            let items = tagsInput.value ? tagsInput.value.split('/').filter(Boolean) : [];
            let itemsMm = tagsInputMm.value ? tagsInputMm.value.split('/').filter(Boolean) : [];

            function setImageError(message) {
                imageError.textContent = message || '';
                imageError.classList.toggle('hidden', !message);
                imageFieldWrapper.classList.toggle('border-red-300', Boolean(message));
            }

            function validateImage() {
                imageInput.setCustomValidity('');
                setImageError('');

                if (!imageInput.files || !imageInput.files[0]) {
                    imageFileName.textContent = 'Current image selected. Upload a new file to replace it.';
                    return true;
                }

                const file = imageInput.files[0];

                if (!allowedImageTypes.includes(file.type)) {
                    imageInput.value = '';
                    imageFileName.textContent = 'Only JPG, JPEG, PNG, and GIF files are allowed.';
                    const message = 'The image must be a file of type: jpeg, png, jpg, gif.';
                    imageInput.setCustomValidity(message);
                    setImageError(message);
                    return false;
                }

                if (file.size > maxImageSize) {
                    imageInput.value = '';
                    imageFileName.textContent = 'File is larger than 5MB.';
                    const message = 'The image may not be greater than 5120 kilobytes.';
                    imageInput.setCustomValidity(message);
                    setImageError(message);
                    return false;
                }

                return true;
            }

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

            function updateTagsValue(input, sourceInput, values, required) {
                input.value = values.join('/');

                if (!required) {
                    sourceInput.setCustomValidity('');
                    input.setCustomValidity('');
                    return;
                }

                const tagErrorMessage = values.length ? '' : (input.dataset.requiredMessage || 'Please add at least one tag.');
                input.setCustomValidity(tagErrorMessage);
                sourceInput.setCustomValidity(tagErrorMessage);
            }

            function renderTags(list, input, sourceInput, values, required) {
                list.innerHTML = '';

                values.forEach(function(item, index) {
                    const itemElement = document.createElement('div');
                    itemElement.className = 'flex items-center gap-2 rounded-full bg-blue-50 px-3 py-2 text-sm text-blue-800';
                    itemElement.innerHTML = `
                        <span>${item}</span>
                        <button type="button" class="remove-item inline-flex h-5 w-5 items-center justify-center rounded-full bg-blue-600 text-white hover:bg-red-600" data-index="${index}">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    `;
                    list.appendChild(itemElement);
                });

                updateTagsValue(input, sourceInput, values, required);
            }

            function addTag(sourceInput, values, list, input, required) {
                const value = sourceInput.value.trim();

                if (!value) {
                    return;
                }

                if (value.length > 255) {
                    sourceInput.setCustomValidity('Each tag may not be greater than 255 characters.');
                    sourceInput.reportValidity();
                    return;
                }

                sourceInput.setCustomValidity('');
                values.push(value);
                sourceInput.value = '';
                renderTags(list, input, sourceInput, values, required);
            }

            addTagButton.addEventListener('click', function() {
                addTag(tagInput, items, tagList, tagsInput, true);
            });

            addTagButtonMm.addEventListener('click', function() {
                addTag(tagInputMm, itemsMm, tagListMm, tagsInputMm, false);
            });

            tagInput.addEventListener('keypress', function(event) {
                if (event.key === 'Enter') {
                    event.preventDefault();
                    addTag(tagInput, items, tagList, tagsInput, true);
                }
            });

            tagInput.addEventListener('input', function() {
                tagInput.setCustomValidity('');
            });

            tagInputMm.addEventListener('keypress', function(event) {
                if (event.key === 'Enter') {
                    event.preventDefault();
                    addTag(tagInputMm, itemsMm, tagListMm, tagsInputMm, false);
                }
            });

            tagInputMm.addEventListener('input', function() {
                tagInputMm.setCustomValidity('');
            });

            tagList.addEventListener('click', function(event) {
                const removeButton = event.target.closest('.remove-item');

                if (!removeButton) {
                    return;
                }

                items.splice(Number(removeButton.dataset.index), 1);
                renderTags(tagList, tagsInput, tagInput, items, true);
            });

            tagListMm.addEventListener('click', function(event) {
                const removeButton = event.target.closest('.remove-item');

                if (!removeButton) {
                    return;
                }

                itemsMm.splice(Number(removeButton.dataset.index), 1);
                renderTags(tagListMm, tagsInputMm, tagInputMm, itemsMm, false);
            });

            mainContentEditor.events.on('change', function() {
                validateRichTextField(mainContentEditor, mainContentField);
            });

            subContentEditor.events.on('change', function() {
                validateRichTextField(subContentEditor, subContentField);
            });

            imageInput.addEventListener('change', function() {
                if (!validateImage()) {
                    imageInput.reportValidity();
                    return;
                }

                const file = this.files[0];
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreviewWrapper.classList.remove('hidden');
                    imageFileName.textContent = file.name;
                };
                reader.readAsDataURL(file);
            });

            form.addEventListener('submit', function(event) {
                const isMainContentValid = validateRichTextField(mainContentEditor, mainContentField);
                const isSubContentValid = validateRichTextField(subContentEditor, subContentField);
                mainContentMmField.value = mainContentMmEditor.value;
                subContentMmField.value = subContentMmEditor.value;

                updateTagsValue(tagsInput, tagInput, items, true);
                updateTagsValue(tagsInputMm, tagInputMm, itemsMm, false);

                const isImageValid = validateImage();

                if (!isMainContentValid || !isSubContentValid || !isImageValid || !form.checkValidity()) {
                    event.preventDefault();
                    form.reportValidity();
                }
            });

            renderTags(tagList, tagsInput, tagInput, items, true);
            renderTags(tagListMm, tagsInputMm, tagInputMm, itemsMm, false);
        });
    </script>
</x-app-layout>
