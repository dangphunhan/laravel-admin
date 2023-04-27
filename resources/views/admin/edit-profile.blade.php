@extends('layout')
@section('content')
    @include('sidebar')
    <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
            <section style="background-color: #eee;">
                <div class="container py-2">
                    <form action="{{ route('update.profile', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card mb-4">
                                    <div class="card-body text-center">
                                        <img src="{{ asset('images/' . $user->avatar) }}" id="onload" alt="avatar"
                                            class="rounded-circle img-fluid" style="width: 150px;">
                                        <br><br>
                                        <input style="padding-left: 80px" type="file" value="{{ $user->avatar }}"
                                            name="file_upload" onchange="chooseFile(this)">
                                        <h3 class="my-3"></h3>
                                        <div class="d-flex justify-content-center mb-2">
                                            <p class="mb-0">Avatar</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Full Name</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="name"
                                                    value="{{ $user->name }}">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">User Name</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="username"
                                                    value="{{ $user->username }}">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Gmail</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="gmail"
                                                    value="{{ $user->gmail }}">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Phone</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="phone"
                                                    value="{{ $user->phone }}">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Address</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="address"
                                                    value="{{ $user->address }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success mt-2">Update</button>
                    </form>
                </div>
            </section>
        </div>
    </div>
@endsection
