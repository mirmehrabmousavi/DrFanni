@extends('admin.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <a href="{{route('admin.indexCategory')}}" class="btn mb-1 btn-primary btn-lg btn-block waves-effect waves-light">مدیریت دسته بندی</a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <!-- Block level buttons with icon -->
                                <div class="form-group">
                                    <a href="{{route('admin.createContent')}}" class="btn mb-1 btn-outline-primary btn-icon btn-lg btn-block waves-effect waves-light">افزودن محتوا</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">محتوا</h4>
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
                            @foreach($content as $c)
                                <tr>
                                    <th scope="row">{{$loop->index+1}}</th>
                                    <td>{{$c->title}}</td>
                                    <td>{{$c->desc}}</td>
                                    <td>{{($c->parent_id == null) ? 'بدون والد' : $c->parent_id}}</td>
                                    <td>
                                        <a href="{{Route('admin.editContent', $c->id)}}" class="btn btn-outline-primary round mr-1 mb-1 waves-effect waves-light">ویرایش</a>
                                        <a class="btn btn-outline-danger round mr-1 mb-1 waves-effect waves-light" href="{{ route('admin.deleteContent',['id' => $c->id]) }}" onclick="event.preventDefault();
                                                     document.getElementById('del').submit();">حذف</a>
                                        <form id="del" action="{{ route('admin.deleteContent',['id' => $c->id]) }}" method="POST" class="d-none">
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
