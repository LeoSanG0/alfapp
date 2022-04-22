
@extends('layouts.app')
@section('title', 'Clientes')
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Crear cliente</h3>
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
                                    <span class="badge badge-danger">{{$error}}</span> {{--Estilos de Botstrap--}}
                                @endforeach
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> {{--Estilos de Botstrap--}}
                                <span aria-hidden="true">&times;</span> {{--Estilos de Botstrap--}}
                                </button>
                           </div>  
                           @endif
                           {{-- Input para Nombres contacto --}}
                           {!! Form::open(array('route'=>'customer.store', 'method'=>'POST')) !!}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="fname_contact">Nombres del contacto</label>
                                        <br>
                                        {!! Form::text('fname_contact', null, array('class'=>'form-control')) !!}
                                    </div>
                                </div>
                                {{-- Input para Apellidos del contacto --}}
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="lname_contact">Apellidos del contacto</label>
                                        <br>
                                        {!! Form::text('lname_contact', null, array('class'=>'form-control')) !!}
                                    </div>
                                </div>
                            </div>
                            {{-- Input para Tipo de cliente --}}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="id companies">Tipo de cliente</label>
                                        <br>
                                        <select name="id_companies" id="id_companies" class="form-control">
                                            <option value="">-- Seleccione --</option>
                                            @foreach ($companies as $company)
                                                <option value="{{ $company['id']}}">{{$company['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{-- Input para Razon social --}}
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="company">Razon Social</label>
                                        <br>
                                        {!! Form::text('company', null, array('class'=>'form-control')) !!}
                                    </div>
                                </div>
                            </div>
                            {{-- Input para NIT --}}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="nit">Numero de NIT</label>
                                        <br>
                                        {!! Form::text('nit', null, array('class'=>'form-control')) !!}
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
                                       <label for="name">e-mail</label>
                                       <br>
                                       {!! Form::text('email', null, array('class'=>'form-control')) !!}
                                   </div>
                               </div>
                               {{-- Input para Telefono --}}
                               <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Telefono</label>
                                        <br>
                                        {!! Form::text('phone', null, array('class'=>'form-control')) !!}
                                    </div>
                               </div>
                            </div>   
                            {{-- Boton guardar --}}
                            <br>
                           <div class="col-xs-12 col-sm-12 col-md-6">
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


