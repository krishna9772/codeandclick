<x-app-layout>
    <x-slot name="header">
        <a href="{{ route('testimornials.index') }}" class="border border-blue-800 text-blue-800 font-bold py-2 px-4 rounded">
            Back to Testimornial List
        </a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Testimornial
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
            <form action="{{ route('testimornials.update',$testimornial->id) }}" method="POST" enctype="multipart/form-data" id="testimornialForm" novalidate>
                        @csrf
                        @method("PUT")
                        <!-- Image Upload with Preview -->
                        <div class="mb-6">
                             <label for="image" class="block text-gray-700 font-bold mb-2">Image</label>
                      @error('image')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                            <!-- Image Preview Container -->
                            <div id="imagePreviewContainer" class="mb-4">
                                <img id="imagePreview" src="{{ asset($testimornial->getFirstMediaUrl('testimornials')) }}" alt="Image Preview" class=" w-full object-cover rounded-lg border border-gray-200">
                            </div>
                            
                            <div class="mt-1 flex items-center">
                                <label for="image" class="cursor-pointer bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    <span>Choose an image</span>
                                    <input id="image"  name="image" type="file" class="sr-only" accept=".jpeg,.jpg,.png,.gif,image/jpeg,image/png,image/gif" onchange="previewImage(this)">
                                </label>
                                <span id="fileName" class="ml-4 text-sm text-gray-600">No file chosen</span>
                            </div>
                            <p class="mt-1 text-sm text-gray-500">JPG, JPEG, PNG, or GIF (Max: 5MB)</p>
                            <p id="image_error" class="hidden text-red-500 text-sm mt-1"></p>
                        </div>
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
                        @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        <input type="text" name="name" id="name" maxlength="255" class="border border-gray-300 rounded w-full p-2" required value="{{ $testimornial->name }}">
                    </div> 
                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
                        @error('description')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        <textarea rows="10" name="description" id="description" class="border border-gray-300 rounded w-full p-2" required>{{ $testimornial->description }}</textarea>
                    </div>
                        <div class="flex justify-end gap-3 pt-6 border-t border-gray-100">
                            <a href="{{ url()->previous() }}" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Cancel
                            </a>
                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Edit Testimornial
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('testimornialForm');
            const imageInput = document.getElementById('image');
            const allowedImageTypes = ['image/jpeg', 'image/png', 'image/gif'];
            const maxImageSize = 5 * 1024 * 1024;

            function setImageError(message) {
                const errorElement = document.getElementById('image_error');
                imageInput.setCustomValidity(message || '');
                errorElement.textContent = message || '';
                errorElement.classList.toggle('hidden', !message);
            }

            function validateImage() {
                if (!imageInput.files.length) {
                    setImageError('');
                    return true;
                }

                const file = imageInput.files[0];

                if (!allowedImageTypes.includes(file.type)) {
                    setImageError('The image must be a file of type: jpeg, png, jpg, gif.');
                    return false;
                }

                if (file.size > maxImageSize) {
                    setImageError('The image may not be greater than 5120 kilobytes.');
                    return false;
                }

                setImageError('');
                return true;
            }

            imageInput.addEventListener('change', validateImage);

            form.addEventListener('submit', function(event) {
                const isImageValid = validateImage();

                if (!isImageValid || !form.checkValidity()) {
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
                    input.setCustomValidity('The image must be a file of type: jpeg, png, jpg, gif.');
                    errorElement.textContent = 'The image must be a file of type: jpeg, png, jpg, gif.';
                    errorElement.classList.remove('hidden');
                    input.reportValidity();
                    return;
                }

                if (file.size > maxImageSize) {
                    previewContainer.classList.add('hidden');
                    preview.src = '#';
                    fileName.textContent = 'File is larger than 5MB';
                    input.value = '';
                    input.setCustomValidity('The image may not be greater than 5120 kilobytes.');
                    errorElement.textContent = 'The image may not be greater than 5120 kilobytes.';
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
    </script>
</x-app-layout>
