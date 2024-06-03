@extends('client.pages.instructors.layout.master')

@section('dashboard-main-content')
    <div class="rbt-dashboard-content bg-color-white rbt-shadow-box">
        <div class="content">
            <div class="section-title">
                <h4 class="rbt-title-style-3">Reviews</h4>
            </div>

            <div class="advance-tab-button mb--30">
                <ul class="nav nav-tabs tab-button-style-2 justify-content-start" id="reviewTab-4" role="tablist">
                    <li role="presentation">
                        <a href="#" class="tab-button active" id="received-tab" data-bs-toggle="tab" data-bs-target="#received" role="tab" aria-controls="received" aria-selected="true">
                            <span class="title">Về tôi</span>
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#" class="tab-button" id="given-tab" data-bs-toggle="tab" data-bs-target="#given" role="tab" aria-controls="given" aria-selected="false">
                            <span class="title">Khóa học của tôi</span>
                        </a>
                    </li>
                </ul>
            </div>


            <div class="tab-content">
                <div class="tab-pane fade active show" id="received" role="tabpanel" aria-labelledby="received-tab">
                    <div class="rbt-dashboard-table table-responsive mobile-table-750">
                        <table class="rbt-table table table-borderless">
                            <thead>
                            <tr>
                                <th>Học viên</th>
                                <th>Ngày đánh giá</th>
                                <th>Nội dung</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($instructorReviews->count() === 0)
                            <tr>
                                <td colspan="3" class="text-center">Không có đánh giá nào</td>
                            </tr>
                            @else
                                @foreach($instructorReviews as $review)
                                    <tr>
                                        <th>{{ $review->user->name }}</th>
                                        <td>{{ date_format(date_create($review->created_at), 'd/m/Y') }}</td>
                                        <td>
                                            <div class="rbt-review">
                                                <div class="rating">
                                                    @for($i = 0; $i < ceil($review->rating); $i++)
                                                        <i class="fas fa-star"></i>
                                                    @endfor
                                                    @for($i = 0; $i < 5 - ceil($review->rating); $i++)
                                                            <i class="far fa-star" style="color: #0b0b0b"></i>
                                                    @endfor
                                                </div>
                                            </div>
                                            <p class="b2">{{ $review->content }}</p>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>

                        </table>
                    </div>
                </div>

                <div class="tab-pane fade" id="given" role="tabpanel" aria-labelledby="given-tab">
                    <div class="rbt-dashboard-table table-responsive mobile-table-750">
                        <table class="rbt-table table table-borderless">
                            <thead>
                            <tr>
                                <th>Tên khóa học</th>
                                <th>Ngày tạo</th>
                                <th>Nội dung</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(Auth::user()->instructor->courses->where('status', 'approved')->count() === 0)
                                <tr>
                                    <td colspan="3" class="text-center">Không có đánh giá nào</td>
                                </tr>
                                @else
                                @foreach($instructorCourses as $course)
                                    <tr>
                                        <th><a href="{{ route('client.course_detail', $course->slug) }}">{{ $course->title }}</a></th>
                                        <td>{{ date_format(date_create($course->created_at), 'd/m/Y') }}</td>
                                        <td>
                                            <div class="rbt-review">
                                                <div class="rating">
                                                    @for($i = 0; $i < ceil($course->reviews->avg('rating')); $i++)
                                                        <i class="fas fa-star"></i>
                                                    @endfor
                                                    @for($i = 0; $i < 5 - ceil($course->reviews->avg('rating')); $i++)
                                                        <i class="far fa-star" style="color: #0b0b0b"></i>
                                                    @endfor
                                                </div>
                                                <span class="rating-count"> ({{ $course->reviews->count() }} Reviews)</span>
                                            </div>
                                        </td>
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
@endsection
