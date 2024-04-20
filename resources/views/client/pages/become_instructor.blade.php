@extends('client.layout.master')
@section('content')
    <!-- Start breadcrumb Area -->
    <div
        class="rbt-breadcrumb-default ptb--100 ptb_md--50 ptb_sm--30 bg-gradient-1"
    >
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner text-center">
                        <h2 class="title">
                            Trở thành giảng viên của chúng tôi
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb Area -->

    <div class="rbt-become-area bg-color-white rbt-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <h2 class="title">Đăng ký trở thành giảng viên</h2>
                        <p
                            class="description has-medium-font-size mt--20 mb--40"
                        >
                            Lorem ipsum dolor sit amet, consectetur
                        </p>
                    </div>
                </div>
            </div>

            <div class="row row row--30">
                <div
                    class="col-lg-12 mt_md--40 mt_sm--40 order-2 order-lg-1"
                >
                    <div class="advance-tab-button">
                        <ul
                            class="nav nav-tabs tab-button-style-2"
                            id="myTab-4"
                            role="tablist"
                        >
                            <li role="presentation">
                                <a
                                    href="#"
                                    class="tab-button"
                                    id="home-tab-4"
                                    data-bs-toggle="tab"
                                    data-bs-target="#home-4"
                                    role="tab"
                                    aria-controls="home-4"
                                    aria-selected="false"
                                >
                                        <span class="title"
                                        >Become an Intructor.</span
                                        >
                                </a>
                            </li>
                            <li role="presentation">
                                <a
                                    href="#"
                                    class="tab-button active"
                                    id="profile-tab-4"
                                    data-bs-toggle="tab"
                                    data-bs-target="#profile-4"
                                    role="tab"
                                    aria-controls="profile-4"
                                    aria-selected="true"
                                >
                                        <span class="title"
                                        >Intructor Rules.</span
                                        >
                                </a>
                            </li>
                            <li role="presentation">
                                <a
                                    href="#"
                                    class="tab-button"
                                    id="contact-tab-4"
                                    data-bs-toggle="tab"
                                    data-bs-target="#contact-4"
                                    role="tab"
                                    aria-controls="contact-4"
                                    aria-selected="false"
                                >
                                        <span class="title"
                                        >Start with courses.</span
                                        >
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content advance-tab-content-style-2">
                        <div
                            class="tab-pane fade"
                            id="home-4"
                            role="tabpanel"
                            aria-labelledby="home-tab-4"
                        >
                            <div class="content">
                                <p>
                                    Educational technology ipsum dolor sit
                                    amet consectetur, adipisicing elit.
                                    Tempora sequi doloremque dicta quia unde
                                    odio nam minus reiciendis ullam aliquam,
                                    dolorum ab quisquam cum numquam nemo
                                    iure cumque iste. Accusamus
                                    necessitatibus.
                                </p>
                            </div>
                        </div>
                        <div
                            class="tab-pane fade active show"
                            id="profile-4"
                            role="tabpanel"
                            aria-labelledby="profile-tab-4"
                        >
                            <div class="content">
                                <p>
                                    Physical education ipsum dolor sit amet
                                    consectetur, adipisicing elit. Tempora
                                    sequi doloremque dicta quia unde odio
                                    nam minus reiciendis ullam aliquam,
                                    dolorum ab quisquam cum numquam nemo
                                    iure cumque iste. Accusamus
                                    necessitatibus.
                                </p>
                            </div>
                        </div>
                        <div
                            class="tab-pane fade"
                            id="contact-4"
                            role="tabpanel"
                            aria-labelledby="contact-tab-4"
                        >
                            <div class="content">
                                <p>
                                    Experiencing music ipsum dolor sit amet
                                    consectetur, adipisicing elit. Tempora
                                    sequi doloremque dicta quia unde odio
                                    nam minus reiciendis ullam aliquam,
                                    dolorum ab quisquam cum numquam nemo
                                    iure cumque iste. Accusamus
                                    necessitatibus.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row pt--60 g-5">
                <div class="col-lg-4">
                    <div class="thumbnail">
                        <img
                            class="radius-10 w-100"
                            src="{{ asset('client_assets/images/tab/tabs-10.jpg') }}"
                            alt="Corporate Template"
                        />
                    </div>
                </div>

                <div class="col-lg-8">
                    <div
                        class="rbt-contact-form contact-form-style-1 max-width-auto"
                    >
                        <div class="section-title text-start">
                                <span class="subtitle bg-primary-opacity">Form đăng ký</span>
                        </div>
                        <h3 class="title">Đăng ký trở thành giảng viên</h3>
                        <hr class="mb--30" />

                        <form action="#" class="row row--15">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input id="name" name="con_name" type="text" />
                                    <label for="name">Họ và tên</label>
                                    <span class="focus-border"></span>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input name="con_lastname"
                                        type="text"
                                    />
                                    <label>Last Name</label>
                                    <span class="focus-border"></span>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input id="nick_name" name="nick_name" type="text"/>
                                    <label for="nick_name">Nickname</label>
                                    <span class="focus-border"></span>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input id="phone_number" name="phone_number" type="text" />
                                    <label for="phone_number">Phone Number</label>
                                    <span class="focus-border"></span>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input id="phone_number" name="email" type="text" />
                                    <label for="phone_number">Email</label>
                                    <span class="focus-border"></span>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input id="password" name="password"
                                        type="password"
                                    />
                                    <label for="password">Password</label>
                                    <span class="focus-border"></span>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input id="password_confirm" name="password_confirm" type="password"/>
                                    <label for="password_confirm">Password Confirmation</label>
                                    <span class="focus-border"></span>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <textarea id="bio" name="bio"></textarea>
                                    <label for="bio">Bio</label>
                                    <span class="focus-border"></span>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-submit-group">
                                    <button type="submit" class="rbt-btn btn-md btn-gradient hover-icon-reverse w-100">
                                            <span class="icon-reverse-wrapper">
                                                <span class="btn-text">Đăng ký</span>
                                                <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                                <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                            </span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="thumb-wrapper bg-color-white rbt-section-gapBottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div
                        class="swiper rbt-gif-banner-area rbt-arrow-between"
                    >
                        <div class="swiper-wrapper">
                            <!-- Start Single Banner  -->
                            <div class="swiper-slide">
                                <div class="thumbnail">
                                    <a href="#">
                                        <img
                                            class="rbt-radius w-100"
                                            src="{{ asset('client_assets/images/banner/gallery-banner-01.jpg') }}"
                                            alt="Banner Images"
                                        />
                                    </a>
                                </div>
                            </div>
                            <!-- End Single Banner  -->
                            <!-- Start Single Banner  -->
                            <div class="swiper-slide">
                                <div class="thumbnail">
                                    <a href="#">
                                        <img
                                            class="rbt-radius w-100"
                                            src="{{ asset('client_assets/images/banner/gallery-banner-02.jpg') }}"
                                            alt="Banner Images"
                                        />
                                    </a>
                                </div>
                            </div>
                            <!-- End Single Banner  -->
                            <!-- Start Single Banner  -->
                            <div class="swiper-slide">
                                <div class="thumbnail">
                                    <a href="#">
                                        <img
                                            class="rbt-radius w-100"
                                            src="{{ asset('client_assets/images/banner/gallery-banner-03.jpg') }}"
                                            alt="Banner Images"
                                        />
                                    </a>
                                </div>
                            </div>
                            <!-- End Single Banner  -->
                        </div>

                        <div class="rbt-swiper-arrow rbt-arrow-left">
                            <div class="custom-overfolow">
                                <i class="rbt-icon feather-arrow-left"></i>
                                <i
                                    class="rbt-icon-top feather-arrow-left"
                                ></i>
                            </div>
                        </div>

                        <div class="rbt-swiper-arrow rbt-arrow-right">
                            <div class="custom-overfolow">
                                <i class="rbt-icon feather-arrow-right"></i>
                                <i
                                    class="rbt-icon-top feather-arrow-right"
                                ></i>
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
    <!-- Start Footer aera -->
@endsection
