@props(['name' => 'search'])
<div class="custom_search_input_wrapper">
    <button type="button" class="icon">
        <svg width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M11.5 21C16.7467 21 21 16.7467 21 11.5C21 6.25329 16.7467 2 11.5 2C6.25329 2 2 6.25329 2 11.5C2 16.7467 6.25329 21 11.5 21Z"
                stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M22 22L20 20" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
            </path>
        </svg>
    </button>
    <input type="text" name="{{ $name }}" class="input text-black" placeholder="search.." />
</div>
