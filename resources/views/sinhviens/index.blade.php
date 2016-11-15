@extends('layouts.dashboard')

@section('content')
		<div class="table-responsive">
			<table class="table table-hover table-bordered">
				<thead>
					<tr>
						<th>Tên</th>
						<th>ID</th>
						<th>Giới Tính</th>
						<th>Ngày Sinh</th>
						<!-- <th>Dân Tộc</th> -->
						<th>Địa Chỉ</th>
						<!-- <th>CMND</th>
						<th>Ngày Cấp</th>
						<th>Nơi Cấp</th>
						<th>Khóa</th>
						<th>Ngành</th>
						<th>Bậc</th> -->
						<th>Lớp</th>
						<th>Điện Thoại</th>
						<th>Email</th>
						<th>Action</th>						
					</tr>
				</thead>
				<tbody>
				@foreach( $sinhviens as $sinhvien)
				<tr>
					<td>{{ $sinhvien->TenSv }}</td>
					<td>{{ $sinhvien->IDSV }}</td>
					<td>@if($sinhvien->GioiTinh == 1)
							{{ 'Nam' }}
						@else
							{{ 'Nữ' }}
						@endif
					</td>
					<td>{{ $sinhvien->NgaySinh }}</td>
					<!-- <td>{{ $sinhvien->DanToc }}</td> -->
					<td>{{ $sinhvien->DiaChi }}</td>
					<!-- <td>{{ $sinhvien->CMND }}</td>
					<td>{{ $sinhvien->NgayCap }}</td>
					<td>{{ $sinhvien->NoiCap }}</td>
					<td>{{ $sinhvien->Khoa }}</td>
					<td>{{ $sinhvien->Nganh }}</td>
					<td>{{ $sinhvien->Bac }}</td> -->
					<td>{{ $sinhvien->Lop }}</td>
					<td>{{ $sinhvien->DienThoai }}</td>
					<td>{{ $sinhvien->Email }}</td>
					<td>
					<a href="{{ route('sinhviens.show', $sinhvien->id) }}" class="btn btn-info">View Task</a>
        			<a href="{{ route('sinhviens.edit', $sinhvien->id) }}" class="btn btn-primary">Edit Task</a>
        			</td>
				</tr>
				@endforeach
				</tbody>
			</table>
		</div>

@endsection