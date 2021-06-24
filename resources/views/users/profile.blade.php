@extends('layouts.base2')

@section('page_title')
    Profile
@endsection

@section('content')

    @auth
        
    
    <div class="d-flex justify-content-center mt-5 mb-3 " >
        <h1>
            اطلاعات شما
        </h1>
    </div>
    <div class=" w-100 px-5 d-flex justify-content-center">
        <div class="w-50 text-right">
            <form >
                <fieldset class="my-2" disabled>
                    <div class="row g-2">
                        <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="name" placeholder="سحر" value="سحر" >
                            <label for="name">نام</label>
                        </div>
                        </div>
                        <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="last_name" placeholder="صدری" value="صدری">
                            <label for="name">نام خانوادگی</label>
                        </div>
                    </div>
                    </div>
                    <div class="form-floating my-2">
                        <input type="email" class="form-control" id="email" value="sahar.sadrii.ss@gmail.com" placeholder="name@example.com">
                        <label for="email">ایمیل</label>
                    </div>
                    <div class="form-floating my-2">
                        <input type="text" class="form-control" id="student_number" value="961845125" placeholder="شماره دانشجویی">
                        <label for="student_number">شماره دانشجویی</label>
                    </div>
                </fieldset>
                <p class="fs-6 rounded-pill bg-warning d-inline p-2 my-4" style="margin-top: 2rem;">نوع کاربر : <span>عادی فعال</span></p>
            </form>
        </div>
    </div>
    
    @endauth
    @guest
        ابتدا ثبت نام کنید :)
    @endguest
@endsection