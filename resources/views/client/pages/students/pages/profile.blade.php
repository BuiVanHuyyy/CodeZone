@extends('client.pages.students.layout.master')

@section('dashboard-main-content')
    <div class="rbt-dashboard-content bg-color-white rbt-shadow-box">
            <div class="content">
                <div class="section-title">
                    <h4 class="rbt-title-style-3">Thông tin cá nhân</h4>
                </div>

                <div class="rbt-profile-row row row--15">
                    <div class="col-lg-4 col-md-4">
                        <div class="rbt-profile-content b2">Ngày tham gia</div>
                    </div>
                    <div class="col-lg-8 col-md-8">
                        <div class="rbt-profile-content b2">{{ date_format(Auth::user()->created_at, 'd/m/Y') }}</div>
                    </div>
                </div>

                <div class="rbt-profile-row row row--15 mt--15">
                    <div class="col-lg-4 col-md-4">
                        <div class="rbt-profile-content b2">Tên</div>
                    </div>
                    <div class="col-lg-8 col-md-8">
                        <div class="rbt-profile-content b2">{{ Auth::user()->name }}</div>
                    </div>
                </div>

                <div class="rbt-profile-row row row--15 mt--15">
                    <div class="col-lg-4 col-md-4">
                        <div class="rbt-profile-content b2">Email</div>
                    </div>
                    <div class="col-lg-8 col-md-8">
                        <div class="rbt-profile-content b2">{{ Auth::user()->email }}</div>
                    </div>
                </div>
            </div>
        </div>
@endsection
