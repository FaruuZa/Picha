<div class="position-fixed top-0 right-0 p-3" style="z-index: 5; right: 0; top: 0;">
    <div id="copyToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
        {{-- <div class="toast-header">
            <img src="..." class="rounded mr-2" alt="...">
            <strong class="mr-auto">Bootstrap</strong>
            <small>11 mins ago</small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div> --}}
        <div class="toast-body">
            message copied!
        </div>
    </div>
</div>
@if (session()->has('deleted'))
<div class="position-fixed top-0 right-0 p-3" style="z-index: 5; right: 0; top: 0;">
    <div id="deleteToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
        {{-- <div class="toast-header">
            <img src="..." class="rounded mr-2" alt="...">
            <strong class="mr-auto">Bootstrap</strong>
            <small>11 mins ago</small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div> --}}
        <div class="toast-body">
            message deleted!
        </div>
    </div>
</div>
@endif
