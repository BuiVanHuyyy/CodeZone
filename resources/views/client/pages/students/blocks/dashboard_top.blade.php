<div class="rbt-dashboard-content-wrapper">
    <div class="tutor-bg-photo bg_image bg_image--5 height-350"></div>
    <div class="rbt-tutor-information">
        <div class="rbt-tutor-information-left">
            <div class="thumbnail rbt-avatars size-lg">
                <img src="{{ Auth::user()->avatarPath() }}" alt="{{ Auth::user()->name }} avatar"/>
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
    </div>
</div>
