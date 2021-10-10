@extends('layouts.sidebar')
@section('homeContent')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-11 text-center">
                        <h2 class="card-title"><b>Bitácora de acciones realizadas por usuarios del sistema</b></h2>
                    </div>
                </div>
                <div class="card-body">
                    <form method="GET" action="{{ route('bitacora.index') }}">
                        <div class="form-group d-flex flex-row w-100 align-items-center justify-content-between">
                            <label for="recipient-name" class="col-form-label m-1">Fecha</label>
                            <div class="d-flex flex-row">
                                <div id="date-picker-datepicker" class="md-form md-outline input-with-post-icon datepicker m-2">
                                    <input placeholder="Seleccionar fecha" type="date" id="datepicker" class="form-control" name="inicio">
                                </div>
                                <div id="date-picker-datepicker" class="md-form md-outline input-with-post-icon datepicker m-2">
                                    <input placeholder="Seleccionar fecha" type="date" id="datepicker" class="form-control" name="fin">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info m-1">Buscar</button>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Usuario</th>
                                    <th>Acción</th>
                                    <th>Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bitacoras as $bitacora)
                                <tr>
                                    <td>{{$bitacora->usuario}}</td>
                                    <td>{{$bitacora->accion}}</td>
                                    <td>{{$bitacora->created_at}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$bitacoras->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
