@if(Auth::user()->image)
    {{-- <img src="{{url('user/avatar/'.Auth::user()->image)}}" alt="avatar"> --}}
    <img src="{{route('user.avatar', ['filename'=>Auth::user()->image])}}" alt="avatar" class="avatar">
@endif