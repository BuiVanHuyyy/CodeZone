@php use Illuminate\Support\Facades\Auth; @endphp
@extends('client.layout.master')
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
@section('content')
        <!-- Start breadcrumb Area -->
    <div class="rbt-breadcrumb-default rbt-breadcrumb-style-3">
        <div class="breadcrumb-inner">
            <img src="{{ asset('client_assets/images/bg/bg-image-10.jpg') }}" alt="Education Images"/>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="content text-start">
                        <h2 class="title">{{ $course->title }}</h2>
                        <p class="description">{{ $course->description }}</p>

                        <div class="d-flex align-items-center mb--20 flex-wrap rbt-course-details-feature">
                            <div class="feature-sin best-seller-badge">
                                    <span class="rbt-badge-2">
                                        <span class="image">
                                            <img src="{{ asset('client_assets/images/icons/card-icon-1.png') }}"
                                                 alt="Best Seller Icon"/>
                                        </span>
                                        Bestseller
                                    </span>
                            </div>

                            <div class="feature-sin rating">
                                @for($i = 1; $i <= ceil($course->reviews->avg('rating') ?? 0); $i++)
                                    <i class="fa-solid fa-star"></i>
                                @endfor
                                @for($i = 1; $i <= 5 - ceil($course->reviews->avg('rating') ?? 0); $i++)
                                    <i class="fa-solid fa-star" style="color: #0F0F0F;"></i>
                                @endfor
                            </div>

                            <div class="feature-sin total-rating">
                                <p class="rbt-badge-4"  >{{ $course->reviews->count() }} đánh giá</p>
                            </div>

                            <div class="feature-sin total-student">
                                <span>{{ $course->students->where('status', 'paid')->count() }} học viên</span>
                            </div>
                        </div>

                        <div class="rbt-author-meta mb--20">
                            <div class="rbt-avater">
                                <a href="{{ route('instructor.profile', [$course->author->user->slug]) }}">
                                    <img
                                        src="{{ $course->author->user->avatar ?? asset('client_assets/images/avatar/default-avatar.png') }}"
                                        alt="{{ $course->author->user->name }} avatar"/>
                                </a>
                            </div>
                            <div class="rbt-author-info">
                                bỡi
                                <a href="{{ route('instructor.profile', [$course->author->user->slug]) }}">{{ $course->author->user->name }}</a>
                                thuộc danh mục
                                <a href="#">{{ $course->category->title }}</a>
                            </div>
                        </div>

                        <ul class="rbt-meta">
                            <li>
                                <i class="feather-calendar"></i>Tạo vào
                                lúc {{ date_format(date_create($course->created_at), 'd/m/Y') }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb Area -->

    <div class="rbt-course-details-area ptb--60">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-8">
                    <div class="course-details-content">
                        <div class="rbt-course-feature-box rbt-shadow-box thumbnail">
                            <img class="w-100"
                                 src="{{ $course->thumbnail ?? asset('client_assets/images/avatar/default_course_thumbnail.png') }}"
                                 alt="Course Thumbnail"/>
                        </div>

                        <div class="rbt-inner-onepage-navigation sticky-top mt--30">
                            <nav class="mainmenu-nav onepagenav">
                                <ul class="mainmenu">
                                    <li class="current">
                                        <a href="#overview">Tổng quan</a>
                                    </li>
                                    <li>
                                        <a href="#coursecontent">Học phần</a>
                                    </li>
                                    <li>
                                        <a href="#itructor">Giảng viên</a>
                                    </li>
                                    <li>
                                        <a href="#review">Đánh giá</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>

                        <!-- Start Course Feature Box  -->
                        <div class="rbt-course-feature-box overview-wrapper rbt-shadow-box mt--30 has-show-more"
                             id="overview">
                            <div class="rbt-course-feature-inner has-show-more-inner-content">
                                <div class="section-title">
                                    <h4 class="rbt-title-style-3">
                                        Bạn sẽ học được gì
                                    </h4>
                                </div>
                                <p>
                                    Are you new to PHP or need a refresher?
                                    Then this course will help you get all
                                    the fundamentals of Procedural PHP,
                                    Object Oriented PHP, MYSQLi and ending
                                    the course by building a CMS system
                                    similar to WordPress, Joomla or Drupal.
                                    Knowing PHP has allowed me to make
                                    enough money to stay home and make
                                    courses like this one for students all
                                    over the world.
                                </p>

                                <div class="row g-5 mb--30">
                                    <!-- Start Feture Box  -->
                                    <div class="col-lg-6">
                                        <ul class="rbt-list-style-1">
                                            <li>
                                                <i class="feather-check"></i
                                                >Become an advanced,
                                                confident, and modern
                                                JavaScript developer from
                                                scratch.
                                            </li>
                                            <li>
                                                <i class="feather-check"></i
                                                >Have an intermediate skill
                                                level of Python programming.
                                            </li>
                                            <li>
                                                <i class="feather-check"></i
                                                >Have a portfolio of various
                                                data analysis projects.
                                            </li>
                                            <li>
                                                <i class="feather-check"></i
                                                >Use the numpy library to
                                                create and manipulate
                                                arrays.
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- End Feture Box  -->

                                    <!-- Start Feture Box  -->
                                    <div class="col-lg-6">
                                        <ul class="rbt-list-style-1">
                                            <li>
                                                <i class="feather-check"></i
                                                >Use the Jupyter Notebook
                                                Environment. JavaScript
                                                developer from scratch.
                                            </li>
                                            <li>
                                                <i class="feather-check"></i
                                                >Use the pandas module with
                                                Python to create and
                                                structure data.
                                            </li>
                                            <li>
                                                <i class="feather-check"></i
                                                >Have a portfolio of various
                                                data analysis projects.
                                            </li>
                                            <li>
                                                <i class="feather-check"></i
                                                >Create data visualizations
                                                using matplotlib and the
                                                seaborn.
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- End Feture Box  -->
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur,
                                    adipisicing elit. Omnis, aliquam
                                    voluptas laudantium incidunt architecto
                                    nam excepturi provident rem laborum
                                    repellendus placeat neque aut doloremque
                                    ut ullam, veritatis nesciunt iusto
                                    officia alias, non est vitae. Eius
                                    repudiandae optio quam alias aperiam
                                    nemo nam tempora, dignissimos dicta
                                    excepturi ea quo ipsum omnis maiores
                                    perferendis commodi voluptatum facere
                                    vel vero. Praesentium quisquam iure
                                    veritatis, perferendis adipisci sequi
                                    blanditiis quidem porro eligendi fugiat
                                    facilis inventore amet delectus expedita
                                    deserunt ut molestiae modi laudantium,
                                    quia tenetur animi natus ea. Molestiae
                                    molestias ducimus pariatur et
                                    consectetur. Error vero, eum soluta
                                    delectus necessitatibus eligendi numquam
                                    hic at?
                                </p>
                            </div>
                            <div class="rbt-show-more-btn">Xem thêm</div>
                        </div>
                        <!-- End Course Feature Box  -->

                        <!-- Start Course Content  -->
                        <div class="course-content rbt-shadow-box coursecontent-wrapper mt--30" id="coursecontent">
                            <div class="rbt-course-feature-inner">
                                <div class="section-title">
                                    <h4 class="rbt-title-style-3">
                                        Nội dung học phần
                                    </h4>
                                </div>
                                <div class="rbt-accordion-style rbt-accordion-02 accordion">
                                    <div class="accordion" id="accordionExample2">
                                        @foreach($course->subjects()->with('lessons')->get()->sortBy('order') as $subject)
                                            <div class="accordion-item card">
                                                <h2 class="accordion-header card-header"
                                                    id="headingTwo{{ $loop->iteration }}">
                                                    <button class="accordion-button" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#collapseTwo{{ $loop->iteration }}"
                                                            aria-expanded="{{ $loop->iteration === 1 ? 'true' : 'false'}}"
                                                            aria-controls="collapseTwo1">{{ $subject->title }}<span
                                                            class="rbt-badge-5 ml--10">1hr 30min</span>
                                                    </button>
                                                </h2>
                                                <div id="collapseTwo{{ $loop->iteration }}"
                                                     class="accordion-collapse collapse show"
                                                     aria-labelledby="headingTwo{{ $loop->iteration }}"
                                                     data-bs-parent="#accordionExampleb2">
                                                    <div class="accordion-body card-body pr--0">
                                                        <ul class="rbt-course-main-content liststyle">
                                                            @foreach($subject->lessons->sortBy('order') as $lesson)
                                                                <li>
                                                                    <a href="">
                                                                        <div class="course-content-left">
                                                                            {!! $lesson->video ? '<i class="feather-play-circle"></i>' : '<i class="fa-regular fa-file"></i>' !!}
                                                                            <span
                                                                                class="text">{{ $lesson->title }}</span>
                                                                        </div>
                                                                        <div class="course-content-right">
                                                                            <span class="min-lable">30m in</span>
                                                                            @if($lesson->is_preview)
                                                                                <span
                                                                                    class="rbt-badge variation-03 bg-primary-opacity">
                                                                                    <i class="feather-eye"></i>Preview
                                                                                </span>
                                                                            @else
                                                                                <span class="course-lock">
                                                                                    <i class="feather-lock"></i>
                                                                                </span>
                                                                            @endif
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Course Content  -->

                        <!-- Start Instructor Area  -->
                        <div class="rbt-instructor rbt-shadow-box instructor-wrapper mt--30" id="itructor">
                            <div class="about-author border-0 pb--0 pt--0">
                                <div class="section-title mb--30">
                                    <h4 class="rbt-title-style-3">Giảng viên</h4>
                                </div>
                                <div class="media align-items-center">
                                    <div class="thumbnail">
                                        <a href="{{ route('instructor.profile', [$course->author->user->slug]) }}">
                                            <img
                                                src="{{ $course->author->user->avatar ?? asset('client_assets/images/avatar/default-avatar.png') }}"
                                                alt="{{ $course->author->user->name }} avatar"/>
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <div class="author-info">
                                            <h5 class="title">
                                                <a class="hover-flip-item-wrapper"
                                                   href="{{ route('instructor.profile', [$course->author->user->slug]) }}">{{ $course->author->user->name }}</a>
                                            </h5>
                                            <span class="b3 subtitle">{{ $course->author->current_job }}</span>
                                            <ul class="rbt-meta mb--20 mt--10">
                                                <li>
                                                    {{ number_format($course->author->reviews->avg('rating') ?? 0, 1) }}
                                                    <i
                                                        style="margin-left: 5px"
                                                        class="fa fa-star color-warning"></i>
                                                    <span class="rbt-badge-5 ml--5">Rating</span>
                                                    {{ number_format($course->author->reviews->count()) }}
                                                    đánh giá
                                                </li>
                                                <li>
                                                    @php
                                                        // Get total students of all courses of this author
                                                        $totalStudents = $course->author->courses->sum(function ($course) {
                                                            return $course->students->where('status', 'paid')->count();
                                                        });
                                                    @endphp
                                                    <i class="feather-users"></i>{{ $totalStudents }}
                                                    học viên
                                                </li>
                                                <li>
                                                    <i class="feather-video"></i>{{ $course->author->courses->where('status', 'approved')->count() }}
                                                    khóa học
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="content">
                                            <p class="description">
                                                {{ $course->author->bio }}
                                            </p>
                                            <ul class="social-icon social-default icon-naked justify-content-start">
                                                <li>
                                                    <a href="https://www.facebook.com/">
                                                        <i class="feather-facebook"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://www.twitter.com/">
                                                        <i class="feather-twitter"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://www.instagram.com/">
                                                        <i class="feather-instagram"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://www.linkdin.com/">
                                                        <i class="feather-linkedin"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Instructor Area  -->

                        <!-- Start Edu Review List  -->
                        <div class="rbt-review-wrapper rbt-shadow-box review-wrapper mt--30" id="review">
                            <div class="course-content">
                                <div class="section-title">
                                    <h4 class="rbt-title-style-3">Đánh giá khóa học</h4>
                                </div>
                                <div class="row g-5 align-items-center">
                                    <div class="col-lg-3">
                                        <div class="rating-box">
                                            <div class="rating-number">
                                                {{ number_format($courseRating = $course->reviews->avg('rating'), 1) }}
                                            </div>
                                            <div class="rating">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                     fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                     fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                     fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                     fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                     fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                </svg>
                                            </div>
                                            <span class="sub-title">Xếp hạnh khóa học</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-9">
                                        @php
                                            $ratings = array_fill(1, 5, 0);
                                            $totalReviews = count($course->reviews);

                                            foreach ($course->reviews as $review) {
                                                $ratings[$review->rating]++;
                                            }

                                            if ($totalReviews !== 0) {
                                                foreach ($ratings as $stars => $count) {
                                                    $ratings[$stars] = ($count / $totalReviews) * 100;
                                                }
                                            }
                                        @endphp
                                        <div class="review-wrapper">
                                            <div class="single-progress-bar">
                                                <div class="rating-text">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="currentColor" class="bi bi-star-fill"
                                                         viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="currentColor" class="bi bi-star-fill"
                                                         viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="currentColor" class="bi bi-star-fill"
                                                         viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="currentColor" class="bi bi-star-fill"
                                                         viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="currentColor" class="bi bi-star-fill"
                                                         viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                    </svg>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar"
                                                         style="width: {{ $ratings[5] }}%" aria-valuenow="63"
                                                         aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <span class="value-text">{{ number_format($ratings[5], 0) }}%</span>
                                            </div>

                                            <div class="single-progress-bar">
                                                <div class="rating-text">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="currentColor" class="bi bi-star-fill"
                                                         viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="currentColor" class="bi bi-star-fill"
                                                         viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="currentColor" class="bi bi-star-fill"
                                                         viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="currentColor" class="bi bi-star-fill"
                                                         viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                        <path
                                                            d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                                    </svg>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar"
                                                         style="width: {{ $ratings[4] }}%" aria-valuenow="29"
                                                         aria-valuemin="0" aria-valuemax="100"
                                                    ></div>
                                                </div>
                                                <span class="value-text">{{ number_format($ratings[4], 0) }}%</span>
                                            </div>

                                            <div class="single-progress-bar">
                                                <div class="rating-text">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="currentColor" class="bi bi-star-fill"
                                                         viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="currentColor" class="bi bi-star-fill"
                                                         viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="currentColor" class="bi bi-star-fill"
                                                         viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                        <path
                                                            d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                        <path
                                                            d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                                    </svg>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar"
                                                         style="width: {{ $ratings[2] }}%" aria-valuenow="6"
                                                         aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <span class="value-text">{{ number_format($ratings[3], 0) }}%</span>
                                            </div>

                                            <div class="single-progress-bar">
                                                <div class="rating-text">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="currentColor" class="bi bi-star-fill"
                                                         viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="currentColor" class="bi bi-star-fill"
                                                         viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                        <path
                                                            d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                        <path
                                                            d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                        <path
                                                            d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                                    </svg>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar"
                                                         style="width: {{ $ratings[2] }}%" aria-valuenow="1"
                                                         aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <span class="value-text">{{ number_format($ratings[2], 0) }}%</span>
                                            </div>

                                            <div class="single-progress-bar">
                                                <div class="rating-text">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="currentColor" class="bi bi-star-fill"
                                                         viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                        <path
                                                            d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                        <path
                                                            d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                        <path
                                                            d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                        <path
                                                            d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                                    </svg>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar"
                                                         style="width: {{ $ratings[1] }}%" aria-valuenow="1"
                                                         aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <span class="value-text">{{ number_format($ratings[1], 0)  }}%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Edu Review List  -->

                        <div class="about-author-list rbt-shadow-box featured-wrapper mt--30 has-show-more">
                            <div class="section-title">
                                <h4 class="rbt-title-style-3">Đánh giá</h4>
                            </div>
                            <div class="has-show-more-inner-content rbt-featured-review-list-wrapper">
                                @php
                                    $isReviewed = false;
                                @endphp

                                @foreach($course->reviews()->with('user')->get()->sortByDesc('created_at') as $review)
                                    <div class="rbt-course-review about-author position-relative">
                                        <div class="media">
                                            <div class="thumbnail">
                                                <a href="#">
                                                    <img
                                                        src="{{ $review->user->avatar ?? asset('client_assets/images/avatar/default-avatar.png') }}"
                                                        alt="{{ $review->user->name }} Images"/>
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="author-info">
                                                    <h5 class="title">
                                                        <a class="hover-flip-item-wrapper"
                                                           href="{{ route('instructor.profile', [$course->author]) }}">{{ $review->user->name }}</a>
                                                    </h5>
                                                    <div class="rating">
                                                        @for($i = 1; $i <= ceil($review->rating); $i++)
                                                            <i class="fa-solid fa-star"></i>
                                                        @endfor
                                                        @for($i = 1; $i <= 5 - $review->rating; $i++)
                                                            <i class="fa-solid fa-star" style="color: #0F0F0F;"></i>
                                                        @endfor
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <p class="description">
                                                        {{ $review->content }}
                                                    </p>
                                                    <ul class="social-icon social-default transparent-with-border justify-content-start">
                                                        <li>
                                                            @php
                                                                $is_active = false;
                                                                if (Auth::check()) {
                                                                    foreach (Auth::user()->likes as $like) {
                                                                        if ($like['dislikeable_id'] == $review->id) {
                                                                            $is_active = true;
                                                                            break;
                                                                        }
                                                                    }
                                                                }
                                                            @endphp
                                                            <a data-url="{{ route('client.like', [ $review->id, 'review']) }}"
                                                               class="{{ $is_active ? 'active' : '' }} like_btn">
                                                                <i class="feather-thumbs-up"></i>
                                                            </a>
                                                            <span class="like_amount">
                                                                {{ $review->like_amount }}
                                                            </span>
                                                        </li>
                                                        <li>
                                                            @php
                                                                $is_active = false;
                                                                if (Auth::check()) {
                                                                    foreach (Auth::user()->dislikes as $dislike) {
                                                                        if ($dislike['dislikeable_id'] == $review->id) {
                                                                            $is_active = true;
                                                                            break;
                                                                        }
                                                                    }
                                                                }
                                                            @endphp
                                                            <a class="dislike_btn {{ $is_active ? 'active' : '' }}"
                                                               data-url="{{ route('client.dislike', [$review->id, 'review']) }}">
                                                                <i class="feather-thumbs-down"></i>
                                                            </a>
                                                            <span class="dislike_amount">
                                                                {{ $review->dislike_amount }}
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                @if(Auth::check() && Auth::id() == $review->user->id)
                                                    @php
                                                        $isReviewed = true;
                                                    @endphp
                                                    <div class="position-absolute" style="top: 10px; right: 10px">
                                                        <form id="deleteForm" method="POST" action="{{ route('client.review.destroy', [Crypt::encrypt($review->id)]) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="deleteButton bg-transparent border-0" href="#"><i
                                                                    class="fa-solid fa-trash"></i></button>
                                                        </form>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="rbt-show-more-btn mb-5">Xem thêm</div>
                            @if(Auth::check() && $isBought)
                                <div id="review-respond" class="review-respond">
                                    <h4 class="title">Thêm đánh giá của bạn về khóa học</h4>
                                    <form id="reviewForm" method="post"
                                          action="{{ route('client.review.store', ['course', Crypt::encrypt($course->id)]) }}">
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
                                                    <textarea {{ $isReviewed ? 'disabled' : '' }} id="message"
                                                              name="review_content"></textarea>
                                                    @error('review_content')
                                                    <p style="font-size: 12px"
                                                       class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <button {{ $isReviewed ? 'disabled' : '' }} type="submit"
                                                        class="rbt-btn btn-gradient icon-hover radius-round btn-md">
                                                        <span
                                                            class="btn-text">{{ $isReviewed ? 'Bạn đã đánh giá rồi' : 'Đăng đánh giá' }}</span>
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
                    <div class="related-course mt--60">
                        <div class="row g-5 align-items-end mb--40">
                            <div class="col-lg-8 col-md-8 col-12">
                                <div class="section-title">
                                    <span class="subtitle bg-pink-opacity">Top Course</span>
                                    <h4 class="title">Các khóa học khác của
                                        <a href="{{ route('instructor.profile', [$course->author->user->slug]) }}"><strong
                                                class="color-primary">{{ $course->author->user->name }}</strong></a>
                                    </h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="read-more-btn text-start text-md-end">
                                    <a class="rbt-btn rbt-switch-btn btn-border btn-sm" href="#">
                                        <span data-text="View All Course">Xem tất cả</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row g-5">
                            @php
                                $i = 1;
                            @endphp
                            @if($course->author->courses()->with(['categories', 'students', 'subjects', 'author'])->where('status', 'approved')->count() >= 1)
                                @foreach($course->author->courses->where('status', 'approved') as $item)
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12" data-sal-delay="150"
                                         data-sal="slide-up" data-sal-duration="800">
                                        <div class="rbt-card variation-01 rbt-hover">
                                            <div class="rbt-card-img">
                                                <a href="{{ route('client.course_detail', [$item->slug]) }}">
                                                    <img
                                                        src="{{ $item->thumbnail ?? asset('client_assets/images/avatar/default_course_thumbnail.png') }}"
                                                        alt="Card image"/>
                                                    {{--                                                    <div class="rbt-badge-3 bg-white">--}}
                                                    {{--                                                        <span>-40%</span>--}}
                                                    {{--                                                        <span>Off</span>--}}
                                                    {{--                                                    </div>--}}
                                                </a>
                                            </div>
                                            <div class="rbt-card-body">
                                                <div class="rbt-card-top">
                                                    <div class="rating">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                    <span
                                                        class="rating-count">({{ $item->students->count() }} Reviews)</span>
                                                </div>

                                                <h4 class="rbt-card-title">
                                                    <a href="{{ route('client.course_detail', [$item->slug]) }}">{{ $item->title }}</a>
                                                </h4>

                                                <ul class="rbt-meta">
                                                    <li>
                                                        <i class="feather-book"></i>{{ $item->subjects->count() }} bài
                                                        giảng
                                                    </li>
                                                    <li>
                                                        <i class="feather-users"></i>{{ $item->students->where('status')->count() }}
                                                        học viên
                                                    </li>
                                                </ul>

                                                <p class="rbt-card-text">
                                                    {{ $item->description }}
                                                </p>
                                                <div class="rbt-author-meta mb--10">
                                                    <div class="rbt-avater">
                                                        <a href="#">
                                                            <img
                                                                src="{{ $item->author->avatar ?? asset('client_assets/images/avatar/default-avatar.png') }}"
                                                                alt="instructor"/>
                                                        </a>
                                                    </div>
                                                    <div class="rbt-author-info">
                                                        Bỡi <a
                                                            href="{{ route('instructor.profile', [$course->author]) }}"> {{ $item->author->name }}</a>
                                                        In
                                                        <a href="#">{{$item->category->title }}</a>
                                                    </div>
                                                </div>
                                                <div class="rbt-card-bottom">
                                                    <div class="rbt-price">
                                                        <span
                                                            class="current-price">₫  {{ number_format($item->price, 0) }}</span>
                                                        {{--                                                        <span class="off-price">$120</span>--}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        $i++;
                                        if ($i > 2) {
                                            break;
                                        }
                                    @endphp
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="course-sidebar sticky-top rbt-shadow-box course-sidebar-top rbt-gradient-border">
                        <div class="inner">
                            <!-- Start Video Wrapper  -->
                            <a class="video-popup-with-text video-popup-wrapper text-center popup-video sidebar-video-hidden mb--15"
                               href="https://www.youtube.com/watch?v=nA1Aqp0sPQo">
                                <div class="video-content">
                                    <img class="w-100 rbt-radius"
                                         src="{{ asset('client_assets/images/others/video-01.jpg') }}"
                                         alt="Video Images"/>
                                    <div class="position-to-top">
                                            <span class="rbt-btn rounded-player-2 with-animation">
                                                <span class="play-icon"></span>
                                            </span>
                                    </div>
                                    <span class="play-view-text d-block color-white">
                                        <i class="feather-eye"></i> Preview this course</span>
                                </div>
                            </a>
                            <!-- End Viedo Wrapper  -->

                            <div class="content-item-content">
                                <div
                                    class="rbt-price-wrapper d-flex flex-wrap align-items-center justify-content-between">
                                    <div class="rbt-price">
                                        <span class="current-price">₫ {{ number_format($course->price, 0) }}</span>
                                        {{--                                        <span class="off-price">$84.99</span>--}}
                                    </div>
                                    <div class="discount-time">
                                            <span class="rbt-badge color-danger bg-color-danger-opacity">
                                                <i class="feather-clock"></i> 3 ngày cuối!
                                            </span>
                                    </div>
                                </div>
                                @if($isBought)
                                    <div class="add-to-card-button mt--15">
                                        <a href="{{ route('course.index', $course->slug) }}"
                                           class="add-to-cart-btn rbt-btn btn-gradient icon-hover w-100 d-block text-center">
                                            <span class="btn-text">Vào học ngay</span>
                                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                        </a>
                                    </div>
                                @elseif (Auth::check() && $course->author->id === Auth::user()->id)
                                    <div class="add-to-card-button mt--15">
                                        <a href="{{ route('course.index', $course->slug) }}"
                                           class="add-to-cart-btn rbt-btn btn-gradient icon-hover w-100 d-block text-center">
                                            <span class="btn-text">Xem khóa học</span>
                                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                        </a>
                                    </div>
                                @else
                                    <div class="add-to-card-button mt--15">
                                        <button data-url="{{ route('cart.add', ['id' => $course->id]) }}"
                                                class="add-to-cart-btn rbt-btn btn-gradient icon-hover w-100 d-block text-center">
                                            <span class="btn-text">Thêm vào giỏ hàng</span>
                                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                        </button>
                                    </div>
                                @endif
                                <div class="rbt-widget-details has-show-more">
                                    <ul class="has-show-more-inner-content rbt-course-details-list-wrapper">
                                        <li>
                                            <span>Số lượng học viên</span>
                                            <span
                                                class="rbt-feature-value rbt-badge-5">{{ $course->students->where('status', 'paid')->count() }}</span>
                                        </li>
                                        <li>
                                            <span>Bài giảng</span>
                                            <span
                                                class="rbt-feature-value rbt-badge-5">{{ $course->subjects->count() }}</span>
                                        </li>
                                        <li>
                                            <span>Trình độ</span>
                                            <span class="rbt-feature-value rbt-badge-5">Cơ bản</span>
                                        </li>
                                        <li>
                                            <span>Ngôn ngữ</span>
                                            <span class="rbt-feature-value rbt-badge-5">Tiếng Việt</span>
                                        </li>
                                        <li>
                                            <span>Bài kiểm tra</span>
                                            <span class="rbt-feature-value rbt-badge-5">10</span>
                                        </li>
                                    </ul>

                                    <div class="rbt-show-more-btn">Xem thêm</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rbt-separator-mid">
        <div class="container">
            <hr class="rbt-separator m-0"/>
        </div>
    </div>

@endsection
@if(Auth::check())

    @section('cus_js')
        <script>
            $(document).ready(function () {
                // Xử lý sự kiện khi bấm vào nút 'like'
                $('.like_btn').click(function (event) {
                    // event.preventDefault();
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
                                let $likeAmount = $likeBtn.siblings('.like_amount');

                                let likeAmount = parseInt($likeAmount.text(), 10);

                                $likeBtn.toggleClass('active');
                                if ($likeBtn.hasClass('active')) {
                                    likeAmount++;
                                } else {
                                    likeAmount--;
                                }
                                $likeAmount.text(likeAmount);
                                location.reload();
                            }
                        },
                    })
                })
                // Xử lý sự kiện khi bấm vào nút 'dislike'
                $('.dislike_btn').click(function (event) {
                    // event.preventDefault();
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
                                let $dislikeAmount = $dislikeBtn.siblings('.dislike_amount');

                                let dislikeAmount = parseInt($dislikeAmount.text(), 10);

                                $dislikeBtn.toggleClass('active');
                                if ($dislikeBtn.hasClass('active')) {
                                    dislikeAmount++;
                                } else {
                                    dislikeAmount--;
                                }
                                $dislikeAmount.text(dislikeAmount);
                                location.reload();
                            }
                        },
                    });
                });
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
                $('.deleteButton').on('click', function (e) {
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
            });
        </script>
    @endsection
@endif
