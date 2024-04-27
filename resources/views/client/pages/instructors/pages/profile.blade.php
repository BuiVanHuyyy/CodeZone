@extends('client.pages.instructors.layout.master')

@section('dashboard-main-content')
    <div class="rbt-dashboard-content bg-color-white rbt-shadow-box">
        <div class="content">
            <div class="section-title">
                <h4 class="rbt-title-style-3">Thông tin cá nhân của tôi</h4>
            </div>
            <!-- Start Profile Row  -->
            <div class="rbt-profile-row row row--15">
                <div class="col-lg-4 col-md-4">
                    <div class="rbt-profile-content b2">Ngày đăng ký</div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <div class="rbt-profile-content b2">{{ date_format(Auth::user()->instructors->created_at, 'd/m/Y') }}</div>
                </div>
            </div>
            <!-- End Profile Row  -->

            <!-- Start Profile Row  -->
            <div class="rbt-profile-row row row--15 mt--15">
                <div class="col-lg-4 col-md-4">
                    <div class="rbt-profile-content b2">Họ và Tên</div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <div class="rbt-profile-content b2">{{ Auth::user()->instructors->name }}</div>
                </div>
            </div>
            <!-- End Profile Row  -->

            <!-- Start Profile Row  -->
            <div class="rbt-profile-row row row--15 mt--15">
                <div class="col-lg-4 col-md-4">
                    <div class="rbt-profile-content b2">NickName</div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <div class="rbt-profile-content b2">{{ Auth::user()->instructors->nickname ?? 'Chưa cập nhật' }}</div>
                </div>
            </div>
            <!-- End Profile Row  -->

            <!-- Start Profile Row  -->
            <div class="rbt-profile-row row row--15 mt--15">
                <div class="col-lg-4 col-md-4">
                    <div class="rbt-profile-content b2">Email</div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <div class="rbt-profile-content b2">{{ Auth::user()->email }}</div>
                </div>
            </div>
            <!-- End Profile Row  -->

            <!-- Start Profile Row  -->
            <div class="rbt-profile-row row row--15 mt--15">
                <div class="col-lg-4 col-md-4">
                    <div class="rbt-profile-content b2">Số điện thoại</div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <div class="rbt-profile-content b2">{{ Auth::user()->instructors->phone_number }}</div>
                </div>
            </div>
            <!-- End Profile Row  -->

            <!-- Start Profile Row  -->
            <div class="rbt-profile-row row row--15 mt--15">
                <div class="col-lg-4 col-md-4">
                    <div class="rbt-profile-content b2">Công việc hiện tại</div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <div class="rbt-profile-content b2">{{ Auth::user()->instructors->current_job ?? 'Chưa cập nhật' }}</div>
                </div>
            </div>
            <!-- End Profile Row  -->

            <!-- Start Profile Row  -->
            <div class="rbt-profile-row row row--15 mt--15">
                <div class="col-lg-4 col-md-4">
                    <div class="rbt-profile-content b2">Giáo dục</div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <div class="rbt-profile-content b2">{{ Auth::user()->instructors->education ?? 'Chưa cập nhật' }}</div>
                </div>
            </div>
            <!-- End Profile Row  -->

            <!-- Start Profile Row  -->
            <div class="rbt-profile-row row row--15 mt--15">
                <div class="col-lg-4 col-md-4">
                    <div class="rbt-profile-content b2">Tiểu sử</div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <div class="rbt-profile-content b2">{{ Auth::user()->instructors->bio }}</div>
                </div>
            </div>
            <!-- End Profile Row  -->
        </div>
    </div>
@endsection
