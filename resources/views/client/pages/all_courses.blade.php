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
                        <div class="col-lg-12">
                            <div class="title-wrapper">
                                <h1 class="title mb--0">Tất cả các khóa học</h1>
                                <a href="#" class="rbt-badge-2">
                                    <div class="image">🎉</div>
                                    {{ $courses->count() }} Khóa học
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Banner Content Top  -->
            <!-- Start Course Top  -->
            <div class="rbt-course-top-wrapper mt--40">
                <div class="container">
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-12">
                            <div class="rbt-sorting-list d-flex flex-wrap align-items-center justify-content-start justify-content-lg-end">
                                <div class="rbt-short-item">
                                    <form action="#" class="rbt-search-style me-0">
                                        <input type="text" placeholder="Tìm kiếm khóa học.."/>
                                        <button type="submit" class="rbt-search-btn rbt-round-btn">
                                            <i class="feather-search"></i>
                                        </button>
                                    </form>
                                </div>

                                <div class="rbt-short-item">
                                    <div class="view-more-btn text-start text-sm-end">
                                        <button class="discover-filter-button discover-filter-activation rbt-btn btn-white btn-md radius-round">
                                            Filter<i class="feather-filter"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Start Filter Toggle  -->
                    <div class="default-exp-wrapper default-exp-expand">
                        <div class="filter-inner">
                            <div class="filter-select-option">
                                <div class="filter-select rbt-modern-select">
                                        <span class="select-label d-block">Short By</span>
                                    <select>
                                        <option>Default</option>
                                        <option>Latest</option>
                                        <option>Popularity</option>
                                        <option>Trending</option>
                                        <option>Price: low to high</option>
                                        <option>Price: high to low</option>
                                    </select>
                                </div>
                            </div>

                            <div class="filter-select-option">
                                <div
                                    class="filter-select rbt-modern-select"
                                >
                                        <span class="select-label d-block"
                                        >Short By Author</span
                                        >
                                    <select
                                        data-live-search="true"
                                        title="Select Author"
                                        multiple
                                        data-size="7"
                                        data-actions-box="true"
                                        data-selected-text-format="count > 2"
                                    >
                                        <option data-subtext="Experts">
                                            Janin Afsana
                                        </option>
                                        <option data-subtext="Experts">
                                            Joe Biden
                                        </option>
                                        <option data-subtext="Experts">
                                            Fatima Asrafy
                                        </option>
                                        <option data-subtext="Experts">
                                            Aysha Baby
                                        </option>
                                        <option data-subtext="Experts">
                                            Mohamad Ali
                                        </option>
                                        <option data-subtext="Experts">
                                            Jone Li
                                        </option>
                                        <option data-subtext="Experts">
                                            Alberd Roce
                                        </option>
                                        <option data-subtext="Experts">
                                            Zeliski Noor
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="filter-select-option">
                                <div
                                    class="filter-select rbt-modern-select"
                                >
                                        <span class="select-label d-block"
                                        >Short By Offer</span
                                        >
                                    <select>
                                        <option>Free</option>
                                        <option>Paid</option>
                                        <option>Premium</option>
                                    </select>
                                </div>
                            </div>

                            <div class="filter-select-option">
                                <div
                                    class="filter-select rbt-modern-select"
                                >
                                        <span class="select-label d-block"
                                        >Short By Category</span
                                        >
                                    <select data-live-search="true">
                                        <option>Web Design</option>
                                        <option>Graphic</option>
                                        <option>App Development</option>
                                        <option>Figma Design</option>
                                    </select>
                                </div>
                            </div>

                            <div class="filter-select-option">
                                <div class="filter-select">
                                        <span class="select-label d-block"
                                        >Price Range</span
                                        >

                                    <div
                                        class="price_filter s-filter clear"
                                    >
                                        <form action="#" method="GET">
                                            <div id="slider-range"></div>
                                            <div
                                                class="slider__range--output"
                                            >
                                                <div
                                                    class="price__output--wrap"
                                                >
                                                    <div
                                                        class="price--output"
                                                    >
                                                            <span>Price :</span
                                                            ><input
                                                            type="text"
                                                            id="amount"
                                                        />
                                                    </div>
                                                    <div
                                                        class="price--filter"
                                                    >
                                                        <a
                                                            class="rbt-btn btn-gradient btn-sm"
                                                            href="#"
                                                        >Filter</a
                                                        >
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Filter Toggle  -->

                    <div class="row mt--60">
                        <div class="col-lg-12">
                            <div class="rbt-portfolio-filter filter-button-default messonry-button text-start justify-content-start">
                                <button data-filter="*" class="is-checked">
                                        <span class="filter-text">Tất cả</span><span class="course-number">{{ $courses->count() }}</span>
                                </button>
                                @foreach($categories as $category)
                                    <button data-filter=".{{ $category->slug }}">
                                            <span class="filter-text">{{ $category->title }}</span
                                            ><span class="course-number">{{ $category->courses->where('status', 'approved')->count() }}</span>
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Course Top  -->
        </div>
    </div>

    <div class="rbt-section-overlayping-top rbt-section-gapBottom masonary-wrapper-activation">
        <div class="container">
            <!-- Start Card Area -->
            <div class="row row--15">
                <div class="col-lg-12">
                    <div class="mesonry-list grid-metro2">
                        <div class="resizer"></div>
                        @foreach($courses as $course)
                            <div class="maso-item {{ $course->category->slug }}">
                            <div class="rbt-card variation-01 rbt-hover card-list-2">
                                <div class="rbt-card-img">
                                    <a href="">
                                        <img src="{{ asset($course->thumbnail) }}" alt="Card image"/>
                                    </a>
                                </div>
                                <div class="rbt-card-body">
                                    <div class="rbt-card-top">
                                        <div class="rbt-review">
                                            <div class="rating">
                                                @for($i = 1; $i <= ceil($course->rating); $i++)
                                                    <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                                @endfor
                                                @for($i = 1; $i <= 5 - ceil($course->rating); $i++)
                                                    <i class="fa-solid fa-star" style="color: #0F0F0F;"></i>
                                                @endfor
                                            </div>
                                            <span class="rating-count">({{ $course->review_amount }} Reviews)</span>
                                        </div>
                                        <div class="rbt-bookmark-btn">
                                            <a class="rbt-round-btn" title="Bookmark" href="#">
                                                <i class="feather-bookmark"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <h4 class="rbt-card-title">
                                        <a href="{{ route('client.course_detail', [$course->slug]) }}">{{ $course->title }}</a>
                                    </h4>

                                    <ul class="rbt-meta">
                                        <li>
                                            <i class="feather-book"></i>{{ $course->subjects->count() }} bài giảng
                                        </li>
                                        <li>
                                            <i class="feather-users"></i>{{ $course->enrollments->count() }} hoc viên
                                        </li>
                                    </ul>
                                    <div class="rbt-author-meta mb--10">
                                        <div class="rbt-avater">
                                            <a href="#">
                                                <img src="{{ $course->author->avatar }}" alt="Sophia Jaymes"/>
                                            </a>
                                        </div>
                                        <div class="rbt-author-info">
                                            Bỡi
                                            <a href="">{{ $course->author->name }}</a> ngành {{ $course->category->title }}
                                        </div>
                                    </div>
                                    <div class="rbt-card-bottom">
                                        <div class="rbt-price">
                                            <span class="current-price">₫ {{ number_format($course->price, 0) }}</span>
{{--                                            <span class="off-price">$120</span>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- End Card Area -->
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
