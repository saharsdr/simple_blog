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
                    <footer class="blockquote-footer">{{ $item->year }}
                        <a href="{{route('admin_editable_group',$item->year)}}">ویرایش</a>
                        @if ($item->is_deleted===1)
                            <a href="{{route('admin_recovery_group',$item->year)}}">بازیابی</a>
                        @else
                            <a class="text-danger" href="{{route('admin_delete_group',$item->year)}}">حذف</a>
                        @endif
                    </footer>
                  </blockquote>
                </div>
            </div>
            @endforeach
            
            <div class="mb-3">
                <a href="{{route('admin_new_group')}}"><input type="button" class="btn btn-primary" value="گروه جدید "></a>
            </div>
        </div>
    </div>
    

@endsection