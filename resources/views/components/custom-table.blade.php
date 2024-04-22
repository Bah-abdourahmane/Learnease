@props(['headLinks','actionsLabel'])

<div class="overflow-x-auto rounded-t-md">
    <table class="w-full table-auto divide-y-4 divide-primary/20">
        <thead class="bg-primary text-white sticky top-0 z-10">
            @foreach ($headLinks as $item)
                <th scope="col" class="whitespace-nowrap py-3 pl-4 lg:px-3 text-left font-medium">
                    {{ $item }}
                </th>
            @endforeach
            <th scope="col" className="relative py-3.5 pl-3 pr-4 sm:pr-0 font-medium">
                <span className="sr-only">{{ $actionsLabel ?? '' }}</span>
            </th>
        </thead>
        <tbody class="divide-y-2 divide-primary/20">
            {{ $slot }}
        </tbody>
    </table>
</div>
