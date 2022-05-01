@extends('admin.app')

@section('content')
    <div class="row">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">افزودن دسته بندی</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="{{route('admin.updateCategory',['id' => $category->id])}}" method="POST">
                            @csrf
                            @method('patch')
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-label-group">
                                            <input type="text" class="form-control" placeholder="نام دسته بندی" name="category_name" value="{{$category->category_name}}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-label-group">
                                            <input type="text" class="form-control" placeholder="اسلاگ دسته بندی" name="category_slug" value="{{$category->category_slug}}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-label-group">
                                            <select class="form-control" name="parent_id" id="basicSelect">
                                                <option value="">None</option>
                                                @if($categories)
                                                    @foreach($categories as $item)
                                                        <?php $dash=''; ?>
                                                        <option value="{{$item->id}}" @if($category->parent_id == $item->id ) selected @endif>{{$item->category_name}}</option>
                                                        @if(count($item->subcategory))
                                                            @include('admin.categories.subCategoryListUpdate',['subcategories' => $item->subcategory])
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">ذخیره</button>
                                        <a href="{{route('admin.indexCategory')}}" class="btn btn-danger mr-1 mb-1 waves-effect waves-light">بازگشت</a>
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
