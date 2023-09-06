@extends('layouts.master')
@section('container')
<form action="/logout" method="GET">
    <div class="modal-content ">
        {{-- <div class="modal-header">
        </div> --}}
        <!-- Modal body -->
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
        {{-- <div class="modal-footer">
        </div> --}}
    </div>
</form>
@endsection
