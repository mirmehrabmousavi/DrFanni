@extends('admin.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">دسته بندی</h4>
                    <a href="{{route('admin.createCategory')}}" class="btn btn-outline-primary round mr-1 mb-1 waves-effect waves-light"><i class="fa fa-plus"></i>افزودن</a>
                </div>
                <div class="card-content">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">نام دسته بندی</th>
                                <th scope="col">اسلاگ دسته بندی</th>
                                <th scope="col">ایدی والد</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <th scope="row">{{$loop->index+1}}</th>
                                <td>{{$category->category_name}}</td>
                                <td>{{$category->category_slug}}</td>
                                <td>{{($category->parent_id == null) ? 'بدون والد' : $category->parent_id}}</td>
                                <td>
                                    <a href="{{Route('admin.editCategory', $category->id)}}" class="btn btn-outline-primary round mr-1 mb-1 waves-effect waves-light">ویرایش</a>
                                    <a class="btn btn-outline-danger round mr-1 mb-1 waves-effect waves-light" href="{{ route('admin.deleteCategory',['id' => $category->id]) }}" onclick="event.preventDefault();
                                                     document.getElementById('del').submit();">حذف</a>
                                    <form id="del" action="{{ route('admin.deleteCategory',['id' => $category->id]) }}" method="POST" class="d-none">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
