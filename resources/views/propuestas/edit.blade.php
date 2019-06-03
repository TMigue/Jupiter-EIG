@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Propuesta</div>
                <div class="card-body">
                    <form method="POST" action="/propuestas/{{ $propuesta->id }}">
                        @csrf
                        @method('PATCH')

                        <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="cif">Cif</label><br>
                        <input
                          type="text"
                          class="form-control"
                          id="cif"
                          name="cif"
                          placeholder="Cif"
                          required
                          value="{{ $propuesta->cif }}"
                        readonly/>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="importe">Importe total</label>
                        <input
                          type="text"
                          class="form-control"
                          id="importe"
                          name="totalamount"
                          placeholder="Importe"
                          value="{{ $propuesta->totalamount }}"
                          required
                        readonly/>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="descripcion">Descripcion</label>
                        <input
                          type="text"
                          class="form-control"
                          id="descripcion"
                          name="shortdescription"
                          placeholder="Una descripcion corta"
                          value="{{ $propuesta->shortdescription }}"
                          required
                        />
                      </div>
                      <div class="form-group col-md-6">
                        <label for="objeto">Objeto</label>
                        <input
                          type="text"
                          class="form-control"
                          id="objeto"
                          name="objeto"
                          value="{{ $propuesta->objeto }}"
                        />
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="facturacion">Facturación</label>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="facturacion" id="facturacion1" value="1" @if ($propuesta->facturacion == 1)
                              checked
                          @endif>
                          <label class="form-check-label" for="facturacion1">
                            Singular
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="facturacion" id="facturacion2" value="2"@if ($propuesta->facturacion == 2)
                              checked
                          @endif>
                          <label class="form-check-label" for="facturacion2">
                            Multiple
                          </label>
                        </div>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="objeto">Fecha de finalización</label>
                        <input
                          type="date"
                          class="form-control"
                          id="date"
                          name="finishdate"
                          value="{{ $propuesta->finishdate }}"
                        />
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="descripcion">Motivación</label>
                      <textarea class="form-control" name="description" id="motivacion" placeholder="La motivación tras la propuesta">{{ $propuesta->description }}</textarea>
                    </div>
                      <div class="form-group row mb-0">
                          <div class="col-md-8">
                              <button type="submit" class="btn btn-primary">
                                  Editar
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