@extends('dashboard.layouts.app')

@section('title')
    Books
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="block">
            <div class="block-body">
                <div class="title"><strong>Books</strong></div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User</th>
                                <th>Book</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($borrowings as $borrow)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $borrow->user->name }}</td>
                                    <td>{{ $borrow->book->title ?? '-' }}</td>
                                    <td>{{ $borrow->status ?? '-' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">There is no Data Yet</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <hr>
                </div>
                <br>
            </div>
        </div>
    </div>
@endsection
