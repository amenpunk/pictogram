
@if (Auth::user()->image)
    <div class="container-avatar">
        <img class="avatar" src="{{ url('/user/avatar/'.Auth::user()->image) }}"> 
    <div>
@endif
