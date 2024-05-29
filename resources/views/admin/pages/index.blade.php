@extends('admin.layout.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-xxl-12 col-sm-12">
                <div class="row">
                    <div class="col-xl-6 col-xxl-3 col-sm-6">
                        <div class="widget-stat card">
                            <div class="card-body">
                                <h4 class="card-title">Tổng số học viên</h4>
                                <h3>{{ number_format($totalStudent, 0) }}</h3>
                                <div class="progress mb-2">
                                    <div class="progress-bar progress-animated bg-primary" style="width: 80%"></div>
                                </div>
                                <small>80% Increase in 20 Days</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-xxl-3 col-sm-6">
                        <div class="widget-stat card">
                            <div class="card-body">
                                <h4 class="card-title">Tổng số giảng viên</h4>
                                <h3>{{ number_format($totalInstructor, 0) }}</h3>
                                <div class="progress mb-2">
                                    <div class="progress-bar progress-animated bg-warning" style="width: 50%"></div>
                                </div>
                                <small>50% Increase in 25 Days</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-xxl-3 col-sm-6">
                        <div class="widget-stat card">
                            <div class="card-body">
                                <h4 class="card-title">Tổng số khóa học</h4>
                                <h3>{{ number_format($totalCourse) }}</h3>
                                <div class="progress mb-2">
                                    <div class="progress-bar progress-animated bg-red" style="width: 76%"></div>
                                </div>
                                <small>76% Increase in 20 Days</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-xxl-3 col-sm-6">
                        <div class="widget-stat card">
                            <div class="card-body">
                                <h4 class="card-title">Fees Collection</h4>
                                <h3>₫ {{ number_format($totalMoney, 0) }}</h3>
                                <div class="progress mb-2">
                                    <div class="progress-bar progress-animated bg-success" style="width: 30%"></div>
                                </div>
                                <small>30% Increase in 30 Days</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-xxl-6 col-sm-12">
                <div id="statusCourse"></div>
            </div>
            <div class="col-xl-6 col-xxl-6 col-sm-12">
                <div id="statusInstructor"></div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        google.charts.load('current', {'packages': ['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            @php
                $courses = \App\Models\Course::all();
                $pendingCount = $courses->where('status', 'pending')->count();
                $activeCount = $courses->where('status', 'approved')->count();
                $rejectCount = $courses->where('status', 'rejected')->count();
                $instructors = \App\Models\Instructor::with('user')->get();

                $pendingInstructorCount = 0;
                $activeInstructorCount = 0;
                $rejectInstructorCount = 0;
                foreach ($instructors as $instructor) {
                    if ($instructor->user->status == 'pending') {
                        $pendingInstructorCount++;
                    }
                    else if ($instructor->user->status == 'active') {
                        $activeInstructorCount++;
                    }
                    else {
                        $rejectInstructorCount++;
                        }
                }
            @endphp
            let dataCourse = google.visualization.arrayToDataTable([
                ['Task', 'Course status'],
                ['Hoạt động ', {{ $activeCount }}],
                ['Tứ chối', {{ $rejectCount }}],
                ['Chờ phê duyệt', {{ $pendingCount }}],
            ]);
            let optionsCourse = {
                title: 'Trạng thái các khóa học'
            };
            let chartCourse = new google.visualization.PieChart(document.getElementById('statusCourse'));
            chartCourse.draw(dataCourse, optionsCourse);

            let dataInstructor = google.visualization.arrayToDataTable([
                ['Task', 'Course status'],
                ['Hoạt động ', {{ $activeInstructorCount }}],
                ['Tứ chối', {{ $rejectInstructorCount }}],
                ['Chờ phê duyệt', {{ $pendingInstructorCount }}],
            ]);
            let optionsInstructor = {
                title: 'Trạng thái các giảng viên'
            };
            let chartInstructor = new google.visualization.PieChart(document.getElementById('statusInstructor'));
            chartInstructor.draw(dataInstructor, optionsInstructor);
        }
    </script>
@endsection
