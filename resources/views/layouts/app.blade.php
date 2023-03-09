@extends('layouts.base')

@section('body')
    @isset($header)
        {{ $header }}
    @endisset
    <div class="flex h-screen">
        @isset($sidebar)
            @yield('trigger')
            <div class="flex items-center justify-center w-1/4 h-full bg-white">
                {{ $sidebar }}
            </div>
        @endisset
        @isset($slot)
            <div class="flex flex-row flex-wrap items-center justify-center w-full p-5 bg-slate-200">
                {{ $slot }}
            </div>
        @endisset
    </div>
@endsection
