@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Role Details</h3>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $leaveRequests->id }}</p>
            <p><strong>Type:</strong> {{ $leaveRequests->type }}</p>
            <p><strong>Reason:</strong> {{ $leaveRequests->reason }}</p>
            <p><strong>Start Date:</strong> {{ $leaveRequests->start_date }}</p>
            <p><strong>End Date:</strong> {{ $leaveRequests->end_date }}</p>
            <a href="{{route('leaveRequests.list')}}" class="btn btn-primary">Back</a>
        </div>
    </div>
@endsection
