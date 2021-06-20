@extends('layouts.base')

@section('links')
    <link href="{{url('css/auth.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('page_title')
    Login
@endsection

@section('content')
    <div class="row bg-white" style="height: 80px">
        <div class="col h-100%"></div>
    </div>
    <div class="row bg-white" >
        <div class="col"></div>
        <div class="col-lg-6 col-md-8 p-4">
            @if (session('status'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                
            @endif
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-floating mb-3">
                    <input type="email" class="form-control bg-light border-2  p-4  @error('email') border-red-500 @enderror" name="email" id="email" placeholder="ایمیل خود را وارد کنید">
                    <label for="email" class="rtl">ایمیل</label>
                    
                    @error('email')
                        <div class="ltr text-red-500 text-muted fs-6 mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <div class="form-floating mb-3">
                    <input type="password" class="form-control bg-light border-2  p-4  @error('password') border-red-500 @enderror" name="password" id="password" placeholder="رمز را وارد کنید">
                    <label for="password" class="rtl">رمز</label>
                    
                    @error('password')
                        <div class="ltr text-red-500 text-muted fs-6 mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="d-grid gap-2 mt-4">
                    <button class="btn btn-primary btn-sm" type="submit">ورود</button>
                </div>
            </form>
        </div>
        <div class="col"></div>

    </div>
    <div class="row bg-white" style="height: 80px">
        <div class="col h-100%"></div>
    </div>
@endsection