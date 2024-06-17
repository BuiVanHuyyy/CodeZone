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
{{--                    <div class="lesson-top-right">--}}
{{--                        <div class="rbt-btn-close">--}}
{{--                            <a href="" title="Go Back to Course" class="rbt-round-btn"><i class="feather-x"></i></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
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
                                    <p>{!! $lesson->content !!}</p>
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
                                        <h4 class="title">{{ $lesson->comments->count() }} bình luận</h4>
                                        <div id="comment-respond" class="comment-respond">
                                            <h4 class="title">Thêm bình luận của bạn</h4>
                                            <form id="commentForm" method="post" action="{{ route('client.comment', [Crypt::encrypt($lesson->id), 'lesson']) }}">
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
                                            @forelse($lesson->comments->sortByDesc('created_at') as $comment)
                                                <li class="comment position-relative">
                                                    @if(Auth::id() == $comment->author->id)
                                                        <div class="position-absolute"
                                                             style="top: 10px; right: 10px">
                                                            <form id="deleteForm" action="{{ route('client.comment.destroy', [Crypt::encrypt($comment->id)]) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <a id="deleteButton" href=""><i class="fa-solid fa-trash"></i></a>
                                                            </form>
                                                        </div>
                                                    @endif
                                                    <div class="comment-body">
                                                        <div class="single-comment">
                                                            <div class="comment-img">
                                                                <img src="{{ $comment->author->avatarPath() }}" alt="Author Images">
                                                            </div>
                                                            <div class="comment-inner">
                                                                <h6 class="commenter">{!! $comment->author->role === 'instructor' ? '<i class="fa-solid fa-chalkboard-user"></i>' : '' !!}
                                                                    <a class="author_name" href="#">{{ $comment->author->name }}</a>
                                                                </h6>
                                                                <div class="comment-meta">
                                                                    <div
                                                                        class="time-spent">{{ date_format(date_create($comment->created_at) , 'd/m/Y') }}</div>
                                                                    <div class="reply-edit">
                                                                        <div class="reply">
                                                                            <a class="comment-reply-link" data-id="{{ $comment->id }}" href="#">Trả lời</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="comment-text">
                                                                    <p class="b2">{{ $comment->content }}</p>
                                                                    <ul class="social-icon social-default transparent-with-border justify-content-start">
                                                                        @php
                                                                            $is_active = false;
                                                                            if (Auth::check()) {
                                                                                foreach ($comment->likes as $like) {
                                                                                    if ($like['likeable_id'] == $comment->id) {
                                                                                        $is_active = true;
                                                                                        break;
                                                                                    }
                                                                                }
                                                                            }
                                                                        @endphp
                                                                        <li>
                                                                            <button data-url="{{ route('client.like', [Crypt::encrypt($comment->id), 'comment']) }}" class="{{ $is_active ? 'active' : '' }} like_btn">
                                                                                <i class="feather-thumbs-up"></i>
                                                                            </button>
                                                                            <span class="like_qty">{{ $comment->likes->count() }}</span>
                                                                        </li>
                                                                        @php
                                                                            $is_active = false;
                                                                            if (Auth::check()) {
                                                                                foreach ($comment->dislikes as $dislike) {
                                                                                    if ($dislike['dislikeable_id'] == $comment->id) {
                                                                                        $is_active = true;
                                                                                        break;
                                                                                    }
                                                                                }
                                                                            }
                                                                        @endphp
                                                                        <li>
                                                                            <button class="{{ $is_active ? 'active' : '' }} dislike_btn" data-url="{{ route('client.dislike', [Crypt::encrypt($comment->id), 'comment']) }}">
                                                                                <i class="feather-thumbs-down"></i>
                                                                            </button>
                                                                            <span class="dislike_qty">{{ $comment->dislikes->count() }}</span>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @php
                                                        //get all replies of comment
                                                        $replies = \App\Models\Comment::where('commentable_id', $comment->id)->where('commentable_type', 'comment')->get() ?? [];
                                                    @endphp
                                                    @if($replies->count() > 0)
                                                        <ul class="children">
                                                            @foreach($comment->replies as $reply)
                                                                <li class="comment">
                                                                    <div class="comment-body">
                                                                        <div class="single-comment">
                                                                            <div class="comment-img">
                                                                                @php
                                                                                    if (($reply->author->role) === 'instructor') {
                                                                                        $avatar = $reply->author->instructors->avatar;
                                                                                    } else {
                                                                                        $avatar = $reply->author->students->avatar;
                                                                                    }
                                                                                @endphp
                                                                                <img src="{{ $avatar ?? asset('client_assets/images/avatar/default-avatar.png') }}" alt="Author Images">
                                                                            </div>
                                                                            <div class="comment-inner">
                                                                                <h6 class="commenter"> {!! $reply->author->role === 'instructor' ? '<i class="fa-solid fa-chalkboard-user"></i>' : '' !!}
                                                                                    <a class="author_name" href="#">{{ $reply->author->name }}</a>
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
                                                                                            <button data-url="{{ route('client.like', [$reply->id, 'comment']) }}" class="{{ $is_active ? 'active' : '' }} like_btn">
                                                                                                <i class="feather-thumbs-up"></i>
                                                                                            </button>
                                                                                            <span class="like_qty">{{ $reply->like_amount }}</span>
                                                                                        </li>
                                                                                        @php
                                                                                            $is_active = false;
                                                                                            if (Auth::check()) {
                                                                                                foreach (Auth::user()->dislikes as $dislike) {
                                                                                                    if ($dislike['dislikeable_id'] == $reply->id) {
                                                                                                        $is_active = true;
                                                                                                        break;
                                                                                                    }
                                                                                                }
                                                                                            }
                                                                                        @endphp
                                                                                        <li>
                                                                                            <button class="{{ $is_active ? 'active' : '' }} dislike_btn" data-url="{{ route('client.dislike', [$reply->id, 'comment']) }}">
                                                                                                <i class="feather-thumbs-down"></i>
                                                                                            </button>
                                                                                            <span class="dislike_qty">{{$reply->dislike_amount}}</span>
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
                                            @empty
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
                                            @endforelse
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
        $('.comment-reply-link').click(function (e) {
            e.preventDefault();
            let id = $(this).data('id');
            let name = $(this).closest('.comment-inner').find('.author_name').text();
            let url = '{{ route('client.comment') }}' + '/' + id + '/comment';
            $('#commentForm').attr('action', url);
            $('#message').val(`@${name} `);
        });
        // Handle when use click 'like' button
        $('.like_btn').on('click', function () {
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
                        let $likeQty = $likeBtn.next('.like_qty');
                        let $dislikeQty = $likeBtn.parent().siblings().find('.dislike_qty');
                        let $dislikeBtn = $likeBtn.parent().siblings().find('.dislike_btn');

                        if ($dislikeBtn.hasClass('active')) {
                            $dislikeBtn.removeClass('active');
                        }

                        $likeQty.text(response.like_amount);
                        $dislikeQty.text(response.dislike_amount);
                        $likeBtn.toggleClass('active');
                    }
                },
            })
        })
        // Handle when user click 'dislike' button
        $('.dislike_btn').on('click', function () {
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
                        let $dislikeQty = $dislikeBtn.next('.dislike_qty');
                        let $likeQty = $dislikeBtn.parent().siblings().find('.like_qty');
                        let $likeBtn = $dislikeBtn.parent().siblings().find('.like_btn');
                        if ($likeBtn.hasClass('active')) {
                            $likeBtn.removeClass('active');
                        }
                        $dislikeQty.text(response.dislike_amount);
                        $likeQty.text(response.like_amount);
                        $dislikeBtn.toggleClass('active');
                    }
                },
            })
        })

        $('#deleteButton').on('click', function (e) {
            e.preventDefault();
            Swal.fire({
                title: 'Bạn có chắc chắn muốn xóa không?',
                showDenyButton: true,
                confirmButtonText: 'Xóa',
                denyButtonText: 'Hủy',
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#deleteForm').submit();
                }
            });
        });
    </script>
@endsection
