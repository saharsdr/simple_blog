@extends('layouts.admin')

@section('page_title')
    Groups
@endsection

@section('content')   

    <div  class="w-100 px-5 d-flex justify-content-center">
        <div class="w-50 text-justify pt-5 mt-4 shadow p-3 mb-3 bg-body rounded">
            <h3>گروه ها</h3>
            @foreach ($groups as $item)
            <div class="card my-3">
                <div class="card-body">
                  <blockquote class="blockquote mb-0">
                    <p>{{ $item->name }}</p>
                    <footer class="blockquote-footer">{{ $item->year }}</footer>
                  </blockquote>
                </div>
            </div>
            @endforeach
            
            <form action="{{ route('admin_store_group') }}" class="mt-5"  method="post">
                @csrf
                <h4 class="py-3">نظر جدید</h4>
            
                <div class="form-floating mb-3">
                    <input type="text" class="form-control bg-light border-2  p-4  @error('text') border-red-500 @enderror" name="comment_name" id="name" placeholder="نام گروه را وارد کنید">
                    <label for="name" class="rtl">نام</label>
                    
                    @error('text')
                        <div class="ltr text-red-500 text-muted fs-6 mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <div class="form-floating mb-3">
                    <input type="number" class="form-control bg-light border-2  p-4  @error('text') border-red-500 @enderror" name="comment_name" id="year" placeholder="سال گروه را وارد کنید">
                    <label for="year" class="ltr">سال</label>
                    
                    @error('text')
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