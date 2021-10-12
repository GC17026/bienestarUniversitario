@extends('layouts.sidebar')

@section('homeContent')

    <div class="row">
        <div class="alert" id="alert-message" role="alert" style="display:none;">
            This is a success alert—check it out!
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-9 text-center">
                            <h2 class="card-title"><b>Administración de Usuarios</b></h2>
                        </div>
                        <div class="col-sm-3 text-right">
                            <button type="button" class="btn btn-info ml-auto" data-toggle="modal"
                                data-target="#UsuarioCreate" data-whatever="@mdo">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div>
                        <input autocomplete="off" id="buscador2" class="form-control col-sm-12 "
                            placeholder="Buscar nombre del usuario">
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
                                @foreach ($Users as $user)
                                    <tr>
                                        <td>
                                            {{$user->name}}
                                        </td>
                                        <td width="15%">
                                            <div class="card-body">
                                                <div class=" d-flex">
                                                    <button type="button" class="btn btn-info btn-circle ml-auto"
                                                        data-toggle="modal" data-target="#UsuarioShow"  data-userid="{{$user->id}}" data-whatever="@mdo">
                                                        <i class="fa fa-search"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-success btn-circle ml-auto"
                                                        data-toggle="modal" data-target="#UsuarioEdit" data-userid="{{$user->id}}" data-whatever="@mdo">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-danger btn-circle ml-auto"
                                                        data-toggle="modal" data-target="#deleteModal" data-userid="{{$user->id}}" data-whatever="@mdo">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--modal para consultar de usuario-->
    <div class="modal fade" id="UsuarioShow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                            <input type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Apellidos</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Cargo</label>
                            <input type="text" class="form-control" id="recipient-name">
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
                            <input type="text" class="form-control" id="recipient-name"></input>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!--modal para creacion de usuario-->
    <div class="modal fade" id="UsuarioCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="alert" id="modal-alert" role="alert" style="display:none;">
                    This is a success alert—check it out!
                </div>
                <div class="modal-body">
                    <form name="userCreateForm" id="userCreateForm">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}*</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastname"
                                class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}*</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text"
                                    class="form-control @error('lastname') is-invalid @enderror" name="lastname"
                                    value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cargo_id" class="col-md-4 col-form-label text-md-right">{{ __('Cargo') }}*</label>

                            <div class="col-md-6">
                                <select id="cargo_id" class="form-control" name="cargo_id" required>
                                    <option selected value="" disabled>--Seleccione un cargo--</option>
                                    @foreach ($cargos as $row)
                                        <option {{ old('cargo_id') == $row->id ? 'selected' : '' }}
                                            value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                                @error('cargo_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone"
                                class="col-md-4 col-form-label text-md-right">{{ __('Teléfono') }}*</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                                    name="phone" value="{{ old('phone') }}" autocomplete="phone" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cellphone"
                                class="col-md-4 col-form-label text-md-right">{{ __('Teléfono celular') }}*</label>

                            <div class="col-md-6">
                                <input id="cellphone" type="text"
                                    class="form-control @error('cellphone') is-invalid @enderror" name="cellphone"
                                    value="{{ old('cellphone') }}" autocomplete="cellphone" autofocus>

                                @error('cellphone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn-create-user btn btn-info">Guardar</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!--modal para edicion de usuario-->
    <div class="modal fade" id="UsuarioEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                            <select name="cars" id="cargo">
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
                            <input type="text" class="form-control" id="recipient-name"></input>
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
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                    <p class="text-muted">Está seguro que lo desea eliminar? Este cambio es irreversible</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger">Eliminar</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>


@endsection

<script type="text/javascript" src="{{ asset('js/xhr.js') }}"></script>
<script type="text/javascript">
    function createUserBtn(e) {
        const createUserBtn = this;
        const createUserModal = document.getElementById('userCreateForm');
        const name = createUserModal.querySelector('#name');
        const lastname = createUserModal.querySelector('#lastname');
        const cargo_id = createUserModal.querySelector('#cargo_id');
        const phone = createUserModal.querySelector('#phone');
        const cellphone = createUserModal.querySelector('#cellphone');
        const password = createUserModal.querySelector('#password');
        const password_confirm = createUserModal.querySelector('#password-confirm');
    }

    function createUserSubmit(e) {
        e.preventDefault();
        form = this;
        const xhr = new HttpRequest();
        const endpoint = '/users';
        const formData = new FormData(form);
        xhr.post(endpoint, formData, function(error, response) {
            if (error) {
                console.log('ocurrió un error', xhr.http.status);
                if (xhr.http.status == 403) {
                    text = "Usted no tiene permisos para realizar esta accion";
                } else {
                    const resp = JSON.parse(error);
                    text = resp.error;
                }
                const modal = document.getElementById('UsuarioCreate');
                const alert = modal.querySelector('#modal-alert');
                alert.innerHTML = text;
                alert.style.display = "block";
                alert.classList.add('alert-danger');
            }
            if (response) {
                const resp = JSON.parse(response);
                const alert = document.getElementById('alert-message');
                alert.innerHTML = resp.success;
                alert.style.display = "block";
                alert.classList.add('alert-success');
                const modal = document.getElementById('UsuarioCreate');
                Array.from(document.getElementsByClassName('modal-backdrop')).forEach((panel) => {
                    panel.remove();
                });
                modal.style.display = "none";
                setTimeout(function() {
                    window.location.reload(1);
                }, 1200);
            }
        });
    }


    document.addEventListener('DOMContentLoaded', function() {
        btnMap = new Map();
        btnMap.set('btn-create-user', createUserBtn);
        Array.from(btnMap.keys()).forEach((btnClass) => {
            Array.from(document.getElementsByClassName(btnClass)).forEach(function(btn) {
                btn.addEventListener('click', btnMap.get(btnClass));
            });
        });


        formsMap = new Map();
        formsMap.set('userCreateForm', createUserSubmit);
        Array.from(formsMap.keys()).forEach((form) => {
            document.getElementById(form).addEventListener('submit', formsMap.get(form));
        })
    });
</script>
