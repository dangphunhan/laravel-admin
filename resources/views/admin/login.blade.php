@extends('layout')
@section('content')
    <section class="login-block">
        <div class="container">
            <div class="row">
                <div class="col-md-4 login-sec">
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        @foreach ($errors->all() as $err)
                            <p class="alert alert-danger">{{ $err }}</p>
                        @endforeach
                    @endif
                    <h2 class="text-center">Login Now</h2>
                    <form action="{{ route('login.action') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1" name="username" class="text-uppercase">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" class="text-uppercase">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="">
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input">
                                <small>Remember Me</small>
                            </label>
                            <button type="submit" class="btn btn-primary float-right">Submit</button>
                        </div>
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
