@extends('layouts.master')

@section('style')

@endsection

@section('container')
    <form action="/createRoom" method="post">
        @csrf
    <label for="name">Room Name</label>
    <input type="text" name="name" id="name" placeholder="room name">
    <input type="text" name="password" id="password" placeholder="password (optional)">
    <button type="submit">create</button>
    </form>
@endsection

@section('script')

@endsection
