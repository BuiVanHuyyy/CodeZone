@extends('client.pages.instructors.layout.master')

@section('dashboard-main-content')
    <div class="rbt-dashboard-content bg-color-white rbt-shadow-box">
        <div class="content">

            <div class="section-title">
                <h4 class="rbt-title-style-3">My Courses
                </h4>
            </div>

            <div class="advance-tab-button mb--30">
                <ul class="nav nav-tabs tab-button-style-2 justify-content-start" id="myTab-4" role="tablist">
                    <li role="presentation">
                        <a href="#" class="tab-button active" id="publish-tab-4" data-bs-toggle="tab"
                           data-bs-target="#publish-4" role="tab" aria-controls="publish-4" aria-selected="true">
                            <span class="title">Hoạt động</span>
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#" class="tab-button" id="pending-tab-4" data-bs-toggle="tab"
                           data-bs-target="#pending-4" role="tab" aria-controls="pending-4" aria-selected="false">
                            <span class="title">Chờ phê duyệt</span>
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#" class="tab-button" id="draft-tab-4" data-bs-toggle="tab" data-bs-target="#draft-4"
                           role="tab" aria-controls="draft-4" aria-selected="false">
                            <span class="title">Bị từ chối</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="tab-content">
                <div class="tab-pane fade active show" id="publish-4" role="tabpanel" aria-labelledby="publish-tab-4">
                    <div class="row g-5">
                        @if((Auth::user()->instructors->courses->where('status', 'approved')->count()) != 0)
                            @foreach(Auth::user()->instructors->courses->where('status', 'approved') as $course)
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="rbt-card variation-01 rbt-hover">
                                        <div class="rbt-card-img">
                                            <a href="">
                                                @php
                                                    $filePath = $course->thumbnail;
                                                    $defaultPath = asset('client_assets/images/avatar/default_course_thumbnail.png');
                                                    if (isset($filePath) && file_exists(public_path($filePath))) {
                                                        $fileToUse = $filePath;
                                                    } else {
                                                        $fileToUse = $defaultPath;
                                                    }
                                                @endphp
                                                <img src="{{ $fileToUse }}"
                                                     alt="Card image">
                                            </a>
                                        </div>
                                        <div class="rbt-card-body">
                                            <div class="rbt-card-top">
                                                <div class="rbt-review">
                                                    <div class="rating">
                                                        @php
                                                            $reviews = \App\Models\Review::where('reviewable_type', 'course')->where('reviewable_id', $course->id)->get();
                                                            $totalStars = 0;
                                                            foreach ($reviews as $review) {
                                                                $totalStars += $review->rating;
                                                            }
                                                            if (count($reviews) > 0) {
                                                                $rating = $totalStars / count($reviews);
                                                            } else {
                                                                $rating = 0;
                                                            }
                                                        @endphp
                                                        @for($i = 0; $i < ceil($rating); $i++)
                                                            <i class="fas fa-star"></i>
                                                        @endfor
                                                        @for($i = 0; $i < 5 - ceil($rating); $i++)
                                                            <i class="far fa-star" style="color: #0b0b0b"></i>
                                                        @endfor
                                                    </div>
                                                    <span class="rating-count"> ({{ $reviews->count() }} Reviews)</span>
                                                </div>
                                                <div class="rbt-bookmark-btn">
                                                    <a class="rbt-round-btn" title="Bookmark" href="#"><i
                                                            class="feather-bookmark"></i></a>
                                                </div>
                                            </div>
                                            <h4 class="rbt-card-title"><a href="{{ route('client.course_detail', [$course->slug]) }}">{{ $course->title }}</a>
                                            </h4>
                                            <ul class="rbt-meta">
                                                <li><i class="feather-book"></i>{{ $course->subjects->count() }} bài học
                                                </li>
                                                <li><i class="feather-users"></i>{{ $course->enrollments->count() }}
                                                    học viên
                                                </li>
                                            </ul>

                                            <div class="rbt-card-bottom">
                                                <div class="rbt-price">
                                                    <span class="current-price">₫ {{ number_format($course->price, 0) }}</span>
                                                    {{--                                                    <span class="off-price">$120</span>--}}
                                                </div>
                                                <a class="rbt-btn-link left-icon" href="#"><i class="feather-edit"></i>
                                                    Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>Chưa có khóa học nào</p>
                        @endif
                    </div>
                </div>

                <div class="tab-pane fade" id="pending-4" role="tabpanel" aria-labelledby="pending-tab-4">
                    <div class="row g-5">
                        @if((Auth::user()->instructors->courses->where('status', 'pending')->count()) != 0)
                            @foreach(Auth::user()->instructors->courses->where('status', 'pending') as $course)
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="rbt-card variation-01 rbt-hover">
                                        <div class="rbt-card-img">
                                            <a href="">
                                                @php
                                                    $filePath = $course->thumbnail;
                                                    $defaultPath = asset('client_assets/images/avatar/default_course_thumbnail.png');

                                                    if (isset($filePath) && file_exists(public_path($filePath))) {
                                                        $fileToUse = $filePath;
                                                    } else {
                                                        $fileToUse = $defaultPath;
                                                    }
                                                @endphp
                                                <img src="{{ $fileToUse }}"
                                                     alt="Card image">
                                            </a>
                                        </div>
                                        <div class="rbt-card-body">
                                            <div class="rbt-card-top">
                                                <div class="rbt-review">
                                                    <div class="rating">
                                                        @php
                                                        $reviews = \App\Models\Review::where('reviewable_type', 'course')->where('reviewable_id', $course->id)->get();
                                                        $totalStars = 0;
                                                        foreach ($reviews as $review) {
                                                            $totalStars += $review->rating;
                                                        }
                                                        if (count($reviews) > 0) {
                                                            $rating = $totalStars / count($reviews);
                                                        } else {
                                                            $rating = 0;
                                                        }
                                                        @endphp
                                                        @for($i = 0; $i < ceil($rating); $i++)
                                                            <i class="fas fa-star"></i>
                                                        @endfor
                                                        @for($i = 0; $i < 5 - ceil($rating); $i++)
                                                            <i class="far fa-star" style="color: #0b0b0b"></i>
                                                        @endfor
                                                    </div>
                                                    <span class="rating-count"> ({{ $reviews->count() }} Reviews)</span>
                                                </div>
                                                <div class="rbt-bookmark-btn">
                                                    <a class="rbt-round-btn" title="Bookmark" href="#"><i
                                                                class="feather-bookmark"></i></a>
                                                </div>
                                            </div>
                                            <h4 class="rbt-card-title"><a href="">{{ $course->title }}</a>
                                            </h4>
                                            <ul class="rbt-meta">
                                                <li><i class="feather-book"></i>{{ $course->subjects->count() }} bài học
                                                </li>
                                                <li><i class="feather-users"></i>{{ $course->enrollments->where('status', 'paid')->count() }}
                                                    học viên
                                                </li>
                                            </ul>

                                            <div class="rbt-card-bottom">
                                                <div class="rbt-price">
                                                    <span class="current-price">₫ {{ $course->price }}</span>
{{--                                                    <span class="off-price">$120</span>--}}
                                                </div>
                                                <a class="rbt-btn-link left-icon" href="#"><i class="feather-edit"></i>
                                                    Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>Chưa có khóa học nào</p>
                        @endif
                    </div>
                </div>

                <div class="tab-pane fade" id="draft-4" role="tabpanel" aria-labelledby="draft-tab-4">
                    <div class="row g-5">
                        @if((Auth::user()->instructors->courses->where('status', 'rejected')->count()) != 0)
                            @foreach(Auth::user()->instructors->courses->where('status', 'rejected') as $course)
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="rbt-card variation-01 rbt-hover">
                                        <div class="rbt-card-img">
                                            <a href="">
                                                @php
                                                    $filePath = $course->thumbnail;
                                                    $defaultPath = asset('client_assets/images/avatar/default_course_thumbnail.png');

                                                    if (isset($filePath) && file_exists(public_path($filePath))) {
                                                        $fileToUse = $filePath;
                                                    } else {
                                                        $fileToUse = $defaultPath;
                                                    }
                                                @endphp
                                                <img src="{{ $fileToUse }}"
                                                     alt="Card image">
                                            </a>
                                        </div>
                                        <div class="rbt-card-body">
                                            <div class="rbt-card-top">
                                                <div class="rbt-review">
                                                    <div class="rating">
                                                        @php
                                                            $reviews = \App\Models\Review::where('reviewable_type', 'course')->where('reviewable_id', $course->id)->get();
                                                            $totalStars = 0;
                                                            foreach ($reviews as $review) {
                                                                $totalStars += $review->rating;
                                                            }
                                                            if (count($reviews) > 0) {
                                                                $rating = $totalStars / count($reviews);
                                                            } else {
                                                                $rating = 0;
                                                            }
                                                        @endphp
                                                        @for($i = 0; $i < ceil($rating); $i++)
                                                            <i class="fas fa-star"></i>
                                                        @endfor
                                                        @for($i = 0; $i < 5 - ceil($rating); $i++)
                                                            <i class="far fa-star" style="color: #0b0b0b"></i>
                                                        @endfor
                                                    </div>
                                                    <span class="rating-count"> ({{ $reviews->count() }} Reviews)</span>
                                                </div>
                                                <div class="rbt-bookmark-btn">
                                                    <a class="rbt-round-btn" title="Bookmark" href="#"><i
                                                            class="feather-bookmark"></i></a>
                                                </div>
                                            </div>
                                            <h4 class="rbt-card-title"><a href="">{{ $course->title }}</a>
                                            </h4>
                                            <ul class="rbt-meta">
                                                <li><i class="feather-book"></i>{{ $course->subjects->count() }} bài học
                                                </li>
                                                <li><i class="feather-users"></i>{{ $course->enrollments->count() }}
                                                    học viên
                                                </li>
                                            </ul>

                                            <div class="rbt-card-bottom">
                                                <div class="rbt-price">
                                                    <span class="current-price">₫ {{ $course->price }}</span>
                                                    {{--                                                    <span class="off-price">$120</span>--}}
                                                </div>
                                                <a class="rbt-btn-link left-icon" href="#"><i class="feather-edit"></i>
                                                    Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>Chưa có khóa học nào</p>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
