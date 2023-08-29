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
                        <a class="ks-avatar ks-online " data-toggle="modal" data-target="#myModal" data-whatever="{{ Auth::user()->name }}|{{ Auth::user()->image }}|{{ Auth::user()->created_at }}"><img src="{{ asset('/img/'. Auth::user()->image) }}"
                            width="36" height="36" class="rounded-circle"></a>
                        <a data-toggle="modal" data-target="#logoutModal" style="color: white"><i class="fas fa-sign-out-alt"></i>logout</a>
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
                                            <a href="" class="ks-avatar ks-online " data-toggle="modal" data-target="{{ Auth::user()->name == $message->User->name ? '#myModal' : '#theirModal' }}" data-whatever="{{ $message->User->name }}|{{ $message->User->image }}|{{ $message->User->created_at }}">
                                                <img src="{{ asset('/img/'.$message->User->image) }}"
                                                width="36" height="36" class="rounded-circle">
                                            </a>
                                            <div class="ks-body">
                                                <div class="ks-header">
                                                    <a href="" class="ks-name" data-toggle="modal" data-target="{{ Auth::user()->name == $message->User->name ? '#myModal' : '#theirModal' }}" data-whatever="{{ $message->User->name }}|{{ $message->User->image }}|{{ $message->User->created_at }}">{{ $message->User->name }}</a>
                                                    <div class="dropdown">
                                                        <div class="ks-datetime more dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></div>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                          <a class="dropdown-item" onclick="copyMessage(this)">copy</a>
                                                          @if ($message->User->name == Auth::user()->name)
                                                          <a class="dropdown-item" data-toggle="modal" data-target="#editModal" data-whatever="{{$message->id}}">edit</a>
                                                          <a class="dropdown-item" data-toggle="modal" data-target="#deleteModal" data-whatever="{{$message->id}}">delete</a>
                                                          @else
                                                          <a class="dropdown-item" data-toggle="modal" data-target="#reportModal" data-whatever="{{$message->id}}">Report</a>
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
                        <form action="/" class="ks-footer" method="POST">
                                @csrf
                                <input type="text" class="form-control" placeholder="Type something..." name="message" autofocus autocomplete="off" maxlength="141" id="kirimInput">
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
