<div class="rbt-banner-area rbt-banner-1 variation-2 height-750">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-8">
                <div class="content">
                    <div class="inner">
                        <div class="rbt-new-badge rbt-new-badge-one">
                            <span class="rbt-new-badge-icon">🏆</span>
                            Nền tảng học lập trình hàng đầu
                        </div>
                        <h1 class="title">Phát triển sự nghiệp của bạn với các khóa học từ <span class="color-primary">CodeZone</span></h1>
                        <p class="description">
                            CodeZone - Nền tảng học lập trình đa dạng và thú vị, mang đến trải nghiệm học tập sâu sắc cho
                            <strong>mọi đối tượng học viên</strong>.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="content">
                    <div class="banner-card pb--60 swiper rbt-dot-bottom-center banner-swiper-active">
                        <div class="swiper-wrapper">
                            @foreach($popularCourses as  $course)
                                <div class="swiper-slide">
                                    <div class="rbt-card variation-01 rbt-hover">
                                        <div class="rbt-card-img">
                                            <a href="{{ route('client.course_detail', ['slug' => $course->slug]) }}">
                                                <img src="{{ $course->thumbnailPath() }}" alt="Card image"/>
{{--                                                <div class="rbt-badge-3 bg-white">--}}
{{--                                                    <span>-40%</span>--}}
{{--                                                    <span>Off</span>--}}
{{--                                                </div>--}}
                                            </a>
                                        </div>
                                        <div class="rbt-card-body">
                                            <ul class="rbt-meta">
                                                <li><i class="feather-book"></i>{{ $course->subjects->count() }} Bài học</li>
                                                <li><i class="feather-users"></i>{{ $course->students->where('status', 'paid')->count() }} Học viên</li>
                                            </ul>
                                            <h4 class="rbt-card-title">
                                                <a href="{{ route('client.course_detail', ['slug' => $course->slug]) }}">{{ $course->title }}</a>
                                            </h4>
                                            <p class="rbt-card-text">{{ $course->description }}</p>
                                            <div class="rbt-review">
                                                <div class="rating">
                                                    @for($i = 1; $i <= ceil($course->reviews->avg('rating')); $i++)
                                                        <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                                    @endfor
                                                    @for($i = 1; $i <= 5 - ceil($course->reviews->avg('rating')); $i++)
                                                        <i class="fa-solid fa-star" style="color: #0F0F0F;"></i>
                                                    @endfor
                                                </div>
                                                <span class="rating-count">({{ $course->reviews->count() }} Đánh giá)</span>
                                            </div>
                                            <div class="rbt-card-bottom">
{{--                                                <div class="rbt-price">--}}
{{--                                                    <span class="current-price">₫ {{ number_format($course->price, 0) }}</span>--}}
{{--                                                    <span class="off-price">$120</span>--}}
{{--                                                </div>--}}
                                                <a class="rbt-btn-link" href="{{ route('client.course_detail', ['slug' => $course->slug]) }}">Xem chi tiết<i class="feather-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="rbt-swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
