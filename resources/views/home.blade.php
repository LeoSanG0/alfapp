@extends('layouts.app')
@section('title', 'Inicio')
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Inicio</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">   
                        {{-- Creando tarjetas de funciones en el home del app --}}
                        {{-- Trajeta para usuarios en Home --}}
                        <div class="row">
                            <div class="col-md-3 col-xl-3">
                            <div class="card bg-c-bluec order-card">
                                <div class="card-block">
                                    <h5>Usuarios</h5>
                                    @php
                                        use App\Models\User;
                                        $cant_users = User::count();
                                    @endphp
                                    <h2 class="text-right"><i class="fa fa-user f-left"></i><span>{{$cant_users}}</span></h2>
                                    <p class="m-b-0 text-right"><a href="{{ route('user.index') }}" class="text-white">Ver más</a></p>
                                </div>
                            </div>
                            </div>
                            <br>
                            {{-- Trajeta para roles en Home --}}
                            <div class="col-md-3 col-xl-3">
                            <div class="card bg-c-green order-card">
                                <div class="card-block">
                                    <h5>Roles</h5>
                                    @php
                                        use Spatie\Permission\Models\Role;
                                        $cant_roles = Role::count();
                                    @endphp
                                    <h2 class="text-right"><i class="fa fa-users-lock f-left"></i><span>{{$cant_roles}}</span></h2>
                                    <p class="m-b-0 text-right"><a href="{{ route('role.index') }}" class="text-white">Ver más</a></p>
                                </div>
                            </div>
                            </div>
                            <br>
                            {{-- Trajeta para clientes en Home --}}
                            <div class="col-md-3 col-xl-3">
                            <div class="card bg-c-pink order-card">
                                <div class="card-block">
                                    <h5>Clientes</h5>
                                    @php
                                        use App\Models\Customer;
                                        $cant_customers = Customer::count();
                                    @endphp
                                    <h2 class="text-right"><i class="fa fa-users f-left"></i><span>{{$cant_customers}}</span></h2>
                                    <p class="m-b-0 text-right"><a href="{{ route('customer.index') }}" class="text-white">Ver más</a></p>
                                </div>
                            </div>
                            </div>
                            <br>
                            {{-- Trajeta para quotes en Home --}}
                            <div class="col-md-3 col-xl-3">
                                <div class="card bg-c-yellow order-card">
                                    <div class="card-block">
                                        <h5>Cotizaciones</h5>
                                        @php
                                            use App\Models\Quote;
                                            $cant_quotes = Quote::count();
                                        @endphp
                                        <h2 class="text-right"><i class="fa fa-dollar-sign f-left"></i><span>{{$cant_quotes}}</span></h2>
                                        <p class="m-b-0 text-right"><a href="{{ route('quote.index') }}" class="text-white">Ver más</a></p>
                                    </div>
                                </div>
                                </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

