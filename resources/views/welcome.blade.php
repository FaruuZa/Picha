@extends('layouts.master')

@section('style')
<link rel="stylesheet" href="{{asset('css/lobby.css')}}">
@endsection

@section('container')
{{-- <form action="/logout" method="GET">
        <div class="modal-body" style="padding-bottom: 0;">
            <h5 class="modal-title mb-1" id="staticBackdropLabel">keluar</h5>
            <p>anda yakin ingin keluar?</p>
        </div>
        <div class="modal-footer" style="padding-top:5px; padding-bottom:5px;">
            <div class="but" style="width:100%; display:flex; justify-content:space-between;">
                <button class="btn btn-outline-secondary" data-dismiss="modal" type="button" style="width:49%"><i class="fas fa-times" class="text-secondary"></i></button>
                <button class="btn btn-outline-danger" type="submit" style="width:49%"><i class="fas fa-check" class="text-danger"></i></button>
            </div>

        </div>
</form> --}}

<div class="container">
    <div class="profile">
        <div class="atas">
            <div class="avatar">
                <label class="label" for="file">
                    <span class="glyphicon glyphicon-camera"></span>
                    <span>Change Image</span>
                </label>
                <input id="file" type="file" onchange="loadFile(event)" name="image" />
                <img src="{{ asset('/img/' . Auth::user()->image) }}" id="output" width="200" />
            </div>
            <h2>{{Auth::user()->name}}</h2>
        </div>
        <div class="bawah">
            {{-- <form action="/logout" method="GET">
                <button type="submit">logout</button>
            </form> --}}
            <div class="circle">
                <a data-toggle="modal" data-target="#logoutModal" data-toggle="tooltip" data-placement="right" title="Logout"><i class="fas fa-sign-out-alt fa-lg" style="color: white"></i></a>
            </div>
            <div class="circle">
                <a data-toggle="modal" data-target="#roomModal" data-toggle="tooltip" data-placement="right" title="Add Room"><i class="fas fa-plus fa-lg" style="color: white"></i></a>
            </div>
            <div class="circle">
                <a data-toggle="modal" data-target="#editProfileModal" data-toggle="tooltip" data-placement="right" title="Edit Profile"><i class="fas fa-edit fa-lg" style="color: white"></i></a>
            </div>
        </div>
    </div>
    <div class="joined">
        <div class="atas">
            Joined Room
        </div>
        <div class="bawah">
            <div class="scrollable">
                @foreach ($joinedRooms as $room)
                <a href="/chat/{{$room->code}}" class="room">
                    <div class="profil-group">
                    </div>
                    <div class="nama">
                        {{$room->name}} <span class="kode">#{{$room->code}}</span>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
