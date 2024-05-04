@extends('admin.layout.master')

@section('content')
    <div class="container-fluid">

        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Chi tiết bài blog</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-3 col-xxl-4 col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <img class="img-fluid" src="{{ '/client_assets/images/blog/' . $blog->thumbnail ?? asset('client_assets/images/avatar/default_course_thumbnail.png') }}" alt="Course thumbnail">
                            <div class="card-body">
                                <h4 class="mb-0 text-center">{{ $blog->title }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title">Tổng quan</h2>
                            </div>
                            <div class="card-body pb-0">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                        <strong>Trạng thái</strong>
                                        @php
                                        if ($blog->status === 'pending') {
                                            $color = 'primary';
                                            $status = 'Chờ xác thực';
                                        } elseif ($blog->status === 'approved') {
                                            $color = 'success';
                                            $status = 'Xác thực';
                                        } else {
                                            $color = 'danger';
                                            $status = 'Từ chối';
                                        }
                                        @endphp
                                        <span class="mb-0 badge badge-rounded badge-{{ $color }}">{{ $status }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-xxl-8 col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-primary">Nội dung bài blog</h4>
                        {!! $blog->content !!}
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.course-detail-content ul .has-submenu').on('click',function(e) {
                e.stopPropagation();
                $(this).find('ul').slideToggle();
                $(this).find('.fa-caret-down').toggleClass('rotated');
            });
        });
    </script>
@endsection

