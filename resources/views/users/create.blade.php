@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Nuevo Usuario</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('users.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="Cif" class="col-md-4 col-form-label text-md-right">Nombre</label>

                            <div class="col-md-6">
                                <input id="Nombre" type="text" class="form-control{{ $errors->has('Nombre') ? ' is-invalid' : '' }}" name="name" value="{{ old('Nombre') }}" required autofocus>

                                @if ($errors->has('Nombre'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Name" class="col-md-4 col-form-label text-md-right">E-mail</label>

                            <div class="col-md-6">
                                <input id="Email" type="email" class="form-control{{ $errors->has('Email') ? ' is-invalid' : '' }}" name="email" value="{{ old('Email') }}" required>

                                @if ($errors->has('Email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Name" class="col-md-4 col-form-label text-md-right">Contraseña</label>

                            <div class="col-md-6">
                                <input id="Password" type="password" class="form-control{{ $errors->has('Password') ? ' is-invalid' : '' }}" name="password" value="{{ old('Password') }}" required>

                                @if ($errors->has('Password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Crear
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
