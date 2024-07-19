@extends('admin.layout.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="row tab-content">
                    <div id="list-view" class="tab-pane fade active show col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Danh sách học viên</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="dataTable" class="display text-center" style="width: 100%">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tên</th>
                                            <th>Avatar</th>
                                            <th>Giới tính</th>
                                            <th>Khóa học</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($students as $student)
                                            <tr class="tr-{{ $student->user->slug }}">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <a href="{{ route('admin.student.show', [$student->user->slug]) }}">{{ $student->user->name }}</a>
                                                </td>
                                                <td><img class="rounded-circle" width="35" src="{{ $student->user->avatarPath() }}" alt=""></td>
                                                <td>{{ $student->user->gender === 'male' ? 'Nam' : 'Nữ' }}</td>
                                                <td>{{ number_format($student->courses->where('status', 'paid')->count()) }}</td>
                                                <td>{{ $student->user->email }}</td>
                                                <td>
                                                    <button data-url="{{ route('admin.student.destroy', encrypt($student->id)) }}" class="delete-button btn btn-sm btn-danger"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Xóa học viên"><i class="la la-trash-o"></i></button>
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
        $(document).ready(function () {
            let table = new DataTable('#dataTable', {
                responsive: true,
                layout: {
                    topStart: {
                        buttons: ['pageLength', {
                            extend: 'spacer',
                            style: 'bar',
                            text: 'Xuất file:'
                        }, 'excel', 'pdf', 'print'],
                    }
                },
            });
            $(document).on('click', '.delete-button', function () {
                Swal.fire({
                    title: "Bạn có chắc không?",
                    text: "Bạn sẽ không thể hoàn tác lại được!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Xóa",
                    cancelButtonText: "Hủy"
                }).then((result) => {
                    if (result.isConfirmed) {
                        let url = $(this).data('url');
                        $.ajax({
                            url: url,
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function (response) {
                                Swal.fire({
                                    title: response.message,
                                    icon: "success"
                                });
                                $('.tr-' + response.row).remove();
                            },
                            error: function (response) {
                                Swal.fire({
                                    title: response.responseJSON.message,
                                    icon: "warning"
                                });
                            }
                        });
                    }
                });
            })
        });
    </script>
@endsection
