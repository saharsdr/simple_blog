@extends('layouts.admin')

@section('page_title')
    Users
@endsection

@section('content')

    <div style="height: 30px;"></div>

    <div class="d-flex w-100 justify-content-center">
        <div class="w-50">
            @foreach ($users as $user)
            <div class="card position-relative shadow-sm mb-3 bg-body rounded">
                <div class="card-header">
                    کاربر
                    @if ($user->type===1)
                        ادمین
                    @endif
                    @if ($user->type===2)
                        نویسنده
                    @endif
                    @if ($user->type===3)
                        عادی
                    @endif
                    @if ($user->is_active===1)
                        تایید شده
                    @endif
                    @if ($user->is_active===0)
                        تایید نشده
                    @endif
                </div>
                <div class="card-body">
                    <h5 class="card-title">
                        <a class="text-decoration-none text-dark" href="{{ route('profile',$user->id)}}">{{$user->name_first." ".$user->name_last}}</a>
                    </h5>
                    <h6 class="card-subtitle text-muted">{{$user->student_number}}</h6>
                    <div class="position-absolute top-0 start-0 fs-6">
                        @if ($user->type===2)
                            <a href="{{ route('admin_unset_user_author',$user->id)}}" class="card-link mx-2"> لغو نویسندگی </a>   
                        @endif
                        @if ($user->type===3)
                            <a href="{{ route('admin_set_user_author',$user->id)}}" class="card-link mx-2"> ثبت نویسندگی </a>   
                        @endif

                        @if ($user->is_active===1)
                            <a href="{{ route('admin_unconfrim_user',$user->id)}}" class="card-link mx-2"> لغو تایید</a>   
                        @endif
                        @if ($user->is_active===0)
                            <a href="{{ route('admin_confrim_user',$user->id)}}" class="card-link mx-2">تایید </a>   
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
            

        </div>
    </div>

@endsection