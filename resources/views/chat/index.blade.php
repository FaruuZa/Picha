@extends('layouts.master')

@section('style')
<link rel="stylesheet" href="{{ asset('css/chat.css') }}">
@endsection

@section('container')
<div class="container">
    @include('chat.partials.toasts')
    @include('chat.partials.modals')

    <div class="ks-page-content">
        <div class="ks-page-content-body">
            <div class="ks-messenger">
                <div class="ks-discussions">
                    <div class="atas">
                    </div>
                    <div class="bawah">
                        @if (Auth::user()->role != 'user')
                        <a href="#" data-toggle="tooltip" data-placement="right" title="Mods Tools"><i class="fas fa-tools fa-lg" style="color: #ffffff;"></i></a>
                        @endif
                        <a data-toggle="modal" data-target="#logoutModal" data-toggle="tooltip" data-placement="right" title="Logout"><i class="fas fa-sign-out-alt fa-lg" style="color: white"></i></a>
                        <a href=""><i class="fas fa-cog fa-lg" style="color: #ffffff;"></i></a>
                        <a class="ks-avatar ks-online mb-3" data-toggle="modal" data-target="#myModal" data-whatever="{{ Auth::user()->name }}|{{ Auth::user()->image }}|{{ Auth::user()->created_at }}"><img src="{{ asset('/img/' . Auth::user()->image) }}" width="30" height="30" class="rounded-circle"></a>
                    </div>
                </div>

                <div class="ks-messages ks-messenger__messages">
                    <div class="ks-header">
                        <div class="ks-description">
                            <div class="ks-name">Picha</div>
                        </div>
                        <div class="ks-controls">
                            <div class="dropdown">
                                <button class="btn btn-primary-outline ks-light ks-no-text ks-no-arrow" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" data-display="static" aria-expanded="false">
                                    <i class="fas fa-search"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right ks-simple search-bar px-2 {{ $searched ? 'keep-open' : ''}}" aria-labelledby="dropdownMenuButton">
                                    <form action="" method="GET">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="search message" name="search" aria-label="Recipient's username" aria-describedby="button-addon2" autocomplete="off" autofocus value="{{ $searched != '' ? $searched : '' }}">
                                            <div class="input-group-append">
                                                @if ($searched)
                                                <a href="/{{$path}}" class="btn btn-outline-secondary cancel" id="button-addon2"><i class="fas fa-times"></i></a>
                                                @endif
                                                <button class="btn btn-outline-secondary confirm" type="submit" id="button-addon2"><i class="fas fa-check"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ks-body ks-scrollable jspScrollable" data-auto-height="" data-reduce-height=".ks-footer" data-fix-height="32" style="height: 480px; overflow-Y: scroll; padding: 0px; width: 100%;" tabindex="0">
                        <div class="jspContainer" style="width: 100%; height: auto;">
                            <div class="jspPane" style="padding: 0px; top: 0px; width: 100%;">
                                <ul class="ks-items">
                                    @if ($messages->count() == 0)
                                    <h3 class="disabled" style="text-align:center; width:100%; color:rgba(75, 75, 75, 0.877);">Tidak ada pesan</h3>
                                    @endif
                                    @foreach ($messages as $message)
                                    <li class="ks-item {{ Auth::user()->name == $message->User->name ? 'ks-from' : 'ks-self' }}">
                                        <a class="ks-avatar ks-online " data-toggle="modal" data-target="{{ Auth::user()->name == $message->User->name ? '#myModal' : '#theirModal' }}" data-whatever="{{ $message->User->name }}|{{ $message->User->image }}|{{ $message->User->created_at }}" data-id="{{ $message->User->id }}">
                                            <img src="{{ asset('/img/' . $message->User->image) }}" width="36" height="36" class="rounded-circle">
                                        </a>
                                        <div class="ks-body">
                                            <div class="ks-header">
                                                <div class="ks-name">
                                                    <a style="color:rgb(97, 97, 248)" data-toggle="modal" data-target="{{ Auth::user()->name == $message->User->name ? '#myModal' : '#theirModal' }}" data-whatever="{{ $message->User->name }}|{{ $message->User->image }}|{{ $message->User->created_at }}" data-id="{{ $message->User->id }}">{{ $message->User->name }}</a>
                                                    @if ($message->User->role != 'user')
                                                    <i class="fas fa-{{ $message->User->role == 'moderator' ? 'shield-alt' : 'crown'}} ml-1" data-toggle="tooltip" title="{{$message->User->role}}"></i>
                                                    @endif
                                                </div>

                                                <div class="dropdown no-arrow">
                                                    <div class="ks-datetime more" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-h"></i>
                                                    </div>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" onclick="copyMessage(this)">Salin</a>
                                                        @if ($message->User->name == Auth::user()->name || Auth::user()->role != 'user')
                                                        @if ($message->User->name == Auth::user()->name)
                                                        <a class="dropdown-item" data-toggle="modal" data-target="#editModal" data-whatever="{{ $message->id }}">Edit</a>
                                                        @endif
                                                        <a class="dropdown-item text-danger" data-toggle="modal" data-target="#deleteModal" data-whatever="{{ $message->id }}">Hapus</a>
                                                        @elseif(Auth::user()->role == 'user')
                                                        <a class="dropdown-item text-danger" data-toggle="modal" data-target="#reportModal" data-whatever="pesan" data-id="{{ $message->id }}">Laporkan</a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ks-message">{{ $message->message }}</div>
                                            <div class="tes">
                                                <span class="ks-tes-datetime">{{ \Carbon\Carbon::parse($message->created_at)->format('H:i') . ' WIB' }}</span>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach

                                </ul>
                            </div>
                            <div class="jspVerticalBar">
                                <div class="jspCap jspCapTop"></div>
                                <div class="jspTrack" style="height: auto;">
                                    <div class="jspDrag" style="height: auto ;">
                                        <div class="jspDragTop"></div>
                                        <div class="jspDragBottom"></div>
                                    </div>
                                </div>
                                <div class="jspCap jspCapBottom"></div>
                            </div>
                        </div>
                    </div>
                    <form action="" class="ks-footer" method="POST">
                        @csrf
                        <input type="text" class="form-control" placeholder="Ketikkan pesan" name="message" autofocus autocomplete="off" maxlength="141" id="kirimInput">
                        <div class="ks-controls" style="width: fit-content;">
                            <button type="submit" class="btn btn-primary" id="kirimButton" disabled><i class="fas fa-paper-plane" style="color: #ffffff;"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('js/chat.js') }}"></script>
@endsection
