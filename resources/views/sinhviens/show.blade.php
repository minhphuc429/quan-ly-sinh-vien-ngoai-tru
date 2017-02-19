<form action="{{ route('sinhviens.destroy', $sinhvien->id) }}" method="POST">
    {{ method_field('DELETE') }}
    {{ csrf_field() }}
    <button type="submit" class="btn btn-danger">Delete</button>
</form>