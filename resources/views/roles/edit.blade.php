@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Role</h2>
        <form method="post" action="{{ route('roles.update', $role->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Role Name:</label>
                <input type="text" name="name" class="form-control" value="{{ $role->name }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Role</button>
        </form>
    </div>
@endsection
