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
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-dollar"></i>
                    <span class="nav-text">Kế toán</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="">Fees Collection</a></li>
                    <li><a href="">Add Fees</a></li>
                    <li><a href="">Fees Receipt</a></li>
                </ul>
            </li>
            <li class="nav-label">Apps</li>
            <li>
                <a href="javascript:void()" aria-expanded="false">
                    <i class="la la-users"></i>
                    <span class="nav-text">Apps</span>
                </a>
            </li>
        </ul>
    </div>
</div>
