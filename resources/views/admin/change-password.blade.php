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
                                    <h3>Change Password</h3>
                                </div>
                            </div>
                        </div>
                        <div class="cart-body">
                            <form action="{{ route('password.update') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    @if (session('succsess'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('succsess') }}
                                        </div>
                                    @elseif (session('error'))
                                        <div class="alert alert-danger" role="alert">
                                            {{ session('error') }}
                                        </div>
                                    @endif
        
                                    <div class="mb-3">
                                        <label for="oldPasswordInput" class="form-label">Old Password</label>
                                        <input name="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" id="oldPasswordInput"
                                            placeholder="Old Password">
                                        @error('old_password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="newPasswordInput" class="form-label">New Password</label>
                                        <input name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput"
                                            placeholder="New Password">
                                        @error('new_password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="confirmNewPasswordInput" class="form-label">Confirm New Password</label>
                                        <input name="new_password_confirmation" type="password" class="form-control" id="confirmNewPasswordInput"
                                            placeholder="Confirm New Password">
                                    </div>
                                </div>
        
                                <div class="card-footer">
                                    <button class="btn btn-success">Submit</button>
                                </div>
        
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
