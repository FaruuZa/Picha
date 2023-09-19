<div>
    <div class="text-center mb-4">
        <h3 class="h3 mb-2 font-weight-bold">Temukan Room</h3>
    </div>
    <input type="text" class="form-control mb-1" wire:model.live='search' name="search" placeholder="Masukkan nama Room">
    <div class="boxRoom">
        @if ($publicRooms->count() > 0)
        @foreach ($publicRooms as $room)
        <a href="/join/{{$room->code}}" class="room">
            <div class="profil-group">
                <img src="{{asset('img/'.$room->profile)}}" alt="">
            </div>
            <div class="info">
                <div class="nama">
                    {{$room->name}} <span class="kode">#{{$room->code}}</span>
                </div>
                <div class="count">
                    {{count(explode('|', $room->member))}} Member{{count(explode('|', $room->member)) > 1 ? 's' : ''}}
                </div>
            </div>
        </a>
        @endforeach
        @else
        <div class="text-center mt-5">
            <h5 class="h5 font-weight-bold">Room tidak ditemukan</h5>
        </div>
        @endif
    </div>
    <div class="paginate-link mt-2" style="display: flex; align-items: center; justify-content: center">
        {{$publicRooms->links()}}
    </div>
</div>
