@extends('client.layout.master')

@section('content')
    <div class="rbt-page-banner-wrapper">
        <div class="rbt-banner-image"></div>
    </div>

    <div class="rbt-dashboard-area rbt-section-overlayping-top rbt-section-gapBottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @include('client.pages.instructors.blocks.dashboard_top')
                    <div class="row g-5">
                        <div class="col-lg-3">
                            @include('client.pages.instructors.blocks.sidebar')
                        </div>
                        <div class="col-lg-9">
                            @yield('dashboard-main-content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
