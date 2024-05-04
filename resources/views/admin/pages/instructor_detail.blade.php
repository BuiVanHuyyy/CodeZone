@extends('admin.layout.master')

@section('content')
    @php
        $statusMapping = [
            'pending' => 'Chờ phê duyệt',
            'suspended' => 'Khóa',
            'active' => 'Hoạt động',
        ];
        $statusColor = [
            'pending' => 'primary',
            'rejected' => 'danger',
            'approved' => 'success',
        ];
    @endphp
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Profile giảng viên</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            </div>
        </div>

        <div class="row">
            <div class="col-xl-3 col-xxl-4 col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="text-center p-3 overlay-box"
                                 style="background-image: url({{ asset('admin_assets/images/big/img1.jpg') }});">
                                <div class="profile-photo">
                                    <img src="{{ $instructor->avatar ?? asset('client_assets/images/avatar/default_avatar.png') }}" width="100"
                                         class="img-fluid rounded-circle" alt="">
                                </div>
                                <h3 class="mt-3 mb-1 text-white">{{ $instructor->name }}</h3>
                                <p class="text-white mb-0">{{ $instructor->current_job }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title">Tiểu sử</h2>
                            </div>
                            <div class="card-body pb-0">
                                <p>{{ $instructor->bio }}</p>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                        <strong>Số điện thoại</strong>
                                        <span class="mb-0">{{ $instructor->phone_number }}</span>
                                    </li>
                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                        <strong>Email</strong>
                                        <span class="mb-0">{{ $instructor->user->email }}</span>
                                    </li>
                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                        <strong>Ngày tham gia</strong>
                                        <span class="mb-0">{{ date_format(date_create($instructor->created_at), 'd/m/Y') }}</span>
                                    </li>
                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                        <strong>Trạng thái</strong>
                                        <span class="mb-0">{{ $statusMapping[$instructor->user->status] }}</span>
                                    </li>
                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                        <strong>Tổng doanh thu</strong>
                                        <span class="mb-0">₫ {{ number_format($totalIncome, 0) }}</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-footer pt-0 pb-0 text-center">
                                <div class="row">
                                    <div class="col-4 pt-3 pb-3 border-right">
                                        <h3 class="mb-1 text-primary">{{ number_format($instructor->courses->count(), 0) }}</h3>
                                        <span>Khóa học</span>
                                    </div>
                                    <div class="col-4 pt-3 pb-3 border-right">
                                        <h3 class="mb-1 text-primary">{{ number_format($totalStudents, 0) }}</h3>
                                        <span>Học sinh</span>
                                    </div>
                                    <div class="col-4 pt-3 pb-3 border-right">
                                        <h3 class="mb-1 text-primary">{{ number_format($rating, 1) }}<i class="fa-solid fa-star" style="color: #FFD43B;"></i></h3>
                                        <span>Rating</span>
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
                        <div class="profile-tab">
                            <div class="custom-tab-1">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a href="#about-me" data-bs-toggle="tab" class="nav-link active show">Profile cá nhân</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="about-me" class="tab-pane fade active show">
                                        <div class="profile-personal-info">
                                            <div class="row my-4">
                                                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                                    <h5 class="f-w-500">Tên <span class="pull-right">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-lg-9 col-md-8 col-sm-6 col-6">
                                                    <span>{{ $instructor->name }}</span>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                                    <h5 class="f-w-500">Nickname <span class="pull-right">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-lg-9 col-md-8 col-sm-6 col-6">
                                                    <span>{{ $instructor->nickname }}</span>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                                    <h5 class="f-w-500">Giới tính <span class="pull-right">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-lg-9 col-md-8 col-sm-6 col-6">
                                                    <span>{{ $instructor->gender === 0 ? 'Nữ' : 'Nam' }}</span>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                                    <h5 class="f-w-500">Tuổi <span class="pull-right">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-lg-9 col-md-8 col-sm-6 col-6">
                                                    <span>{{ \Carbon\Carbon::parse($instructor->dob)->diffInYears(\Carbon\Carbon::now()) }}</span>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                                    <h5 class="f-w-500">Học vấn <span class="pull-right">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-lg-9 col-md-8 col-sm-6 col-6">
                                                    <span>{{ $instructor->education }}</span>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                                    <h5 class="f-w-500">CV <span class="pull-right">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-lg-9 col-md-8 col-sm-6 col-6">
                                                    @if($instructor->cv_upload != null)
                                                        <a href="{{ $instructor->cv_upload }}" target="_blank">Xem CV</a>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <h5 class="f-w-500">Các khóa học:
                                                    </h5>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="table-responsive">
                                                                <table class="table table-responsive-sm">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>ID</th>
                                                                        <th>Tên</th>
                                                                        <th>Trạng thái</th>
                                                                        <th>Học viên</th>
                                                                        <th>Giá</th>
                                                                        <th>Ngày tạo</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    @if($instructor->courses->count() === 0)
                                                                        <tr>
                                                                            <td class="text-center" colspan="6">Giảng viên này chưa tạo khóa học nào</td>
                                                                        </tr>
                                                                    @else
                                                                        @foreach($instructor->courses as $course)
                                                                            <tr>
                                                                                <th><a href="{{ route('admin.course.show', ['course' => $course]) }}">{{ $course->id }}</a></th>
                                                                                <td><a href="{{ route('admin.course.show', ['course' => $course]) }}">{{ $course->title }}</a></td>
                                                                                <td><span class="badge badge-{{$statusColor[$course->status]}}">{{ $course->status }}</span></td>
                                                                                <td>{{$course->enrollments->count()}}</td>
                                                                                <td class="color-primary">₫ {{ number_format($course->price, 0) }}</td>
                                                                                <td>{{ date_format(date_create($course->created_at), 'd/m/Y') }}</td>
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
                                            <div class="row mb-4">
                                                <div class="reviews-list d-flex">
                                                    <div class="row">
                                                        <h3 class="f-w-500 mb-3">{{ number_format($rating, 1) }}<i class="fa-solid fa-star" style="color: #FFD43B;"></i> rating giảng viên -  ({{ $reviews->count() }} ratings)</h3>
                                                        @if($reviews->count() === 0)
                                                            <p>Giảng viên này chưa có reviews</p>
                                                        @endif
                                                        @foreach($reviews->sortByDesc('created_at') as $review)
                                                                <div class="col-lg-6 review-item">
                                                                    <div class="top d-flex">
                                                                        <div class="thumbnail">
                                                                            <a href="{{ route('admin.student.show', ['student' => $review->user]) }}">
                                                                                <img class="circle" src="{{ $review->user->students->avatar ?? asset('client_assets/images/avatar/default-avatar.png') }}" alt="">
                                                                            </a>
                                                                        </div>
                                                                        <div class="author">
                                                                            <h4><a href="{{ route('admin.student.show', ['student' => $review->user]) }}">{{ $review->user->name }}</a></h4>
                                                                            <p>
                                                                                @for($i = 1; $i <= $review->rating; $i++)
                                                                                    <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                                                                @endfor
                                                                                @for($i = 1; $i <= 5 - $review->rating; $i++)
                                                                                    <i class="fa-solid fa-star"></i>
                                                                                @endfor
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="content">
                                                                        <p>{{ $review->content }}</p>
                                                                    </div>
                                                                    <div class="bottom">
                                                                        <button class="like-btn">
                                                                            <i class="fa-regular fa-thumbs-up"></i>
                                                                            {{ $review->like_count }}
                                                                        </button>
                                                                        <button class="dislike-btn">
                                                                            <i class="fa-regular fa-thumbs-down"></i>
                                                                            {{ $review->dislike_count }}
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            @endforeach
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

    </div>
@endsection
