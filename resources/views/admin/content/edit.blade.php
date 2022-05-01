@extends('admin.app')

@section('content')
    <div class="row">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">افزودن محتوا</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="{{route('admin.updateContent',['id' => $content->id])}}" method="POST">
                            @csrf
                            @method('patch')
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-label-group">
                                            <input type="text" class="form-control" placeholder="نام" name="title" value="{{$content->title}}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-label-group">
                                            <textarea class="form-control" placeholder="توضیحات" name="desc">{{$content->desc}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-label-group">
                                            <select class="form-control" name="parent_id" id="basicSelect">
                                                <option value="{{$content->parent_id}}">{{$content->parent_id}}</option>
                                                @if($categories)
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">ذخیره</button>
                                        <a href="{{route('admin.dashboard')}}" class="btn btn-danger mr-1 mb-1 waves-effect waves-light">بازگشت</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        @if ($errors->any())
                            <div>
                                @foreach ($errors->all() as $error)
                                    <li class="alert alert-danger">{{ $error }}</li>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
