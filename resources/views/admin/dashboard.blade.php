@extends('admin.dashboard-layout')
@section('content')
    <div class="p-5">
        <h2 class="font-semibold text-xl text-gray-800 text-center leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
        <div x-data="{ name: 'all' }">
            <button x-on:click="name='all'">all</button>
            <button x-on:click="name='dev'">dev</button>
            <button x-on:click="name='design'">design</button>

            {{-- <span x-text="count"></span> --}}
            <div class="">
                <span x-show="name==='all'" x-transition>all</span>
                <span x-show="name==='dev'" x-transition>dev</span>
                <span x-show="name==='design'" x-transition>design</span>    
            </div>
        </div>

    </div>
@endsection
