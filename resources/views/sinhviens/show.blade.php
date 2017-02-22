@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul class="fa-ul">
            @foreach ($errors->all() as $error)
                <li><i class="fa-li fa fa-chevron-circle-right"></i>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<form action="{{ route('sinhviens.destroy', $sinhvien->id) }}" method="POST">
    {{ method_field('DELETE') }}
    {{ csrf_field() }}
    <button type="submit" class="btn btn-danger">Delete</button>
</form>