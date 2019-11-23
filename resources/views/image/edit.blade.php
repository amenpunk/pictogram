
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if (session('message'))
            <div class="alert alert-success">
              {{ session('message')}}
            </div>
        @endif
                <div class="card-header">Editar imagen</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('image.update') }}" enctype="multipart/form-data" >
                        @csrf

                        <input type="hidden" name="image_id" value="{{$img->id}}"/>

                        @if($img->user->image)
                            <div class="col">
                                <img  class="avatar" src="{{ route('image.file', [ 'filename' => $img->image_path]) }}">
                            </div>
                        @endif

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label text-md-right">Imagen</label>
                            <div class="col-md-7">
                                <input id="image_path" type="file" name="image_path" class="form-control" >
                                @if($errors->has('image_path'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$errors->first('image_path')}}</strong>
                                    </span>
                                 @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label text-md-right">Descripcion</label>
                            <div class="col-md-7">
                                    <textarea id="descripcion" name="descripcion" class="form-control" required>
                                        {{ $img->descripcion}}
                                    </textarea>
                                @if($errors->has('descripcion'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$errors->first('descripcion')}}</strong>
                                    </span>
                                 @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-2">
                                <input class="btn btn-primary" type="submit" value="Editar"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
