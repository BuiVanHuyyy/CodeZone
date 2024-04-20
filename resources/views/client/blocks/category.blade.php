<div class="rbt-categories-area bg-color-white rbt-section-gapBottom" style="padding-top: 100px;" id="category">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center">
                            <span class="subtitle bg-primary-opacity"
                            >Danh mục khóa học</span
                            >
                    <h2 class="title">
                        Khám phá các danh mục khóa học
                    </h2>
                </div>
            </div>
        </div>
        <div class="row g-5 mt--20">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a class="rbt-cat-box rbt-cat-box-1 text-center" href="{{ route('client.courses') }}?category=programing_basic">
                    <div class="inner">
                        <div class="icons">
                            <img
                                src="{{ asset('client_assets/images/category/personal.png') }} "
                                alt="Icons Images"
                            />
                        </div>
                        <div class="content">
                            <h5 class="title">Lập trình cơ bản</h5>
                            <div class="read-more-btn">
                                        <span class="rbt-btn-link">4 khóa học<i class="feather-arrow-right"></i></span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a class="rbt-cat-box rbt-cat-box-1 text-center" href="{{ route('client.courses') }}?category=web-development">
                    <div class="inner">
                        <div class="icons">
                            <img src="{{ asset('client_assets/images/category/web-design.png') }}" alt="Icons Images"/>
                        </div>
                        <div class="content">
                            <h5 class="title">Lập trình website</h5>
                            <div class="read-more-btn">
                                <span class="rbt-btn-link">4 khóa học<i class="feather-arrow-right"></i></span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a class="rbt-cat-box rbt-cat-box-1 text-center" href="{{ route('client.courses') }}?category=application">
                    <div class="inner">
                        <div class="icons">
                            <img src="{{ asset('client_assets/images/category/smartphone.png') }}" alt="Icons Images"/>
                        </div>
                        <div class="content">
                            <h5 class="title">
                                Lập trình ứng dụng mobile
                            </h5>
                            <div class="read-more-btn">
                                <span class="rbt-btn-link">4 khóa học<i class="feather-arrow-right"></i></span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a
                    class="rbt-cat-box rbt-cat-box-1 text-center"
                    href="{{ route('client.courses') }}?category=ai"
                >
                    <div class="inner">
                        <div class="icons">
                            <img
                                src="{{ asset('client_assets/images/category/server.png') }}"
                                alt="Icons Images"
                            />
                        </div>
                        <div class="content">
                            <h5 class="title">Lập trình AI</h5>
                            <div class="read-more-btn">
                                        <span class="rbt-btn-link"
                                        >4 khóa học<i
                                                class="feather-arrow-right"
                                            ></i
                                            ></span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
