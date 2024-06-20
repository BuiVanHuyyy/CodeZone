<?php

    namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;
    use App\Models\Course;
    use App\Models\Enrollment;
    use App\Models\Instructor;
    use App\Models\Student;
    use Carbon\Carbon;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Contracts\View\View;
    use Illuminate\Foundation\Application;
    use Illuminate\Support\Facades\DB;

    class HandleViewController extends Controller
    {
        public function dashboard(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
        {
            // Tạo thời gian hiện tại và thời gian 6 tháng trước
            $currentDate = Carbon::now();
            $sixMonthsAgo = $currentDate->copy()->subMonths(5)->startOfMonth();

            $monthNames = ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T11', 'T12'];
            $currentYear = Carbon::now()->year;
            $labels = [];
            $dataStudent = [];

            // Truy vấn số lượng học sinh đăng ký mới trong 6 tháng gần nhất
            $studentsPerMonth = Student::select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('YEAR(created_at) as year'),
                DB::raw('COUNT(*) as total')
            )->where('created_at', '>=', $sixMonthsAgo)
                ->groupBy('year', 'month')
                ->orderBy('year', 'asc')
                ->orderBy('month', 'asc')
                ->get()
                ->keyBy(function ($item) {
                    return $item->year . '-' . str_pad($item->month, 2, '0', STR_PAD_LEFT);
                });


            // Chuẩn bị dữ liệu cho 6 tháng gần nhất
            for ($i = 5; $i >= 0; $i--) {
                $date = $currentDate->copy()->subMonths($i);
                $month = $date->format('m');
                $year = $date->format('Y');
                $key = $year . '-' . $month;

                $label = $monthNames[$date->month - 1];
                if ($year < $currentYear) {
                    $label .= '/' . $year;
                }

                $labels[] = $label;
                $dataStudent[] = isset($studentsPerMonth[$key]) ? $studentsPerMonth[$key]->total : 0;
            }
            $studentMaxValue = 0;
            if (!empty($dataStudent)) {
                $maxInData = max($dataStudent);
                $studentMaxValue = ceil($maxInData / 10) * 10;
            }

            $totalStudent = Student::count();
            $totalInstructor = Instructor::count();
            $totalCourse = Course::where('status', 'approved')->count();
            $totalMoney = Enrollment::where('status', 'paid')->sum('price');
            return view('admin.pages.index', compact('totalStudent', 'totalInstructor', 'totalCourse', 'totalMoney', 'labels', 'dataStudent', 'studentMaxValue'));
        }
    }
