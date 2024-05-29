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
                                src="{{ $blog->author->instructor->avatar ?? asset('client_assets/images/avatar/default-avatar.png') }}"
                                alt="blog-image"/>
                        </div>
                        <div class="author-info">
                            <a href="{{ route('client.profile', [$blog->author->instructor->slug]) }}"><strong>{{ $blog->author->instructor->name }}</strong></a>
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
                            <img src="{{ '/client_assets/images/blog/' . $blog->thumbnail }}" alt="Blog Images"/>
                        </figure>
                    </div>
                    {!! $blog->content !!}

                    <!-- Social Share Block  -->
                    <div class="social-share-block mt-5">
                        <ul class="social-icon social-default transparent-with-border justify-content-start">
                                <li>
                                    <a id="blog_like" data-url="{{ route('client.like', [$blog->id, 'blog']) }}"
                                       class="like_btn {{ $blog->is_liked ? 'active' : '' }}">
                                        <i class="feather-thumbs-up"></i>
                                    </a>
                                    <span
                                        class="like_qty">{{ number_format($blog->likes->count(), 0) }}</span>
                                </li>
                                <li>
                                    <a id="blog_dislike" class="dislike_btn {{ $blog->is_disliked ? 'active' : '' }}" data-url="{{ route('client.dislike', [$blog->id, 'blog']) }}">
                                        <i class="feather-thumbs-down"></i>
                                    </a>
                                    <span
                                        class="dislike_qty">{{ number_format($blog->dislikes->count(), 0) }}</span>
                                </li>
                        </ul>
                        {!! $shareComponent !!}
                    </div>

                    <!-- Blog Author  -->
                    <div class="about-author">
                        <div class="media">
                            <div class="thumbnail">
                                <a href="{{ route('client.profile', [$blog->author->instructor->slug]) }}">
                                    <img src="{{ $blog->author->instructor->avatar ?? asset('client_assets/images/avatar/default-avatar.png') }}" alt="Author Images"/>
                                </a>
                            </div>
                            <div class="media-body">
                                <div class="author-info">
                                    <h5 class="title">
                                        <a class="hover-flip-item-wrapper" href="{{ route('client.profile', [$blog->author->instructor->slug]) }}">{{ $blog->author->instructor->name }}</a>
                                    </h5>
                                    <span class="b3 subtitle">{{ $blog->author->instructor->current_job }}</span>
                                </div>
                                <div class="content">
                                    <p class="description">{{ $blog->author->instructor->bio }}</p>
                                    <ul class="social-icon social-default icon-naked justify-content-start">
                                        <li>
                                            <a href="https://www.facebook.com/">
                                                <i
                                                    class="feather-facebook"
                                                ></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a
                                                href="https://www.twitter.com/"
                                            >
                                                <i
                                                    class="feather-twitter"
                                                ></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a
                                                href="https://www.instagram.com/"
                                            >
                                                <i
                                                    class="feather-instagram"
                                                ></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a
                                                href="https://www.linkdin.com/"
                                            >
                                                <i
                                                    class="feather-linkedin"
                                                ></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="rbt-comment-area">
                        <div class="comment-respond">
                            <h4 class="title">Thêm một bình luận</h4>
                            <form id="commentForm" action="{{ route('client.comment', [$blog->id, 'blog']) }}" method="post">
                                @csrf
                                <div class="row row--10">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="message">Để lại bình luận của bạn</label>
                                            <textarea id="message" name="comment_content"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <button type="submit" class="rbt-btn btn-gradient icon-hover radius-round btn-md" href="#">
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
                                                @php
                                                    if (($comment->author->role) === 'instructor') {
                                                        $avatar = $comment->author->instructor->avatar;
                                                    } else {
                                                        $avatar = $comment->author->student->avatar;
                                                    }
                                                @endphp
                                                <div class="comment-img">
                                                    <img
                                                        src="{{ $avatar ?? asset('client_assets/images/avatar/default-avatar.png') }}"
                                                        alt="Author Images"/>
                                                </div>
                                                <div class="comment-inner">
                                                    <h6 class="commenter">{!! $comment->author->id === $blog->user_id ? '<i class="fa-solid fa-user-pen"></i>' : '' !!}
                                                        <a href="#" class="author_name">{{ $comment->author->name }}</a>
                                                    </h6>
                                                    <div class="comment-meta">
                                                        <div
                                                            class="time-spent">{{ date_format(date_create($comment->created_at), 'd/m/Y') }}</div>
                                                        <div class="reply-edit">
                                                            <div class="reply">
                                                                <a data-id="{{ $comment->id }}" class="comment-reply-link" href="#">Trả lời</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="comment-text">
                                                        <p class="b2">{{ $comment->content }}</p>
                                                        <ul class="social-icon social-default transparent-with-border justify-content-start">
                                                            <li>
                                                                <a data-url="{{ route('client.like', [$comment->id, 'comment']) }}"
                                                                   class="like_btn {{ $comment->is_liked ? 'active' : '' }}">
                                                                    <i class="feather-thumbs-up"></i>
                                                                </a>
                                                                <span
                                                                    class="like_qty">{{ $comment->likes }}</span>
                                                            </li>
                                                            <li>
                                                                <a class="dislike_btn {{ $comment->is_disliked ? 'active' : '' }}"
                                                                   data-url="{{ route('client.dislike', [$comment->id, 'comment']) }}">
                                                                    <i class="feather-thumbs-down"></i>
                                                                </a>
                                                                <span
                                                                    class="dislike_qty">{{ $comment->dislikes }}</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    @if(Auth::check() && Auth::id() == $comment->author->id)
                                                        @php
                                                            $isReviewed = true;
                                                        @endphp
                                                        <div class="position-absolute" style="top: 10px; right: 10px">
                                                            <form id="deleteForm" action="{{ route('client.comment.destroy', [$comment->id]) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <a class="deleteButton" href="#" ><i class="fa-solid fa-trash"></i></a>
                                                            </form>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        @if ($comment->replies->count() > 0)
                                            <ul class="children">
                                                @foreach($comment->replies as $reply)
                                                    <li class="comment">
                                                        <div class="comment-body">
                                                            <div class="single-comment">
                                                                <div class="comment-img">
                                                                    @php
                                                                        if (($reply->author->role) === 'instructor') {
                                                                            $avatar = $reply->author->instructor->avatar;
                                                                        } else {
                                                                            $avatar = $reply->author->student->avatar;
                                                                        }
                                                                    @endphp
                                                                    <img
                                                                        src="{{ $avatar ?? asset('client_assets/images/avatar/default-avatar.png') }}"
                                                                        alt="Author Images"/>
                                                                </div>
                                                                <div class="comment-inner">
                                                                    <h6 class="commenter">{!! $reply->author->id === $blog->user_id ? '<i class="fa-solid fa-user-pen"></i>' : '' !!}
                                                                        <a  href="#" class="author_name">{{ $reply->author->name }}</a>
                                                                    </h6>
                                                                    <div class="comment-meta">
                                                                        <div
                                                                            class="time-spent">{{ date_format(date_create($reply->created_at), 'd/m/Y') }}</div>
                                                                        <div class="reply-edit">
                                                                            <div class="reply">
                                                                                <a data-id="{{ $comment->id }}" class="comment-reply-link" href="#">Trả lời</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="comment-text">
                                                                        <p class="b2">{{ $reply->content }}</p>
                                                                        <ul class="social-icon social-default transparent-with-border justify-content-start">
                                                                            <li>
                                                                                <a data-url="{{ route('client.like', [$reply->id, 'comment']) }}" class="like_btn {{ $reply->is_liked ? 'active' : '' }}">
                                                                                    <i class="feather-thumbs-up"></i>
                                                                                </a>
                                                                                <span
                                                                                    class="like_qty">{{ $reply->like_amount }}</span>
                                                                            </li>
                                                                            <li>
                                                                                <a class="dislike_btn {{ $reply->is_disliked ? 'active' : '' }}"
                                                                                   data-url="{{ route('client.dislike', [$reply->id, 'comment']) }}">
                                                                                    <i class="feather-thumbs-down"></i>
                                                                                </a>
                                                                                <span
                                                                                    class="dislike_qty">{{ $reply->dislike_amount }}</span>
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
@section('cus_js')
<script>
    $(document).ready(function () {
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
    });
    $('.comment-reply-link').click(function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        let name = $(this).closest('.comment-inner').find('.author_name').text();
        let url = '{{ route('client.comment') }}' + '/' + id + '/comment';
        $('#commentForm').attr('action', url);
        $('#message').val(`@${name} `);
    });
    $('.like_btn').click(function (event) {
        event.preventDefault();
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
                    let $dislikeBtn = $likeBtn.parent().siblings('.dislike_btn');

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
    // Xử lý sự kiện khi bấm vào nút 'dislike'
    $('.dislike_btn').click(function (event) {
        event.preventDefault();
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
                    let $likeBtn = $dislikeBtn.parent().find('.like_btn');
                    if($likeBtn.hasClass('active')) {
                        $likeBtn.removeClass('active');
                    }
                    $dislikeQty.text(response.dislike_amount);
                    $likeQty.text(response.like_amount);
                    $dislikeBtn.toggleClass('active');
                }
            },
        })
    });
    $('.deleteButton').on('click', function(e) {
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
