<div class="rbt-lesson-leftsidebar">
    <div class="rbt-course-feature-inner rbt-search-activation">
        <div class="section-title">
            <h4 class="rbt-title-style-3">Nội dung khóa học</h4>
        </div>

        <div class="lesson-search-wrapper">
            <form action="#" class="rbt-search-style-1">
                <input class="rbt-search-active" type="text" placeholder="Search Lesson">
                <button class="search-btn disabled"><i class="feather-search"></i></button>
            </form>
        </div>

        <hr class="mt--10">
        <div class="rbt-accordion-style rbt-accordion-02 for-right-content accordion">
            <div class="accordion" id="accordionExampleb2">
                @foreach($course->subjects()->orderBy('order')->get() as $i => $subject)
                    <div class="accordion-item card">
                        <h2 class="accordion-header card-header" id="headingTwo{{ $loop->iteration }}">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    aria-expanded="true"
                                    data-bs-target="#collapseTwo{{ $loop->iteration }}"
                                    aria-controls="collapseTwo{{ $loop->iteration }}">
                                {{ $subject->title }} <span
                                    class="rbt-badge-5 ml--10">{{ $subject->lessons->count() }}</span>
                            </button>
                        </h2>
                        <div id="collapseTwo{{ $loop->iteration }}" class="accordion-collapse collapse show"
                             aria-labelledby="headingTwo{{ $loop->iteration }}">
                            <div class="accordion-body card-body">
                                <ul class="rbt-course-main-content liststyle">
                                    @foreach($subject->lessons()->orderBy('order')->get() as $lesson)
                                        <li>
                                            <a href="{{ route('course.index', [$course->slug, $subject->slug, $lesson->slug]) }}">
                                                <div class="course-content-left">
                                                    {!! $lesson->video != null ? '<i class="feather-play-circle"></i>' : '<i class="feather-file-text"></i>' !!}
                                                    <span class="text">{{ $lesson->title }}</span>
                                                </div>
                                                <div class="course-content-right">
                                                    <span class="min-lable">{{ $lesson->duration }}</span>
                                                    <span class="rbt-check"><i
                                                            class="feather-check"></i></span>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
