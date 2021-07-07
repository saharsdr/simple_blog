@extends('layouts.base2')

@section('page_title')
    Poll
@endsection

@section('content')
    <div class="d-flex justify-content-center mt-5 mb-3 " >
        <h1>
            {{ $id->title }}
        </h1>
    </div>
    <div class="px-5 d-flex justify-content-center">
        <p class="text-muted fs-5">
            {{ $id->created_at }}
        </p>
    </div>
    <div class=" w-100 px-5 d-flex justify-content-center">
        <div class="w-75 text-justify">
            <p>{{ $id->description }}</p>
        </div>
    </div>
    <div  class="w-100 px-5 pb-5 d-flex justify-content-center">
        <div class="w-50 text-justify pt-5 mt-4">
            <form action="{{route('vote_poll',$id->id)}}" method="post">
                @csrf
                @foreach ($choises as $choise)
                    <div class="form-check shadow p-3 mb-3 bg-body rounded">
                        <input class="float-right form-check-input" type="radio" name="choise_id[]" value="{{$choise->id}}" id="{{$choise->id}}">
                        <label class="form-check-label px-4" for="{{$choise->id}}">
                            {{$choise->choise}}
                        </label>
                    </div>
                @endforeach
                  
                <div class="d-flex align-items-baseline justify-content-between">
                  <input type="submit" class="btn btn-primary mt-3 mx-3" value="ثبت رای">
                  <a href="{{route('poll_like',[$id->id])}}"><span class="badge bg-danger rounded-pill mx-3 p-2 ltr"> <i class="fa fa-thumbs-up"></i> {{ $likes }} </span></a>
                </div>
                  
            </form>
        </div>
    </div>
    <div  class="w-100 px-5 d-flex justify-content-center">
        <div class="w-50 text-justify pt-5 mt-4 shadow p-3 mb-3 bg-body rounded">
            <h3>نظرات</h3>
            @foreach ($comments as $item)
            <div class="card my-3">
                <div class="card-body">
                  <blockquote class="blockquote mb-0">
                    <p>{{ $item->text }}</p>
                    <footer class="blockquote-footer">
                        {{ $item->name }}
                        @if ($item->user_id)
                            <i class="fa fa-check text-success" aria-hidden="true"></i>
                        @else
                            <span class="text-muted"> (مهمان)</span>                            
                        @endif    
                    </footer>
                  </blockquote>
                </div>
            </div>
            @endforeach
            
            
            <form action="{{ route('poll_new_comment',$id->id) }}" class="mt-5"  method="post">
                @csrf
                <h4 class="py-3">نظر جدید</h4>
                @guest
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control bg-light border-2  p-4  @error('text') border-red-500 @enderror" name="comment_name" id="text1" placeholder="نام خود را وارد کنید.">
                        <label for="text1" class="rtl">نام</label>
                        
                        @error('text')
                            <div class="ltr text-red-500 text-muted fs-6 mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control bg-light border-2  p-4  @error('email') border-red-500 @enderror" name="comment_email" id="email1" placeholder="ایمیل خود را وارد کنید.">
                        <label for="email1" class="rtl">ایمیل</label>
                        
                        @error('email')
                            <div class="ltr text-red-500 text-muted fs-6 mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                @endguest
                <div class="form-floating input-group mb-3">
                    <span class="rtl input-group-text">نظر</span>
                    <textarea rows="5"  aria-label="نظر"  class="h-100 form-control bg-light border-2  p-2  @error('text') border-red-500 @enderror" name="comment_content" placeholder="نظر خود را وارد کنید."></textarea>
                    
                    @error('comment')
                        <div class="ltr text-red-500 text-muted fs-6 mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" value="ثبت دیدگاه">
                </div>
            </form>
        </div>
    </div>
    
@endsection