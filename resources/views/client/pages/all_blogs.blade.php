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
                        <div class="col-lg-10 offset-lg-1">

                            <div class="title-wrapper">
                                <h1 class="title mb--0">Danh sách các bài Blog</h1>
                                <a href="#" class="rbt-badge-2">
                                    <div class="image">🎉</div>
                                    50 Bài viết
                                </a>
                            </div>

                            <p class="description">
                                Blog that help beginner designers become
                                true unicorns.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Banner Content Top  -->
        </div>
    </div>

    <!-- Start Card Style -->
    <div
        class="rbt-blog-area rbt-section-overlayping-top rbt-section-gapBottom"
    >
        <div class="container">
            <!-- Start Card Area -->
            <div class="row">
                <div class="col-lg-10 offset-lg-1 mt_dec--30">
                    <!-- Start Single Card  -->
                    <div class="col-12 mt--30">
                        <div
                            class="rbt-card variation-02 height-auto rbt-hover"
                        >
                            <div class="rbt-card-img">
                                <a href="{{ route('client.blog_detail', ['slug' => 'slug-blog']) }}">
                                    <img
                                        src="{{ asset('client_assets/images/blog/blog-single-03.png') }}"
                                        alt="Card image"
                                    />
                                </a>
                            </div>
                            <div class="rbt-card-body">
                                <h3 class="rbt-card-title">
                                    <a href="{{ route('client.blog_detail', ['slug' => 'slug-blog']) }}"
                                    >How to Analyze Your Best Pages for
                                        SEO Performance</a
                                    >
                                </h3>
                                <p class="rbt-card-text">
                                    It is a long established fact that a
                                    reader.
                                </p>
                                <div class="rbt-card-bottom">
                                    <a
                                        class="transparent-button"
                                        href="{{ route('client.blog_detail', ['slug' => 'slug-blog']) }}"
                                    >Learn More<i
                                        ><svg
                                                width="17"
                                                height="12"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <g
                                                    stroke="#27374D"
                                                    fill="none"
                                                    fill-rule="evenodd"
                                                >
                                                    <path
                                                        d="M10.614 0l5.629 5.629-5.63 5.629"
                                                    />
                                                    <path
                                                        stroke-linecap="square"
                                                        d="M.663 5.572h14.594"
                                                    />
                                                </g></svg></i
                                        ></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Card  -->

                    <!-- Start Single Card  -->
                    <div
                        class="rbt-card card-list variation-02 rbt-hover mt--30"
                    >
                        <div class="rbt-card-img">
                            <a href="{{ route('client.blog_detail', ['slug' => 'slug-blog']) }}">
                                <img
                                    src="{{ asset('client_assets/images/blog/blog-card-02.jpg') }}"
                                    alt="Card image"
                                />
                            </a>
                        </div>
                        <div class="rbt-card-body">
                            <h5 class="rbt-card-title">
                                <a href="{{ route('client.blog_detail', ['slug' => 'slug-blog']) }}"
                                >Why Is Education So Famous?</a
                                >
                            </h5>
                            <div class="rbt-card-bottom">
                                <a
                                    class="transparent-button"
                                    href="{{ route('client.blog_detail', ['slug' => 'slug-blog']) }}"
                                >Read Article<i
                                    ><svg
                                            width="17"
                                            height="12"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <g
                                                stroke="#27374D"
                                                fill="none"
                                                fill-rule="evenodd"
                                            >
                                                <path
                                                    d="M10.614 0l5.629 5.629-5.63 5.629"
                                                />
                                                <path
                                                    stroke-linecap="square"
                                                    d="M.663 5.572h14.594"
                                                />
                                            </g></svg></i
                                    ></a>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Card  -->

                    <!-- Start Single Card  -->
                    <div
                        class="rbt-card card-list variation-02 rbt-hover mt--30"
                    >
                        <div class="rbt-card-img">
                            <a href="{{ route('client.blog_detail', ['slug' => 'slug-blog']) }}">
                                <img
                                    src="{{ asset('client_assets/images/blog/blog-card-03.jpg') }}"
                                    alt="Card image"
                                />
                            </a>
                        </div>
                        <div class="rbt-card-body">
                            <h5 class="rbt-card-title">
                                <a href="{{ route('client.blog_detail', ['slug' => 'slug-blog']) }}"
                                >Difficult Things About Education.</a
                                >
                            </h5>
                            <div class="rbt-card-bottom">
                                <a
                                    class="transparent-button"
                                    href="{{ route('client.blog_detail', ['slug' => 'slug-blog']) }}"
                                >Read Article<i
                                    ><svg
                                            width="17"
                                            height="12"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <g
                                                stroke="#27374D"
                                                fill="none"
                                                fill-rule="evenodd"
                                            >
                                                <path
                                                    d="M10.614 0l5.629 5.629-5.63 5.629"
                                                />
                                                <path
                                                    stroke-linecap="square"
                                                    d="M.663 5.572h14.594"
                                                />
                                            </g></svg></i
                                    ></a>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Card  -->

                    <!-- Start Single Card  -->
                    <div
                        class="rbt-card card-list variation-02 rbt-hover mt--30"
                    >
                        <div class="rbt-card-img">
                            <a href="{{ route('client.blog_detail', ['slug' => 'slug-blog']) }}">
                                <img
                                    src="{{ asset('client_assets/images/blog/blog-card-04.jpg') }}"
                                    alt="Card image"
                                />
                            </a>
                        </div>
                        <div class="rbt-card-body">
                            <h5 class="rbt-card-title">
                                <a href="{{ route('client.blog_detail', ['slug' => 'slug-blog']) }}"
                                >Education Is So Famous, But Why?</a
                                >
                            </h5>
                            <div class="rbt-card-bottom">
                                <a
                                    class="transparent-button"
                                    href="{{ route('client.blog_detail', ['slug' => 'slug-blog']) }}"
                                >Read Article<i
                                    ><svg
                                            width="17"
                                            height="12"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <g
                                                stroke="#27374D"
                                                fill="none"
                                                fill-rule="evenodd"
                                            >
                                                <path
                                                    d="M10.614 0l5.629 5.629-5.63 5.629"
                                                />
                                                <path
                                                    stroke-linecap="square"
                                                    d="M.663 5.572h14.594"
                                                />
                                            </g></svg></i
                                    ></a>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Card  -->

                    <!-- Start Single Card  -->
                    <div
                        class="rbt-card card-list variation-02 rbt-hover mt--30"
                    >
                        <div class="rbt-card-img">
                            <a href="{{ route('client.blog_detail', ['slug' => 'slug-blog']) }}">
                                <img
                                    src="{{ asset('client_assets/images/blog/blog-card-05.jpg') }}"
                                    alt="Card image"
                                />
                            </a>
                        </div>
                        <div class="rbt-card-body">
                            <h5 class="rbt-card-title">
                                <a href="{{ route('client.blog_detail', ['slug' => 'slug-blog']) }}"
                                >Five Things You About Education.</a
                                >
                            </h5>
                            <div class="rbt-card-bottom">
                                <a
                                    class="transparent-button"
                                    href="{{ route('client.blog_detail', ['slug' => 'slug-blog']) }}"
                                >Read Article<i
                                    ><svg
                                            width="17"
                                            height="12"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <g
                                                stroke="#27374D"
                                                fill="none"
                                                fill-rule="evenodd"
                                            >
                                                <path
                                                    d="M10.614 0l5.629 5.629-5.63 5.629"
                                                />
                                                <path
                                                    stroke-linecap="square"
                                                    d="M.663 5.572h14.594"
                                                />
                                            </g></svg></i
                                    ></a>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Card  -->

                    <!-- Start Single Card  -->
                    <div
                        class="rbt-card card-list variation-02 rbt-hover mt--30"
                    >
                        <div class="rbt-card-img">
                            <a href="{{ route('client.blog_detail', ['slug' => 'slug-blog']) }}">
                                <img
                                    src="{{ asset('client_assets/images/blog/blog-card-06.jpg') }}"
                                    alt="Card image"
                                />
                            </a>
                        </div>
                        <div class="rbt-card-body">
                            <h5 class="rbt-card-title">
                                <a href="{{ route('client.blog_detail', ['slug' => 'slug-blog']) }}"
                                >You Will Never Truth Of Education.</a
                                >
                            </h5>
                            <div class="rbt-card-bottom">
                                <a
                                    class="transparent-button"
                                    href="{{ route('client.blog_detail', ['slug' => 'slug-blog']) }}"
                                >Read Article<i
                                    ><svg
                                            width="17"
                                            height="12"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <g
                                                stroke="#27374D"
                                                fill="none"
                                                fill-rule="evenodd"
                                            >
                                                <path
                                                    d="M10.614 0l5.629 5.629-5.63 5.629"
                                                />
                                                <path
                                                    stroke-linecap="square"
                                                    d="M.663 5.572h14.594"
                                                />
                                            </g></svg></i
                                    ></a>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Card  -->

                    <!-- Start Single Card  -->
                    <div
                        class="rbt-card card-list variation-02 rbt-hover mt--30"
                    >
                        <div class="rbt-card-img">
                            <a href="{{ route('client.blog_detail', ['slug' => 'slug-blog']) }}">
                                <img
                                    src="{{ asset('client_assets/images/blog/blog-card-07.jpg') }}"
                                    alt="Card image"
                                />
                            </a>
                        </div>
                        <div class="rbt-card-body">
                            <h5 class="rbt-card-title">
                                <a href="{{ route('client.blog_detail', ['slug' => 'slug-blog']) }}"
                                >Education Will Be Of The Past</a
                                >
                            </h5>
                            <div class="rbt-card-bottom">
                                <a
                                    class="transparent-button"
                                    href="{{ route('client.blog_detail', ['slug' => 'slug-blog']) }}"
                                >Read Article<i
                                    ><svg
                                            width="17"
                                            height="12"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <g
                                                stroke="#27374D"
                                                fill="none"
                                                fill-rule="evenodd"
                                            >
                                                <path
                                                    d="M10.614 0l5.629 5.629-5.63 5.629"
                                                />
                                                <path
                                                    stroke-linecap="square"
                                                    d="M.663 5.572h14.594"
                                                />
                                            </g></svg></i
                                    ></a>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Card  -->
                </div>
            </div>
            <!-- End Card Area -->
            <div class="row">
                <div class="col-lg-12 mt--60">
                    <nav>
                        <ul class="rbt-pagination">
                            <li>
                                <a href="#" aria-label="Previous"
                                ><i class="feather-chevron-left"></i
                                    ></a>
                            </li>
                            <li><a href="#">1</a></li>
                            <li class="active"><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li>
                                <a href="#" aria-label="Next"
                                ><i class="feather-chevron-right"></i
                                    ></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- End Card Style -->

    <div class="rbt-separator-mid">
        <div class="container">
            <hr class="rbt-separator m-0" />
        </div>
    </div>
    <!-- Start Footer aera -->
@endsection
