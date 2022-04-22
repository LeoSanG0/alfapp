@extends('layouts.app')
@section('title', 'Cotizaciones')
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Cotizaciones</h3>
           
        </div>
        <br>
       
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                        <br>
                        @can('create.quote')
                            <a class="btn btn-warning" href="{{ route('quote.create') }}">Nueva</a>
                        @endcan
                        <br>
                        <div class="table-responsive">
                            <br>
                            <table id="table_quotes" class="table table-striped mt-2">
                            </table>
                        </div>   
                    </div>
                </div>
            </div>
        </div>
       
    </section>
    @include('quotes.destroy')
    @section('scripts')
        <script src="{{ asset ('js/quotes/index.js') }}"></script>
    @endsection
@endsection 

