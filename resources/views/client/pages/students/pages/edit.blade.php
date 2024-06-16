@extends('client.pages.students.layout.master')

@section('dashboard-main-content')
    <div class="rbt-dashboard-content bg-color-white rbt-shadow-box">
        <div class="content">

            <div class="advance-tab-button mb--30">
                <ul class="nav nav-tabs tab-button-style-2 justify-content-start" id="settinsTab-4" role="tablist">
                    <li role="presentation">
                        <a href="#" class="tab-button active" id="profile-tab" data-bs-toggle="tab"
                           data-bs-target="#profile" role="tab" aria-controls="profile" aria-selected="true">
                            <span class="title">Trang cá nhân</span>
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#" class="tab-button" id="password-tab" data-bs-toggle="tab"
                           data-bs-target="#password" role="tab" aria-controls="password" aria-selected="false">
                            <span class="title">Mật khẩu</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="tab-content">
                <div class="tab-pane fade active show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="rbt-dashboard-content-wrapper">
                        <div class="tutor-bg-photo bg_image bg_image--23 height-245"></div>
                        <!-- Start Tutor Information  -->
                        <div class="mt-5 section-title">
                            <h4 class="rbt-title-style-3">
                                Thông tin cá nhân
                            </h4>
                        </div>
                        <div class="rbt-tutor-information">
                            <div class="rbt-tutor-information-left">
                                <div class="thumbnail rbt-avatars size-lg position-relative">
                                    <img id="previewImage"
                                         src="{{ Auth::user()->avatarPath() }}"
                                         alt="Students"/>
                                    <div class="rbt-edit-photo-inner">
                                        <form id="uploadForm" method="POST" action="{{ route('upload.avatar') }}"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <input type="file" id="avatar" name="avatar" style="display: none;">
                                        </form>
                                        <button class="rbt-edit-photo" title="Thay đổi ảnh đại diện"
                                                onclick="document.getElementById('avatar').click(); return false;">
                                            <i class="feather-camera"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div style="display: none" id="submit-avatar" class="rbt-tutor-information-right">
                                <div class="tutor-btn">
                                    <button id="cancelAvatarBtn" class="rbt-btn btn-sm btn-danger">Hủy</button>
                                    <button id="changeAvatarBtn"
                                            class="rbt-btn btn-sm btn-border color-white radius-round-10">Thay đổi ảnh
                                        đại diện
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- End Tutor Information  -->
                    </div>
                    <form action="{{ route('client.student.update', ['student' => Auth::user()->student]) }}"
                          method="POST" class="rbt-profile-row rbt-default-form row row--15">
                        @csrf
                        @method('PUT')
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="rbt-form-group">
                                <label for="name">Tên</label>
                                <input id="name" type="text" name="name"
                                       value="{{ old('name') ?? Auth::user()->name }}"/>
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="rbt-form-group rbt-modern-select bg-transparent height-45">
                                <label
                                    class="{{ is_null(Auth::user()->gender) ? 'd-flex justify-content-between' : '' }}"
                                    for="nickname"><span>Giới tính</span>
                                    @if(is_null(Auth::user()->gender))
                                        <span class="text-danger">Chưa chọn giới tính</span>
                                    @endif
                                </label>
                                <select class="w-100" name="gender" id="gender">
                                    <option>Vui lòng chọn</option>
                                    <option {{ Auth::user()->gender == 'male' ? 'selected' : '' }}>Nam</option>
                                    <option {{ Auth::user()->gender == 'female' ? 'selected' : '' }}>Nữ</option>
                                </select>
                                @error('gender')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="filter-select rbt-modern-select">
                                <label for="dob"
                                       class="{{ is_null(Auth::user()->dob) ? 'd-flex justify-content-between' : '' }}"><span>Ngày sinh</span>
                                    @if(is_null(Auth::user()->dob))
                                        <span class="text-danger">Chưa có ngày sinh</span>
                                    @endif</label>
                                <input id="dob" name="dob" type="date"
                                       value="{{ old('dob') ?? Auth::user()->dob }}"/>
                                @error('dob')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 mt--20">
                            <div class="rbt-form-group">
                                <button class="rbt-btn btn-gradient" type="submit">Cập nhật trang cá nhân</button>
                            </div>
                        </div>
                    </form>

                </div>

                <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                    <form method="POST" action="{{ route('password.update') }}" class="rbt-profile-row rbt-default-form row row--15">
                        @method('PUT')
                        @csrf
                        <div class="col-12">
                            <div class="rbt-form-group">
                                <label for="update_password_current_password">Mật khẩu hiện tại</label>
                                <input id="update_password_current_password" name="current_password" type="password">
                                @error('current_password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="rbt-form-group">
                                <label for="update_password_password">Mật khẩu mới</label>
                                <input id="update_password_password" name="password" type="password">
                                @error('password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="rbt-form-group">
                                <label for="update_password_password_confirmation">Nhập lại mật khẩu</label>
                                <input id="update_password_password_confirmation" name="password_confirmation" type="password">
                                @error('password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 mt--10">
                            <div class="rbt-form-group">
                                <button type="submit" class="rbt-btn btn-gradient">Cập nhật lại mật khẩu</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('cus_js')
    <script>
        let message = "{{ session('message') }}";
        let icon = "{{ session('icon') }}";
        if (message) {
            Swal.fire({
                position: 'center',
                icon: icon,
                title: message,
            });
        }
        document.getElementById('avatar').addEventListener('change', function (e) {
            let file = this.files[0];
            let formData = new FormData();
            formData.append('avatar', file);
            $.ajax({
                url: '{{ route('upload.tmp.avatar') }}',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function (data) {
                    if (data.path) {
                        $(".rbt-avatars img").attr("src", data.path);
                        $('#submit-avatar').css('display', 'block');
                        $('#changeAvatarBtn').on("click", function () {
                            $('#uploadForm').submit();
                        });
                        $('#cancelAvatarBtn').on("click", function () {
                            $.ajax({
                                url: '{{ route('delete.tmp.avatar') }}',
                                method: 'DELETE',
                                data: {path: data.path},
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                            }).done(function () {
                                $(".rbt-avatars img").attr("src", "{{ Auth::user()->avatarPath() }}");
                                $('#avatar').val('');
                                $('#submit-avatar').css('display', 'none');
                            });
                        });
                    } else {
                        console.error('No image uploaded.');
                    }
                },
                error: function (error) {
                    console.error('Error:', error);
                }
            });
        });

    </script>
@endsection

