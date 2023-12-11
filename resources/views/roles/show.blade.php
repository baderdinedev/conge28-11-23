@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Role Details</h3>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $role->id }}</p>
            <p><strong>Name:</strong> {{ $role->name }}</p>
            <a href="{{ route('roles.index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
@endsection
