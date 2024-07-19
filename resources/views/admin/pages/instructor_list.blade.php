@extends('admin.layout.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Danh sách giảng viên </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dataTable" class="display nowrap text-center" style="width: 100%;">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên</th>
                                    <th>Avatar</th>
                                    <th>Giới tính</th>
                                    <th>Khóa học</th>
                                    <th>Email</th>
                                    <th>Trạng thái</th>
                                    <th>Số điện thoại</th>
                                    <th>Ngày tham gia</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($instructors->sortByDesc('created_at') as $instructor)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <a href="{{ route('admin.instructor.show', $instructor->user->slug) }}">{{ $instructor->user->name }}</a>
                                        </td>
                                        <td><img class="rounded-circle" width="35"
                                                 src="{{ $instructor->user->avatarPath() }}" alt=""></td>
                                        <td>{{ $instructor->user->gender == 'female' ? 'Nữ' : 'Nam' }}</td>
                                        <td>{{ $instructor->courses->where('status', 'approved')->count() }}</td>
                                        <td>
                                            <strong>{{ $instructor->user->email }}</strong>
                                        </td>
                                        <td>
                                            <span
                                                class="badge badge-rounded {{ $instructor->getBadgeColor() }}">{{ $instructor->getStatusName() }}</span>
                                        </td>
                                        <td>{{ $instructor->phone_number }}</td>
                                        <td>
                                            {{ date_format($instructor->created_at, 'd/m/Y') }}
                                        </td>
                                        <td data-url="{{ route('admin.update-instructor-status', encrypt($instructor->id)) }}">
                                            @if($instructor->user->status === 'pending')
                                                <button data-type="active" type="button"
                                                        class="btn btn-success text-light" data-toggle="tooltip"
                                                        data-placement="top" title="Phê duyệt">
                                                    <i class="fa-solid fa-check"></i>
                                                </button>
                                                <button data-type="rejected" type="button" class="btn btn-danger"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Từ chối">
                                                    <i class="fa-solid fa-xmark"></i>
                                                </button>
                                            @else
                                                <button data-type="suspended" type="button"
                                                        {{ $instructor->user->status === 'suspended' ? 'disabled' : '' }}
                                                        class="btn btn-dark text-light" data-toggle="tooltip"
                                                        data-placement="top"
                                                        title="Khóa"><i
                                                        class="fa-solid fa-lock"></i>
                                                </button>
                                                <button data-type="unblock" type="button"
                                                        {{ $instructor->user->status === 'active' ? 'disabled' : '' }}
                                                        class="btn btn-success text-light" data-toggle="tooltip"
                                                        data-placement="top" title="Mở khóa"><i
                                                        class="fa-solid fa-unlock"></i>
                                                </button>
                                                @if($instructor->courses->where('status', 'approved')->count() === 0 )
                                                    <button data-type="deleted" type="button" class="btn btn-primary"
                                                            data-toggle="tooltip"
                                                            data-placement="top" title="Xóa">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                @endif
                                            @endif
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
@endsection
@section('scripts')
    <script>
        $(document).on('click', '.btn', function () {
            let button = $(this);
            let url = button.parent().data('url');
            let type = button.data('type');
            let title = button.prop('title');
            Swal.fire({
                title: `Bạn có chắc chắn ${title.toLowerCase()} không?`,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancelButtonText: "Không!",
                confirmButtonText: "Có!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            status: type
                        },
                        success: function (response) {
                            if (response.status === 'success') {
                                button.closest('tr').find('span.badge').removeClass().addClass('badge badge-rounded ' + response.badgeColor).text(response.statusName);
                                if (type === 'suspended') {
                                    button.closest('td').find('button[data-type="suspended"]').prop('disabled', true);
                                    button.closest('td').find('button[data-type="unblock"]').prop('disabled', false);
                                } else if (type === 'unblock') {
                                    button.closest('td').find('button[data-type="unblock"]').prop('disabled', true);
                                    button.closest('td').find('button[data-type="suspended"]').prop('disabled', false);
                                } else if (type === 'active') {
                                    button.closest('td').html(`
                                        <button data-type="suspended" type="button" class="btn btn-dark text-light" data-toggle="tooltip"
                                            data-placement="top" title="Khóa"><i
                                            class="fa-solid fa-lock"></i>
                                        </button>
                                        <button data-type="unblock" type="button" class="btn btn-success text-light" data-toggle="tooltip" disabled
                                                data-placement="top" title="Mở khóa"><i
                                                class="fa-solid fa-unlock"></i>
                                        </button>
                                        <button data-type="deleted" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Xóa"><i class="fa-solid fa-trash"></i>
                                        </button>`)
                                } else {
                                    button.closest('tr').remove()
                                }
                                Swal.fire({
                                    position: "center",
                                    icon: "success",
                                    title: response.message,
                                    showConfirmButton: true
                                });
                            } else {
                                Swal.fire({
                                    position: "center",
                                    icon: "error",
                                    title: response.message,
                                    showConfirmButton: true
                                });
                            }
                        }
                    });
                }
            });
        })
        $('#dataTable').DataTable({
            language: {
                searchPanes: {
                    showMessage: '',
                    collapseMessage: '',
                    clearMessage: '',
                    title: 'Lọc theo status',
                    collapse: {0: 'Lọc theo status',}
                }
            },
            responsive: false,
            layout: {
                topStart: {
                    buttons: ['pageLength', {
                        extend: 'spacer',
                        style: 'bar',
                        text: 'Xuất file:'
                    }, 'excel', 'pdf', 'print', 'searchPanes'],
                }
            },
            columnDefs: [
                {
                    searchPanes: {
                        show: false
                    },
                    targets: [0, 1, 2, 3, 4, 5, 7, 8, 9]
                }, {
                    searchPanes: {
                        show: true,
                        collapse: false,
                        controls: false
                    },
                    targets: [6]
                }
            ]
        });
    </script>
@endsection
