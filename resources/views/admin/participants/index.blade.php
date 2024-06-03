@extends('admin.dashboard-layout')
@section('content')
    <div class="p-5">
        <x-ui.custom-toast />
        <div class="flex justify-between mb-5">
            <h1 class="font-semibold text-xl">List of the Participants</h1>
            <a href="{{ route('admin.participants.create') }}"
                class="block rounded-md bg-primary px-3 py-2 text-center text-sm font-semibold text-white">Add
                new</a>
        </div>

        <x-custom-table :headLinks="['Name', 'Email', 'Phone', 'Role']">
            @foreach ($users as $item)
                <tr class="text-sm">
                    <td class="p-3">
                        {{ Str::limit($item->name, 50, '...') }}
                    </td>
                    <td class="whitespace-nowrap px-3 py-5">
                        {{ $item->email }}
                    </td>
                    <td class="px-3 py-5">
                        {{ $item->phone }}
                    </td>
                    <td class="px-3 py-5">
                        {{ $item->role }}
                    </td>
                    <td class="flex items-center justify-center py-5 gap-2 whitespace-nowrap pl-3 pr-4 text-right ">
                        <a href="{{ route('admin.users.edit', $item) }}" class="text-indigo-600 hover:text-indigo-900">
                            Edit
                        </a>
                        <form action="{{ route('admin.users.destroy', $item) }}" method="POST">
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
            {{ $users->links() }}
        </div>
    </div>
@endsection
