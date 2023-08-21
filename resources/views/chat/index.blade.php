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
                                    <ul class="ks-items">
                                        <li class="ks-item ks-active">
                                            <a href="#">
                                                <span class="ks-group-amount">3</span>
                                                <div class="ks-body">
                                                    <div class="ks-name">
                                                        Group Chat
                                                        <span class="ks-datetime">just now</span>
                                                    </div>
                                                    <div class="ks-message">
                                                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png"
                                                            width="18" height="18" class="rounded-circle"> The weird
                                                        future of movie theater food
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="ks-item ks-unread">
                                            <a href="#">
                                                <span class="ks-group-amount">5</span>
                                                <div class="ks-body">
                                                    <div class="ks-name">
                                                        Eric George
                                                        <span class="ks-datetime">just now</span>
                                                    </div>
                                                    <div class="ks-message">
                                                        <img src="https://bootdey.com/img/Content/avatar/avatar2.png"
                                                            width="18" height="18" class="rounded-circle"> Why didn't
                                                        he come and talk to me...
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        
                                        <li class="ks-item">
                                            <a href="#">
                                                <span class="ks-avatar">
                                                    <img src="https://bootdey.com/img/Content/avatar/avatar4.png"
                                                        width="36" height="36">
                                                    <span class="badge badge-pill badge-danger ks-badge ks-notify">7</span>
                                                </span>
                                                <div class="ks-body">
                                                    <div class="ks-name">
                                                        Eric George
                                                        <span class="ks-datetime">just now</span>
                                                    </div>
                                                    <div class="ks-message">Why didn't he come and talk to me himse...</div>
                                                </div>
                                            </a>
                                        </li>
                                        
                                    </ul>
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
                            <div class="ks-description">
                                <div class="ks-name">Chat name</div>
                                <div class="ks-amount">2 members</div>
                            </div>
                            <div class="ks-controls">
                                <div class="dropdown">
                                    <button class="btn btn-primary-outline ks-light ks-no-text ks-no-arrow" type="button"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false"><i class="fas fa-ellipsis-v"></i>
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
                        </div>
                        <div class="ks-body ks-scrollable jspScrollable" data-auto-height=""
                            data-reduce-height=".ks-footer" data-fix-height="32"
                            style="height: 480px; overflow-Y: scroll; padding: 0px; width: 100%;" tabindex="0">
                            <div class="jspContainer" style="width: 100%; height: auto;">
                                <div class="jspPane" style="padding: 0px; top: 0px; width: 100%;">
                                    <ul class="ks-items">
                                        <li class="ks-item ks-self">
                                            <span class="ks-avatar ks-offline">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png"
                                                    width="36" height="36" class="rounded-circle">
                                            </span>
                                            <div class="ks-body">
                                                <div class="ks-header">
                                                    <span class="ks-name">Brian Diaz</span>
                                                    <span class="ks-datetime">6:46 PM</span>
                                                </div>
                                                <div class="ks-message">The weird future of movie theater food</div>
                                            </div>
                                        </li>
                                        <li class="ks-item ks-from">
                                            <span class="ks-avatar ks-online">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar2.png"
                                                    width="36" height="36" class="rounded-circle">
                                            </span>
                                            <div class="ks-body">
                                                <div class="ks-header">
                                                    <span class="ks-name">Brian Diaz</span>
                                                    <span class="ks-datetime">6:46 PM</span>
                                                </div>
                                                <div class="ks-message">The weird future of movie theater food</div>
                                            </div>
                                        </li>
                                        <li class="ks-item ks-from">
                                            <span class="ks-avatar ks-online">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar2.png"
                                                    width="36" height="36" class="rounded-circle">
                                            </span>
                                            <div class="ks-body">
                                                <div class="ks-header">
                                                    <span class="ks-name">Brian Diaz</span>
                                                    <span class="ks-datetime">6:46 PM</span>
                                                </div>
                                                <div class="ks-message">The weird future of movie theater food</div>
                                            </div>
                                        </li>
                                        <li class="ks-item ks-from">
                                            <span class="ks-avatar ks-online">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar2.png"
                                                    width="36" height="36" class="rounded-circle">
                                            </span>
                                            <div class="ks-body">
                                                <div class="ks-header">
                                                    <span class="ks-name">Brian Diaz</span>
                                                    <span class="ks-datetime">6:46 PM</span>
                                                </div>
                                                <div class="ks-message">The weird future of movie theater food</div>
                                            </div>
                                        </li>
                                        <li class="ks-item ks-from">
                                            <span class="ks-avatar ks-online">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar2.png"
                                                    width="36" height="36" class="rounded-circle">
                                            </span>
                                            <div class="ks-body">
                                                <div class="ks-header">
                                                    <span class="ks-name">Brian Diaz</span>
                                                    <span class="ks-datetime">6:46 PM</span>
                                                </div>
                                                <div class="ks-message">The weird future of movie theater food</div>
                                            </div>
                                        </li>
                                        <li class="ks-item ks-from">
                                            <span class="ks-avatar ks-online">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar2.png"
                                                    width="36" height="36" class="rounded-circle">
                                            </span>
                                            <div class="ks-body">
                                                <div class="ks-header">
                                                    <span class="ks-name">Brian Diaz</span>
                                                    <span class="ks-datetime">6:46 PM</span>
                                                </div>
                                                <div class="ks-message">The weird future of movie theater food</div>
                                            </div>
                                        </li>
                                        <li class="ks-item ks-from">
                                            <span class="ks-avatar ks-online">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar2.png"
                                                    width="36" height="36" class="rounded-circle">
                                            </span>
                                            <div class="ks-body">
                                                <div class="ks-header">
                                                    <span class="ks-name">Brian Diaz</span>
                                                    <span class="ks-datetime">6:46 PM</span>
                                                </div>
                                                <div class="ks-message">The weird future of movie theater food</div>
                                            </div>
                                        </li>
                                        <li class="ks-item ks-from">
                                            <span class="ks-avatar ks-online">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar2.png"
                                                    width="36" height="36" class="rounded-circle">
                                            </span>
                                            <div class="ks-body">
                                                <div class="ks-header">
                                                    <span class="ks-name">Brian Diaz</span>
                                                    <span class="ks-datetime">6:46 PM</span>
                                                </div>
                                                <div class="ks-message">The weird future of movie theater food</div>
                                            </div>
                                        </li>
                                        <li class="ks-item ks-from">
                                            <span class="ks-avatar ks-online">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar3.png"
                                                    width="36" height="36" class="rounded-circle">
                                            </span>
                                            <div class="ks-body">
                                                <div class="ks-header">
                                                    <span class="ks-name">Brian Diaz</span>
                                                    <span class="ks-datetime">6:46 PM</span>
                                                </div>
                                                <div class="ks-message">
                                                    The weird future of movie theater food

                                                    <div class="ks-link">
                                                        <div class="ks-name">Google</div>
                                                        <a href="http://www.google.com" target="_blank">www.google.com</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="ks-item ks-self">
                                            <span class="ks-avatar ks-offline">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar4.png"
                                                    width="36" height="36" class="rounded-circle">
                                            </span>
                                            <div class="ks-body">
                                                <div class="ks-header">
                                                    <span class="ks-name">Brian Diaz</span>
                                                    <span class="ks-datetime">6:46 PM</span>
                                                </div>
                                                <div class="ks-message">The weird future of movie theater food</div>
                                            </div>
                                        </li>
                                        <li class="ks-item ks-from ks-unread">
                                            <span class="ks-avatar ks-online">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar5.png"
                                                    width="36" height="36" class="rounded-circle">
                                            </span>
                                            <div class="ks-body">
                                                <div class="ks-header">
                                                    <span class="ks-name">Brian Diaz</span>
                                                    <span class="ks-datetime">1 minute ago</span>
                                                </div>
                                                <div class="ks-message">
                                                    The weird future of movie theater food

                                                    <ul class="ks-files">
                                                        <li class="ks-file">
                                                            <a href="#">
                                                                <span class="ks-thumb">
                                                                    <span
                                                                        class="ks-icon la la-file-word-o text-info"></span>
                                                                </span>
                                                                <span class="ks-info">
                                                                    <span class="ks-name">Project...</span>
                                                                    <span class="ks-size">15 kb</span>
                                                                </span>
                                                            </a>
                                                        </li>
                                                        <li class="ks-file">
                                                            <a href="#">
                                                                <span class="ks-thumb">
                                                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png"
                                                                        width="36" height="36">
                                                                </span>
                                                                <span class="ks-info">
                                                                    <span class="ks-name">photo.jpg</span>
                                                                    <span class="ks-size">312 kb</span>
                                                                </span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="ks-separator">Today</li>

                                        <li class="ks-item ks-self">
                                            <span class="ks-avatar ks-offline">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar2.png"
                                                    width="36" height="36" class="rounded-circle">
                                            </span>
                                            <div class="ks-body">
                                                <div class="ks-header">
                                                    <span class="ks-name">Brian Diaz</span>
                                                    <span class="ks-datetime">6:46 PM</span>
                                                </div>
                                                <div class="ks-message">
                                                    Lorem Ipsum is simply dummy text of the printing and typesetting
                                                    industry. Lorem Ipsum has been the industry's standard dummy text ever
                                                    since the 1500s, when an unknown printer took a galley of type and
                                                    scrambled it to make a type specimen book. It has survived not only five
                                                    centuries, but also the leap into electronic typesetting, remaining
                                                    essentially unchanged. It was popularised in the 1960s with the release
                                                    of Letraset sheets containing Lorem Ipsum passages, and more recently
                                                    with desktop publishing software like Aldus PageMaker including versions
                                                    of Lorem Ipsum
                                                </div>
                                            </div>
                                        </li>
                                        <li class="ks-item ks-self">
                                            <span class="ks-avatar ks-offline">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar3.png"
                                                    width="36" height="36" class="rounded-circle">
                                            </span>
                                            <div class="ks-body">
                                                <div class="ks-header">
                                                    <span class="ks-name">Brian Diaz</span>
                                                    <span class="ks-datetime">6:46 PM</span>
                                                </div>
                                                <div class="ks-message">
                                                    Lorem Ipsum is simply dummy text of the printing and typesetting
                                                    industry. Lorem Ipsum has been the industry's standard dummy text ever
                                                    since the 1500s, when an unknown printer took a galley of type and
                                                    scrambled it to make a type specimen book. It has survived not only five
                                                    centuries, but also the leap into electronic typesetting, remaining
                                                    essentially unchanged. It was popularised in the 1960s with the release
                                                    of Letraset sheets containing Lorem Ipsum passages, and more recently
                                                    with desktop publishing software like Aldus PageMaker including versions
                                                    of Lorem Ipsum
                                                </div>
                                            </div>
                                        </li>
                                        <li class="ks-item ks-self">
                                            <span class="ks-avatar ks-offline">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar4.png"
                                                    width="36" height="36" class="rounded-circle">
                                            </span>
                                            <div class="ks-body">
                                                <div class="ks-header">
                                                    <span class="ks-name">Brian Diaz</span>
                                                    <span class="ks-datetime">6:46 PM</span>
                                                </div>
                                                <div class="ks-message">
                                                    Lorem Ipsum is simply dummy text of the printing and typesetting
                                                    industry. Lorem Ipsum has been the industry's standard dummy text ever
                                                    since the 1500s, when an unknown printer took a galley of type and
                                                    scrambled it to make a type specimen book. It has survived not only five
                                                    centuries, but also the leap into electronic typesetting, remaining
                                                    essentially unchanged. It was popularised in the 1960s with the release
                                                    of Letraset sheets containing Lorem Ipsum passages, and more recently
                                                    with desktop publishing software like Aldus PageMaker including versions
                                                    of Lorem Ipsum
                                                </div>
                                            </div>
                                        </li>
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
                        <div class="ks-footer">
                            <textarea class="form-control" placeholder="Type something..."></textarea>
                            <div class="ks-controls">
                                <button class="btn btn-primary">Send</button>
                                <a href="#" class="la la-paperclip ks-attachment"></a>
                                <div class="dropdown dropup">
                                    <button class="btn btn-link ks-smile" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <span class="la la-smile-o"></span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right ks-scrollable ks-smileys"
                                        aria-labelledby="dropdownMenuButton"
                                        style="overflow: hidden; padding: 0px; width: 200px;">
                                        <div class="jspContainer" style="width: 198px; height: 165px;">
                                            <div class="jspPane" style="padding: 0px; top: 0px; left: 0px; width: 100px;">
                                                <div class="ks-smileys-wrapper">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png"
                                                                        width="20" height="20">
                                                                </td>
                                                                <td>
                                                                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png"
                                                                        width="20" height="20">
                                                                </td>
                                                                <td>
                                                                    <img src="https://bootdey.com/img/Content/avatar/avatar3.png"
                                                                        width="20" height="20">
                                                                </td>
                                                                <td>
                                                                    <img src="https://bootdey.com/img/Content/avatar/avatar4.png"
                                                                        width="20" height="20">
                                                                </td>
                                                                <td>
                                                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png"
                                                                        width="20" height="20">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png"
                                                                        width="20" height="20">
                                                                </td>
                                                                <td>
                                                                    <img src="https://bootdey.com/img/Content/avatar/avatar3.png"
                                                                        width="20" height="20">
                                                                </td>
                                                                <td>
                                                                    <img src="https://bootdey.com/img/Content/avatar/avatar4.png"
                                                                        width="20" height="20">
                                                                </td>
                                                                <td>
                                                                    <img src="https://bootdey.com/img/Content/avatar/avatar5.png"
                                                                        width="20" height="20">
                                                                </td>
                                                                <td>
                                                                    <img src="https://bootdey.com/img/Content/avatar/avatar6.png"
                                                                        width="20" height="20">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png"
                                                                        width="20" height="20">
                                                                </td>
                                                                <td>
                                                                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png"
                                                                        width="20" height="20">
                                                                </td>
                                                                <td>
                                                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png"
                                                                        width="20" height="20">
                                                                </td>
                                                                <td>
                                                                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png"
                                                                        width="20" height="20">
                                                                </td>
                                                                <td>
                                                                    <img src="https://bootdey.com/img/Content/avatar/avatar3.png"
                                                                        width="20" height="20">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png"
                                                                        width="20" height="20">
                                                                </td>
                                                                <td>
                                                                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png"
                                                                        width="20" height="20">
                                                                </td>
                                                                <td>
                                                                    <img src="https://bootdey.com/img/Content/avatar/avatar3.png"
                                                                        width="20" height="20">
                                                                </td>
                                                                <td>
                                                                    <img src="https://bootdey.com/img/Content/avatar/avatar4.png"
                                                                        width="20" height="20">
                                                                </td>
                                                                <td>
                                                                    <img src="https://bootdey.com/img/Content/avatar/avatar5.png"
                                                                        width="20" height="20">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png"
                                                                        width="20" height="20">
                                                                </td>
                                                                <td>
                                                                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png"
                                                                        width="20" height="20">
                                                                </td>
                                                                <td>
                                                                    <img src="https://bootdey.com/img/Content/avatar/avatar3.png"
                                                                        width="20" height="20">
                                                                </td>
                                                                <td>
                                                                    <img src="https://bootdey.com/img/Content/avatar/avatar4.png"
                                                                        width="20" height="20">
                                                                </td>
                                                                <td>
                                                                    <img src="https://bootdey.com/img/Content/avatar/avatar5.png"
                                                                        width="20" height="20">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png"
                                                                        width="20" height="20">
                                                                </td>
                                                                <td>
                                                                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png"
                                                                        width="20" height="20">
                                                                </td>
                                                                <td>
                                                                    <img src="https://bootdey.com/img/Content/avatar/avatar3.png"
                                                                        width="20" height="20">
                                                                </td>
                                                                <td>
                                                                    <img src="https://bootdey.com/img/Content/avatar/avatar4.png"
                                                                        width="20" height="20">
                                                                </td>
                                                                <td>
                                                                    <img src="https://bootdey.com/img/Content/avatar/avatar5.png"
                                                                        width="20" height="20">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/chat.js') }}"></script>
@endsection
