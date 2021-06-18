@extends('layouts.base')

@section('links')
    <link href="{{url('css/auth.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('page_title')
    Register
@endsection

@section('content')
    <div class="row bg-white" style="height: 80px">
        <div class="col h-100%"></div>
    </div>
    <div class="row bg-white" >
        <div class="col"></div>
        <div class="col-lg-6 col-md-8 p-4">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label sr-only">نام</label>
                    <input type="text" class="form-control bg-light border-2  p-4  @error('name') border-red-500 @enderror " name="name" id="name" placeholder="نام خود را وارد کنید">

                    @error('name')
                        <div class="ltr text-red-500 text-muted fs-6 mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="last_name" class="form-label sr-only">نام خانوادگی</label>
                    <input type="text" class="form-control bg-light border-2  p-4  @error('last_name') border-red-500 @enderror" name="last_name" id="last_name" placeholder="نام خانوادگی خود را وارد کنید">
                    
                    @error('last_name')
                        <div class="ltr text-red-500 text-muted fs-6 mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="student_number" class="form-label sr-only">شماره دانشجویی</label>
                    <input type="text" class="form-control bg-light border-2  p-4  @error('student_number') border-red-500 @enderror" name="student_number" id="student_number" placeholder="شماره دانشجویی خود را وارد کنید">
                    
                    @error('student_number')
                        <div class="ltr text-red-500 text-muted fs-6 mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label sr-only">ایمیل</label>
                    <input type="email" class="form-control bg-light border-2  p-4  @error('email') border-red-500 @enderror" name="email" id="email" placeholder="ایمیل خود را وارد کنید">
                    
                    @error('email')
                        <div class="ltr text-red-500 text-muted fs-6 mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label sr-only">رمز</label>
                    <input type="password" class="form-control bg-light border-2  p-4  @error('password') border-red-500 @enderror" name="password" id="password" placeholder="رمز را وارد کنید">
                    
                    @error('password')
                        <div class="ltr text-red-500 text-muted fs-6 mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label sr-only">تکرار رمز</label>
                    <input type="password" class="form-control bg-light border-2  p-4  @error('password_confirmation') border-red-500 @enderror" name="password_confirmation" id="password_confirmation" placeholder="مجدد رمز را وارد کنید">
                    
                    @error('password_confirmation')
                        <div class="ltr text-red-500 text-muted fs-6 mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="d-grid gap-2 mt-4">
                    <button class="btn btn-primary btn-sm" type="submit">ثبت</button>
                </div>
            </form>
        </div>
        <div class="col"></div>

    </div>
    <div class="row bg-white" style="height: 80px">
        <div class="col h-100%"></div>
    </div>
@endsection