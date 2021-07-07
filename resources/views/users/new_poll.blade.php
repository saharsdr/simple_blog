@extends($layout)
@section('links')
@endsection


@section('page_title')
    Make a POLL
@endsection

@section('content')
  
    
    <div class=" w-100 px-5 d-flex justify-content-center">
        <form class=" w-75 text-justify mt-5" method="POST" action="{{ route('create_poll') }}">
            @csrf
            <div class="form-floating  mt-5 mb-3 " >
                <input type="text" class="w-100 form-control bg-light border-2  p-4  @error('title') border-red-500 @enderror" name="title" id="title" placeholder="موضوع">
                <label for="title" class="rtl">عنوان</label>
                @error('title')
                    <div class="ltr text-red-500 text-muted fs-6 mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="textarea1">توضیحات</label>
                <textarea class="form-control" id="textarea1" name="text_area" rows="10"></textarea>
            </div>
            <a id="new-choise" class="btn btn-primary btn-sm my-4 d-block">ایجاد گزینه جدید</a>
            <div id="ops">
                <div class=" my-2 " >
                    <input type="text" class="w-100 form-control bg-light border-2  p-2 choise " name="choise_id[]" id="choise_0" placeholder="گزینه اول در مورد این میباشد که ...">
                </div>
            </div>
            


            

            
            <input type="submit" class="btn btn-primary m-4" value="ثبت">

        </form>
    </div>
   
    <script>
        var i=1;
        var btn = document.getElementById('new-choise');
        var bt = document.getElementById('ops');
        btn.addEventListener('click', function() {
            bt.innerHTML =  bt.innerHTML + `
            <div class=" my-2 " >
                <input type="text" class="w-100 form-control bg-light border-2  p-2 choise " name="choise_id[]" placeholder="این گزینه در مورد این میباشد که ...">
            </div>` ;
            i=i+1;
        });
        
    </script>

@endsection