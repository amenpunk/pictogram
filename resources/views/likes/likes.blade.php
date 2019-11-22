
@extends('layouts.app')
<link href="{{ asset('css/main.css') }}" rel="stylesheet">

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
</style>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1> Mis images favoritas</h1>
            <hr>
            @foreach($likes as $img)
                @include('includes.image',['img'=> $img->image]);
            @endforeach

            <div class="clearfix"></div>
            {{ $likes->links()}}
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


