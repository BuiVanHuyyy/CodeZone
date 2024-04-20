@extends('client.layout.master')
@section('content')
    <!-- Start Banner Area -->
    <div class="rbt-banner-area rbt-banner-8 variation-02">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-10 offset-lg-1">
                    <div class="content">
                        <div class="inner text-center">
                            <div class="rbt-new-badge rbt-new-badge-one">
                                <span class="rbt-new-badge-icon">🏆</span>
                                Nền tảng học lập trình hàng đầu
                            </div>

                            <h1 class="title">
                                Tìm hiểu về
                                <span class="header-caption">
                                        <span
                                            class="cd-headline clip is-full-width"
                                        >
                                            <span class="cd-words-wrapper">
                                                <b
                                                    class="is-visible theme-gradient"
                                                >Sứ mệnh</b
                                                >
                                                <b
                                                    class="is-hidden theme-gradient"
                                                >Tầm nhìn</b
                                                >
                                                <b
                                                    class="is-hidden theme-gradient"
                                                >Kế hoạch</b
                                                >
                                            </span>
                                        </span>
                                    </span>
                                <br />
                                của chúng tôi
                            </h1>
                            <h1
                                class="description has-medium-font-size mt--20"
                            ></h1>
                            <div
                                class="slider-btn rbt-button-group justify-content-center"
                            >
                                <a
                                    class="rbt-btn btn-gradient hover-icon-reverse"
                                    href="#"
                                >
                                        <span class="icon-reverse-wrapper">
                                            <span class="btn-text"
                                            >Log in to Start</span
                                            >
                                            <span class="btn-icon"
                                            ><i
                                                    class="feather-arrow-right"
                                                ></i
                                                ></span>
                                            <span class="btn-icon"
                                            ><i
                                                    class="feather-arrow-right"
                                                ></i
                                                ></span>
                                        </span>
                                </a>
                                <a
                                    class="rbt-btn hover-icon-reverse btn-white"
                                    href="#"
                                >
                                        <span class="icon-reverse-wrapper">
                                            <span class="btn-text"
                                            >Contact US</span
                                            >
                                            <span class="btn-icon"
                                            ><i
                                                    class="feather-arrow-right"
                                                ></i
                                                ></span>
                                            <span class="btn-icon"
                                            ><i
                                                    class="feather-arrow-right"
                                                ></i
                                                ></span>
                                        </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner Area -->

    <!-- Start Button Area  -->
    <div class="rbt-video-area rbt-section-gapBottom pt--50 bg-color-white">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 order-2 order-lg-1">
                    <div class="inner pr--50">
                        <div class="section-title text-start">
                                <span class="subtitle bg-primary-opacity"
                                >Sứ mệnh của chúng tôi</span
                                >
                            <h2 class="title">
                                Xây dựng Sự Nghiệp và Nâng Cao Cuộc Sống của
                                Bạn với CodeZone
                            </h2>
                            <p class="description mt--30">
                                CodeZone không chỉ là nền tảng dạy lập trình
                                mà còn là cầu nối đến một tương lai đầy tiềm
                                năng và thành công. Với chúng tôi, bạn không
                                chỉ học lập trình mà còn xây dựng nghề
                                nghiệp và nâng cao chất lượng cuộc sống của
                                mình. Hãy tham gia ngay để khám phá cơ hội
                                mới và trải nghiệm sự thành công!
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2">
                    <div class="video-popup-wrapper">
                        <img
                            class="w-100 rbt-radius"
                            src="{{ asset('client_assets/images/others/video-01.jpg') }}"
                            alt="Video Images"
                        />
                        <a
                            class="popup-video position-to-top"
                            href="https://www.youtube.com/watch?v=nA1Aqp0sPQo"
                        >
                                <span
                                ><img
                                        src="{{ asset('client_assets/images/icons/youtube.png') }}"
                                        alt=""
                                    /></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Button Area  -->

    <div class="rbt-testimonial-area bg-color-white pb--80 overflow-hidden">
        <div class="container-fluid">
            <div class="row g-5 align-items-center">
                <div class="col-xl-3">
                    <div class="section-title pl--100 pl_sm--30">
                            <span class="subtitle bg-pink-opacity"
                            >Phản hồi</span
                            >
                        <h2 class="title">Học viên của chúng tôi nói gì</h2>
                    </div>
                </div>
                <div class="col-xl-9">
                    <div class="overflow-hidden">
                        <div class="scroll-animation-wrapper pt--50 pb--30">
                            <div class="scroll-animation scroll-right-left">
                                <!-- Start Single Testimonial  -->
                                <div class="single-column-20">
                                    <div class="rbt-testimonial-box">
                                        <div class="inner">
                                            <div class="clint-info-wrapper">
                                                <div class="thumb">
                                                    <img
                                                        src="{{ asset('client_assets/images/testimonial/client-01.png') }}"
                                                        alt="Clint Images"
                                                    />
                                                </div>
                                                <div class="client-info">
                                                    <h5 class="title">
                                                        Martha Maldonado
                                                    </h5>
                                                    <span
                                                    >Executive Chairman
                                                            <i
                                                            >@ Google</i
                                                            ></span
                                                    >
                                                </div>
                                            </div>
                                            <div class="description">
                                                <p class="subtitle-3">
                                                    After the launch,
                                                    vulputate at sapien sit
                                                    amet, auctor iaculis
                                                    lorem. In vel hend rerit
                                                    nisi. Vestibulum eget
                                                    risus velit.
                                                </p>
                                                <div class="rating mt--20">
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Testimonial  -->

                                <!-- Start Single Testimonial  -->
                                <div class="single-column-20">
                                    <div class="rbt-testimonial-box">
                                        <div class="inner">
                                            <div class="clint-info-wrapper">
                                                <div class="thumb">
                                                    <img
                                                        src="{{ asset('client_assets/images/testimonial/client-02.png') }}"
                                                        alt="Clint Images"
                                                    />
                                                </div>
                                                <div class="client-info">
                                                    <h5 class="title">
                                                        Michael D. Lovelady
                                                    </h5>
                                                    <span
                                                    >CEO
                                                            <i
                                                            >@ Google</i
                                                            ></span
                                                    >
                                                </div>
                                            </div>
                                            <div class="description">
                                                <p class="subtitle-3">
                                                    Histudy education,
                                                    vulputate at sapien sit
                                                    amet, auctor iaculis
                                                    lorem. In vel hend rerit
                                                    nisi. Vestibulum eget
                                                    risus velit.
                                                </p>
                                                <div class="rating mt--20">
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Testimonial  -->

                                <!-- Start Single Testimonial  -->
                                <div class="single-column-20">
                                    <div class="rbt-testimonial-box">
                                        <div class="inner">
                                            <div class="clint-info-wrapper">
                                                <div class="thumb">
                                                    <img
                                                        src="{{ asset('client_assets/images/testimonial/client-03.png') }}"
                                                        alt="Clint Images"
                                                    />
                                                </div>
                                                <div class="client-info">
                                                    <h5 class="title">
                                                        Valerie J. Creasman
                                                    </h5>
                                                    <span
                                                    >Executive Designer
                                                            <i
                                                            >@ Google</i
                                                            ></span
                                                    >
                                                </div>
                                            </div>
                                            <div class="description">
                                                <p class="subtitle-3">
                                                    Our educational,
                                                    vulputate at sapien sit
                                                    amet, auctor iaculis
                                                    lorem. In vel hend rerit
                                                    nisi. Vestibulum eget
                                                    risus velit.
                                                </p>
                                                <div class="rating mt--20">
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Testimonial  -->

                                <!-- Start Single Testimonial  -->
                                <div class="single-column-20">
                                    <div class="rbt-testimonial-box">
                                        <div class="inner">
                                            <div class="clint-info-wrapper">
                                                <div class="thumb">
                                                    <img
                                                        src="{{ asset('client_assets/images/testimonial/client-04.png') }}"
                                                        alt="Clint Images"
                                                    />
                                                </div>
                                                <div class="client-info">
                                                    <h5 class="title">
                                                        Hannah R. Sutton
                                                    </h5>
                                                    <span
                                                    >Executive Chairman
                                                            <i
                                                            >@ Facebook</i
                                                            ></span
                                                    >
                                                </div>
                                            </div>
                                            <div class="description">
                                                <p class="subtitle-3">
                                                    People says about,
                                                    vulputate at sapien sit
                                                    amet, auctor iaculis
                                                    lorem. In vel hend rerit
                                                    nisi. Vestibulum eget
                                                    risus velit.
                                                </p>
                                                <div class="rating mt--20">
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Testimonial  -->
                                <!-- Start Single Testimonial  -->
                                <div class="single-column-20">
                                    <div class="rbt-testimonial-box">
                                        <div class="inner">
                                            <div class="clint-info-wrapper">
                                                <div class="thumb">
                                                    <img
                                                        src="{{ asset('client_assets/images/testimonial/client-05.png') }}"
                                                        alt="Clint Images"
                                                    />
                                                </div>
                                                <div class="client-info">
                                                    <h5 class="title">
                                                        Pearl B. Hill
                                                    </h5>
                                                    <span
                                                    >Chairman SR
                                                            <i
                                                            >@ Facebook</i
                                                            ></span
                                                    >
                                                </div>
                                            </div>
                                            <div class="description">
                                                <p class="subtitle-3">
                                                    Like this histudy,
                                                    vulputate at sapien sit
                                                    amet, auctor iaculis
                                                    lorem. In vel hend rerit
                                                    nisi. Vestibulum eget
                                                    risus velit.
                                                </p>
                                                <div class="rating mt--20">
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Testimonial  -->

                                <!-- Start Single Testimonial  -->
                                <div class="single-column-20">
                                    <div class="rbt-testimonial-box">
                                        <div class="inner">
                                            <div class="clint-info-wrapper">
                                                <div class="thumb">
                                                    <img
                                                        src="{{ asset('client_assets/images/testimonial/client-06.png') }}"
                                                        alt="Clint Images"
                                                    />
                                                </div>
                                                <div class="client-info">
                                                    <h5 class="title">
                                                        Mandy F. Wood
                                                    </h5>
                                                    <span
                                                    >SR Designer
                                                            <i
                                                            >@ Google</i
                                                            ></span
                                                    >
                                                </div>
                                            </div>
                                            <div class="description">
                                                <p class="subtitle-3">
                                                    Educational template,
                                                    vulputate at sapien sit
                                                    amet, auctor iaculis
                                                    lorem. In vel hend rerit
                                                    nisi. Vestibulum eget
                                                    risus velit.
                                                </p>
                                                <div class="rating mt--20">
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Testimonial  -->

                                <!-- Start Single Testimonial  -->
                                <div class="single-column-20">
                                    <div class="rbt-testimonial-box">
                                        <div class="inner">
                                            <div class="clint-info-wrapper">
                                                <div class="thumb">
                                                    <img
                                                        src="{{ asset('client_assets/images/testimonial/client-07.png') }}"
                                                        alt="Clint Images"
                                                    />
                                                </div>
                                                <div class="client-info">
                                                    <h5 class="title">
                                                        Mildred W. Diaz
                                                    </h5>
                                                    <span
                                                    >Executive Officer
                                                            <i>@ Yelp</i></span
                                                    >
                                                </div>
                                            </div>
                                            <div class="description">
                                                <p class="subtitle-3">
                                                    Online leaning,
                                                    vulputate at sapien sit
                                                    amet, auctor iaculis
                                                    lorem. In vel hend rerit
                                                    nisi. Vestibulum eget
                                                    risus velit.
                                                </p>
                                                <div class="rating mt--20">
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Testimonial  -->

                                <!-- Start Single Testimonial  -->
                                <div class="single-column-20">
                                    <div class="rbt-testimonial-box">
                                        <div class="inner">
                                            <div class="clint-info-wrapper">
                                                <div class="thumb">
                                                    <img
                                                        src="{{ asset('client_assets/images/testimonial/client-08.png') }}"
                                                        alt="Clint Images"
                                                    />
                                                </div>
                                                <div class="client-info">
                                                    <h5 class="title">
                                                        Christopher H. Win
                                                    </h5>
                                                    <span
                                                    >Product Designer
                                                            <i
                                                            >@ Google</i></span
                                                    >
                                                </div>
                                            </div>
                                            <div class="description">
                                                <p class="subtitle-3">
                                                    Remote learning,
                                                    vulputate at sapien sit
                                                    amet, auctor iaculis
                                                    lorem. In vel hend rerit
                                                    nisi. Vestibulum eget
                                                    risus velit.
                                                </p>
                                                <div class="rating mt--20">
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Testimonial  -->

                                <!-- Start Single Testimonial  -->
                                <div class="single-column-20">
                                    <div class="rbt-testimonial-box">
                                        <div class="inner">
                                            <div class="clint-info-wrapper">
                                                <div class="thumb">
                                                    <img
                                                        src="{{ asset('client_assets/images/testimonial/client-01.png') }}"
                                                        alt="Clint Images"
                                                    />
                                                </div>
                                                <div class="client-info">
                                                    <h5 class="title">
                                                        Martha Maldonado
                                                    </h5>
                                                    <span
                                                    >Executive Chairman
                                                            <i
                                                            >@ Google</i
                                                            ></span
                                                    >
                                                </div>
                                            </div>
                                            <div class="description">
                                                <p class="subtitle-3">
                                                    University managemnet,
                                                    vulputate at sapien sit
                                                    amet, auctor iaculis
                                                    lorem. In vel hend rerit
                                                    nisi. Vestibulum eget
                                                    risus velit.
                                                </p>
                                                <div class="rating mt--20">
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Testimonial  -->
                            </div>
                        </div>
                        <div class="scroll-animation-wrapper pb--50">
                            <div class="scroll-animation scroll-left-right">
                                <!-- Start Single Testimonial  -->
                                <div class="single-column-20">
                                    <div class="rbt-testimonial-box">
                                        <div class="inner">
                                            <div class="clint-info-wrapper">
                                                <div class="thumb">
                                                    <img
                                                        src="{{ asset('client_assets/images/testimonial/client-01.png') }}"
                                                        alt="Clint Images"
                                                    />
                                                </div>
                                                <div class="client-info">
                                                    <h5 class="title">
                                                        Martha Maldonado
                                                    </h5>
                                                    <span
                                                    >Executive Chairman
                                                            <i
                                                            >@ Google</i
                                                            ></span
                                                    >
                                                </div>
                                            </div>
                                            <div class="description">
                                                <p class="subtitle-3">
                                                    University managemnet,
                                                    vulputate at sapien sit
                                                    amet, auctor iaculis
                                                    lorem. In vel hend rerit
                                                    nisi. Vestibulum eget
                                                    risus velit.
                                                </p>
                                                <div class="rating mt--20">
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Testimonial  -->

                                <!-- Start Single Testimonial  -->
                                <div class="single-column-20">
                                    <div class="rbt-testimonial-box">
                                        <div class="inner">
                                            <div class="clint-info-wrapper">
                                                <div class="thumb">
                                                    <img
                                                        src="{{ asset('client_assets/images/testimonial/client-08.png') }}"
                                                        alt="Clint Images"
                                                    />
                                                </div>
                                                <div class="client-info">
                                                    <h5 class="title">
                                                        Christopher H. Win
                                                    </h5>
                                                    <span
                                                    >Product Designer
                                                            <i
                                                            >@ Google</i
                                                            ></span
                                                    >
                                                </div>
                                            </div>
                                            <div class="description">
                                                <p class="subtitle-3">
                                                    Remote learning,
                                                    vulputate at sapien sit
                                                    amet, auctor iaculis
                                                    lorem. In vel hend rerit
                                                    nisi. Vestibulum eget
                                                    risus velit.
                                                </p>
                                                <div class="rating mt--20">
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Testimonial  -->

                                <!-- Start Single Testimonial  -->
                                <div class="single-column-20">
                                    <div class="rbt-testimonial-box">
                                        <div class="inner">
                                            <div class="clint-info-wrapper">
                                                <div class="thumb">
                                                    <img
                                                        src="{{ asset('client_assets/images/testimonial/client-07.png') }}"
                                                        alt="Clint Images"
                                                    />
                                                </div>
                                                <div class="client-info">
                                                    <h5 class="title">
                                                        Mildred W. Diaz
                                                    </h5>
                                                    <span
                                                    >Executive Officer
                                                            <i>@ Yelp</i></span
                                                    >
                                                </div>
                                            </div>
                                            <div class="description">
                                                <p class="subtitle-3">
                                                    Online leaning,
                                                    vulputate at sapien sit
                                                    amet, auctor iaculis
                                                    lorem. In vel hend rerit
                                                    nisi. Vestibulum eget
                                                    risus velit.
                                                </p>
                                                <div class="rating mt--20">
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Testimonial  -->

                                <!-- Start Single Testimonial  -->
                                <div class="single-column-20">
                                    <div class="rbt-testimonial-box">
                                        <div class="inner">
                                            <div class="clint-info-wrapper">
                                                <div class="thumb">
                                                    <img
                                                        src="{{ asset('client_assets/images/testimonial/client-06.png') }}"
                                                        alt="Clint Images"
                                                    />
                                                </div>
                                                <div class="client-info">
                                                    <h5 class="title">
                                                        Mandy F. Wood
                                                    </h5>
                                                    <span
                                                    >SR Designer
                                                            <i
                                                            >@ Google</i
                                                            ></span
                                                    >
                                                </div>
                                            </div>
                                            <div class="description">
                                                <p class="subtitle-3">
                                                    Educational template,
                                                    vulputate at sapien sit
                                                    amet, auctor iaculis
                                                    lorem. In vel hend rerit
                                                    nisi. Vestibulum eget
                                                    risus velit.
                                                </p>
                                                <div class="rating mt--20">
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Testimonial  -->

                                <!-- Start Single Testimonial  -->
                                <div class="single-column-20">
                                    <div class="rbt-testimonial-box">
                                        <div class="inner">
                                            <div class="clint-info-wrapper">
                                                <div class="thumb">
                                                    <img
                                                        src="{{ asset('client_assets/images/testimonial/client-05.png') }}"
                                                        alt="Clint Images"
                                                    />
                                                </div>
                                                <div class="client-info">
                                                    <h5 class="title">
                                                        Pearl B. Hill
                                                    </h5>
                                                    <span
                                                    >Chairman SR
                                                            <i
                                                            >@ Facebook</i
                                                            ></span
                                                    >
                                                </div>
                                            </div>
                                            <div class="description">
                                                <p class="subtitle-3">
                                                    Like this histudy,
                                                    vulputate at sapien sit
                                                    amet, auctor iaculis
                                                    lorem. In vel hend rerit
                                                    nisi. Vestibulum eget
                                                    risus velit.
                                                </p>
                                                <div class="rating mt--20">
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Testimonial  -->

                                <!-- Start Single Testimonial  -->
                                <div class="single-column-20">
                                    <div class="rbt-testimonial-box">
                                        <div class="inner">
                                            <div class="clint-info-wrapper">
                                                <div class="thumb">
                                                    <img
                                                        src="{{ asset('client_assets/images/testimonial/client-06.png') }}"
                                                        alt="Clint Images"
                                                    />
                                                </div>
                                                <div class="client-info">
                                                    <h5 class="title">
                                                        Mandy F. Wood
                                                    </h5>
                                                    <span
                                                    >SR Designer
                                                            <i
                                                            >@ Google</i
                                                            ></span
                                                    >
                                                </div>
                                            </div>
                                            <div class="description">
                                                <p class="subtitle-3">
                                                    Educational template,
                                                    vulputate at sapien sit
                                                    amet, auctor iaculis
                                                    lorem. In vel hend rerit
                                                    nisi. Vestibulum eget
                                                    risus velit.
                                                </p>
                                                <div class="rating mt--20">
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Testimonial  -->

                                <!-- Start Single Testimonial  -->
                                <div class="single-column-20">
                                    <div class="rbt-testimonial-box">
                                        <div class="inner">
                                            <div class="clint-info-wrapper">
                                                <div class="thumb">
                                                    <img
                                                        src="{{ asset('client_assets/images/testimonial/client-07.png') }}"
                                                        alt="Clint Images"
                                                    />
                                                </div>
                                                <div class="client-info">
                                                    <h5 class="title">
                                                        Mildred W. Diaz
                                                    </h5>
                                                    <span
                                                    >Executive Officer
                                                            <i>@ Yelp</i></span
                                                    >
                                                </div>
                                            </div>
                                            <div class="description">
                                                <p class="subtitle-3">
                                                    Online leaning,
                                                    vulputate at sapien sit
                                                    amet, auctor iaculis
                                                    lorem. In vel hend rerit
                                                    nisi. Vestibulum eget
                                                    risus velit.
                                                </p>
                                                <div class="rating mt--20">
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Testimonial  -->

                                <!-- Start Single Testimonial  -->
                                <div class="single-column-20">
                                    <div class="rbt-testimonial-box">
                                        <div class="inner">
                                            <div class="clint-info-wrapper">
                                                <div class="thumb">
                                                    <img
                                                        src="{{ asset('client_assets/images/testimonial/client-08.png') }}"
                                                        alt="Clint Images"
                                                    />
                                                </div>
                                                <div class="client-info">
                                                    <h5 class="title">
                                                        Christopher H. Win
                                                    </h5>
                                                    <span
                                                    >Product Designer
                                                            <i
                                                            >@ Google</i
                                                            ></span
                                                    >
                                                </div>
                                            </div>
                                            <div class="description">
                                                <p class="subtitle-3">
                                                    Remote learning,
                                                    vulputate at sapien sit
                                                    amet, auctor iaculis
                                                    lorem. In vel hend rerit
                                                    nisi. Vestibulum eget
                                                    risus velit.
                                                </p>
                                                <div class="rating mt--20">
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Testimonial  -->

                                <!-- Start Single Testimonial  -->
                                <div class="single-column-20">
                                    <div class="rbt-testimonial-box">
                                        <div class="inner">
                                            <div class="clint-info-wrapper">
                                                <div class="thumb">
                                                    <img
                                                        src="{{ asset('client_assets/images/testimonial/client-01.png') }}"
                                                        alt="Clint Images"
                                                    />
                                                </div>
                                                <div class="client-info">
                                                    <h5 class="title">
                                                        Martha Maldonado
                                                    </h5>
                                                    <span
                                                    >Executive Chairman
                                                            <i
                                                            >@ Google</i
                                                            ></span
                                                    >
                                                </div>
                                            </div>
                                            <div class="description">
                                                <p class="subtitle-3">
                                                    University managemnet,
                                                    vulputate at sapien sit
                                                    amet, auctor iaculis
                                                    lorem. In vel hend rerit
                                                    nisi. Vestibulum eget
                                                    risus velit.
                                                </p>
                                                <div class="rating mt--20">
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                    <a href="#"
                                                    ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Testimonial  -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rbt-team-area bg-gradient-8 rbt-section-gap">
        <div class="container">
            <div class="row mb--60 g-5 align-items-end">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="section-title text-start">
                        <span class="subtitle bg-white-opacity">Đội ngũ giảng viên</span>
                        <h2 class="title color-white">Các giảng viên tiêu biểu của chúng tôi</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="read-more-btn text-start text-md-end">
                        <a class="rbt-btn hover-icon-reverse radius-round btn-white" href="#">
                            <div class="icon-reverse-wrapper">
                                <span class="btn-text">Trở thành giảng viên của chúng tôi</span>
                                <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row g-5">

                <!-- Start Single Team  -->
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="rbt-team-modal-thumb nav nav-tabs">
                        <a class="rbt-team-thumbnail" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <div class="thumb">
                                <img src="{{ asset('client_assets/images/team/team-05.jpg') }}" alt="Testimonial Images">
                            </div>
                        </a>
                    </div>
                </div>
                <!-- End Single Team  -->

                <!-- Start Single Team  -->
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="rbt-team-modal-thumb nav nav-tabs">
                        <a class="rbt-team-thumbnail" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <div class="thumb">
                                <img src="{{ asset('client_assets/images/team/team-09.jpg') }}" alt="Testimonial Images">
                            </div>
                        </a>
                    </div>
                </div>
                <!-- End Single Team  -->

                <!-- Start Single Team  -->
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="rbt-team-modal-thumb nav nav-tabs">
                        <a class="rbt-team-thumbnail" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <div class="thumb">
                                <img src="{{ asset('client_assets/images/team/team-03.jpg') }}" alt="Testimonial Images">
                            </div>
                        </a>
                    </div>
                </div>
                <!-- End Single Team  -->

                <!-- Start Single Team  -->
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="rbt-team-modal-thumb nav nav-tabs">
                        <a class="rbt-team-thumbnail" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <div class="thumb">
                                <img src="{{ asset('client_assets/images/team/team-07.jpg') }}" alt="Testimonial Images">
                            </div>
                        </a>
                    </div>
                </div>
                <!-- End Single Team  -->

                <!-- Start Single Team  -->
                <div class="col-lg-2 col-md-3 col-sm-4 col-12">
                    <div class="rbt-team-modal-thumb nav nav-tabs">
                        <a class="rbt-team-thumbnail" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <div class="thumb">
                                <img src="{{ asset('client_assets/images/team/team-01.jpg') }}" alt="Testimonial Images">
                            </div>
                        </a>
                    </div>
                </div>
                <!-- End Single Team  -->

                <!-- Start Single Team  -->
                <div class="col-lg-2 col-md-3 col-sm-4 col-12">
                    <div class="rbt-team-modal-thumb nav nav-tabs">
                        <a class="rbt-team-thumbnail" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <div class="thumb">
                                <img src="{{ asset('client_assets/images/team/team-02.jpg') }}" alt="Testimonial Images">
                            </div>
                        </a>
                    </div>
                </div>
                <!-- End Single Team  -->

                <!-- Start Single Team  -->
                <div class="col-lg-2 col-md-3 col-sm-4 col-12">
                    <div class="rbt-team-modal-thumb nav nav-tabs">
                        <a class="rbt-team-thumbnail" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <div class="thumb">
                                <img src="{{ asset('client_assets/images/team/team-04.jpg') }}" alt="Testimonial Images">
                            </div>
                        </a>
                    </div>
                </div>
                <!-- End Single Team  -->

                <!-- Start Single Team  -->
                <div class="col-lg-2 col-md-3 col-sm-4 col-12">
                    <div class="rbt-team-modal-thumb nav nav-tabs">
                        <a class="rbt-team-thumbnail" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <div class="thumb">
                                <img src="{{ asset('client_assets/images/team/team-06.jpg') }}" alt="Testimonial Images">
                            </div>
                        </a>
                    </div>
                </div>
                <!-- End Single Team  -->

                <!-- Start Single Team  -->
                <div class="col-lg-2 col-md-3 col-sm-4 col-12">
                    <div class="rbt-team-modal-thumb nav nav-tabs">
                        <a class="rbt-team-thumbnail" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <div class="thumb">
                                <img src="{{ asset('client_assets/images/team/team-08.jpg') }}" alt="Testimonial Images">
                            </div>
                        </a>
                    </div>
                </div>
                <!-- End Single Team  -->

                <!-- Start Single Team  -->
                <div class="col-lg-2 col-md-3 col-sm-4 col-12">
                    <div class="rbt-team-modal-thumb nav nav-tabs">
                        <a class="rbt-team-thumbnail" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <div class="thumb">
                                <img src="{{ asset('client_assets/images/team/team-10.jpg') }}" alt="Testimonial Images">
                            </div>
                        </a>
                    </div>
                </div>
                <!-- End Single Team  -->

            </div>

            <div class="rbt-team-modal modal fade rbt-modal-default" id="exampleModal" tabindex="-1" aria-labelledby="exampleModal" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="rbt-round-btn" data-bs-dismiss="modal" aria-label="Close">
                                <i class="feather-x"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="inner">
                                <div class="row g-5 row--30 align-items-center">
                                    <div class="col-lg-4">
                                        <div class="rbt-team-thumbnail">
                                            <div class="thumb">
                                                <img class="w-100" src="{{ asset('client_assets/images/team/team-09.jpg') }}" alt="Testimonial Images">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="rbt-team-details">
                                            <div class="author-info">
                                                <h4 class="title">Mames Mary</h4>
                                                <span class="designation theme-gradient">English Teacher</span>
                                                <span class="team-form">
                                        <i class="feather-map-pin"></i>
                                        <span class="location">CO Miego, AD,USA</span>
                                                </span>
                                            </div>
                                            <p class="mb--15">You can run Histudy easily. Any School, University, College can be use this histudy education template for their educational purpose. A university can be success you.</p>

                                            <p>Run their online leaning management system by histudy education template any where and time.</p>
                                            <ul class="social-icon social-default mt--20 justify-content-start">
                                                <li><a href="https://www.facebook.com/">
                                                        <i class="feather-facebook"></i>
                                                    </a>
                                                </li>
                                                <li><a href="https://www.twitter.com/">
                                                        <i class="feather-twitter"></i>
                                                    </a>
                                                </li>
                                                <li><a href="https://www.instagram.com/">
                                                        <i class="feather-instagram"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://www.linkdin.com/">
                                                        <i class="feather-linkedin"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                            <ul class="rbt-information-list mt--25">
                                                <li>
                                                    <a href="#"><i class="feather-phone"></i>+1-202-555-0174</a>
                                                </li>
                                                <li>
                                                    <a href="mailto:hello@example.com"><i
                                                            class="feather-mail"></i>example@gmail.com</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="top-circle-shape"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div
        class="rbt-newsletter-area newsletter-style-2 bg-color-primary rbt-section-gap"
    >
        <div class="container">
            <div class="row row--15 align-items-center">
                <div class="col-lg-12">
                    <div class="inner text-center">
                        <div class="section-title text-center">
                                <span class="subtitle bg-white-opacity"
                                >Nhận thông tin của chúng tôi</span
                                >
                            <h2 class="title color-white">
                                <strong>Subscribe</strong> Our Newsletter
                            </h2>
                        </div>
                        <form action="#" class="newsletter-form-1 mt--40">
                            <input
                                type="email"
                                placeholder="Nhập địa chỉ Email"
                            />
                            <button
                                type="submit"
                                class="rbt-btn btn-md btn-gradient hover-icon-reverse"
                            >
                                    <span class="icon-reverse-wrapper">
                                        <span class="btn-text">Subscribe</span>
                                        <span class="btn-icon"
                                        ><i class="feather-arrow-right"></i
                                            ></span>
                                        <span class="btn-icon"
                                        ><i class="feather-arrow-right"></i
                                            ></span>
                                    </span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
