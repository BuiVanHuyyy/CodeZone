@extends('client.layout.master')
@section('content')
    <div class="rbt-page-banner-wrapper">
        <!-- Start Banner BG Image  -->
        <div class="rbt-banner-image"></div>
        <!-- End Banner BG Image  -->
        <div class="rbt-banner-content">
            <!-- Start Banner Content Top  -->
            <div class="rbt-banner-content-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="title-wrapper">
                                <h1 class="title mb--0">Tất cả các khóa học</h1>
                                <a href="#" class="rbt-badge-2">
                                    <div class="image">🎉</div>
                                    16 Khóa học
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Banner Content Top  -->
            <!-- Start Course Top  -->
            <div class="rbt-course-top-wrapper mt--40">
                <div class="container">
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-5 col-md-12">
                            <div
                                class="rbt-sorting-list d-flex flex-wrap align-items-center"
                            >
                                <div class="rbt-short-item">
                                        <span class="course-index"
                                        >Hiển thị 1-16 of 19 results</span
                                        >
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-7 col-md-12">
                            <div
                                class="rbt-sorting-list d-flex flex-wrap align-items-center justify-content-start justify-content-lg-end"
                            >
                                <div class="rbt-short-item">
                                    <form
                                        action="#"
                                        class="rbt-search-style me-0"
                                    >
                                        <input
                                            type="text"
                                            placeholder="Tìm kiếm khóa học.."
                                        />
                                        <button
                                            type="submit"
                                            class="rbt-search-btn rbt-round-btn"
                                        >
                                            <i class="feather-search"></i>
                                        </button>
                                    </form>
                                </div>

                                <div class="rbt-short-item">
                                    <div
                                        class="view-more-btn text-start text-sm-end"
                                    >
                                        <button
                                            class="discover-filter-button discover-filter-activation rbt-btn btn-white btn-md radius-round"
                                        >
                                            Filter<i
                                                class="feather-filter"
                                            ></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Start Filter Toggle  -->
                    <div class="default-exp-wrapper default-exp-expand">
                        <div class="filter-inner">
                            <div class="filter-select-option">
                                <div
                                    class="filter-select rbt-modern-select"
                                >
                                        <span class="select-label d-block"
                                        >Short By</span
                                        >
                                    <select>
                                        <option>Default</option>
                                        <option>Latest</option>
                                        <option>Popularity</option>
                                        <option>Trending</option>
                                        <option>Price: low to high</option>
                                        <option>Price: high to low</option>
                                    </select>
                                </div>
                            </div>

                            <div class="filter-select-option">
                                <div
                                    class="filter-select rbt-modern-select"
                                >
                                        <span class="select-label d-block"
                                        >Short By Author</span
                                        >
                                    <select
                                        data-live-search="true"
                                        title="Select Author"
                                        multiple
                                        data-size="7"
                                        data-actions-box="true"
                                        data-selected-text-format="count > 2"
                                    >
                                        <option data-subtext="Experts">
                                            Janin Afsana
                                        </option>
                                        <option data-subtext="Experts">
                                            Joe Biden
                                        </option>
                                        <option data-subtext="Experts">
                                            Fatima Asrafy
                                        </option>
                                        <option data-subtext="Experts">
                                            Aysha Baby
                                        </option>
                                        <option data-subtext="Experts">
                                            Mohamad Ali
                                        </option>
                                        <option data-subtext="Experts">
                                            Jone Li
                                        </option>
                                        <option data-subtext="Experts">
                                            Alberd Roce
                                        </option>
                                        <option data-subtext="Experts">
                                            Zeliski Noor
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="filter-select-option">
                                <div
                                    class="filter-select rbt-modern-select"
                                >
                                        <span class="select-label d-block"
                                        >Short By Offer</span
                                        >
                                    <select>
                                        <option>Free</option>
                                        <option>Paid</option>
                                        <option>Premium</option>
                                    </select>
                                </div>
                            </div>

                            <div class="filter-select-option">
                                <div
                                    class="filter-select rbt-modern-select"
                                >
                                        <span class="select-label d-block"
                                        >Short By Category</span
                                        >
                                    <select data-live-search="true">
                                        <option>Web Design</option>
                                        <option>Graphic</option>
                                        <option>App Development</option>
                                        <option>Figma Design</option>
                                    </select>
                                </div>
                            </div>

                            <div class="filter-select-option">
                                <div class="filter-select">
                                        <span class="select-label d-block"
                                        >Price Range</span
                                        >

                                    <div
                                        class="price_filter s-filter clear"
                                    >
                                        <form action="#" method="GET">
                                            <div id="slider-range"></div>
                                            <div
                                                class="slider__range--output"
                                            >
                                                <div
                                                    class="price__output--wrap"
                                                >
                                                    <div
                                                        class="price--output"
                                                    >
                                                            <span>Price :</span
                                                            ><input
                                                            type="text"
                                                            id="amount"
                                                        />
                                                    </div>
                                                    <div
                                                        class="price--filter"
                                                    >
                                                        <a
                                                            class="rbt-btn btn-gradient btn-sm"
                                                            href="#"
                                                        >Filter</a
                                                        >
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Filter Toggle  -->

                    <div class="row mt--60">
                        <div class="col-lg-12">
                            <div
                                class="rbt-portfolio-filter filter-button-default messonry-button text-start justify-content-start"
                            >
                                <button data-filter="*" class="is-checked">
                                        <span class="filter-text"
                                        >Tất cả</span
                                        ><span class="course-number">16</span>
                                </button>
                                <button data-filter=".cat--3">
                                        <span class="filter-text">Lập trình cơ bản</span
                                        ><span class="course-number">04</span>
                                </button>
                                <button data-filter=".cat--1" class="">
                                        <span class="filter-text">Lập trình website</span
                                        ><span class="course-number">04</span>
                                </button>
                                <button data-filter=".cat--2">
                                        <span class="filter-text">Lập trình mobile app</span
                                        ><span class="course-number">04</span>
                                </button>
                                <button data-filter=".cat--4">
                                        <span class="filter-text">Lập trình AI</span
                                        ><span class="course-number">04</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Course Top  -->
        </div>
    </div>

    <div class="rbt-section-overlayping-top rbt-section-gapBottom masonary-wrapper-activation">
        <div class="container">
            <!-- Start Card Area -->
            <div class="row row--15">
                <div class="col-lg-12">
                    <div class="mesonry-list grid-metro2">
                        <div class="resizer"></div>
                        <!-- Start Single Card  -->
                        <div class="maso-item cat--1">
                            <div
                                class="rbt-card variation-01 rbt-hover card-list-2"
                            >
                                <div class="rbt-card-img">
                                    <a href="">
                                        <img
                                            src="{{ asset('client_assets/images/courseThumbs/php.png') }}"
                                            alt="Card image"
                                        />
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
                                            ><i
                                                    class="feather-bookmark"
                                                ></i
                                                ></a>
                                        </div>
                                    </div>

                                    <h4 class="rbt-card-title">
                                        <a href="./course_details.html"
                                        >React Front To Back</a
                                        >
                                    </h4>

                                    <ul class="rbt-meta">
                                        <li>
                                            <i class="feather-book"></i>12
                                            Lessons
                                        </li>
                                        <li>
                                            <i class="feather-users"></i>50
                                            Students
                                        </li>
                                    </ul>

                                    <p class="rbt-card-text">
                                        It is a long established fact that a
                                        reader will be distracted.
                                    </p>
                                    <div class="rbt-author-meta mb--10">
                                        <div class="rbt-avater">
                                            <a href="#">
                                                <img
                                                    src="{{ asset('client_assets/images/client/avatar-02.png') }}"
                                                    alt="Sophia Jaymes"
                                                />
                                            </a>
                                        </div>
                                        <div class="rbt-author-info">
                                            By
                                            <a href="profile.html"
                                            >Angela</a
                                            >
                                            In <a href="#">Development</a>
                                        </div>
                                    </div>
                                    <div class="rbt-card-bottom">
                                        <div class="rbt-price">
                                                <span class="current-price"
                                                >$60</span
                                                >
                                            <span class="off-price"
                                            >$120</span
                                            >
                                        </div>
                                        <a
                                            class="rbt-btn-link"
                                            href="./course_details.html"
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
                        <div class="maso-item cat--2">
                            <div
                                class="rbt-card variation-01 rbt-hover card-list-2"
                            >
                                <div class="rbt-card-img">
                                    <a href="./course_details.html">
                                        <img
                                            src="{{ asset('client_assets/images/courseThumbs/java.png') }}"
                                            alt="Card image"
                                        />
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
                                            ><i
                                                    class="feather-bookmark"
                                                ></i
                                                ></a>
                                        </div>
                                    </div>
                                    <h4 class="rbt-card-title">
                                        <a href="./course_details.html"
                                        >PHP Beginner Advanced</a
                                        >
                                    </h4>
                                    <ul class="rbt-meta">
                                        <li>
                                            <i class="feather-book"></i>12
                                            Lessons
                                        </li>
                                        <li>
                                            <i class="feather-users"></i>50
                                            Students
                                        </li>
                                    </ul>

                                    <p class="rbt-card-text">
                                        It is a long established fact that a
                                        reader will be distracted.
                                    </p>
                                    <div class="rbt-author-meta mb--10">
                                        <div class="rbt-avater">
                                            <a href="#">
                                                <img
                                                    src="{{ asset('client_assets/images/client/avatar-02.png') }}"
                                                    alt="Sophia Jaymes"
                                                />
                                            </a>
                                        </div>
                                        <div class="rbt-author-info">
                                            By
                                            <a href="profile.html"
                                            >Angela</a
                                            >
                                            In <a href="#">Development</a>
                                        </div>
                                    </div>
                                    <div class="rbt-card-bottom">
                                        <div class="rbt-price">
                                                <span class="current-price"
                                                >$60</span
                                                >
                                            <span class="off-price"
                                            >$120</span
                                            >
                                        </div>
                                        <a
                                            class="rbt-btn-link left-icon"
                                            href="./course_details.html"
                                        ><i
                                                class="feather-shopping-cart"
                                            ></i>
                                            Add To Cart</a
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Card  -->

                        <!-- Start Single Card  -->
                        <div class="maso-item cat--3">
                            <div
                                class="rbt-card variation-01 rbt-hover card-list-2"
                            >
                                <div class="rbt-card-img">
                                    <a href="./course_details.html">
                                        <img
                                            src="{{ asset('client_assets/images/course/course-list-03.jpg') }}"
                                            alt="Card image"
                                        />
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
                                            ><i
                                                    class="feather-bookmark"
                                                ></i
                                                ></a>
                                        </div>
                                    </div>
                                    <h4 class="rbt-card-title">
                                        <a href="./course_details.html"
                                        >Angular Zero to Mastery</a
                                        >
                                    </h4>
                                    <ul class="rbt-meta">
                                        <li>
                                            <i class="feather-book"></i>8
                                            Lessons
                                        </li>
                                        <li>
                                            <i class="feather-users"></i>30
                                            Students
                                        </li>
                                    </ul>
                                    <p class="rbt-card-text">
                                        Angular Js long fact that a reader
                                        will be distracted by the readable.
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
                                            <a href="profile.html"
                                            >Slaughter</a
                                            >
                                            In <a href="#">Languages</a>
                                        </div>
                                    </div>
                                    <div class="rbt-card-bottom">
                                        <div class="rbt-price">
                                                <span class="current-price"
                                                >$80</span
                                                >
                                            <span class="off-price"
                                            >$100</span
                                            >
                                        </div>
                                        <a
                                            class="rbt-btn-link"
                                            href="./course_details.html"
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
                        <div class="maso-item cat--4">
                            <div
                                class="rbt-card variation-01 rbt-hover card-list-2"
                            >
                                <div class="rbt-card-img">
                                    <a href="">
                                        <img
                                            src="{{ asset('client_assets/images/course/course-list-04.jpg') }}"
                                            alt="Card image"
                                        />
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
                                            ><i
                                                    class="feather-bookmark"
                                                ></i
                                                ></a>
                                        </div>
                                    </div>

                                    <h4 class="rbt-card-title">
                                        <a href="./course_details.html"
                                        >Web Front To Back</a
                                        >
                                    </h4>
                                    <ul class="rbt-meta">
                                        <li>
                                            <i class="feather-book"></i>20
                                            Lessons
                                        </li>
                                        <li>
                                            <i class="feather-users"></i>40
                                            Students
                                        </li>
                                    </ul>
                                    <p class="rbt-card-text">
                                        Web Js long fact that a reader will
                                        be distracted by the readable.
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
                                            By
                                            <a href=""
                                            >Patrick</a
                                            >
                                            In <a href="#">Languages</a>
                                        </div>
                                    </div>

                                    <div class="rbt-card-bottom">
                                        <div class="rbt-price">
                                                <span class="current-price"
                                                >$60</span
                                                >
                                            <span class="off-price"
                                            >$120</span
                                            >
                                        </div>
                                        <a
                                            class="rbt-btn-link"
                                            href="./course_details.html"
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
                        <div class="maso-item cat--1 cat--3">
                            <div
                                class="rbt-card variation-01 rbt-hover card-list-2"
                            >
                                <div class="rbt-card-img">
                                    <a href="">
                                        <img
                                            src="{{ asset('client_assets/images/course/course-list-05.jpg') }}"
                                            alt="Card image"
                                        />
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
                                            ><i
                                                    class="feather-bookmark"
                                                ></i
                                                ></a>
                                        </div>
                                    </div>
                                    <h4 class="rbt-card-title">
                                        <a href="./course_details.html"
                                        >SQL Beginner Advanced</a
                                        >
                                    </h4>
                                    <ul class="rbt-meta">
                                        <li>
                                            <i class="feather-book"></i>12
                                            Lessons
                                        </li>
                                        <li>
                                            <i class="feather-users"></i>50
                                            Students
                                        </li>
                                    </ul>
                                    <p class="rbt-card-text">
                                        It is a long established fact that a
                                        reader will be distracted by the
                                        readable.
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
                                            By
                                            <a href="profile.html"
                                            >Angela</a
                                            >
                                            In <a href="#">Development</a>
                                        </div>
                                    </div>
                                    <div class="rbt-card-bottom">
                                        <div class="rbt-price">
                                                <span class="current-price"
                                                >$60</span
                                                >
                                            <span class="off-price"
                                            >$120</span
                                            >
                                        </div>
                                        <a
                                            class="rbt-btn-link left-icon"
                                            href="./course_details.html"
                                        ><i
                                                class="feather-shopping-cart"
                                            ></i>
                                            Add To Cart</a
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Card  -->

                        <!-- Start Single Card  -->
                        <div class="maso-item cat--2 cat--4">
                            <div
                                class="rbt-card variation-01 rbt-hover card-list-2"
                            >
                                <div class="rbt-card-img">
                                    <a href="">
                                        <img
                                            src="{{ asset('client_assets/images/course/course-list-06.jpg') }}"
                                            alt="Card image"
                                        />
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
                                            ><i
                                                    class="feather-bookmark"
                                                ></i
                                                ></a>
                                        </div>
                                    </div>
                                    <h4 class="rbt-card-title">
                                        <a href="./course_details.html"
                                        >JS Zero to Mastery</a
                                        >
                                    </h4>
                                    <ul class="rbt-meta">
                                        <li>
                                            <i class="feather-book"></i>8
                                            Lessons
                                        </li>
                                        <li>
                                            <i class="feather-users"></i>30
                                            Students
                                        </li>
                                    </ul>
                                    <p class="rbt-card-text">
                                        Angular Js long fact that a reader
                                        will be distracted by the readable.
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
                                            <a href="">Slaughter</a> In <a href="#">Languages</a>
                                        </div>
                                    </div>
                                    <div class="rbt-card-bottom">
                                        <div class="rbt-price">
                                                <span class="current-price"
                                                >$80</span
                                                >
                                            <span class="off-price"
                                            >$100</span
                                            >
                                        </div>
                                        <a
                                            class="rbt-btn-link"
                                            href=""
                                        >Learn More<i
                                                class="feather-arrow-right"
                                            ></i
                                            ></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Card  -->
                    </div>
                    <!-- End Card Area -->
                </div>
            </div>
        </div>
    </div>

    <div class="rbt-separator-mid">
        <div class="container">
            <hr class="rbt-separator m-0" />
        </div>
    </div>
@endsection
