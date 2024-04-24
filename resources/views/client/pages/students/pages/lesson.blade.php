@extends('client.layout.master')
@section('content')
    <div class="rbt-lesson-area bg-color-white">
        <div class="rbt-lesson-content-wrapper">
            @include('client.pages.students.blocks.workspace_sidebar')
            @php
            $lesson = \App\Models\Lesion::where('slug', $lesson_slug)->first();
            @endphp
            <div class="rbt-lesson-rightsidebar overflow-hidden lesson-video">
                <div class="lesson-top-bar">
                    <div class="lesson-top-left">
                        <div class="rbt-lesson-toggle">
                            <button class="lesson-toggle-active btn-round-white-opacity" title="Toggle Sidebar"><i
                                    class="feather-arrow-left"></i></button>
                        </div>
                        <h5>The Complete Histudy 2023: From Zero to Expert!</h5>
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
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/9t1IsxTeyHQ?si=85PBl0KapuqJ0o-2" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
{{--                            {!! $lesson->video !!}--}}
                        </div>
                    @endif

                    <div class="content">
                        <div class="section-title">
                            <h4>Nội dung khóa học</h4>
                            @if($lesson->resource != null)
                                <p>Source code của bài giảng <a target="_blank" href="{{ $lesson->resource }}">đây</a></p>
                            @endif
                            <p>{{ $lesson->content }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-color-extra2 ptb--15 overflow-hidden">
                    <div class="rbt-button-group">

                        <a class="rbt-btn icon-hover icon-hover-left btn-md bg-primary-opacity" href="#">
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
    </div>
@endsection
