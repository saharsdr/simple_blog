@extends('layouts.base')

@section('page_title')
    Posts
@endsection

@section('content')

    <div style="height: 30px;"></div>

    <div class="d-flex w-100 justify-content-center">
        <div class="w-50">
            @foreach ($posts as $post)
                <div class="card shadow-sm mb-3 bg-body rounded">
                    <div class="card-header">
                        انجمن {{$post->group_id}}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">                         
                            @if ($post->is_poll===1)
                                <a class="text-decoration-none text-dark" href="{{route('poll_show',$post->poll->id)}}">{{$post->title}}</a>
                                (نظرسنجی)
                            @endif
                            @if ($post->is_article===1)
                                <a class="text-decoration-none text-dark" href="{{route('article_show',$post->article->id)}}">{{$post->title}}</a>
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