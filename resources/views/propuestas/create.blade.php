@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header text-center">
                  Nueva propuesta de gasto
                </div>
                <div class="card-body">
                  <div class="d-flex flex-column justify-content-around">
                    <a href="/propuestas/create/obras" class="btn btn-primary"><i class="fas fa-edit"></i> Obras</a>
                    <a href="/propuestas/create/servicios" class="btn btn-primary mt-2"><i class="fas fa-trash"></i> Servicios</a>
                    <a href="/propuestas/create/suministros" class="btn btn-primary mt-2"><i class="fas fa-trash"></i> Suministros</a>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection
