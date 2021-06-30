@extends('layouts.base2')

@section('page_title')
    Article
@endsection

@section('content')
    <style>
        :root {
        --ck-z-default: 100;
        --ck-z-modal: calc( var(--ck-z-default) + 999 );
        }
        .ck-content .table {
            width: auto;
        }
    </style>
    

    <div class="d-flex justify-content-center mt-5 mb-3 " >
        <h1>
            {{$id->title}}
        </h1>
    </div>
    <div class="px-5 d-flex justify-content-center">
        <p class="text-muted fs-5">
            {{$id->created_at}}
        </p>
    </div>
    <div class=" w-100 px-5 d-flex justify-content-center">
        <div class="w-75 text-justify">
            <?php
                $data = $id->text;
            ?>  
            <?= $data ?>
        </div>
    </div>
    <div  class="w-100 px-5 pb-5 d-flex justify-content-center">
        <div class="w-50 text-justify pt-5 mt-4">
           
        </div>
    </div>
    <div  class="w-100 px-5 d-flex justify-content-center">
        <div class="w-50 text-justify pt-5 mt-4 shadow p-3 mb-3 bg-body rounded">
            <h3>نظرات</h3>
            <div class="card my-3">
                <div class="card-body">
                  <blockquote class="blockquote mb-0">
                    <p>از نظر من این نظر اشتباه است.</p>
                    <footer class="blockquote-footer">یک نفر</footer>
                  </blockquote>
                </div>
            </div>
            <div class="card my-3">
                <div class="card-body">
                  <blockquote class="blockquote mb-0">
                    <p>از نظر من این نظر اشتباه است.</p>
                    <footer class="blockquote-footer">یک نفر</footer>
                  </blockquote>
                </div>
            </div>
            <div class="card my-3">
                <div class="card-body">
                  <blockquote class="blockquote mb-0">
                    <p>از نظر من این نظر اشتباه است.</p>
                    <footer class="blockquote-footer">یک نفر</footer>
                  </blockquote>
                </div>
            </div>
            
            <form action="" class="mt-5"  method="post">
                <h4 class="py-3">نظر جدید</h4>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control bg-light border-2  p-4  @error('text') border-red-500 @enderror" name="text" id="text1" placeholder="نام خود را وارد کنید.">
                    <label for="text1" class="rtl">نام</label>
                    
                    @error('text')
                        <div class="ltr text-red-500 text-muted fs-6 mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control bg-light border-2  p-4  @error('email') border-red-500 @enderror" name="email" id="email1" placeholder="ایمیل خود را وارد کنید.">
                    <label for="email1" class="rtl">ایمیل</label>
                    
                    @error('email')
                        <div class="ltr text-red-500 text-muted fs-6 mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating input-group mb-3">
                    <span class="rtl input-group-text">نظر</span>
                    <textarea rows="5"  aria-label="نظر"  class="h-100 form-control bg-light border-2  p-2  @error('text') border-red-500 @enderror" name="comment" placeholder="نظر خود را وارد کنید."></textarea>
                    
                    @error('comment')
                        <div class="ltr text-red-500 text-muted fs-6 mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <div class="mb-3 d-flex align-items-baseline justify-content-between">
                    <input type="submit" class="btn btn-primary" value="ثبت دیدگاه">
                    <a href=""><span class="badge bg-danger rounded-pill mx-3 p-2"> <i class="fa fa-thumbs-up"></i> 15 </span></a>
                  </div>
            </form>
        </div>
    </div>
    
    <script>
        
        setTimeout(table_class, 10);
        function table_class() {
            var tables=document.getElementsByTagName('table');
            for (let i = 0; i < tables.length; i++) {
                tables[i].classList.add('table');
            } 
        }
    </script>

    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/translations/de.js"></script>
    <script src="{{url('js/script.js')}}"></script> --}}
@endsection