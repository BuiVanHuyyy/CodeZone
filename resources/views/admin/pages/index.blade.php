@extends('admin.layout.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-xxl-12 col-sm-12">
                <div class="row">
                    <div class="col-xl-6 col-xxl-3 col-sm-6">
                        <div class="widget-stat card">
                            <div class="card-body">
                                <h4 class="card-title">Tổng số học viên</h4>
                                <h3>{{ number_format($totalStudent->count(), 0) }}</h3>
                                <div class="progress mb-2">
                                    <div class="progress-bar progress-animated bg-primary" style="width: 80%"></div>
                                </div>
                                <small>80% Increase in 20 Days</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-xxl-3 col-sm-6">
                        <div class="widget-stat card">
                            <div class="card-body">
                                <h4 class="card-title">Tổng số giảng viên</h4>
                                <h3>{{ number_format($totalInstructor->where('user.status', 'active')->count(), 0) }}</h3>
                                <div class="progress mb-2">
                                    <div class="progress-bar progress-animated bg-warning" style="width: 50%"></div>
                                </div>
                                <small>50% Increase in 25 Days</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-xxl-3 col-sm-6">
                        <div class="widget-stat card">
                            <div class="card-body">
                                <h4 class="card-title">Tổng số khóa học</h4>
                                <h3>{{ number_format($totalCourse->where('status', 'approved')->count(), 0) }}</h3>
                                <div class="progress mb-2">
                                    <div class="progress-bar progress-animated bg-red" style="width: 76%"></div>
                                </div>
                                <small>76% Increase in 20 Days</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-xxl-3 col-sm-6">
                        <div class="widget-stat card">
                            <div class="card-body">
                                <h4 class="card-title">Fees Collection</h4>
                                <h3>₫ {{ number_format($totalMoney, 0) }}</h3>
                                <div class="progress mb-2">
                                    <div class="progress-bar progress-animated bg-success" style="width: 30%"></div>
                                </div>
                                <small>30% Increase in 30 Days</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-xxl-6 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Số lượng học viên đăng ký mới hằng tháng</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="monthlyNewStudentsLineChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-xxl-6 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Số lượng giảng viên đăng ký mới hằng tháng</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="monthlyNewInstructorsLineChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-xxl-6 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Số lượng khóa học tạo mới hằng tháng</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="monthlyNewCoursesLineChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-xxl-6 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Số lượng đăng ký khóa học hằng tháng</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="monthlyNewEnrollmentsLineChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-xxl-4 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Các giảng viên đang chờ sử lý</h4>
                    </div>
                    <div class="card-body">
                        <div id="pendingInstructors" class="widget-todo dz-scroll" style="height:370px;">
                            <ul class="timeline">
                                @if($totalInstructor->where('user.status', 'pending')->count() > 0)
                                    @foreach($totalInstructor->where('user.status', 'pending') as $instructor)
                                        <li class="border-bottom py-3">
                                            <div class="media">
                                                <div class="image-wrapper">
                                                    <img class="rounded-circle" width="50"
                                                         src="{{ $instructor->user->avatarPath() }}"
                                                         alt="{{ $instructor->user->name }}">
                                                </div>
                                                <div
                                                    class="media-body d-flex justify-content-between align-items-center ms-3">
                                                    <div>
                                                        <h6>{{ $instructor->user->name }}</h6>
                                                        <a class="m-0 pointer" target="_blank"
                                                           href="{{ asset(env('CV_FOLDER_PATH') . $instructor->cv_upload) }}">Xem
                                                            CV</a>
                                                    </div>
                                                    <div class="dropdown custom-dropdown mb-0 pointer">
                                                        <div data-bs-toggle="dropdown">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </div>
                                                        <div class="dropdown-menu dropdown-menu-end"
                                                             data-url="{{ route('admin.update-instructor-status', encrypt($instructor->id)) }}">
                                                            <button title="Phê duyệt" class="btn dropdown-item" data-type="active">Phê duyệt
                                                            </button>
                                                            <button title="Xóa" class="btn dropdown-item text-danger" data-type="rejected">Từ chối
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                @else
                                    <li>
                                        <p>Không có giảng viên nào</p>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-xxl-4 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Các khóa học chờ sử lý</h4>
                    </div>
                    <div class="card-body">
                        <div id="pendingCourses" class="widget-todo dz-scroll" style="height:370px;">
                            <ul class="timeline">
                                @if($totalCourse->where('status', 'pending')->count() > 0)
                                    @foreach($totalCourse->where('status', 'pending') as $course)
                                        <li class="border-bottom py-3">
                                            <div class="media">
                                                <div class="image-wrapper">
                                                    <img class="rounded-sm" width="50"
                                                         src="{{ $course->thumbnailPath() }}"
                                                         alt="{{ $course->title }} thumbnail">
                                                </div>
                                                <div
                                                    class="media-body d-flex justify-content-between align-items-center ms-3">
                                                    <div>
                                                        <h6>{{ $course->title }}</h6>
                                                        <p class="mb-0">
                                                            Tạo bỡi <a class="m-0 pointer" target="_blank"
                                                                       href="">{{ $course->author->user->name }}</a>
                                                        </p>
                                                    </div>
                                                    <div class="dropdown custom-dropdown mb-0 pointer">
                                                        <div data-bs-toggle="dropdown">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </div>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="javascript:void(0);">Phê
                                                                duyệt</a>
                                                            <a class="dropdown-item text-danger"
                                                               href="javascript:void(0);">Từ chối</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                @else
                                    <li>
                                        <p>Không có khóa học nào</p>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-xxl-4 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Các bài blog chờ sử lý</h4>
                    </div>
                    <div class="card-body">
                        <div id="pendingBlogs" class="widget-todo dz-scroll" style="height:370px;">
                            <ul class="timeline">
                                @if($totalBlog->where('status', 'pending')->count() > 0)
                                    @foreach($totalBlog->where('status', 'pending') as $blog)
                                        <li class="border-bottom py-3">
                                            <div class="media">
                                                <div class="image-wrapper">
                                                    <img class="rounded-sm" width="50"
                                                         src="{{ $blog->thumbnailPath() }}"
                                                         alt="{{ $blog->title }} thumbnail">
                                                </div>
                                                <div
                                                    class="media-body d-flex justify-content-between align-items-center ms-3">
                                                    <div>
                                                        <h6>{{ $blog->title }}</h6>
                                                        <p class="mb-0">
                                                            Tạo bỡi <a class="m-0 pointer" target="_blank"
                                                                       href="">{{ $blog->author->user->name }}</a>
                                                        </p>
                                                    </div>
                                                    <div class="dropdown custom-dropdown mb-0 pointer">
                                                        <div data-bs-toggle="dropdown">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </div>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="javascript:void(0);">Phê
                                                                duyệt</a>
                                                            <a class="dropdown-item text-danger"
                                                               href="javascript:void(0);">Từ chối</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                @else
                                    <li>
                                        <p>Không có bài blog nào</p>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-xxl-4 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Các giảng nổi bật</h4>
                    </div>
                    <div class="card-body">
                        <div id="topInstructors" class="widget-todo dz-scroll" style="height:370px;">
                            <ul class="timeline">
                                @if($totalInstructor->where('status', 'active')->count() > 0)
                                    @foreach($totalInstructor->where('status', 'approved') as  $instructor)
                                        <li>
                                            <div class="timeline-badge primary"></div>
                                            <a class="timeline-panel text-muted mb-3 d-flex align-items-center"
                                               href="#">
                                                <img class="rounded-circle" alt="image" width="50"
                                                     src="{{ $instructor->user->avatarPath() }}">
                                                <div class="col">
                                                    <h5 class="mb-1">{{ $instructor->user->name }}</h5>
                                                    <small
                                                        class="d-block">{{ $instructor->created_at->format('d M Y - H:i A') }}</small>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                @else
                                    <li>
                                        <p>Không có giảng viên nào</p>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-xxl-4 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Các khóa học nổi bật</h4>
                    </div>
                    <div class="card-body">
                        <div id="topCourses" class="widget-todo dz-scroll" style="height:370px;">
                            <ul class="timeline">
                                <li>
                                    <div class="timeline-badge primary"></div>
                                    <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                        <img class="rounded-circle" alt="image" width="50" src="">
                                        <div class="col">
                                            <h5 class="mb-1">Dr sultads Send you Photo</h5>
                                            <small class="d-block">29 July 2022 - 02:26 PM</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="timeline-badge warning"></div>
                                    <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                        <img class="rounded-circle" alt="image" width="50" src="">
                                        <div class="col">
                                            <h5 class="mb-1">Resport created successfully</h5>
                                            <small class="d-block">29 July 2022 - 02:26 PM</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="timeline-badge danger"></div>
                                    <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                        <img class="rounded-circle" alt="image" width="50" src="">
                                        <div class="col">
                                            <h5 class="mb-1">Reminder : Treatment Time!</h5>
                                            <small class="d-block">29 July 2022 - 02:26 PM</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="timeline-badge success"></div>
                                    <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                        <img class="rounded-circle" alt="image" width="50" src="">
                                        <div class="col">
                                            <h5 class="mb-1">Dr sultads Send you Photo</h5>
                                            <small class="d-block">29 July 2022 - 02:26 PM</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="timeline-badge warning"></div>
                                    <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                        <img class="rounded-circle" alt="image" width="50" src="">
                                        <div class="col">
                                            <h5 class="mb-1">Resport created successfully</h5>
                                            <small class="d-block">29 July 2022 - 02:26 PM</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="timeline-badge dark"></div>
                                    <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                        <img class="rounded-circle" alt="image" width="50" src="">
                                        <div class="col">
                                            <h5 class="mb-1">Reminder : Treatment Time!</h5>
                                            <small class="d-block">29 July 2022 - 02:26 PM</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="timeline-badge info"></div>
                                    <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                        <img class="rounded-circle" alt="image" width="50" src="">
                                        <div class="col">
                                            <h5 class="mb-1">Dr sultads Send you Photo</h5>
                                            <small class="d-block">29 July 2022 - 02:26 PM</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="timeline-badge danger"></div>
                                    <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                        <img class="rounded-circle" alt="image" width="50" src="">
                                        <div class="col">
                                            <h5 class="mb-1">Resport created successfully</h5>
                                            <small class="d-block">29 July 2022 - 02:26 PM</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="timeline-badge success"></div>
                                    <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                        <img class="rounded-circle" alt="image" width="50" src="">
                                        <div class="col">
                                            <h5 class="mb-1">Reminder : Treatment Time!</h5>
                                            <small class="d-block">29 July 2022 - 02:26 PM</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="timeline-badge warning"></div>
                                    <a class="timeline-panel text-muted d-flex align-items-center" href="#">
                                        <img class="rounded-circle" alt="image" width="50" src="">
                                        <div class="col">
                                            <h5 class="mb-1">Dr sultads Send you Photo</h5>
                                            <small class="d-block">29 July 2022 - 02:26 PM</small>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-xxl-4 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Các bài blog nổi bật</h4>
                    </div>
                    <div class="card-body">
                        <div id="topBlogs" class="widget-todo dz-scroll" style="height:370px;">
                            <ul class="timeline">
                                <li>
                                    <div class="timeline-badge primary"></div>
                                    <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                        <img class="rounded-circle" alt="image" width="50" src="">
                                        <div class="col">
                                            <h5 class="mb-1">Dr sultads Send you Photo</h5>
                                            <small class="d-block">29 July 2022 - 02:26 PM</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="timeline-badge warning"></div>
                                    <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                        <img class="rounded-circle" alt="image" width="50" src="">
                                        <div class="col">
                                            <h5 class="mb-1">Resport created successfully</h5>
                                            <small class="d-block">29 July 2022 - 02:26 PM</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="timeline-badge danger"></div>
                                    <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                        <img class="rounded-circle" alt="image" width="50" src="">
                                        <div class="col">
                                            <h5 class="mb-1">Reminder : Treatment Time!</h5>
                                            <small class="d-block">29 July 2022 - 02:26 PM</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="timeline-badge success"></div>
                                    <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                        <img class="rounded-circle" alt="image" width="50" src="">
                                        <div class="col">
                                            <h5 class="mb-1">Dr sultads Send you Photo</h5>
                                            <small class="d-block">29 July 2022 - 02:26 PM</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="timeline-badge warning"></div>
                                    <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                        <img class="rounded-circle" alt="image" width="50" src="">
                                        <div class="col">
                                            <h5 class="mb-1">Resport created successfully</h5>
                                            <small class="d-block">29 July 2022 - 02:26 PM</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="timeline-badge dark"></div>
                                    <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                        <img class="rounded-circle" alt="image" width="50" src="">
                                        <div class="col">
                                            <h5 class="mb-1">Reminder : Treatment Time!</h5>
                                            <small class="d-block">29 July 2022 - 02:26 PM</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="timeline-badge info"></div>
                                    <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                        <img class="rounded-circle" alt="image" width="50" src="">
                                        <div class="col">
                                            <h5 class="mb-1">Dr sultads Send you Photo</h5>
                                            <small class="d-block">29 July 2022 - 02:26 PM</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="timeline-badge danger"></div>
                                    <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                        <img class="rounded-circle" alt="image" width="50" src="">
                                        <div class="col">
                                            <h5 class="mb-1">Resport created successfully</h5>
                                            <small class="d-block">29 July 2022 - 02:26 PM</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="timeline-badge success"></div>
                                    <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                        <img class="rounded-circle" alt="image" width="50" src="">
                                        <div class="col">
                                            <h5 class="mb-1">Reminder : Treatment Time!</h5>
                                            <small class="d-block">29 July 2022 - 02:26 PM</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="timeline-badge warning"></div>
                                    <a class="timeline-panel text-muted d-flex align-items-center" href="#">
                                        <img class="rounded-circle" alt="image" width="50" src="">
                                        <div class="col">
                                            <h5 class="mb-1">Dr sultads Send you Photo</h5>
                                            <small class="d-block">29 July 2022 - 02:26 PM</small>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        let draw = Chart.controllers.line.__super__.draw;
        if (jQuery('#monthlyNewStudentsLineChart').length > 0) {
            const monthlyNewStudentsLineChart = document.getElementById("monthlyNewStudentsLineChart").getContext('2d');

            Chart.controllers.line = Chart.controllers.line.extend({
                draw: function () {
                    draw.apply(this, arguments);
                    let nk = this.chart.chart.ctx;
                    let _stroke = nk.stroke;
                    nk.stroke = function () {
                        nk.save();
                        nk.shadowColor = 'rgba(213,214,225, .2)';
                        nk.shadowBlur = 10;
                        nk.shadowOffsetX = 0;
                        nk.shadowOffsetY = 10;
                        _stroke.apply(this, arguments)
                        nk.restore();
                    }
                }
            });

            monthlyNewStudentsLineChart.height = 100;
            let max = {{ $studentMaxValue }};
            new Chart(monthlyNewStudentsLineChart, {
                type: 'line',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels: @json($labels),
                    datasets: [
                        {
                            label: "Số lượng học viên",
                            data: @json($dataStudent),
                            borderColor: 'rgba(237,238,255, 1)',
                            borderWidth: "2",
                            backgroundColor: 'transparent',
                            pointBackgroundColor: 'rgba(237,238,255, 1)'
                        }
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                max: max,
                                min: 0,
                                stepSize: max / 10,
                                padding: 10
                            }
                        }],
                        xAxes: [{
                            ticks: {
                                padding: 5
                            }
                        }]
                    }
                }
            });
        }

        if (jQuery('#monthlyNewInstructorsLineChart').length > 0) {
            const monthlyNewInstructorsLineChart = document.getElementById("monthlyNewInstructorsLineChart").getContext('2d');
            let max = {{ $instructorMaxValue }}
                Chart.controllers.line = Chart.controllers.line.extend({
                draw: function () {
                    draw.apply(this, arguments);
                    let nk = this.chart.chart.ctx;
                    let _stroke = nk.stroke;
                    nk.stroke = function () {
                        nk.save();
                        nk.shadowColor = 'rgba(213,214,225, .2)';
                        nk.shadowBlur = 10;
                        nk.shadowOffsetX = 0;
                        nk.shadowOffsetY = 10;
                        _stroke.apply(this, arguments)
                        nk.restore();
                    }
                }
            });

            monthlyNewInstructorsLineChart.height = 100;

            new Chart(monthlyNewInstructorsLineChart, {
                type: 'line',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels: @json($labels),
                    datasets: [
                        {
                            label: "Số lượng giảng viên",
                            data: @json($dataInstructor),
                            borderColor: 'rgba(237,238,255, 1)',
                            borderWidth: "2",
                            backgroundColor: 'transparent',
                            pointBackgroundColor: 'rgba(237,238,255, 1)'
                        }
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                max: max,
                                min: 0,
                                stepSize: max / 10,
                                padding: 10
                            }
                        }],
                        xAxes: [{
                            ticks: {
                                padding: 5
                            }
                        }]
                    }
                }
            });
        }

        if (jQuery('#monthlyNewCoursesLineChart').length > 0) {
            const monthlyNewCoursesLineChart = document.getElementById("monthlyNewCoursesLineChart").getContext('2d');
            let max = {{ $courseMaxValue }}
                Chart.controllers.line = Chart.controllers.line.extend({
                draw: function () {
                    draw.apply(this, arguments);
                    let nk = this.chart.chart.ctx;
                    let _stroke = nk.stroke;
                    nk.stroke = function () {
                        nk.save();
                        nk.shadowColor = 'rgba(213,214,225, .2)';
                        nk.shadowBlur = 10;
                        nk.shadowOffsetX = 0;
                        nk.shadowOffsetY = 10;
                        _stroke.apply(this, arguments)
                        nk.restore();
                    }
                }
            });

            monthlyNewCoursesLineChart.height = 100;

            new Chart(monthlyNewCoursesLineChart, {
                type: 'line',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels: @json($labels),
                    datasets: [
                        {
                            label: "Số lượng khóa học",
                            data: @json($dataCourse),
                            borderColor: 'rgba(237,238,255, 1)',
                            borderWidth: "2",
                            backgroundColor: 'transparent',
                            pointBackgroundColor: 'rgba(237,238,255, 1)'
                        }
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                max: max,
                                min: 0,
                                stepSize: max / 10,
                                padding: 10
                            }
                        }],
                        xAxes: [{
                            ticks: {
                                padding: 5
                            }
                        }]
                    }
                }
            });
        }

        if (jQuery('#monthlyNewEnrollmentsLineChart').length > 0) {
            const monthlyNewEnrollmentsLineChart = document.getElementById("monthlyNewEnrollmentsLineChart").getContext('2d');
            let max = {{ $enrollmentMaxValue }}
                Chart.controllers.line = Chart.controllers.line.extend({
                draw: function () {
                    draw.apply(this, arguments);
                    let nk = this.chart.chart.ctx;
                    let _stroke = nk.stroke;
                    nk.stroke = function () {
                        nk.save();
                        nk.shadowColor = 'rgba(213,214,225, .2)';
                        nk.shadowBlur = 10;
                        nk.shadowOffsetX = 0;
                        nk.shadowOffsetY = 10;
                        _stroke.apply(this, arguments)
                        nk.restore();
                    }
                }
            });

            monthlyNewEnrollmentsLineChart.height = 100;

            new Chart(monthlyNewEnrollmentsLineChart, {
                type: 'line',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels: @json($labels),
                    datasets: [
                        {
                            label: "Số lượng đăng ký",
                            data: @json($dataEnrollment),
                            borderColor: 'rgba(237,238,255, 1)',
                            borderWidth: "2",
                            backgroundColor: 'transparent',
                            pointBackgroundColor: 'rgba(237,238,255, 1)'
                        }
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                max: max,
                                min: 0,
                                stepSize: max / 10,
                                padding: 10
                            }
                        }],
                        xAxes: [{
                            ticks: {
                                padding: 5
                            }
                        }]
                    }
                }
            });
        }

        $('.btn').on('click', function () {
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
                                    button.closest('li').remove()
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
                }
            )
            ;
        });
    </script>
@endsection
