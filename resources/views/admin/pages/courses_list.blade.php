@extends('admin.layout.master')

@section('content')
    <div class="container-fluid">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Basic Datatable</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dataTable" class="display nowrap" style="min-width: 845px">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Author</th>
                                <th>Students Qty</th>
                                <th>Status</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($courses) > 0)
                                @foreach($courses as $course)
                                    <tr id="tr-{{ $course->slug }}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <a href="{{ route('admin.course.show', $course->slug) }}"><strong>{{ $course->title }}</strong></a>
                                        </td>
                                        <td>{{ number_format($course->price) }} <span>&#8363;</span></td>
                                        <td>{{ $course->category->title }}</td>
                                        <td>
                                            <a href="{{ route('admin.instructor.show', $course->author->user->slug) }}">{{ $course->author->user->name }}</a>
                                        </td>
                                        <td>{{ $course->students->count() }}</td>
                                        <td>
                                            <span style="text-transform: capitalize"
                                                  class="badge-rounded {{ $course->getBadgeColor() }}">{{ $course->getStatusName() }}</span>
                                        </td>
                                        <td>{{ date_format($course->created_at, 'd/M/Y') }}</td>
                                        <td>
                                            @if($course->status === 'pending')
                                                <button data-status="approved" class="btn btn-success">Xác thực</button>
                                                <button data-status="rejected" class="btn btn-danger" data-url=""
                                                   data-id="{{ $course->id }}">Từ chối</button>
                                            @elseif($course->status === 'approved')
                                                <button class="btn btn-info" data-status="suspended"
                                                   data-id="{{ $course->id }}">Khóa</button>
                                                <butotn class="btn btn-danger" data-url="delete"
                                                   data-id="{{ $course->id }}">Xóa</butotn>
                                            @elseif($course->status === 'suspended')
                                                <button class="btn btn-success" data-status="approved"
                                                   data-id="{{ $course->id }}">Mở khóa</button>
                                                <button class="btn btn-danger" data-url="delete"
                                                   data-id="{{ $course->id }}">Xóa</button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
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
                    targets: [0, 1, 2, 3, 4, 5, 7, 8]
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

        $('.statusSelect').change(function () {
            let url = $(this).data('url');
            let status = $(this).val();
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    status: status
                },
                success: function (response) {
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
        $('.del-button').on('click', function (e) {
            e.preventDefault();
            let url = $(this).data('url');
            let id = $(this).data('id');
            Swal.fire({
                title: 'Bạn có chắc chắn muốn xóa?',
                text: "Thao tác này không thể hoàn tác!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Có, xóa nó!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (response) {
                            if (response.status === 'success') {
                                Swal.fire({
                                    position: "center",
                                    icon: "success",
                                    title: response.msg,
                                    showConfirmButton: false,
                                    timer: 1000
                                });
                                $('#tr-' + id).remove();
                            }
                        }
                    });
                }
            })
        })
    </script>
@endsection
