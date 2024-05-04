@extends('client.layout.master')
@section('content')
    <div class="rbt-page-banner-wrapper">
        <!-- Start Banner BG Image  -->
        <div class="rbt-banner-image"></div>
        <!-- End Banner BG Image  -->
        <div class="rbt-banner-content">
            <!-- Start Banner Content Top  -->
            <div class="rbt-banner-content-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 offset-lg-1">

                            <div class="title-wrapper">
                                <h1 class="title mb--0">Danh sách các bài Blog</h1>
                                <a href="#" class="rbt-badge-2">
                                    <div class="image">🎉</div>
                                    {{ $blogs->count() }} Bài viết
                                </a>
                            </div>

                            <p class="description">Blog that help beginner developers become true unicorns.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Banner Content Top  -->
        </div>
    </div>

    <!-- Start Card Style -->
    <div class="rbt-blog-area rbt-section-overlayping-top rbt-section-gapBottom">
        <div class="container">
            <!-- Start Card Area -->
            <div class="row">
                <div class="col-lg-10 offset-lg-1 mt_dec--30">

                    <div class="col-12 mt--30">
                        <div class="rbt-card variation-02 height-auto rbt-hover">
                            <div class="rbt-card-img">
                                <a href="{{ route('client.blog_detail', ['slug' => 'slug-blog']) }}">
                                    <img src="{{ 'client_assets/images/blog/' . $blogs[0]->thumbnail }}" alt="Card image"/>
                                </a>
                            </div>
                            <div class="rbt-card-body">
                                <h3 class="rbt-card-title">
                                    <a href="{{ route('client.blog_detail', ['slug' => $blogs[0]->slug]) }}">{{ $blogs[0]->title }}</a>
                                </h3>
                                <p class="rbt-card-text">{{ $blogs[0]->summary }}</p>
                                <div class="rbt-card-bottom">
                                    <a class="transparent-button" href="{{ route('client.blog_detail', ['slug' => $blogs[0]->slug]) }}">Đọc thêm
                                        <i>
                                            <svg width="17" height="12" xmlns="http://www.w3.org/2000/svg">
                                                <g stroke="#27374D" fill="none" fill-rule="evenodd">
                                                    <path d="M10.614 0l5.629 5.629-5.63 5.629"/>
                                                    <path stroke-linecap="square" d="M.663 5.572h14.594"/>
                                                </g>
                                            </svg>
                                        </i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach($blogs as $key => $blog)
                        @if($key == 0)
                            @continue
                        @endif
                        <div class="rbt-card card-list variation-02 rbt-hover mt--30">
                            <div class="rbt-card-img">
                                <a href="{{ route('client.blog_detail', ['slug' => $blog->slug]) }}">
                                    <img src="{{ 'client_assets/images/blog/' . $blog->thumbnail }}" alt="Card image"/>
                                </a>
                            </div>
                            <div class="rbt-card-body">
                                <h5 class="rbt-card-title">
                                    <a href="{{ route('client.blog_detail', ['slug' => $blog->slug]) }}">{{ $blog->title }}</a>
                                </h5>
                                <div class="rbt-card-bottom">
                                    <a class="transparent-button" href="{{ route('client.blog_detail', ['slug' => $blog->slug]) }}">Đọc thêm <i
                                        ><svg
                                                width="17"
                                                height="12"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <g
                                                    stroke="#27374D"
                                                    fill="none"
                                                    fill-rule="evenodd"
                                                >
                                                    <path
                                                        d="M10.614 0l5.629 5.629-5.63 5.629"
                                                    />
                                                    <path
                                                        stroke-linecap="square"
                                                        d="M.663 5.572h14.594"
                                                    />
                                                </g></svg></i
                                        ></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="rbt-separator-mid">
        <div class="container">
            <hr class="rbt-separator m-0" />
        </div>
    </div>
@endsection
