@extends('layouts.master')

@section('style')
<link rel="stylesheet" href="{{ asset('css/tes.css') }}">
<style>
    body{
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
    }
    .card{
        width: calc(100vw - 70% + 5vw) !important;
        padding: 10px
    }

    .info{
        display: flex;
        flex-direction: row;
        gap: 5px
    }
    .info .nama{
        font-size: 100%
    }

    .info .members{
        font-size: 80%
    }

    @media screen and (max-width:700px) {
        .card{
            width: 80% !important;
        }
    }

</style>
@endsection

@section('container')
<div class="card">
    <form action="/joinRoom" method="POST">
        @csrf
        <div class="info mb-3">
            <img src="{{ asset('img/'. $Room->profile)}}" alt="..." width="40px">
            <div class="ket">
                <div class="nama">{{$Room->name}}</div>
                <div class="members">{{count($members)}} members</div>
            </div>
        </div>
        <input type="text" value="{{$Room->code}}" name="code" hidden>
        @if ($Room->password)
        <div class="form-label-group mb-3">
            <input type="password" name="password" class="form-control inputPassword" placeholder="Password (opsional)">
            <label for="inputPassword">Password</label>
            <i class="fas fa-eye" onclick="view(this)"></i>
        </div>
        @endif

        <button class="btn btn-lg btn-primary btn-block" type="submit">Bergabung</button>
        <div class="m-2"></div>
    </form>
</div>
@endsection

@section('script')
<script src="{{ asset('js/tes.js') }}"></script>
@endsection
