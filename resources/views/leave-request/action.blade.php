<div class="btn-group">
    <form action="{{ route('leave-request.approve', $id) }}" method="post">
        @csrf
        @method('POST')
        <button type="submit" class="btn btn-sm btn-success">Approve</button>
    </form>        

    <form action="{{ route('leave-request.reject', $id) }}" method="post">
        @csrf
        @method('POST')
        <button type="submit" class="btn btn-sm btn-danger">Reject</button>
    </form>   
</div>

