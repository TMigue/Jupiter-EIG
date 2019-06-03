@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Tercero</div>
                <div class="card-body">
                    <form method="POST" action="/terceros/{{ $tercero->id }}">
                        @csrf
                        @method('PATCH')

                        <div class="form-group row">
                            <label for="Cif" class="col-md-4 col-form-label text-md-right">Cif</label>

                            <div class="col-md-6">
                                <input id="Cif" type="text" class="form-control{{ $errors->has('Cif') ? ' is-invalid' : '' }}" name="cif" value="{{ $tercero->cif }}" required autofocus>

                                @if ($errors->has('Cif'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Cif') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Name" class="col-md-4 col-form-label text-md-right">Nombre</label>

                            <div class="col-md-6">
                                <input id="Name" type="text" class="form-control{{ $errors->has('Name') ? ' is-invalid' : '' }}" name="name" value="{{ $tercero->name }}" required>

                                @if ($errors->has('Name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Actualizar
                                </button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
            <div class="card">
                <div class="card-header">Borrar Tercero</div>
                <div class="card-body">
                    <form action="/terceros/{{ $tercero->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-danger">
                                    Borrar Tercero
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection