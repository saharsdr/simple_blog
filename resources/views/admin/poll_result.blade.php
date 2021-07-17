@extends('layouts.admin')

@section('page_title')
    Result
@endsection

@section('content')
<div  class="w-100 px-5 d-flex justify-content-center">
        <div class="w-50 text-justify pt-5 mt-4 shadow p-3 mb-3 bg-body rounded">
            <h3>نتایج</h3>
            @if ($count!==0)
                @foreach ($result as $item)
                <div class="card my-3 d-flex flex-row justify-content-between">
                    <p>{{$item[1][0]}}</p>
                    <span>{{$item[0][0]/$count*100}}%</span>
                </div>
                @endforeach
                <p>تعداد کل نظرات : {{$count}}</p>
                
            @else
                <p>تا کنون نظری ثبت نشده است.</p>
            @endif
            
        </div>
    </div>
@endsection