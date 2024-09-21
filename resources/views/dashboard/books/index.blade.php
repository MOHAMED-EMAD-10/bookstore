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
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Author</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Quantity</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->slug ?? '-' }}</td>
                                    <td>{{ $book->author ?? '-' }}</td>
                                    <td>{{ $book->category->name ?? '-' }}</td>
                                    <td>{{ $book->description ?? '-' }}</td>
                                    <td>{{ $book->quantity }}</td>
                                    <td>
                                        <img style="max-width: 70px; max-height: 70px" src="{{ $book->image }}"
                                            alt="">
                                    </td>
                                    <td>
                                        <div class="body d-flex justify-content-start mb-2">
                                            <a href="{{ route('dashboard.books.edit', $book->slug) }}"
                                                class="btn btn-info mr-3 btn">
                                                Edit
                                            </a>

                                            <form action="{{ route('dashboard.books.destroy', $book->slug) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr>
                    {{ $books->links() }}
                </div>
                <br>
            </div>
        </div>
    </div>
@endsection
