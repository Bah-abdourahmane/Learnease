@props(['type' => 'success'])
@if (@session('success'))
    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)"
        class="text-sm fixed border-primary w-fit bg-primary text-white p-5 shadow-md rounded top-20 right-5 z-50">
        {{ session('success') }}
    </p>
@endif
