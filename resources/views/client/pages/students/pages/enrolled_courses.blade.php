@extends('client.pages.students.layout.master')

@section('dashboard-main-content')
    <div class="rbt-dashboard-content bg-color-white rbt-shadow-box">
            <div class="content">
                <div class="section-title">
                    <h4 class="rbt-title-style-3">Các khóa học đã đăng ký</h4>
                </div>
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
                                    <img src="{{ $item->course->thumbnailPath() }}" alt="{{ $item->title }} thumbnail">
                                </a>
                            </div>
                            <div class="rbt-card-body">
                                <div class="rbt-card-top">
                                    <div class="rbt-review">
                                        @if($item->course->reviews->count() == 0)
                                            <span class="rating-count">Khóa học này chưa có đánh giá</span>
                                        @else
                                            <div class="rating">
                                                    @for($i = 1; $i <= ceil($item->course->reviews->avg('rating')) ; $i++)
                                                        <i class="fas fa-star"></i>
                                                    @endfor
                                                    @for($i = 1; $i <= 5 - ceil($item->course->reviews->avg('rating')); $i++)
                                                        <i class="fas fa-star" style="color: #1a1e21"></i>
                                                    @endfor
                                            </div>
                                            <span class="rating-count"> ({{ $item->course->reviews->count() }} đánh giá)</span>
                                        @endif
                                    </div>
                                </div>
                                <h4 class="rbt-card-title"><a href="{{ route('client.course_detail', ['slug' => $item->course->slug]) }}">{{ $item->course->title }}</a></h4>
                                <ul class="rbt-meta">
                                    <li><i class="feather-book"></i>{{ $item->course->subjects->count() }} môn học</li>
                                    <li><i class="feather-users"></i>{{ $item->course->students->count() }} học viên</li>
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
            </div>
        </div>
@endsection
