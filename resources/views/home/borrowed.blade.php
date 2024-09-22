@extends('home.layouts.app')

@section('content')
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
                                        <span class="bid">
                                            Status<br><strong>{{ $book-> }}</strong><br>
                                        </span>
                                        <div class="text-button">
                                            <a href="{{ route('home.show', $book->slug) }}">View Item Details</a>
                                        </div>
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
