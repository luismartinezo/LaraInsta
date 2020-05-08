<div class="card pub_image">
    <div class="card-header">
        @if($image->user->image)
            <div class="container-avatar">
                <img src="{{ route('user.avatar', ['filename'=>$image->user->image])}}" alt="avatar" class="avatar">
            </div>
        @endif
        <div class="data-user">
            <a href="{{ route('perfil',['id'=>$image->user->id])}}">
            {{$image->user->name.' '.$image->user->surname}}
            <span class="nick">
                 {{'| @'.$image->user->nick}}
            </span>
            </a>
        </div>
    </div>

    <div class="card-body">
        <div class="image-container">
            <img src="{{ route('image.file', ['filename'=>$image->image_path])}}" alt="img" />
            {{-- {{$image->image_path}} --}}
        </div>
        <div class="description">
        <span class="nick">{{'@'.$image->user->nick}}</span>
        <span class="nick date">{{' | ' .\FormatTime::LongTimeFilter($image->created_at) }}</span>
            <p>{{$image->description}}</p>
        </div>
        <div class="likes">
            
            {{--  Comprobar si el usuario le ha dado like a la imagen  --}}
            <?php $user_like = false; ?>
            @foreach($image->like as $like)
                @if ($like->user->id == Auth::user()->id)
                    <?php $user_like = true; ?>
                @endif
            @endforeach

            @if ($user_like)
                <img src="{{asset('img/heart-red.png')}}" data-id="{{$image->id}}" class="btn-like" alt="like">
            @else
                <img src="{{asset('img/heart-gray.png')}}" data-id="{{$image->id}}" class="btn-dislike" alt="dislike">
            @endif
            <span class="number_like">
                {{ count($image->like)}}
            </span>
        </div>
        <div class="comments">
        <a href="{{ route('image.detail',['id'=>$image->id])}}" 
            class="btn btn-sm btn-warning btn-comments">
            Comentarios ({{count($image->comment)}})</a>
            {{-- Comentarios</a> --}}
        </div>
    </div>
</div>