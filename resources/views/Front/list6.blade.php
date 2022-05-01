@extends('Front.app')

@section('content')
    <div class="row">
        @foreach($category6 as $cat)
            <a href="{{route('content',['id' => $content->id])}}">
                <div class="col-sm-12">
                    <div class="alert alert-dark" role="alert">
                        <h4 class="alert-heading">دسته بندی {{$cat->id}}</h4>
                        <p class="mb-0">
                            {{$cat->category_name}}
                        </p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
@endsection
