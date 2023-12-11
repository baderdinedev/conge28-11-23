@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Role</h2>
        <form method="post" action="{{ route('employe.update', $user->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">User Name:</label>
                <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
            </div>
            <div class="form-group">
                <label for="email">User Email:</label>
                <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
            </div>            
            <div class="form-group">
                <label for="password">User Password:</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="role_id">User Role:</label>
                <select name="role_id" class="form-control" required>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                            {{ $role->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Role</button>
        </form>
    </div>
@endsection
