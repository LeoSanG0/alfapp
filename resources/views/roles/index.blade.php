@extends('layouts.app')
@section('title', 'Roles')
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Roles</h3>
        </div>
        <br>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                        <br>
                        {{-- @can('create-user') --}}
                            <a class="btn btn-warning" href="{{ route('role.create') }}">Nuevo</a>
                        {{-- @endcan --}}
                        <br>
                        <div class="table-responsive">
                            <br>
                            <table id="table_role" class="table table-striped mt-2">
                            </table>
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('roles.destroy')
    @section('scripts')
        <script src="{{ asset ('js/roles/index.js') }}"></script>
    @endsection
@endsection