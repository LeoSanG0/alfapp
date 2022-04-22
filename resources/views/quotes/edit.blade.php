
@extends('layouts.app')
@section('title', 'Cotizaciones')
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar cotización</h3>
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
                           <h4 class="page_heading">1. Datos Básicos</h4>
                           <br>
                           {{-- Input para Codigo PCI --}}
                           {!! Form::model($quote, ['method' => 'PUT', 'route' => ['quote.update', $quote->id]]) !!}

                           <input id="quote_id" type="hidden" value="{{ $quote->id }}">
                           {{-- Input para Codigo PCI --}}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="code">Código</label>
                                        <br>
                                        {!! Form::text('code', null, array('class'=>'form-control')) !!}
                                    </div>
                                </div>
                                {{-- Input para Fecha --}}
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="date">Fecha</label>
                                        <br>
                                        {!! Form::date('date', null, array('class'=>'form-control')) !!}
                                    </div>
                                </div>
                            </div>
                            {{-- Input para Nombre del proyecto --}}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="name_project">Nombre del proyecto</label>
                                        <br>
                                        {!! Form::text('name_project', null, array('class'=>'form-control')) !!}
                                    </div>
                                </div>
                                {{-- Input para Departamento --}}
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="id_state">Departamento</label>
                                        <br>
                                        <select name="id_state" id="state_name" class="form-control select2">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            {{-- Input para Municipio --}} 
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="id_cities">Municipio</label>
                                        <br>
                                        <select name="id_cities" id="city_name" class="form-control select2">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                                {{-- Input para Tipo de cliente --}}
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <div class="form-group">
                                        <label for="id_companies">Tipo de cliente</label>
                                        <br>
                                        <select name="companies" id="companies_name" class="form-control">
                                            <option value=""></option>
                                            @foreach ($companies as $company)
                                                <option value="{{ $company['id']}}">{{$company['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{-- Input para Cliente --}}
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="id_customers">Cliente</label>
                                        <br>
                                        <select name="id_customers" id="customer_name" class="form-control select2">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            {{-- P A S O  2 DE 3 --}}
                            <h4 class="page_heading">2. Datos Técnicos</h4>
                            <br>
                            {{-- Input para Alcance --}}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="scope">Alcance</label>
                                        <br>
                                        <select name="fscope" id="fscope" class="form-control sel">
                                            <option value="">N/A</option>
                                            <option value="Inspección RETILAP proceso de iluminación interior">Inspección RETILAP proceso de iluminación interior</option>
                                            <option value="Inspección RETILAP proceso de iluminación exterior">Inspección RETILAP proceso de iluminación exterior</option>
                                            <option value="Inspección RETILAP proceso de alumbrado público">Inspección RETILAP proceso de alumbrado público</option>
                                        </select>
                                        <br>
                                        <select name="sscope" id="sscope" class="form-control sel">
                                            <option value="">N/A</option>
                                            <option value="Inspección RETILAP proceso de iluminación interior">Inspección RETILAP proceso de iluminación interior</option>
                                            <option value="Inspección RETILAP proceso de iluminación exterior">Inspección RETILAP proceso de iluminación exterior</option>
                                            <option value="Inspección RETILAP proceso de alumbrado público">Inspección RETILAP proceso de alumbrado público</option>
                                        </select>
                                        <br>
                                        <select name="tscope" id="tscope" class="form-control sel">
                                            <option value="">N/A</option>
                                            <option value="Inspección RETILAP proceso de iluminación interior">Inspección RETILAP proceso de iluminación interior</option>
                                            <option value="Inspección RETILAP proceso de iluminación exterior">Inspección RETILAP proceso de iluminación exterior</option>
                                            <option value="Inspección RETILAP proceso de alumbrado público">Inspección RETILAP proceso de alumbrado público</option>
                                        </select>
                                    </div>
                                </div>
                                {{-- Input para Valores unitarios --}}
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="unit_value">Valor unitario</label>
                                        <br>
                                        <input value="{{ $quote->funit_value }}" type="number" name="funit_value" id="funit_value" class="form-control" onChange="calculo();"> 
                                        <br>
                                        <input value="{{ $quote->sunit_value }}" type="number" name="sunit_value" id="sunit_value" class="form-control" onChange="calculo();"> 
                                        <br>
                                        <input value="{{ $quote->tunit_value }}" type="number" name="tunit_value" id="tunit_value" class="form-control" onChange="calculo();"> 
                                        <br>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                               <div class="col-xs-12 col-sm-12 col-md-6">
                                   <div class="form-group">
                                       <label for="execution_time">Tiempo de ejecución</label>
                                       <br>
                                       {!! Form::text('execution_time', null, array('class'=>'form-control')) !!}
                                   </div>
                               </div>
                               {{-- Input para Vigencia --}}
                               <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="validity">Vigencia</label>
                                    <br>
                                    {!! Form::text('validity', null, array('class'=>'form-control')) !!}
                                </div>
                           </div>
                        </div>
                            {{-- P A S O  3 DE 3 --}}
                            <h4 class="page_heading">3. Datos Economicos</h4>
                            <br>
                            {{-- Input para Valor unitario --}}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                     <div class="form-group">
                                         <label for="subtotal">Subtotal</label>
                                         <br>
                                         <input value="{{ $quote->funit_value + ($quote->sunit_value + ($quote->tunit_value)) }}" type="number" name="subtotal" id="subtotal" class="form-control">
                                         {{-- {!! Form::number('subtotal', null, array('class'=>'form-control')) !!} --}}
                                     </div>
                                </div>
                                {{-- Input para IVA --}}
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="iva">IVA (19%)</label>
                                        <br>
                                        <input value="{{ $quote->iva }}" type="number" name="iva" id="iva" class="form-control"> 
                                    </div>
                                </div>
                            </div> 
                             {{-- Input para Total --}}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                     <div class="form-group">
                                         <label for="total">Total</label>
                                         <br>
                                         <input value="{{ $quote->funit_value + ($quote->sunit_value + ($quote->tunit_value + ($quote->iva))) }}" type="number" name="total" id="total" class="form-control">
                                     </div>
                                </div>
                                {{-- Input para Valor adicional --}}
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="value_add">Valor adicional</label>
                                        <br>
                                        {{-- <input value="0" type="number" name="value_add" id="number" class="form-control">  --}}

                                        {!! Form::number('value_add', null, array('class'=>'form-control')) !!}
                                    </div>
                                </div>
                             </div>
                             {{-- Input para Status --}}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="status">Estado</label>
                                        <br>
                                        <select name="status" id="status" class="form-control select2">
                                            <option value="Pendiente">Pendiente</option>
                                            <option value="Rechazada">Rechazada</option>
                                            <option value="Aceptada">Aceptada</option>
                                        </select>
                                    </div>
                                </div>
                                {{-- Input para Metodo de pago --}}
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="payment_method">Metodo de pago</label>
                                        <br>
                                        {!! Form::text('payment_method', null, array('class'=>'form-control')) !!}
                                    </div>
                                </div> 
                            </div> 
                            {{-- Insput para observaciones --}}
                            <div  class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <label for="observations">Observaciones</label>
                                    <br>
                                    {!! Form::text('observations', null, array('class'=>'form-control')) !!}
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
    @section('scripts')
    <script src="{{ asset ('js/quotes/options.js') }}"></script>
    <script src="{{ asset ('js/quotes/create.js') }}"></script>
    <script src="{{ asset ('js/quotes/edit.js') }}"></script>
    @endsection
@endsection


