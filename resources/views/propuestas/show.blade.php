@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">{{ $propuesta->id }} - {{ $propuesta->cif }}</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <h4 class="header-underline">CIF</h4>
                                <p>{{ $propuesta->cif }}</p>
                            </div>
                            <div class="col-sm-6">
                                <h4 class="header-underline">Descripción corta</h4>
                                <p>{{ $propuesta->shortdescription }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <h4 class="header-underline">Presupuesto total</h4>
                                <p>{{ $propuesta->totalamount }}€</p>
                            </div>
                            <div class="col-sm-6">
                                <h4 class="header-underline">Cantidad gastada</h4>
                                <p>{{ $propuesta->spentamount }}€</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <h4 class="header-underline">Objeto</h4>
                                <p>{{ $propuesta->objeto ? $propuesta->objeto : "N/A"}}</p>
                            </div>
                            <div class="col-sm-6">
                                <h4 class="header-underline">Motivación</h4>
                                <p>{{ $propuesta->description ? $propuesta->description : "N/A" }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <h4 class="header-underline">Facturacion</h4>
                                <p>

                                    @if ( $propuesta->facturacion == 1)
                                        {{ "Singular" }}
                                    @elseif ($propuesta->facturacion == 2)
                                        {{ "Multiple" }}
                                    @else
                                        {{ "N/A" }}
                                    @endif

                                </p>
                            </div>
                            <div class="col-sm-6">
                                <h4 class="header-underline">Duración</h4>
                                <p>{{ $propuesta->finishdate ? "Hasta {$propuesta->finishdate}" : "N/A" }}</p>
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
                            <a href="/propuestas/{{ $propuesta->id }}/pdf" class="btn btn-primary"><i class="fas fa-file-pdf"></i> Descargar Documento</a>
                            @can('update', $propuesta)
                                <button type="button" class="btn btn-info mt-2" data-toggle="modal" data-target="#amountModal">
                                    Añadir importe
                                </button>
                                <a href="/propuestas/{{ $propuesta->id }}/edit" class="btn btn-warning mt-2"><i class="fas fa-edit"></i> Editar Propuesta</a>
                            @endcan
                            @can('delete', $propuesta)
                                <form action="/users/{{ $propuesta->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger mt-2" style="width:100%;"><i class="fas fa-trash"></i> Borrar Propuesta</button>
                                </form>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-header text-center">Usuarios asignados</div>
                    <div class="card-body">
                        <div class="d-flex flex-column justify-content-around">
                            <ul class="list-group">
                                @foreach ($users as $user)

                                    @if ($user->pivot != null)
                                        <li class="list-group-item">{{ $user->name }}</li>
                                    @endif

                                @endforeach
                            </ul>
                            @can('watchers', $propuesta)
                                <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#exampleModal">
                                    Editar
                                </button>
                            @endcan
                            {{-- <a href="/terceros/{{ $propuesta->id }}/edit" class="btn btn-warning"><i class="fas fa-edit"></i> Asignar usuarios</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">

        </div>
    </div>
    @can('watchers', $propuesta)
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Usuarios asignados</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="watchersform" method="POST" action="{{ route('editwatchers', array('propuesta' => $propuesta->id)) }}">
                            @csrf
                        <select multiple="multiple" size="10" name="watchers[]" id="watchers">
                            @foreach ($users as $user)
                                @if ($user->pivot != null)

                                    <option value="{{ $user->id }}" selected="selected">{{ $user->name }}</option>

                                @else

                                    <option value="{{ $user->id }}">{{ $user->name }}</option>

                                @endif

                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <input type="submit" class="btn btn-primary" value="Aceptar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endcan
    @can('update', $propuesta)
        <div class="modal fade" id="amountModal" tabindex="-1" role="dialog" aria-labelledby="amountModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="amountModalLabel">Añadir importe</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('addamount', array('propuesta' => $propuesta->id)) }}">
                            @csrf
                        <label for="amount">Introduce un importe</label>
                        <input type="number" name="amount" id="amount" placeholder="{{ $propuesta->totalamount - $propuesta->spentamount}}€">
                    </div>
                    <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <input type="submit" class="btn btn-primary" value="Aceptar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endcan
    <script>
        var algo = $('#watchers').bootstrapDualListbox();

    </script>


@endsection
