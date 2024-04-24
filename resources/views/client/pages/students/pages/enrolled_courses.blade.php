@extends('client.layout.dashboard')

@section('content')
    <div class="col-lg-9">
        <!-- Start Enrole Course  -->
        <div class="rbt-dashboard-content bg-color-white rbt-shadow-box">
            <div class="content">

                <div class="section-title">
                    <h4 class="rbt-title-style-3">Enrolled Courses</h4>
                </div>

                <div class="advance-tab-button mb--30">
                    <ul class="nav nav-tabs tab-button-style-2 justify-content-start" id="myTab-4" role="tablist">
                        <li role="presentation">
                            <a href="#" class="tab-button active" id="all_courses" data-bs-toggle="tab" data-bs-target="#all_courses" role="tab" aria-controls="all_courses" aria-selected="true">
                                <span class="title">Các khóa học đã đăng ký</span>
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="#" class="tab-button" id="finished_courses" data-bs-toggle="tab" data-bs-target="#finished_courses-4" role="tab" aria-controls="finished_courses-4" aria-selected="false">
                                <span class="title">Các khóa học đã hoàn thành</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="tab-content">
                    <div class="tab-pane fade active show" id="all_courses" role="tabpanel" aria-labelledby="all_courses">
                        <div class="row g-5">
                            @if($enrolledCourses->count() == 0)
                                <div class="col-lg-12">
                                    <div class="rbt-card variation-01 rbt-hover">
                                        <div class="rbt-card-body">
                                            <h4 class="rbt-card-title">Bạn chưa đăng ký khóa học nào</h4>
                                        </div>
                                    </div>
                                </div>
                            @else
                                @foreach($enrolledCourses as $item)
                                    <div class="col-lg-4 col-md-6 col-12">
                                <div class="rbt-card variation-01 rbt-hover">
                                    <div class="rbt-card-img">
                                        <a href="">
                                            <img src="{{ $item->course->thumbnail }}" alt="Card image">
                                        </a>
                                    </div>
                                    <div class="rbt-card-body">
                                        <div class="rbt-card-top">
                                            <div class="rbt-review">
                                                <div class="rating">
                                                    @for($i = 1; $i <= ceil($item->rating) ; $i++)
                                                        <i class="fas fa-star"></i>
                                                    @endfor
                                                    @for($i = 1; $i <= 5 - ceil($item->rating); $i++)
                                                        <i class="fas fa-star" style="color: #1a1e21"></i>
                                                    @endfor
                                                </div>
                                                <span class="rating-count"> ({{ $item->review_amount }} đánh giá)</span>
                                            </div>
                                            <div class="rbt-bookmark-btn">
                                                <a class="rbt-round-btn" title="Bookmark" href="#"><i class="feather-bookmark"></i></a>
                                            </div>
                                        </div>
                                        <h4 class="rbt-card-title"><a href="{{ route('client.course_detail', ['slug' => $item->course->slug]) }}">{{ $item->course->title }}</a>
                                        </h4>
                                        <ul class="rbt-meta">
                                            <li><i class="feather-book"></i>{{ $item->course->subjects->count() }}</li>
                                            <li><i class="feather-users"></i>{{ $item->course->enrollments->count() }} học viên</li>
                                        </ul>

                                        <div class="rbt-progress-style-1 mb--20 mt--10">
                                            <div class="single-progress">
                                                <h6 class="rbt-title-style-2 mb--10">Complete</h6>
                                                <div class="progress">
                                                    <div class="progress-bar wow fadeInLeft bar-color-success" data-wow-duration="0.5s" data-wow-delay=".3s" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                                                    </div>
                                                    <span class="rbt-title-style-2 progress-number">90%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                @endforeach
                            @endif
                    </div>


                    <div class="tab-pane fade" id="finished_courses" role="tabpanel" aria-labelledby="finished_courses">
                        <div class="row g-5">
                            <!-- Start Single Course  -->
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="rbt-card variation-01 rbt-hover">
                                    <div class="rbt-card-img">
                                        <a href="course-details.html">
                                            <img src="assets/images/course/course-online-01.jpg" alt="Card image">
                                        </a>
                                    </div>
                                    <div class="rbt-card-body">
                                        <div class="rbt-card-top">
                                            <div class="rbt-review">
                                                <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <span class="rating-count"> (15 Reviews)</span>
                                            </div>
                                            <div class="rbt-bookmark-btn">
                                                <a class="rbt-round-btn" title="Bookmark" href="#"><i class="feather-bookmark"></i></a>
                                            </div>
                                        </div>
                                        <h4 class="rbt-card-title"><a href="course-details.html">React Front To Back</a>
                                        </h4>
                                        <ul class="rbt-meta">
                                            <li><i class="feather-book"></i>20 Lessons</li>
                                            <li><i class="feather-users"></i>40 Students</li>
                                        </ul>

                                        <div class="rbt-progress-style-1 mb--20 mt--10">
                                            <div class="single-progress">
                                                <h6 class="rbt-title-style-2 mb--10">Complete</h6>
                                                <div class="progress">
                                                    <div class="progress-bar wow fadeInLeft bar-color-success" data-wow-duration="0.5s" data-wow-delay=".3s" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                                    </div>
                                                    <span class="rbt-title-style-2 progress-number">100%</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="rbt-card-bottom">
                                            <a class="rbt-btn btn-sm bg-primary-opacity w-100 text-center" href="#">Download Certificate</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Course  -->

                            <!-- Start Single Course  -->
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="rbt-card variation-01 rbt-hover">
                                    <div class="rbt-card-img">
                                        <a href="course-details.html">
                                            <img src="assets/images/course/course-online-02.jpg" alt="Card image">
                                        </a>
                                    </div>
                                    <div class="rbt-card-body">
                                        <div class="rbt-card-top">
                                            <div class="rbt-review">
                                                <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <span class="rating-count"> (15 Reviews)</span>
                                            </div>
                                            <div class="rbt-bookmark-btn">
                                                <a class="rbt-round-btn" title="Bookmark" href="#"><i class="feather-bookmark"></i></a>
                                            </div>
                                        </div>
                                        <h4 class="rbt-card-title"><a href="course-details.html">PHP
                                                Beginner + Advanced</a>
                                        </h4>
                                        <ul class="rbt-meta">
                                            <li><i class="feather-book"></i>10 Lessons</li>
                                            <li><i class="feather-users"></i>30 Students</li>
                                        </ul>

                                        <div class="rbt-progress-style-1 mb--20 mt--10">
                                            <div class="single-progress">
                                                <h6 class="rbt-title-style-2 mb--10">Complete</h6>
                                                <div class="progress">
                                                    <div class="progress-bar wow fadeInLeft bar-color-success" data-wow-duration="0.5s" data-wow-delay=".3s" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                                    </div>
                                                    <span class="rbt-title-style-2 progress-number">100%</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="rbt-card-bottom">
                                            <a class="rbt-btn btn-sm bg-primary-opacity w-100 text-center" href="#">Download Certificate</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Course  -->

                            <!-- Start Single Course  -->
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="rbt-card variation-01 rbt-hover">
                                    <div class="rbt-card-img">
                                        <a href="course-details.html">
                                            <img src="assets/images/course/course-online-03.jpg" alt="Card image">
                                        </a>
                                    </div>
                                    <div class="rbt-card-body">
                                        <div class="rbt-card-top">
                                            <div class="rbt-review">
                                                <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <span class="rating-count"> (4 Reviews)</span>
                                            </div>
                                            <div class="rbt-bookmark-btn">
                                                <a class="rbt-round-btn" title="Bookmark" href="#"><i class="feather-bookmark"></i></a>
                                            </div>
                                        </div>
                                        <h4 class="rbt-card-title"><a href="course-details.html">Angular Zero to
                                                Mastery</a>
                                        </h4>
                                        <ul class="rbt-meta">
                                            <li><i class="feather-book"></i>14 Lessons</li>
                                            <li><i class="feather-users"></i>26 Students</li>
                                        </ul>

                                        <div class="rbt-progress-style-1 mb--20 mt--10">
                                            <div class="single-progress">
                                                <h6 class="rbt-title-style-2 mb--10">Complete</h6>
                                                <div class="progress">
                                                    <div class="progress-bar wow fadeInLeft bar-color-success" data-wow-duration="0.5s" data-wow-delay=".3s" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                                    </div>
                                                    <span class="rbt-title-style-2 progress-number">100%</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="rbt-card-bottom">
                                            <a class="rbt-btn btn-sm bg-primary-opacity w-100 text-center" href="#">Download Certificate</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Course  -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
@endsection
