@extends('layouts.sidebar')

@section('homeContent')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-9 text-center">
                        <h2 class="card-title"><b>Administración de Usuarios</b></h2>
                    </div>
                    <div class="col-sm-3 text-right">
                        <button type="button" class="btn btn-info ml-auto" data-toggle="modal" data-target="#UsuarioCreate" data-whatever="@mdo">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div>
                    <input autocomplete="off" id="buscador2" class="form-control col-sm-12 "
                    placeholder="Buscar nombre del usuario" >
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Email</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    usuario 1
                                    </div>
                                </td>
                                <td width="15%">
                                    <div class="card-body">
                                        <div class=" d-flex">
                                            <button type="button" class="btn btn-info btn-circle ml-auto" data-toggle="modal" data-target="#UsuarioShow" data-whatever="@mdo">
                                                <i class="fa fa-search"></i>
                                            </button>
                                            <button type="button" class="btn btn-success btn-circle ml-auto" data-toggle="modal" data-target="#UsuarioEdit" data-whatever="@mdo">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-circle ml-auto" data-toggle="modal" data-target="#deleteModal" data-whatever="@mdo">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!--modal para consultar de usuario-->
<div class="modal fade" id="UsuarioShow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Consultar datos de usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nombres</label>
                        <input readonly="readonly" type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Apellidos</label>
                        <input readonly="readonly" type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Cargo</label>
                        <input readonly="readonly" type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Número de teléfono fijo</label>
                        <input readonly="readonly" type="text" class="form-control" id="recipient-name"></input>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Número de teléfono celular</label>
                        <input readonly="readonly" type="text" class="form-control" id="recipient-name"></input>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Correo electrónico</label>
                        <input readonly="readonly" type="text" class="form-control" id="recipient-name"></input>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!--modal para creacion de usuario-->
<div class="modal fade" id="UsuarioCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nombres</label>
                        <input type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Apellidos</label>
                        <input type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Cargo</label>
                        <select name="cars" id="cargo" >
                            <optgroup label="Seleccionar cargo">
                            <option value="volvo">Estudiante</option>
                            <option value="saab">Docente</option>
                            </optgroup>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Número de teléfono fijo</label>
                        <input type="text" class="form-control" id="recipient-name"></input>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Número de teléfono celular</label>
                        <input type="text" class="form-control" id="recipient-name"></input>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Correo electrónico</label>
                        <input type="file" class="form-control-file" id="File1">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Contraseña</label>
                        <input type="text" class="form-control" id="recipient-name"></input>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Contraseña de nuevo</label>
                        <input type="text" class="form-control" id="recipient-name"></input>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info">Guardar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>


<!--modal para edicion de usuario-->
<div class="modal fade" id="UsuarioEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar datos de usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nombres</label>
                        <input type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Apellidos</label>
                        <input type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Cargo</label>
                        <select name="cars" id="cargo" >
                            <optgroup label="Seleccionar cargo">
                            <option value="volvo">Estudiante</option>
                            <option value="saab">Docente</option>
                            </optgroup>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Número de teléfono fijo</label>
                        <input type="text" class="form-control" id="recipient-name"></input>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Número de teléfono celular</label>
                        <input type="text" class="form-control" id="recipient-name"></input>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Correo electrónico</label>
                        <input readonly="readonly" type="text" class="form-control" id="recipient-name"></input>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info">Editar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal para delete-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="container d-flex pl-0"><img src="https://imgur.com/Kh1gwTq.png">
                    <h5 class="modal-title ml-2" id="exampleModalLabel">Confirmación de eliminación</h5>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            <div class="modal-body">
                <p class="text-muted">Está seguro que lo desea eliminar?  Este cambio es irreversible</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger">Eliminar</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>


@endsection
