@extends('client.layout.master')
@section('cus_css')
    <style>
        .rbt-header .rbt-header-wrapper.rbt-sticky {
            position: absolute;
        }
    </style>
@endsection
@section('content')
    <!-- Start breadcrumb Area -->
    <div class="rbt-breadcrumb-default rbt-breadcrumb-style-3">
        <div class="breadcrumb-inner">
            <img
                src="{{ asset('client_assets/images/bg/bg-image-10.jpg') }}"
                alt="Education Images"
            />
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="content text-start">
                        <h2 class="title">{{ $course->title }}</h2>
                        <p class="description">{{ $course->description }}</p>

                        <div
                            class="d-flex align-items-center mb--20 flex-wrap rbt-course-details-feature"
                        >
                            <div class="feature-sin best-seller-badge">
                                    <span class="rbt-badge-2">
                                        <span class="image"
                                        ><img
                                                src="{{ asset('client_assets/images/icons/card-icon-1.png') }}"
                                                alt="Best Seller Icon"
                                            /></span>
                                        Bestseller
                                    </span>
                            </div>

                            <div class="feature-sin rating">
                                @for($i = 1; $i <= ceil($course->rating); $i++)
                                    <i class="fa-solid fa-star"></i>
                                @endfor
                                @for($i = 1; $i <= 5 - $course->rating; $i++)
                                    <i class="fa-solid fa-star" style="color: #0F0F0F;"></i>
                                @endfor
                            </div>

                            <div class="feature-sin total-rating">
                                <a class="rbt-badge-4" href="#"
                                >{{ $course->reviews->count() }} đánh giá</a
                                >
                            </div>

                            <div class="feature-sin total-student">
                                <span>{{ $course->enrollments->count() }} học viên</span>
                            </div>
                        </div>

                        <div class="rbt-author-meta mb--20">
                            <div class="rbt-avater">
                                <a href="#">
                                    <img
                                        src="{{ asset('client_assets/images/client/avatar-02.png') }}"
                                        alt="Sophia Jaymes"
                                    />
                                </a>
                            </div>
                            <div class="rbt-author-info">
                                bỡi <a href="">{{ $course->author->name }}</a> thuộc danh mục
                                <a href="#">{{ $course->category->title }}</a>
                            </div>
                        </div>

                        <ul class="rbt-meta">
                            <li>
                                <i class="feather-calendar"></i>Tạo vào lúc {{ date_format(date_create($course->created_at), 'd/m/Y') }}
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
                            <img class="w-100" src="{{ asset('client_assets/images/course/course-01.jpg') }}" alt="Card image"/>
                        </div>

                        <div
                            class="rbt-inner-onepage-navigation sticky-top mt--30"
                        >
                            <nav class="mainmenu-nav onepagenav">
                                <ul class="mainmenu">
                                    <li class="current">
                                        <a href="#overview">Tổng quan</a>
                                    </li>
                                    <li>
                                        <a href="#coursecontent"
                                        >Học phần</a
                                        >
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
                        <div
                            class="rbt-course-feature-box overview-wrapper rbt-shadow-box mt--30 has-show-more"
                            id="overview"
                        >
                            <div
                                class="rbt-course-feature-inner has-show-more-inner-content"
                            >
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
                        <div
                            class="course-content rbt-shadow-box coursecontent-wrapper mt--30"
                            id="coursecontent"
                        >
                            <div class="rbt-course-feature-inner">
                                <div class="section-title">
                                    <h4 class="rbt-title-style-3">
                                        Nội dung học phần
                                    </h4>
                                </div>
                                <div class="rbt-accordion-style rbt-accordion-02 accordion">
                                    <div class="accordion" id="accordionExample2">
                                        @foreach($course->subjects->sortBy('order') as $subject)
                                            <div class="accordion-item card">
                                                <h2 class="accordion-header card-header" id="headingTwo{{ $loop->iteration }}">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo{{ $loop->iteration }}" aria-expanded="true" aria-controls="collapseTwo1">{{ $subject->title }}<span class="rbt-badge-5 ml--10">1hr 30min</span>
                                                    </button>
                                                </h2>
                                                <div id="collapseTwo{{ $loop->iteration }}" class="accordion-collapse collapse show" aria-labelledby="headingTwo{{ $loop->iteration }}" data-bs-parent="#accordionExampleb2">
                                                    <div class="accordion-body card-body pr--0">
                                                        <ul class="rbt-course-main-content liststyle">
                                                            @foreach($subject->lessons->sortBy('order') as $lesson)
                                                                <li>
                                                                    <a href="">
                                                                        <div class="course-content-left">
                                                                            <i class="feather-play-circle"></i>
                                                                            <span class="text">{{ $lesson->title }}</span>
                                                                        </div>
                                                                        <div class="course-content-right">
                                                                            <span class="min-lable">30m in</span>
                                                                            <span class="rbt-badge variation-03 bg-primary-opacity">
                                                                            <i class="feather-eye"></i>Preview
                                                                        </span>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                            @endforeach
                                                            <li>
                                                                <a href="">
                                                                    <div class="course-content-left">
                                                                        <i class="feather-file-text"></i>
                                                                        <span class="text">ReadBeforeYouStart</span>
                                                                    </div>
                                                                    <div class="course-content-right">
                                                                            <span class="course-lock">
                                                                                <i class="feather-lock"></i>
                                                                            </span>
                                                                    </div>
                                                                </a>
                                                            </li>
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

                        <!-- Start Intructor Area  -->
                        <div class="rbt-instructor rbt-shadow-box instructor-wrapper mt--30" id="itructor"
                        >
                            <div class="about-author border-0 pb--0 pt--0">
                                <div class="section-title mb--30">
                                    <h4 class="rbt-title-style-3">
                                        Giảng viên
                                    </h4>
                                </div>
                                <div class="media align-items-center">
                                    <div class="thumbnail">
                                        <a href="#">
                                            <img src="{{ asset('client_assets/images/testimonial/testimonial-7.jpg') }}" alt="{{ $course->author->name }} avatar"/>
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <div class="author-info">
                                            <h5 class="title">
                                                <a class="hover-flip-item-wrapper" href="">{{ $course->author->name }}</a>
                                            </h5>
                                            <span class="b3 subtitle"
                                            >{{ $course->author->current_job }}</span>
                                            <ul class="rbt-meta mb--20 mt--10">
                                                <li>
                                                    {{ number_format($course->author->additional_info['rating'], 0) }}<i style="margin-left: 5px" class="fa fa-star color-warning"></i>
                                                    <span class="rbt-badge-5 ml--5"> Rating</span>
                                                    {{ number_format($course->author->additional_info['reviews']->count()) }} đánh giá
                                                </li>
                                                <li>
                                                    <i
                                                        class="feather-users"
                                                    ></i
                                                    >{{ $course->author->additional_info['total_students'] }} học viên
                                                </li>
                                                <li>
                                                    <a href="#"><i class="feather-video"></i>{{ $course->author->courses->count() }} khóa học</a>
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
                        <!-- End Intructor Area  -->

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
                                                {{ number_format($course->rating, 1) }}
                                            </div>
                                            <div class="rating">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                </svg>
                                            </div>
                                            <span class="sub-title">Xếp hạnh khóa học</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-9">
                                        @php
                                            $fiveStar = 0;
                                            $fourStar = 0;
                                            $threeStar = 0;
                                            $twoStar = 0;
                                            $oneStar = 0;
                                            foreach ($course->reviews as $review) {
                                                switch ($review->rating) {
                                                    case 1:
                                                        $oneStar++;
                                                        break;
                                                    case 2:
                                                        $twoStar++;
                                                        break;
                                                    case 3:
                                                        $threeStar++;
                                                        break;
                                                    case 4:
                                                        $fourStar++;
                                                        break;
                                                    case 5:
                                                        $fiveStar++;
                                                        break;
                                                }
                                            }
                                            $totalReviews = $oneStar + $twoStar + $threeStar + $fourStar + $fiveStar;
                                            if ($totalReviews !== 0) {
                                                $oneStar = ($oneStar / $totalReviews) * 100;
                                                $twoStar = ($twoStar / $totalReviews) * 100;
                                                $threeStar = ($threeStar / $totalReviews) * 100;
                                                $fourStar = ($fourStar / $totalReviews) * 100;
                                                $fiveStar = ($fiveStar / $totalReviews) * 100;
                                            }
                                        @endphp
                                        <div class="review-wrapper">
                                            <div class="single-progress-bar">
                                                <div class="rating-text">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                    </svg>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: {{ $fiveStar }}%" aria-valuenow="63" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <span class="value-text">{{ number_format($fiveStar, 0) }}%</span>
                                            </div>

                                            <div class="single-progress-bar">
                                                <div class="rating-text">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                                    </svg>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: {{ $fourStar }}%" aria-valuenow="29" aria-valuemin="0" aria-valuemax="100"
                                                    ></div>
                                                </div>
                                                <span class="value-text">{{ number_format($fourStar, 0) }}%</span>
                                            </div>

                                            <div class="single-progress-bar">
                                                <div class="rating-text">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                                    </svg>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: {{ $threeStar }}%" aria-valuenow="6" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <span class="value-text">{{ number_format($threeStar, 0) }}%</span>
                                            </div>

                                            <div class="single-progress-bar">
                                                <div class="rating-text">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                                    </svg>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: {{ $twoStar }}%" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <span class="value-text">{{ number_format($twoStar, 0) }}%</span>
                                            </div>

                                            <div class="single-progress-bar">
                                                <div class="rating-text">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                                    </svg>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: {{ $oneStar }}%" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <span class="value-text">{{ number_format($oneStar, 0)  }}%</span>
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
                                @foreach($course->reviews as $review)
                                    <div class="rbt-course-review about-author">
                                        <div class="media">
                                            <div class="thumbnail">
                                                <a href="#">
                                                    <img src="{{ asset('client_assets/images/testimonial/testimonial-3.jpg') }}" alt="Author Images"/>
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="author-info">
                                                    <h5 class="title">
                                                        <a class="hover-flip-item-wrapper" href="#">{{ $review->user->name }}</a>
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
                                                            <a href="#">
                                                                <i class="feather-thumbs-up"></i>
                                                            </a>
                                                            {{ $review->like_amount }}
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <i class="feather-thumbs-down"></i>
                                                            </a>
                                                            {{ $review->dislike_amount }}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="rbt-show-more-btn">Xem thêm</div>
                        </div>
                    </div>
                    <div class="related-course mt--60">
                        <div class="row g-5 align-items-end mb--40">
                            <div class="col-lg-8 col-md-8 col-12">
                                <div class="section-title">
                                        <span class="subtitle bg-pink-opacity">Top Course</span>
                                    <h4 class="title">
                                        Các khóa học khác của
                                        <strong class="color-primary">{{ $course->author->name }}</strong>
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
                            @if($course->author->courses->count() >= 1)
                                @foreach($course->author->courses as $course)
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                                        <div class="rbt-card variation-01 rbt-hover">
                                            <div class="rbt-card-img">
                                                <a href="">
                                                    <img src="{{ asset('client_assets/images/course/course-online-01.jpg') }}" alt="Card image"/>
                                                    <div class="rbt-badge-3 bg-white">
                                                        <span>-40%</span>
                                                        <span>Off</span>
                                                    </div>
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
                                                        <span class="rating-count">({{ $course->reviews }} Reviews)</span>
                                                    </div>
                                                    <div class="rbt-bookmark-btn">
                                                        <a class="rbt-round-btn" title="Bookmark" href="#">
                                                            <i class="feather-bookmark"></i>
                                                        </a>
                                                    </div>
                                                </div>

                                                <h4 class="rbt-card-title">
                                                    <a href="">{{ $course->title }}</a>
                                                </h4>

                                                <ul class="rbt-meta">
                                                    <li>
                                                        <i class="feather-book"></i>12 Lessons
                                                    </li>
                                                    <li>
                                                        <i class="feather-users"></i>50 Students
                                                    </li>
                                                </ul>

                                                <p class="rbt-card-text">
                                                    It is a long established fact
                                                    that a reader will be
                                                    distracted.
                                                </p>
                                                <div class="rbt-author-meta mb--10">
                                                    <div class="rbt-avater">
                                                        <a href="#">
                                                            <img src="{{ asset('client_assets/images/client/avatar-02.png') }}" alt="Sophia Jaymes"/>
                                                        </a>
                                                    </div>
                                                    <div class="rbt-author-info">
                                                        By
                                                        <a href="">Angela</a>
                                                        In
                                                        <a href="#">Development</a>
                                                    </div>
                                                </div>
                                                <div class="rbt-card-bottom">
                                                    <div class="rbt-price">
                                                        <span class="current-price">$60</span>
                                                        <span class="off-price">$120</span>
                                                    </div>
                                                    <a class="rbt-btn-link" href="">Learn More
                                                        <i class="feather-arrow-right"></i>
                                                    </a>
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
                            <!-- Start Viedo Wrapper  -->
                            <a
                                class="video-popup-with-text video-popup-wrapper text-center popup-video sidebar-video-hidden mb--15"
                                href="https://www.youtube.com/watch?v=nA1Aqp0sPQo"
                            >
                                <div class="video-content">
                                    <img
                                        class="w-100 rbt-radius"
                                        src="{{ asset('client_assets/images/others/video-01.jpg') }}"
                                        alt="Video Images"
                                    />
                                    <div class="position-to-top">
                                            <span
                                                class="rbt-btn rounded-player-2 with-animation"
                                            >
                                                <span class="play-icon"></span>
                                            </span>
                                    </div>
                                    <span
                                        class="play-view-text d-block color-white"
                                    ><i class="feather-eye"></i> Preview
                                            this course</span
                                    >
                                </div>
                            </a>
                            <!-- End Viedo Wrapper  -->

                            <div class="content-item-content">
                                <div
                                    class="rbt-price-wrapper d-flex flex-wrap align-items-center justify-content-between"
                                >
                                    <div class="rbt-price">
                                            <span class="current-price"
                                            >$60.99</span
                                            >
                                        <span class="off-price"
                                        >$84.99</span
                                        >
                                    </div>
                                    <div class="discount-time">
                                            <span
                                                class="rbt-badge color-danger bg-color-danger-opacity"
                                            ><i class="feather-clock"></i> 3
                                                ngày cuối!</span
                                            >
                                    </div>
                                </div>

                                <div class="add-to-card-button mt--15">
                                    <a
                                        class="rbt-btn btn-gradient icon-hover w-100 d-block text-center"
                                        href="#"
                                    >
                                            <span class="btn-text"
                                            >Thêm vào giỏ hàng</span
                                            >
                                        <span class="btn-icon"
                                        ><i
                                                class="feather-arrow-right"
                                            ></i
                                            ></span>
                                    </a>
                                </div>

                                <div class="buy-now-btn mt--15">
                                    <a
                                        class="rbt-btn btn-border icon-hover w-100 d-block text-center"
                                        href="#"
                                    >
                                            <span class="btn-text"
                                            >Mua ngay</span
                                            >
                                        <span class="btn-icon"
                                        ><i
                                                class="feather-arrow-right"
                                            ></i
                                            ></span>
                                    </a>
                                </div>

                                <div
                                    class="rbt-widget-details has-show-more"
                                >
                                    <ul
                                        class="has-show-more-inner-content rbt-course-details-list-wrapper"
                                    >
                                        <li>
                                                <span>Đăng đăng ký</span
                                                ><span
                                                class="rbt-feature-value rbt-badge-5"
                                            >100</span
                                            >
                                        </li>
                                        <li>
                                                <span>Bài giảng</span
                                                ><span
                                                class="rbt-feature-value rbt-badge-5"
                                            >50</span
                                            >
                                        </li>
                                        <li>
                                                <span>Trình độ</span
                                                ><span
                                                class="rbt-feature-value rbt-badge-5"
                                            >Cơ bản</span
                                            >
                                        </li>
                                        <li>
                                                <span>Ngôn ngữ</span
                                                ><span
                                                class="rbt-feature-value rbt-badge-5"
                                            >Tiếng Việt</span
                                            >
                                        </li>
                                        <li>
                                                <span>Bài kiểm tra</span
                                                ><span
                                                class="rbt-feature-value rbt-badge-5"
                                            >10</span
                                            >
                                        </li>
                                    </ul>
                                    <div class="rbt-show-more-btn">
                                        Xem thêm
                                    </div>
                                </div>

                                <div
                                    class="social-share-wrapper mt--30 text-center"
                                >
                                    <p>Chia sẻ</p>
                                    <div
                                        class="rbt-post-share d-flex align-items-center justify-content-center"
                                    >
                                        <ul
                                            class="social-icon social-default transparent-with-border justify-content-center"
                                        >
                                            <li>
                                                <a
                                                    href="https://www.facebook.com/"
                                                >
                                                    <i
                                                        class="feather-facebook"
                                                    ></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a
                                                    href="https://www.twitter.com/"
                                                >
                                                    <i
                                                        class="feather-twitter"
                                                    ></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a
                                                    href="https://www.instagram.com/"
                                                >
                                                    <i
                                                        class="feather-instagram"
                                                    ></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a
                                                    href="https://www.linkdin.com/"
                                                >
                                                    <i
                                                        class="feather-linkedin"
                                                    ></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <hr class="mt--20" />
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
            <hr class="rbt-separator m-0" />
        </div>
    </div>

    <div class="rbt-related-course-area bg-color-white pt--60 rbt-section-gapBottom">
        <div class="container">
            <div class="section-title mb--30">
                    <span class="subtitle bg-primary-opacity"
                    >Các khóa học tương tự</span
                    >
                <h4 class="title">Các khóa học liên quan</h4>
            </div>
            <div class="row g-5">
                <!-- Start Single Card  -->
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="rbt-card variation-01 rbt-hover">
                        <div class="rbt-card-img">
                            <a href="">
                                <img
                                    src="{{ asset('client_assets/images/course/course-online-03.jpg') }}"
                                    alt="Card image"
                                />
                                <div class="rbt-badge-3 bg-white">
                                    <span>-10%</span>
                                    <span>Off</span>
                                </div>
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
                                    <span class="rating-count">
                                            (5 Reviews)</span
                                    >
                                </div>
                                <div class="rbt-bookmark-btn">
                                    <a
                                        class="rbt-round-btn"
                                        title="Bookmark"
                                        href="#"
                                    ><i class="feather-bookmark"></i
                                        ></a>
                                </div>
                            </div>
                            <h4 class="rbt-card-title">
                                <a href="course-details.html"
                                >Angular Zero to Mastery</a
                                >
                            </h4>
                            <ul class="rbt-meta">
                                <li>
                                    <i class="feather-book"></i>8 Lessons
                                </li>
                                <li>
                                    <i class="feather-users"></i>30 Students
                                </li>
                            </ul>
                            <p class="rbt-card-text">
                                Angular Js long fact that a reader will be
                                distracted by the readable.
                            </p>

                            <div class="rbt-author-meta mb--20">
                                <div class="rbt-avater">
                                    <a href="#">
                                        <img
                                            src="{{ asset('client_assets/images/client/avatar-03.png') }}"
                                            alt="Sophia Jaymes"
                                        />
                                    </a>
                                </div>
                                <div class="rbt-author-info">
                                    By
                                    <a href="profile.html">Slaughter</a> In
                                    <a href="#">Languages</a>
                                </div>
                            </div>
                            <div class="rbt-card-bottom">
                                <div class="rbt-price">
                                    <span class="current-price">$80</span>
                                    <span class="off-price">$100</span>
                                </div>
                                <a
                                    class="rbt-btn-link"
                                    href="course-details.html"
                                >Learn More<i
                                        class="feather-arrow-right"
                                    ></i
                                    ></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Card  -->

                <!-- Start Single Card  -->
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="rbt-card variation-01 rbt-hover">
                        <div class="rbt-card-img">
                            <a href="course-details.html">
                                <img
                                    src="{{ asset('client_assets/images/course/course-online-04.jpg') }}"
                                    alt="Card image"
                                />
                                <div class="rbt-badge-3 bg-white">
                                    <span>-40%</span>
                                    <span>Off</span>
                                </div>
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
                                    <span class="rating-count">
                                            (15 Reviews)</span
                                    >
                                </div>
                                <div class="rbt-bookmark-btn">
                                    <a
                                        class="rbt-round-btn"
                                        title="Bookmark"
                                        href="#"
                                    ><i class="feather-bookmark"></i
                                        ></a>
                                </div>
                            </div>

                            <h4 class="rbt-card-title">
                                <a href="course-details.html"
                                >Web Front To Back</a
                                >
                            </h4>
                            <ul class="rbt-meta">
                                <li>
                                    <i class="feather-book"></i>20 Lessons
                                </li>
                                <li>
                                    <i class="feather-users"></i>40 Students
                                </li>
                            </ul>
                            <p class="rbt-card-text">
                                Web Js long fact that a reader will be
                                distracted by the readable.
                            </p>
                            <div class="rbt-author-meta mb--20">
                                <div class="rbt-avater">
                                    <a href="#">
                                        <img
                                            src="{{ asset('client_assets/images/client/avater-01.png') }}"
                                            alt="Sophia Jaymes"
                                        />
                                    </a>
                                </div>
                                <div class="rbt-author-info">
                                    By <a href="profile.html">Patrick</a> In
                                    <a href="#">Languages</a>
                                </div>
                            </div>

                            <div class="rbt-card-bottom">
                                <div class="rbt-price">
                                    <span class="current-price">$60</span>
                                    <span class="off-price">$120</span>
                                </div>
                                <a
                                    class="rbt-btn-link"
                                    href="course-details.html"
                                >Learn More<i
                                        class="feather-arrow-right"
                                    ></i
                                    ></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Card  -->

                <!-- Start Single Card  -->
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="rbt-card variation-01 rbt-hover">
                        <div class="rbt-card-img">
                            <a href="course-details.html">
                                <img
                                    src="{{ asset('client_assets/images/course/course-online-05.jpg') }}"
                                    alt="Card image"
                                />
                                <div class="rbt-badge-3 bg-white">
                                    <span>-20%</span>
                                    <span>Off</span>
                                </div>
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
                                    <span class="rating-count">
                                            (15 Reviews)</span
                                    >
                                </div>
                                <div class="rbt-bookmark-btn">
                                    <a
                                        class="rbt-round-btn"
                                        title="Bookmark"
                                        href="#"
                                    ><i class="feather-bookmark"></i
                                        ></a>
                                </div>
                            </div>
                            <h4 class="rbt-card-title">
                                <a href="course-details.html"
                                >SQL Beginner Advanced</a
                                >
                            </h4>
                            <ul class="rbt-meta">
                                <li>
                                    <i class="feather-book"></i>12 Lessons
                                </li>
                                <li>
                                    <i class="feather-users"></i>50 Students
                                </li>
                            </ul>
                            <p class="rbt-card-text">
                                It is a long established fact that a reader
                                will be distracted by the readable.
                            </p>
                            <div class="rbt-author-meta mb--20">
                                <div class="rbt-avater">
                                    <a href="#">
                                        <img
                                            src="{{ asset('client_assets/images/client/avatar-02.png') }}"
                                            alt="Sophia Jaymes"
                                        />
                                    </a>
                                </div>
                                <div class="rbt-author-info">
                                    By <a href="profile.html">Angela</a> In
                                    <a href="#">Development</a>
                                </div>
                            </div>
                            <div class="rbt-card-bottom">
                                <div class="rbt-price">
                                    <span class="current-price">$60</span>
                                    <span class="off-price">$120</span>
                                </div>
                                <a
                                    class="rbt-btn-link left-icon"
                                    href="course-details.html"
                                ><i class="feather-shopping-cart"></i>
                                    Thêm vào giỏ hàng</a
                                >
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Card  -->
            </div>
        </div>
    </div>

    <!-- Start Course Action Bottom  -->
    <div class="rbt-course-action-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="section-title text-center text-md-start">
                        <h5 class="title mb--0">
                            The Complete Histudy 2023: From Zero to Expert!
                        </h5>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 mt_sm--15">
                    <div
                        class="course-action-bottom-right rbt-single-group"
                    >
                        <div
                            class="rbt-single-list rbt-price large-size justify-content-center"
                        >
                                <span class="current-price color-primary"
                                >$750.00</span
                                >
                            <span class="off-price">$1500.00</span>
                        </div>
                        <div class="rbt-single-list action-btn">
                            <a
                                class="rbt-btn btn-gradient hover-icon-reverse btn-md"
                                href="#"
                            >
                                    <span class="icon-reverse-wrapper">
                                        <span class="btn-text"
                                        >Purchase Now</span
                                        >
                                        <span class="btn-icon"
                                        ><i class="feather-arrow-right"></i
                                            ></span>
                                        <span class="btn-icon"
                                        ><i class="feather-arrow-right"></i
                                            ></span>
                                    </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Course Action Bottom  -->
    <div class="rbt-separator-mid">
        <div class="container">
            <hr class="rbt-separator m-0" />
        </div>
    </div>
    <!-- Start Footer aera -->
@endsection
