@props(['name' => 'name', 'courses', 'coursRecherches', 'nomCoursRecherche'])
<div class="relative max-w-[600px] w-full">
    {{-- input --}}
    <form action="/" method="get">
        <div class="custom_circular_bg_gradient relative rounded-full w-full overflow-hidden bg-white shadow-xl mt-5">
            <input type="text" name="{{ $name }}" placeholder="Search for courses..."
                class="bg-transparent outline-none border-none pl-6 pr-10 py-5 w-full font-sans text-lg font-semibold" />
            <div class="absolute right-2 top-[0.4em]">
                <button
                    class="w-14 h-14 rounded-full bg-violet-500 group shadow-xl flex items-center justify-center relative overflow-hidden">
                    <svg width="50" height="50" viewBox="0 0 64 64" fill="none"
                        xmlns="http://www.w3.org/2000/svg" class="relative z-10">
                        <path
                            d="M63.6689 29.0491L34.6198 63.6685L0.00043872 34.6194L29.0496 1.67708e-05L63.6689 29.0491Z"
                            fill="white" fill-opacity="0.01"></path>
                        <path d="M42.8496 18.7067L21.0628 44.6712" stroke="white" stroke-width="3.76603"
                            stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M26.9329 20.0992L42.85 18.7067L44.2426 34.6238" stroke="white" stroke-width="3.76603"
                            stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    <div
                        class="w-full h-full rotate-45 absolute left-[32%] top-[32%] bg-black group-hover:-left-[100%] group-hover:-top-[100%] duration-1000">
                    </div>
                    <div
                        class="w-full h-full -rotate-45 absolute -left-[32%] -top-[32%] group-hover:left-[100%] group-hover:top-[100%] bg-black duration-1000">
                    </div>
                </button>
            </div>
        </div>
    </form>
    {{-- dropdawn --}}
    @if (count($coursRecherches) > 0)
        <div
            class="w-full left-0 right-0 max-h-80 bg-white z-50 shadow absolute top-full mt-2 rounded-lg overflow-y-auto overflow-hidden">
            @foreach ($coursRecherches as $cours)
                <button onclick="window.location='{{ route('courses.show', $cours->id) }}'"
                    class="pl-8 p-5 rounded-lg text-lg shadow-md drop-shadow-md w-full text-left scale-105 duration-300 hover:text-primary">{{ $cours->title }}</button>
            @endforeach
        </div>
    @endif

</div>
