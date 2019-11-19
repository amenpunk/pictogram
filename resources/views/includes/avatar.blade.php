
@if (Auth::user()->image)
    <div class="container-avatar">
        <img class="avatar" widht=240 height=250 src="{{ url('/user/avatar/'.Auth::user()->image) }}"> 
    <div>
@endif
