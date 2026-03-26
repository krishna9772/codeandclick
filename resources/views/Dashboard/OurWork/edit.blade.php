<x-app-layout>
    <x-slot name="header">
        <a href="{{ route('our-work.index') }}" class="border border-blue-800 text-blue-800 font-bold py-2 px-4 rounded">
            Back to Our Work List
        </a>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Our Work
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

                <form action="{{ route('our-work.update',$ourwork->id) }}" method="POST" enctype="multipart/form-data" id="ourWorkForm" novalidate>
                    @csrf
                    @method('PUT')

                    <!-- Image Upload with Preview -->
                    <div class="mb-6">
                        <label for="image" class="block text-gray-700 font-bold mb-2">Image</label>
                        @error('image')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror

                        <!-- Image Preview Container -->
                        <div id="imagePreviewContainer" class="mb-4">
                            <img id="imagePreview" src="{{ asset($ourwork->getFirstMediaUrl('ourwork-header')) }}" alt="Image Preview" class=" w-full object-cover rounded-lg border border-gray-200">
                        </div>

                        <div class="mt-1 flex items-center">
                            <label for="image" class="cursor-pointer bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                <span>Choose an image</span>
                                <input id="image" name="image" type="file" class="sr-only" accept=".jpeg,.jpg,.png,.gif,image/jpeg,image/png,image/gif" onchange="previewImage(this)">
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
                        <input type="text" name="title" id="title" maxlength="255" class="border rounded w-full p-2 {{ $errors->has('title') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('title',$ourwork->title) }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 font-bold mb-2">Type of Service</label>
                        @error('serviceID')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <select name="serviceID" required class="border rounded w-full p-2 {{ $errors->has('serviceID') ? 'border-red-500' : 'border-gray-300' }}">
                            <option value="" disabled {{ old('serviceID', $ourwork->serviceID) ? '' : 'selected' }}>Select a service</option>
                            @foreach($services as $service)
                            <option {{ old('serviceID', $ourwork->serviceID) === $service->id ? 'selected' : '' }} value="{{$service->id}}">{{$service->name}}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="mb-4">
                        <label for="type" class="block text-gray-700 font-bold mb-2">Type of Our Work</label>
                        @error('type')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <select name="type" required class="border rounded w-full p-2 {{ $errors->has('type') ? 'border-red-500' : 'border-gray-300' }}">
                            <option value="" disabled {{ old('type', $ourwork->type) ? '' : 'selected' }}>Select a work type</option>

                            <option {{ old('type', $ourwork->type) === 'branding-solution' ? 'selected' : '' }} value="branding-solution">Branding Solution</option>
                            <option {{ old('type', $ourwork->type) === 'brand-strategy' ? 'selected' : '' }} value="brand-strategy">Brand Strategy</option>
                            <option {{ old('type', $ourwork->type) === 'consultancy-integration-and-culture' ? 'selected' : '' }} value="consultancy-integration-and-culture">Consultancy Integration and Culture</option>
                            <option {{ old('type', $ourwork->type) === 'brand-identity' ? 'selected' : '' }} value="brand-identity">Brand Identity(Logo Design and Brand Book)</option>
                            <option {{ old('type', $ourwork->type) === 'marketing-services' ? 'selected' : '' }} value="marketing-services">Marketing Services</option>
                            <option {{ old('type', $ourwork->type) === 'marketing-strategy' ? 'selected' : '' }} value="marketing-strategy">Marketing Strategy and Consultancy Digital Marketing</option>
                            <option {{ old('type', $ourwork->type) === 'social-media' ? 'selected' : '' }} value="social-media">Social Media</option>
                            <option {{ old('type', $ourwork->type) === 'search-engine-optimization' ? 'selected' : '' }} value="search-engine-optimization">Search Engine Optimization(SEO)</option>
                            <option {{ old('type', $ourwork->type) === 'digital-optimization' ? 'selected' : '' }} value="digital-optimization">Digital Optimization</option>
                            <option {{ old('type', $ourwork->type) === 'media-and-press' ? 'selected' : '' }} value="media-and-press">Media and Press</option>
                            <option {{ old('type', $ourwork->type) === 'events-coverage-and-live-streaming' ? 'selected' : '' }} value="events-coverage-and-live-streaming">Events Coverage and Live Streaming</option>
                            <option {{ old('type', $ourwork->type) === 'creative-design' ? 'selected' : '' }} value="creative-design">Creative Design</option>
                            <option {{ old('type', $ourwork->type) === 'website-and-social-media-content' ? 'selected' : '' }} value="website-and-social-media-content">Website and Social Media Content</option>
                            <option {{ old('type', $ourwork->type) === 'video-production' ? 'selected' : '' }} value="video-production">Video Production</option>
                            <option {{ old('type', $ourwork->type) === 'motions' ? 'selected' : '' }} value="motions">Motions</option>
                            <option {{ old('type', $ourwork->type) === 'photo-shooting' ? 'selected' : '' }} value="photo-shooting">Photo Shooting</option>
                            <option {{ old('type', $ourwork->type) === 'mobile-app-development' ? 'selected' : '' }} value="mobile-app-development">Mobile App Development</option>
                            <option {{ old('type', $ourwork->type) === 'web-design' ? 'selected' : '' }} value="web-design">Web Design</option>
                        </select>
                    </div>


                    <div class="mb-4">
                        <label for="content" class="block text-gray-700 font-bold mb-2">Content</label>
                        @error('content')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <textarea name="content" id="content" class="border h-[200px] rounded w-full p-2 {{ $errors->has('content') ? 'border-red-500' : 'border-gray-300' }}" required data-required-message="The content field is required.">{{ old('content',$ourwork->content) }}</textarea>
                        <p id="content_error" class="hidden text-red-500 text-sm mt-1"></p>
                    </div>

                    <div class="mb-6">
                        <label for="workImages" class="block text-gray-700 font-bold mb-2">Work Images</label>
                        @error('workImages')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        @error('remove_work_images.*')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror

                        <!-- Multiple Image Preview Container -->
                        <div id="workImagesPreviewContainer" class="mb-4 grid grid-cols-3 gap-4">
                            @if ($ourwork->hasMedia('ourwork-images'))
                            @foreach ($ourwork->getMedia('ourwork-images') as $media)
                            <div class="relative group existing-work-image" data-media-id="{{ $media->id }}">
                                <img
                                    src="{{ $media->getUrl() }}"
                                    alt="Our Work Image"
                                    class="w-full h-32 object-cover rounded-lg border border-gray-200">
                                <button type="button" class="absolute top-2 right-2 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity remove-existing-work-image" data-media-id="{{ $media->id }}">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                            @endforeach
                            @endif

                        </div>
                        <div id="removedWorkImages"></div>

                        <div class="mt-1">
                            <label for="workImages" class="cursor-pointer bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 inline-block">
                                <span>Choose Work Images</span>
                                <input id="workImages" name="workImages[]" type="file" class="sr-only" accept=".jpeg,.jpg,.png,.gif,image/jpeg,image/png,image/gif" multiple onchange="previewWorkImages(this)">
                            </label>
                            <span id="workImagesCount" class="ml-4 text-sm text-gray-600">No files chosen</span>
                        </div>
                        <p class="mt-1 text-sm text-gray-500">JPG, JPEG, PNG, or GIF (Max: 5MB per image, multiple files allowed)</p>
                        <p id="workImages_error" class="hidden text-red-500 text-sm mt-1"></p>
                    </div>
                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Myanmar Content</h3>
                        <div class="mb-4">
                            <label for="title_mm" class="block text-gray-700 font-bold mb-2">Title (Myanmar)</label>
                            @error('title_mm')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                            <input type="text" name="title_mm" id="title_mm" maxlength="255" class="border rounded w-full p-2 {{ $errors->has('title_mm') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('title_mm',$ourwork->title_mm) }}">
                        </div>
                        <div class="mb-4">
                            <label for="content_mm" class="block text-gray-700 font-bold mb-2">Content (Myanmar)</label>
                            @error('content_mm')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                            <textarea name="content_mm" id="content_mm" class="border h-[200px] rounded w-full p-2 {{ $errors->has('content_mm') ? 'border-red-500' : 'border-gray-300' }}">{{ old('content_mm',$ourwork->content_mm) }}</textarea>
                        </div>
                    </div>


                    <div class="flex justify-end gap-3 pt-6 border-t border-gray-100">
                        <a href="{{ url()->previous() }}" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Cancel
                        </a>
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Edit Work
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
            const mmEditor = Jodit.make('#content_mm', {
                height: 400,
                buttons: ['bold', 'italic', 'underline', 'fontsize', 'link']
            });

            const form = document.getElementById('ourWorkForm');
            const imageInput = document.getElementById('image');
            const contentField = document.getElementById('content');
            const contentMmField = document.getElementById('content_mm');
            const workImagesInput = document.getElementById('workImages');
            const workImagesPreviewContainer = document.getElementById('workImagesPreviewContainer');
            const removedWorkImagesContainer = document.getElementById('removedWorkImages');
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
                    setFileError(imageInput, 'image', '');
                    return true;
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
                    setFileError(workImagesInput, 'workImages', '');
                    return true;
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

            function appendRemovedWorkImage(mediaId) {
                if (removedWorkImagesContainer.querySelector(`input[value="${mediaId}"]`)) {
                    return;
                }

                const hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = 'remove_work_images[]';
                hiddenInput.value = mediaId;
                removedWorkImagesContainer.appendChild(hiddenInput);
            }

            editor.events.on('change', validateContentField);
            imageInput.addEventListener('change', validateSingleImage);
            workImagesInput.addEventListener('change', function() {
                selectedWorkImages = Array.from(workImagesInput.files);
                validateWorkImages();
            });

            workImagesPreviewContainer.addEventListener('click', function(event) {
                const removeExistingButton = event.target.closest('.remove-existing-work-image');
                const removeNewButton = event.target.closest('.remove-work-image-preview');

                if (removeExistingButton) {
                    appendRemovedWorkImage(removeExistingButton.dataset.mediaId);
                    removeExistingButton.closest('.existing-work-image')?.remove();
                    return;
                }

                if (!removeNewButton) {
                    return;
                }

                selectedWorkImages.splice(Number(removeNewButton.dataset.index), 1);
                syncWorkImagesInput();
                previewWorkImages(workImagesInput);
                validateWorkImages();
            });

            form.addEventListener('submit', function(event) {
                const isContentValid = validateContentField();
                const isImageValid = validateSingleImage();
                const areWorkImagesValid = validateWorkImages();
                contentMmField.value = mmEditor.value;

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
                previewContainer.classList.remove('hidden');
                fileName.textContent = 'No file chosen';
            }
        }

        function previewWorkImages(input) {
            const previewContainer = document.getElementById('workImagesPreviewContainer');
            const countSpan = document.getElementById('workImagesCount');
            const errorElement = document.getElementById('workImages_error');
            const allowedImageTypes = ['image/jpeg', 'image/png', 'image/gif'];
            const maxImageSize = 5 * 1024 * 1024;
            const existingWorkImages = Array.from(previewContainer.querySelectorAll('.existing-work-image'));

            input.setCustomValidity('');
            errorElement.classList.add('hidden');
            errorElement.textContent = '';

            previewContainer.innerHTML = '';
            existingWorkImages.forEach((element) => previewContainer.appendChild(element));

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
                        previewDiv.className = 'relative group new-work-image';
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
                    (existingWorkImages.length ? 'No new files chosen' : 'No valid files (max 5MB each)');

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
                countSpan.textContent = existingWorkImages.length ? 'No new files chosen' : 'No files chosen';
            }
        }
    </script>
</x-app-layout>
