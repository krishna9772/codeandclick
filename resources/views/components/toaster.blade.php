<!-- resources/views/layouts/app.blade.php -->
@if (session('success'))
    <x-toast type="success" :message="session('success')" />
@endif

@if (session('error'))
    <x-toast type="error" :message="session('error')" />
@endif

