<div class="rbt-dashboard-content-wrapper">
    <div
        class="tutor-bg-photo bg_image bg_image--6 height-350"
    ></div>
    <!-- Start Tutor Information  -->
    <div class="rbt-tutor-information">
        <div class="rbt-tutor-information-left">
            <div class="thumbnail rbt-avatars size-lg">
                <img src="{{ Auth::user()->instructors->avatar ?? asset('client_assets/images/avatar/default-avatar.png') }}" alt="Instructor"/>
            </div>
            <div class="tutor-content">
                <h5 class="title">{{ Auth::user()->name }}</h5>
                <div class="rbt-review">
                    <div class="rating">
                        @php
                            $reviews = \App\Models\Review::where('reviewable_type', 'instructor')->where('reviewable_id', Auth::user()->instructors->id)->get();
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
                            <i class="fas fa-star" style="color: #0b0b0b"></i>
                        @endfor
                    </div>
                    <span class="rating-count">({{ $reviews->count() }} Reviews)</span>
                </div>
            </div>
        </div>
        <div class="rbt-tutor-information-right">
            <div class="tutor-btn">
                <a class="rbt-btn btn-md hover-icon-reverse" href="{{ route('instructor.create_course') }}">
                    <span class="icon-reverse-wrapper">
                        <span class="btn-text">Tạo một khóa học mới</span>
                        <span class="btn-icon">
                            <i class="feather-arrow-right"></i></span>
                        <span class="btn-icon">
                            <i class="feather-arrow-right"></i>
                        </span>
                    </span>
                </a>
            </div>
        </div>
    </div>
    <!-- End Tutor Information  -->
</div>
