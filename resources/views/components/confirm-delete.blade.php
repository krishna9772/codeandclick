@props(['action'])

<div x-data="{ open: false }" class="inline">
    <!-- Delete Button -->
    <button @click="open = true" class="text-red-800 rounded-md p-2 bg-red-300 hover:text-red-700">
        <x-heroicon-o-trash class="w-5 h-5" />
    </button>

    <!-- Confirmation Modal -->
    <div
        x-show="open"
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
        x-transition
    >
        <div class="bg-white p-6 rounded shadow-lg max-w-sm w-full">
            <h2 class="text-lg font-semibold mb-4">Confirm Delete</h2>
            <p class="mb-6 text-start">Are you sure you want to delete this item?</p>

            <div class="flex justify-end gap-3">
                <button @click="open = false" class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400">
                    Cancel
                </button>

                <form method="POST" action="{{ $action }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 rounded bg-red-500 text-white hover:bg-red-600">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>