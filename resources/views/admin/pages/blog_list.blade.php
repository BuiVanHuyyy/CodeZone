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
                                <form method="get" action="{{ route('admin.blog.index') }}">
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
                                        <th>Tiêu đề</th>
                                        <th>Tác giả</th>
                                        <th>Trạng thái</th>
                                        <th>Thời gian tạo</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($blogs->sortByDesc('created_at') as $blog)
                                        <tr class="text-center">
                                            <td>#{{ $blog->id }}</td>
                                            <td>
                                                <a href="{{ route('admin.blog.show', ['blog' => $blog]) }}"><strong>{{ $blog->title }}</strong></a>
                                            </td>
                                            <td><a href="{{ route('admin.instructor.show', ['instructor' => $blog->author]) }}">{{ $blog->author->name }}</a></td>
                                            <td>
                                                <form>
                                                    <select data-url="{{route('admin.update-blog-status', [$blog->id])}}" class="statusSelect form-select" aria-label="Status select">
                                                        <option
                                                            {{ $blog->status === 'pending' ? 'selected' : '' }} value="pending">Chờ phê duyệt
                                                        </option>
                                                        <option
                                                            {{ $blog->status === 'rejected' ? 'selected' : '' }} value="rejected">
                                                            Từ chối
                                                        </option>
                                                        <option
                                                            {{ $blog->status === 'approved' ? 'selected' : '' }} value="approved">
                                                            Xác thực
                                                        </option>
                                                    </select>
                                                </form>
                                            </td>
                                            <td>{{ date_format(date_create($blog->created_at), 'd/m/Y') }}</td>
                                            <td>
                                                <a href="javascript:void(0);" class="btn btn-sm btn-primary"><i
                                                        class="la la-pencil"></i></a>
                                                <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i
                                                        class="la la-trash-o"></i></a>
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
    </script>
@endsection
