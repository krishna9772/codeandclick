<x-app-layout>
    <x-slot name="header">
        <div class="flex w-full items-center">
            <a href="{{ route('bloglist.index') }}" class="border border-blue-800 text-blue-800 font-bold py-2 px-4 rounded">
                Back to Blog List
            </a>
            <h2 class="ml-auto text-right font-semibold text-xl text-gray-800 leading-tight">
                Create New Blog
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
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

                    <form action="{{ route('bloglist.store') }}" method="POST" enctype="multipart/form-data" id="blogCreateForm" class="space-y-8" novalidate>
                        @csrf

                        <div>
                            <label for="image" class="mb-2 block text-sm font-semibold text-gray-800">Featured Image</label>
                            <div id="imageFieldWrapper" class="rounded-2xl border border-dashed border-gray-300 p-4">
                                <div id="imagePreviewWrapper" class="{{ old('image') ? '' : 'hidden' }} mb-4 overflow-hidden rounded-xl border border-gray-200">
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

                        <div class="space-y-4 border-t border-gray-200 pt-8">
                            <div>
                                <label class="mb-2 block text-sm font-semibold text-gray-800">Type</label>
                                <p class="mb-3 text-sm text-gray-500">Select one or more blog categories.</p>
                                <div class="grid gap-3">
                                    @foreach ($blogTypes as $type)
                                        <label class="flex items-center gap-3 rounded-lg border border-gray-200 p-3">
                                            <input
                                                type="checkbox"
                                                name="type[]"
                                                value="{{ $type }}"
                                                class="h-4 w-4 rounded border-gray-300 text-blue-600"
                                                {{ in_array($type, old('type', []), true) ? 'checked' : '' }}>
                                            <span class="text-sm text-gray-800">{{ $type }}</span>
                                        </label>
                                    @endforeach
                                </div>
                                @error('type')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                                @error('type.*')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="space-y-6 border-t border-gray-200 pt-8">
                            <div>
                                <label for="content" class="mb-2 block text-sm font-semibold text-gray-800">Content</label>
                                <textarea name="content" id="content" class="w-full rounded-lg border border-gray-300 p-3" required>{{ old('content') }}</textarea>
                                <p class="mt-2 text-sm text-gray-500">Preview text will be generated automatically from this content.</p>
                                @error('content')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
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
                                <p class="mt-2 text-sm text-gray-500">Myanmar preview text will also be generated automatically.</p>
                                @error('content_mm')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex justify-end gap-3 border-t border-gray-200 pt-6">
                            <a href="{{ route('bloglist.index') }}" class="rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">
                                Cancel
                            </a>
                            <button type="submit" class="rounded-md bg-blue-600 px-5 py-2 text-sm font-medium text-white hover:bg-blue-700">
                                Create Blog
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

            Jodit.make('#content', editorConfig);
            Jodit.make('#content_mm', editorConfig);

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

            function validateImage() {
                setImageError('');

                if (!imageInput.files || !imageInput.files[0]) {
                    resetImagePreview();
                    setImageError('The image field is required.');
                    return false;
                }

                const file = imageInput.files[0];

                if (!allowedImageTypes.includes(file.type)) {
                    imageInput.value = '';
                    resetImagePreview();
                    imageFileName.textContent = 'Only JPG, JPEG, PNG, and GIF files are allowed.';
                    setImageError('The image must be a file of type: jpeg, png, jpg, gif.');
                    return false;
                }

                if (file.size > maxImageSize) {
                    imageInput.value = '';
                    resetImagePreview();
                    imageFileName.textContent = 'File is larger than 5MB.';
                    setImageError('The image may not be greater than 5120 kilobytes.');
                    return false;
                }

                return true;
            }

            imageInput.addEventListener('change', function() {
                if (!validateImage()) {
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

            document.getElementById('blogCreateForm').addEventListener('submit', function(event) {
                if (!validateImage()) {
                    event.preventDefault();
                    imageFieldWrapper.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });
                }
            });
        });
    </script>
</x-app-layout>
