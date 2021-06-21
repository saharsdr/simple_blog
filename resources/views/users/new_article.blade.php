@extends('layouts.base')

@section('links')
@endsection


@section('page_title')
    Make a Article
@endsection

@section('content')
  
    
    <div class=" w-100 px-5 d-flex justify-content-center">
        <form class=" w-75 text-justify mt-5">
            <div class="form-floating  mt-5 mb-3 " >
                <input type="text" class="w-100 form-control bg-light border-2  p-4  @error('title') border-red-500 @enderror" name="title" id="title" placeholder="موضوع">
                <label for="title" class="rtl">عنوان</label>
                @error('title')
                    <div class="ltr text-red-500 text-muted fs-6 mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div id="editor">
                <p></p>
                <p></p>
            </div>
            <input type="submit" class="btn btn-primary m-4" value="ثبت">

        </form>
    </div>
   
    {{-- <script src="{{url('ckeditor5-build-classic/ckeditor.js')}}"></script> --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/translations/de.js"></script>
    <script src="{{url('js/script.js')}}"></script>

@endsection