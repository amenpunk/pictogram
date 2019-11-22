<div class="card pub_image">
    <div class="card-header">
        @if($img->user->image)
            <div class="container-avatar">
                    <img class="avatar" src="{{ url('/user/avatar/'.$img->user->image) }}"> 
            </div>
        @endif
        <div class="data-user">
            <a href="{{ route('profile', ['id' => $img->user->id] )}}" >
                <strong>{{ $img->user->name. ' '.  $img->user->surname  }}</strong>
                <span class="second">
                    {{' | @' .$img->user->nick }}
                </span>
            </a>
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
        </div>
    </div>

    <div class="card-body">
        <div class="img-container">
            <a >
                <img class="" src="{{ route('image.file', [ 'filename' => $img->image_path]) }}">
            </a>
        </div>
        <div class="likes">
        </div>
        <div class="descripcion">
            <span class="second">{{ '@' .$img->user->nick .': '}}</span>
            <span class="second">{{ \FormatTime::LongTimeFilter( $img->created_at )}}</span>
            <p>{{$img->descripcion }}</p>
        </div>
        <a href="{{ route('image.detail', ['id' => $img->id] )}}" class="btn btn-warning btn-comentario" href="">
            Comentarios {{ count($img->comments) }}
        </a>
    </div>
</div>

