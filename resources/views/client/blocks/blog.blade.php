<div id="blog" class="rbt-rbt-blog-area rbt-section-gapTop bg-color-white">
    <div class="container">
        <div class="row mb--55 g-5 align-items-end">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="section-title text-start">
                    <h2 class="title">
                        Các bài
                        <span class="color-primary"> Blogs</span>
                        của chúng tôi
                    </h2>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <div class="load-more-btn text-start text-md-end">
                    <a
                        class="rbt-btn rbt-switch-btn bg-primary-opacity"
                        href="{{ route('client.blogs') }}"
                    >
                        <span data-text="Xem tất cả">Xem tất cả</span>
                    </a>
                </div>
            </div>
        </div>
        <!-- Start Card Area -->
        <div class="row g-5">
            @php
                $blogs = \App\Models\Blog::where('status', 'approved')->orderByDesc('created_at')->take(3)->get();
            @endphp
            @foreach($blogs as $blog)
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="rbt-card variation-02 rbt-hover">
                        <div class="rbt-card-img">
                            <a href="{{ route('client.blog_detail', ['slug' => $blog->slug]) }}">
                                <img style="height: 200px" src="{{ 'client_assets/images/blog/' . $blog->thumbnail }}" alt="Card image"/>
                            </a>
                        </div>
                        <div class="rbt-card-body">
                            <h5 class="rbt-card-title">
                                <a href="{{ route('client.blog_detail', ['slug' => $blog->slug]) }}">{{ $blog->title }}</a>
                            </h5>
                            <p class="rbt-card-text">{{ $blog->summary }}</p>
                            <div class="rbt-card-bottom">
                                <a class="transparent-button" href="{{ route('client.blog_detail', ['slug' => $blog->slug]) }}">Learn More
                                    <i><svg width="17" height="12" xmlns="http://www.w3.org/2000/svg">
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
            @endforeach
        </div>
        <!-- End Card Area -->
    </div>
</div>
