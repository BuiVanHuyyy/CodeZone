<div class="container">
    <div class="container">
        <div class="row">
            <div class="row mb--55 g-5 align-items-end">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="section-title text-start">
                                <span class="subtitle bg-pink-opacity">Đội ngũ giảng viên</span>
                        <h2 class="title">Các giảng viên tiêu biểu</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="load-more-btn text-start text-md-end">
                                <a class="rbt-btn" href="{{ route('client.instructors') }}">All instructors</a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="load-more-btn text-start text-md-end">
                                <a class="rbt-btn btn-border square" href="{{ route('client.become_instructor') }}">Become our instructor</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row row--15">
        <div class="col-lg-12">
            <div class="swiper team-slide-activation-4 rbt-arrow-between rbt-dot-bottom-center">
                <div class="swiper-wrapper">
                    @foreach($topInstructors as $instructor)
                        <div class="swiper-slide">
                            <div class="team team-style--bottom variation-2">
                                <div class="thumbnail">
                                    <a href="{{ route('instructor.profile', [$instructor->user->slug]) }}"><img src="{{ $instructor->user->avatarPath() }}" alt="Blog Images"/></a>
                                </div>
                                <div class="content">
                                    <div class="inner">
                                        <h4 class="title">
                                            <a href="{{ route('instructor.profile', [$instructor->user->slug]) }}">{{ $instructor->user->name }}</a>
                                        </h4>
                                        <p class="designation">{{ $instructor->current_job }}</p>
                                    </div>
                                    <div class="icon-right">
                                        <a href="{{ route('instructor.profile', [$instructor->user->slug]) }}"><i class="feather-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="rbt-swiper-arrow rbt-arrow-left">
                    <div class="custom-overfolow">
                        <i class="rbt-icon feather-arrow-left"></i>
                        <i class="rbt-icon-top feather-arrow-left"></i>
                    </div>
                </div>

                <div class="rbt-swiper-arrow rbt-arrow-right">
                    <div class="custom-overfolow">
                        <i class="rbt-icon feather-arrow-right"></i>
                        <i class="rbt-icon-top feather-arrow-right"></i>
                    </div>
                </div>

                <div class="rbt-swiper-pagination"></div>
            </div>
        </div>
    </div>
</div>
