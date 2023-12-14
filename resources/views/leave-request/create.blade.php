@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
             <div class="container">
        <h2>New Leave Request</h2>
        @if($leavsReq == 1 )
            <div class="alert alert-warning">
                You can't Add a new Leave Request Now !
                check your last Leave Request if you wan to update click here
                <a href="{{route('leaveRequests.list')}}">Leave Requests</a>
            </div>        
        @else
        <form method="post" action="{{ route('leave-requests.store') }}">
            @csrf
            <div class="form-group">
                <label for="start_date">Start Date:</label>
                <input type="datetime-local" name="start_date" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="end_date">End Date:</label>
                <input type="datetime-local" name="end_date" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="reason">Reason:</label>
                <textarea name="reason" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="type">Type:</label>
                <select name="type" class="form-control" required>
                    <option value="conge">Congé</option>
                    <option value="autorisation">Autorisation</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        @endif
    </div>  
        </div>
    </div>
</div>
@include('employe.sidebar')
@endsection
