@extends('layouts.app')
@section('title', 'Usuarios')
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar usuario</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                           {{-- Se realiza la validacion de los campos segun el metodo de UserController para mostrar el error ocurrido  --}}
                           @if ($errors->any())
                           <div class="alert alert-dark alert-dismissible fade show" role="alert">
                            <strong> ¡Todos los campos son obligatorios! </strong>
                                @foreach ($errors->all() as $error)
                                    <span class="badge badge-danger">{{$error}}</span> {{--Estilos de Bootstrap--}}
                                @endforeach
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> {{--Estilos de Bootstrap--}}
                                <span aria-hidden="true">&times;</span> {{--Estilos de Botstrap--}}
                                </button>
                           </div>  
                           @endif
                           {{-- Input para Nombres --}}
                           {!! Form::model($user, ['method' => 'PATCH', 'route' => ['user.update', $user->id]]) !!}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Nombres</label>
                                        {!! Form::text('fname', null, array('class'=>'form-control')) !!}
                                    </div>
                                </div>
                                {{-- Input para Apellidos --}}
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="lname">Apellidos</label>
                                        {!! Form::text('lname', null, array('class'=>'form-control')) !!}
                                    </div>
                                </div>   
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="dni_type">Tipo de documento</label>
                                        <br>
                                        <select name="dni_type" id="dni_type" class="form-control">
                                            <option value="">-- Seleccione --</option>
                                            @foreach ($documentos as $documento)
                                                <option value="{{ $documento['name']}}">{{$documento['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{-- Input para Cedula --}}
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="dni">Numero de documento</label>
                                        <br>
                                        {!! Form::text('dni', null, array('class'=>'form-control')) !!}
                                    </div>
                                </div>
                            </div>
                            {{-- Input para Telefono --}}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Telefono</label>
                                        <br>
                                        {!! Form::text('phone', null, array('class'=>'form-control')) !!}
                                    </div>
                                </div>
                                {{-- Input para Direccion --}}
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="address">Direccion</label>
                                        <br>
                                        {!! Form::text('address', null, array('class'=>'form-control')) !!}
                                    </div>
                                </div>   
                            </div>
                            {{-- Input para email --}}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="email">e-mail</label>
                                        <br>
                                        {!! Form::text('email', null, array('class'=>'form-control')) !!}
                                    </div>
                                </div>
                                {{-- Input para Password --}}
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                     <div class="form-group">
                                         <label for="password">Contraseña</label>
                                         <br>
                                         {!! Form::password('password', array('class'=>'form-control')) !!}
                                     </div>
                                </div>
                             </div>
                             {{-- Input para Confrimar Password --}}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="name">Confirmar contraseña</label>
                                        <br>
                                        {!! Form::password('confirm-password', array('class'=>'form-control')) !!}{{--form_password es para que el campo sea caracter de contraseña, es decir, oculto--}}
                                    </div>
                                </div>
                                {{-- Input para Rol --}}
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="name">Roles</label>
                                        <br>
                                        {!! Form::select('roles[]', $roles, $userRole, array('class'=>'form-control select2')) !!} {{--form::select es para mostrar una lista desplegable de los roles--}}
                                    </div>
                                </div>
                            </div>
                            {{-- Boton guardar --}}
                           <div class="col-xs-12 col-sm-12 col-md-12">
                               <button type="submit" class="btn btn-primary">Guardar</button>
                           </div>
                           {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


