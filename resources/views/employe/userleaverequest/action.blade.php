<div class="btn-group">
<a href="{{ route('leave-request.show', $id) }}" class="btn btn-info">View</a>

    <a href="" class="btn btn-warning">Edit</a>
    <form action="" method="post">
        @csrf
        @method('DELETE')
    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
    </form>
</div>