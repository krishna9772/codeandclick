<x-app-layout>
    <x-slot name="header">
        <div class="flex w-full items-center">
            <a href="{{ route('our-work.index') }}" class="border border-blue-800 px-4 py-2 font-bold text-blue-800 rounded">
                Back to Our Work List
            </a>
            <h2 class="ml-auto text-right text-xl font-semibold leading-tight text-gray-800">
                {{ $pageTitle ?? 'Create New Work' }}
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

                    <form action="{{ route('our-work.store') }}" method="POST" enctype="multipart/form-data" id="ourWorkForm" class="space-y-8" novalidate>
                        @csrf

                        <div>
                            <label for="image" class="mb-2 block text-sm font-semibold text-gray-800">Featured Image</label>
                            <div id="imageFieldWrapper" class="rounded-2xl border border-dashed border-gray-300 p-4">
                                <div id="imagePreviewWrapper" class="hidden mb-4 overflow-hidden rounded-xl border border-gray-200">
                                    <img id="imagePreview" src="#" alt="Image preview" class="h-56 w-full object-cover">
                                </div>
                                <label for="image" class="inline-flex cursor-pointer items-center rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700">
                                    Choose image
                                </label>
                                <input id="image" name="image" type="file" class="hidden" accept=".jpeg,.jpg,.png,.gif,image/jpeg,image/png,image/gif" required>
                                <p id="imageFileName" class="mt-3 text-sm text-gray-500">JPG, JPEG, PNG, or GIF up to 5MB.</p>
                                <p id="imageError" class="mt-2 hidden text-sm text-red-500"></p>
                                @error('image')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="title" class="mb-2 block text-sm font-semibold text-gray-800">Title</label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}" maxlength="255" class="w-full rounded-lg border border-gray-300 p-3" required>
                            @error('title')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="serviceID" class="mb-2 block text-sm font-semibold text-gray-800">Type of Service</label>
                            <select name="serviceID" id="serviceID" class="w-full rounded-lg border border-gray-300 p-3" required>
                                <option value="" disabled {{ old('serviceID') ? '' : 'selected' }}>Select a service</option>
                                @foreach($services as $service)
                                    <option value="{{ $service->id }}" {{ (string) old('serviceID') === (string) $service->id ? 'selected' : '' }}>
                                        {{ $service->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('serviceID')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="type" class="mb-2 block text-sm font-semibold text-gray-800">Type of Our Work</label>
                            <select name="type" id="type" class="w-full rounded-lg border border-gray-300 p-3" required>
                                <option value="" disabled {{ old('type') ? '' : 'selected' }}>Select a work type</option>
                                <option value="branding-solution" {{ old('type') === 'branding-solution' ? 'selected' : '' }}>Branding Solution</option>
                                <option value="brand-strategy" {{ old('type') === 'brand-strategy' ? 'selected' : '' }}>Brand Strategy</option>
                                <option value="consultancy-integration-and-culture" {{ old('type') === 'consultancy-integration-and-culture' ? 'selected' : '' }}>Consultancy Integration and Culture</option>
                                <option value="brand-identity" {{ old('type') === 'brand-identity' ? 'selected' : '' }}>Brand Identity(Logo Design and Brand Book)</option>
                                <option value="marketing-services" {{ old('type') === 'marketing-services' ? 'selected' : '' }}>Marketing Services</option>
                                <option value="marketing-strategy" {{ old('type') === 'marketing-strategy' ? 'selected' : '' }}>Marketing Strategy and Consultancy Digital Marketing</option>
                                <option value="social-media" {{ old('type') === 'social-media' ? 'selected' : '' }}>Social Media</option>
                                <option value="search-engine-optimization" {{ old('type') === 'search-engine-optimization' ? 'selected' : '' }}>Search Engine Optimization(SEO)</option>
                                <option value="digital-optimization" {{ old('type') === 'digital-optimization' ? 'selected' : '' }}>Digital Optimization</option>
                                <option value="media-and-press" {{ old('type') === 'media-and-press' ? 'selected' : '' }}>Media and Press</option>
                                <option value="events-coverage-and-live-streaming" {{ old('type') === 'events-coverage-and-live-streaming' ? 'selected' : '' }}>Events Coverage and Live Streaming</option>
                                <option value="creative-design" {{ old('type') === 'creative-design' ? 'selected' : '' }}>Creative Design</option>
                                <option value="website-and-social-media-content" {{ old('type') === 'website-and-social-media-content' ? 'selected' : '' }}>Website and Social Media Content</option>
                                <option value="video-production" {{ old('type') === 'video-production' ? 'selected' : '' }}>Video Production</option>
                                <option value="motions" {{ old('type') === 'motions' ? 'selected' : '' }}>Motions</option>
                                <option value="photo-shooting" {{ old('type') === 'photo-shooting' ? 'selected' : '' }}>Photo Shooting</option>
                                <option value="mobile-app-development" {{ old('type') === 'mobile-app-development' ? 'selected' : '' }}>Mobile App Development</option>
                                <option value="web-design" {{ old('type') === 'web-design' ? 'selected' : '' }}>Web Design</option>
                            </select>
                            @error('type')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-6 border-t border-gray-200 pt-8">
                            <div>
                                <label for="content" class="mb-2 block text-sm font-semibold text-gray-800">Content</label>
                                <textarea name="content" id="content" class="w-full rounded-lg border border-gray-300 p-3" required data-required-message="The content field is required.">{{ old('content') }}</textarea>
                                <p id="content_error" class="hidden mt-2 text-sm text-red-500"></p>
                                @error('content')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="space-y-6 border-t border-gray-200 pt-8">
                            <div>
                                <label for="workImages" class="mb-2 block text-sm font-semibold text-gray-800">Work Images</label>
                                <div id="workImagesFieldWrapper" class="rounded-2xl border border-dashed border-gray-300 p-4">
                                    <div id="workImagesPreviewContainer" class="mb-4 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3"></div>
                                    <label for="workImages" class="inline-flex cursor-pointer items-center rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700">
                                        Choose work images
                                    </label>
                                    <input id="workImages" name="workImages[]" type="file" class="hidden" accept=".jpeg,.jpg,.png,.gif,image/jpeg,image/png,image/gif" multiple required>
                                    <p id="workImagesCount" class="mt-3 text-sm text-gray-500">JPG, JPEG, PNG, or GIF up to 5MB each.</p>
                                    <p id="workImages_error" class="mt-2 hidden text-sm text-red-500"></p>
                                    @error('workImages')
                                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                    @error('workImages.*')
                                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="space-y-6 border-t border-gray-200 pt-8">
                            <h3 class="text-lg font-semibold text-gray-900">Myanmar Content</h3>

                            <div>
                                <label for="title_mm" class="mb-2 block text-sm font-semibold text-gray-800">Title (Myanmar)</label>
                                <input type="text" name="title_mm" id="title_mm" value="{{ old('title_mm') }}" maxlength="255" class="w-full rounded-lg border border-gray-300 p-3">
                                @error('title_mm')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="content_mm" class="mb-2 block text-sm font-semibold text-gray-800">Content (Myanmar)</label>
                                <textarea name="content_mm" id="content_mm" class="w-full rounded-lg border border-gray-300 p-3">{{ old('content_mm') }}</textarea>
                                @error('content_mm')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex justify-end gap-3 border-t border-gray-200 pt-6">
                            <a href="{{ route('our-work.index') }}" class="rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">
                                Cancel
                            </a>
                            <button type="submit" class="rounded-md bg-blue-600 px-5 py-2 text-sm font-medium text-white hover:bg-blue-700">
                                Create Work
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

            const contentEditor = Jodit.make('#content', editorConfig);
            const contentMmEditor = Jodit.make('#content_mm', editorConfig);

            const form = document.getElementById('ourWorkForm');
            const imageInput = document.getElementById('image');
            const imageFieldWrapper = document.getElementById('imageFieldWrapper');
            const imagePreviewWrapper = document.getElementById('imagePreviewWrapper');
            const imagePreview = document.getElementById('imagePreview');
            const imageFileName = document.getElementById('imageFileName');
            const imageError = document.getElementById('imageError');
            const contentField = document.getElementById('content');
            const contentMmField = document.getElementById('content_mm');
            const workImagesInput = document.getElementById('workImages');
            const workImagesFieldWrapper = document.getElementById('workImagesFieldWrapper');
            const workImagesPreviewContainer = document.getElementById('workImagesPreviewContainer');
            const workImagesCount = document.getElementById('workImagesCount');
            const allowedImageTypes = ['image/jpeg', 'image/png', 'image/gif'];
            const maxImageSize = 5 * 1024 * 1024;
            let selectedWorkImages = [];

            function getPlainTextFromHtml(value) {
                const parser = new DOMParser();
                const doc = parser.parseFromString(value, 'text/html');
                return (doc.body.textContent || '').replace(/\u00A0/g, ' ').trim();
            }

            function getEditorContainer(field) {
                return field.parentElement.querySelector('.jodit-container');
            }

            function setInlineError(fieldId, message) {
                const errorElement = document.getElementById(fieldId + '_error');

                if (!errorElement) {
                    return;
                }

                errorElement.textContent = message || '';
                errorElement.classList.toggle('hidden', !message);
            }

            function resetHeaderPreview() {
                imagePreviewWrapper.classList.add('hidden');
                imagePreview.src = '#';
                imageFileName.textContent = 'JPG, JPEG, PNG, or GIF up to 5MB.';
            }

            function setImageError(message) {
                imageError.textContent = message || '';
                imageError.classList.toggle('hidden', !message);
                imageFieldWrapper.classList.toggle('border-red-300', Boolean(message));
            }

            function setWorkImagesError(message) {
                setInlineError('workImages', message || '');
                workImagesFieldWrapper.classList.toggle('border-red-300', Boolean(message));
            }

            function validateContentField() {
                contentField.value = contentEditor.value;
                const editorContainer = getEditorContainer(contentField);

                if (!getPlainTextFromHtml(contentField.value)) {
                    const message = contentField.dataset.requiredMessage || 'The content field is required.';
                    contentField.value = '';
                    setInlineError('content', message);
                    if (editorContainer) {
                        editorContainer.classList.add('border-red-500');
                    }
                    return false;
                }

                setInlineError('content', '');
                if (editorContainer) {
                    editorContainer.classList.remove('border-red-500');
                }
                return true;
            }

            function validateSingleImage() {
                setImageError('');

                if (!imageInput.files.length) {
                    resetHeaderPreview();
                    setImageError('The main image is required.');
                    return false;
                }

                const file = imageInput.files[0];

                if (!allowedImageTypes.includes(file.type)) {
                    imageInput.value = '';
                    resetHeaderPreview();
                    imageFileName.textContent = 'Only JPG, JPEG, PNG, and GIF files are allowed.';
                    setImageError('The main image must be a file of type: jpeg, png, jpg, gif.');
                    return false;
                }

                if (file.size > maxImageSize) {
                    imageInput.value = '';
                    resetHeaderPreview();
                    imageFileName.textContent = 'File is larger than 5MB.';
                    setImageError('The main image may not be greater than 5120 kilobytes.');
                    return false;
                }

                return true;
            }

            function validateWorkImages() {
                setWorkImagesError('');

                if (!selectedWorkImages.length) {
                    workImagesCount.textContent = 'JPG, JPEG, PNG, or GIF up to 5MB each.';
                    setWorkImagesError('Please upload at least one work image.');
                    return false;
                }

                for (const file of selectedWorkImages) {
                    if (!allowedImageTypes.includes(file.type)) {
                        setWorkImagesError('Each work image must be a file of type: jpeg, png, jpg, gif.');
                        return false;
                    }

                    if (file.size > maxImageSize) {
                        setWorkImagesError('Each work image may not be greater than 5120 kilobytes.');
                        return false;
                    }
                }

                return true;
            }

            function syncWorkImagesInput() {
                const dataTransfer = new DataTransfer();
                selectedWorkImages.forEach(function(file) {
                    dataTransfer.items.add(file);
                });
                workImagesInput.files = dataTransfer.files;
            }

            function renderWorkImages() {
                workImagesPreviewContainer.innerHTML = '';

                if (!selectedWorkImages.length) {
                    workImagesCount.textContent = 'JPG, JPEG, PNG, or GIF up to 5MB each.';
                    return;
                }

                workImagesCount.textContent = selectedWorkImages.length + ' file(s) chosen';

                selectedWorkImages.forEach(function(file, index) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        const previewDiv = document.createElement('div');
                        previewDiv.className = 'group relative';
                        previewDiv.innerHTML = `
                            <img src="${e.target.result}" alt="Work Image ${index + 1}" class="h-40 w-full rounded-lg border border-gray-200 object-cover">
                            <button type="button" class="remove-work-image-preview absolute right-2 top-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-red-500 text-white opacity-0 transition-opacity group-hover:opacity-100" data-index="${index}">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        `;
                        workImagesPreviewContainer.appendChild(previewDiv);
                    };

                    reader.readAsDataURL(file);
                });
            }

            contentEditor.events.on('change', validateContentField);

            imageInput.addEventListener('change', function() {
                if (!validateSingleImage()) {
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

            workImagesInput.addEventListener('change', function() {
                selectedWorkImages = Array.from(workImagesInput.files);
                renderWorkImages();
                validateWorkImages();
            });

            workImagesPreviewContainer.addEventListener('click', function(event) {
                const removeButton = event.target.closest('.remove-work-image-preview');

                if (!removeButton) {
                    return;
                }

                selectedWorkImages.splice(Number(removeButton.dataset.index), 1);
                syncWorkImagesInput();
                renderWorkImages();
                validateWorkImages();
            });

            form.addEventListener('submit', function(event) {
                const isContentValid = validateContentField();
                const isHeaderImageValid = validateSingleImage();
                const areWorkImagesValid = validateWorkImages();
                contentMmField.value = contentMmEditor.value;

                if (!isContentValid || !isHeaderImageValid || !areWorkImagesValid || !form.checkValidity()) {
                    event.preventDefault();

                    if (!isHeaderImageValid) {
                        imageFieldWrapper.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                    } else if (!areWorkImagesValid) {
                        workImagesFieldWrapper.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                    }
                }
            });
        });
    </script>
</x-app-layout>
