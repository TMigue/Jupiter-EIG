@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Nuevo Tercero</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('terceros.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="Cif" class="col-md-4 col-form-label text-md-right">Cif</label>

                            <div class="col-md-6">
                                <input id="Cif" type="text" class="form-control{{ $errors->has('Cif') ? ' is-invalid' : '' }}" name="cif" value="{{ old('Cif') }}" required autofocus>

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
                                <input id="Name" type="text" class="form-control{{ $errors->has('Name') ? ' is-invalid' : '' }}" name="name" value="{{ old('Name') }}" required>

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