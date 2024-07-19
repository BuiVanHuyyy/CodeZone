@extends('admin.layout.master')
@section('content')
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Danh sách các bài blog </h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="dataTable" class="display">
                                    <thead>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Tiêu đề</th>
                                        <th>Tác giả</th>
                                        <th>Trạng thái</th>
                                        <th>Thời gian tạo</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($blogs->sortByDesc('created_at') as $blog)
                                        @php
                                            $idEncrypted = encrypt($blog->id);
                                        @endphp
                                        <tr id="tr-{{  $blog->slug }}" class="text-center">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <a href="{{ route('admin.blog.show', $blog->slug) }}"><strong>{{ $blog->title }}</strong></a>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.instructor.show', $blog->author->user->slug) }}">{{ $blog->author->user->name }}</a>
                                            </td>
                                            <td>
                                                <select
                                                    data-url="{{route('admin.update-blog-status', $idEncrypted)}}"
                                                    class="form-select p-0 statusSelect" aria-label="Status select">
                                                    @if($blog->status === 'pending')
                                                        <option selected value="pending">Chờ phê duyệt</option>
                                                    @endif
                                                    <option
                                                        {{ $blog->status === 'rejected' ? 'selected' : '' }} value="rejected">
                                                        Từ chối
                                                    </option>
                                                    <option
                                                        {{ $blog->status === 'approved' ? 'selected' : '' }} value="approved">
                                                        Xác thực
                                                    </option>
                                                    @if($blog->status !== 'pending')
                                                        <option
                                                            {{ $blog->status === 'suspended' ? 'selected' : '' }} value="suspended">
                                                            Khoá
                                                        </option>
                                                    @endif
                                                </select>
                                            </td>
                                            <td>{{ date_format(date_create($blog->created_at), 'd/m/Y') }}</td>
                                            <td>
                                                <button data-url="{{ route('admin.blog.destroy', $idEncrypted) }}"
                                                        class="del-button btn btn-sm btn-danger"><i
                                                        class="la la-trash-o"></i></button>
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
@endsection
@section('scripts')
    <script>
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
                    targets: [0, 1, 2, 4]
                }, {
                    searchPanes: {
                        show: true,
                        collapse: false,
                        controls: false
                    },
                    targets: [3]
                }
            ]
        });

        $('.del-button').on('click', function () {
            let url = $(this).data('url');
            Swal.fire({
                title: 'Bạn có chắc chắn muốn xóa?',
                text: "Thao tác này không thể hoàn tác!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Có, xóa nó!',
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (response) {
                            Swal.fire({
                                position: "center",
                                icon: "success",
                                title: response.msg,
                                showConfirmButton: false,
                                timer: 1000
                            });
                            $('#tr-' + response.slug).remove();
                        },
                        fail: function (response) {
                            Swal.fire({
                                position: "center",
                                icon: "error",
                                title: response.msg,
                                showConfirmButton: false,
                                timer: 1000
                            });
                        }
                    });
                }
            })
        })
    </script>
@endsection
