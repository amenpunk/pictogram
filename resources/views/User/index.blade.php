
@extends('layouts.app')
<link href="{{ asset('css/main.css') }}" rel="stylesheet">

<script src="{{ asset('js/sub.js') }}" defer></script>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-8">
            <h2>Buscar</h2>
            <form id="buscador" method="GET" action="{{route('user.index')}}">
                <div class="row">
                    <div class="form-group col">
                        <input type="text" id="search" class="form-control" />
                    </div>
                    <div class="form-group col">
                        <input type="submit" class="btn btn-warning" value="Buscar"/>
                    </div>
                </div>
            </form>
            <hr>
            <!--card model--> 
            @foreach($users as $user)
                <div class="justify-content-center">

                    <div class="row">
                        <div class="col-3">
                            @if($user->image)
                                <div id="pp">
                                    <img id="gg" class="avatar" src="{{ url('/user/avatar/'.$user->image) }}"> 
                                </div>
                            @endif
                        </div>

                        <div class="col-4">
                            <h2><a href="{{ route('profile', ['id' => $user->id]) }}">{{ $user->name .''.$user->surname }}</a></h2>
                            <h3 class="gray">{{ '@'.$user->nick}} </h3>
                        </div>
                    </div>
                    <hr>

                </div>

            @endforeach
            <!--card model--> 
            <div class="clearfix"></div>
            {{ $users->links()}}
        </div>
    </div>
</div>
@endsection

<style>

#pp{
    border-radius:900px;
    height: 200px;
    overflow: hidden;
    margin: 15px;
    width: 200px;
    float:left;
}
#pp img{
    height:100%;
    width:100%;
}
.gray{
    color:gray;
}

.me_gusta{
    float:right;
    font-size:13px;
    display:block;
    padding-top:15px;
}
.me_gusta:hover{
   font-size:15;
}

.btn-dislike{
    color:red;
}
.btn-like{
    color:black;
}

.btn-comentario{
    margin: 20px;
    margin-top:0px;
}

form .avatar{
    height: 75%;
    margin: 15px;
    width: 25%;
}

.navbar .container-avatar , .pub_image .container-avatar{
    width: 35px;
    height: 35px;
    border-radius:900px;
    overflow: hidden;
    margin-left: 20px;
}

.navbar .container-avatar img, .pub_image .container-avatar img {
    height: 100px;
}

.pub_image{
    margin-bottom:25px;
}

.pub_image .container-avatar{
    float:left;
    margin-right:20px;
}

.pub_image .data-user{
    font-weight:bold;
    line-height:35px;
}
.second{
    color:gray;
}                            

.img-container{
    max-height:400px;
    overflow:hidden;
    width:100%;
}

.img-container img{
    width:100%;
}

.pub_image .card-body{
    padding:0px;
}                            
.pub_image .descripcion{
    padding:20px;
    padding-bottom:0px;
}

.me_gusta{
    float:right;
    font-size:13px;
    display:block;
    padding-top:15px;
}
.me_gusta:hover{
   font-size:15;
}

.btn-dislike{
    color:red;
}
.btn-like{
    color:black;
}

.btn-comentario{
    margin: 20px;
    margin-top:0px;
}

form .avatar{
    height: 75%;
    margin: 15px;
    width: 25%;
}

.navbar .container-avatar , .pub_image .container-avatar{
    width: 35px;
    height: 35px;
    border-radius:900px;
    overflow: hidden;
    margin-left: 20px;
}

.navbar .container-avatar img, .pub_image .container-avatar img {
    height: 100px;
}

.pub_image{
    margin-bottom:25px;
}

.pub_image .container-avatar{
    float:left;
    margin-right:20px;
}

.pub_image .data-user{
    font-weight:bold;
    line-height:35px;
}
.second{
    color:gray;
}                            

.img-container{
    max-height:400px;
    overflow:hidden;
    width:100%;
}

.img-container img{
    width:100%;
}

.pub_image .card-body{
    padding:0px;
}                            
.pub_image .descripcion{
    padding:20px;
    padding-bottom:0px;
}
</style>

<script src="{{ asset('js/app.js') }}" defer></script>
