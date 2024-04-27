@extends('client.layout.master')

@section('content')
    <main class="rbt-main-wrapper">
        <div class="rbt-create-course-area bg-color-white rbt-section-gap">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-8">
                        <form action="{{ route('course.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="rbt-accordion-style rbt-accordion-01 rbt-accordion-06 accordion">
                                <div class="accordion" id="tutionaccordionExamplea1">
                                    <div class="accordion-item card">
                                        <h2 class="accordion-header card-header" id="accOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#accCollapseOne" aria-expanded="true"
                                                    aria-controls="accCollapseOne">
                                                Thông tin khóa học
                                            </button>
                                        </h2>
                                        <div id="accCollapseOne" class="accordion-collapse collapse show"
                                             aria-labelledby="accOne" data-bs-parent="#tutionaccordionExamplea1">
                                            <div class="accordion-body card-body">
                                                <!-- Start Course Field Wrapper  -->
                                                <div class="rbt-course-field-wrapper rbt-default-form">
                                                    <div class="course-field mb--15">
                                                        <label for="course_title">Tên khóa học</label>
                                                        <input value="{{ old('course_title') }}" id="course_title" name="course_title" type="text" placeholder="Nhập tên của khóa học"/>
                                                        @error('course_title')
                                                            <small class="d-block mt_dec--5 text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                    <div class="course-field mb--15">
                                                        <label for="aboutCourse">Thông tin khóa học</label>
                                                        <textarea id="aboutCourse" name="description" rows="5">{{ old('description') }}</textarea>
                                                        @error('description')
                                                            <small class="d-block mt_dec--5 text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>

                                                    <div class="course-field mb--15 edu-bg-gray">
                                                        <h6>Giá</h6>
                                                        <div class="rbt-course-settings-content">
                                                            <input value="{{ old('price') }}" name="price" id="price" type="number" placeholder="$ Regular Price"/>
                                                            @error('price')
                                                                <small class="d-block mt_dec--5 text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    @php
                                                        $categories = App\Models\CourseCategory::all();
                                                    @endphp

                                                    <div class="course-field mb--20">
                                                        <h6>Choose Categories</h6>
                                                        <div class="rbt-modern-select bg-transparent height-45 w-100 mb--10">
                                                            <select name="category" class="w-100">
                                                                <option value="">Chọn thể loại cho khóa học</option>
                                                                @foreach($categories as $category)
                                                                    <option {{ old('category') == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->title }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('category')
                                                                <small class="d-block mt_dec--5 text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="course-field mb--20">
                                                        <h6>Course Thumbnail</h6>
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
                                                </div>
                                                <!-- End Course Field Wrapper  -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item card">
                                        <h2 class="accordion-header card-header" id="accThree">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accCollapseThree" aria-expanded="false" aria-controls="accCollapseThree">Cấu trúc khóa học</button>
                                        </h2>
                                        <div id="accCollapseThree" class="accordion-collapse collapse" aria-labelledby="accThree" data-bs-parent="#tutionaccordionExamplea1">
                                            <div class="accordion-body card-body">
                                                <div class="my-5">
                                                    <div class="subject-list">
                                                        <div class="subject-container py-3"
                                                             style="border-bottom: 1px solid gray; padding-bottom: 20px; margin-bottom: 30px">
                                                            <h5>Môn học 1</h5>
                                                            <input value="{{ old('subjects[0][name]') }}" name="subjects[0][name]" type="text" placeholder="Nhập tên môn học"/>
                                                            @error('subjects.0.name')
                                                                <small class="d-block mt_dec--5 text-danger">{{ $message }}</small>
                                                            @enderror
                                                            <div class="lesson-list">
                                                                <div class="lesson-container" style="border-bottom: 1px dashed black; padding-bottom: 20px; margin-bottom: 30px">
                                                                    <h6 class="mt-3" style="margin-bottom: -10px">Bài giảng 1</h6>
                                                                    <div class="d-flex">
                                                                        <div class="col-lg-10">
                                                                           <input name="subjects[0][lessons][0][name]" value="{{ old('subjects[0][lessons][0][name]') }}" style="width: 90%" type="text" class="my-3" placeholder="Nhập tên bài giảng"/>
                                                                        </div>
                                                                        <div class="col-lg-2">
                                                                            <input name="subjects[0][lessons][0][is_preview]" class="form-check-input" type="checkbox" id="subjects[0][lessons][0][is_preview]">
                                                                            <label class="form-check-label" for="subjects[0][lessons][0][is_preview]">Cho xem trước</label>
                                                                        </div>
                                                                    </div>
                                                                    @error('subjects.0.lessons.0.name')
                                                                        <small class="d-block mt_dec--5 text-danger">{{ $message }}</small>
                                                                    @enderror
                                                                    <div class="d-flex">
                                                                        <div class="row g-3">
                                                                            <div class="col-lg-6">
                                                                                <label for="video-source">Video url (iframe)</label>
                                                                                <input type="text" name="subjects[0][lessons][0][video]" value="{{ old('subjects[0][lessons][0][video]') }}" id="video-source">
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <label for="code-source">Source code github(url)</label>
                                                                                <input type="text" name="subjects[0][lessons][0][resource]" value="{{ old('subjects[0][lessons][0][resource]') }}" id="code-source">
                                                                            </div>
                                                                            <div class="col-lg-12">
                                                                                <label for="Content">Content</label>
                                                                                <textarea name="subjects[0][lessons][0][content]" id="Content" cols="10" rows="5">{{ old('subjects[0][lessons][0][content]') }}</textarea>
                                                                                @error('subjects.0.lessons.0.content')
                                                                                    <small class="d-block mt_dec--5 text-danger">{{ $message }}</small>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <button type="button" class="rbt-btn btn-white radius icon-hover add-lesson">
                                                                <span class="btn-text">Thêm bài giảng</span>
                                                                <span class="btn-icon"><i class="feather-plus-circle"></i></span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <button type="button" id="add-subject" class="rbt-btn btn-md btn-gradient hover-icon-reverse">
                                                        <span class="icon-reverse-wrapper">
                                                            <span class="btn-text">Tạo một môn học</span>
                                                            <span class="btn-icon"><i class="feather-plus-circle"></i></span>
                                                            <span class="btn-icon"><i class="feather-plus-circle"></i></span>
                                                        </span>
                                                    </button>
                                                </div>
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
                                        <span class="btn-text">Tạo khóa học</span>
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
                                            Đặt tùy chọn Giá khóa học hoặc đặt tùy chọn này miễn phí.
                                        </li>
                                        <li>
                                            <i class="feather-check"></i>
                                            Kích thước tiêu chuẩn cho thumbnail của khóa học là 700x430.
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
        let msg = "{{ session('msg') }}";
        let i = "{{ session('i') }}";
        if (msg !== "") {
            Swal.fire({
                position: "top-end",
                icon: i,
                title: msg,
                showConfirmButton: false,
                timer: 2000
            });
        }

        let subjectCount = $('.subject-container').length;
        $('#add-subject').click(function () {
            subjectCount++;
            let subject = $(
                `<div class="subject-container py-3 position-relative" style="border-bottom: 1px solid gray; padding-bottom: 20px; margin-bottom: 30px">
                <div class="position-absolute" style="top: -25px; right: 0">
                    <a href="#"><i class="fa-solid fa-x"></i></a>
                </div>
                <h5>Môn học ${subjectCount}</h5>
                <input name="subjects[${subjectCount}][name]" type="text" placeholder="Nhập tên môn học"/>
                <div class="lesson-list">
                    <div class="lesson-container" style="border-bottom: 1px dashed black; padding-bottom: 20px; margin-bottom: 30px">
                        <h6 class="mt-3" style="margin-bottom: -10px">Bài giảng 1</h6>
                        <div class="d-flex">
                            <div class="col-lg-10">
                               <input name="subjects[${subjectCount}][lessons][1][name]" style="width: 90%" type="text" class="my-3" placeholder="Nhập tên bài giảng"/>
                            </div>
                            <div class="col-lg-2">
                                <input name="subjects[${subjectCount}][lessons][1][is_preview]" class="form-check-input" type="checkbox" id="subjects[${subjectCount}][lessons][1][is_preview]">
                                <label class="form-check-label" for="subjects[${subjectCount}][lessons][1][is_preview]">Cho xem trước</label>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="row g-3">
                                <div class="col-lg-6">
                                    <label for="video-source">Video images (iframe)</label>
                                    <input type="text" name="subjects[${subjectCount}][lessons][1][video]" id="video-source">
                                </div>
                                <div class="col-lg-6">
                                    <label for="code-source">Source code github(url)</label>
                                    <input type="text" name="subjects[${subjectCount}][lessons][1][resource]" id="code-source">
                                </div>
                                <div class="col-lg-12">
                                    <label for="Content">Content</label>
                                    <textarea name="subjects[${subjectCount}][lessons][1][content]" id="Content" cols="10" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="rbt-btn btn-white radius icon-hover add-lesson">
                    <span class="btn-text">Thêm bài giảng</span>
                    <span class="btn-icon"><i class="feather-plus-circle"></i></span>
                </button>
            </div>`);
            $('.subject-list').append(subject);
        });
        $('body').on('click', '.add-lesson', function (e) {
            let subjectContainer = $(this).closest('.subject-container');
            let lessonCount = subjectContainer.find('.lesson-container').length + 1;
            let lessonList = $(this).closest('.subject-container').find('.lesson-list');
            let lesson = $(`<div class="lesson-container" style="border-bottom: 1px dashed black; padding-bottom: 20px; margin-bottom: 30px">
                        <h6 class="mt-3" style="margin-bottom: -10px">Bài giảng ${lessonCount}</h6>
                        <div class="d-flex">
                            <div class="col-lg-10">
                               <input name="subjects[${subjectCount}][lessons][${lessonCount}][name]"" style="width: 90%" type="text" class="my-3" placeholder="Nhập tên bài giảng"/>
                            </div>
                            <div class="col-lg-2">
                                <input name="subjects[${subjectCount}][lessons][${lessonCount}][is_preview]" id="subjects[${subjectCount}][lessons][${lessonCount}][is_preview]" class="form-check-input" type="checkbox">
                                <label class="form-check-label" for="subjects[${subjectCount}][lessons][${lessonCount}][is_preview]">Cho xem trước</label>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="row g-3">
                                <div class="col-lg-6">
                                    <label for="video-source">Video images (iframe)</label>
                                    <input type="text" name="subjects[${subjectCount}][lessons][${lessonCount}][video]" id="video-source">
                                </div>
                                <div class="col-lg-6">
                                    <label for="code-source">Source code github(url)</label>
                                    <input type="text" name="subjects[${subjectCount}][lessons][${lessonCount}][resource]" id="code-source">
                                </div>
                                <div class="col-lg-12">
                                    <label for="Content">Content</label>
                                    <textarea name="subjects[${subjectCount}][lessons][${lessonCount}][content]" id="Content" cols="10" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>`);
            lessonList.append(lesson);
        });
        $('body').on('click', '.fa-x', function (e) {
            e.preventDefault();
            $(this).closest('.subject-container').remove();
        });
    </script>

@endsection
