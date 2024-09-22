@extends('home.layouts.app')

@section('content')
    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="header-text">
                        <h6>Book is Knowledge</h6>
                        <h2>Knowledge is Power</h2>
                        <p>Library is a really cool and professional design for your websites. This HTML CSS template is
                            based on Bootstrap v5 and it is designed for related web portals. Liberty can be freely
                            downloaded from github</p>
                        <div class="buttons">
                            <div class="border-button">
                                <a href="explore.html">Explore Top Books</a>
                            </div>
                            <div class="main-button">
                                <a href="" target="_blank">Watch Our Videos</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="">
                        <div class="item">
                            <img src="{{ asset('home/assets/images/banner.png') }}" alt="">
                        </div>
                        <div class="item">
                            <img src="{{ asset('home/assets/images/banner2.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <div class="categories-collections">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="categories">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-heading">
                                    <div class="line-dec"></div>
                                    <h2>Browse Through Book <em>Categories</em> Here.</h2>
                                </div>
                            </div>
                            @foreach ($categories as $category)
                                <div class="col-lg-2 col-sm-6">
                                    <div class="item">
                                        <div class="icon">
                                            <img src="{{ $category->image ?? asset('home/assets/images/icon-0' . rand(1, 6) . '.png') }}"
                                                alt="">
                                        </div>
                                        <h4>{{ $category->name }}</h4>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="currently-market">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <div class="line-dec"></div>
                        <h2><em>Items</em> Currently In The Market.</h2>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row grid">
                        @foreach ($books as $book)
                            <div class="col-lg-6 currently-market-item all msc">
                                <div class="item">
                                    <div class="left-image">
                                        <img src="{{ asset('home/assets/images/book' . rand(1, 4) . '.webp') }}"
                                            alt="" style="border-radius: 20px; min-width: 195px;">
                                    </div>
                                    <div class="right-content">
                                        <h4>{{ Str::limit($book->title, 30) }}</h4>
                                        <span class="author">
                                            <h6>{{ $book->author }}</h6>
                                        </span>
                                        <div class="line-dec"></div>
                                        <span class="bid">
                                            Current Available<br><strong>{{ $book->quantity }}</strong><br>
                                        </span>
                                        <div class="text-button">
                                            <a href="details.html">View Item Details</a>
                                            <form action="{{ route('home.borrow', $book->slug) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-primary">Borrow
                                                    This Book</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{ $books->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
