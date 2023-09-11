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
            <div class="img"></div>
        </div>
        <div class="bawah">

        </div>
    </div>
    <div class="joined">
        <div class="atas">
            Joined Room
        </div>
        <div class="bawah">
            <div class="scrollable">
                <div class="room">
                    <div class="profil-group">
                    </div>
                    <div class="nama">
                        League Of Legend<span class="kode">#kodeRoom</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
