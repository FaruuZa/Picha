{{-- user --}}

<div class="modal fade" id="myModal">
    <form class="modal-dialog" action="/change" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="modal-body tesModal">
                <div class="modalAvatar">
                    <label class="label" for="file">
                        <span class="glyphicon glyphicon-camera"></span>
                        <span>Change Image</span>
                    </label>
                    <input id="file" type="file" onchange="loadFile(event)" name="image" />
                    <img src="{{ asset('/img/' . Auth::user()->image) }}" id="output" width="200" />
                </div>
                <h1>{{ Auth::user()->name }}</h1>
                <p class="disabled">Created At: {{ Auth::user()->created_at }}</p>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnProfileDiri">Close</button>
            </div>

        </div>
    </form>
</div>

{{-- other  --}}

<div class="modal fade" id="theirModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close dropdown no-arrow">
                    <div class="more" data-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-ellipsis-h"></i>
                    </div>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item text-danger trigger" data-toggle="modal" data-target="#reportModal" data-whatever="user" data-id='0'>Laporkan user</a>
                    </div>
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
                    <h5 class="modal-title mb-1" id="staticBackdropLabel">Hapus Pesan</h5>
                    <p>Anda yakin ingin menghapus pesan ini?</p>
                    @csrf
                    <input type="text" class="id" name="id" readonly hidden>
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
                    <h5 class="modal-title mb-2" id="staticBackdropLabel">Edit Pesan</h5>
                    <input type="text" class="id" name="id" readonly hidden>
                    <input type="text" name="pesan" class="pesan form-control mb-4" style="width:500px;" maxlength="141" autocomplete="off">
                </div>
                <div class="modal-footer" style="padding-top:5px; padding-bottom:5px;">
                    <div class="but" style="width:100%; display:flex; justify-content:space-between;">
                        <button class="btn btn-outline-secondary" data-dismiss="modal" type="button" style="width:49%"><i class="fas fa-times" class="text-primary"></i></button>
                        <button class="btn btn-outline-success" type="submit" style="width:49%" id="editButton"><i class="fas fa-check" class="text-primary"></i></button>
                    </div>

                </div>
            </div>
        </form>
    </div>
</div>

{{-- report modal --}}

<div class="modal fade" id="reportModal">
    <div class="modal-dialog report-modal " style="width: 300px">
        <form action="/report" method="POST">
            @csrf
            <div class="modal-content ">
                {{-- <div class="modal-header">
                </div> --}}
                <!-- Modal body -->
                <div class="modal-body" style="padding-bottom: 0;">
                    <h5 class="modal-title mb-4" id="staticBackdropLabel">Laporkan pesan</h5>
                    <input type="text" class="id" name="id" readonly hidden>
                    <input type="text" class="apa" name="apa" readonly hidden>
                    <label for="reason">Alasan:</label>
                    <input type="text" name="reason" required autofocus autocomplete="off" class="form-control mb-4">
                </div>
                <div class="modal-footer" style="padding-top:5px; padding-bottom:5px;">
                    <div class="but" style="width:100%; display:flex; justify-content:space-between;">
                        <button class="btn btn-outline-secondary" data-dismiss="modal" type="button" style="width:49%"><i class="fas fa-times"></i></button>
                        <button class="btn btn-outline-danger" type="submit" style="width:49%"><i class="fas fa-check"></i></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- logout modal --}}

<div class="modal fade" id="logoutModal">
    <div class="modal-dialog logout-modal">
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
    </div>
</div>
