@extends('layout')
@section('content')
    <div class="page">
        <!-- Sidebar -->
        @include('sidebar')
        <!-- Sidebar -->
        <div class="page-wrapper">
            <!-- Page header -->
            <div class="container">
                <div class="cart">
                    <div class="cart-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>Edit Post</h3>
                            </div>
                            <div class="col-md-6">
                                <a href=" {{ route('post.index') }} "class="btn btn-primary float-end">Danh sách post</a>
                            </div>
                        </div>
                    </div>

                    <div class="cart-body bg-secondary">
                        <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <strong>Title </strong>
                                        <input type="text" name="title" value="{{ $post->title }}"
                                            class="form-control" placeholder="Nhập tên bài viết: ">
                                    </div>
                                    <div class="col-xl-6">
                                        <br><strong>Featured </strong>&nbsp;&nbsp;
                                        @if ($post->is_featured == 'outstanding')
                                            <input type="radio" id="fautured" name="is_featured" value="outstanding"
                                                checked> outstanding &nbsp;&nbsp;
                                            <input type="radio" id="fautured" name="is_featured"
                                                value="normal">normal<br>
                                        @else
                                            <input type="radio" id="fautured" name="is_featured" value="outstanding">
                                            outstanding &nbsp;&nbsp;
                                            <input type="radio" id="fautured" name="is_featured" value="normal" checked>
                                            normal<br>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <strong>Status</strong>
                                        <input type="text" name="status" value="{{ $post->status }}"
                                            class="form-control" placeholder="Nhập trạng thái: ">
                                    </div>
                                    <div class="col-xl-6">
                                        <strong>Image</strong><br>
                                        <input type="file" name="file_upload" id="imageFile" onchange="chooseFile(this)">
                                        <img src="{{ asset('images/' . $post->image) }}" id="onload" alt=""
                                            width="200" height="200"><br>
                                    </div>
                                </div>
                                <strong>Excerpt </strong>
                                <textarea type="text" name="excerpt" id="editor-excerpt-edit" class="form-control" cols="30" rows="3">{{ $post->excerpt }}
                                </textarea>
                                <strong>Content </strong>
                                <textarea type="text" name="content" id="editor-content-edit" class="form-control" cols="30" rows="10"> 
                                    {{ $post->content }}
                                </textarea><br>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <strong>Posted</strong><br>
                                        <input type="datetime-local" name="posted_at" value="{{ $post->posted_at }}">
                                    </div>
                                    <div class="col-xl-6">
                                        <strong>Priority </strong> <br>
                                        <select id="priority" name="priority">
                                            <option selected value="yes">Ưu tiên</option>
                                            <option value="no">Không ưu tiên</option>
                                        </select><br><br>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success mt-2">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
