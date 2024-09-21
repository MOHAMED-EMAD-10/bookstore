@extends('dashboard.layouts.app')

@section('title')
    Books
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="block">
            <div class="block-body">
                <div class="title"><strong>Create Book</strong></div>
                <section class="no-padding-top">
                    <div class="container-fluid">
                        <div class="row">
                            <!-- Horizontal Form-->
                            <div class="col-lg-6">
                                <div class="block">
                                    <div class="block-body">
                                        <form class="form-horizontal" action="{{ route('dashboard.books.store') }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('POST')
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">Title :</label>
                                                <div class="col-sm-9">
                                                    <input name="title" id="inputHorizontalSuccess" type="text"
                                                        class="form-control form-control-success">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">Author :</label>
                                                <div class="col-sm-9">
                                                    <input name="author" id="inputHorizontalWarning" type="text"
                                                        class="form-control form-control-warning">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">Category</label>
                                                <div class="col-sm-9">
                                                    <select name="category_id" class="form-control mb-3 mb-3">
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">Description :</label>
                                                <div class="col-sm-9">
                                                    <textarea id="inputHorizontalWarning" name="description" type="text" class="form-control form-control-warning">
                                                    </textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">Quntity :</label>
                                                <div class="col-sm-9">
                                                    <input id="inputHorizontalWarning" name="quantity" type="number"
                                                        class="form-control form-control-warning">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">image :</label>
                                                <div class="col-sm-9">
                                                    <input id="inputHorizontalWarning" name="image" type="file"
                                                        class="form-control form-control-warning">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-9 offset-sm-3">
                                                    <input type="submit" value="Signin" class="btn btn-primary">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
