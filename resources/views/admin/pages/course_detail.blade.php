@extends('admin.layout.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-xxl-4 col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card overflow-hidden">
                            <img class="img-fluid" src="{{ $course->thumbnailPath() }}" alt="Course thumbnail">
                            <div class="card-body">
                                <h4 class="mb-0 text-center">{{ $course->title }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title text-primary">Tổng quan</h2>
                            </div>
                            <div class="card-body pb-0">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                        <strong>Chuyên ngành</strong>
                                        <span class="mb-0">{{ $course->category->title }}</span>
                                    </li>
                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                        <strong>Giảng viên</strong>
                                        <span class="mb-0"><a
                                                href="{{ route('admin.instructor.show', [$course->author->user->slug]) }}">{{ $course->author->user->name }}</a></span>
                                    </li>
                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                        <strong>Xếp hạng</strong>
                                        <span class="mb-0">{{ number_format($course->reviews->avg('rating'), 1) }} <i
                                                class="fa-solid fa-star" style="color: #FFD43B;"></i></span>
                                    </li>
                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                        <strong>Giá</strong>
                                        <span class="mb-0">₫ {{number_format($course->price, 0)}}</span>
                                    </li>
                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                        <strong>Số lượng học viên</strong>
                                        <span class="mb-0">{{ number_format(count($course->students->where('status', 'paid'))) }}</span>
                                    </li>
                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                        <strong>Doanh thu</strong>
                                        <span
                                            class="mb-0">₫ {{ number_format($course->totalTuition()) }}</span>
                                    </li>
                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                        <strong>Ngày tạo</strong>
                                        <span
                                            class="mb-0">{{ date_format(date_create($course->created_at), 'd/m/Y') }}</span>
                                    </li>
                                </ul>
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
                        <div class="course-detail-content text-light">
                            <ul>
                                @foreach($course->subjects->sortBy('order') as $subject)
                                    <li {{ $subject->lessons->count() !== 0 ? 'class=has-submenu' : '' }}>
                                        <span>{{ $subject->title }}</span>{!! $subject->lessons->count() !== 0 ? '<span><i class="fa-solid fa-caret-down"></i></span>' : '' !!}
                                        @if($subject->lessons->count() !== 0 && !is_null($subject->lessons))
                                            <ul>
                                                @foreach($subject->lessons->sortBy('order') as $lesson)
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
                                @if($course->reviews->count() === 0)
                                    <p>Khóa học này chưa có reviews</p>
                                @endif
                                @foreach($course->reviews->sortByDesc('created_at') as $review)
                                    <div class="col-lg-6 review-item">
                                        <div class="top d-flex">
                                            <div class="thumbnail">
                                                <a href="">
                                                    <img class="circle" src="{{ $review->author->user->avatarPath() }}"
                                                         alt="">
                                                </a>
                                            </div>
                                            <div class="author">
                                                <h4><a href="">{{ $review->author->user->name }}</a></h4>
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
                                            <span class="like-btn btn btn-success text-light">
                                                <i class="fa-regular fa-thumbs-up"></i>
                                                {{ $review->likes->count() }}
                                            </span>
                                            <span class="dislike-btn btn btn-danger text-light">
                                                <i class="fa-regular fa-thumbs-down"></i>
                                                {{ $review->dislikes->count() }}
                                            </span>
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
        $(document).ready(function () {
            $('.course-detail-content ul .has-submenu').on('click', function (e) {
                e.stopPropagation();
                $(this).find('ul').slideToggle();
                $(this).find('.fa-caret-down').toggleClass('rotated');
            });
        });
    </script>
@endsection

