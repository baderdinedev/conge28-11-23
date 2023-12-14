@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit leave-request</h2>
        <form method="post" action="{{route('leave-request.update',$leaveRequest->id)}}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="start_date">Start Date:</label>
                <input type="datetime-local" name="start_date" class="form-control" value="{{$leaveRequest->start_date}}" required>
            </div>
            <div class="form-group">
                <label for="end_date">End Date:</label>
                <input type="datetime-local" name="end_date" class="form-control" value="{{$leaveRequest->end_date}}" required>
            </div>
            <div class="form-group">
                <label for="reason">Reason:</label>
                <textarea name="reason" class="form-control" placeholder="Your reason... !!" required>{{$leaveRequest->reason}}</textarea>
            </div>
            <div class="form-group">
                <label for="type">Type:</label>
                <select name="type" class="form-control" required>
                    <option value="conge">Congé</option>
                    <option value="autorisation">Autorisation</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Role</button>
        </form>
    </div>
@endsection
