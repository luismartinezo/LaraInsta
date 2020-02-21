@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('includes.message')
            @foreach ($images as $image)
            <div class="card pub_image">
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
                    <div class="image-container">
                        {{-- <img src="{{ route('image.file', ['filename'=>$image->image_path])}}" alt="img" > --}}
                        {{$image->image_path}}
                    </div>
                    <div class="description">
                    <span class="nick">{{'@'.$image->user->nick}}</span>
                        <p>{{$image->description}}</p>
                    </div>
                    <div class="likes">
                        <img src="{{asset('img/heart-gray.png')}}" alt="">
                        </div>
                    <div class="comments">
                    <a href="" class="btn btn-sm btn-warning btn-comments">Comentario</a>
                    </div>
                </div>
                
            </div>
            @endforeach
            {{-- Paginacion --}}
            <div class="clearfix">
                {{$images->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
