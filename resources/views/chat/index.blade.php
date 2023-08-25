@extends('layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/chat.css') }}">
@endsection

@section('container')
    <div class="container">
        @include('chat.modal.tesmodal')
        <div class="ks-page-content">
            <div class="ks-page-content-body">
                <div class="ks-messenger">
                    <div class="ks-discussions">
                        {{-- <div class="ks-body ks-scrollable jspScrollable" data-auto-height=""
                            style="height: 400px; overflow-y: auto; padding: 0px; width: 339px;" tabindex="0">

                            <div class="jspContainer" style="width: 339px; height: auto;">
                                <div class="jspPane" style="padding: 0px; top: 0px; width: 329px;">
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
                        </div> --}}
                        <a class="ks-avatar ks-online "><img src="{{ asset('/img/'. Auth::user()->image) }}"
                            width="36" height="36" class="rounded-circle" data-toggle="modal" data-target="#myModal"></a>
                        <a href="/logout"><i class="fas fa-sign-out-alt"></i>logout</a>
                    </div>

                    <div class="ks-messages ks-messenger__messages">
                        <div class="ks-header">
                                <div class="ks-description">
                                    <div class="ks-name">Picha</div>
                                </div>
                        </div>
                        <div class="ks-body ks-scrollable jspScrollable" data-auto-height="" data-reduce-height=".ks-footer"
                            data-fix-height="32" style="height: 480px; overflow-Y: scroll; padding: 0px; width: 100%;"
                            tabindex="0">
                            <div class="jspContainer" style="width: 100%; height: auto;">
                                <div class="jspPane" style="padding: 0px; top: 0px; width: 100%;">
                                    <ul class="ks-items">
                                        @foreach ($messages as $message)
                                        <li class="ks-item {{ Auth::user()->name == $message->User->name ? 'ks-from' : 'ks-self' }}">
                                            <a href="/profile/{{ $message->User->name }}" class="ks-avatar ks-online ">
                                                <img src="{{ asset('/img/'.$message->User->image) }}"
                                                width="36" height="36" class="rounded-circle">
                                            </a>
                                            <div class="ks-body">
                                                <div class="ks-header">
                                                    <a href="/profile/{{ $message->User->name }}" class="ks-name">{{ $message->User->name }}</a>
                                                    <span class="ks-datetime">{{ \Carbon\Carbon::parse($message->created_at)->format('H:i') . ' WIB' }}</span>
                                                </div>
                                                <div class="ks-message">{{ $message->message }}</div>
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
                                <input type="text" class="form-control" placeholder="Type something..." name="message" autofocus autocomplete="off">
                                <div class="ks-controls" style="width: fit-content;">
                                    <button type="submit" class="btn btn-primary">Send</button>
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
