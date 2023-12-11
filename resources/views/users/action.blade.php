<div class="btn-group">
    <a href="{{ route('employe.show', $id) }}" class="btn btn-sm btn-info">View</a>
    <a href="{{route('employe.edit',$id)}}" class="btn btn-sm btn-warning">Edit</a>
    <form action="{{route('employe.destory',$id)}}" method="post" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this role?')">Delete</button>
    </form>
</div>
