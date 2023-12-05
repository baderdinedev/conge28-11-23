@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h3 class="card-title">{{('guest.index.guests')}}</h3>
                <a href="{{route('roles.create')}}"
                   class="btn btn-primary" title="{{('guest.index.create_guest')}}">
                    <i class="fa fa-plus"></i> </a>
            </div>
            <div class="card-body">
                <div class="row overflow-auto">
                    <div class="col-12">
                        {!! $dataTable->table(['width' => '100%', 'class' => 'table align-items-center mb-0']) !!}
                    </div>
                </div>
            </div>
        </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush