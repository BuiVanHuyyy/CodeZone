@extends('client.layout.dashboard')

@section('content')
    <div class="col-lg-9">
        <div class="rbt-dashboard-content bg-color-white rbt-shadow-box mb--60">
            <div class="content">
                <div class="section-title">
                    <h4 class="rbt-title-style-3">
                        Dashboard
                    </h4>
                </div>
                <div class="row g-5">
                    <!-- Start Single Card  -->
                    <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                        <div class="rbt-counterup variation-01 rbt-hover-03 rbt-border-dashed bg-primary-opacity">
                            <div class="inner">
                                <div class="rbt-round-icon bg-primary-opacity">
                                    <i class="feather-book-open"></i>
                                </div>
                                <div class="content">
                                    <h3 class="counter without-icon color-primary">
                                        <span class="odometer" data-count="{{ $enrollmentCount }}">00</span>
                                    </h3>
                                    <span class="rbt-title-style-2 d-block">Khóa học đã đăng ký</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Card  -->

                </div>
            </div>
        </div>
    </div>
@endsection
