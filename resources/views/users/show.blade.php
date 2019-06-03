@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">{{ $user->name }}</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <h4 class="header-underline">Nombre</h4>
                                <p>{{ $user->name }}</p>
                            </div>
                            <div class="col-sm-6">
                                <h4 class="header-underline">Email</h4>
                                <p>{{ $user->email }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <h4 class="header-underline">Roles</h4>
                                <p>{{ $user->hasAnyRole(['ayudante','visualizador','super-admin']) == null ? "N/A" : $user->getRoleNames()[0] }}</p>
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
                            <a href="/users/{{ $user->id }}/edit" class="btn btn-warning"><i class="fas fa-edit"></i> Editar usuario</a>
                            @can('users-admin')
                                <a href="#" class="btn btn-primary mt-2" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-edit"></i> Editar permisos</a>
                                <form action="/users/{{ $user->id }}" method="post">
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
        @can('users-admin')
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Roles</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="watchersform" method="POST" action="/{{$user->id}}/assignrole">
                            @csrf
                        <select name="role" id="role">

                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <input type="submit" class="btn btn-primary" value="Aceptar">
                    </div>
                </form>
                    </div>
                </div>
            </div>
        @endcan
    </div>
@endsection
