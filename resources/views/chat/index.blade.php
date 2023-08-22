@extends('layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/chat.css') }}">
@endsection

@section('container')
    <div class="container">
        <div class="ks-page-content">
            <div class="ks-page-content-body">
                <div class="ks-messenger">
                    <div class="ks-discussions">
                        <div class="ks-search">
                            <div class="input-icon icon-right icon icon-lg icon-color-primary">
                                <input id="input-group-icon-text" type="text" class="form-control" placeholder="Search">
                                <span class="icon-addon">
                                    <span class="la la-search"></span>
                                </span>
                            </div>
                        </div>
                        <div class="ks-body ks-scrollable jspScrollable" data-auto-height=""
                            style="height: 400px; overflow-y: auto; padding: 0px; width: 339px;" tabindex="0">

                            <div class="jspContainer" style="width: 339px; height: auto;">
                                <div class="jspPane" style="padding: 0px; top: 0px; width: 329px;">
                                    @foreach ($rooms as $room)
                                    <ul class="ks-items">
                                        <li class="ks-item ">
                                            <a href="/chat/{{ $room->id }}">
                                                <span class="ks-group-amount">3</span>
                                                <div class="ks-body">
                                                    <div class="ks-name">
                                                        Group Chat
                                                        <span class="ks-datetime">just now</span>
                                                    </div>
                                                    <div class="ks-message">
                                                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png"
                                                            width="18" height="18" class="rounded-circle">s
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    @endforeach
                                </div>
                                <div class="jspVerticalBar">
                                    <div class="jspCap jspCapTop"></div>
                                    <div class="jspTrack" style="height: auto;">
                                        <div class="jspDrag" style="height: auto;">
                                            <div class="jspDragTop"></div>
                                            <div class="jspDragBottom"></div>
                                        </div>
                                    </div>
                                    <div class="jspCap jspCapBottom"></div>
                                </div>
                            </div>
                        </div>
                        <a href="/logout">logout</a>
                        <a href="/profile/{{ Auth::user()->name }}">profile</a>
                    </div>

                    <div class="ks-messages ks-messenger__messages">
                        <div class="ks-header">
                            @if (isset($Room))
                                <div class="ks-description">
                                    <div class="ks-name">Chat name</div>
                                    <div class="ks-amount">2 members</div>
                                </div>
                                <div class="ks-controls">
                                    <div class="dropdown">
                                        <button class="btn btn-primary-outline ks-light ks-no-text ks-no-arrow"
                                            type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right ks-simple"
                                            aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">
                                                <span class="la la-user-plus ks-icon"></span>
                                                <span class="ks-text">Add members</span>
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <span class="la la-eye-slash ks-icon"></span>
                                                <span class="ks-text">Mark as unread</span>
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <span class="la la-bell-slash-o ks-icon"></span>
                                                <span class="ks-text">Mute notifications</span>
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <span class="la la-mail-forward ks-icon"></span>
                                                <span class="ks-text">Forward</span>
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <span class="la la-ban ks-icon"></span>
                                                <span class="ks-text">Spam</span>
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <span class="la la-trash-o ks-icon"></span>
                                                <span class="ks-text">Delete</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="ks-body ks-scrollable jspScrollable" data-auto-height="" data-reduce-height=".ks-footer"
                            data-fix-height="32" style="height: 480px; overflow-Y: scroll; padding: 0px; width: 100%;"
                            tabindex="0">
                            <div class="jspContainer" style="width: 100%; height: auto;">
                                <div class="jspPane" style="padding: 0px; top: 0px; width: 100%;">
                                    @if (isset($Room))
                                    <ul class="ks-items">
                                        @foreach ($messages as $message)
                                        <li class="ks-item {{ Auth::user()->name == $message->User->name ? 'ks-from' : 'ks-self' }}">
                                            <a href="/profile/{{ $message->User->name }}" class="ks-avatar ks-online">
                                                <img src="{{ asset('/img/'.$message->User->image) }}"
                                                width="36" height="36" class="rounded-circle">
                                            </a>
                                            <div class="ks-body">
                                                <div class="ks-header">
                                                    <a href="/profile/{{ $message->User->name }}" class="ks-name">{{ $message->User->name }}</a>
                                                    <span class="ks-datetime">6:46 PM</span>
                                                </div>
                                                <div class="ks-message">{{ $message->message }}</div>
                                            </div>
                                        </li>
                                        @endforeach 
                                    </ul>
                                    @endif
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
                        @if (isset($Room))
                        <form action="/chat/{{ $Room->id }}" class="ks-footer" method="POST">
                                @csrf
                                <input type="text" class="form-control" placeholder="Type something..." name="message" autofocus autocomplete="off">
                                <div class="ks-controls" style="width: fit-content;">
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </div>
                            </form>
                        @else
                        
                        <div class="ks-footer">
                        </div>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/chat.js') }}"></script>
@endsection
