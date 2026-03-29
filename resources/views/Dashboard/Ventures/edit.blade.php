<x-app-layout>
    <x-slot name="header">
        <div class="flex w-full items-center">
            <a href="{{ route('ventures.index') }}" class="rounded border border-blue-800 px-4 py-2 font-bold text-blue-800">
                Back to Ventures List
            </a>
            <h2 class="ml-auto text-right text-xl font-semibold leading-tight text-gray-800">
                Edit Venture
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-5xl sm:px-6 lg:px-8">
            <div class="overflow-hidden rounded-lg bg-white shadow-sm">
                <div class="p-8">
                    @if ($errors->any())
                        <div class="mb-6 rounded-lg border border-red-200 bg-red-50 p-4 text-sm text-red-700">
                            <ul class="list-disc space-y-1 pl-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('ventures.update', $venture->id) }}" method="POST" enctype="multipart/form-data" id="ventureEditForm" class="space-y-8" novalidate>
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="image" class="mb-2 block text-sm font-semibold text-gray-800">Featured Image</label>
                            <div id="imageFieldWrapper" class="rounded-2xl border border-dashed border-gray-300 p-4">
                                <div id="imagePreviewWrapper" class="mb-4 overflow-hidden rounded-xl border border-gray-200">
                                    <img id="imagePreview" src="{{ $venture->getFirstMediaUrl('ventures') }}" alt="Image preview" class="h-56 w-full object-cover">
                                </div>
                                <label for="image" class="inline-flex cursor-pointer items-center rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700">
                                    Choose image
                                </label>
                                <input id="image" name="image" type="file" class="hidden" accept=".jpeg,.jpg,.png,.gif,image/jpeg,image/png,image/gif">
                                <p id="imageFileName" class="mt-3 text-sm text-gray-500">JPG, JPEG, PNG, or GIF up to 5MB.</p>
                                <p id="imageError" class="mt-2 hidden text-sm text-red-500"></p>
                                @error('image')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="title" class="mb-2 block text-sm font-semibold text-gray-800">Title</label>
                            <input type="text" name="title" id="title" value="{{ old('title', $venture->title) }}" maxlength="255" class="w-full rounded-lg border border-gray-300 p-3" required>
                            @error('title')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="link" class="mb-2 block text-sm font-semibold text-gray-800">Link</label>
                            <input type="text" name="link" id="link" value="{{ old('link', $venture->link) }}" class="w-full rounded-lg border border-gray-300 p-3">
                            @error('link')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-6 border-t border-gray-200 pt-8">
                            <div>
                                <label for="content" class="mb-2 block text-sm font-semibold text-gray-800">Content</label>
                                <textarea name="content" id="content" class="w-full rounded-lg border border-gray-300 p-3" required>{{ old('content', $venture->content) }}</textarea>
                                @error('content')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="space-y-6 border-t border-gray-200 pt-8">
                            <h3 class="text-lg font-semibold text-gray-900">Myanmar Content</h3>

                            <div>
                                <label for="title_mm" class="mb-2 block text-sm font-semibold text-gray-800">Title (Myanmar)</label>
                                <input type="text" name="title_mm" id="title_mm" value="{{ old('title_mm', $venture->title_mm) }}" maxlength="255" class="w-full rounded-lg border border-gray-300 p-3">
                                @error('title_mm')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="content_mm" class="mb-2 block text-sm font-semibold text-gray-800">Content (Myanmar)</label>
                                <textarea name="content_mm" id="content_mm" class="w-full rounded-lg border border-gray-300 p-3">{{ old('content_mm', $venture->content_mm) }}</textarea>
                                @error('content_mm')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex justify-end gap-3 border-t border-gray-200 pt-6">
                            <a href="{{ route('ventures.index') }}" class="rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">
                                Cancel
                            </a>
                            <button type="submit" class="rounded-md bg-blue-600 px-5 py-2 text-sm font-medium text-white hover:bg-blue-700">
                                Update Venture
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

            function setImageError(message) {
                imageError.textContent = message || '';
                imageError.classList.toggle('hidden', !message);
                imageFieldWrapper.classList.toggle('border-red-300', Boolean(message));
            }

            function validateImage() {
                setImageError('');

                if (!imageInput.files || !imageInput.files[0]) {
                    return true;
                }

                const file = imageInput.files[0];

                if (!allowedImageTypes.includes(file.type)) {
                    imageInput.value = '';
                    imageFileName.textContent = 'Only JPG, JPEG, PNG, and GIF files are allowed.';
                    setImageError('The image must be a file of type: jpeg, png, jpg, gif.');
                    return false;
                }

                if (file.size > maxImageSize) {
                    imageInput.value = '';
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

                if (!this.files.length) {
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

            document.getElementById('ventureEditForm').addEventListener('submit', function(event) {
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
