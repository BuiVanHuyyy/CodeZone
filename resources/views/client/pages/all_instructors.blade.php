@extends('client.layout.master')
@section('content')
    <div class="rbt-breadcrumb-default ptb--100 ptb_md--50 ptb_sm--30 bg-gradient-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner text-center">
                        <h2 class="title">Danh sách giảng viên</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rbt-team-area bg-color-extra2 rbt-section-gap">
        <div class="container">
            <div class="row g-5">
                @foreach($instructors as $instructor)
                    <div class="col-lg-3 col-md-6 col-12">
                        <a href="{{ route('instructor.profile', [$instructor->slug]) }}">
                            <div class="rbt-team team-style-default style-three small-layout rbt-hover">
                                <div class="inner">
                                    <div class="thumbnail">
                                        <img src="{{ $instructor->avatarPath() }}" alt="{{ $instructor->name }} avatar"/>
                                    </div>
                                    <div class="content">
                                        <h4 class="title">{{ $instructor->name }}</h4>
                                        <span class="team-form">
                                                <span class="location">{{ number_format($instructor->instructor->reviews->avg('rating'), 1) }}</span>
                                                <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                                <span class="location">{{ number_format($instructor->instructor->reviews->count(), 0) }} đánh giá</span>
                                        </span>
                                        <h6 class="subtitle theme-gradient">{{ $instructor->instructor->current_job }}</h6>
                                        <ul class="rbt-meta">
                                            <li><i class="feather-book"></i>{{ $instructor->instructor->courses->where('status', 'approved')->count() }} Khóa học</li>
                                            <li><i class="feather-users"></i>{{ $instructor->instructor->studentsAmount() }} Học viên</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @include('client.blocks.newsletter')
@endsection
