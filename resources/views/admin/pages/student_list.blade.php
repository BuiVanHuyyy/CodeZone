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
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="dataTable" class="display text-center" style="min-width: 1200px">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tên</th>
                                            <th>Avatar</th>
                                            <th>Giới tính</th>
                                            <th>Email</th>
                                            <th>Trạng thái</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($students as $student)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><a href="{{ route('admin.student.show', ['student' => $student]) }}">{{ $student->user->name }}</a></td>
                                                <td><img class="rounded-circle" width="35" src="{{ $student->user->avatarPath() ?? asset('client_assets/images/avatar/default_avatar.png') }}" alt=""></td>
                                                <td>{{ $student->user->gender === 'male' ? 'Nam' : 'Nữ' }}</td>
                                                <td>{{ $student->user->email }}</td>
                                                <td>
                                                    <form>
                                                        <select class="form-select p-0 statusSelect" aria-label="Status select">
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
