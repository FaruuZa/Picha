<div class="joined">
    <div class="atas">
        <h4>
            Joined Room
        </h4>
    </div>
    <div class="bawah">
        <div class="scrollable">
            @foreach ($joinedRooms as $room)
            <a href="/chat/{{$room->code}}" class="room">
                <div class="profil-group">
                    <img src="{{asset('img/'.$room->profile)}}" alt="">
                </div>
                <div class="info">
                    <div class="nama">
                        {{$room->name}}
                    </div>
                    {{-- <div class="count">
                        {{count(explode('|', $room->member))}} Member{{count(explode('|', $room->member)) > 1 ? 's' : ''}}
                    </div> --}}
                </div>
                <span class="kode">#{{$room->code}}</span>
            </a>
            @endforeach
        </div>
    </div>
    <div class="paginate-link mt-1" style="display: flex; align-items: center; justify-content: center">
        {{$joinedRooms->links()}}
    </div>
</div>
