@extends('admin.layout.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="row tab-content">
                    <div id="list-view" class="tab-pane fade active show col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Danh sách học viên  </h4>
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
                                        @foreach($students as $student)
                                            <tr>
                                                <td><a href="{{ route('admin.student.show', ['student' => $student]) }}">#{{ $student->user->id }}</a> </td>
                                                <td><a href="{{ route('admin.student.show', ['student' => $student]) }}">{{ $student->name }}</a></td>
                                                <td><img class="rounded-circle" width="35" src="{{ asset('admin_assets/images/profile/small/pic1.jpg') }}" alt=""></td>
                                                <td>{{ $student->gender === 0 ? 'Nữ' : 'Nam' }}</td>
                                                <td>23</td>
                                                <td>{{ $student->phone_number }}</td>
                                                <td>{{ $student->user->email }}</td>
                                                <td>
                                                    <form>
                                                        <select class="form-select p-0" aria-label="Status select">
                                                            <option {{ $student->user->status === 'pending' ? 'selected' : '' }} value="pending">Chờ phê duyệt</option>
                                                            <option {{ $student->user->status === 'active' ? 'selected' : '' }} value="active">Hoạt động</option>
                                                            <option {{ $student->user->status === 'suspended' ? 'selected' : '' }} value="suspended">Khóa</option>
                                                        </select>
                                                    </form>
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
        let table = new DataTable('#dataTable', {
            responsive: true
        });
    </script>
@endsection
