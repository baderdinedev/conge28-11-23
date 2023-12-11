@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Create Employee</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('employe.store') }}" method="POST">
                @csrf

                
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="role_id">Role:</label>
                    <select name="role_id" id="role_id" class="form-control" required>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                               

                <button type="submit" class="btn btn-primary">Create Employee</button>
            </form>
        </div>
    </div>
@endsection
