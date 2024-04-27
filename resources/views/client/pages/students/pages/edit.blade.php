@extends('client.layout.dashboard')

@section('content')
    <div class="col-lg-9">
        <!-- Start Student Settings  -->
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
                                             src="{{ Auth::user()->students->avatar ?? asset('client_assets/images/avatar/default-avatar.png') }}"
                                             alt="Students"/>
                                        <div class="rbt-edit-photo-inner">
                                            <form id="uploadForm" method="post" action="{{ route('upload.avatar', ['student' => Auth::user()->students]) }}" enctype="multipart/form-data">
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
                                        <button id="changeAvatarBtn" class="rbt-btn btn-sm btn-border color-white radius-round-10">Thay đổi ảnh đại diện</button>
                                    </div>
                                </div>
                            </div>
                            <!-- End Tutor Information  -->
                        </div>
                        <!-- Start Profile Row  -->
                        <form action="{{ route('client.student.update', ['student' => Auth::user()->students]) }}"
                              method="POST" class="rbt-profile-row rbt-default-form row row--15">
                            @csrf
                            @method('PUT')
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="rbt-form-group">
                                    <label for="name">Tên</label>
                                    <input id="name" type="text" name="name"
                                           value="{{ old('name') ?? Auth::user()->students->name }}"/>
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="rbt-form-group">
                                    <label
                                        class="{{ is_null(Auth::user()->students->nickname) ? 'd-flex justify-content-between' : '' }}"
                                        for="nickname"><span>Nick Name</span>
                                        @if(is_null(Auth::user()->students->nickname))
                                            <span class="text-danger">Chưa có nickname</span>
                                        @endif
                                    </label>
                                    <input id="nickname" name="nickname" type="text"
                                           value="{{ old('nickname') ?? Auth::user()->students->nickname}}"/>
                                    @error('nickname')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="rbt-form-group">
                                    <label
                                        class="{{ is_null(Auth::user()->students->phone_number) ? 'd-flex justify-content-between' : '' }}"
                                        for="phone_number"><span>Số điện thoại</span>
                                        @if(is_null(Auth::user()->students->phone_number))
                                            <span class="text-danger">Chưa có số điện thoại</span>
                                        @endif
                                    </label>
                                    <input name="phone_number" id="phone_number" type="tel"
                                           value="{{ old('phone_number') ?? Auth::user()->students->phone_number }}"/>
                                    @error('phone_number')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="filter-select rbt-modern-select">
                                    <label for="dob"
                                           class="{{ is_null(Auth::user()->students->dob) ? 'd-flex justify-content-between' : '' }}"><span>Ngày sinh</span>
                                        @if(is_null(Auth::user()->students->bio))
                                            <span class="text-danger">Chưa có ngày sinh</span>
                                        @endif</label>
                                    <input id="dob" name="dob" type="date"
                                           value="{{ old('dob') ?? Auth::user()->students->dob }}"/>
                                    @error('dob')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="rbt-form-group">
                                    <label
                                        class="{{ is_null(Auth::user()->students->nickname) ? 'd-flex justify-content-between' : '' }}"
                                        for="bio"><span>Tiểu sử</span>
                                        @if(is_null(Auth::user()->students->bio))
                                            <span class="text-danger">Chưa có tiểu sử</span>
                                        @endif
                                    </label>
                                    <textarea id="bio" cols="20" name="bio"
                                              rows="5">{{ old('bio') ?? Auth::user()->students->bio }}</textarea>
                                    @error('bio')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-3">
                                <h5>Liên kết mạng xã hội</h5>
                            </div>
                            <div class="col-12">
                                <div class="rbt-form-group">
                                    <label
                                        class="{{ is_null(Auth::user()->students->facebook) ? 'd-flex justify-content-between' : '' }}"
                                        for="facebook">
                                        <span>
                                            <i class="feather-facebook"></i>Facebook
                                        </span>
                                        @if(is_null(Auth::user()->students->facebook))
                                            <span class="text-danger">Chưa có liên kết facebook</span>
                                        @endif
                                    </label>
                                    <input id="facebook" name="facebook" type="text" placeholder="https://facebook.com/"
                                           value="{{ old('facebook') ?? Auth::user()->students->facebook }}"/>
                                    @error('facebook')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="rbt-form-group">
                                    <label
                                        class="{{ is_null(Auth::user()->students->linkedin) ? 'd-flex justify-content-between' : '' }}"
                                        for="linkedin">
                                       <span>
                                            <i class="feather-linkedin"></i>Linkedin
                                       </span>
                                        @if(is_null(Auth::user()->students->linkedin))
                                            <span class="text-danger">Chưa có liên kết linkedin</span>
                                        @endif
                                    </label>
                                    <input id="linkedin" name="linkedin" type="text" placeholder="https://linkedin.com/"
                                           value="{{ old('linkedin') ?? Auth::user()->students->linkedin }}"/>
                                    @error('linkedin')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="rbt-form-group">
                                    <label
                                        class="{{ is_null(Auth::user()->students->github) ? 'd-flex justify-content-between' : '' }}"
                                        for="github">
                                        <span>
                                            <i class="feather-github"></i>Github
                                        </span>
                                        @if(is_null(Auth::user()->students->github))
                                            <span class="text-danger">Chưa có liên kết github</span>
                                        @endif
                                    </label>
                                    <input id="github" name="github" type="text" placeholder="'https://github.com/"
                                           value="{{ old('github') ?? Auth::user()->students->github }}"/>
                                    @error('github')
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

                        <!-- End Profile Row  -->
                    </div>

                    <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                        <!-- Start Profile Row  -->
                        <form action="#" class="rbt-profile-row rbt-default-form row row--15">
                            <div class="col-12">
                                <div class="rbt-form-group">
                                    <label for="currentpassword">Mật khẩu hiện tại</label>
                                    <input id="currentpassword" type="password" placeholder="Nhập mật khẩu hiện tại"/>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="rbt-form-group">
                                    <label for="newpassword">Mật khẩu mới</label>
                                    <input id="newpassword" type="password" placeholder="Nhập mật khẩu mới"/>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="rbt-form-group">
                                    <label for="retypenewpassword">Nhập lại mật khẩu mới</label>
                                    <input id="retypenewpassword" type="password" placeholder="Re-type New Password"/>
                                </div>
                            </div>
                            <div class="col-12 mt--10">
                                <div class="rbt-form-group">
                                    <a class="rbt-btn btn-gradient" href="#">Cập nhật lại mật khẩu</a>
                                </div>
                            </div>
                        </form>
                        <!-- End Profile Row  -->
                    </div>

                    <div class="tab-pane fade" id="social" role="tabpanel" aria-labelledby="social-tab">
                        <!-- Start Profile Row  -->

                        <!-- End Profile Row  -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Student Settings  -->
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
        document.getElementById('avatar').addEventListener('change', function(e) {
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
                success: function(data) {
                    if (data.path) {
                        $(".rbt-avatars img").attr("src", data.path);
                        $('#submit-avatar').css('display', 'block');
                        $('#changeAvatarBtn').on("click",function() {
                            $('#uploadForm').submit();
                        });
                        $('#cancelAvatarBtn').on("click",function() {
                            $(".rbt-avatars img").attr("src", "{{ Auth::user()->students->avatar ?? asset('client_assets/images/avatar/default-avatar.png') }}");
                            $('#submit-avatar').css('display', 'none');
                        });
                    } else {
                        console.error('No image uploaded.');
                    }
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });
        });

    </script>
@endsection

