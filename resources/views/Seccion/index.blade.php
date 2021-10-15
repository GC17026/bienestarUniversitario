@extends('layouts.sidebar')
@section('homeContent')
<div id="page-content-wrapper" class="w-100">
    @if (session('mensaje'))
    <div class="alert alert-success" style="margin-left: width:100%;">
        {{ session('mensaje') }}
    </div>
    @endif

    <div class="alert" id="alert-message" role="alert" style="display:none;">
        This is a success alert—check it out!
    </div>

    <div class="d-flex mt-3">
        <h3 class="card-link" data-toggle="collapse">
            Secciones
        </h3>
        @can('crear seccion')
        <button type="button" class="btn btn-info btn-circle ml-auto" data-toggle="modal" data-target="#seccioncreate">
            <i class="fa fa-plus"></i>
        </button>
        @endcan
    </div>
    <div id="accordion" class="mt-3">
        @foreach($secciones as $seccion)
        <div class="card">
            <div class="card-header estilo_div1">
                <div class="d-flex">
                    <a class="card-link " data-toggle="collapse" href="#collapseOne{{$seccion->id}}">
                        {{$seccion->nombre}}
                    </a>
                    @can('editar seccion')
                    <button type="button" class="btn-edit-seccion btn btn-success m-1  btn-circle ml-auto" data-toggle="modal" data-seccionid="{{$seccion->id}}" data-iconseccion="{{$seccion->icono}}" data-nombreseccion="{{$seccion->nombre}}" data-target="#seccionedit">
                        <i class="fa fa-edit"></i>
                    </button>
                    @endcan
                    @can('eliminar seccion')
                    <button type="button" class="btn-delete-seccion btn btn-danger m-1  btn-circle" data-toggle="modal" data-seccionid="{{$seccion->id}}" data-tipoDelete='seccion' data-target="#deleteModal">
                        <i class="fa fa-times"></i>
                    </button>
                    @endcan
                </div>
            </div>
            <div id="collapseOne{{$seccion->id}}" class="collapse " data-parent="#accordion">
                <div id="accordion3">
                    <div class="card">
                        <div class="card-header estilo_div2">
                            <div class=" d-flex">
                                <a class="card-link" data-toggle="collapse" href="#collapseThree{{$seccion->id}}">
                                    Contenidos de seccion
                                </a>
                                @can('crear contenido')
                                <button type="button" class="btn-create-contenido btn btn-info btn-circle ml-auto" data-toggle="modal" data-target="#ContenidoCreate" data-seccionid="{{$seccion->id}}">
                                    <i class="fa fa-plus"></i>
                                </button>
                                @endcan
                            </div>
                        </div>
                        <div id="collapseThree{{$seccion->id}}" class="collapse " data-parent="#collapseOne{{$seccion->id}}">
                            @foreach($seccion->contenidos as $contenido)
                            <div class="card-header">
                                <div class=" d-flex">
                                    <div>
                                        {{$contenido->titulo}}
                                    </div>
                                    @can('editar contenido')
                                    <button type="button" class="btn-edit-contenido btn btn-success m-1  btn-circle ml-auto" data-toggle="modal" data-target="#ContenidoEdit" data-contenidoid="{{$contenido->id}}" data-titulo="{{$contenido->titulo}}" data-contenido="{{$contenido->contenido}}">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    @endcan
                                    @can('eliminar contenido')
                                    <button type="button" class="btn-delete-contenido btn btn-danger m-1  btn-circle" data-toggle="modal" data-contenidoid="{{$contenido->id}}" data-tipoDelete='contenido' data-target="#deleteModal">
                                        <i class="fa fa-times"></i>
                                    </button>
                                    @endcan
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div id="accordion2">
                    <div class="card">
                        <div class="card-header estilo_div2">
                            <div class=" d-flex">
                                <a class="card-link" data-toggle="collapse" href="#collapseTwo{{$seccion->id}}">
                                    Subsecciones
                                </a>
                                @can('crear subseccion')
                                <button type="button" class="btn-create-subseccion btn btn-info btn-circle ml-auto" data-toggle="modal" data-target="#subseccioncreate" data-seccionid="{{$seccion->id}}">
                                    <i class="fa fa-plus"></i>
                                </button>
                                @endcan
                            </div>
                        </div>
                        <div id="collapseTwo{{$seccion->id}}" class="collapse " data-parent="#collapseOne{{$seccion->id}}">
                            <div id="accordion5">
                                <div class="card">
                                    @foreach($seccion->subSecciones as $subseccion)
                                    <div class="card-header">
                                        <div class=" d-flex">
                                            <a class="card-link" data-toggle="collapse" href="#collapseFive">
                                                {{$subseccion->nombre}}
                                            </a>
                                            @can('editar subseccion')
                                            <button type="button" class="btn-edit-subseccion btn btn-success m-1  btn-circle ml-auto" data-subseccionid="{{$subseccion->id}}" data-iconosubseccion="{{$subseccion->icono}}" data-nombresubseccion="{{$subseccion->nombre}}" data-toggle="modal" data-target="#subseccionedit">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            @endcan
                                            @can('eliminar subseccion')
                                            <button type="button" class="btn-delete-subseccion btn btn-danger m-1  btn-circle" data-subseccionid="{{$subseccion->id}}" data-tipoDelete='subseccion' data-toggle="modal" data-target="#deleteModal">
                                                <i class="fa fa-times"></i>
                                            </button>
                                            @endcan
                                        </div>
                                    </div>
                                    <div id="collapseFive" class="collapse " data-parent="#accordion5">
                                        <div id="accordion4">

                                            <div class="card">
                                                <div class="card-header estilo_div3">
                                                    <div class=" d-flex">
                                                        <a class="card-link" data-toggle="collapse" href="#collapseFour">
                                                            Contenidos de subseccion
                                                        </a>
                                                        @can('crear contenido')
                                                        <button type="button" class="btn-create-subcontenido btn btn-info btn-circle ml-auto" data-toggle="modal" data-target="#ContenidoCreate" data-subseccionid="{{$subseccion->id}}">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                        @endcan
                                                    </div>
                                                </div>
                                                <div id="collapseFour" class="collapse " data-parent="#accordion4">
                                                    <div class="card-header">
                                                        @foreach($subseccion->contenidos as $subcontenido)
                                                        <div class=" d-flex">
                                                            <div>
                                                                {{$subcontenido->titulo}}
                                                            </div>
                                                            @can('editar contenido')
                                                            <button type="button" class="btn-edit-subcontenido btn btn-success m-1  btn-circle ml-auto" data-toggle="modal" data-target="#ContenidoEdit" data-subcontenidoid="{{$subcontenido->id}}" data-titulo="{{$subcontenido->titulo}}" data-contenido="{{$subcontenido->contenido}}">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                            @endcan
                                                            @can('eliminar contenido')
                                                            <button type="button" class="btn-delete-subcontenido btn btn-danger m-1  btn-circle" data-toggle="modal" data-target="#deleteModal" data-subcontenidoid="{{$subcontenido->id}}" data-tipoDelete='subcontenido'>
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                            @endcan
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <div class="row justify-content-center">
            <div class="">

                <!--modal para creacion de seccion-->
                <div class="modal fade" id="seccioncreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Agregar sección: </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="alert" id="modal-alert" role="alert" style="display:none;">
                                This is a success alert—check it out!
                            </div>
                            <form name="seccionCreateForm" id="seccionCreateForm">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Nombre</label>
                                        <input type="text" class="form-control" id="recipient-name" name="nombre">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Icono</label>
                                        <input type="text" class="form-control" id="recipient-name" name="icono">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-info">Guardar</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!--modal para edicion de seccion-->
                <div class="modal fade" id="seccionedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Editar sección: </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="alert" id="modal-alert" role="alert" style="display:none;">
                                This is a success alert—check it out!
                            </div>
                            <form name="seccionEditForm" id="seccionEditForm" method="POST">
                                @csrf

                                <div class="modal-body">
                                    <input type="hidden" name="id" id="seccionid-edit" value="">
                                    <div class="form-group">
                                        <label for="nombre-seccion-edit" class="col-form-label">Nombre</label>
                                        <input type="text" class="form-control" id="nombre-seccion-edit" name="nombre">
                                    </div>
                                    <div class="form-group">
                                        <label for="icon-seccion-edit" class="col-form-label">Icono</label>
                                        <input type="text" class="form-control" id="icon-seccion-edit" name="icono">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-info">Editar</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!--modal para creacion de subseccion-->
                <div class="modal fade" id="subseccioncreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Agregar subsección: </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="alert" id="modal-alert" role="alert" style="display:none;">
                                This is a success alert—check it out!
                            </div>
                            <form name="subseccionCreateForm" id="subseccionCreateForm">
                                @csrf
                                <input type="hidden" name="seccionPadre" id="seccionPadre" value="">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Nombre</label>
                                        <input type="text" class="form-control" id="recipient-name" name="nombre">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Icono</label>
                                        <input type="text" class="form-control" id="recipient-name" name="icono">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-info">Guardar</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!--modal para edicion de subseccion-->
                <div class="modal fade" id="subseccionedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Editar subsección en: </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="alert" id="modal-alert" role="alert" style="display:none;">
                                This is a success alert—check it out!
                            </div>
                            <form name="subSeccionEditForm" id="subSeccionEditForm">
                                @csrf
                                <input type="hidden" name="id" id="subseccionid-edit" value="">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="subseccion-titulo" class="col-form-label">Nombre</label>
                                        <input type="text" class="form-control" id="subseccion-titulo" name="nombre">
                                    </div>
                                    <div class="form-group">
                                        <label for="subseccion-icono" class="col-form-label">Icono</label>
                                        <input type="text" class="form-control" id="subseccion-icono" name="icono">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-info">Editar</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <!--modal para creacion de contenido-->
                <div class="modal fade" id="ContenidoCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Agregar contenido en: </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="alert" id="modal-alert" role="alert" style="display:none;">
                                This is a success alert—check it out!
                            </div>
                            <form name="cotenidoCreateForm" id="contenidoCreateForm">
                                @csrf
                                <input type="hidden" name="seccionPadre" id="seccionPadre" value="">
                                <input type="hidden" name="contenidoType" id="contenidoType" value="">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Título</label>
                                        <input type="text" class="form-control" id="recipient-name" name="titulo">
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="col-form-label">Contenido</label>
                                        <textarea class="form-control" id="message-text" name="contenido"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="col-form-label">Imagen</label>
                                        <input type="file" class="form-control-file" id="File1" name="foto_contenido">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-info">Guardar</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <!--modal para edicion de contenido-->
                <div class="modal fade" id="ContenidoEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Editar contenido en: </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="alert" id="modal-alert" role="alert" style="display:none;">
                                This is a success alert—check it out!
                            </div>
                            <form name="contenidoEditForm" id="contenidoEditForm">
                                @csrf
                                <input type="hidden" name="id" id="contenidoid-edit" value="">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="tituloContenido" class="col-form-label">Título</label>
                                        <input type="text" class="form-control" id="tituloContenido" name="titulo">
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="col-form-label">Contenido</label>
                                        <textarea class="form-control" id="text-contenido" name="contenido"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="col-form-label">Imagen</label>
                                        <input type="file" class="form-control-file" id="File1" name="foto_contenido">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-info">Editar</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                </div>
                            </form>
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
                            <div class="alert" id="modal-alert" role="alert" style="display:none;">
                                This is a success alert—check it out!
                            </div>
                            <div class="modal-body">
                                <p class="text-muted">Está seguro que lo desea eliminar? Este cambio es irreversible
                                </p>
                            </div>
                            <div class="modal-footer">
                                <form name="deleteForm" id="deleteForm" method="POST">
                                    @csrf
                                    <input type="hidden" name="toDeleteId" id="toDeleteId" value="">
                                    <input type="hidden" name="toDeleteType" id="toDeleteType" value="">
                                    <button type="submit" class="btn btn-danger m-1 ">Eliminar</button>
                                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
    <script type="text/javascript" src="{{asset('js/xhr.js')}}"></script>
    <script type="text/javascript">
        function editSeccionBtn(e) {
            const btnSeccion = this;
            const editModal = document.getElementById('seccionedit');
            const seccionIdInput = editModal.querySelector('#seccionid-edit');
            const nombreInput = editModal.querySelector('#nombre-seccion-edit');
            const iconInput = editModal.querySelector('#icon-seccion-edit');
            seccionIdInput.value = btnSeccion.dataset.seccionid;
            nombreInput.value = btnSeccion.dataset.nombreseccion;
            iconInput.value = btnSeccion.dataset.iconseccion;
        }

        function getDeleteModalElements(deleteBtn) {
            console.log(deleteBtn);
            const deleteModal = document.getElementById('deleteModal');
            const toDeleteId = deleteModal.querySelector('#toDeleteId');
            const toDeleteType = deleteModal.querySelector('#toDeleteType');
            toDeleteType.value = deleteBtn.dataset.tipodelete;
            return {
                deleteModal,
                toDeleteId,
                toDeleteType
            };
        }

        function deleteSeccionBtn(e) {
            const deleteBtn = this;
            const {
                toDeleteId
            } = getDeleteModalElements(deleteBtn);
            toDeleteId.value = deleteBtn.dataset.seccionid;
        }

        function editContenidoBtn(e) {
            const editContenidoBtn = this;
            const editContenidoModal = document.getElementById('ContenidoEdit');
            const tituloContenido = editContenidoModal.querySelector('#tituloContenido');
            const textoContenido = editContenidoModal.querySelector('#text-contenido');
            const idContenido = editContenidoModal.querySelector('#contenidoid-edit');
            idContenido.value = editContenidoBtn.dataset.contenidoid;
            tituloContenido.value = editContenidoBtn.dataset.titulo;
            textoContenido.value = editContenidoBtn.dataset.contenido;
        }

        function deleteContenidoBtn(e) {
            const deleteBtn = this;
            const {
                toDeleteId
            } = getDeleteModalElements(deleteBtn);
            toDeleteId.value = deleteBtn.dataset.contenidoid;
        }

        function editSubSeccionBtn(e) {
            const btnSeccion = this;
            const editModal = document.getElementById('subseccionedit');
            const seccionIdInput = editModal.querySelector('#subseccionid-edit');
            const nombreInput = editModal.querySelector('#subseccion-titulo');
            const iconoInput = editModal.querySelector('#subseccion-icono');
            seccionIdInput.value = btnSeccion.dataset.subseccionid;
            nombreInput.value = btnSeccion.dataset.nombresubseccion;
            iconoInput.value = btnSeccion.dataset.iconosubseccion;

        }

        function deleteSubSeccionBtn(e) {
            const deleteBtn = this;
            const {
                toDeleteId
            } = getDeleteModalElements(deleteBtn);
            toDeleteId.value = deleteBtn.dataset.subseccionid;
        }

        function editSubContenidoBtn(e) {
            const editContenidoBtn = this;
            const editContenidoModal = document.getElementById('ContenidoEdit');
            const tituloContenido = editContenidoModal.querySelector('#tituloContenido');
            const textoContenido = editContenidoModal.querySelector('#text-contenido');
            const idContenido = editContenidoModal.querySelector('#contenidoid-edit');
            idContenido.value = editContenidoBtn.dataset.subcontenidoid;
            tituloContenido.value = editContenidoBtn.dataset.titulo;
            textoContenido.value = editContenidoBtn.dataset.contenido;
        }

        function deleteSubContenidoBtn(e) {
            const deleteBtn = this;
            const {
                toDeleteId
            } = getDeleteModalElements(deleteBtn);
            toDeleteId.value = deleteBtn.dataset.subcontenidoid;
        }

        function createSubseccion(e) {
            const createSubBtn = this;
            const modal = document.getElementById('subseccioncreate');
            const seccionPadre = modal.querySelector('#seccionPadre');
            seccionPadre.value = createSubBtn.dataset.seccionid;

        }

        function createSubcontenido(e) {
            const createSubBtn = this;
            const modal = document.getElementById('ContenidoCreate');
            const seccionPadre = modal.querySelector('#seccionPadre');
            seccionPadre.value = createSubBtn.dataset.subseccionid;
            const contenidoType = modal.querySelector('#contenidoType');
            contenidoType.value = "subseccion";
        }

        function createContenido(e) {
            const createSubBtn = this;
            const modal = document.getElementById('ContenidoCreate');
            const seccionPadre = modal.querySelector('#seccionPadre');
            seccionPadre.value = createSubBtn.dataset.seccionid;
            const contenidoType = modal.querySelector('#contenidoType');
            contenidoType.value = "seccion";
        }

        function createNovedadBtn(e) {
            const createSubBtn = this;
            const modal = document.getElementById('NovedadCreate');
        }

        function editNovedadBtn(e) {
            const editAvisoBtn = this;
            const editAvisoModal = document.getElementById('NovedadEdit');
            const tituloAviso = editAvisoModal.querySelector('#tituloContenido');
            const textoAviso = editAvisoModal.querySelector('#text-contenido');
            const idAviso = editAvisoModal.querySelector('#novedadid-edit');
            idAviso.value = editAvisoBtn.dataset.novedadid;
            tituloAviso.value = editAvisoBtn.dataset.titulo;
            textoAviso.value = editAvisoBtn.dataset.contenido;
            console.log(idAviso.value + ', ' + tituloAviso.value + ', ' + textoAviso.value + "prueba")
        }

        function deleteNovedadBtn(e) {
            const deleteBtn = this;
            const {
                toDeleteId
            } = getDeleteModalElements(deleteBtn);
            toDeleteId.value = deleteBtn.dataset.novedadid;
            console.log(toDeleteId.value);
        }

        //-----------------------------------------------------------------------------------------------------------------------------------------------------


        function seccionCreateSubmit(e) {
            e.preventDefault();
            form = this;
            const xhr = new HttpRequest();
            const endpoint = '/seccion';
            const formData = new FormData(form);
            xhr.post(endpoint, formData, function(error, response) {
                if (error) {
                    console.log('ocurrió un error', xhr.http.status);
                    if (xhr.http.status == 403) {
                        text = "Usted no tiene permisos para realizar esta accion";
                    } else {
                        text = "";
                        const resp = JSON.parse(error);
                        for (var ele in resp.error) {
                            text = text + resp.error[ele] + "\n"
                            console.log(ele);
                        }
                    }
                    const modal = document.getElementById('seccioncreate');
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
                    const modal = document.getElementById('seccioncreate');
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

        function seccionEditSubmit(e) {

            e.preventDefault();
            form = this;
            const xhr = new HttpRequest();
            const endpoint = '/seccion/update';
            const formData = new FormData(form);
            xhr.post(endpoint, formData, function(error, response) {
                if (error) {
                    console.log('ocurrió un error', xhr.http.status);
                    if (xhr.http.status == 403) {
                        text = "Usted no tiene permisos para realizar esta accion";
                    } else {
                        text = "";
                        const resp = JSON.parse(error);
                        for (var ele in resp.error) {
                            text = text + resp.error[ele] + "\n"
                            console.log(ele);
                        }
                        console.log(resp);
                    }
                    const modal = document.getElementById('seccionedit');
                    const alert = modal.querySelector('#modal-alert');
                    alert.innerHTML = text;
                    alert.style.display = "block";
                    alert.classList.add('alert-danger');
                }
                if (response) {
                    //espacio para implementar si la consulta tiene éxito
                    const resp = JSON.parse(response);
                    const alert = document.getElementById('alert-message');
                    alert.innerHTML = resp.success;
                    alert.style.display = "block";
                    alert.classList.add('alert-success');
                    const modal = document.getElementById('seccionedit');
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

        function subSeccionCreateSubmit(e) {
            e.preventDefault();
            form = this;
            const xhr = new HttpRequest();
            const endpoint = '/subseccion';
            const formData = new FormData(form);
            xhr.post(endpoint, formData, function(error, response) {
                if (error) {
                    console.log('ocurrió un error', xhr.http.status);
                    if (xhr.http.status == 403) {
                        text = "Usted no tiene permisos para realizar esta accion";
                    } else {
                        text = "";
                        const resp = JSON.parse(error);
                        for (var ele in resp.error) {
                            text = text + resp.error[ele] + "\n"
                            console.log(ele);
                        }
                    }
                    const modal = document.getElementById('subseccioncreate');
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
                    const modal = document.getElementById('subseccioncreate');
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

        function subSeccionEditSubmit(e) {
            e.preventDefault();
            form = this;
            const xhr = new HttpRequest();
            const endpoint = '/subseccion/update';
            const formData = new FormData(form);
            xhr.post(endpoint, formData, function(error, response) {
                if (error) {
                    console.log('ocurrió un error', xhr.http.status);
                    if (xhr.http.status == 403) {
                        text = "Usted no tiene permisos para realizar esta accion";
                    } else {
                        text = "";
                        const resp = JSON.parse(error);
                        for (var ele in resp.error) {
                            text = text + resp.error[ele] + "\n"
                            console.log(ele);
                        }
                    }
                    const modal = document.getElementById('subseccionedit');
                    const alert = modal.querySelector('#modal-alert');
                    alert.innerHTML = text;
                    alert.style.display = "block";
                    alert.classList.add('alert-danger');
                }
                if (response) {
                    //espacio para implementar si la consulta tiene éxito
                    const resp = JSON.parse(response);
                    const alert = document.getElementById('alert-message');
                    alert.innerHTML = resp.success;
                    alert.style.display = "block";
                    alert.classList.add('alert-success');
                    const modal = document.getElementById('subseccionedit');
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

        function contenidoCreateSubmit(e) {
            e.preventDefault();
            form = this;
            const xhr = new HttpRequest();
            const endpoint = '/contenidos';
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
                    const modal = document.getElementById('ContenidoCreate');
                    const alert = modal.querySelector('#modal-alert');
                    alert.innerHTML = text;
                    alert.style.display = "block";
                    alert.classList.add('alert-danger');
                }
                if (response) {
                    console.log(response)
                    //espacio para implementar si la consulta tiene éxito
                    const resp = JSON.parse(response);
                    const alert = document.getElementById('alert-message');
                    alert.innerHTML = resp.success;
                    alert.style.display = "block";
                    alert.classList.add('alert-success');
                    const modal = document.getElementById('ContenidoCreate');
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

        function contenidoEditSubmit(e) {
            e.preventDefault();
            form = this;
            const xhr = new HttpRequest();
            const endpoint = '/contenidos/update';
            const formData = new FormData(form);
            xhr.post(endpoint, formData, function(error, response) {
                if (error) {
                    console.log('ocurrió un error', xhr.http.status);
                    if (xhr.http.status == 403) {
                        text = "Usted no tiene permisos para realizar esta accion";
                    } else {
                        text = "";
                        const resp = JSON.parse(error);
                        for (var ele in resp.error) {
                            text = text + resp.error[ele] + "\n"
                            console.log(ele);
                        }
                    }
                    const modal = document.getElementById('ContenidoEdit');
                    const alert = modal.querySelector('#modal-alert');
                    alert.innerHTML = text;
                    alert.style.display = "block";
                    alert.classList.add('alert-danger');
                }
                if (response) {
                    //espacio para implementar si la consulta tiene éxito
                    console.log(response)
                    //espacio para implementar si la consulta tiene éxito
                    const resp = JSON.parse(response);
                    const alert = document.getElementById('alert-message');
                    alert.innerHTML = resp.success;
                    alert.style.display = "block";
                    alert.classList.add('alert-success');
                    const modal = document.getElementById('ContenidoEdit');
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

        function novedadCreateSubmit(e) {
            console.log("aviso")
            e.preventDefault();
            form = this;
            const xhr = new HttpRequest();
            const endpoint = '/aviso';
            const formData = new FormData(form);
            xhr.post(endpoint, formData, function(error, response) {
                if (error) {
                    console.log('ocurrió un error', xhr.http.status);
                    if (xhr.http.status == 403) {
                        text = "Usted no tiene permisos para realizar esta accion";
                    } else {
                        text = "";
                        const resp = JSON.parse(error);
                        for (var ele in resp.error) {
                            text = text + resp.error[ele] + "\n"
                            console.log(ele);
                        }
                    }
                    const modal = document.getElementById('NovedadCreate');
                    const alert = modal.querySelector('#modal-alert');
                    alert.innerHTML = text;
                    alert.style.display = "block";
                    alert.classList.add('alert-danger');
                }
                if (response) {
                    console.log(response)
                    //espacio para implementar si la consulta tiene éxito
                    const resp = JSON.parse(response);
                    const alert = document.getElementById('alert-message');
                    alert.innerHTML = resp.success;
                    alert.style.display = "block";
                    alert.classList.add('alert-success');
                    const modal = document.getElementById('NovedadCreate');
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

        function novedadEditSubmit(e) {
            e.preventDefault();
            form = this;
            const xhr = new HttpRequest();
            const endpoint = '/aviso/update';
            const formData = new FormData(form);
            xhr.post(endpoint, formData, function(error, response) {
                if (error) {
                    console.log('ocurrió un error', xhr.http.status);
                    if (xhr.http.status == 403) {
                        text = "Usted no tiene permisos para realizar esta accion";
                    } else {
                        text = "";
                        const resp = JSON.parse(error);
                        for (var ele in resp.error) {
                            text = text + resp.error[ele] + "\n"
                            console.log(ele);
                        }
                    }
                    const modal = document.getElementById('NovedadEdit');
                    const alert = modal.querySelector('#modal-alert');
                    alert.innerHTML = text;
                    alert.style.display = "block";
                    alert.classList.add('alert-danger');
                }
                if (response) {
                    //espacio para implementar si la consulta tiene éxito
                    console.log(response)
                    //espacio para implementar si la consulta tiene éxito
                    const resp = JSON.parse(response);
                    const alert = document.getElementById('alert-message');
                    alert.innerHTML = resp.success;
                    alert.style.display = "block";
                    alert.classList.add('alert-success');
                    const modal = document.getElementById('NovedadEdit');
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

        function deleteSubmit(e) {
            endpointMap = new Map();
            endpointMap.set('seccion', '/seccion/delete');
            endpointMap.set('contenido', '/contenidos/delete');
            endpointMap.set('subseccion', '/subseccion/delete');
            endpointMap.set('subcontenido', '/contenidos/delete');
            endpointMap.set('novedad', '/aviso/delete');
            e.preventDefault();
            form = this;
            const xhr = new HttpRequest();
            const formData = new FormData(form);
            const endpoint = endpointMap.get(formData.get('toDeleteType'));
            xhr.post(endpoint, formData, function(error, response) {
                if (error) {
                    console.log('ocurrió un error', xhr.http.status);
                    if (xhr.http.status == 403) {
                        text = "Usted no tiene permisos para realizar esta accion";
                    } else {
                        const resp = JSON.parse(error);
                        text = resp.error;
                    }
                    const alert = document.getElementById('modal-alert');
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
                    const modal = document.getElementById('deleteModal');
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
            btnMap.set('btn-edit-seccion', editSeccionBtn);
            btnMap.set('btn-delete-seccion', deleteSeccionBtn);
            btnMap.set('btn-create-contenido', createContenido);
            btnMap.set('btn-edit-contenido', editContenidoBtn);
            btnMap.set('btn-delete-contenido', deleteContenidoBtn);
            btnMap.set('btn-edit-subseccion', editSubSeccionBtn);
            btnMap.set('btn-delete-subseccion', deleteSubSeccionBtn);
            btnMap.set('btn-edit-subcontenido', editSubContenidoBtn);
            btnMap.set('btn-delete-subcontenido', deleteSubContenidoBtn);
            btnMap.set('btn-create-subseccion', createSubseccion);
            btnMap.set('btn-create-subcontenido', createSubcontenido);
            btnMap.set('btn-create-novedad', createNovedadBtn);
            btnMap.set('btn-edit-novedad', editNovedadBtn);
            btnMap.set('btn-delete-novedad', deleteNovedadBtn);
            Array.from(btnMap.keys()).forEach((btnClass) => {
                Array.from(document.getElementsByClassName(btnClass)).forEach(function(btn) {
                    btn.addEventListener('click', btnMap.get(btnClass));
                });
            });


            formsMap = new Map();
            formsMap.set('seccionCreateForm', seccionCreateSubmit);
            formsMap.set('seccionEditForm', seccionEditSubmit);
            formsMap.set('subseccionCreateForm', subSeccionCreateSubmit);
            formsMap.set('subSeccionEditForm', subSeccionEditSubmit);
            formsMap.set('contenidoCreateForm', contenidoCreateSubmit);
            formsMap.set('contenidoEditForm', contenidoEditSubmit);
            formsMap.set('deleteForm', deleteSubmit);
            formsMap.set('novedadCreateForm', novedadCreateSubmit);
            formsMap.set('novedadEditForm', novedadEditSubmit);
            Array.from(formsMap.keys()).forEach((form) => {
                document.getElementById(form).addEventListener('submit', formsMap.get(form));
            })
        });
    </script>
