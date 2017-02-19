<form action="{{ route('lops.destroy', $lop->id) }}" method="POST">
    {{ method_field('DELETE') }}
    {{ csrf_field() }}
    <button type="submit" class="btn btn-danger">Delete</button>
</form>