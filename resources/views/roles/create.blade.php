@extends('layouts.app')
@section('title', 'Roles')
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Crear rol</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                           
                            {{-- Se realiza la validacion de los campos segun el metodo de RolController para mostrar el error ocurrido  --}}
                           @if ($errors->any())
                           <div class="alert alert-dark alert-dismissible fade show" role="alert">
                            <strong> ¡Todos los campos son obligatorios! </strong>
                                @foreach ($errors->all() as $error)
                                    <span class="badge badge-danger">{{$error}}</span> {{--Estilos de Bootstrap--}}
                                @endforeach
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> {{--Estilos de Bootstrap--}}
                                <span aria-hidden="true">&times;</span> {{--Estilos de Bootstrap--}}
                                </button>
                           </div>  
                           @endif

                           {{-- Input para Nombre del rol --}}
                           {!! Form::open(array('route'=>'role.store', 'method'=>'POST')) !!}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="name">Nombre del rol</label>
                                        {!! Form::text('name', null, array('class'=>'form-control')) !!}
                                    </div>
                                </div>
                            </div>
                            {{-- Input para permisos del rol --}}
                           {!! Form::open(array('route'=>'role.store', 'method'=>'POST')) !!}
                           <div class="row">
                               <div class="col-xs-12 col-sm-12 col-md-12">
                                   <div class="form-group">
                                       <label for="name">Permisos del rol</label>
                                       <br/>
                                       @foreach ($permission as $value)
                                            <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                                {{ $value->name }}</label>
                                        <br/>
                                       @endforeach
                                   </div>
                               </div>
                           </div>
                           <button type="submit" class="btn btn-primary">Guardar</button>
                           {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


