{{-- <div> --}}
    <form class="ks-footer" wire:submit.prevent="send">
        @csrf
        {{-- <input type="text" wire:model='roomId' readonly> --}}
        <input type="text" class="form-control" placeholder="Ketikkan pesan" name="message" autofocus autocomplete="off" maxlength="141" id="kirimInput" wire:model='message'>
        <div class="ks-controls" style="width: fit-content;">
            <button type="submit" class="btn btn-primary" id="kirimButton" disabled><i class="fas fa-paper-plane" style="color: #ffffff;"></i></button>
        </div>
    </form>
{{-- </div> --}}
