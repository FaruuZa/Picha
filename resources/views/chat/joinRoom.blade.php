@extends('layouts.master')

@section('style')

@endsection

@section('container')
    <form action="/joinRoom" method="post">
        @csrf
    <label for="name">Room Code</label>
    <input type="text" name="code" id="code" placeholder="room code">
    <input type="text" name="password" id="password" placeholder="password (optional)">
    <button type="submit">Join</button>
    </form>
@endsection

@section('script')

@endsection
