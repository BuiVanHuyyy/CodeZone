<div class="rbt-course-area bg-color-white rbt-section-gap">
    <div class="container">
        <div class="row mb--55 g-5 align-items-end">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="section-title text-start">
                    <h2 class="title">
                        <span class="color-primary">Các khóa học</span>
                        phổ biến
                    </h2>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <div class="load-more-btn text-start text-md-end">
                    <a class="rbt-btn rbt-switch-btn bg-primary-opacity" href="{{ route('client.courses') }}">
                        <span data-text="Xem tất cả">Xem tất cả</span>
                    </a>
                </div>
            </div>
        </div>
        <!-- Start Card Area -->
        <div class="row g-5">
            <!-- Start Single Course  -->
            <div
                class="col-lg-4 col-md-6 col-sm-12 col-12"
                data-sal-delay="150"
                data-sal="slide-up"
                data-sal-duration="800">
                <div class="rbt-card variation-01 rbt-hover">
                    <div class="rbt-card-img">
                        <a href="{{ route('client.course_detail', ['slug' => 'a-b-c']) }}">
                            <img
                                src="{{ asset('client_assets/images/course/classic-lms-01.jpg') }}"
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
                            <a href="{{ route('client.course_detail', ['slug' => 'a-b-c']) }}"
                            >React Front To Back</a
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
                            will be distracted.
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
                                class="rbt-btn-link"
                                href="{{ route('client.course_detail', ['slug' => 'a-b-c']) }}"
                            >Learn More<i
                                    class="feather-arrow-right"
                                ></i
                                ></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Course  -->

            <!-- Start Single Course  -->
            <div
                class="col-lg-4 col-md-6 col-sm-12 col-12"
                data-sal-delay="200"
                data-sal="slide-up"
                data-sal-duration="800"
            >
                <div class="rbt-card variation-01 rbt-hover">
                    <div class="rbt-card-img">
                        <a href="{{ route('client.course_detail', ['slug' => 'a-b-c']) }}">
                            <img
                                src="{{ asset('client_assets/images/course/classic-lms-02.jpg') }}"
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
                            <a href="{{ route('client.course_detail', ['slug' => 'a-b-c']) }}"
                            >PHP Beginner Advanced</a
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
                            will be distracted.
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
                                href="{{ route('client.course_detail', ['slug' => 'a-b-c']) }}"
                            ><i class="feather-shopping-cart"></i>
                                Add To Cart</a
                            >
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Course  -->

            <!-- Start Single Course  -->
            <div
                class="col-lg-4 col-md-6 col-sm-12 col-12"
                data-sal-delay="250"
                data-sal="slide-up"
                data-sal-duration="800"
            >
                <div class="rbt-card variation-01 rbt-hover">
                    <div class="rbt-card-img">
                        <a href="{{ route('client.course_detail', ['slug' => 'a-b-c']) }}">
                            <img
                                src="{{ asset('client_assets/images/course/classic-lms-03.jpg') }}"
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
                            <a href="{{ route('client.course_detail', ['slug' => 'a-b-c']) }}"
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
                                <a href="">Slaughter</a> In
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
                                href="{{ route('client.course_detail', ['slug' => 'a-b-c']) }}"
                            >Learn More<i
                                    class="feather-arrow-right"
                                ></i
                                ></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Course  -->
        </div>
        <!-- End Card Area -->
    </div>
</div>
