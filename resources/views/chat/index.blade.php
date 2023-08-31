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
                            <a class="ks-avatar ks-online " data-toggle="modal" data-target="#myModal"
                                data-whatever="{{ Auth::user()->name }}|{{ Auth::user()->image }}|{{ Auth::user()->created_at }}"><img
                                    src="{{ asset('/img/' . Auth::user()->image) }}" width="36" height="36"
                                    class="rounded-circle"></a>
                        </div>
                        <div class="bawah">
                            <a class="reported mb-1 "><i class="fas fa-tools btn" style="color: #ffffff;" data-toggle="tooltip" data-placement="right" title="Mods Tools"></i></a>
                            <a data-toggle="modal" data-target="#logoutModal"  data-toggle="tooltip" data-placement="right" title="Logout"><i
                                    class="fas fa-sign-out-alt btn"style="color: white"></i></a>
                        </div>
                    </div>

                    <div class="ks-messages ks-messenger__messages">
                        <div class="ks-header">
                            <div class="ks-description">
                                <div class="ks-name">Picha</div>
                            </div>
                            <div class="ks-controls">
                                <div class="dropdown">
                                    <button class="btn btn-primary-outline ks-light ks-no-text ks-no-arrow" type="button"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        data-display="static" aria-expanded="false">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right ks-simple search-bar px-2"
                                        aria-labelledby="dropdownMenuButton">
                                        <form action="" method="GET">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="search message"
                                                    name="search" aria-label="Recipient's username"
                                                    aria-describedby="button-addon2" autocomplete="off" autofocus
                                                    value="{{ $searched != '' ? $searched : '' }}">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary" type="submit"
                                                        id="button-addon2">Search</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ks-body ks-scrollable jspScrollable" data-auto-height="" data-reduce-height=".ks-footer"
                            data-fix-height="32" style="height: 480px; overflow-Y: scroll; padding: 0px; width: 100%;"
                            tabindex="0">
                            <div class="jspContainer" style="width: 100%; height: auto;">
                                <div class="jspPane" style="padding: 0px; top: 0px; width: 100%;">
                                    <ul class="ks-items">
                                        @if ($searched)
                                            <a href="/" class="btn btn-outline-primary position-fixed"
                                                style="z-index:99;"><i class="fas fa-chevron-left"></i></a>
                                            <div class="mb-5"></div>
                                        @endif
                                        @if ($messages->count() == 0)
                                            <h3 class="disabled"
                                                style="text-align:center; width:100%; color:rgba(75, 75, 75, 0.877);">there
                                                is no message</h3>
                                        @endif
                                        @foreach ($messages as $message)
                                            <li
                                                class="ks-item {{ Auth::user()->name == $message->User->name ? 'ks-from' : 'ks-self' }}">
                                                <a class="ks-avatar ks-online " data-toggle="modal"
                                                    data-target="{{ Auth::user()->name == $message->User->name ? '#myModal' : '#theirModal' }}"
                                                    data-whatever="{{ $message->User->name }}|{{ $message->User->image }}|{{ $message->User->created_at }}">
                                                    <img src="{{ asset('/img/' . $message->User->image) }}" width="36"
                                                        height="36" class="rounded-circle">
                                                </a>
                                                <div class="ks-body">
                                                    <div class="ks-header">
                                                        <a class="ks-name" data-toggle="modal"
                                                            data-target="{{ Auth::user()->name == $message->User->name ? '#myModal' : '#theirModal' }}"
                                                            data-whatever="{{ $message->User->name }}|{{ $message->User->image }}|{{ $message->User->created_at }}">{{ $message->User->name }}</a>
                                                        <div class="dropdown no-arrow">
                                                            <div class="ks-datetime more" data-toggle="dropdown"
                                                                aria-expanded="false"><i class="fas fa-ellipsis-h"></i>
                                                            </div>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item"
                                                                    onclick="copyMessage(this)">copy</a>
                                                                @if ($message->User->name == Auth::user()->name || Auth::user()->role != 'user')
                                                                    @if ($message->User->name == Auth::user()->name)
                                                                        <a class="dropdown-item" data-toggle="modal"
                                                                            data-target="#editModal"
                                                                            data-whatever="{{ $message->id }}">edit</a>
                                                                    @endif
                                                                    <a class="dropdown-item text-danger"
                                                                        data-toggle="modal" data-target="#deleteModal"
                                                                        data-whatever="{{ $message->id }}">delete</a>
                                                                @elseif(Auth::user()->role == 'admin')
                                                                    <a class="dropdown-item" data-toggle="modal"
                                                                        data-target="#reportModal"
                                                                        data-whatever="{{ $message->id }}">Report</a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="ks-message">{{ $message->message }}</div>
                                                    <div class="tes">
                                                        <span
                                                            class="ks-tes-datetime">{{ \Carbon\Carbon::parse($message->created_at)->format('H:i') . ' WIB' }}</span>
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
                        <form action="/" class="ks-footer" method="POST">
                            @csrf
                            <input type="text" class="form-control" placeholder="Type something..." name="message"
                                autofocus autocomplete="off" maxlength="141" id="kirimInput">
                            <div class="ks-controls" style="width: fit-content;">
                                <button type="submit" class="btn btn-primary" id="kirimButton" disabled><i
                                        class="fas fa-paper-plane" style="color: #ffffff;"></i></button>
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
