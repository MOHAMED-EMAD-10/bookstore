@extends('home.layouts.app')

@section('content')
    <div class="item-details-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <div class="line-dec"></div>
                        <h2>View Details <em>For Item</em> Here.</h2>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="left-image">
                        <img src="{{ $book->image ?? asset('home/assets/images/banner.png') }}" alt=""
                            style="border-radius: 20px;">
                    </div>
                </div>
                <div class="col-lg-5 align-self-center">
                    <h4>{{ $book->title }}</h4>
                    <span class="author">
                        <h6>{{ $book->author }}</h6>
                    </span>
                    <p>{{ $book->description }}</p>
                    <div class="row">
                        <div class="col-3">
                            <span class="bid">
                                Available<br><strong>{{ $book->quantity }}</strong><br>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
