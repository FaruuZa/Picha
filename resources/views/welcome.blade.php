@extends('layouts.master')

@section('style')
<link rel="stylesheet" href="{{asset('css/lobby.css')}}">
<link rel="stylesheet" href="{{asset('css/tes.css')}}">
@endsection

@section('container')
@include('chat.partials.modals')

<div class="container">
    <div class="profile">
        <div class="atas">
            <div class="avatar">
                <img src="{{ asset('/img/' . Auth::user()->image) }}" id="output" width="200" />
            </div>
            <h2>{{Auth::user()->name}}</h2>
        </div>
        <div class="bawah">
            <h2>{{Auth::user()->name}}</h2>
            <div class="circles">
                <a class="circle" data-toggle="modal" data-target="#logoutModal" data-toggle="tooltip" data-placement="right" title="Logout"><i class="fas fa-sign-out-alt fa-lg" style="color: white"></i></a>
                <a class="circle" data-toggle="modal" data-target="#roomModal" data-toggle="tooltip" data-placement="right" title="Add Room"><i class="fas fa-plus fa-lg" style="color: white"></i></a>
                <a class="circle" data-toggle="modal" data-target="#myModal" data-toggle="tooltip" data-placement="right" title="Edit Profile"><i class="fas fa-edit fa-lg" style="color: white"></i></a>
            </div>
        </div>
    </div>
    @livewire('joinedRooms', )
</div>
@endsection

@section('script')
<script src="{{asset('js/tes.js')}}"></script>

<script>
    var loadFile = function() {
        var image = $("#output");
        var input = $("input#file")
        image.attr('src', URL.createObjectURL(input.prop('files')[0]))
        enableSave()
    };

    function enableSave() {
        var button = $("#btnProfileDiri");
        button.removeClass("btn-primary").addClass("btn-success").attr('type', 'submit').attr('data-dismiss', '');
        button.text("Save")
    }

    function disableSave() {
        var button = $("#btnProfileDiri");
        button.removeClass("btn-success").addClass("btn-primary").attr('type', '').attr('data-dismiss', 'modal');
        button.text("cancel")
    }

    function gantiNama(evt) {
        var asli = '{{Auth::user()->name}}'
        if (evt.value != asli) {
            enableSave()
        } else {
            disableSave()
        }
    }

</script>
@endsection
