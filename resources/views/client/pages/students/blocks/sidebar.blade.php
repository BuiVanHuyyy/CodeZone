<div class="rbt-default-sidebar sticky-top rbt-shadow-box rbt-gradient-border">
        <div class="inner">
            <div class="content-item-content">
                <div class="section-title mb--20">
                    <h6 class="rbt-title-style-2">Xin chào, {{ Auth::user()->name }}</h6>
                </div>
                <nav class="mainmenu-nav">
                    <ul class="dashboard-mainmenu rbt-default-sidebar-list">
                        <li>
                            <a href="{{ route('student.dashboard') }}">
                                <i class="feather-home"></i><span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('student.show') }}">
                                <i class="feather-user"></i>
                                <span>Thông tin cá nhân</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('student.enrolled_courses') }}">
                                <i class="feather-book-open"></i>
                                <span>Khóa học đăng ký</span>
                            </a>
                        </li>
                    </ul>
                </nav>

                <div class="section-title mt--40 mb--20">
                    <h6 class="rbt-title-style-2">Người dùng</h6>
                </div>

                <nav class="mainmenu-nav">
                    <ul class="dashboard-mainmenu rbt-default-sidebar-list">
                        <li>
                            <a href="{{ route('student.edit') }}">
                                <i class="feather-settings"></i>
                                <span>Chỉnh sửa thông tin</span>
                            </a>
                        </li>
                        <li>
                            <form method="post" action="{{ route('logout') }}">
                                @csrf
                                <a onclick="event.preventDefault(); this.closest('form').submit();"
                                   href="{{ route('logout') }}">
                                    <i class="feather-log-out"></i>
                                    <span>Đăng xuất</span>
                                </a>
                            </form>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
