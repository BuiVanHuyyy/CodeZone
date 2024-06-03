<?php

    namespace App\Http\Controllers\Client;

    use App\Http\Controllers\Controller;
    use App\Http\Requests\StoreInstructorRequest;
    use App\Http\Requests\UpdatePasswordRequest;
    use App\Models\Instructor;
    use App\Models\User;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Contracts\View\View;
    use Illuminate\Foundation\Application;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Http\Request;
    use Illuminate\Http\UploadedFile;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Str;

    class InstructorController extends Controller
    {
        /**
         * Display a listing of the resource.
         */
        public function index(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
        {
            return view('client.pages.all_instructors');
        }

        /**
         * Show the form for creating a new resource.
         */
        public function create(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
        {
            return view('client.pages.become_instructor');
        }

        /**
         * Store a newly created resource in storage.
         */
        public function store(StoreInstructorRequest $request): RedirectResponse
        {
            DB::beginTransaction();
            try {
                $user = new User();
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = Hash::make('my-secret-password');
                $user->role = 'instructor';
                $user->save();
                $instructor = new Instructor();
                $instructor->user_id = $user->id;
                $instructor->name = $request->name;
                $instructor->slug = Str::slug($request->name);
                $instructor->phone_number = $request->phone;
                $instructor->bio = $request->bio;
                $instructor->cv_upload = $this->saveCvToSystem($request->cv);
                $instructor->save();
                DB::commit();
                return redirect()->back()->with('msg', 'Chúng tôi đã nhận được yều cầu của bạn chúng tôi sẽ phản hồi sớm nhất có thể')->with('i', 'success');
            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->back()->with('msg', 'Register failed')->with('i', 'error');
            }
        }

        private function saveCvToSystem(UploadedFile $file): string
        {
            $originName = $file->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $fileName = $fileName . '_' . uniqid() . '.' . $extension;
            $file->move(public_path('client_assets/cv_instructor'), $fileName);
            return '/client_assets/cv_instructor/' . $fileName;
        }

        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request, Instructor $instructor): RedirectResponse
        {
            DB::beginTransaction();
            try {
                $user = Auth::user();
                if ($request->name != Auth::user()->instructors->name) {
                    $instructor->name = $request->name;
                    $user->name = $request->name;
                }
                if (!is_null($request->nickname) || $request->nickname != Auth::user()->instructors->nickname) {
                    $instructor->nickname = $request->nickname;
                }
                if (!is_null($request->phone_number) || $request->phone_number != Auth::user()->instructors->phone_number) {
                    $instructor->phone_number = $request->phone_number;
                }
                if (!is_null($request->dob) || $request->dob != Auth::user()->instructors->dob) {
                    $instructor->dob = $request->dob;
                }
                if (!is_null($request->bio) || $request->bio != Auth::user()->instructors->bio) {
                    $instructor->bio = $request->bio;
                }
                if (!is_null($request->facebook) || $request->facebook != Auth::user()->instructors->facebook) {
                    $instructor->facebook = $request->facebook;
                }
                if (!is_null($request->linkedin) || $request->linkedin != Auth::user()->instructors->linkedin) {
                    $instructor->linkedin = $request->linkedin;
                }
                if (!is_null($request->github) || $request->github != Auth::user()->instructors->github) {
                    $instructor->github = $request->github;
                }
                $instructor->save();
                DB::commit();
                session()->flash('message', 'Cập nhật thông tin thành công!');
                session()->flash('icon', 'success');
            } catch (\Exception $e) {
                DB::rollBack();
                session()->flash('error_msg', 'Lỗi xảy ra! Vui lòng thử lại!');
                session()->flash('icon', 'error');
            }
            return redirect()->back();
        }

        /**
         * Show instructor client profile.
         */
        public function profile(string $slug): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
        {
            $instructor = User::where('slug', $slug)->first();
            if (!$instructor) {
                return view('client.pages.404');
            }
            $instructorRating = $instructor->instructor->reviews->avg('rating');
            //Check if the current instructor is a student of the instructor
            $isStudent = false;
            if(Auth::user()->student) {
                foreach ($instructor->instructor->courses as $course) {
                    if ($course->students->where('status', 'paid')->where('student_id', Auth::id())) {
                        $isStudent = true;
                        break;
                    }
                }
            }
            return view('client.pages.profile', compact('instructor', 'isStudent', 'instructorRating'));
        }

        /**
         * Show the form for editing the specified resource.
         */
        public function edit(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
        {
            return view('client.pages.instructors.pages.edit');
        }

        /**
         * Show instructor dashboard.
         */
        public function dashboard(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
        {
            $totalStudents = 0;
            $totalMoney = 0;
            $instructorCourses = Auth::user()->instructor->courses()->with(['students'])->get();
            foreach ($instructorCourses as $course) {
                $totalStudents += $course->students->where('status', 'paid')->count();
                $totalMoney += $course->students->where('status', 'paid')->sum('price');
            }

            return view('client.pages.instructors.pages.index', compact('totalStudents', 'totalMoney', 'instructorCourses'));
        }

        /**
         * Show instructor courses.
         */
        public function courses(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
        {
            $instructorCourses = Auth::user()->instructor->courses()->with(['reviews', 'subjects', 'students'])->get();
            return view('client.pages.instructors.pages.my_course', compact('instructorCourses'));
        }

        /**
         * Show instructor info.
         */
        public function show(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
        {
            return view('client.pages.instructors.pages.profile');
        }

        /**
         * Show instructor reviews.
         */
        public function reviews(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
        {
            $instructorCourses = Auth::user()->instructor->courses()->with('reviews')->where('status', 'approved')->withCount('reviews')->orderByDesc('reviews_count')->get();
            $instructorReviews = Auth::user()->instructor->reviews()->with('user')->orderByDesc('created_at')->get();
            return view('client.pages.instructors.pages.my_review', compact('instructorCourses', 'instructorReviews'));
        }

        public function resetPassword(UpdatePasswordRequest $request): RedirectResponse
        {
            $user = Auth::user();
            if (!Hash::check($request->old_password, $user->password)) {
                session()->flash('msg', 'Mật khẩu cũ không chính xác!');
                session()->flash('i', 'error');
                return back();
            }
            $user->password = Hash::make($request->password);
            $user->save();

            session()->flash('msg', 'Đổi mật khẩu thành công!');
            session()->flash('i', 'success');
            return back();
        }

    }
