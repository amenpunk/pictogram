@extends('layouts.app')
<link href="{{ asset('css/main.css') }}" rel="stylesheet">

<style>

.pub_image_detail .comments{
    padding:30px;
}

.me_gusta{
    padding-left:35px;
    font-size:35px;
    display:block;
    padding-top:15px;
}
.me_gusta:hover{
    font-size:45;
}

.btn-dislike{
    color:red;
}
.btn-like{
    color:black;
}
.action{
    padding:15px;
    padding-left:35px;
}


</style>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <!--card model--> 
            <div class="card pub_image pub_image_detail">
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

                    <?php $user_like = false; ?>
                    @foreach($img->likes as $likes)
                        @if($likes->user->id == Auth::user()->id)
                            <?php $user_like = true; ?>
                        @endif
                    @endforeach
                    @if($user_like)
                        <a ><i data-id="{{ $img->id }}" class="btn-dislike fas fa-heart me_gusta"></i></a>
                    @else
                        <a ><i data-id="{{ $img->id }}" class="btn-like fas fa-heart me_gusta"></i></a>
                    @endif

                    @if(Auth::user() && Auth::user()->id == $img->user->id)
                        <div class="action">
                            <a class="btn btn-sm btn-warning" >Modificar</a>
                            <a class="btn btn-sm btn-danger" href="{{route('image.delete', ['id' => $img->id])}}" >Borrar</a>
                        </div>
                    @endif

                    <div class="clearfix"></div>
                    <div class="comments">
                        <h2 class="comentarios">Comentarios ({{ count($img->comments) }})</h2>
                        <hr>
                            @foreach($img->comments as $cmt)
                                <div class="comment">
                                    <span class="second">{{ '@' .$cmt->user->nick .': '}}</span>
                                    <span class="second">{{ \FormatTime::LongTimeFilter( $cmt->created_at )}}</span>
                                    <p>{{$cmt->content }}</p>
                                    
                                    @if(Auth::check() && ($cmt->user_id == Auth::user()->id || $cmt->image->user_id == Auth::user()->id))
                                        <a class="btn btn-sm btn-danger" href="{{ route('comment.delete', ['id' => $cmt->id]) }}">Eliminar</a>
                                    @endif
                                </div>
                            @endforeach
                        <hr>
                        <form method="POST" action="{{ route("comment.save")}}">
                            @csrf
                            <input type="hidden" name="image_id" value="{{$img->id}}"/>
                            <p>
                                <textarea class="form-control"  name="content" id="content"></textarea>
                                @if($errors->has('content'))
                                    <span class="alert alert-danger" role="alert">
                                        <strong>{{$errors->first('content')}}</strong>
                                    </span>
                                 @endif
                            </p>
                            <input class="btn btn-success" type="submit" value="Guardar">
                        </form>
                    </div>
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


