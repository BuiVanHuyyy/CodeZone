@extends('client.pages.instructors.layout.master')

@section('dashboard-main-content')
    <div class="rbt-dashboard-content bg-color-white rbt-shadow-box mb--60">
        <div class="content">
            <div class="section-title">
                <h4 class="rbt-title-style-3">
                    Dashboard
                </h4>
            </div>
            <div class="row g-5">
                <!-- Start Single Card  -->
                <div
                    class="col-lg-4 col-md-4 col-sm-6 col-12"
                >
                    <div
                        class="rbt-counterup variation-01 rbt-hover-03 rbt-border-dashed bg-primary-opacity"
                    >
                        <div class="inner">
                            <div class="rbt-round-icon bg-primary-opacity">
                                <i class="feather-book-open"></i>
                            </div>
                            <div class="content">
                                <h3 class="counter without-icon color-primary">
                                    <span class="odometer" data-count="{{ Auth::user()->instructors->courses->count() }}">00</span>
                                </h3>
                                <span class="rbt-title-style-2 d-block">Khóa học đã tạo</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Card  -->

                <!-- Start Single Card  -->
                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="rbt-counterup variation-01 rbt-hover-03 rbt-border-dashed bg-secondary-opacity">
                        <div class="inner">
                            <div class="rbt-round-icon bg-secondary-opacity">
                                <i class="feather-monitor"></i>
                            </div>
                            <div class="content">
                                <h3 class="counter without-icon color-secondary">
                                    <span class="odometer" data-count="{{ Auth::user()->instructors->courses->where('status', 'active')->count() }}">00</span>
                                </h3>
                                <span class="rbt-title-style-2 d-block">Khóa học đang hoạt động</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Card  -->

                <!-- Start Single Card  -->
                <div
                    class="col-lg-4 col-md-4 col-sm-6 col-12"
                >
                    <div
                        class="rbt-counterup variation-01 rbt-hover-03 rbt-border-dashed bg-violet-opacity"
                    >
                        <div class="inner">
                            <div
                                class="rbt-round-icon bg-violet-opacity"
                            >
                                <i
                                    class="feather-award"
                                ></i>
                            </div>
                            <div class="content">
                                <h3
                                    class="counter without-icon color-violet"
                                >
                                                                <span
                                                                    class="odometer"
                                                                    data-count="7"
                                                                >00</span
                                                                >
                                </h3>
                                <span
                                    class="rbt-title-style-2 d-block"
                                >Completed
                                                                Courses</span
                                >
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Card  -->

                <!-- Start Single Card  -->
                <div
                    class="col-lg-4 col-md-4 col-sm-6 col-12"
                >
                    <div
                        class="rbt-counterup variation-01 rbt-hover-03 rbt-border-dashed bg-pink-opacity"
                    >
                        <div class="inner">
                            <div
                                class="rbt-round-icon bg-pink-opacity"
                            >
                                <i
                                    class="feather-users"
                                ></i>
                            </div>
                            <div class="content">
                                <h3
                                    class="counter without-icon color-pink"
                                >
                                                                <span
                                                                    class="odometer"
                                                                    data-count="160"
                                                                >00</span
                                                                >
                                </h3>
                                <span
                                    class="rbt-title-style-2 d-block"
                                >Tổng học
                                                                sinh</span
                                >
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Card  -->

                <!-- Start Single Card  -->
                <div
                    class="col-lg-4 col-md-4 col-sm-6 col-12"
                >
                    <div
                        class="rbt-counterup variation-01 rbt-hover-03 rbt-border-dashed bg-coral-opacity"
                    >
                        <div class="inner">
                            <div
                                class="rbt-round-icon bg-coral-opacity"
                            >
                                <i
                                    class="feather-gift"
                                ></i>
                            </div>
                            <div class="content">
                                <h3
                                    class="counter without-icon color-coral"
                                >
                                                                <span
                                                                    class="odometer"
                                                                    data-count="20"
                                                                >00</span
                                                                >
                                </h3>
                                <span
                                    class="rbt-title-style-2 d-block"
                                >Total
                                                                Courses</span
                                >
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Card  -->

                <!-- Start Single Card  -->
                <div
                    class="col-lg-4 col-md-4 col-sm-6 col-12"
                >
                    <div
                        class="rbt-counterup variation-01 rbt-hover-03 rbt-border-dashed bg-warning-opacity"
                    >
                        <div class="inner">
                            <div
                                class="rbt-round-icon bg-warning-opacity"
                            >
                                <i
                                    class="feather-dollar-sign"
                                ></i>
                            </div>
                            <div class="content">
                                <h3
                                    class="counter color-warning"
                                >
                                                                <span
                                                                    class="odometer"
                                                                    data-count="2500"
                                                                >00</span
                                                                >
                                </h3>
                                <span
                                    class="rbt-title-style-2 d-block"
                                >Tổng doanh
                                                                thu</span
                                >
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Card  -->
            </div>
        </div>
    </div>
    <div class="rbt-dashboard-content bg-color-white rbt-shadow-box mb--60">
        <div class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h4
                            class="rbt-title-style-3"
                        >
                            Khóa học của tôi
                        </h4>
                    </div>
                </div>
            </div>
            <div class="row gy-5">
                <div class="col-lg-12">
                    <div
                        class="rbt-dashboard-table table-responsive"
                    >
                        <table
                            class="rbt-table table table-borderless"
                        >
                            <thead>
                            <tr>
                                <th>Tên</th>
                                <th>
                                    Học sinh
                                </th>
                                <th>Rating</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th>
                                    <a href="#"
                                    >Accounting</a
                                    >
                                </th>
                                <td>50</td>
                                <td>
                                    <div
                                        class="rating"
                                    >
                                        <i
                                            class="fas fa-star"
                                        ></i>
                                        <i
                                            class="fas fa-star"
                                        ></i>
                                        <i
                                            class="fas fa-star"
                                        ></i>
                                        <i
                                            class="fas fa-star"
                                        ></i>
                                        <i
                                            class="fas fa-star"
                                        ></i>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <a href="#"
                                    >Marketing</a
                                    >
                                </th>
                                <td>40</td>
                                <td>
                                    <div
                                        class="rating"
                                    >
                                        <i
                                            class="fas fa-star"
                                        ></i>
                                        <i
                                            class="fas fa-star"
                                        ></i>
                                        <i
                                            class="fas fa-star"
                                        ></i>
                                        <i
                                            class="fas fa-star"
                                        ></i>
                                        <i
                                            class="fas fa-star"
                                        ></i>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <a href="#"
                                    >Web
                                        Design</a
                                    >
                                </th>
                                <td>75</td>
                                <td>
                                    <div
                                        class="rating"
                                    >
                                        <i
                                            class="fas fa-star"
                                        ></i>
                                        <i
                                            class="fas fa-star"
                                        ></i>
                                        <i
                                            class="fas fa-star"
                                        ></i>
                                        <i
                                            class="fas fa-star"
                                        ></i>
                                        <i
                                            class="fas fa-star"
                                        ></i>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <a href="#"
                                    >Graphic</a
                                    >
                                </th>
                                <td>20</td>
                                <td>
                                    <div
                                        class="rating"
                                    >
                                        <i
                                            class="fas fa-star"
                                        ></i>
                                        <i
                                            class="fas fa-star"
                                        ></i>
                                        <i
                                            class="off fas fa-star"
                                        ></i>
                                        <i
                                            class="off fas fa-star"
                                        ></i>
                                        <i
                                            class="off fas fa-star"
                                        ></i>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
