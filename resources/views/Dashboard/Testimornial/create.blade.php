<x-app-layout>
    <x-slot name="header">
        <div class="flex w-full items-center">
            <a href="{{ route('testimornials.index') }}" class="rounded border border-blue-800 px-4 py-2 font-bold text-blue-800">
                Back to Testimornial List
            </a>
            <h2 class="ml-auto text-right text-xl font-semibold leading-tight text-gray-800">
                {{ $pageTitle ?? 'Create New Testimornial' }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-5xl sm:px-6 lg:px-8">
            <div class="overflow-hidden rounded-lg bg-white shadow-sm">
                <div class="p-8">
                    <form action="{{ route('testimornials.store') }}" method="POST" enctype="multipart/form-data" id="testimornialForm" class="space-y-8" novalidate>
                        @csrf

                        <div id="imageFieldWrapper">
                            <label for="image" class="mb-2 block text-sm font-semibold text-gray-800">Featured Image</label>

                            <div id="imageUploadBox" class="rounded-3xl border border-dashed border-gray-300 p-6 transition-colors">
                                <div id="imagePreviewContainer" class="mb-4 hidden overflow-hidden rounded-2xl">
                                    <img id="imagePreview" src="#" alt="Image Preview" class="h-64 w-full object-cover">
                                </div>

                                <div class="flex flex-col gap-4">
                                    <div>
                                        <label for="image" class="inline-flex cursor-pointer items-center rounded-xl bg-blue-600 px-5 py-3 text-base font-semibold text-white hover:bg-blue-700">
                                            Choose image
                                        </label>
                                        <input id="image" name="image" type="file" class="sr-only" accept=".jpeg,.jpg,.png,.gif,image/jpeg,image/png,image/gif" required>
                                    </div>

                                    <div class="text-sm text-gray-500">
                                        <p id="fileName">JPG, JPEG, PNG, or GIF up to 5MB.</p>
                                    </div>
                                </div>
                            </div>

                            <p id="image_error" class="mt-2 hidden text-sm text-red-500"></p>
                            @error('image')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="name" class="mb-2 block text-sm font-semibold text-gray-800">Name</label>
                            <input type="text" name="name" id="name" maxlength="255" class="w-full rounded-lg border border-gray-300 p-3" value="{{ old('name') }}" required>
                            @error('name')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="description" class="mb-2 block text-sm font-semibold text-gray-800">Description</label>
                            <textarea rows="10" name="description" id="description" class="w-full rounded-lg border border-gray-300 p-3" required>{{ old('description') }}</textarea>
                            @error('description')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-6 border-t border-gray-200 pt-8">
                            <h3 class="text-lg font-semibold text-gray-900">Myanmar Content</h3>

                            <div>
                                <label for="name_mm" class="mb-2 block text-sm font-semibold text-gray-800">Name (Myanmar)</label>
                                <input type="text" name="name_mm" id="name_mm" maxlength="255" class="w-full rounded-lg border border-gray-300 p-3" value="{{ old('name_mm') }}">
                                @error('name_mm')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="description_mm" class="mb-2 block text-sm font-semibold text-gray-800">Description (Myanmar)</label>
                                <textarea rows="10" name="description_mm" id="description_mm" class="w-full rounded-lg border border-gray-300 p-3">{{ old('description_mm') }}</textarea>
                                @error('description_mm')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex justify-end gap-3 border-t border-gray-200 pt-6">
                            <a href="{{ route('testimornials.index') }}" class="rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">
                                Cancel
                            </a>
                            <button type="submit" class="rounded-md bg-blue-600 px-5 py-2 text-sm font-medium text-white hover:bg-blue-700">
                                Create Testimornial
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
            const imageUploadBox = document.getElementById('imageUploadBox');
            const imageFieldWrapper = document.getElementById('imageFieldWrapper');
            const previewContainer = document.getElementById('imagePreviewContainer');
            const preview = document.getElementById('imagePreview');
            const fileName = document.getElementById('fileName');
            const errorElement = document.getElementById('image_error');
            const allowedImageTypes = ['image/jpeg', 'image/png', 'image/gif'];
            const maxImageSize = 5 * 1024 * 1024;

            function scrollToImageField() {
                imageFieldWrapper.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }

            function setImageError(message) {
                imageInput.setCustomValidity(message || '');
                errorElement.textContent = message || '';
                errorElement.classList.toggle('hidden', !message);
                imageUploadBox.classList.toggle('border-red-500', Boolean(message));
            }

            function resetPreview() {
                previewContainer.classList.add('hidden');
                preview.src = '#';
                fileName.textContent = 'JPG, JPEG, PNG, or GIF up to 5MB.';
            }

            function validateImage() {
                if (!imageInput.files.length) {
                    resetPreview();
                    setImageError('The image field is required.');
                    return false;
                }

                const file = imageInput.files[0];

                if (!allowedImageTypes.includes(file.type)) {
                    resetPreview();
                    setImageError('The image must be a file of type: jpeg, png, jpg, gif.');
                    return false;
                }

                if (file.size > maxImageSize) {
                    resetPreview();
                    setImageError('The image may not be greater than 5120 kilobytes.');
                    return false;
                }

                setImageError('');
                return true;
            }

            imageInput.addEventListener('change', function() {
                if (!imageInput.files.length) {
                    validateImage();
                    return;
                }

                const file = imageInput.files[0];

                if (!allowedImageTypes.includes(file.type) || file.size > maxImageSize) {
                    validateImage();
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    previewContainer.classList.remove('hidden');
                    fileName.textContent = file.name;
                };
                reader.readAsDataURL(file);
                validateImage();
            });

            form.addEventListener('submit', function(event) {
                const isImageValid = validateImage();

                if (!isImageValid || !form.checkValidity()) {
                    event.preventDefault();
                    if (!isImageValid) {
                        scrollToImageField();
                    }
                    form.reportValidity();
                }
            });
        });
    </script>
</x-app-layout>
