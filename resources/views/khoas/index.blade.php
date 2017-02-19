@if	(session('status'))
    <div class="alert alert-danger">
        {{ session('status') }}
    </div>
@endif
@if (count($errors) >0 )
    <div class="alert alert-danger">
        <ul class="fa-ul">
            @foreach ($errors->all() as $error)
                <li class="fa-li fa fa-chevron-circle-right">{{ $errors }}</li>
            @endforeach
        </ul>
    </div>
@endif
<a href="{{ route('khoas.create') }}" class="btn btn-default">Create</a>
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Mã Khoa</th>
            <th>Tên Khoa</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($khoas->all() as $khoa)
            <tr>
                <td>{{ $khoa->id }}</td>
                <td>{{ $khoa->MaKhoa }}</td>
                <td>{{ $khoa->TenKhoa }} </td>
                <td>
                    <a href="{{ route('khoas.show', $khoa->id) }}">View</a>
                    <a href="{{ route('khoas.edit', $khoa->id) }}">Edit</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>