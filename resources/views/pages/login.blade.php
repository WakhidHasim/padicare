@extends('layouts.auth.app', ['title' => 'Login'])

@section('content')
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-md-center h-100">
                <div class="card-wrapper my-auto">
                    <div class="card fat">
                        <div class="card-body">
                            <a href="{{ route('home') }}">
                                <h4 class="card-title text-center">PadiCare Login</h4>
                            </a>
                            @if (Session::has('success'))
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert">
                                        <i class="fa fa-times"></i>
                                    </button>
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if (Session::has('error'))
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert">
                                        <i class="fa fa-times"></i>
                                    </button>
                                    {{ session('error') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ route('login.post') }}" class="my-login-validation"
                                novalidate="">
                                @csrf
                                <div class="form-group">
                                    <label for="email">E-Mail Address</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" autofocus>
                                    @error('email')
                                        <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        data-eye>
                                    @error('password')
                                        <small id="passwordHelp" class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group m-0">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Login
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
