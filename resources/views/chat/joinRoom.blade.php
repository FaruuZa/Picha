@extends('layouts.master')

@section('style')
<link rel="stylesheet" href="{{asset('css/tes.css')}}">
<style>
    body {
        height: 100vh
    }

</style>
@endsection

@section('container')
<div class="container d-flex justify-content-center">
    <div class="card pt-3">
        <form class="form-signin" method="POST" action="/joinRoom">
            @csrf
            <div class="text-center mb-5">
                <h3 class="h3 mb-3 font-weight-bold">Bergabung dengan Room</h3>
            </div>
            @if (session()->has('noRoom'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ session('noRoom') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @elseif(session()->has('errPass'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ session('errPass') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="form-label-group">
                <input type="text" id="inputCode" class="form-control" placeholder="kode room" required autofocus name="code" value="{{old('code')}}">
                <label for="inputcode">Masukkan kode room</label>
            </div>

            <div class="form-label-group mb-5">
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password (opsional)">
                <label for="inputPassword">Password</label>
                <i class="fas fa-eye" onclick="view(this)"></i>
            </div>

            <button class="btn btn-lg btn-primary btn-block" type="submit">Bergabung</button>
            <div class="m-5"></div>
        </form>
    </div>
    {{-- <form action="/joinRoom" method="post">
        @csrf
        <label for="name">Room Code</label>
        <input type="text" name="code" id="code" placeholder="room code">
        <input type="text" name="password" id="password" placeholder="password (optional)">
        <button type="submit">Join</button>
    </form> --}}
</div>
@endsection

@section('script')
<script src="{{asset('js/tes.js')}}"></script>
@endsection
