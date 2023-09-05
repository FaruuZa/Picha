{{-- copy message --}}

<div class="position-fixed top-0 right-0 p-3" style="z-index: 5; right: 0; top: 0;">
    <div id="copyToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
        <div class="toast-body">
            Pesan disalin!
        </div>
    </div>
</div>

{{-- delete message --}}

@if (session()->has('deleted'))
    <div class="position-fixed top-0 right-0 p-3" style="z-index: 5; right: 0; top: 0;">
        <div id="deleteToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
            <div class="toast-body">
                Pesan dihapus!
            </div>
        </div>
    </div>
@endif

{{-- edit message --}}

@if (session()->has('edited'))
    <div class="position-fixed top-0 right-0 p-3" style="z-index: 5; right: 0; top: 0;">
        <div id="deleteToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
            <div class="toast-body">
                Pesan diedit!
            </div>
        </div>
    </div>
@endif
