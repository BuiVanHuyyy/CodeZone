@extends('admin.layout.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-xxl-4 col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="text-center p-3 overlay-box">
                                <div class="profile-photo">
                                    <img src="{{ $student->user->avatarPath() }}" width="100"
                                         class="img-fluid rounded-circle" alt="">
                                </div>
                                <h3 class="mt-3 mb-1 text-white">{{ $student->user->name }}</h3>
                                <p class="text-white mb-0">Học viên</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title">about me</h2>
                            </div>
                            <div class="card-body pb-0">
                                <p>{{ $student->bio }}</p>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                        <strong>Email</strong>
                                        <span class="mb-0">{{ $student->user->email }}</span>
                                    </li>
                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                        <strong>Ngày tham gia</strong>
                                        <span
                                            class="mb-0">{{ date_format(date_create($student->created_at), 'd/m/Y') }}</span>
                                    </li>
                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                        <strong>Trạng thái</strong>
                                        <span class="mb-0">{{ $student->getStatusName() }}</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-footer pt-0 pb-0 text-center">
                                <div class="row">
                                    <div class="col-4 pt-3 pb-3 border-right">
                                        <h3 class="mb-1 text-primary">150</h3>
                                        <span>Khóa học</span>
                                    </div>
                                    <div class="col-4 pt-3 pb-3 border-right">
                                        <h3 class="mb-1 text-primary">140</h3>
                                        <span>Học sinh</span>
                                    </div>
                                    <div class="col-4 pt-3 pb-3">
                                        <h3 class="mb-1 text-primary">45</h3>
                                        <span>Doanh thu</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-xxl-8 col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-pane fade active show">
                            <div class="profile-personal-info">
                                <div class="row my-4">
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                        <h5 class="f-w-500">Tên <span class="pull-right">:</span>
                                        </h5>
                                    </div>
                                    <div class="col-lg-9 col-md-8 col-sm-6 col-6">
                                        <span>{{ $student->name }}</span>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                        <h5 class="f-w-500">Nickname <span class="pull-right">:</span>
                                        </h5>
                                    </div>
                                    <div class="col-lg-9 col-md-8 col-sm-6 col-6">
                                        <span>{{ $student->nickname }}</span>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                        <h5 class="f-w-500">Giới tính <span class="pull-right">:</span>
                                        </h5>
                                    </div>
                                    <div class="col-lg-9 col-md-8 col-sm-6 col-6">
                                        <span>{{ $student->gender === 0 ? 'Nữ' : 'Nam' }}</span>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                        <h5 class="f-w-500">Số điện thoại <span class="pull-right">:</span>
                                        </h5>
                                    </div>
                                    <div class="col-lg-9 col-md-8 col-sm-6 col-6">
                                        <span>{{ $student->phone_number }}</span>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                        <h5 class="f-w-500">Email <span class="pull-right">:</span>
                                        </h5>
                                    </div>
                                    <div class="col-lg-9 col-md-8 col-sm-6 col-6">
                                        <span>{{ $student->user->email }}</span>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                        <h5 class="f-w-500">Tuổi <span class="pull-right">:</span>
                                        </h5>
                                    </div>
                                    <div class="col-lg-9 col-md-8 col-sm-6 col-6">
                                        <span>{{ \Carbon\Carbon::parse($student->dob)->diffInYears(\Carbon\Carbon::now()) }}</span>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <h5 class="f-w-500">Các khóa học <span class="pull-right">:</span>
                                        </h5>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-responsive-sm text-light">
                                                        <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Tên</th>
                                                            <th>Giá</th>
                                                            <th>Ngày tạo</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($student->courses as $course)
                                                            <tr>
                                                                <th>{{ $loop->iteration }}</th>
                                                                <td>
                                                                    <a href="{{ route('admin.course.show', $course->course->slug) }}">{{ $course->course->title }}</a>
                                                                </td>
                                                                <td class="color-primary">{{ number_format($course->price, 0) }}</td>
                                                                <td>{{ date_format(date_create($course->created_at), 'd/m/Y') }}</td>
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
                </div>
            </div>
        </div>

    </div>
@endsection
