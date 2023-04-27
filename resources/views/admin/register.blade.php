@extends('layout')
@section('content')
    <section class="login-block">
        <div class="container">
            <div class="row">
                <div class="col-md-4 login-sec">
                    @if ($errors->any())
                        @foreach ($errors->all() as $err)
                            <p class="alert alert-danger">{{ $err }}</p>
                        @endforeach
                    @endif
                    <h2 class="text-center">Register Now</h2>
                    <form action="{{ route('register.action') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label name="name" class="text-uppercase">Full Name</label>
                            <input type="text" name="name" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label name="username" class="text-uppercase">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label name="name" class="text-uppercase">Gmail</label>
                            <input type="text" name="gmail" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label name="name" class="text-uppercase">Phone</label>
                            <input type="text" name="phone" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label name="address" class="text-uppercase">Address</label>
                            <input type="text" name="address" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label class="text-uppercase">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label class="text-uppercase">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label class="text-uppercase">Avatar</label><br>
                            <input type="file" name="file_upload" id="imageFile" value="avatar_profile.jpg"  onchange="chooseFile(this)">
                            <img src="{{ asset('images/avatar_profile.jpg') }}" id="onload" alt="" width="100"
                                height="100">
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                    </form>
                </div>
                <div class="col-md-8 banner-sec">
                    <div class="carousel-item active">
                        <img class="d-block img-fluid" src="https://static.pexels.com/photos/33972/pexels-photo.jpg"
                            alt="First slide">
                    </div>
                </div>
            </div>
    </section>
@endsection
