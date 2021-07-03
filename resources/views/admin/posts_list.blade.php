@extends('layouts.admin')

@section('page_title')
    Posts
@endsection

@section('content')

    <div style="height: 30px;"></div>

    <div class="d-flex w-100 justify-content-center">
        <div class="w-50">
            @foreach ($posts as $post)
            <div class="card position-relative shadow-sm mb-3 bg-body rounded">
                <div class="card-header">
                    انجمن {{$post->group_id}}
                </div>
                <div class="card-body">
                    <h5 class="card-title">
                        @if ($post->is_deleted===0)
                            @if ($post->is_poll===1)
                                <a class="text-decoration-none text-dark" href="{{route('poll_show',$post->poll->id)}}">{{$post->title}}</a>
                            @endif
                            @if ($post->is_article===1)
                                <a class="text-decoration-none text-dark" href="{{route('article_show',$post->article->id)}}">{{$post->title}}</a>
                            @endif  
                            <div class="position-absolute top-0 start-0 fs-6">
                                @if ($post->is_poll===1)
                                    <a href="{{ route('poll_editable',$post->poll->id)}}" class="card-link">ویرایش</a>
                                    <a href="{{ route('post_delete',$post->id)}}" class="card-link">حذف</a>
                                @endif
                                @if ($post->is_article===1)
                                    <a href="{{ route('article_editable',$post->article->id)}}" class="card-link">ویرایش</a>
                                    <a href="{{ route('post_delete',$post->id)}}" class="card-link">حذف</a>   
                                @endif
                            </div>
                        @else
                            @if ($post->is_poll===1)
                                <a class="text-decoration-none text-secondary" href="{{route('poll_show',$post->poll->id)}}">{{$post->title}}  <span>(حذف شده)</span></a>
                            @endif
                            @if ($post->is_article===1)
                                <a class="text-decoration-none text-secondary" href="{{route('article_show',$post->article->id)}}">{{$post->title}}  <span>(حذف شده)</span></a>
                            @endif
                            <div class="position-absolute top-0 start-0 fs-6">
                                @if ($post->is_poll===1)
                                    <a href="{{ route('poll_editable',$post->poll->id)}}" class="card-link">ویرایش</a>
                                    <a href="{{ route('post_recovery',$post->id)}}" class="card-link">بازگردانی</a>
                                @endif
                                @if ($post->is_article===1)
                                    <a href="{{ route('article_editable',$post->article->id)}}" class="card-link">ویرایش</a>
                                    <a href="{{ route('post_recovery',$post->id)}}" class="card-link">بازگردانی</a>   
                                @endif
                            </div>
                        @endif
                        
                        @if ($post->is_poll===1)
                            (نظرسنجی)
                        @endif
                        @if ($post->is_article===1)
                            (مقاله)
                        @endif
                      
                    </h5>
                    <h6 class="card-subtitle text-muted">{{$post->created_at}}</h6>
                </div>
            </div>
            @endforeach
            

        </div>
    </div>

@endsection