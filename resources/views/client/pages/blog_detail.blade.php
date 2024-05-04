@extends('client.layout.master')
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
                            <img src="{{ $blog->author->instructors->avatar ?? asset('client_assets/images/avatar/default-avatar.png') }}" alt="blog-image"/>
                        </div>
                        <div class="author-info">
                            <a href="{{ route('client.profile', [$blog->author->instructors]) }}"><strong>{{ $blog->author->instructors->name }}</strong></a>
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
                    <div class="social-share-block">
                        <div class="post-like d-flex">
                            <a href="#" style="margin-right: 30px"><i class="feather feather-thumbs-up"></i><span>{{ number_format($like_amount, 0) }} Like</span></a>
                            <a href="#"><i class="feather feather-thumbs-down"></i><span>{{ number_format($dislike_amount, 0) }} Dislike</span></a>
                        </div>
                        <ul class="social-icon social-default transparent-with-border">
                            <li>
                                <a href="https://www.facebook.com/">
                                    <i class="feather-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.twitter.com/">
                                    <i class="feather-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/">
                                    <i class="feather-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.linkdin.com/">
                                    <i class="feather-linkedin"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Blog Author  -->
                    <div class="about-author">
                        <div class="media">
                            <div class="thumbnail">
                                <a href="{{ route('client.profile', [$blog->author->instructors]) }}">
                                    <img src="{{ $blog->author->instructors->avatar ?? asset('client_assets/images/avatar/default-avatar.png') }}" alt="Author Images"/>
                                </a>
                            </div>
                            <div class="media-body">
                                <div class="author-info">
                                    <h5 class="title">
                                        <a class="hover-flip-item-wrapper" href="#">{{ $blog->author->instructors->name }}</a>
                                    </h5>
                                    <span class="b3 subtitle">{{ $blog->author->instructors->current_job }}</span>
                                </div>
                                <div class="content">
                                    <p class="description">{{ $blog->author->instructors->bio }}</p>
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
                            <form action="#">
                                <div class="row row--10">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="message">Để lại bình luận của bạn</label>
                                            <textarea id="message" name="message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <a class="rbt-btn btn-gradient icon-hover radius-round btn-md" href="#">
                                            <span class="btn-text">Đăng bình luận</span>
                                            <span class="btn-icon">
                                                <i class="feather-arrow-right"></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="rbt-comment-area">
                        <h4 class="title">2 comments</h4>
                        <ul class="comment-list">
                            <!-- Start Single Comment  -->
                            <li class="comment">
                                <div class="comment-body">
                                    <div class="single-comment">
                                        <div class="comment-img">
                                            <img src="{{ asset('client_assets/images/testimonial/testimonial-1.jpg') }}" alt="Author Images"/>
                                        </div>
                                        <div class="comment-inner">
                                            <h6 class="commenter">
                                                <a href="#">Cameron Williamson</a>
                                            </h6>
                                            <div class="comment-meta">
                                                <div class="time-spent">
                                                    Nov 23, 2018 at 12:23 pm
                                                </div>
                                                <div class="reply-edit">
                                                    <div class="reply">
                                                        <a
                                                            class="comment-reply-link"
                                                            href="#"
                                                        >Reply</a
                                                        >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="comment-text">
                                                <p class="b2">
                                                    Duis hendrerit velit
                                                    scelerisque felis
                                                    tempus, id porta libero
                                                    venenatis. Nulla
                                                    facilisi. Phasellus
                                                    viverra magna commodo
                                                    dui lacinia tempus.
                                                    Donec malesuada nunc non
                                                    dui posuere, fringilla
                                                    vestibulum urna mollis.
                                                    Integer condimentum ac
                                                    sapien quis maximus.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <ul class="children">
                                    <!-- Start Single Comment  -->
                                    <li class="comment">
                                        <div class="comment-body">
                                            <div class="single-comment">
                                                <div class="comment-img">
                                                    <img
                                                        src="{{ asset('client_assets/images/testimonial/testimonial-2.jpg') }}"
                                                        alt="Author Images"
                                                    />
                                                </div>
                                                <div class="comment-inner">
                                                    <h6 class="commenter">
                                                        <a href="#"
                                                        >John Due</a
                                                        >
                                                    </h6>
                                                    <div
                                                        class="comment-meta"
                                                    >
                                                        <div
                                                            class="time-spent"
                                                        >
                                                            Nov 23, 2018 at
                                                            12:23 pm
                                                        </div>
                                                        <div
                                                            class="reply-edit"
                                                        >
                                                            <div
                                                                class="reply"
                                                            >
                                                                <a
                                                                    class="comment-reply-link"
                                                                    href="#"
                                                                >Reply</a
                                                                >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="comment-text"
                                                    >
                                                        <p class="b2">
                                                            Pellentesque
                                                            habitant morbi
                                                            tristique
                                                            senectus et
                                                            netus et
                                                            malesuada fames
                                                            ac turpis
                                                            egestas.
                                                            Suspendisse
                                                            lobortis cursus
                                                            lacinia.
                                                            Vestibulum vitae
                                                            leo id diam
                                                            pellentesque
                                                            ornare.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- End Single Comment  -->
                                </ul>
                            </li>
                            <!-- End Single Comment  -->

                            <!-- Start Single Comment  -->
                            <li class="comment">
                                <div class="comment-body">
                                    <div class="single-comment">
                                        <div class="comment-img">
                                            <img
                                                src="{{ asset('client_assets/images/testimonial/testimonial-3.jpg') }}"
                                                alt="Author Images"
                                            />
                                        </div>
                                        <div class="comment-inner">
                                            <h6 class="commenter">
                                                <a href="#">Rafin Shuvo</a>
                                            </h6>
                                            <div class="comment-meta">
                                                <div class="time-spent">
                                                    Nov 23, 2018 at 12:23 pm
                                                </div>
                                                <div class="reply-edit">
                                                    <div class="reply">
                                                        <a
                                                            class="comment-reply-link"
                                                            href="#"
                                                        >Reply</a
                                                        >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="comment-text">
                                                <p class="b2">
                                                    Duis hendrerit velit
                                                    scelerisque felis
                                                    tempus, id porta libero
                                                    venenatis. Nulla
                                                    facilisi. Phasellus
                                                    viverra magna commodo
                                                    dui lacinia tempus.
                                                    Donec malesuada nunc non
                                                    dui posuere, fringilla
                                                    vestibulum urna mollis.
                                                    Integer condimentum ac
                                                    sapien quis maximus.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- End Single Comment  -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
