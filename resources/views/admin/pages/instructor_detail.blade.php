@extends('admin.layout.master')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-xxl-4 col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="text-center p-3 overlay-box">
                                <div class="profile-photo">
                                    <img src="{{ $instructor->user->avatarPath() }}" width="100"
                                         class="img-fluid rounded-circle" alt="">
                                </div>
                                <h3 class="mt-3 mb-1 text-white">{{ $instructor->user->name }}</h3>
                                <p class="text-white mb-0">{{ $instructor->current_job }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title">Tiểu sử</h2>
                            </div>
                            <div class="card-body pb-0">
                                <p>{{ $instructor->bio }}</p>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                        <strong>Số điện thoại</strong>
                                        <span class="mb-0">{{ $instructor->phone_number }}</span>
                                    </li>
                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                        <strong>Ngày tham gia</strong>
                                        <span
                                            class="mb-0">{{ date_format(date_create($instructor->created_at), 'd/m/Y') }}</span>
                                    </li>
                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                        <strong>Trạng thái</strong>
                                        <span class="mb-0">{{ $instructor->getStatusName() }}</span>
                                    </li>
                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                        <strong>Tổng doanh thu</strong>
                                        <span class="mb-0">₫ {{ number_format($instructor->totalIncome(), 0) }}</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-footer pt-0 pb-0 text-center">
                                <div class="row">
                                    <div class="col-4 pt-3 pb-3 border-right">
                                        <h3 class="mb-1 text-primary">{{ number_format($instructor->courses->count(), 0) }}</h3>
                                        <span>Khóa học</span>
                                    </div>
                                    <div class="col-4 pt-3 pb-3 border-right">
                                        <h3 class="mb-1 text-primary">{{ number_format($instructor->studentsAmount(), 0) }}</h3>
                                        <span>Học viên</span>
                                    </div>
                                    <div class="col-4 pt-3 pb-3 border-right">
                                        <h3 class="mb-1 text-primary">{{ number_format($instructor->reviews->avg('rating'), 1) }}
                                            <i
                                                class="fa-solid fa-star" style="color: #FFD43B;"></i></h3>
                                        <span>Rating</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-xxl-8 col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-tab">
                            <div class="custom-tab-1">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a href="#about-me" data-bs-toggle="tab"
                                                            class="nav-link active show">Thông tin giảng viên</a></li>
                                    <li class="nav-item"><a href="#my-blogs" data-bs-toggle="tab"
                                                            class="nav-link">Blogs</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div id="about-me" class="tab-pane fade active show">
                                <div class="profile-personal-info">
                                    <div class="row my-4">
                                        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                            <h5 class="f-w-500">Tên <span class="pull-right">:</span>
                                            </h5>
                                        </div>
                                        <div class="col-lg-9 col-md-8 col-sm-6 col-6">
                                            <span>{{ $instructor->user->name }}</span>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                            <h5 class="f-w-500">Giới tính <span class="pull-right">:</span>
                                            </h5>
                                        </div>
                                        <div class="col-lg-9 col-md-8 col-sm-6 col-6">
                                            <span>{{ $instructor->user->gender === 'female' ? 'Nữ' : 'Nam' }}</span>
                                        </div>
                                    </div>
                                    <div class="row my-4">
                                        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                            <h5 class="f-w-500">Email <span class="pull-right">:</span>
                                            </h5>
                                        </div>
                                        <div class="col-lg-9 col-md-8 col-sm-6 col-6">
                                            <span>{{ $instructor->user->email }}</span>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                            <h5 class="f-w-500">Tuổi <span class="pull-right">:</span>
                                            </h5>
                                        </div>
                                        <div class="col-lg-9 col-md-8 col-sm-6 col-6">
                                            <span>{{ \Carbon\Carbon::parse($instructor->user->dob)->diffInYears(\Carbon\Carbon::now()) }}</span>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                            <h5 class="f-w-500">Học vấn <span class="pull-right">:</span>
                                            </h5>
                                        </div>
                                        <div class="col-lg-9 col-md-8 col-sm-6 col-6">
                                            <span>{{ $instructor->education }}</span>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                            <h5 class="f-w-500">CV <span class="pull-right">:</span>
                                            </h5>
                                        </div>
                                        <div class="col-lg-9 col-md-8 col-sm-6 col-6">
                                            @if($instructor->cv_upload != null)
                                                <a href="{{ $instructor->cv_upload ?? 'Chưa cập nhật' }}"
                                                   target="_blank">Xem CV</a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="f-w-500">Các khóa học:
                                            </h5>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-responsive text-light">
                                                            <thead>
                                                            <tr>
                                                                <th>Tên</th>
                                                                <th>Trạng thái</th>
                                                                <th>Học viên</th>
                                                                <th>Giá</th>
                                                                <th>Ngày tạo</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @if($instructor->courses->count() === 0)
                                                                <tr>
                                                                    <td class="text-center" colspan="6">Giảng viên này
                                                                        chưa
                                                                        tạo khóa học nào
                                                                    </td>
                                                                </tr>
                                                            @else
                                                                @foreach($instructor->courses as $course)
                                                                    <tr>
                                                                        <td>
                                                                            <a href="{{ route('admin.course.show', ['course' => $course]) }}">{{ $course->title }}</a>
                                                                        </td>
                                                                        <td>
                                                                            <span
                                                                                class="badge {{ $course->getBadgeColor() }}">{{ $course->getStatusName() }}</span>
                                                                        </td>
                                                                        <td>{{ number_format($course->students->where('status', 'paid')->count()) }}</td>
                                                                        <td class="color-primary">
                                                                            ₫ {{ number_format($course->price, 0) }}</td>
                                                                        <td>{{ date_format(date_create($course->created_at), 'd/m/Y') }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="reviews-list d-flex">
                                            <div class="row">
                                                <h3 class="f-w-500 mb-3">{{ number_format($instructor->reviews->avg('rating'), 1) }}
                                                    <i
                                                        class="fa-solid fa-star" style="color: #FFD43B;"></i> rating
                                                    giảng
                                                    viên - ({{ $instructor->reviews->count() }} ratings)</h3>
                                                @if($instructor->reviews->count() === 0)
                                                    <p>Giảng viên này chưa có reviews</p>
                                                @endif
                                                @foreach($instructor->reviews->sortByDesc('created_at') as $review)
                                                    <div class="col-lg-6 review-item">
                                                        <div class="top d-flex">
                                                            <div class="thumbnail">
                                                                <a href="">
                                                                    <img class="circle"
                                                                         src="{{ $review->author->user->avatarPath() }}"
                                                                         alt="student_">
                                                                </a>
                                                            </div>
                                                            <div class="author">
                                                                <h4>
                                                                    <a href="">{{ $review->author->user->name }}</a>
                                                                </h4>
                                                                <p>
                                                                    @for($i = 1; $i <= $review->rating; $i++)
                                                                        <i class="fa-solid fa-star"
                                                                           style="color: #FFD43B;"></i>
                                                                    @endfor
                                                                    @for($i = 1; $i <= 5 - $review->rating; $i++)
                                                                        <i class="fa-solid fa-star"></i>
                                                                    @endfor
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="content">
                                                            <p>{{ $review->content }}</p>
                                                        </div>
                                                        <div class="bottom">
                                                        <span class="like-btn btn btn-success text-light">
                                                            <i class="fa-regular fa-thumbs-up"></i>
                                                            {{ $review->likes->count() }}
                                                        </span>
                                                            <span class="dislike-btn btn btn-danger text-light">
                                                            <i class="fa-regular fa-thumbs-down"></i>
                                                            {{ $review->dislikes->count() }}
                                                        </span>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="my-blogs" class="tab-pane fade">
                                <div class="my-post-content pt-3">
                                    @if($instructor->blogs->count() > 0)
                                        @foreach($instructor->blogs as $blog)
                                            <div id="blog-{{ $blog->slug }}" class="profile-uploaded-post border-bottom-1 pb-5">
                                                <img src="{{ $blog->thumbnailPath() }}" alt="ssss" class="img-fluid">
                                                <a class="post-title"
                                                   href="{{ route('admin.blog.show', $blog->slug) }}">
                                                    <h4>{{ $blog->title }}</h4></a>
                                                <p>{{ $blog->summary }}</p>
                                                <button class="btn btn-outline-primary me-3"><span class="me-3"><i
                                                            class="fas fa-thumbs-up"></i></span>{{ number_format($blog->likes->count()) }}
                                                </button>
                                                <button class="btn btn-outline-danger me-3"><span class="me-3"><i
                                                            class="fas fa-thumbs-down"></i></span>{{ number_format($blog->dislikes->count()) }}
                                                </button>
                                                <span class="badge {{ $blog->getBadgeColor() }}">{{ $blog->getStatusName() }}</span>
                                                <button data-url="{{ route('admin.blog.destroy', encrypt($blog->id)) }}"
                                                        class="btn btn-danger me-3 float-end delete-button"><span
                                                        class="me-3"><i
                                                            class="fas fa-trash"></i></span>Xóa
                                                </button>
                                                <button
                                                    data-url="{{ route('admin.update-blog-status', encrypt($blog->id)) }}"
                                                    class="btn btn-info me-3 float-end suspend-button"><span
                                                        class="me-3"><i class="fas fa-lock"></i></span>Khóa
                                                </button>
                                            </div>
                                        @endforeach
                                        <div class="text-center mb-2"><a href="#" class="btn btn-primary">Load More</a>
                                        </div>
                                    @else
                                        <h3 class="text-primary text-center mt-3">Giảng viên chưa có bài blog nào</h3>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).on('click', '.delete-button', function () {
            let url = $(this).data('url');
            Swal.fire({
                title: 'Bạn có chắc chắn muốn xóa?',
                text: "Hành động này không thể hoàn tác!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Xóa'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Thành công!',
                                text: response.msg
                            })
                            $('.blog-' + response.slug).remove();
                        },
                        fail: function () {
                            Swal.fire({
                                icon: 'error',
                                title: 'Lỗi!',
                                text: response.msg
                            })
                        }
                    })
                }
            })
        })
        $(document).on('click', '.suspend-button', function () {
            let url = $(this).data('url');
            let button = $(this);
            Swal.fire({
                title: 'Bạn có chắc chắn muốn khóa blog này?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Khóa'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            status: 'suspended'
                        },
                        success: function (response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Thành công!',
                                text: response.msg
                            });
                            button.closest('.profile-uploaded-post').find('span.badge').removeClass().addClass('badge badge-warning').text('Đã khóa');
                        },
                        fail: function (response) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Lỗi!',
                                text: response.msg
                            })
                        }
                    })
                }
            })
        })
    </script>
@endsection
