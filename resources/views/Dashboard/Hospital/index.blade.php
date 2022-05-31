@extends('layouts.app')

@section('content')
    <div class="page-banner overlay-dark bg-image" style="background-image: url(../assets/img/bg_image_1.jpg);">
        <div class="banner-section">
            <div class="container text-center wow fadeInUp">
                <h1 class="font-weight-normal">Our Hospitals</h1>
            </div> <!-- .container -->
        </div> <!-- .banner-section -->
    </div> <!-- .page-banner -->



    <div class="page-section bg-light">
        <form action="#" method="get">
            <div class="container h-100">
                <div class="d-flex justify-content-center h-100">
                    <div class="searchbar">
                        <input class="search_input" type="text" name="search" placeholder="Search..." value="{{ request()->search }}">
                        <button href="#" class="search_icon btn"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>
        </form>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="row">
                        @foreach ($hospitals as $item)
                            <div class="col-md-6 col-lg-4 py-3 wow zoomIn">
                                <div class="card-doctor">
                                    <div class="header">
                                        <img src="https://pmt.com.lb/wp-content/uploads/2021/05/hospital-1.jpg" style="height: 250px;" alt="">
                                    </div>
                                    <div class="body">
                                        <a href="{{route('Hospital.show',$item)}}"><p class="text-xl mb-0">{{$item->name}}</p></a>
                                        <span class="text-sm text-grey">{{$item->phone}}</span>
                                        <p>@foreach ($item->user as $user)
                                            <a href="{{route('do')}}">{{$user->name}}</a>
                                        @endforeach</p>

                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
