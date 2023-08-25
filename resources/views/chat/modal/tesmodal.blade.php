<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal body -->
            <div class="modal-body tesModal">
                <img class="modalAvatar" src="{{ asset('/img/' . Auth::user()->image) }}" alt="">
                <h1>{{ Auth::user()->name }}</h1>
                <p class="disabled">Created At: {{ Auth::user()->created_at }}</p>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
