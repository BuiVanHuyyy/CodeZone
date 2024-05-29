@extends('admin.layout.master')
@section('content')
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Danh sách khóa học </h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form method="get" action="{{ route('admin.course.index') }}">
                                    <div class="d-flex">
                                        <select name="status" class="w-50" aria-label="Default select example">
                                            <option selected>Lọc theo status</option>
                                            <option {{ $status == 'pending' ? 'selected' : '' }} value="pending">Chờ xác thực</option>
                                            <option {{ $status == 'approved' ? 'selected' : '' }} value="approved">Xác thực</option>
                                            <option {{ $status == 'rejected' ? 'selected' : '' }} value="rejected">Từ chối</option>
                                        </select>
                                        <button class="w-25 btn btn-primary">Lọc</button>
                                    </div>
                                </form>
                                <table id="dataTable" class="display" style="min-width: 1200px">
                                    <thead>
                                    <tr class="text-center">
                                        <th>Id</th>
                                        <th>Tên</th>
                                        <th>Giá</th>
                                        <th>Học viên</th>
                                        <th>Tác giả</th>
                                        <th>Trạng thái</th>
                                        <th>Chuyên ngành</th>
                                        <th>Thời gian tạo</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($courses->sortByDesc('created_at') as $course)
                                        <tr id="tr-{{ $course->id }}" class="text-center">
                                            <td>#{{ $course->id }}</td>
                                            <td>
                                                <a href="{{ route('admin.course.show', ['course' => $course]) }}"><strong>{{ $course->title }}</strong></a>
                                            </td>
                                            <td>₫ {{ number_format($course->price, 0) }}</td>
                                            <td>{{ count($course->students) }}</td>
                                            <td>
                                                <a href="{{ route('admin.instructor.show', ['instructor' => $course->author]) }}"><strong>{{ $course->author->name }}</strong></a>
                                            </td>
                                            <td>
                                                <form>
                                                    <select data-url="{{route('admin.update-course-status', [$course->id])}}" class="statusSelect form-select" aria-label="Status select">
                                                        <option
                                                            {{ $course->status === 'pending' ? 'selected' : '' }} value="pending">Chờ phê duyệt
                                                        </option>
                                                        <option
                                                            {{ $course->status === 'rejected' ? 'selected' : '' }} value="rejected">
                                                            Từ chối
                                                        </option>
                                                        <option
                                                            {{ $course->status === 'approved' ? 'selected' : '' }} value="approved">
                                                            Xác thực
                                                        </option>
                                                    </select>
                                                </form>
                                            </td>
                                            <td>{{ $course->category->title }}</td>
                                            <td>{{ date_format(date_create($course->created_at), 'd/m/Y') }}</td>
                                            <td>
                                                <button data-id="{{ $course->id }}" data-url="{{ route('admin.course.destroy', [$course->id]) }}" class="del-button btn btn-sm btn-danger"><i class="la la-trash-o"></i></button>
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
                        success: function(response) {
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
