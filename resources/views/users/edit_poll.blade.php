@extends('layouts.base')

@section('links')
@endsection


@section('page_title')
    Edit This POLL
@endsection

@section('content')
  <style>
      .btn-close{
        position: absolute;
        top: 10px;
        left: 10px;
      }

      #ops div{
          position: relative;
      }

      .hide{
          display: none !important;
      }
  </style>
    
    <div class=" w-100 px-5 d-flex justify-content-center">
        <form class=" w-75 text-justify mt-5" method="POST" action="{{route('edit',$id->id)}}">
            @csrf
            <div class="form-floating  mt-5 mb-3 " >
                <input type="text" value="{{$id->title}}" class="w-100 form-control bg-light border-2  p-4  @error('title') border-red-500 @enderror" name="title" id="title" placeholder="موضوع">
                <label for="title" class="rtl">عنوان</label>
                @error('title')
                    <div class="ltr text-red-500 text-muted fs-6 mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="textarea1">توضیحات</label>
                <textarea class="form-control" id="textarea1" name="text_area" rows="10" >{{$id->description}}</textarea>
            </div>
            <a id="new-choise" class="btn btn-primary btn-sm my-4 d-block">ایجاد گزینه جدید</a>
            <div id="ops">
                @foreach ($choises as $choise)
                    <div class="my-2 fade show">
                        <input type="text" class="w-100 form-control bg-light border-2  p-2 choise " value="{{ $choise->choise }}" name="choise-id[]" id="{{$choise->id}}" placeholder="گزینه اول در مورد این میباشد که ...">
                        <button type="button" class="btn-close" aria-label="Close"></button>
                    </div>
                @endforeach

            </div>
            
            <input type="submit" class="btn btn-primary m-4" value="ثبت">

        </form>
    </div>
   
    <script>
        

        var btn = document.getElementById('new-choise');
        var bt = document.getElementById('ops');
        btn.addEventListener('click', function() {
            var newDiv = document.createElement("div");
            newDiv.className="my-2 fade show";

            var newInput=document.createElement('input');
            newInput.type='text';
            newInput.className="w-100 form-control bg-light border-2  p-2 choise";
            newInput.name=`choise_new[]`;
            newInput.placeholder="این گزینه در مورد این میباشد که ...";

            var newBtn = document.createElement('button');
            newBtn.type='button';
            newBtn.className="btn-close";
            newBtn.setAttribute('aria-label','Close');
            newBtn.addEventListener('click',function() {
                // newBtn.parentNode.remove();
                newBtn.parentElement.classList.add('hide');
                newBtn.previousElementSibling.removeAttribute('name');
                newBtn.previousElementSibling.setAttribute('name','choise_del[]');
            });

            newDiv.appendChild(newInput);
            newDiv.appendChild(newBtn);
            bt.appendChild(newDiv);
        
        });

        let closes = document.querySelectorAll('.btn-close');
        closes.forEach(element => {
            element.addEventListener('click',function() {
                // element.parentNode.remove();
                element.parentElement.classList.add('hide');
                element.previousElementSibling.removeAttribute('name');
                element.previousElementSibling.setAttribute('name','choise_del[]');
            });
        });
      
        
    </script>

@endsection