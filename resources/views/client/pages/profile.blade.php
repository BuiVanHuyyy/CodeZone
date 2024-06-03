@extends('client.layout.master')

@section('content')
    <div class="rbt-page-banner-wrapper">
        <!-- Start Banner BG Image  -->
        <div class="rbt-banner-image"></div>
        <!-- End Banner BG Image  -->
    </div>
    <div class="rbt-dashboard-area rbt-section-overlayping-top rbt-section-gapBottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Start Dashboard Top  -->
                    <div class="rbt-dashboard-content-wrapper">
                        <div class="tutor-bg-photo bg_image bg_image--22 height-350">
                        </div>
                        <!-- Start Tutor Information  -->
                        <div class="rbt-tutor-information">
                            <div class="rbt-tutor-information-left">
                                <div class="thumbnail rbt-avatars size-lg">
                                    <img
                                        src="{{ !is_null($instructor->avatar) || file_exists($instructor->avatar) ? $instructor->avatar : asset('client_assets/images/avatar/default-avatar.png') }}"
                                        alt="Instructor">
                                </div>
                                <div class="tutor-content">
                                    <h5 class="title">{{ $instructor->name }}</h5>
                                    <div class="rbt-review">
                                        <div class="rating">
                                            @for($i = 1; $i <= ceil($instructorRating); $i++)
                                                <i class="fas fa-star"></i>
                                            @endfor
                                            @for($i = 1; $i <= 5 - ceil($instructorRating); $i++)
                                                <i class="far fa-star" style="color: #1a1e21;"></i>
                                            @endfor
                                        </div>
                                        <span class="rating-count"> ({{ $instructor->instructor->reviews->count() }} đánh giá)</span>
                                    </div>
                                    <ul class="rbt-meta rbt-meta-white mt--5">
                                        <li>
                                            <i class="feather-book"></i>{{ $instructor->instructor->courses->where('status', 'approved')->count() }}
                                            khóa học
                                        </li>
                                        @php
                                            $students = 0;
                                            foreach($instructor->instructor->courses()->with('students') as $course) {
                                                $students += $course->students->where('status', 'paid')->count();
                                            }
                                        @endphp
                                        <li><i class="feather-users"></i>{{ $students }} học viên</li>
                                        <li>
                                            <i class="fa-solid fa-blog"></i>{{ $instructor->instructor->blogs->where('status', 'approved')->count() }}
                                            bài blog
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Tutor Information  -->
                    </div>
                    <!-- End Dashboard Top  -->
                </div>
                <div class="col-lg-12 position-relative">
                    <div class="row g-5">
                        <div class="col-lg-4">
                            <div
                                class="course-sidebar sticky-top rbt-shadow-box course-sidebar-top rbt-gradient-border">
                                <div class="inner">
                                    <div class="content-item-content">
                                        <div class="rbt-widget-details">
                                            <h4 class="rbt-title-style-3 mb-0 pb-0" style="border-bottom: none">Giới
                                                thiệu</h4>
                                            <ul class="rbt-course-details-list-wrapper">
                                                <li>
                                                    <p class="mt--10 mb--20 text-center">{{ $instructor->instructor->bio }}</p>
                                                </li>
                                                <li>
                                                    <span>Số điện thoại: </span>
                                                    <span class="rbt-feature-value"><a
                                                            href="tel:{{ $instructor->instructor->phone_number }}">{{ $instructor->instructor->phone_number }}</a></span>
                                                </li>
                                                <li>
                                                    <span>Email</span>
                                                    <span class="rbt-feature-value"><a
                                                            href="mailto:{{ $instructor->email }}">{{ $instructor->email }}</a></span>
                                                </li>
                                                <li>
                                                    <span>Công việc: </span>
                                                    <span
                                                        class="rbt-feature-value">{{ $instructor->instructor->current_job }}</span>
                                                </li>
                                                <li>
                                                    <span>Ngày tham gia: </span>
                                                    <span
                                                        class="rbt-feature-value">{{ date_format(date_create($instructor->created_at), 'd/m/Y')  }}</span>
                                                </li>
                                                @if($instructor->instructor->facebook)
                                                    <li><span>Facebook: </span><span><a target="_blank"
                                                                                        href="{{ $instructor->facebook }}"><i
                                                                    class="feather-facebook"></i></a></span></li>
                                                @endif
                                                @if($instructor->instructor->github)
                                                    <li><span>Github</span> <span><a target="_blank"
                                                                                     href="{{ $instructor->github }}"><i
                                                                    class="feather-github"></i></a></span></li>
                                                @endif
                                                @if($instructor->instructor->linkedin)
                                                    <li><span>Linkedin: </span> <span><a target="_blank"
                                                                                         href="{{ $instructor->linkedin }}"><i
                                                                    class="feather-linkedin"></i></a></span></li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="rbt-review-wrapper rbt-shadow-box review-wrapper mt--30" id="review">
                                    <div class="course-content">
                                        <div class="section-title">
                                            <h4 class="rbt-title-style-3">Đánh giá</h4>
                                        </div>
                                        <div class="row g-5 align-items-center">
                                            <div class="col-lg-3">
                                                <div class="rating-box">
                                                    <div
                                                        class="rating-number">{{ number_format($instructorRating, 1) }}</div>
                                                    <div class="rating">
                                                        @for($i = 1; $i <= ceil($instructorRating); $i++)
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                 height="16" fill="currentColor" class="bi bi-star-fill"
                                                                 viewBox="0 0 16 16">
                                                                <path
                                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                            </svg>
                                                        @endfor
                                                        @for($i = 1; $i <= 5 - ceil($instructorRating); $i++)
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                 height="16" fill="currentColor" class="bi bi-star"
                                                                 viewBox="0 0 16 16">
                                                                <path
                                                                    d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                                            </svg>
                                                        @endfor
                                                    </div>
                                                    <span class="sub-title">Rating giáo viên</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                @php
                                                    $five_star = $instructor->instructor->reviews->where('rating', 5)->count();
                                                    $four_star = $instructor->instructor->reviews->where('rating', 4)->count();
                                                    $three_star = $instructor->instructor->reviews->where('rating', 3)->count();
                                                    $two_star = $instructor->instructor->reviews->where('rating', 2)->count();
                                                    $one_star = $instructor->instructor->reviews->where('rating', 1)->count();
                                                    $total = $five_star + $four_star + $three_star + $two_star + $one_star;
                                                    if ($total > 0) {
                                                        $one_star = ($one_star / $total) * 100;
                                                        $two_star = ($two_star / $total) * 100;
                                                        $three_star = ($three_star / $total) * 100;
                                                        $four_star = ($four_star / $total) * 100;
                                                        $five_star = ($five_star / $total) * 100;
                                                    }
                                                @endphp
                                                <div class="review-wrapper">
                                                    <div class="single-progress-bar">
                                                        <div class="rating-text">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                 height="16" fill="currentColor" class="bi bi-star-fill"
                                                                 viewBox="0 0 16 16">
                                                                <path
                                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                            </svg>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                 height="16" fill="currentColor" class="bi bi-star-fill"
                                                                 viewBox="0 0 16 16">
                                                                <path
                                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                            </svg>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                 height="16" fill="currentColor" class="bi bi-star-fill"
                                                                 viewBox="0 0 16 16">
                                                                <path
                                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                            </svg>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                 height="16" fill="currentColor" class="bi bi-star-fill"
                                                                 viewBox="0 0 16 16">
                                                                <path
                                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                            </svg>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                 height="16" fill="currentColor" class="bi bi-star-fill"
                                                                 viewBox="0 0 16 16">
                                                                <path
                                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                            </svg>
                                                        </div>
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar"
                                                                 style="width: {{ number_format($five_star, 1) }}%"
                                                                 aria-valuenow="{{ number_format($five_star, 1) }}"
                                                                 aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <span
                                                            class="value-text">{{ number_format($five_star, 1) }}%</span>
                                                    </div>

                                                    <div class="single-progress-bar">
                                                        <div class="rating-text">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                 height="16" fill="currentColor" class="bi bi-star-fill"
                                                                 viewBox="0 0 16 16">
                                                                <path
                                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                            </svg>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                 height="16" fill="currentColor" class="bi bi-star-fill"
                                                                 viewBox="0 0 16 16">
                                                                <path
                                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                            </svg>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                 height="16" fill="currentColor" class="bi bi-star-fill"
                                                                 viewBox="0 0 16 16">
                                                                <path
                                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                            </svg>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                 height="16" fill="currentColor" class="bi bi-star-fill"
                                                                 viewBox="0 0 16 16">
                                                                <path
                                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                            </svg>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                 height="16" fill="currentColor" class="bi bi-star"
                                                                 viewBox="0 0 16 16">
                                                                <path
                                                                    d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                                            </svg>
                                                        </div>
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar"
                                                                 style="width: {{ number_format($four_star, 1) }}%"
                                                                 aria-valuenow="{{ number_format($five_star, 0) }}"
                                                                 aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <span
                                                            class="value-text">{{ number_format($four_star, 1) }}%</span>
                                                    </div>

                                                    <div class="single-progress-bar">
                                                        <div class="rating-text">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                 height="16" fill="currentColor" class="bi bi-star-fill"
                                                                 viewBox="0 0 16 16">
                                                                <path
                                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                            </svg>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                 height="16" fill="currentColor" class="bi bi-star-fill"
                                                                 viewBox="0 0 16 16">
                                                                <path
                                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                            </svg>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                 height="16" fill="currentColor" class="bi bi-star-fill"
                                                                 viewBox="0 0 16 16">
                                                                <path
                                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                            </svg>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                 height="16" fill="currentColor" class="bi bi-star"
                                                                 viewBox="0 0 16 16">
                                                                <path
                                                                    d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                                            </svg>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                 height="16" fill="currentColor" class="bi bi-star"
                                                                 viewBox="0 0 16 16">
                                                                <path
                                                                    d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                                            </svg>
                                                        </div>
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar"
                                                                 style="width: {{ number_format($three_star, 1) }}%"
                                                                 aria-valuenow="{{ number_format($three_star, 1) }}"
                                                                 aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <span
                                                            class="value-text">{{ number_format($three_star, 1) }}%</span>
                                                    </div>

                                                    <div class="single-progress-bar">
                                                        <div class="rating-text">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                 height="16" fill="currentColor" class="bi bi-star-fill"
                                                                 viewBox="0 0 16 16">
                                                                <path
                                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                            </svg>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                 height="16" fill="currentColor" class="bi bi-star-fill"
                                                                 viewBox="0 0 16 16">
                                                                <path
                                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                            </svg>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                 height="16" fill="currentColor" class="bi bi-star"
                                                                 viewBox="0 0 16 16">
                                                                <path
                                                                    d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                                            </svg>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                 height="16" fill="currentColor" class="bi bi-star"
                                                                 viewBox="0 0 16 16">
                                                                <path
                                                                    d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                                            </svg>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                 height="16" fill="currentColor" class="bi bi-star"
                                                                 viewBox="0 0 16 16">
                                                                <path
                                                                    d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                                            </svg>
                                                        </div>
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar"
                                                                 style="width: {{ number_format($two_star, 1) }}%"
                                                                 aria-valuenow="{{ number_format($two_star, 0) }}"
                                                                 aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <span
                                                            class="value-text">{{ number_format($two_star, 1) }}%</span>
                                                    </div>

                                                    <div class="single-progress-bar">
                                                        <div class="rating-text">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                 height="16" fill="currentColor" class="bi bi-star-fill"
                                                                 viewBox="0 0 16 16">
                                                                <path
                                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                            </svg>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                 height="16" fill="currentColor" class="bi bi-star"
                                                                 viewBox="0 0 16 16">
                                                                <path
                                                                    d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                                            </svg>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                 height="16" fill="currentColor" class="bi bi-star"
                                                                 viewBox="0 0 16 16">
                                                                <path
                                                                    d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                                            </svg>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                 height="16" fill="currentColor" class="bi bi-star"
                                                                 viewBox="0 0 16 16">
                                                                <path
                                                                    d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                                            </svg>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                 height="16" fill="currentColor" class="bi bi-star"
                                                                 viewBox="0 0 16 16">
                                                                <path
                                                                    d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                                            </svg>
                                                        </div>
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar"
                                                                 style="width: {{ number_format($one_star, 1) }}%"
                                                                 aria-valuenow="{{ number_format($one_star, 0) }}"
                                                                 aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <span
                                                            class="value-text">{{ number_format($one_star, 1) }}%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="about-author-list rbt-shadow-box featured-wrapper mt--30 has-show-more">
                                    <div class="has-show-more-inner-content rbt-featured-review-list-wrapper">
                                        @php
                                            $isReviewed = false;
                                        @endphp
                                        @foreach($instructor->instructor->reviews as $review)
                                            <div class="rbt-course-review about-author">
                                                <div class="media">
                                                    <div class="thumbnail">
                                                        <img
                                                            src="{{ $review->user->avatar ?? asset('client_assets/images/avatar/default-avatar.png') }}"
                                                            alt="Author Images">
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="author-info">
                                                            <h5 class="title">
                                                                <a class="hover-flip-item-wrapper" href="#">
                                                                    {{ $review->user->name }}
                                                                </a>
                                                            </h5>
                                                            <div class="rating">
                                                                @for($i = 0; $i < $review->rating; $i++)
                                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                                @endfor
                                                                @for($i = 0; $i < 5 - $review->rating; $i++)
                                                                    <a href="#"><i class="fa fa-star"
                                                                                   style="color: #1a1e21"></i></a>
                                                                @endfor
                                                            </div>
                                                        </div>
                                                        <div class="content">
                                                            <p class="description">{{ $review->content }}</p>
                                                            <ul class="social-icon social-default transparent-with-border justify-content-start">
                                                                <li>
                                                                    @php
                                                                        $is_active = false;
                                                                        if (\Illuminate\Support\Facades\Auth::check()) {
                                                                            foreach (\Illuminate\Support\Facades\Auth::user()->likes as $like) {
                                                                                if ($like['likeable_id'] == $review->id) {
                                                                                    $is_active = true;
                                                                                    break;
                                                                                }
                                                                            }
                                                                        }
                                                                    @endphp
                                                                    <a class="like_btn {{ $is_active ? 'active' : '' }}"
                                                                       data-url="{{ route('client.like', [$review->id, 'review']) }}"
                                                                       href="#">
                                                                        <i class="feather-thumbs-up"></i>
                                                                    </a>
                                                                    <span
                                                                        class="like_qty">{{ $review->like_amount }}</span>
                                                                </li>
                                                                <li>
                                                                    @php
                                                                        $is_active = false;
                                                                        if (\Illuminate\Support\Facades\Auth::check()) {
                                                                            foreach (\Illuminate\Support\Facades\Auth::user()->dislikes as $dislike) {
                                                                                if ($dislike['dislikeable_id'] == $review->id) {
                                                                                    $is_active = true;
                                                                                    break;
                                                                                }
                                                                            }
                                                                        }
                                                                    @endphp
                                                                    <a class="dislike_btn {{ $is_active ? 'active' : '' }}"
                                                                       data-url="{{ route('client.dislike', [$review->id, 'review']) }}"
                                                                       href="#">
                                                                        <i class="feather-thumbs-down"></i>
                                                                    </a>
                                                                    <span
                                                                        class="dislike_qty">{{ $review->dislike_amount }}</span>
                                                                </li>
                                                            </ul>
                                                            @if(Auth::check() && Auth::id() == $review->user->id)
                                                                @php
                                                                    $isReviewed = true;
                                                                @endphp
                                                                <div class="position-absolute"
                                                                     style="top: 10px; right: 10px">
                                                                    <form id="deleteForm"
                                                                          action="{{ route('client.review.destroy', [$review->id]) }}"
                                                                          method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <a id="deleteButton" href=""><i
                                                                                class="fa-solid fa-trash"></i></a>
                                                                    </form>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="rbt-show-more-btn">Xem thêm</div>
                                    @if(Auth::check() && $isStudent && !$isReviewed && Auth::user()->role != 'instructor')
                                        <div id="review-respond" class="review-respond">
                                            <h4 class="title">Thêm đánh giá của bạn về giảng viên</h4>
                                            <form id="reviewForm" method="post"
                                                  action="{{ route('client.review.store', ['instructor', $instructor->id]) }}">
                                                @csrf
                                                <div class="star_count">
                                                    @for($i = 1; $i <= 5; $i++)
                                                        <i class="fa fa-star" data-rating="{{ $i }}"></i>
                                                    @endfor
                                                    <input type="hidden" value="" name="rating" id="rating">
                                                    @error('rating')
                                                    <p style="font-size: 12px" class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="row row--10">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="message">Viết đánh giá của bạn</label>
                                                            <textarea id="message" name="review_content"></textarea>
                                                            @error('review_content')
                                                            <p style="font-size: 12px"
                                                               class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <button type="submit"
                                                                class="rbt-btn btn-gradient icon-hover radius-round btn-md">
                                                            <span class="btn-text">Đăng đánh giá</span>
                                                            <span class="btn-icon"><i
                                                                    class="feather-arrow-right"></i></span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="rbt-profile-course-area mt--60">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="sction-title">
                            <h2 class="rbt-title-style-3">Các khóa học của giảng viên <span
                                    class="color-primary">{{ $instructor->name }}</span></h2>
                        </div>
                    </div>
                </div>
                <div class="row g-5 mt--5">
                    <div class="row">
                        <div class="col-lg-12">
                            <div
                                class="swiper category-activation-three rbt-arrow-between icon-bg-gray gutter-swiper-30 ptb--20">
                                <div class="swiper-wrapper">
                                    @foreach($instructor->instructor->courses()->with(['category', 'subjects', 'students', 'reviews'])->where('status', 'approved')->orderBy('created_at')->get() as $course)
                                        <div class="swiper-slide">
                                            <div class="single-slide">
                                                <div class="rbt-cat-box rbt-cat-box-1 variation-2 text-center">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="{{ route('client.course_detail', [$course->slug]) }}">
                                                                <img
                                                                    src="{{ !is_null($course->thumbnail) || file_exists($course->thumbnail) ? $course->thumbnail : asset('client_assets/images/avatar/default_course_thumbnail.png') }}"
                                                                    alt="Course thumbnail">
                                                            </a>
                                                        </div>
                                                        <div class="content text-start">
                                                            <div class="rbt-review mt-2">
                                                                <div class="rating">
                                                                    @if($course->reviews->count() == 0)
                                                                        <span class="rating-count">Khóa học chưa có đánh giá</span>
                                                                    @else
                                                                        @for($i = 0; $i < ceil($course->reviews->avg('rating')) ; $i++)
                                                                            <i class="fas fa-star"></i>
                                                                        @endfor
                                                                        @for($i = 0; $i < 5 - ceil($course->reviews->avg('rating')) ; $i++)
                                                                            <i class="fas fa-star"
                                                                               style="color: #ccc"></i>
                                                                        @endfor
                                                                        <span class="rating-count"> ({{ $course->reviews->count() }} đánh giá)</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <h5 class="title"><a
                                                                    href="{{ route('client.course_detail', [$course->slug]) }}">{{ $course->title }}</a>
                                                            </h5>
                                                            <ul class="rbt-meta">
                                                                <li>
                                                                    <i class="feather-book"></i>{{ $course->subjects->count() }}
                                                                    bài học
                                                                </li>
                                                                <li>
                                                                    <i class="feather-users"></i>{{ $course->students->where('status', 'paid')->count() }}
                                                                    học viên
                                                                </li>
                                                            </ul>
                                                            <div class="read-more-btn">
                                                                <span
                                                                    class="current-price color-danger">₫ {{ number_format($course->price, 0) }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="rbt-swiper-arrow rbt-arrow-left">
                                    <div class="custom-overfolow">
                                        <i class="rbt-icon feather-arrow-left"></i>
                                        <i class="rbt-icon-top feather-arrow-left"></i>
                                    </div>
                                </div>

                                <div class="rbt-swiper-arrow rbt-arrow-right">
                                    <div class="custom-overfolow">
                                        <i class="rbt-icon feather-arrow-right"></i>
                                        <i class="rbt-icon-top feather-arrow-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if($instructor->instructor->blogs->count() != 0)
                <div class="rbt-profile-course-area mt--60">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sction-title">
                                <h2 class="rbt-title-style-3">Các bài blog của giảng viên <span
                                        class="color-primary">{{ $instructor->name }}</span></h2>
                                <div class="container">
                                    <div class="row g-5">
                                        @foreach($instructor->instructor->blogs->where('status', 'approved') as $blog)
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div
                                                    class="rbt-card card-list-2 event-list-card variation-01 rbt-hover">
                                                    <div class="rbt-card-img">
                                                        <a href="{{ route('client.blog_detail', [$blog->slug]) }}">
                                                            <img
                                                                src="{{ '/client_assets/images/blog/' . $blog->thumbnail }}"
                                                                alt="Card image">
                                                        </a>
                                                    </div>
                                                    <div class="rbt-card-body">
                                                        <h4 class="rbt-card-title"><a
                                                                href="{{ route('client.blog_detail', [$blog->slug]) }}">{{ $blog->title }}</a>
                                                        </h4>
                                                        <ul class="rbt-meta">
                                                            <li>
                                                                <i class="feather-calendar"></i>{{ date_format(date_create($blog->created_at), 'd/m/Y') }}
                                                            </li>
                                                        </ul>
                                                        <div class="read-more-btn">
                                                            <a class="rbt-btn btn-border hover-icon-reverse btn-sm radius-round"
                                                               href="{{ route('client.blog_detail', [$blog->slug]) }}">
                                                                <span class="icon-reverse-wrapper">
                                                                    <span class="btn-text">Xem bài blog</span>
                                                                <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                                                <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                                                </span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@if(Auth::check())
    @section('cus_css')
        <style>
            .rbt-header .rbt-header-wrapper.rbt-sticky {
                position: absolute;
            }

            .star_count i.fa-star {
                color: #ccc;
                font-size: 30px;
            }

            .star_count i.fa-star.checked {
                color: orange;
            }
        </style>
    @endsection
    @section('cus_js')
        <script>
            // Xử lý sự kiện khi bấm vào nút 'like'
            $('.like_btn').click(function (event) {
                event.preventDefault();
                let $likeBtn = $(this);
                let likeUrl = $likeBtn.data('url');
                $.ajax({
                    url: likeUrl,
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        if (response.success) {
                            let $likeQty = $likeBtn.next('.like_qty');
                            let $dislikeQty = $likeBtn.parent().siblings().find('.dislike_qty');
                            let $dislikeBtn = $likeBtn.parent().siblings('.dislike_btn');

                            if ($dislikeBtn.hasClass('active')) {
                                $dislikeBtn.removeClass('active');
                            }

                            $likeQty.text(response.like_amount);
                            $dislikeQty.text(response.dislike_amount);
                            $likeBtn.toggleClass('active');
                        }
                    },
                })
            })
            // Xử lý sự kiện khi bấm vào nút 'dislike'
            $('.dislike_btn').click(function (event) {
                event.preventDefault();
                let $dislikeBtn = $(this);
                let dislikeUrl = $dislikeBtn.data('url');
                $.ajax({
                    url: dislikeUrl,
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        if (response.success) {
                            let $dislikeQty = $dislikeBtn.next('.dislike_qty');
                            let $likeQty = $dislikeBtn.parent().siblings().find('.like_qty');
                            let $likeBtn = $dislikeBtn.parent().find('.like_btn');
                            if ($likeBtn.hasClass('active')) {
                                $likeBtn.removeClass('active');
                            }
                            $dislikeQty.text(response.dislike_amount);
                            $likeQty.text(response.like_amount);
                            $dislikeBtn.toggleClass('active');
                        }
                    },
                })
            })
            $('.fa-star').on('click', function () {
                var rating = $(this).data('rating');
                $('#rating').val(rating);

// Highlight the stars
                $('.fa-star').each(function () {
                    if ($(this).data('rating') <= rating) {
                        $(this).addClass('checked');
                    } else {
                        $(this).removeClass('checked');
                    }
                });
                $('input[name="rating"]').val(rating);
            });
            let msg = "{{ session('msg') }}";
            let i = "{{ session('i') }}";
            if (msg) {
                Swal.fire({
                    position: "top-end",
                    icon: i,
                    title: msg,
                    showConfirmButton: false,
                    timer: 1000
                });
            }
            $('#deleteButton').on('click', function (e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Bạn có chắc chắn muốn xóa không?',
                    showDenyButton: true,
                    confirmButtonText: 'Xóa',
                    denyButtonText: 'Hủy',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#deleteForm').submit();
                    }
                });
            });
        </script>
    @endsection
@endif
