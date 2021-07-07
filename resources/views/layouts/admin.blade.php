@extends('layouts.author')
@section('page_title')
    @yield('page_title')
@endsection
@section('admin_navbar')
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin_group_list')}}">گروه ها</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin_users_list')}}">کاربرها</a>
    </li>
@endsection

@section('content')
    @yield('content')
@endsection