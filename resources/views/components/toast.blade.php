@props(['type' => 'success', 'message'])

<div
    x-data="{ show: true }"
    x-show="show"
    x-init="setTimeout(() => show = false, 3000)"
    class="fixed bottom-5 right-5 px-4 py-2 rounded shadow-lg text-white font-semibold
           {{ $type === 'success' ? 'bg-green-500' : ($type === 'error' ? 'bg-red-500' : 'bg-blue-500') }}">
    {{ $message }}
</div>