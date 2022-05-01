@extends('Front.app')

@section('content')
    <div class="row">
        @foreach($category as $con)
        <div class="col-lg-4 col-md-6 col-sm-12">
            <a href="">
                <div class="card text-center bg-transparent">
                    <div class="card-content d-flex">
                        <div class="card-body">
                            <img src="/app-assets/images/img_454059.png" alt="" height="150"
                                 class="mb-1">
                            <h4 class="card-title">{{$con->category_name}}</h4>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
        <div class="col-lg-4 col-md-6 col-sm-12">
            <a href="">
                <div class="card text-center bg-transparent">
                    <div class="card-content d-flex">
                        <div class="card-body">
                            <img src="/app-assets/images/img_454059.png" alt="" height="150"
                                 class="mb-1">
                            <h4 class="card-title">عیب یابی از روی نحوه عملکرد پکیج</h4>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <a href="">
                <div class="card text-center bg-transparent">
                    <div class="card-content d-flex">
                        <div class="card-body">
                            <img src="/app-assets/images/img_454059.png" alt="" height="150"
                                 class="mb-1">
                            <h4 class="card-title">نحوه کار و تست قطعات پکیج</h4>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <a href="">
                <div class="card text-center bg-transparent">
                    <div class="card-content d-flex">
                        <div class="card-body">
                            <img src="/app-assets/images/img_454059.png" alt="" height="150"
                                 class="mb-1">
                            <h4 class="card-title">نحوه کارکرد پکیج</h4>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <a href="">
                <div class="card text-center bg-transparent">
                    <div class="card-content d-flex">
                        <div class="card-body">
                            <img src="/app-assets/images/img_454059.png" alt="" height="150"
                                 class="mb-1">
                            <h4 class="card-title">جستجو</h4>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <a href="/search">
                <div class="card text-center bg-transparent">
                    <div class="card-content d-flex">
                        <div class="card-body">
                            <img src="/app-assets/images/img_454059.png" alt="" height="150"
                                 class="mb-1">
                            <h4 class="card-title">پشتیبانی</h4>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection
