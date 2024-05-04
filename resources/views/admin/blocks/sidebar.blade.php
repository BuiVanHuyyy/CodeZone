<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label first">Main Menu</li>
            <li>
                <a href="{{ route('admin.dashboard') }}" aria-expanded="false">
                    <i class="la la-home"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.instructor.index') }}" aria-expanded="false">
                    <i class="la la-user"></i>
                    <span class="nav-text">Giảng viên</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.student.index') }}" aria-expanded="false">
                    <i class="la la-users"></i>
                    <span class="nav-text">Học viên</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.course.index') }}" aria-expanded="false">
                    <i class="la la-graduation-cap"></i>
                    <span class="nav-text">Khóa học</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.blog.index') }}" aria-expanded="false">
                    <i class="fa-solid fa-blog"></i>
                    <span class="nav-text">Các bài blog</span>
                </a>
            </li>
        </ul>
    </div>
</div>
