@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('propuestas.index') }}">Mis propuestas</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" href="{{ route('propuestas.myWatchers') }}">Propuestas asignadas</a>
                    </li>
                  </ul>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                        
                            {{ $table }}
                        
                        </div>
                    </div>

                </div>
              </div>
            </div>
        </div>
    </div>
@endsection

{{-- @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                {{ $table }}

            </div>
        </div>
    </div>
@endsection --}}