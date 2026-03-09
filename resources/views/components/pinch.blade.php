
<div class="pinch-card">
    <div class="pinch-body">
        <div class="pinch-row">
            @if ($pinch->user)
                <div class="avatar">
                        <img src="https://avatars.laravel.cloud/{{urlencode($pinch->user->email)}}" 
                        alt="{{$pinch->user->name}}'s avatar" class="round-avatar"/>    
                </div>
            @else
                <div class="avatar-placeholder">
                    <div>
                        <img src="https://avatars.laravel.cloud/f61123d5-0b27-434c-a4ae-c653c7fc9ed6?vibe=stealth" 
                            alt="Anonymous User" class="round-avatar"/>
                    </div>
                </div>
            @endif
                <div class="pinch-content">
                    <div class="flex">
                        <div class="pinch-meta">
                            <div class="pinch-author"> {{ $pinch->user ? $pinch->user->name : 'Anonymous' }}</div>
                            <span class="dot">•</span>
                            <span class="pinchdate">{{ optional($pinch->created_at)->diffForHumans()}}</span>
                            @if ($pinch->updated_at && $pinch->updated_at->gt($pinch->created_at->addSeconds(5)))
                                <span class="dot">•</span>
                                <span class="text-updated">edited</span>
                            @endif
                        </div>

                        @can('update', $pinch)
                             
                            <div class="edit-container-pinch">
                                <a href="/pinches/{{$pinch->id}}/edit" class="edit-button">
                                    Edit
                                </a>
                                <form action="/pinches/{{$pinch->id}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure you want to delete this pinch?')"
                                        class="delete-button">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        @endcan
                    </div>
                    <p class="pinch-message">{{ $pinch->message }}</p>
                </div>
            </div>
        </div>
    </div>
</div>