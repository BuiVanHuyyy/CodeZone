@extends('admin.layout.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="row tab-content">
                    <div id="list-view" class="tab-pane fade active show col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Danh sách giảng viên  </h4>
                                <a href="" class="btn btn-primary">+ Tạo mới</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="dataTable" class="display" style="min-width: 1200px">
                                        <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Tên</th>
                                            <th>Avatar</th>
                                            <th>Giới tính</th>
                                            <th>Khóa học</th>
                                            <th>Số điện thoai</th>
                                            <th>Email</th>
                                            <th>Trạng thái</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($instructors->sortByDesc('id') as $instructor)
                                            <tr>
                                                <td>#{{ $instructor->user->id }}</td>
                                                <td><a href="{{ route('admin.instructor.show', ['instructor' => $instructor]) }}">{{ $instructor->name }}</a></td>
                                                <td><img class="rounded-circle" width="35" src="{{ $instructor->avatar }}" alt=""></td>
                                                <td>{{ $instructor->gender === 0 ? 'Nữ' : 'Nam' }}</td>
                                                <td>{{ $instructor->courses->count() }}</td>
                                                <td>{{ $instructor->phone_number }}</td>
                                                <td><a href="javascript:void(0);"><strong>{{ $instructor->user->email }}</strong></a></td>
                                                <td>
                                                    <select data-url="{{ route('admin.update-status', [$instructor->id]) }}" class="statusSelect form-select" name="status" aria-label="Status select">
                                                        <option {{ $instructor->user->status === 'pending' ? 'selected' : '' }} value="pending">Chờ phê duyệt</option>
                                                        <option {{ $instructor->user->status === 'active' ? 'selected' : '' }} value="active">Hoạt động</option>
                                                        <option {{ $instructor->user->status === 'suspended' ? 'selected' : '' }} value="suspended">Khóa</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i class="la la-trash-o"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $('.statusSelect').change(function() {
            let url = $(this).data('url');
            let status = $(this).val();
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    status: status
                },
                success: function(response) {
                    if (response.status === 'success') {
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: response.msg,
                            showConfirmButton: false,
                            timer: 1000
                        });
                    } else {
                        Swal.fire({
                            position: "center",
                            icon: "error",
                            title: response.msg,
                            showConfirmButton: false,
                            timer: 1000
                        });
                    }
                }
            });
        });
        let table = new DataTable('#dataTable', {
            responsive: true
        });
    </script>
@endsection
