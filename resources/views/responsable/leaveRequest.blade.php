@extends('layouts.app')

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h3 class="card-title">Leave Request List</h3>
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