@extends('Front.app')

@section('content')
    <div class="row">
        @foreach($category5 as $cat)
            <a href="{{($content->parent_id === $cat->id) ? route('content',['id' => $content->id]) : route('list6')}}">
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
