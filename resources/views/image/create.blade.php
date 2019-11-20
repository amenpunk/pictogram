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
            <div class="card">
                <div class="card-header">Subir nueva imagen</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('image.save') }}" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label text-md-right">Imagen</label>
                            <div class="col-md-7">
                                <input id="image_path" type="file" name="image_path" class="form-control" required>
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
                                    <textarea id="descripcion" name="descripcion" class="form-control" required></textarea>
                                @if($errors->has('descripcion'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$errors->first('descripcion')}}</strong>
                                    </span>
                                 @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-2">
                                <input class="btn btn-primary" type="submit" value="Guardar"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
