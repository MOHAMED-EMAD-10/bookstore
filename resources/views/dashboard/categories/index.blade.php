@extends('dashboard.layouts.app')

@section('title')
    Categories
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="block">
            <div class="block-body">
                <button type="button" data-toggle="modal" data-target="#CreateModal" class="btn btn-primary">Create
                </button>
                <!-- Modal-->
                <div id="CreateModal" tabindex="-1" role="dialog" aria-labelledby="CreateModalLabel" aria-hidden="true"
                    class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header"><strong id="CreateModalLabel" class="modal-title">Create Category
                                    Modal
                                </strong>
                                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                                        aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ route('dashboard.categories.store') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" placeholder="Name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" name="image" placeholder="Image" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="create" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="title"><strong>Striped table with hover effect</strong></div>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->slug ?? '-' }}</td>
                                <td>
                                    <img src="{{ asset('storage/categories/' . $category->image) }}" alt="">
                                </td>
                                <td>
                                    <div class="body d-flex justify-content-start mb-2">
                                        <!-- Update Button -->
                                        <button type="button" data-toggle="modal"
                                            data-target="#EditModal{{ $category->id }}"
                                            class="btn btn-info mr-2">Edit</button>

                                        <!-- Delete Button -->
                                        <button type="button" data-toggle="modal"
                                            data-target="#DeleteModal{{ $category->id }}"
                                            class="btn btn-danger">Delete</button>
                                    </div>

                                    <!-- Update Modal -->
                                    <div id="EditModal{{ $category->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="EditModalLabel{{ $category->id }}" aria-hidden="true"
                                        class="modal fade text-left">
                                        <div role="document" class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <strong id="EditModalLabel{{ $category->id }}" class="modal-title">Edit
                                                        Category</strong>
                                                    <button type="button" data-dismiss="modal" aria-label="Close"
                                                        class="close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST"
                                                        action="{{ route('dashboard.categories.update', $category->slug) }}"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PATCH')
                                                        <div class="form-group">
                                                            <label>Name</label>
                                                            <input type="text" value="{{ $category->name }}"
                                                                name="name" placeholder="Name" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Image</label>
                                                            <input type="file" name="image" placeholder="Image"
                                                                class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="submit" value="Update" class="btn btn-primary">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Delete Modal -->
                                    <div id="DeleteModal{{ $category->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="DeleteModalLabel{{ $category->id }}" aria-hidden="true"
                                        class="modal fade text-left">
                                        <div role="document" class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <strong id="DeleteModalLabel{{ $category->id }}"
                                                        class="modal-title">Delete Category</strong>
                                                    <button type="button" data-dismiss="modal" aria-label="Close"
                                                        class="close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to delete the category
                                                        <strong>{{ $category->name }}</strong>?
                                                    </p>
                                                    <form method="POST"
                                                        action="{{ route('dashboard.categories.destroy', $category->slug) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Cancel</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
