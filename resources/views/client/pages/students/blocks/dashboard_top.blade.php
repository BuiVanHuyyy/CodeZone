<div class="rbt-dashboard-content-wrapper">
    <div class="tutor-bg-photo bg_image bg_image--5 height-350"></div>
    <!-- Start Tutor Information  -->
    <div class="rbt-tutor-information">
        <div class="rbt-tutor-information-left">
            <div class="thumbnail rbt-avatars size-lg">
                <img src="{{ Auth::user()->students->avatar ?? asset('client_assets/images/avatar/default-avatar.png') }}" alt="Student"/>
            </div>
            <div class="tutor-content">
                <h5 class="title">{{ Auth::user()->name }}</h5>
                <ul class="rbt-meta rbt-meta-white mt--5">
                    <li>
                        <i class="feather-book"></i>5
                        khóa học đã đăng ký
                    </li>
                </ul>
            </div>
        </div>
        <div class="rbt-tutor-information-right">
            <div class="tutor-btn">
                <a
                    class="rbt-btn btn-md hover-icon-reverse"
                    href="#"
                >
                                                <span class="icon-reverse-wrapper">
                                                    <span class="btn-text"
                                                    >Become an Instructor</span
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
    <!-- End Tutor Information  -->
</div>
