@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">{{ $tercero->name }} - {{ $tercero->cif }}</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <h4 class="header-underline">CIF</h4>
                                <p>{{ $tercero->cif }}</p>
                            </div>
                            <div class="col-sm-6">
                                <h4 class="header-underline">Nombre</h4>
                                <p>{{ $tercero->name }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <h4 class="header-underline">Presupuesto total</h4>
                                <p>TBD</p>
                            </div>
                            <div class="col-sm-6">
                                <h4 class="header-underline">Ultima fecha contratación</h4>
                                <p>TBD</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header text-center">Acciones</div>
                    <div class="card-body">
                        <div class="d-flex flex-column justify-content-around">
                            @can('terceros-edit')
                                <a href="/terceros/{{ $tercero->id }}/edit" class="btn btn-warning"><i class="fas fa-edit"></i> Editar tercero</a>
                            @endcan
                            @can('terceros-admin')
                                <form action="/users/{{ $tercero->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger mt-2" style="width:100%;"><i class="fas fa-trash"></i> Borrar usuario</button>
                                </form>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">

        </div>
    </div>
@endsection
