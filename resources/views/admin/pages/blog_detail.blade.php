@extends('admin.layout.master')

@section('content')
    <div class="container-fluid">

        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Chi tiết bài blog</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-3 col-xxl-4 col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <img class="img-fluid" src="{{ '/client_assets/images/blog/' . $blog->thumbnail ?? asset('client_assets/images/avatar/default_course_thumbnail.png') }}" alt="Course thumbnail">
                            <div class="card-body">
                                <h4 class="mb-0 text-center">{{ $blog->title }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title">Tổng quan</h2>
                            </div>
                            <div class="card-body pb-0">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                        <strong>Trạng thái</strong>
                                        @php
                                        if ($blog->status === 'pending') {
                                            $color = 'primary';
                                            $status = 'Chờ xác thực';
                                        } elseif ($blog->status === 'approved') {
                                            $color = 'success';
                                            $status = 'Xác thực';
                                        } else {
                                            $color = 'danger';
                                            $status = 'Từ chối';
                                        }
                                        @endphp
                                        <span class="mb-0 badge badge-rounded badge-{{ $color }}">{{ $status }}</span>
                                    </li>
                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                        <strong>Tác giả</strong>
                                        <span class="mb-0">{{ $blog->author->name }}</span>
                                    </li>
                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                        <strong>Ngày tạo</strong>
                                        <span class="mb-0">{{ date_format(date_create($blog->created_at), 'd/m/Y') }}</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-footer pt-0 pb-0 text-center">
                                <div class="row">
                                    <div class="col-4 pt-3 pb-3 border-right">
                                        <h3 class="mb-1 text-primary">{{ number_format($blog->like_amount, 0) }}</h3>
                                        <span>Likes</span>
                                    </div>
                                    <div class="col-4 pt-3 pb-3 border-right">
                                        <h3 class="mb-1 text-primary">{{ number_format($blog->dislike_amount, 0) }}</h3>
                                        <span>Dislikes</span>
                                    </div>
                                    <div class="col-4 pt-3 pb-3 border-right">
                                        <h3 class="mb-1 text-primary">{{ number_format($blog->comments->count(), 0) }}</h3>
                                        <span>Comments</span>
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
                        <h4 class="text-primary">Nội dung bài blog</h4>
                        {!! $blog->content !!}
                        <hr>
                    </div>
                    <div class="row mb-4 px-3">
                        <div class="reviews-list d-flex">
                            <div class="row">
                                <h3 class="f-w-500 mb-3 text-primary">Bình luận của bài viết</h3>
                                @if($blog->comments->count() === 0)
                                    <p>Bài viết này chưa có bình luận</p>
                                @else
                                    @foreach($blog->comments->sortByDesc('created_at') as $comment)
                                        <div class="col-lg-6 review-item">
                                            <div class="top d-flex">
                                                <div class="thumbnail">
                                                    <a href="{{ route($blog->author->role == 'student' ? 'admin.student.show' : 'admin.instructor.show', [$comment->author]) }}">
                                                        @php
                                                        $avatar = $comment->author->role == 'student' ? $comment->author->students->avatar : $comment->author->instructors->avatar;
                                                        @endphp
                                                        <img class="circle" src="{{ $avatar ?? asset('client_assets/images/avatar/default-avatar.png') }}" alt="">
                                                    </a>
                                                </div>
                                                <div class="author">
                                                    <h4><a href="{{ route($blog->author->role == 'student' ? 'admin.student.show' : 'admin.instructor.show', [$comment->author]) }}">{{ $comment->author->name }}</a></h4>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <p>{{ $comment->content }}</p>
                                            </div>
                                            <div class="bottom">
                                                <button class="like-btn">
                                                    <i class="fa-regular fa-thumbs-up"></i>
                                                    {{ $comment->like_count }}
                                                </button>
                                                <button class="dislike-btn">
                                                    <i class="fa-regular fa-thumbs-down"></i>
                                                    {{ $comment->dislike_count }}
                                                </button>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
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
        $(document).ready(function() {
            $('.course-detail-content ul .has-submenu').on('click',function(e) {
                e.stopPropagation();
                $(this).find('ul').slideToggle();
                $(this).find('.fa-caret-down').toggleClass('rotated');
            });
        });
    </script>
@endsection

