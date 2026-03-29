<x-app-layout>
    <x-slot name="header">
        <div class="flex w-full items-center">
            <a href="{{ route('dashboard') }}" class="rounded border border-blue-800 px-4 py-2 font-bold text-blue-800">
                Back to Dashboard
            </a>
            <h2 class="ml-auto text-right text-xl font-semibold leading-tight text-gray-800">
                {{ __('Default SEO Settings') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-5xl sm:px-6 lg:px-8">
            <div class="overflow-hidden rounded-lg bg-white shadow-sm">
                <div class="p-8">
                    @if ($errors->any())
                        <div class="mb-6 rounded-lg border border-red-200 bg-red-50 p-4">
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

                    <form action="{{ route('seo.update') }}" method="POST" id="seoForm" class="space-y-8">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="title" class="mb-2 block text-sm font-semibold text-gray-800">Default Title</label>
                            <input type="text" name="title" id="title" class="w-full rounded-lg border border-gray-300 p-3" required value="{{ old('title', $seo->title) }}">
                            @error('title')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="border-t border-gray-200 pt-8">
                            <label for="description" class="mb-2 block text-sm font-semibold text-gray-800">Default Description</label>
                            <textarea rows="10" name="description" id="description" class="w-full rounded-lg border p-3 {{ $errors->has('description') ? 'border-red-500' : 'border-gray-300' }}" required>{{ old('description', $seo->description) }}</textarea>
                            @error('description')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="border-t border-gray-200 pt-8">
                            <label for="tagInput" class="mb-2 block text-sm font-semibold text-gray-800">Default Keywords</label>
                            <div class="flex gap-3">
                                <input type="text" id="tagInput" class="w-full rounded-lg border border-gray-300 p-3" placeholder="Type a keyword and click Add">
                                <button id="addTag" type="button" class="rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700">Add</button>
                            </div>
                            <input type="hidden" name="keyword" value="{{ old('keyword', $seo->keyword) }}" id="keywords" required>
                            <p class="mt-2 text-sm text-gray-500">Add one keyword at a time. They will be saved as your default SEO keywords.</p>
                            <div id="tagList" class="mt-3 flex flex-wrap gap-2"></div>
                            @error('keyword')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-end gap-3 border-t border-gray-200 pt-6">
                            <a href="{{ route('dashboard') }}" class="rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">
                                Cancel
                            </a>
                            <button type="submit" class="rounded-md bg-blue-600 px-5 py-2 text-sm font-medium text-white hover:bg-blue-700">
                                Update Default SEO
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function setupList(containerId, inputId, addButtonId, hiddenInputId) {
                const container = document.getElementById(containerId);
                const input = document.getElementById(inputId);
                const addButton = document.getElementById(addButtonId);
                const hiddenInput = document.getElementById(hiddenInputId);
                let items = hiddenInput.value ? hiddenInput.value.split('/').filter(Boolean) : [];

                function updateHiddenInput() {
                    hiddenInput.value = items.join('/');
                }

                function renderList() {
                    container.innerHTML = '';

                    items.forEach((item, index) => {
                        if (!item.trim()) {
                            return;
                        }

                        const itemElement = document.createElement('div');
                        itemElement.className = 'flex items-center gap-2 rounded-full bg-blue-50 px-3 py-2 text-sm text-blue-800';
                        itemElement.innerHTML = `
                            <span>${item}</span>
                            <button type="button" class="remove-item inline-flex h-5 w-5 items-center justify-center rounded-full bg-blue-600 text-white hover:bg-red-600" data-index="${index}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        `;
                        container.appendChild(itemElement);
                    });

                    updateHiddenInput();
                }

                function addItem() {
                    const value = input.value.trim();

                    if (!value) {
                        return;
                    }

                    items.push(value);
                    input.value = '';
                    renderList();
                }

                addButton.addEventListener('click', addItem);

                input.addEventListener('keypress', function(e) {
                    if (e.key === 'Enter') {
                        e.preventDefault();
                        addItem();
                    }
                });

                container.addEventListener('click', function(e) {
                    const removeButton = e.target.closest('.remove-item');

                    if (!removeButton) {
                        return;
                    }

                    items.splice(Number(removeButton.dataset.index), 1);
                    renderList();
                });

                renderList();
            }

            setupList('tagList', 'tagInput', 'addTag', 'keywords');
        });
    </script>
</x-app-layout>
