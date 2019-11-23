
@extends('layouts.app')
<link href="{{ asset('css/main.css') }}" rel="stylesheet">

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
</style>

@section('content')
<div class="container">
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
                    <h1>{{ $user->name .''.$user->surname }} </h1>
                    <h2 class="gray">{{ '@'.$user->nick}} </h2>
                </div>
            </div>
            <hr>

    </div>

            <!--card model--> 
            @foreach($user->images as $img)
                @include('includes.image',['img'=> $img]);
            @endforeach
            <!--card model--> 
</div>
@endsection

<style>

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


