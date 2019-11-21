@extends('layouts.app')
<link href="{{ asset('css/main.css') }}" rel="stylesheet">

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <!--card model--> 
            <div class="card pub_image">
                <div class="card-header">
                    @if($img->user->image)
                    <div class="container-avatar">
                        <img class="avatar" src="{{ url('/user/avatar/'.$img->user->image) }}"> 
                    </div>
                    @endif
                    <div class="data-user">
                        <a href="{{ route('image.detail', ['id' => $img->id] )}}">
                            <strong>{{ $img->user->name. ' '.  $img->user->surname  }}</strong>
                            <span class="second">
                                {{' | @' .$img->user->nick }}
                            </span>
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="img-container">
                        <img class="" src="{{ route('image.file', [ 'filename' => $img->image_path]) }}">
                    </div>
                    <div class="likes">
                    </div>
                    <div class="descripcion">
                        <span class="second">{{ '@' .$img->user->nick .': '}}</span>
                        <p>{{$img->descripcion }}</p>
                    </div>
                    <a class="btn btn-warning btn-comentario" href="">
                        Comentarios {{ count($img->comments) }}
                    </a>
               </div>
            </div>

            <!--card model--> 
        </div>
    </div>
</div>
@endsection

<style>
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
    max-height:100%;
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

