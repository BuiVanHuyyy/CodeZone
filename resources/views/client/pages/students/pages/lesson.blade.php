@php use Illuminate\Support\Facades\Auth; @endphp
@extends('client.layout.master')
@section('content')
    <div class="rbt-lesson-area bg-color-white">
        <div class="rbt-lesson-content-wrapper">
            @include('client.pages.students.blocks.workspace_sidebar')
            <div class="rbt-lesson-rightsidebar overflow-hidden lesson-video">
                <div class="lesson-top-bar">
                    <div class="lesson-top-left">
                        <div class="rbt-lesson-toggle">
                            <button class="lesson-toggle-active btn-round-white-opacity" title="Toggle Sidebar"><i
                                    class="feather-arrow-left"></i></button>
                        </div>
                        <h5>{{ $lesson->title }}</h5>
                    </div>
                    <div class="lesson-top-right">
                        <div class="rbt-btn-close">
                            <a href="" title="Go Back to Course" class="rbt-round-btn"><i class="feather-x"></i></a>
                        </div>
                    </div>
                </div>
                <div class="inner">
                    @if($lesson->video != null)
                        <div class="plyr__video-embed rbtplayer">
                            {!! $lesson->video !!}
                        </div>
                    @endif

                    <div class="content">
                        <div class="advance-tab-button mb--30">
                            <ul class="nav nav-tabs tab-button-style-2 justify-content-start" id="myTab-4"
                                role="tablist">
                                <li role="presentation">
                                    <a href="#" class="tab-button active" id="home-tab-4" data-bs-toggle="tab"
                                       data-bs-target="#home-4" role="tab" aria-controls="home-4" aria-selected="true">
                                        <span class="title">Nội dung bài giảng</span>
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="#" class="tab-button" id="profile-tab-4" data-bs-toggle="tab"
                                       data-bs-target="#profile-4" role="tab" aria-controls="profile-4"
                                       aria-selected="false">
                                        <span class="title">Thảo luận về bài giảng</span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="home-4" role="tabpanel"
                                 aria-labelledby="home-tab-4">
                                <div class="row g-5">
                                    <p>{{ $lesson->content }}</p>
                                    @if(!is_null($lesson->resource))
                                        <a href="{{ $lesson->resource }}"
                                           class="rbt-btn icon-hover icon-hover-left btn-md bg-primary-opacity">
                                            <span class="btn-icon"><i class="feather-download"></i></span>
                                            <span class="btn-text">Source code bài giảng</span>
                                        </a>
                                    @endif
                                    <div class="bg-color-extra2 ptb--15 overflow-hidden">
                                        <div class="rbt-button-group">

                                            <a class="rbt-btn icon-hover icon-hover-left btn-md bg-primary-opacity"
                                               href="#">
                                                <span class="btn-icon"><i class="feather-arrow-left"></i></span>
                                                <span class="btn-text">Previous</span>
                                            </a>
                                            <a class="rbt-btn icon-hover btn-md" href="#">
                                                <span class="btn-text">Next</span>
                                                <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="profile-4" role="tabpanel" aria-labelledby="profile-tab-4">
                                <div class="row g-5">
                                    <div class="rbt-comment-area">
                                        <h4 class="title">{{ $comments->count() }} bình luận</h4>
                                        <div id="comment-respond" class="comment-respond">
                                            <h4 class="title">Thêm bình luận của bạn</h4>
                                            <form id="commentForm" method="post"
                                                  action="{{ route('client.comment', [$lesson->id, 'lesion']) }}">
                                                @csrf
                                                <div class="row row--10">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="message">Viết một bình luận</label>
                                                            <textarea id="message" name="comment_content"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <button type="submit"
                                                                class="rbt-btn btn-gradient icon-hover radius-round btn-md">
                                                            <span class="btn-text">Đăng bình luận</span>
                                                            <span class="btn-icon">
                                                                <i class="feather-arrow-right"></i></span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <ul class="comment-list">
                                            @if($comments->count() ===0)
                                                <li class="comment">
                                                    <div class="comment-body">
                                                        <div class="single-comment">
                                                            <div class="comment-inner">
                                                                <div class="comment-text">
                                                                    <p class="b2">Chưa có bình luận nào</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @else
                                                @foreach($comments->sortByDesc('created_at') as $comment)
                                                    <li class="comment">
                                                        <div class="comment-body">
                                                            <div class="single-comment">
                                                                <div class="comment-img">
                                                                    <img src="{{ $comment->author->students->avatar ?? asset('client_assets/images/avatar/default-avatar.png') }}" alt="Author Images">
                                                                </div>
                                                                <div class="comment-inner">
                                                                    <h6 class="commenter">
                                                                        <a class="author_name"
                                                                           href="#">{{ optional($comment->author->students)->name }}</a>
                                                                    </h6>
                                                                    <div class="comment-meta">
                                                                        <div
                                                                            class="time-spent">{{ date_format(date_create(optional($comment->author->students)->created_at), 'd/m/Y') }}</div>
                                                                        <div class="reply-edit">
                                                                            <div class="reply">
                                                                                <a class="comment-reply-link"
                                                                                   data-id="{{ $comment->id }}"
                                                                                   href="#comment-respond">Trả lời</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="comment-text">
                                                                        <p class="b2">{{ $comment->content }}</p>
                                                                        <ul class="social-icon social-default transparent-with-border justify-content-start">
                                                                            @php
                                                                                $is_active = false;
                                                                                if (Auth::check()) {
                                                                                    foreach (Auth::user()->likes as $like) {
                                                                                        if ($like['likeable_id'] == $comment->id) {
                                                                                            $is_active = true;
                                                                                            break;
                                                                                        }
                                                                                    }
                                                                                }
                                                                            @endphp
                                                                            <li>
                                                                                <a data-url="{{ route('student.like', [$comment->id, 'comment']) }}" class="{{ $is_active ? 'active' : '' }} like_btn">
                                                                                    <i class="feather-thumbs-up"></i>
                                                                                </a>
                                                                                <span class="like_amount">{{ $comment->like_amount }}</span>
                                                                            </li>
                                                                            @php
                                                                                $is_active = false;
                                                                                if (Auth::check()) {
                                                                                    foreach (Auth::user()->dislikes as $dislike) {
                                                                                        if ($dislike['dislikeable_id'] == $comment->id) {
                                                                                            $is_active = true;
                                                                                            break;
                                                                                        }
                                                                                    }
                                                                                }
                                                                            @endphp
                                                                            <li>
                                                                                <a class="{{ $is_active ? 'active' : '' }} dislike_btn" data-url="{{ route('student.dislike', [$comment->id, 'comment']) }}">
                                                                                    <i class="feather-thumbs-down"></i>
                                                                                </a>
                                                                                <span class="dislike_amount">{{ $comment->dislike_amount }}</span>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @if($comment->replies->count() != 0)
                                                            <ul class="children">
                                                                @foreach($comment->replies as $reply)
                                                                    <li class="comment">
                                                                        <div class="comment-body">
                                                                            <div class="single-comment">
                                                                                <div class="comment-img">
                                                                                    <img src="{{ $reply->author->instructors->avatar ?? $reply->author->students->avatar ?? asset('client_assets/images/avatar/default-avatar.png') }}" alt="Author Images">
                                                                                </div>
                                                                                <div class="comment-inner">
                                                                                    <h6 class="commenter">
                                                                                        <a class="author_name"
                                                                                           href="#">{{ $reply->author->instructors->name ?? $reply->author->students->name }}</a>
                                                                                    </h6>
                                                                                    <div class="comment-meta">
                                                                                        <div
                                                                                            class="time-spent">{{ date_format(date_create($reply->created_at), 'd/m/Y') }}</div>
                                                                                        <div class="reply-edit">
                                                                                            <div class="reply">
                                                                                                <a class="comment-reply-link"
                                                                                                   data-id="{{ $reply->id }}"
                                                                                                   href="#comment-respond">Trả lời</a>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="comment-text">
                                                                                        <p class="b2">{{ $reply->content }}</p>
                                                                                        <ul class="social-icon social-default transparent-with-border justify-content-start">
                                                                                            @php
                                                                                                $is_active = false;
                                                                                                if (Auth::check()) {
                                                                                                    foreach (Auth::user()->likes as $like) {
                                                                                                        if ($like['likeable_id'] == $reply->id) {
                                                                                                            $is_active = true;
                                                                                                            break;
                                                                                                        }
                                                                                                    }
                                                                                                }
                                                                                            @endphp
                                                                                            <li>
                                                                                                <a data-url="{{ route('student.like', [$reply->id, 'comment']) }}" class="{{ $is_active ? 'active' : '' }} like_btn">
                                                                                                    <i class="feather-thumbs-up"></i>
                                                                                                </a>
                                                                                                <span class="like_amount">{{ $reply->like_amount }}</span>
                                                                                            </li>
                                                                                            @php
                                                                                                $is_active = false;
                                                                                                if (Auth::check()) {
                                                                                                    foreach (Auth::user()->dislikes as $dislike) {
                                                                                                        if ($dislike['likeable_id'] == $reply->id) {
                                                                                                            $is_active = true;
                                                                                                            break;
                                                                                                        }
                                                                                                    }
                                                                                                }
                                                                                            @endphp
                                                                                            <li>
                                                                                                <a class="{{ $is_active ? 'active' : '' }} dislike_btn" data-url="{{ route('student.dislike', [$reply->id, 'comment']) }}">
                                                                                                    <i class="feather-thumbs-down"></i>
                                                                                                </a>
                                                                                                <span class="dislike_amount">{{$reply->dislike_amount}}</span>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('cus_js')
    <script>
        $(document).ready(function () {
            $('.comment-reply-link').click(function (e) {
                e.preventDefault();
                let id = $(this).data('id');
                let name = $(this).closest('.comment').find('.author_name').text();
                let url = '{{ route('client.comment') }}' + '/' + id + '/comment';
                $('#commentForm').attr('action', url);
                $('#message').val(`@${name} `);
            });
            let msg = "{{ session('msg') }}";
            let i = "{{ session('i') }}";
            if (msg) {
                Swal.fire({
                    position: "top-end",
                    icon: i,
                    title: msg,
                    showConfirmButton: false,
                    timer: 1000
                });
            }
            // Xử lý sự kiện khi bấm vào nút 'like'
            $('.like_btn').click(function (event) {
                // event.preventDefault();
                let $likeBtn = $(this);

                let likeUrl = $likeBtn.data('url');

                $.ajax({
                    url: likeUrl,
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        if (response.success) {
                            let $likeAmount = $likeBtn.siblings('.like_amount');

                            let likeAmount = parseInt($likeAmount.text(), 10);

                            $likeBtn.toggleClass('active');
                            if ($likeBtn.hasClass('active')) {
                                likeAmount++;
                            } else {
                                likeAmount--;
                            }
                            $likeAmount.text(likeAmount);
                            location.reload();
                        }
                    },
                })
            })
            // Xử lý sự kiện khi bấm vào nút 'dislike'
            $('.dislike_btn').click(function (event) {
                // event.preventDefault();
                let $dislikeBtn = $(this);
                let dislikeUrl = $dislikeBtn.data('url');
                $.ajax({
                    url: dislikeUrl,
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        if (response.success) {
                            let $dislikeAmount = $dislikeBtn.siblings('.dislike_amount');

                            let dislikeAmount = parseInt($dislikeAmount.text(), 10);

                            $dislikeBtn.toggleClass('active');
                            if ($dislikeBtn.hasClass('active')) {
                                dislikeAmount++;
                            } else {
                                dislikeAmount--;
                            }
                            $dislikeAmount.text(dislikeAmount);
                            location.reload();
                        }
                    },
                });
            });
        });
    </script>
@endsection
