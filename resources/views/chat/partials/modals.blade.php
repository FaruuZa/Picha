{{-- user --}}

<div class="modal fade" id="myModal">
    <form class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="modal-body tesModal">
                <div class="modalAvatar">
                    {{-- <input type="file" name="avatar" id="avatar" class="editAvatar"> --}}
                    <div class="editAvatar"><i class="fas fa-camera fa-lg" style="color: #ffffff;"></i></div>
                    <img src="{{ asset('/img/' . Auth::user()->image) }}" alt="">
                </div>
                <h1>{{ Auth::user()->name }}</h1>
                <p class="disabled">Created At: {{ Auth::user()->created_at }}</p>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </form>
</div>

{{-- other  --}}

<div class="modal fade" id="theirModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="modal-body tesModal">
                <div class="modalAvatar">
                    <img src="{{ asset('/img/' . Auth::user()->image) }}" alt="">
                </div>
                <h1>{{ Auth::user()->name }}</h1>
                <p class="disabled">Created At: {{ Auth::user()->created_at }}</p>
            </div>
        </div>
    </div>
</div>

{{-- delete modal --}}

<div class="modal fade" id="deleteModal">
    <div class="modal-dialog delete-modal modal-dialog-centered">
        <form action="/del" method="POST">
            <div class="modal-content ">
                {{-- <div class="modal-header">
                </div> --}}
                <!-- Modal body -->
                <div class="modal-body" style="padding-bottom: 0;">
                    <h5 class="modal-title mb-1" id="staticBackdropLabel">Delete Message</h5>
                    <p>are you sure to delete this message?</p>
                    @csrf
                    <input type="text" class="id" name="id" readonly hidden>
                </div>
                <div class="modal-footer" style="padding-top:5px; padding-bottom:5px;">
                    <div class="but"  style="width:100%; display:flex; justify-content:center;">
                        <button class="btn btn-secondary mr-1" data-dismiss="modal" type="button" style="width:40%">back</button>
                        <button class="btn btn-danger" type="submit" style="width:45%">Delete</button>
                    </div>

                </div>
                {{-- <div class="modal-footer">
                </div> --}}
            </div>
        </form>
    </div>
</div>

{{-- edit modal --}}

<div class="modal fade" id="editModal">
    <div class="modal-dialog edit-modal modal-dialog-centered">
        <form action="/edit" method="POST">
            @csrf
            <div class="modal-content ">
                {{-- <div class="modal-header">
                </div> --}}
                <!-- Modal body -->
                <div class="modal-body" style="padding-bottom: 0;">
                    <h5 class="modal-title mb-1" id="staticBackdropLabel">Edit Message</h5>
                    <input type="text" class="id" name="id" readonly hidden>
                    <input type="text" name="pesan" class="pesan form-control mb-2">
                </div>
                <div class="modal-footer" style="padding-top:5px; padding-bottom:5px;">
                    <div class="but"  style="width:100%; display:flex; justify-content:center;">
                        <button class="btn btn-secondary mr-1" data-dismiss="modal" type="button" style="width:40%">back</button>
                        <button class="btn btn-success" type="submit" style="width:45%"><i class="fas fa-paper-plane" style="color: #ffffff;"></i></button>
                    </div>

                </div>
            </div>
        </form>
    </div>
</div>

