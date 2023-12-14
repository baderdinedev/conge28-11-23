@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}  
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
           <h1>Welcome  : {{ $user->name }}</h1>
           <h2>Email : {{ $user->email }}</h2>
           <a href="{{route('employeInfo.edit',$user->id)}}" class="btn btn-sm btn-info">Update Information</a>
        </div>
    </div>
</div>
@include('employe.sidebar')
@endsection


