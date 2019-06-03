@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
              <div class="card">
                <div class="card-header">
                  <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                      <a class="nav-link" href="/propuestas/create/obras">Obras</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/propuestas/create/servicios">Servicios</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" href="/propuestas/create/suministros">Suministros</a>
                    </li>
                  </ul>
                </div>
                <div class="card-body">
                  <form method="POST" action="{{ route('propuestas.store') }}">
                  @csrf
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
                        />
                      </div>
                      <div class="form-group col-md-6">
                        <label for="importe">Importe total</label>
                        <input
                          type="text"
                          class="form-control"
                          id="importe"
                          name="totalamount"
                          placeholder="Importe"
                          required
                        />
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
                        />
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="facturacion">Facturación</label>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="facturacion" id="facturacion1" value="1">
                          <label class="form-check-label" for="facturacion1">
                            Singular
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="facturacion" id="facturacion2" value="2">
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
                          name="date"
                        />
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="descripcion">Motivación</label>
                      <textarea class="form-control" name="description" id="motivacion" placeholder="La motivación tras la propuesta"></textarea>
                    </div>
                    <input type="hidden" name="type" value="3">
                      <div class="form-group row mb-0">
                          <div class="col-md-8">
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

<script>
        jQuery(document).ready(function($) {
            // Set the Options for "Bloodhound" suggestion engine
            var engine = new Bloodhound({
                remote: {
                    url: '{{route('autocifs')}}?q=%QUERY%',
                    wildcard: '%QUERY%'
                },
                datumTokenizer: Bloodhound.tokenizers.whitespace('q'),
                queryTokenizer: Bloodhound.tokenizers.whitespace
            });

            $("#cif").typeahead({
                hint: true,
                highlight: true,
                minLength: 2
            }, {
                source: engine.ttAdapter(),

                displayKey: 'cif', 

                // This will be appended to "tt-dataset-" to form the class name of the suggestion menu.
                name: 'usersList',

                // the key from the array we want to display (name,id,email,etc...)
                templates: {
                    empty: [
                        '<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
                    ],
                    header: [
                        '<div class="list-group search-results-dropdown">'
                    ],
                    suggestion: function (data) {
                        return '<a class="list-group-item">' + data.cif + ' - ' + data.name + '</a>'
              }
                }
            });
        });
    </script>
@endsection
