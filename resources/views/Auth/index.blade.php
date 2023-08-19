@extends('layouts.master')

@section('container')
    <div class="container ">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-7 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            {{-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> --}}
                            <div class="col-lg-12">
                                @if ($active == 'login')
                                    {{-- Login Form --}}

                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                        </div>
                                        <form class="user" action="" method="POST">
                                            @csrf
                                            <div class="input-group mb-3">
                                                <input type="email" class="form-control form-control-user"
                                                    autofocus="true" placeholder="Enter Email Address...">
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="password" class="form-control form-control-user"
                                                    placeholder="Password">
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-block">LOGIN</button>
                                        </form>
                                        <hr>
                                        <div class="text-center">
                                            <a class="small" href="/register">or create new Account</a>
                                        </div>
                                    </div>
                                @elseif ($active == 'register')
                                    {{-- Register Form --}}

                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Register</h1>
                                        </div>
                                        <form class="user">
                                            @csrf
                                            <div class="input-group mb-3">
                                                <input type="name" class="form-control form-control-user"
                                                    placeholder="Enter Your Name">
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="email" class="form-control form-control-user"
                                                    placeholder="Enter Your Email Address">
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="password" class="form-control form-control-user"
                                                    placeholder="Password">
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-block">LOGIN</button>
                                        </form>
                                        <hr>
                                        <div class="text-center">
                                            <a class="small" href="/">Already have an Account?</a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
