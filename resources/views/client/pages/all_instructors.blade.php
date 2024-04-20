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
                        <h2 class="title">Danh sách giảng viên</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb Area -->

    <div class="rbt-team-area bg-color-extra2 rbt-section-gap">
        <div class="container">
            <div class="row g-5">
                <!-- Start Single Team  -->
                <div class="col-lg-3 col-md-6 col-12">
                    <a href="{{ route('client.instructor_detail', ['slug'=> 'teacher-slug']) }}">
                        <div
                            class="rbt-team team-style-default style-three small-layout rbt-hover"
                        >
                            <div class="inner">
                                <div class="thumbnail">
                                    <img
                                        src="{{ asset('client_assets/images/team/team-01.jpg') }}"
                                        alt="Corporate Template"
                                    />
                                </div>
                                <div class="content">
                                    <h4 class="title">Zohaib Oneill</h4>
                                    <h6 class="subtitle theme-gradient">
                                        Math Teacher
                                    </h6>
                                    <span class="team-form">
                                            <i class="feather-map-pin"></i>
                                            <span class="location"
                                            >CO Miego, AD,USA</span
                                            >
                                        </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- End Single Team  -->

                <!-- Start Single Team  -->
                <div class="col-lg-3 col-md-6 col-12">
                    <a href="{{ route('client.instructor_detail', ['slug'=> 'teacher-slug']) }}">
                        <div
                            class="rbt-team team-style-default style-three small-layout rbt-hover"
                        >
                            <div class="inner">
                                <div class="thumbnail">
                                    <img
                                        src="{{ asset('client_assets/images/team/team-02.jpg') }}"
                                        alt="Corporate Template"
                                    />
                                </div>
                                <div class="content">
                                    <h2 class="title">Alvin Rivera</h2>
                                    <h6 class="subtitle theme-gradient">
                                        Depertment Head
                                    </h6>
                                    <span class="team-form">
                                            <i class="feather-map-pin"></i>
                                            <span class="location"
                                            >CO Miego, AD,USA</span
                                            >
                                        </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- End Single Team  -->

                <!-- Start Single Team  -->
                <div class="col-lg-3 col-md-6 col-12">
                    <div
                        class="rbt-team team-style-default style-three small-layout rbt-hover"
                    >
                        <div class="inner">
                            <div class="thumbnail">
                                <img
                                    src="{{ asset('client_assets/images/team/team-03.jpg') }}"
                                    alt="Corporate Template"
                                />
                            </div>
                            <div class="content">
                                <h2 class="title">Joao Lloyd</h2>
                                <h6 class="subtitle theme-gradient">
                                    Math Teacher
                                </h6>
                                <span class="team-form">
                                        <i class="feather-map-pin"></i>
                                        <span class="location"
                                        >CO Miego, AD,USA</span
                                        >
                                    </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Team  -->

                <!-- Start Single Team  -->
                <div class="col-lg-3 col-md-6 col-12">
                    <div
                        class="rbt-team team-style-default style-three small-layout rbt-hover"
                    >
                        <div class="inner">
                            <div class="thumbnail">
                                <img
                                    src="{{ asset('client_assets/images/team/team-04.jpg') }}"
                                    alt="Corporate Template"
                                />
                            </div>
                            <div class="content">
                                <h2 class="title">Bella</h2>
                                <h6 class="subtitle theme-gradient">
                                    Math Teacher
                                </h6>
                                <span class="team-form">
                                        <i class="feather-map-pin"></i>
                                        <span class="location"
                                        >CO Miego, AD,USA</span
                                        >
                                    </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Team  -->

            </div>

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
@endsection
