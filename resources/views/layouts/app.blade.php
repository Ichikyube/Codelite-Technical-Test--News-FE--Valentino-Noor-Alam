@extends('layouts.base')

@section('body')
    @yield('trigger')
    @yield('sidebar')
    @isset($header)
        {{ $header }}
    @endisset
    @isset($slot)
        {{ $slot }}
    @endisset
@endsection
