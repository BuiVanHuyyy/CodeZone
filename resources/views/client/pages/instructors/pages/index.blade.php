@extends('client.pages.instructors.layout.master')

@section('dashboard-main-content')
    <div class="rbt-dashboard-content bg-color-white rbt-shadow-box mb--60">
        <div class="content">
            <div class="section-title">
                <h4 class="rbt-title-style-3">
                    Dashboard
                </h4>
            </div>
            <div class="row g-5">
                <!-- Start Single Card  -->
                <div
                    class="col-lg-4 col-md-4 col-sm-6 col-12"
                >
                    <div
                        class="rbt-counterup variation-01 rbt-hover-03 rbt-border-dashed bg-primary-opacity"
                    >
                        <div class="inner">
                            <div class="rbt-round-icon bg-primary-opacity">
                                <i class="feather-book-open"></i>
                            </div>
                            <div class="content">
                                <h3 class="counter without-icon color-primary">
                                    <span class="odometer" data-count="{{ $instructorCourses->count() }}">00</span>
                                </h3>
                                <span class="rbt-title-style-2 d-block">Khóa học đã tạo</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Card  -->

                <!-- Start Single Card  -->
                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="rbt-counterup variation-01 rbt-hover-03 rbt-border-dashed bg-secondary-opacity">
                        <div class="inner">
                            <div class="rbt-round-icon bg-secondary-opacity">
                                <i class="feather-monitor"></i>
                            </div>
                            <div class="content">
                                <h3 class="counter without-icon color-secondary">
                                    <span class="odometer" data-count="{{ $instructorCourses->where('status', 'approved')->count() }}">00</span>
                                </h3>
                                <span class="rbt-title-style-2 d-block">Khóa học đang hoạt động</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Card  -->

                <!-- Start Single Card  -->
                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="rbt-counterup variation-01 rbt-hover-03 rbt-border-dashed bg-pink-opacity">
                        <div class="inner">
                            <div class="rbt-round-icon bg-pink-opacity">
                                <i class="feather-users"></i>
                            </div>
                            <div class="content">
                                <h3 class="counter without-icon color-pink">
                                    <span class="odometer" data-count="{{ $totalStudents }}">00</span>
                                </h3>
                                <span class="rbt-title-style-2 d-block">Tổng học sinh</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Card  -->


                <!-- Start Single Card  -->
                <div class="col-12">
                    <div class="rbt-counterup variation-01 rbt-hover-03 rbt-border-dashed bg-warning-opacity">
                        <div class="inner">
                            <div class="rbt-round-icon bg-warning-opacity">
                                <i class="feather-dollar-sign"></i>
                            </div>
                            <div class="content">
                                <h3 class="counter color-warning">
                                    <span class="odometer" data-count="{{ number_format($totalMoney, 0) }}">00</span>
                                </h3>
                                <span class="rbt-title-style-2 d-block">Tổng doanh thu</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Card  -->
            </div>
        </div>
    </div>
@endsection
