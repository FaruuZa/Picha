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
        <form class="form-signin" method="POST" action="/createRoom">
            @csrf
            <div class="text-center mb-5">
                <h2 class="h2 mb-3 font-weight-bold">Buat Room</h2>
            </div>
            <div class="form-label-group">
                <input type="text" id="inputName" class="form-control" placeholder="nama room" required autofocus name="name">
                <label for="inputName">Masukkan nama room</label>
            </div>

            <div class="form-label-group mb-5">
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password (opsional)">
                <label for="inputPassword">Password</label>
                <i class="fas fa-eye" onclick="view(this)"></i>
            </div>

            <button class="btn btn-lg btn-primary btn-block" type="submit">Buat</button>
            <div class="m-5"></div>
        </form>
    </div>
</div>
{{-- <form action="/createRoom" method="post">
    @csrf
    <label for="name">Room Name</label>
    <input type="text" name="name" id="name" placeholder="room name">
    <input type="text" name="password" id="password" placeholder="password (optional)">
    <button type="submit">create</button>
</form> --}}
@endsection

@section('script')
<script src="{{asset('js/tes.js')}}"></script>
@endsection
