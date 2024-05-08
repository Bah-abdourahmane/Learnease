@props(['isChecked', 'name' => 'is_approved', 'course'])
<form id="statusForm" action="{{ route('admin.courses.updateStatus', $course->id) }}" method="POST">
    @csrf
    @method('PATCH')
    <label
        class="relative block aspect-[2/0.75] w-20 rounded-full bg-gradient-to-br from-purple-100 via-violet-600 shadow-2xl shadow-purple-300 transition-all duration-300 hover:bg-[length:100%_500%] focus:bg-[length:100%_500%] bg-[length:100%_100%]">
        <input class="peer/input hidden" type="checkbox" name="$name" @if ($isChecked === 1) checked @endif
            onchange="document.getElementById('statusForm').submit()">
        <div
            class="absolute left-[3%] top-1/2 aspect-square h-[90%] -translate-y-1/2 rotate-180 rounded-full bg-white bg-gradient-to-t transition-all duration-500 peer-checked/input:left-[63%] peer-checked/input:-rotate-6">
        </div>
    </label>
</form>
