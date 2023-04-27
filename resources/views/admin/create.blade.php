@extends('layout')
@section('content')
    <div class="page">
        <!-- Sidebar -->
        @include('sidebar')
        <!-- Sidebar -->
        <div class="page-wrapper">
            <!-- Page header -->
            <div class="page-header d-print-none">
                <div class="container">
                    <div class="cart">
                        <div class="cart-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>Add Post</h3>
                                </div>
                                <div class="col-md-6">
                                    <a href=" {{ route('post.index') }} "class="btn btn-success float-end">List Post</a>
                                </div>
                            </div>
                        </div>
                        <div class="cart-body">
                            @if ($errors->any())
                                @foreach ($errors->all() as $err)
                                    <p class="alert alert-danger">{{ $err }}</p>
                                @endforeach
                            @endif
                            <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <strong>Title </strong>
                                            <input type="text" name="title" class="form-control"
                                                placeholder="Nhập tên bài viết: ">
                                        </div>
                                        <div class="col-xl-6">
                                            <br><strong>Featured </strong>&nbsp;&nbsp;
                                            <div>
                                                <label class="form-check">
                                                    <input class="form-check-input" type="radio" name="is_featured" value="outstanding" checked>
                                                    <span class="form-check-label">outstanding</span>
                                                </label>
                                                <label class="form-check">
                                                    <input class="form-check-input" type="radio" name="is_featured" value="normal">
                                                    <span class="form-check-label">normal</span>
                                                </label>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <strong>Status</strong>
                                            <input type="text" name="status" class="form-control"
                                                placeholder="Nhập trạng thái: ">
                                        </div>
                                        <div class="col-xl-6">
                                            <strong>Image</strong><br>
                                            <a class="btn btn-success" id="button1">upload</a>
                                            <input type="text" id="input1">
                                            <input type="file" name="file_upload" id="imageFile"
                                                onchange="chooseFile(this)">
                                            <img src="{{ asset('images/avt.jpg') }}" alt="" name="file_upload"
                                                id="onload" width="100" height="100"><br>
                                        </div>
                                    </div>
                                    <strong>Excerpt </strong>
                                    <textarea type="text" name="excerpt" id="editor-excerpt" class="form-control" cols="30"
                                        rows="3"placeholder="Nhập nội dung ngắn: "> </textarea>
                                    <strong>Content </strong>
                                    <textarea type="text" name="content" id="editor-content" class="form-control" cols="30"
                                        rows="20"placeholder="Nhập nội dung: "> </textarea><br>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <strong>Posted</strong>
                                            <input type="datetime-local" name="posted_at" class="form-control"
                                                placeholder="Nhập ngày đăng: ">
                                        </div>
                                        <div class="col-xl-6">
                                            <strong>Priority </strong> <br>
                                            <select id="priority" name="priority" class="form-select">
                                                <option selected value="yes">Ưu tiên</option>
                                                <option value="no">Không ưu tiên</option>
                                            </select><br><br>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success mt-2">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
