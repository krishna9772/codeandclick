@props(['action', 'status', 'id'])

<form action="{{ route($action, $id) }}" method="POST" id="status-form-{{ $id }}">
    @csrf
    @method('PATCH')

    <label class="inline-flex relative items-center cursor-pointer">
        <input
            type="checkbox"
            name="status"
            value="published"
            {{ $status === 'published' ? 'checked' : '' }}
            onchange="document.getElementById('status-form-{{ $id }}').submit()"
            class="sr-only peer">
        <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:bg-green-500 
                after:content-[''] after:absolute after:top-0.5 after:left-[2px] 
                after:bg-white after:border after:border-gray-300 after:rounded-full 
                after:h-5 after:w-5 after:transition-all peer-checked:after:translate-x-full
                peer-checked:after:border-white"></div>
    </label>
</form>