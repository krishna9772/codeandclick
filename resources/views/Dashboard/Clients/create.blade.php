<x-app-layout>
    <x-slot name="header">
        <div class="flex w-full items-center">
            <a href="{{ route('clients.index') }}" class="border border-blue-800 px-4 py-2 font-bold text-blue-800 rounded">
                Back to Clients List
            </a>
            <h2 class="ml-auto text-right text-xl font-semibold leading-tight text-gray-800">
                {{ $pageTitle ?? 'Create New Client' }}
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

                    <form action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data" id="clientCreateForm" class="space-y-8" novalidate>
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
                            <label for="name" class="mb-2 block text-sm font-semibold text-gray-800">Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" maxlength="255" class="w-full rounded-lg border border-gray-300 p-3" required>
                            @error('name')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-end gap-3 border-t border-gray-200 pt-6">
                            <a href="{{ route('clients.index') }}" class="rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">
                                Cancel
                            </a>
                            <button type="submit" class="rounded-md bg-blue-600 px-5 py-2 text-sm font-medium text-white hover:bg-blue-700">
                                Create Client
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('clientCreateForm');
            const nameInput = document.getElementById('name');
            const imageInput = document.getElementById('image');
            const imageFieldWrapper = document.getElementById('imageFieldWrapper');
            const imagePreviewWrapper = document.getElementById('imagePreviewWrapper');
            const imagePreview = document.getElementById('imagePreview');
            const imageFileName = document.getElementById('imageFileName');
            const imageError = document.getElementById('imageError');
            const allowedImageTypes = ['image/jpeg', 'image/png', 'image/gif'];
            const maxImageSize = 5 * 1024 * 1024;

            function resetImagePreview() {
                imagePreviewWrapper.classList.add('hidden');
                imagePreview.src = '#';
                imageFileName.textContent = 'JPG, JPEG, PNG, or GIF up to 5MB.';
            }

            function setImageError(message) {
                imageError.textContent = message || '';
                imageError.classList.toggle('hidden', !message);
                imageFieldWrapper.classList.toggle('border-red-300', Boolean(message));
            }

            function validateName() {
                const value = nameInput.value.trim();

                if (!value) {
                    nameInput.setCustomValidity('The name field is required.');
                    return false;
                }

                nameInput.setCustomValidity('');
                return true;
            }

            function validateImage() {
                imageInput.setCustomValidity('');
                setImageError('');

                if (!imageInput.files || !imageInput.files[0]) {
                    resetImagePreview();
                    const message = 'The image field is required.';
                    imageInput.setCustomValidity(message);
                    setImageError(message);
                    return false;
                }

                const file = imageInput.files[0];

                if (!allowedImageTypes.includes(file.type)) {
                    imageInput.value = '';
                    resetImagePreview();
                    const message = 'The image must be a file of type: jpeg, png, jpg, gif.';
                    imageFileName.textContent = 'Only JPG, JPEG, PNG, and GIF files are allowed.';
                    imageInput.setCustomValidity(message);
                    setImageError(message);
                    return false;
                }

                if (file.size > maxImageSize) {
                    imageInput.value = '';
                    resetImagePreview();
                    const message = 'The image may not be greater than 5120 kilobytes.';
                    imageFileName.textContent = 'File is larger than 5MB.';
                    imageInput.setCustomValidity(message);
                    setImageError(message);
                    return false;
                }

                setImageError('');
                return true;
            }

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

            nameInput.addEventListener('input', function() {
                validateName();
            });

            form.addEventListener('submit', function(event) {
                const isNameValid = validateName();
                const isImageValid = validateImage();

                if (!isNameValid || !isImageValid || !form.checkValidity()) {
                    event.preventDefault();
                    form.reportValidity();
                }
            });
        });
    </script>
</x-app-layout>
