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
                        <img src="{{asset('img/heart-gray.png')}}" alt="">
                        </div>
                    <div class="clearfix"></div>
                    <div class="comments">
                    <h2> Comentarios ({{count($image->comment)}})</h2>
                    <hr>
                    <form action="{{ route('comment.save')}}" method="post">
                    <input type="hidden" name="image_id" value="{{$image->id}}">
                    <p>
                        <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" required></textarea>
                            @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </p>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
