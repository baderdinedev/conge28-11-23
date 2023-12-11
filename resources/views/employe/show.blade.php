@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Role Details</h3>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $user->id }}</p>
            <p><strong>Name:</strong> {{ $user->name }}</p>
            <p><strong>Name:</strong> {{ $user->email }}</p>
            <p><strong>Role:</strong> {{ $user->role->name }}</p>
            <a href="{{ route('employe.list') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
@endsection
