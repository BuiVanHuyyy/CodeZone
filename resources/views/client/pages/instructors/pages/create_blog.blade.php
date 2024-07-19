@extends('client.layout.master')

@section('content')
    <main class="rbt-main-wrapper">
        <div class="rbt-create-course-area bg-color-white rbt-section-gap">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-8">
                        <form action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="rbt-accordion-style rbt-accordion-01 rbt-accordion-06 accordion">
                                <div class="accordion" id="tutionaccordionExamplea1">
                                    <div class="accordion-item card">
                                        <h2 class="accordion-header card-header" id="accOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#accCollapseOne" aria-expanded="true"
                                                    aria-controls="accCollapseOne">
                                                Thông tin bài Blog
                                            </button>
                                        </h2>
                                        <div id="accCollapseOne" class="accordion-collapse collapse show"
                                             aria-labelledby="accOne" data-bs-parent="#tutionaccordionExamplea1">
                                            <div class="accordion-body card-body">
                                                <!-- Start Course Field Wrapper  -->
                                                <div class="rbt-course-field-wrapper rbt-default-form">
                                                    <div class="course-field mb--15">
                                                        <label for="course_title">Tên bài Blog</label>
                                                        <input value="{{ old('blog_title') }}" id="blog_title" name="blog_title" type="text" placeholder="Nhập tên của bài Blog"/>
                                                        @error('blog_title')
                                                        <small class="d-block mt_dec--5 text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                    <div class="course-field mb--15">
                                                        <label for="blog_summary">Tóm tắt bài blog</label>
                                                        <input value="{{ old('blog_title') }}" id="blog_summary" name="blog_summary" type="text" placeholder="Nhập tóm tắt của bài Blog"/>
                                                        @error('blog_summary')
                                                        <small class="d-block mt_dec--5 text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>

                                                    <div class="course-field mb--20">
                                                        <h6>Blog Thumbnail</h6>
                                                        <div class="rbt-create-course-thumbnail upload-area">
                                                            <div class="upload-area">
                                                                <div class="brows-file-wrapper" data-black-overlay="9">
                                                                    <!-- actual upload which is hidden -->
                                                                    <input name="thumbnail" id="createinputfile"
                                                                           type="file" class="inputfile"/>
                                                                    <img id="createfileImage"
                                                                         src="{{ asset('client_assets/images/others/thumbnail-placeholder.svg') }}"
                                                                         alt="file image"/>
                                                                    <!-- our custom upload button -->
                                                                    <label class="d-flex" for="createinputfile"
                                                                           title="No File Choosen">
                                                                        <i class="feather-upload"></i>
                                                                        <span class="text-center">Choose a File</span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <small>
                                                            <i class="feather-info"></i>
                                                            <b>Kích thước:</b> 2048 pixels,<b>Hổ trợ file:</b>JPG, JPEG,
                                                            PNG, GIF, WEBP
                                                        </small>
                                                    </div>
                                                    @error('thumbnail')
                                                    <small class="d-block mt_dec--5 text-danger">{{ $message }}</small>
                                                    @enderror
                                                    <div class="course-field mb--15">
                                                        <label for="blog_content">Nội dung bài Blog</label>
                                                        <textarea id="blog_content" name="blog_content" rows="10">{{ old('blog_content') }}</textarea>
                                                        @error('blog_content')
                                                        <small class="d-block mt_dec--5 text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <!-- End Course Field Wrapper  -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt--10 row g-5">
                                <div class="col-lg-8">
                                    <button class="rbt-btn btn-gradient hover-icon-reverse w-100 text-center"
                                            type="submit">
                                    <span class="icon-reverse-wrapper">
                                        <span class="btn-text">Tạo bài Blog</span>
                                        <span class="btn-icon">
                                            <i class="feather-arrow-right"></i>
                                        </span>
                                        <span class="btn-icon">
                                            <i class="feather-arrow-right"></i>
                                        </span>
                                    </span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-lg-4">
                        <div
                            class="rbt-create-course-sidebar course-sidebar sticky-top rbt-shadow-box rbt-gradient-border">
                            <div class="inner">
                                <div class="section-title mb--30">
                                    <h4 class="title">
                                        Mẹo tạo khóa học
                                    </h4>
                                </div>
                                <div class="rbt-course-upload-tips">
                                    <ul class="rbt-list-style-1">
                                        <li>
                                            <i class="feather-check"></i>
                                            Làm cho bài viết của bạn hấp dẫn hơn bằng cách thêm hình ảnh hoặc video liên quan.
                                        </li>
                                        <li>
                                            <i class="feather-check"></i>
                                            Sử dụng tiêu đề, đoạn văn ngắn và danh sách nếu cần.
                                        </li>
                                        <li>
                                            <i class="feather-check"></i>
                                            Trước khi đăng bài, hãy đọc lại và chỉnh sửa để kiểm tra lỗi chính tả và bố cục.
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="rbt-separator-mid">
            <div class="container">
                <hr class="rbt-separator m-0"/>
            </div>
        </div>
    </main>
@endsection
@section('cus_js')
    <script>
        ClassicEditor
            .create( document.querySelector( '#blog_content' ), {
                ckfinder: {
                    uploadUrl: '{{route('upload.blog_thumbnail').'?_token='.csrf_token()}}',
                }
            } )
            .catch( error => {
                console.error( error );
            } );

    </script>
@endsection
