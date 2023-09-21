<ul class="ks-items" wire:poll.1000ms>
    @if ($messages->count() == 0)
    <h3 class="disabled" style="text-align:center; width:100%; color:rgba(75, 75, 75, 0.877);">Tidak ada pesan</h3>
    @endif
    @foreach ($messages as $message)
    <li class="ks-item {{ Auth::user()->name == $message->User->name ? 'ks-from' : 'ks-self' }}">
        <a class="ks-avatar ks-online " data-toggle="modal" data-target="#theirModal" data-whatever="{{ $message->User->name }}|{{ $message->User->image }}|{{ $message->User->created_at }}" data-id="{{ $message->User->id }}">
            <img src="{{ asset('/img/' . $message->User->image) }}" width="36" height="36" class="rounded-circle">
        </a>
        <div class="ks-body">
            <div class="ks-header">
                <div class="ks-name">
                    <a style="color:rgb(97, 97, 248)" data-toggle="modal" data-target="#theirModal" data-whatever="{{ $message->User->name }}|{{ $message->User->image }}|{{ $message->User->created_at }}" data-id="{{ $message->User->id }}">{{ $message->User->name }}</a>
                    @if ($message->User->role != 'user')
                    <i class="fas fa-{{ $message->User->role == 'moderator' ? 'shield-alt' : 'crown'}} ml-1" data-toggle="tooltip" title="{{$message->User->role}}"></i>
                    @endif
                </div>

                <div class="dropdown no-arrow">
                    <div class="ks-datetime more" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-h"></i>
                    </div>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" onclick="copyMessage(this)">Salin</a>
                        @if ($message->User->name == Auth::user()->name || Auth::user()->id == $Room->owner)
                        @if ($message->User->name == Auth::user()->name)
                        <a class="dropdown-item" data-toggle="modal" data-target="#editModal" data-whatever="{{ $message->id }}">Edit</a>
                        @else
                        <a class="dropdown-item text-danger" data-toggle="modal" data-target="#deleteModal" data-whatever="{{ $message->id }}">keluarkan user</a>
                        @endif
                        <a class="dropdown-item text-danger" data-toggle="modal" data-target="#deleteModal" data-whatever="{{ $message->id }}">Hapus</a>
                        @elseif(Auth::user()->role == 'user')
                        <a class="dropdown-item text-danger" data-toggle="modal" data-target="#reportModal" data-whatever="pesan" data-id="{{ $message->id }}">Laporkan</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="ks-message">{{ $message->message }}</div>
            <div class="tes">
                <span class="ks-tes-datetime">{{ \Carbon\Carbon::parse($message->created_at)->format('H:i') . ' WIB' }}</span>
            </div>
        </div>
    </li>
    @endforeach

</ul>
