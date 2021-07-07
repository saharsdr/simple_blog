@extends('layouts.base')
@section('page_title')
    @yield('page_title')
@endsection
@section('new_post_navbar')
    @auth
    @yield('admin_navbar')
    
    <li class="nav-item">
        <a class="nav-link" href="{{route('new_article')}}">افزودن مقاله</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('create_poll')}}">افزودن نظرسنجی</a>
    </li>
    @endauth
@endsection

@section('content')
    @yield('content')
@endsection