@extends('layouts.admin')

@section('page_title')
    Comments
@endsection

@section('content')
<div  class="w-100 px-5 d-flex justify-content-center">
        <div class="w-50 text-justify pt-5 mt-4 shadow p-3 mb-3 bg-body rounded">
            <h3>نظرات</h3>
            @foreach ($comments as $item)
            <div class="card my-3 position-relative">
                @if ($item->is_deleted===0)
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p>{{ $item->text }}</p>
                            <footer class="blockquote-footer">{{ $item->name }}</footer>
                        </blockquote>
                        </div>
    
                    
                        <div class="position-absolute top-0 start-0 mx-2">
                            <a href="{{ route('delete_comment',$item->id) }}" class="card-link">حذف</a>   
                        </div>
                @else
                    <div class="card-body text-secondary">
                        <blockquote class="blockquote mb-0">
                            <p>{{ $item->text }}</p>
                            <footer class="blockquote-footer">{{ $item->name }}</footer>
                        </blockquote>
                        </div>
    
                    
                        <div class="position-absolute top-0 start-0 mx-2">
                            <a href="{{ route('recovery_comment',$item->id) }}" class="card-link">بازگردانی</a>   
                        </div>
                @endif
            </div>
            @endforeach
            
        </div>
    </div>
@endsection