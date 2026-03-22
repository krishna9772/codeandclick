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

                <form action="{{ route('our-work.store') }}" method="POST" enctype="multipart/form-data" id="ourWorkForm" novalidate>
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
                                <input id="image" name="image" type="file" class="sr-only" accept=".jpeg,.jpg,.png,.gif,image/jpeg,image/png,image/gif" onchange="previewImage(this)" required>
                            </label>
                            <span id="fileName" class="ml-4 text-sm text-gray-600">No file chosen</span>
                        </div>
                        <p class="mt-1 text-sm text-gray-500">JPG, JPEG, PNG, or GIF (Max: 5MB)</p>
                        <p id="image_error" class="hidden text-red-500 text-sm mt-1"></p>
                    </div>


                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 font-bold mb-2">Title</label>
                        @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <input type="text" name="title" id="title" maxlength="255" class="border rounded w-full p-2 {{ $errors->has('title') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('title') }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 font-bold mb-2">Type of Service</label>
                        @error('serviceID')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <select name="serviceID" required class="border rounded w-full p-2 {{ $errors->has('serviceID') ? 'border-red-500' : 'border-gray-300' }}">
                            <option value="" disabled {{ old('serviceID') ? '' : 'selected' }}>Select a service</option>
                            @foreach($services as $service)
                            <option value="{{$service->id}}" {{ (string) old('serviceID') === (string) $service->id ? 'selected' : '' }}>{{$service->name}}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="mb-4">
                        <label for="type" class="block text-gray-700 font-bold mb-2">Type of Our Work</label>
                        @error('type')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <select name="type" required class="border rounded w-full p-2 {{ $errors->has('type') ? 'border-red-500' : 'border-gray-300' }}">
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
                    </div>

                    <div class="mb-4">
                        <label for="content" class="block text-gray-700 font-bold mb-2">Content</label>
                        @error('content')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <textarea name="content" id="content" class="border h-[200px] rounded w-full p-2 {{ $errors->has('content') ? 'border-red-500' : 'border-gray-300' }}" required data-required-message="The content field is required.">{{ old('content') }}</textarea>
                        <p id="content_error" class="hidden text-red-500 text-sm mt-1"></p>
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
                                <input id="workImages" name="workImages[]" type="file" class="sr-only" accept=".jpeg,.jpg,.png,.gif,image/jpeg,image/png,image/gif" multiple onchange="previewWorkImages(this)" required>
                            </label>
                            <span id="workImagesCount" class="ml-4 text-sm text-gray-600">No files chosen</span>
                        </div>
                        <p class="mt-1 text-sm text-gray-500">JPG, JPEG, PNG, or GIF (Max: 5MB per image, multiple files allowed)</p>
                        <p id="workImages_error" class="hidden text-red-500 text-sm mt-1"></p>
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
    <script src="https://cdn.jsdelivr.net/npm/jodit@latest/es2021/jodit.fat.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editor = Jodit.make('#content', {
                height: 400,
                buttons: ['bold', 'italic', 'underline', 'fontsize', 'link']
            });

            const form = document.getElementById('ourWorkForm');
            const imageInput = document.getElementById('image');
            const contentField = document.getElementById('content');
            const workImagesInput = document.getElementById('workImages');
            const workImagesPreviewContainer = document.getElementById('workImagesPreviewContainer');
            const allowedImageTypes = ['image/jpeg', 'image/png', 'image/gif'];
            const maxImageSize = 5 * 1024 * 1024;
            let selectedWorkImages = [];

            function getPlainTextFromHtml(value) {
                const parser = new DOMParser();
                const doc = parser.parseFromString(value, 'text/html');
                return (doc.body.textContent || '').replace(/\u00A0/g, ' ').trim();
            }

            function getEditorContainer(field) {
                return field.closest('.mb-4')?.querySelector('.jodit-container');
            }

            function setInlineError(fieldId, message) {
                const errorElement = document.getElementById(`${fieldId}_error`);

                if (!errorElement) {
                    return;
                }

                errorElement.textContent = message || '';
                errorElement.classList.toggle('hidden', !message);
            }

            function validateContentField() {
                contentField.value = editor.value;
                const editorContainer = getEditorContainer(contentField);

                if (!getPlainTextFromHtml(contentField.value)) {
                    const message = contentField.dataset.requiredMessage || 'The content field is required.';
                    contentField.value = '';
                    contentField.setCustomValidity(message);
                    setInlineError('content', message);
                    if (editorContainer) {
                        editorContainer.classList.add('border-red-500');
                    }
                    return false;
                }

                contentField.setCustomValidity('');
                setInlineError('content', '');
                if (editorContainer) {
                    editorContainer.classList.remove('border-red-500');
                }
                return true;
            }

            function setFileError(input, fieldId, message) {
                input.setCustomValidity(message || '');
                setInlineError(fieldId, message || '');
            }

            function validateSingleImage() {
                if (!imageInput.files.length) {
                    setFileError(imageInput, 'image', 'Please choose an image.');
                    return false;
                }

                const file = imageInput.files[0];

                if (!allowedImageTypes.includes(file.type)) {
                    setFileError(imageInput, 'image', 'The main image must be a file of type: jpeg, png, jpg, gif.');
                    return false;
                }

                if (file.size > maxImageSize) {
                    setFileError(imageInput, 'image', 'The main image may not be greater than 5120 kilobytes.');
                    return false;
                }

                setFileError(imageInput, 'image', '');
                return true;
            }

            function validateWorkImages() {
                if (!selectedWorkImages.length) {
                    setFileError(workImagesInput, 'workImages', 'Please upload at least one work image.');
                    return false;
                }

                for (const file of selectedWorkImages) {
                    if (!allowedImageTypes.includes(file.type)) {
                        setFileError(workImagesInput, 'workImages', 'Each work image must be a file of type: jpeg, png, jpg, gif.');
                        return false;
                    }

                    if (file.size > maxImageSize) {
                        setFileError(workImagesInput, 'workImages', 'Each work image may not be greater than 5120 kilobytes.');
                        return false;
                    }
                }

                setFileError(workImagesInput, 'workImages', '');
                return true;
            }

            function syncWorkImagesInput() {
                const dataTransfer = new DataTransfer();
                selectedWorkImages.forEach((file) => dataTransfer.items.add(file));
                workImagesInput.files = dataTransfer.files;
            }

            editor.events.on('change', validateContentField);
            imageInput.addEventListener('change', validateSingleImage);
            workImagesInput.addEventListener('change', function() {
                selectedWorkImages = Array.from(workImagesInput.files);
                validateWorkImages();
            });

            workImagesPreviewContainer.addEventListener('click', function(event) {
                const removeButton = event.target.closest('.remove-work-image-preview');

                if (!removeButton) {
                    return;
                }

                selectedWorkImages.splice(Number(removeButton.dataset.index), 1);
                syncWorkImagesInput();
                previewWorkImages(workImagesInput);
                validateWorkImages();
            });

            form.addEventListener('submit', function(event) {
                const isContentValid = validateContentField();
                const isImageValid = validateSingleImage();
                const areWorkImagesValid = validateWorkImages();

                if (!isContentValid || !isImageValid || !areWorkImagesValid || !form.checkValidity()) {
                    event.preventDefault();
                    form.reportValidity();
                }
            });
        });

        function previewImage(input) {
            const previewContainer = document.getElementById('imagePreviewContainer');
            const preview = document.getElementById('imagePreview');
            const fileName = document.getElementById('fileName');
            const errorElement = document.getElementById('image_error');
            const allowedImageTypes = ['image/jpeg', 'image/png', 'image/gif'];
            const maxImageSize = 5 * 1024 * 1024;

            input.setCustomValidity('');
            errorElement.classList.add('hidden');
            errorElement.textContent = '';

            if (input.files && input.files[0]) {
                const file = input.files[0];

                if (!allowedImageTypes.includes(file.type)) {
                    previewContainer.classList.add('hidden');
                    preview.src = '#';
                    fileName.textContent = 'Only JPG, JPEG, PNG, and GIF files are allowed';
                    input.value = '';
                    input.setCustomValidity('The main image must be a file of type: jpeg, png, jpg, gif.');
                    errorElement.textContent = 'The main image must be a file of type: jpeg, png, jpg, gif.';
                    errorElement.classList.remove('hidden');
                    input.reportValidity();
                    return;
                }

                if (file.size > maxImageSize) {
                    previewContainer.classList.add('hidden');
                    preview.src = '#';
                    fileName.textContent = 'File is larger than 5MB';
                    input.value = '';
                    input.setCustomValidity('The main image may not be greater than 5120 kilobytes.');
                    errorElement.textContent = 'The main image may not be greater than 5120 kilobytes.';
                    errorElement.classList.remove('hidden');
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
            } else {
                previewContainer.classList.add('hidden');
                preview.src = '#';
                fileName.textContent = 'No file chosen';
            }
        }

        function previewWorkImages(input) {
            const previewContainer = document.getElementById('workImagesPreviewContainer');
            const countSpan = document.getElementById('workImagesCount');
            const errorElement = document.getElementById('workImages_error');
            const allowedImageTypes = ['image/jpeg', 'image/png', 'image/gif'];
            const maxImageSize = 5 * 1024 * 1024;

            input.setCustomValidity('');
            errorElement.classList.add('hidden');
            errorElement.textContent = '';
            previewContainer.innerHTML = '';

            if (input.files && input.files.length > 0) {
                let validFilesCount = 0;
                let hasInvalidType = false;
                let hasOversizedFile = false;

                Array.from(input.files).forEach((file, index) => {
                    if (!allowedImageTypes.includes(file.type)) {
                        hasInvalidType = true;
                        return;
                    }

                    if (file.size > maxImageSize) {
                        hasOversizedFile = true;
                        return;
                    }

                    validFilesCount++;

                    const reader = new FileReader();

                    reader.onload = function(e) {
                        const previewDiv = document.createElement('div');
                        previewDiv.className = 'relative group';
                        previewDiv.innerHTML = `
                    <img src="${e.target.result}" alt="Work Image ${index + 1}" class="w-full h-32 object-cover rounded-lg border border-gray-200">
                    <button type="button" class="absolute top-2 right-2 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity remove-work-image-preview" data-index="${index}">
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

                if (hasInvalidType) {
                    input.setCustomValidity('Each work image must be a file of type: jpeg, png, jpg, gif.');
                    errorElement.textContent = 'Each work image must be a file of type: jpeg, png, jpg, gif.';
                    errorElement.classList.remove('hidden');
                } else if (hasOversizedFile) {
                    input.setCustomValidity('Each work image may not be greater than 5120 kilobytes.');
                    errorElement.textContent = 'Each work image may not be greater than 5120 kilobytes.';
                    errorElement.classList.remove('hidden');
                }
            } else {
                input.setCustomValidity('Please upload at least one work image.');
                countSpan.textContent = 'No files chosen';
            }
        }
    </script>
</x-app-layout>
