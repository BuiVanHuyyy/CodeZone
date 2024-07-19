@extends('admin.layout.master')
@section('styles')
    <style>
        img {
            display: block;
            width: 100%;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-xxl-4 col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <img class="img-fluid"
                                 src="{{ $blog->thumbnailPath() }}"
                                 alt="Course thumbnail">
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
                                        <span
                                            class="mb-0 badge badge-rounded {{ $blog->getBadgeColor() }}">{{ $blog->getStatusName() }}</span>
                                    </li>
                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                        <strong>Tác giả</strong>
                                        <span class="mb-0"><a
                                                href="{{ route('admin.instructor.show', $blog->author->user->slug) }}">{{ $blog->author->user->name }}</a></span>
                                    </li>
                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                        <strong>Ngày tạo</strong>
                                        <span
                                            class="mb-0">{{ date_format(date_create($blog->created_at), 'd/m/Y') }}</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-footer pt-0 pb-0 text-center">
                                <div class="row">
                                    <div class="col-4 pt-3 pb-3 border-right">
                                        <h3 class="mb-1 text-primary">{{ number_format($blog->likes->count()) }}</h3>
                                        <span>Likes</span>
                                    </div>
                                    <div class="col-4 pt-3 pb-3 border-right">
                                        <h3 class="mb-1 text-primary">{{ number_format($blog->dislikes->count()) }}</h3>
                                        <span>Dislikes</span>
                                    </div>
                                    <div class="col-4 pt-3 pb-3 border-right">
                                        <h3 class="mb-1 text-primary">{{ number_format($blog->comments->count()) }}</h3>
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
                        <div class="w-100">
                            {!! $blog->content !!}
                        </div>
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
                                                    <a href="{{ route($blog->author->role == 'student' ? 'admin.student.show' : 'admin.instructor.show', [$comment->author->slug]) }}">
                                                        <img class="circle" src="{{ $comment->author->avatarPath() }}"
                                                             alt="">
                                                    </a>
                                                </div>
                                                <div class="author">
                                                    <h4>
                                                        <a href="{{ route($comment->author->isStudent() ? 'admin.student.show' : 'admin.instructor.show', [$comment->author]) }}">{{ $comment->author->name }}</a>
                                                    </h4>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <p>{{ $comment->content }}</p>
                                            </div>
                                            <div class="bottom">
                                                <span class="like-btn btn btn-success text-light">
                                                    <i class="fa-regular fa-thumbs-up"></i>
                                                    {{ $comment->likes->count() }}
                                                </span>
                                                <span class="dislike-btn btn btn-danger text-light">
                                                    <i class="fa-regular fa-thumbs-down"></i>
                                                    {{ $comment->dislikes->count() }}
                                                </span>
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
        $(document).ready(function () {
            $('.course-detail-content ul .has-submenu').on('click', function (e) {
                e.stopPropagation();
                $(this).find('ul').slideToggle();
                $(this).find('.fa-caret-down').toggleClass('rotated');
            });
        });
    </script>
@endsection

