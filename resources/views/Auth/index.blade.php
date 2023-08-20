@extends('layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/tes.css') }}">
@endsection

@section('container')
    <div class="container d-flex justify-content-center">
        <div class="card pt-3">

            {{-- form Login --}}
            @if ($active == 'login')
                <form class="form-signin" method="POST" action="/login">
                    @csrf
                    <div class="text-center mb-5">
                        <h1 class="h1 mb-3 font-weight-bold">Picha</h1>
                    </div>
                    @if (session()->has('LoginError'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session('LoginError') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @elseif(session()->has('RegisterDone'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('RegisterDone') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="form-label-group">
                        <input type="email" id="inputEmail" class="form-control @error('email')is-invalid @enderror"
                            placeholder="Email address" required autofocus name="email">
                        <label for="inputEmail">Email address</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-label-group mb-5">
                        <input type="password" id="inputPassword" name="password"
                            class="form-control @error('password')is-invalid @enderror" placeholder="Password" required>
                        <label for="inputPassword">Password</label>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
                    <a href="/register">
                        <p class="mt-5 mb-3 text-muted text-center">
                            or Register now!
                        </p>
                    </a>
                </form>

                {{-- form Register --}}
            @elseif($active == 'register')
                <form class="form-signin" method="POST" action="register">
                    @csrf
                    <div class="text-center mb-5">
                        <h1 class="h1 mb-3 font-weight-bold">Picha</h1>
                    </div>

                    <div class="form-label-group">
                        <input type="text" id="inputName" class="form-control @error('name')is-invalid @enderror"
                            placeholder="username" required autofocus name="name" value="{{ old('name') }}">
                        <label for="inputName">username</label>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-label-group">
                        <input type="email" id="inputEmail" class="form-control @error('email')is-invalid @enderror"
                            placeholder="Email address" required autofocus name="email" value="{{ old('email') }}">
                        <label for="inputEmail">Email address</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-label-group mb-5">
                        <input type="password" id="inputPassword" name="password"
                            class="form-control @error('password')is-invalid @enderror" placeholder="Password" required>
                        <label for="inputPassword">Password</label>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
                    <a href="/login">
                        <p class="mt-5 mb-3 text-muted text-center">
                            already have an Account?
                        </p>
                    </a>
                </form>
            @endif

        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/tes.js') }}"></script>
@endsection
