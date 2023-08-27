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
    <div class="modal-dialog">
        <form action="/del" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    {{-- <h3>delete this message?</h3> --}}
                    <p>aaaa</p>
                    @csrf
                    <input type="text" class="id" name="id" readonly hidden>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="submit">Delete</button>
                </div>
            </div>
        </form>
    </div>
</div>



