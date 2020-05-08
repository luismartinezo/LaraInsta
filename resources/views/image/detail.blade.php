@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @include('includes.message')
            <div class="card pub_image pub_image_detail">
                <div class="card-header">
                    @if($image->user->image)
                        <div class="container-avatar">
                            <img src="{{ route('user.avatar', ['filename'=>$image->user->image])}}" alt="avatar" class="avatar">
                        </div>
                    @endif
                    <div class="data-user">
                    
                        {{$image->user->name.' '.$image->user->surname}}
                        <span class="nick">
                            | {{$image->user->nick}}
                        </span>
                    
                    </div>
                </div>

                <div class="card-body">
                    <div class="image-detail">
                        <img src="{{ route('image.file', ['filename'=>$image->image_path])}}" alt="img" >
                        {{-- {{$image->image_path}} --}}
                    </div>
                    <div class="description">
                    <span class="nick">{{'@'.$image->user->nick}}</span>
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
                    <div class="clearfix"></div>
                    <div class="comments">
                    <h2> Comentarios ({{count($image->comment)}})</h2>
                    <hr>
                    <form action="{{ route('comment.save')}}" method="post">
                        @csrf
                    <input type="hidden" name="image_id" value="{{$image->id}}">
                    <p>
                        <textarea name="content" class="form-control @error('content') is-invalid @enderror" required></textarea>
                            @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </p>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                    <hr>
                    @foreach($image->comment as $comments)
                    <div class="comment">
                        <span class="nick">{{'@'.$comments->user->nick}}</span>
                        <span class="nick date">{{' | ' .\FormatTime::LongTimeFilter($comments->created_at) }}</span>
                        <p>{{$comments->content}} <br>
                        @if (Auth::check() && ($comments->user_id == Auth::user()->id || $comments->image->user_id ==Auth::user()->id))
                        <a href="{{ route('comment.delete', ['id' => $comments->id]) }}"
                            class="btn btn-sm btn-danger">
                            Eliminar
                        </a>
                        @endif
                    </p>
                    </div>
                    @endforeach
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 

