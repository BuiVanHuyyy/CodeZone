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
                        <p class="description has-medium-font-size mt--20 mb--40">
                            Trên CodeZone, các giảng viên toàn cầu đang truyền đạt kiến thức cho hàng triệu học viên. Chúng tôi mang đến cho bạn các công cụ và kỹ năng để bạn chia sẻ những gì bạn đam mê.
                        </p>
                    </div>
                </div>
            </div>

            <div class="row pt--60 g-5">
                <div class="col-lg-4">
                    <div class="thumbnail">
                        <img class="radius-10 w-100" src="{{ asset('client_assets/images/others/tabs-10.jpg') }}" alt="Corporate Template"/>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="rbt-contact-form contact-form-style-1 max-width-auto">
                        <div class="section-title text-start">
                                <span class="subtitle bg-primary-opacity">Form đăng ký</span>
                        </div>
                        <h3 class="title">Đăng ký trở thành giảng viên</h3>
                        <hr class="mb--30" />

                        <form method="post" action="{{ route('client.instructor.register') }}" class="row row--15" enctype="multipart/form-data">
                            @csrf
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name">Họ và tên</label>
                                    <input id="name" name="name"  type="text" value="{{ old('name') }}" />
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="phone">Số điện thoại</label>
                                    <input id="phone" name="phone" type="text" value="{{ old('phone') }}" />
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" name="email" type="text" value="{{ old('email') }}" />
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="cv">Tải CV (PDF)</label>
                                    <input id="cv" name="cv" type="file" />
                                    @error('cv')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="bio">Giới thiệu về bản thân</label>
                                    <textarea id="bio" name="bio">{{ old('bio') }}</textarea>
                                    @error('bio')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
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
                                            src="{{ asset('client_assets/images/others/gallery-banner-01.jpg') }}"
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
                                            src="{{ asset('client_assets/images/others/gallery-banner-02.jpg') }}"
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
                                            src="{{ asset('client_assets/images/others/gallery-banner-03.jpg') }}"
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
@section('cus_js')
    <script>
        $(document).ready(function() {
            let msg = "{{ session('msg') }}";
            let i = "{{ session('i') }}";
            if (msg !== "") {
                Swal.fire({
                    title: msg,
                    icon: i,
                    showDenyButton: true,
                    confirmButtonText: `<i class="fa fa-thumbs-up"></i> OK!`
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        Swal.fire("Cảm ơn bạn đã đăng ký!", "", "success");
                    }
                });

            };
        });
    </script>
@endsection
