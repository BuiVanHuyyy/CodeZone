@extends('admin.layout.master')

@section('content')
    <div class="container-fluid">

        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Chi tiết khóa học</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-3 col-xxl-4 col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <img class="img-fluid" src="/{{ $course->thumbnail ?? asset('client_assets/images/avatar/default_course_thumbnail.png') }}" alt="Course thumbnail">
                            <div class="card-body">
                                <h4 class="mb-0 text-center">{{ $course->title }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title">Tổng quan</h2>
                            </div>
                            <div class="card-body pb-0">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                        <strong>Chuyên ngành</strong>
                                        <span class="mb-0">{{ $course->category->title }}</span>
                                    </li>
                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                        <strong>Giảng viên</strong>
                                        <span class="mb-0"><a href="{{ route('admin.instructor.show', ['instructor' => $course->author]) }}">{{ $course->author->name }}</a></span>
                                    </li>
                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                        <strong>Xếp hạng</strong>
                                        <span class="mb-0">{{ number_format($rating, 1) }} <i class="fa-solid fa-star" style="color: #FFD43B;"></i></span>
                                    </li>
                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                        <strong>Giá</strong>
                                        <span class="mb-0">₫ {{number_format($course->price, 0)}}</span>
                                    </li>
                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                        <strong>Doanh thu</strong>
                                        <span class="mb-0">₫ {{ number_format(count($course->enrollments) * $course->price, 1) }}</span>
                                    </li>
                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                        <strong>Ngày tạo</strong>
                                        <span class="mb-0">{{ date_format(date_create($course->created_at), 'd/m/Y') }}</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-footer pt-0 pb-0 text-center">
                                <div class="row">
                                    <div class="col-4 pt-3 pb-3 border-right">
                                        <h3 class="mb-1 text-primary">{{ number_format(count($course->enrollments), 0) }}</h3>
                                        <span>Học viên</span>
                                    </div>
                                    <div class="col-4 pt-3 pb-3 border-right">
                                        <h3 class="mb-1 text-primary">{{number_format($likeAmount, 0) }}</h3>
                                        <span>Like</span>
                                    </div>
                                    <div class="col-4 pt-3 pb-3">
                                        <h3 class="mb-1 text-primary">{{ number_format($dislikeAmount, 0) }}</h3>
                                        <span>Dislike</span>
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
                        <h4 class="text-primary">Thông tin khóa học</h4>
                        <p>{{ $course->description }}</p>
                        <h4 class="text-primary">Nội dung khóa học</h4>
                        <div class="course-detail-content">
                            <ul>
                                @foreach($course->subjects as $subject)
                                    <li {{ $subject->lessons->count() !== 0 ? 'class=has-submenu' : '' }}><span>{{ $subject->title }}</span>{!! $subject->lessons->count() !== 0 ? '<span><i class="fa-solid fa-caret-down"></i></span>' : '' !!}
                                        @if($subject->lessons->count() !== 0 && !is_null($subject->lessons))
                                            <ul>
                                                @foreach($subject->lessons as $lesson)
                                                    <li>{{ $lesson->title }}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <h4 class="text-primary">Review khóa học</h4>
                        <div class="reviews-list d-flex">
                            <div class="row">
                                @if($reviews->count() === 0)
                                    <p>Khóa học này chưa có reviews</p>
                                @endif
                                @foreach($reviews as $review)
                                    <div class="col-lg-6 review-item">
                                        <div class="top d-flex">
                                            <div class="thumbnail">
                                                <a href="{{ route('admin.student.show', ['student' => $review->user->students->id]) }}">
                                                    <img class="circle" src="{{ asset('admin_assets/images/avatar/1.jpg') }}" alt="">
                                                </a>
                                            </div>
                                            <div class="author">
                                                <h4><a href="{{ route('admin.student.show', ['student' => $review->user->students->id]) }}">{{ $review->user->students->name }}</a></h4>
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
                                                {{ $review->like_amount }}
                                            </button>
                                            <button class="dislike-btn">
                                                <i class="fa-regular fa-thumbs-down"></i>
                                                {{ $review->dislike_amount }}
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
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.course-detail-content ul .has-submenu').on('click',function(e) {
                e.stopPropagation();
                $(this).find('ul').slideToggle();
                $(this).find('.fa-caret-down').toggleClass('rotated');
            });
            // $('.like-btn').on('click', function() {
            //     var likeValue = parseInt($(this).text().trim(), 10);
            //     if ($(this).hasClass('active')) {
            //         likeValue -= 1;
            //     } else {
            //         likeValue += 1;
            //     }
            //     $(this).text(likeValue);
            //     $(this).toggleClass('active');
            // });
            // $('.dislike-btn').on('click', function() {
            //     $(this).toggleClass('active');
            // });
        });
    </script>
@endsection

