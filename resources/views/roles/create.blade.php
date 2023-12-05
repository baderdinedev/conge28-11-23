@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create Role</h2>
        <form method="post" action="{{ route('roles.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Role Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Role</button>
        </form>
    </div>
@endsection
