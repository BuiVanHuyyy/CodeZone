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
                            <h3>{{ number_format($totalStudent, 0) }}</h3>
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
                            <h3>{{ number_format($totalInstructor, 0) }}</h3>
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
                            <h3>{{ number_format($totalCourse) }}</h3>
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
                            <li>
                                <div class="timeline-badge primary"></div>
                                <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                    <img class="rounded-circle" alt="image" width="50" src="images/avatar/1.jpg">
                                    <div class="col">
                                        <h5 class="mb-1">Dr sultads Send you Photo</h5>
                                        <small class="d-block">29 July 2022 - 02:26 PM</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge warning"></div>
                                <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                    <img class="rounded-circle" alt="image" width="50" src="images/avatar/2.jpg">
                                    <div class="col">
                                        <h5 class="mb-1">Resport created successfully</h5>
                                        <small class="d-block">29 July 2022 - 02:26 PM</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge danger"></div>
                                <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                    <img class="rounded-circle" alt="image" width="50" src="images/avatar/3.jpg">
                                    <div class="col">
                                        <h5 class="mb-1">Reminder : Treatment Time!</h5>
                                        <small class="d-block">29 July 2022 - 02:26 PM</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge success"></div>
                                <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                    <img class="rounded-circle" alt="image" width="50" src="images/avatar/1.jpg">
                                    <div class="col">
                                        <h5 class="mb-1">Dr sultads Send you Photo</h5>
                                        <small class="d-block">29 July 2022 - 02:26 PM</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge warning"></div>
                                <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                    <img class="rounded-circle" alt="image" width="50" src="images/avatar/2.jpg">
                                    <div class="col">
                                        <h5 class="mb-1">Resport created successfully</h5>
                                        <small class="d-block">29 July 2022 - 02:26 PM</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge dark"></div>
                                <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                    <img class="rounded-circle" alt="image" width="50" src="images/avatar/3.jpg">
                                    <div class="col">
                                        <h5 class="mb-1">Reminder : Treatment Time!</h5>
                                        <small class="d-block">29 July 2022 - 02:26 PM</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge info"></div>
                                <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                    <img class="rounded-circle" alt="image" width="50" src="images/avatar/1.jpg">
                                    <div class="col">
                                        <h5 class="mb-1">Dr sultads Send you Photo</h5>
                                        <small class="d-block">29 July 2022 - 02:26 PM</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge danger"></div>
                                <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                    <img class="rounded-circle" alt="image" width="50" src="images/avatar/2.jpg">
                                    <div class="col">
                                        <h5 class="mb-1">Resport created successfully</h5>
                                        <small class="d-block">29 July 2022 - 02:26 PM</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge success"></div>
                                <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                    <img class="rounded-circle" alt="image" width="50" src="images/avatar/3.jpg">
                                    <div class="col">
                                        <h5 class="mb-1">Reminder : Treatment Time!</h5>
                                        <small class="d-block">29 July 2022 - 02:26 PM</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge warning"></div>
                                <a class="timeline-panel text-muted d-flex align-items-center" href="#">
                                    <img class="rounded-circle" alt="image" width="50" src="images/avatar/1.jpg">
                                    <div class="col">
                                        <h5 class="mb-1">Dr sultads sss</h5>
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
                    <h4 class="card-title">Các khóa học chờ sử lý</h4>
                </div>
                <div class="card-body">
                    <div id="pendingCourses" class="widget-todo dz-scroll" style="height:370px;">
                        <ul class="timeline">
                            <li>
                                <div class="timeline-badge primary"></div>
                                <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                    <img class="rounded-circle" alt="image" width="50" src="images/avatar/1.jpg">
                                    <div class="col">
                                        <h5 class="mb-1">Dr sultads Send you Photo</h5>
                                        <small class="d-block">29 July 2022 - 02:26 PM</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge warning"></div>
                                <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                    <img class="rounded-circle" alt="image" width="50" src="images/avatar/2.jpg">
                                    <div class="col">
                                        <h5 class="mb-1">Resport created successfully</h5>
                                        <small class="d-block">29 July 2022 - 02:26 PM</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge danger"></div>
                                <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                    <img class="rounded-circle" alt="image" width="50" src="images/avatar/3.jpg">
                                    <div class="col">
                                        <h5 class="mb-1">Reminder : Treatment Time!</h5>
                                        <small class="d-block">29 July 2022 - 02:26 PM</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge success"></div>
                                <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                    <img class="rounded-circle" alt="image" width="50" src="images/avatar/1.jpg">
                                    <div class="col">
                                        <h5 class="mb-1">Dr sultads Send you Photo</h5>
                                        <small class="d-block">29 July 2022 - 02:26 PM</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge warning"></div>
                                <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                    <img class="rounded-circle" alt="image" width="50" src="images/avatar/2.jpg">
                                    <div class="col">
                                        <h5 class="mb-1">Resport created successfully</h5>
                                        <small class="d-block">29 July 2022 - 02:26 PM</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge dark"></div>
                                <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                    <img class="rounded-circle" alt="image" width="50" src="images/avatar/3.jpg">
                                    <div class="col">
                                        <h5 class="mb-1">Reminder : Treatment Time!</h5>
                                        <small class="d-block">29 July 2022 - 02:26 PM</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge info"></div>
                                <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                    <img class="rounded-circle" alt="image" width="50" src="images/avatar/1.jpg">
                                    <div class="col">
                                        <h5 class="mb-1">Dr sultads Send you Photo</h5>
                                        <small class="d-block">29 July 2022 - 02:26 PM</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge danger"></div>
                                <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                    <img class="rounded-circle" alt="image" width="50" src="images/avatar/2.jpg">
                                    <div class="col">
                                        <h5 class="mb-1">Resport created successfully</h5>
                                        <small class="d-block">29 July 2022 - 02:26 PM</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge success"></div>
                                <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                    <img class="rounded-circle" alt="image" width="50" src="images/avatar/3.jpg">
                                    <div class="col">
                                        <h5 class="mb-1">Reminder : Treatment Time!</h5>
                                        <small class="d-block">29 July 2022 - 02:26 PM</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge warning"></div>
                                <a class="timeline-panel text-muted d-flex align-items-center" href="#">
                                    <img class="rounded-circle" alt="image" width="50" src="images/avatar/1.jpg">
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
                    <h4 class="card-title">Các bài blog chờ sử lý</h4>
                </div>
                <div class="card-body">
                    <div id="pendingBlogs" class="widget-todo dz-scroll" style="height:370px;">
                        <ul class="timeline">
                            <li>
                                <div class="timeline-badge primary"></div>
                                <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                    <img class="rounded-circle" alt="image" width="50" src="images/avatar/1.jpg">
                                    <div class="col">
                                        <h5 class="mb-1">Dr sultads Send you Photo</h5>
                                        <small class="d-block">29 July 2022 - 02:26 PM</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge warning"></div>
                                <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                    <img class="rounded-circle" alt="image" width="50" src="images/avatar/2.jpg">
                                    <div class="col">
                                        <h5 class="mb-1">Resport created successfully</h5>
                                        <small class="d-block">29 July 2022 - 02:26 PM</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge danger"></div>
                                <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                    <img class="rounded-circle" alt="image" width="50" src="images/avatar/3.jpg">
                                    <div class="col">
                                        <h5 class="mb-1">Reminder : Treatment Time!</h5>
                                        <small class="d-block">29 July 2022 - 02:26 PM</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge success"></div>
                                <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                    <img class="rounded-circle" alt="image" width="50" src="images/avatar/1.jpg">
                                    <div class="col">
                                        <h5 class="mb-1">Dr sultads Send you Photo</h5>
                                        <small class="d-block">29 July 2022 - 02:26 PM</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge warning"></div>
                                <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                    <img class="rounded-circle" alt="image" width="50" src="images/avatar/2.jpg">
                                    <div class="col">
                                        <h5 class="mb-1">Resport created successfully</h5>
                                        <small class="d-block">29 July 2022 - 02:26 PM</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge dark"></div>
                                <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                    <img class="rounded-circle" alt="image" width="50" src="images/avatar/3.jpg">
                                    <div class="col">
                                        <h5 class="mb-1">Reminder : Treatment Time!</h5>
                                        <small class="d-block">29 July 2022 - 02:26 PM</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge info"></div>
                                <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                    <img class="rounded-circle" alt="image" width="50" src="images/avatar/1.jpg">
                                    <div class="col">
                                        <h5 class="mb-1">Dr sultads Send you Photo</h5>
                                        <small class="d-block">29 July 2022 - 02:26 PM</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge danger"></div>
                                <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                    <img class="rounded-circle" alt="image" width="50" src="images/avatar/2.jpg">
                                    <div class="col">
                                        <h5 class="mb-1">Resport created successfully</h5>
                                        <small class="d-block">29 July 2022 - 02:26 PM</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge success"></div>
                                <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                    <img class="rounded-circle" alt="image" width="50" src="images/avatar/3.jpg">
                                    <div class="col">
                                        <h5 class="mb-1">Reminder : Treatment Time!</h5>
                                        <small class="d-block">29 July 2022 - 02:26 PM</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge warning"></div>
                                <a class="timeline-panel text-muted d-flex align-items-center" href="#">
                                    <img class="rounded-circle" alt="image" width="50" src="images/avatar/1.jpg">
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
                    <h4 class="card-title">Các giảng nổi bật</h4>
                </div>
                <div class="card-body">
                    <div id="topInstructors" class="widget-todo dz-scroll" style="height:370px;">
                        <ul class="timeline">
                            <li>
                                <div class="timeline-badge primary"></div>
                                <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                    <img class="rounded-circle" alt="image" width="50" src="images/avatar/1.jpg">
                                    <div class="col">
                                        <h5 class="mb-1">Dr sultads Send you Photo</h5>
                                        <small class="d-block">29 July 2022 - 02:26 PM</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge warning"></div>
                                <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                    <img class="rounded-circle" alt="image" width="50" src="images/avatar/2.jpg">
                                    <div class="col">
                                        <h5 class="mb-1">Resport created successfully</h5>
                                        <small class="d-block">29 July 2022 - 02:26 PM</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge danger"></div>
                                <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                    <img class="rounded-circle" alt="image" width="50" src="images/avatar/3.jpg">
                                    <div class="col">
                                        <h5 class="mb-1">Reminder : Treatment Time!</h5>
                                        <small class="d-block">29 July 2022 - 02:26 PM</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge success"></div>
                                <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                    <img class="rounded-circle" alt="image" width="50" src="images/avatar/1.jpg">
                                    <div class="col">
                                        <h5 class="mb-1">Dr sultads Send you Photo</h5>
                                        <small class="d-block">29 July 2022 - 02:26 PM</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge warning"></div>
                                <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                    <img class="rounded-circle" alt="image" width="50" src="images/avatar/2.jpg">
                                    <div class="col">
                                        <h5 class="mb-1">Resport created successfully</h5>
                                        <small class="d-block">29 July 2022 - 02:26 PM</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge dark"></div>
                                <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                    <img class="rounded-circle" alt="image" width="50" src="images/avatar/3.jpg">
                                    <div class="col">
                                        <h5 class="mb-1">Reminder : Treatment Time!</h5>
                                        <small class="d-block">29 July 2022 - 02:26 PM</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge info"></div>
                                <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                    <img class="rounded-circle" alt="image" width="50" src="images/avatar/1.jpg">
                                    <div class="col">
                                        <h5 class="mb-1">Dr sultads Send you Photo</h5>
                                        <small class="d-block">29 July 2022 - 02:26 PM</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge danger"></div>
                                <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                    <img class="rounded-circle" alt="image" width="50" src="images/avatar/2.jpg">
                                    <div class="col">
                                        <h5 class="mb-1">Resport created successfully</h5>
                                        <small class="d-block">29 July 2022 - 02:26 PM</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge success"></div>
                                <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                    <img class="rounded-circle" alt="image" width="50" src="images/avatar/3.jpg">
                                    <div class="col">
                                        <h5 class="mb-1">Reminder : Treatment Time!</h5>
                                        <small class="d-block">29 July 2022 - 02:26 PM</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge warning"></div>
                                <a class="timeline-panel text-muted d-flex align-items-center" href="#">
                                    <img class="rounded-circle" alt="image" width="50" src="images/avatar/1.jpg">
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
                    <h4 class="card-title">Các khóa học nổi bật</h4>
                </div>
                <div class="card-body">
                    <div id="topCourses" class="widget-todo dz-scroll" style="height:370px;">
                        <ul class="timeline">
                            <li>
                                <div class="timeline-badge primary"></div>
                                <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                    <img class="rounded-circle" alt="image" width="50" src="images/avatar/1.jpg">
                                    <div class="col">
                                        <h5 class="mb-1">Dr sultads Send you Photo</h5>
                                        <small class="d-block">29 July 2022 - 02:26 PM</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge warning"></div>
                                <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                    <img class="rounded-circle" alt="image" width="50" src="images/avatar/2.jpg">
                                    <div class="col">
                                        <h5 class="mb-1">Resport created successfully</h5>
                                        <small class="d-block">29 July 2022 - 02:26 PM</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge danger"></div>
                                <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                    <img class="rounded-circle" alt="image" width="50" src="images/avatar/3.jpg">
                                    <div class="col">
                                        <h5 class="mb-1">Reminder : Treatment Time!</h5>
                                        <small class="d-block">29 July 2022 - 02:26 PM</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge success"></div>
                                <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                    <img class="rounded-circle" alt="image" width="50" src="images/avatar/1.jpg">
                                    <div class="col">
                                        <h5 class="mb-1">Dr sultads Send you Photo</h5>
                                        <small class="d-block">29 July 2022 - 02:26 PM</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge warning"></div>
                                <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                    <img class="rounded-circle" alt="image" width="50" src="images/avatar/2.jpg">
                                    <div class="col">
                                        <h5 class="mb-1">Resport created successfully</h5>
                                        <small class="d-block">29 July 2022 - 02:26 PM</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge dark"></div>
                                <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                    <img class="rounded-circle" alt="image" width="50" src="images/avatar/3.jpg">
                                    <div class="col">
                                        <h5 class="mb-1">Reminder : Treatment Time!</h5>
                                        <small class="d-block">29 July 2022 - 02:26 PM</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge info"></div>
                                <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                    <img class="rounded-circle" alt="image" width="50" src="images/avatar/1.jpg">
                                    <div class="col">
                                        <h5 class="mb-1">Dr sultads Send you Photo</h5>
                                        <small class="d-block">29 July 2022 - 02:26 PM</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge danger"></div>
                                <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                    <img class="rounded-circle" alt="image" width="50" src="images/avatar/2.jpg">
                                    <div class="col">
                                        <h5 class="mb-1">Resport created successfully</h5>
                                        <small class="d-block">29 July 2022 - 02:26 PM</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge success"></div>
                                <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                    <img class="rounded-circle" alt="image" width="50" src="images/avatar/3.jpg">
                                    <div class="col">
                                        <h5 class="mb-1">Reminder : Treatment Time!</h5>
                                        <small class="d-block">29 July 2022 - 02:26 PM</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge warning"></div>
                                <a class="timeline-panel text-muted d-flex align-items-center" href="#">
                                    <img class="rounded-circle" alt="image" width="50" src="images/avatar/1.jpg">
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
                                    <img class="rounded-circle" alt="image" width="50" src="images/avatar/1.jpg">
                                    <div class="col">
                                        <h5 class="mb-1">Dr sultads Send you Photo</h5>
                                        <small class="d-block">29 July 2022 - 02:26 PM</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge warning"></div>
                                <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                    <img class="rounded-circle" alt="image" width="50" src="images/avatar/2.jpg">
                                    <div class="col">
                                        <h5 class="mb-1">Resport created successfully</h5>
                                        <small class="d-block">29 July 2022 - 02:26 PM</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge danger"></div>
                                <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                    <img class="rounded-circle" alt="image" width="50" src="images/avatar/3.jpg">
                                    <div class="col">
                                        <h5 class="mb-1">Reminder : Treatment Time!</h5>
                                        <small class="d-block">29 July 2022 - 02:26 PM</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge success"></div>
                                <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                    <img class="rounded-circle" alt="image" width="50" src="images/avatar/1.jpg">
                                    <div class="col">
                                        <h5 class="mb-1">Dr sultads Send you Photo</h5>
                                        <small class="d-block">29 July 2022 - 02:26 PM</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge warning"></div>
                                <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                    <img class="rounded-circle" alt="image" width="50" src="images/avatar/2.jpg">
                                    <div class="col">
                                        <h5 class="mb-1">Resport created successfully</h5>
                                        <small class="d-block">29 July 2022 - 02:26 PM</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge dark"></div>
                                <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                    <img class="rounded-circle" alt="image" width="50" src="images/avatar/3.jpg">
                                    <div class="col">
                                        <h5 class="mb-1">Reminder : Treatment Time!</h5>
                                        <small class="d-block">29 July 2022 - 02:26 PM</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge info"></div>
                                <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                    <img class="rounded-circle" alt="image" width="50" src="images/avatar/1.jpg">
                                    <div class="col">
                                        <h5 class="mb-1">Dr sultads Send you Photo</h5>
                                        <small class="d-block">29 July 2022 - 02:26 PM</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge danger"></div>
                                <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                    <img class="rounded-circle" alt="image" width="50" src="images/avatar/2.jpg">
                                    <div class="col">
                                        <h5 class="mb-1">Resport created successfully</h5>
                                        <small class="d-block">29 July 2022 - 02:26 PM</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge success"></div>
                                <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="#">
                                    <img class="rounded-circle" alt="image" width="50" src="images/avatar/3.jpg">
                                    <div class="col">
                                        <h5 class="mb-1">Reminder : Treatment Time!</h5>
                                        <small class="d-block">29 July 2022 - 02:26 PM</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge warning"></div>
                                <a class="timeline-panel text-muted d-flex align-items-center" href="#">
                                    <img class="rounded-circle" alt="image" width="50" src="images/avatar/1.jpg">
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
                        data: [5, 20, 6, 4, 6, 45, 40],
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
                            max: 50,
                            min: 0,
                            stepSize: 5,
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
                        data: [5, 20, 6, 4, 6, 45, 40],
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
                            max: 50,
                            min: 0,
                            stepSize: 5,
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
                        data: [5, 20, 6, 4, 6, 45, 40],
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
                            max: 50,
                            min: 0,
                            stepSize: 5,
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
</script>
@endsection
