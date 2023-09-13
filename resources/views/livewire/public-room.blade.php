<div>
    <div class="text-center mb-5">
        <h3 class="h3 mb-3 font-weight-bold">Temukan Room</h3>
    </div>
    <input type="text" class="form-control" wire:model.live='search' name="search">
    <div class="tes" wire:model='search'></div>
    <div class="boxRoom">
        @if ($publicRooms->count() > 0)
        @foreach ($publicRooms as $room)
        <a href="/join?code={{$room->code}}" class="room">
            <div class="profil-group">
                <img src="{{asset('img/'.$room->profile)}}" alt="">
            </div>
            <div class="nama">
                {{$room->name}} <span class="kode">#{{$room->code}}</span>
            </div>
        </a>
        @endforeach
        @else
        <div class="text-center mt-5">
            <h5 class="h5 font-weight-bold">Room tidak ditemukan</h5>
        </div>
        @endif
    </div>
</div>
