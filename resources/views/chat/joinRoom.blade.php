@extends('layouts.master')

@section('style')
<link rel="stylesheet" href="{{ asset('css/tes.css') }}">
@endsection

@section('container')
<form action="join" method="POST">
    <div class="">
        <img src="{{ asset('img/'. $Room->profile)}}" alt="..." width="40px">
        <div class="ket">
            <div class="nama">{{$Room->name}}</div>
            <div class="members">{{count($members)}} members</div>
        </div>
    </div>
    @if ($Room->password)
    <div class="form-label-group mb-5">
        <input type="password" name="password" class="form-control inputPassword" placeholder="Password (opsional)">
        <label for="inputPassword">Password</label>
        <i class="fas fa-eye" onclick="view(this)"></i>
    </div>
    @endif

    <button class="btn btn-lg btn-primary btn-block" type="submit">Bergabung</button>
    <div class="m-2"></div>
</form>
@endsection

@section('script')
<script src="{{ asset('js/tes.js') }}"></script>
@endsection
