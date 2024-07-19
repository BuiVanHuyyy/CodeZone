@extends('client.layout.master')
@section('cus_css')
    <style>
        div#social-links {
            margin-left: auto;
            max-width: 500px;
        }

        div#social-links ul li {
            display: inline-block;
        }

        div#social-links ul li a {
            padding: 10px;
            margin: 1px;
            font-size: 20px;
        }
    </style>
@endsection
@section('content')
    <div class="rbt-overlay-page-wrapper">
        <div class="breadcrumb-image-container breadcrumb-style-max-width">
            <div class="breadcrumb-image-wrapper">
                <img src="{{ asset('client_assets/images/bg/bg-image-10.jpg') }}" alt="Education Images"/>
            </div>
            <div class="breadcrumb-content-top text-center">
                <ul class="meta-list justify-content-center mb--10">
                    <li class="list-item">
                        <div class="author-thumbnail">
                            <img
                                src="{{ $blog->author->user->avatarPath() }}"
                                alt="author-image"/>
                        </div>
                        <div class="author-info">
                            <a href="{{ route('instructor.profile', [$blog->author->user->slug]) }}"><strong>{{ $blog->author->user->name }}</strong></a>
                        </div>
                    </li>
                    <li class="list-item">
                        <i class="feather-clock"></i>
                        <span>{{ date_format($blog->created_at, 'd/m/Y') }}</span>
                    </li>
                </ul>
                <h1 class="title">
                    {{ $blog->title }}
                </h1>
                <p>{{ $blog->summary }}</p>
            </div>
        </div>

        <div class="rbt-blog-details-area rbt-section-gapBottom breadcrumb-style-max-width">
            <div class="blog-content-wrapper rbt-article-content-wrapper">
                <div class="content">
                    <div class="post-thumbnail mb--30 position-relative wp-block-image alignwide">
                        <figure>
                            <img src="{{ $blog->thumbnailPath() }}" alt="Blog thumbnail"/>
                        </figure>
                    </div>
                    {!! $blog->content !!}

                    <!-- Social Share Block  -->
                    <div class="social-share-block mt-5">
                        <ul class="social-icon social-default transparent-with-border justify-content-start">
                            <li>
                                @php
                                    $is_active = false;
                                    if (Auth::check()) {
                                        foreach ($blog->likes as $like) {
                                            if ($like['user_id'] == Auth::id()) {
                                                $is_active = true;
                                                break;
                                            }
                                        }
                                    }
                                @endphp
                                <button data-url="{{ route('client.like', [Crypt::encrypt($blog->id), 'blog']) }}" class="like_btn {{ $is_active ? 'active' : '' }}">
                                    <i class="feather-thumbs-up"></i>
                                </button>
                                <span
                                    class="like_qty">{{ number_format($blog->likes->count(), 0) }}</span>
                            </li>
                            <li>
                                @php
                                    $is_active = false;
                                    if (Auth::check()) {
                                        foreach ($blog->dislikes as $dislike) {
                                            if ($dislike['user_id'] == Auth::id()) {
                                                $is_active = true;
                                                break;
                                            }
                                        }
                                    }
                                @endphp
                                <button
                                    class="dislike_btn {{ $is_active ? 'active' : '' }}"
                                    data-url="{{ route('client.dislike', [Crypt::encrypt($blog->id), 'blog']) }}">
                                    <i class="feather-thumbs-down"></i>
                                </button>
                                <span class="dislike_qty">{{ number_format($blog->dislikes->count(), 0) }}</span>
                            </li>
                        </ul>
                        {!! $shareComponent !!}
                    </div>

                    <div class="about-author">
                        <div class="media">
                            <div class="thumbnail">
                                <a href="{{ route('instructor.profile', [$blog->author->user->slug]) }}">
                                    <img
                                        src="{{ $blog->author->user->avatarPath() }}"
                                        alt="Author Images"/>
                                </a>
                            </div>
                            <div class="media-body">
                                <div class="author-info">
                                    <h5 class="title">
                                        <a class="hover-flip-item-wrapper"
                                           href="{{ route('instructor.profile', [$blog->author->user->slug]) }}">{{ $blog->author->user->name }}</a>
                                    </h5>
                                    <span class="b3 subtitle">{{ $blog->author->current_job }}</span>
                                </div>
                                <div class="content">
                                    <p class="description">{{ $blog->author->bio }}</p>
                                    <ul class="social-icon social-default icon-naked justify-content-start">
                                        @if($blog->author->facebook)
                                            <li>
                                                <a href="{{ $blog->author->facebook }}" target="_blank">
                                                    <i class="feather-facebook"></i>
                                                </a>
                                            </li>
                                        @endif
                                        @if($blog->author->linkedin)
                                            <li>
                                                <a href="{{ $blog->author->linkedin }}" target="_blank">
                                                    <i class="feather-linkedin"></i>
                                                </a>
                                            </li>
                                        @endif
                                        @if($blog->author->github)
                                            <li>
                                                <a href="{{ $blog->author->github }}" target="_blank">
                                                    <i class="feather-github"></i>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="rbt-comment-area">
                        <div class="comment-respond">
                            <h4 class="title">Thêm một bình luận</h4>
                            <form id="commentForm"
                                  action="{{ route('client.comment', [Crypt::encrypt($blog->id), 'blog']) }}"
                                  method="POST">
                                @csrf
                                <div class="row row--10">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="message">Để lại bình luận của bạn</label>
                                            <textarea id="message" name="comment_content"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <button type="submit"
                                                class="rbt-btn btn-gradient icon-hover radius-round btn-md">
                                            <span class="btn-text">Đăng bình luận</span>
                                            <span class="btn-icon">
                                                <i class="feather-arrow-right"></i>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="rbt-comment-area">
                        <h4 class="title">{{ $comments->count() }} bình luận</h4>
                        <ul class="comment-list">
                            @if($comments->count() === 0)
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
                                @foreach($comments as $comment)
                                    <li class="comment position-relative">
                                        <div class="comment-body">
                                            <div class="single-comment">
                                                <div class="comment-img">
                                                    <img src="{{ $comment->authorAvatar() }}" alt="Author Images"/>
                                                </div>
                                                <div class="comment-inner">
                                                    <h6 class="commenter">{!! $comment->author->isInstructor() && $comment->author->instructor->id === $blog->instructor_id ? '<i class="fa-solid fa-user-pen"></i>' : '' !!}
                                                        <span class="author_name">{{ $comment->author->name }}</span>
                                                    </h6>
                                                    <div class="comment-meta">
                                                        <div
                                                            class="time-spent">{{ date_format(date_create($comment->created_at), 'd/m/Y') }}</div>
                                                        <div class="reply-edit">
                                                            <div class="reply">
                                                                <a data-id="{{ Crypt::encrypt($comment->id) }}"
                                                                   class="comment-reply-link" href="#">Trả lời</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="comment-text">
                                                        <p class="b2">{{ $comment->content }}</p>
                                                        <ul class="social-icon social-default transparent-with-border justify-content-start">
                                                            <li>
                                                                @php
                                                                    $is_active = false;
                                                                    if (Auth::check()) {
                                                                        foreach ($comment->likes as $like) {
                                                                            if ($like['user_id'] == Auth::id()) {
                                                                                $is_active = true;
                                                                                break;
                                                                            }
                                                                        }
                                                                    }
                                                                @endphp
                                                                <button
                                                                    data-url="{{ route('client.like', [Crypt::encrypt($comment->id), 'comment']) }}"
                                                                    class="like_btn {{ $is_active ? 'active' : '' }}">
                                                                    <i class="feather-thumbs-up"></i>
                                                                </button>
                                                                <span
                                                                    class="like_qty">{{ number_format($comment->likes->count(), 0) }}</span>
                                                            </li>
                                                            <li>
                                                                @php
                                                                    $is_active = false;
                                                                    if (Auth::check()) {
                                                                        foreach ($comment->dislikes as $dislike) {
                                                                            if ($dislike['user_id'] == Auth::id()) {
                                                                                $is_active = true;
                                                                                break;
                                                                            }
                                                                        }
                                                                    }
                                                                @endphp
                                                                <button
                                                                    class="dislike_btn {{ $is_active ? 'active' : '' }}"
                                                                    data-url="{{ route('client.dislike', [Crypt::encrypt($comment->id), 'comment']) }}">
                                                                    <i class="feather-thumbs-down"></i>
                                                                </button>
                                                                <span class="dislike_qty">{{ number_format($comment->dislikes->count(), 0) }}</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    @if(Auth::check() && Auth::id() == $comment->author->id)
                                                        <div class="position-absolute" style="top: 10px; right: 10px">
                                                            <form id="deleteForm"
                                                                  action="{{ route('client.comment.destroy', [Crypt::encrypt($comment->id)]) }}"
                                                                  method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="delete-button"><i class="fa-solid fa-trash"></i></button>
                                                            </form>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        @if ($comment->replies->count() > 0)
                                            <ul class="children">
                                                @foreach($comment->replies->sortBy('created_at') as $reply)
                                                    <li class="comment position-relative">
                                                        @if(Auth::check() && Auth::id() == $reply->author->id)
                                                            <div class="position-absolute"
                                                                 style="top: 10px; right: 10px">
                                                                <form id="deleteForm"
                                                                      action="{{ route('client.comment.destroy', [Crypt::encrypt($reply->id)]) }}"
                                                                      method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="delete-button" type="submit"><i class="fa-solid fa-trash"></i></button>
                                                                </form>
                                                            </div>
                                                        @endif
                                                        <div class="comment-body">
                                                            <div class="single-comment">
                                                                <div class="comment-img">
                                                                    <img
                                                                        src="{{ $reply->author->avatarPath() }}"
                                                                        alt="Author Images"/>
                                                                </div>
                                                                <div class="comment-inner">
                                                                    <h6 class="commenter">{!! $reply->author->isInstructor() && $reply->author->instructor->id === $blog->instructor_id ? '<i class="fa-solid fa-user-pen"></i>' : '' !!}
                                                                        <span
                                                                            class="author_name">{{ $reply->author->name }}</span>
                                                                    </h6>
                                                                    <div class="comment-meta">
                                                                        <div
                                                                            class="time-spent">{{ date_format(date_create($reply->created_at), 'd/m/Y') }}</div>
                                                                        <div class="reply-edit">
                                                                            <div class="reply">
                                                                                <a data-id="{{ Crypt::encrypt($comment->id) }}"
                                                                                   class="comment-reply-link" href="#">Trả
                                                                                    lời</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="comment-text">
                                                                        <p class="b2">{{ $reply->content }}</p>
                                                                        <ul class="social-icon social-default transparent-with-border justify-content-start">
                                                                            <li>
                                                                                @php
                                                                                    $is_active = false;
                                                                                    if (Auth::check()) {
                                                                                        foreach ($reply->likes as $like) {
                                                                                            if ($like['user_id'] == Auth::id()) {
                                                                                                $is_active = true;
                                                                                                break;
                                                                                            }
                                                                                        }
                                                                                    }
                                                                                @endphp
                                                                                <button
                                                                                    data-url="{{ route('client.like', [Crypt::encrypt($reply->id), 'comment']) }}"
                                                                                    class="like_btn {{ $is_active ? 'active' : '' }}">
                                                                                    <i class="feather-thumbs-up"></i>
                                                                                </button>
                                                                                <span
                                                                                    class="like_qty">{{ $reply->likes->count() }}</span>
                                                                            </li>
                                                                            <li>
                                                                                @php
                                                                                    $is_active = false;
                                                                                    if (Auth::check()) {
                                                                                        foreach ($reply->dislikes as $dislike) {
                                                                                            if ($dislike['user_id'] == Auth::id()) {
                                                                                                $is_active = true;
                                                                                                break;
                                                                                            }
                                                                                        }
                                                                                    }
                                                                                @endphp
                                                                                <button
                                                                                    class="dislike_btn {{ $is_active ? 'active' : '' }}"
                                                                                    data-url="{{ route('client.dislike', [Crypt::encrypt($reply->id), 'comment']) }}">
                                                                                    <i class="feather-thumbs-down"></i>
                                                                                </button>
                                                                                <span
                                                                                    class="dislike_qty">{{ $reply->dislikes->count() }}</span>
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
@endsection
@if(Auth::check())
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
                        console.log(response.message)
                        if (response.success) {
                            let $likeQty = $likeBtn.next('.like_qty');
                            let $dislikeQty = $likeBtn.parent().siblings().find('.dislike_qty');
                            let $dislikeBtn = $likeBtn.parent().siblings().find('.dislike_btn');

                            if ($dislikeBtn.hasClass('active')) {
                                $dislikeBtn.removeClass('active');
                            }

                            if (response.message != null) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: response.message,
                                });
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
                console.log(dislikeUrl);
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
                            console.log(response.like_amount, response.dislike_amount)
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
@endif
