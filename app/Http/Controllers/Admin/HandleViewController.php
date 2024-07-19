<?php

    namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;
    use App\Models\Blog;
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
            $currentDate = Carbon::now();
            $sixMonthsAgo = $currentDate->copy()->subMonths(5)->startOfMonth();
            $monthNames = ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T11', 'T12'];
            $currentYear = $currentDate->year;
            $labels = [];
            $dataStudent = [];
            $dataInstructor = [];
            $dataEnrollment = [];
            $dataCourse = [];
            $data = [];

            //get data for each metric
            $dataTypes = ['Student', 'Instructor', 'Enrollment', 'Course'];
            foreach ($dataTypes as $type) {
                $data[$type] = $this->getMonthlyData($type, $sixMonthsAgo);
            }
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
                $dataStudent[] = $data['Student'][$key]->total ?? 0;
                $dataInstructor[] = $data['Instructor'][$key]->total ?? 0;
                $dataCourse[] = $data['Course'][$key]->total ?? 0;
                $dataEnrollment[] = $data['Enrollment'][$key]->total ?? 0;
            }
            $studentMaxValue = $this->calculateMaxValue($dataStudent);
            $instructorMaxValue = $this->calculateMaxValue($dataInstructor);
            $courseMaxValue = $this->calculateMaxValue($dataCourse);
            $enrollmentMaxValue = $this->calculateMaxValue($dataEnrollment);

            $totalStudent = Student::all();
            $totalInstructor = Instructor::all();
            $totalCourse = Course::all();
            $totalBlog = Blog::all();
            $totalMoney = Enrollment::where('status', 'paid')->sum('price');
            return view('admin.pages.index', compact('totalStudent', 'totalInstructor', 'totalCourse', 'totalMoney', 'totalBlog', 'labels', 'dataStudent', 'studentMaxValue', 'dataInstructor', 'instructorMaxValue', 'dataInstructor', 'dataCourse', 'courseMaxValue', 'dataEnrollment', 'enrollmentMaxValue'));
        }
        private function getMonthlyData(string $model, Carbon $fromDate)
        {
            $modelClass = "App\\Models\\$model";
            $query = $modelClass::select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('YEAR(created_at) as year'),
                DB::raw('COUNT(*) as total')
            )->where('created_at', '>=', $fromDate)
                ->groupBy('year', 'month')
                ->orderBy('year')
                ->orderBy('month');

            if ($model === 'Enrollment') {
                $query->where('status', 'paid');
            }

            return $query->get()->keyBy(function ($item) {
                return $item->year . '-' . str_pad($item->month, 2, '0', STR_PAD_LEFT);
            });
        }
        private function calculateMaxValue(array $data): int
        {
            return !empty($data) ? ceil(max($data) / 10) * 10 : 0;
        }
    }
