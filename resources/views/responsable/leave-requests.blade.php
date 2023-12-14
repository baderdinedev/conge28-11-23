@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3 class="card-title">Your Leave Requests</h3>
                    <a href="{{route('leaveRequestForm')}}"
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
        </div>
</div>
@include('employe.sidebar')
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush

