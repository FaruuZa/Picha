<div class="container">
    @include('chat.partials.toasts')
    @include('chat.partials.modals')
    <input type="text" id="kodeRoom" readonly value="{{$Room->code}}" hidden>
    <div class="ks-page-content">
        <div class="ks-page-content-body">
            <div class="ks-messenger">
                <div class="ks-discussions">
                    <div class="atas">
                        <a href="/" class="mt-3" data-toggle="tooltip" data-placement="right" title="Back"><i class="fas fa-chevron-left" style="color: #ffffff;"></i></a>
                    </div>
                    <div class="bawah">
                        @if (Auth::user()->role != 'user')
                        <a href="#" data-toggle="tooltip" data-placement="right" title="Mods Tools"><i class="fas fa-tools fa-lg" style="color: #ffffff;"></i></a>
                        @endif
                        <div class="btn-group">
                            <a class="mb-4" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-cog fa-lg" style="color: #ffffff;"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <button class="dropdown-item text-danger" type="button" data-toggle="modal" data-target="#leaveRoomModal" data-whatever="{{$Room->id}}">Leave Room</button>
                            </div>
                          </div>
                    </div>
                </div>

                <div class="ks-messages ks-messenger__messages">
                    <div class="ks-header">
                        <div class="ks-description">
                            <div class="profil-group">
                                <img src="" alt="">
                            </div>
                            <div class="ks-name">{{$Room->name}} # <span style="user-select: text">{{$Room->code}}</span> </div>
                        </div>
                        <div class="ks-controls">
                            <div class="dropdown">
                                <button class="btn btn-primary-outline ks-light ks-no-text ks-no-arrow" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" data-display="static" aria-expanded="false">
                                    <i class="fas fa-search"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right ks-simple search-bar px-2 {{ $search ? 'keep-open' : ''}}" aria-labelledby="dropdownMenuButton">
                                    <form wire:submit.prevent="kirimSearch">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="search message" aria-label="Recipient's username" aria-describedby="button-addon2" autocomplete="off" autofocus value="{{ $search != '' ? $search : '' }}" wire:model='search'>
                                            <div class="input-group-append">
                                                @if ($search)
                                                <button class="btn btn-outline-secondary cancel" id="button-addon2" wire:click='batalSearch'><i class="fas fa-times"></i></button>
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

                                @livewire('ShowMessages', ['Room'=> $Room,'search' => $search])

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
                    <form class="ks-footer" wire:submit.prevent="send">
                        @csrf
                        <input type="text" class="form-control" placeholder="Ketikkan pesan" name="message" autofocus autocomplete="off" maxlength="141" id="kirimInput" wire:model='message'>
                        <div class="ks-controls" style="width: fit-content;">
                            <button type="submit" class="btn btn-primary" id="kirimButton" disabled><i class="fas fa-paper-plane" style="color: #ffffff;"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
