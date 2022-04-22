@extends('layouts.app')
@section('title', 'Clientes')
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Clientes</h3>
        </div>
        <br>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                        <br>
                        {{-- @can('create-user') --}}
                            <a class="btn btn-warning" href="{{ route('customer.create') }}">Nuevo</a>
                        {{-- @endcan --}}
                        <br>
                        <div class="table-responsive">
                            <br>
                            <table id="table_customer" class="table table-striped mt-2">
                            </table>
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('customers.destroy')
    @section('scripts')
        <script src="{{ asset ('js/customers/index.js') }}"></script>
    @endsection
@endsection