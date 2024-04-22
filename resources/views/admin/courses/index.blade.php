@php
    $tableHead = ['Name', 'Level', 'Domain de formation', 'Formateur'];
@endphp
@extends('admin.dashboard-layout')
@section('content')
    <div class="py-5">
        @if (@session('success'))
            <div class="rounded bg-green-300 p-3 mb-3">{{ session('success') }}</div>
        @endif
        <div class="flex justify-between mb-5 flex-wrap gap-5">
            <h1 class="font-semibold text-xl">List of courses</h1>
            <div class="flex items-center gap-3 flex-wrap">
                <a href="{{ route('admin.videos.create') }}"
                    class="block rounded-md bg-primary px-3 py-2 text-center text-sm font-semibold text-white">
                    Add new video
                </a>
                <a href="{{ route('admin.chapters.create') }}"
                    class="block rounded-md bg-primary px-3 py-2 text-center text-sm font-semibold text-white">
                    Add new Chapter
                </a>
                <a href="{{ route('admin.courses.create') }}"
                    class="block rounded-md bg-primary px-3 py-2 text-center text-sm font-semibold text-white">
                    Add new Course
                </a>
            </div>
        </div>

        <x-custom-table :headLinks="$tableHead">
            @foreach ($courses as $item)
                <tr class="text-sm">
                    <td class="p-3">
                        {{ Str::limit($item->title, 50, '...') }}
                    </td>
                    <td class="whitespace-nowrap px-3 py-5">
                        {{ $item->level }}
                    </td>
                    <td class="whitespace-nowrap px-3 py-5">
                        {{ $item->domain->name }}
                    </td>
                    <td class="px-3 py-5">
                        {{ $item->instructor->name }}
                    </td>
                    <td class="flex items-center justify-center py-5 gap-2 whitespace-nowrap pl-3 pr-4 text-right ">
                        <a href="{{ route('admin.courses.edit', $item) }}" class="text-indigo-600 hover:text-indigo-900">
                            Edit
                        </a>
                        <form action="{{ route('admin.courses.destroy', $item) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-indigo-900">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </x-custom-table>

        <div class="mt-5">
            {{ $courses->links() }}
        </div>
    </div>
@endsection
