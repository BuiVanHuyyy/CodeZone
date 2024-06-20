<?php

    namespace App\Http\Controllers\Client;

    use App\Http\Controllers\Controller;
    use App\Models\Course;
    use App\Models\CourseCategory;
    use App\Models\Lesson;
    use App\Models\Subject;
    use Illuminate\Contracts\Foundation\Application;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Contracts\View\View;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Http\Request;
    use Illuminate\Http\UploadedFile;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Crypt;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Str;

    class CourseController extends Controller
    {
        /**
         * Display a listing of the resource.
         */
        public function index(): Application|Factory|View|\Illuminate\Foundation\Application
        {
            $courses = Course::with(['reviews', 'category', 'students', 'subjects', 'author', 'author.user'])->where('status', 'approved')->get();
            $categories = CourseCategory::with(['courses'])->get();
            return view('client.pages.all_courses', compact('courses', 'categories'));
        }

        /**
         * Display the specified resource.
         */
        public function show(string $slug): View|\Illuminate\Foundation\Application|Factory|Application
        {
            $course = Course::with('reviews')->where('slug', $slug)->first();
            if (!$course) {
                return view('client.pages.404');
            }
            //Check if the course is bought by the student
            $isBought = Auth::check() && (
                    Auth::user()->isInstructor() && $course->author->id === Auth::user()->instructor->id ||
                    Auth::user()->isAdmin() ||
                    $course->students->where('status', 'paid')->contains('student_id', Auth::user()->student->id)
                );
            return view('client.pages.course_detail', compact('course', 'isBought'));
        }
        /**
         * Store a newly created resource in storage.
         */
        public function store(Request $request): RedirectResponse
        {
            DB::beginTransaction();
            try {
                $course = new Course();
                $course->id = Str::uuid();
                $course->title = $request->course_title;
                $slug = Str::slug($request->course_title);
                //check if slug exists
                if (Course::where('slug', $slug)->exists()) {
                    $slug = $slug . '-' . Str::random(4);
                }
                $course->slug = $slug;
                $course->price = $request->price;
                $course->description = $request->description;
                $course->course_category_id = $request->category;
                $course->status = 'pending';
                $course->instructor_id = Auth::user()->instructor->id;
                if ($request->hasFile('thumbnail')) {
                    $file = $request->file('thumbnail');
                    $fileName = $this->saveImageToSystem($file);
                    $url = '/client_assets/images/tmp/' . $fileName;
                    $file->move(public_path('client_assets/images/tmp/'), $fileName);
                    $course->thumbnail = $url;
                }
                $course->save();
                foreach ($request->subjects as $key => $item) {
                    $subject = new Subject();
                    $subject->id = Str::uuid();
                    $subject->title = $item['name'];
                    $subject->slug = Str::slug($item['name']);
                    $subject->order = $key;
                    $subject->course_id = $course->id;
                    $subject->save();
                    foreach ($item['lessons'] as $k => $value) {
                        $lesson = new Lesson();
                        $lesson->id = Str::uuid();
                        $lesson->title = $value['name'];
                        $lesson->slug = Str::slug($value['name']);
                        $lesson->content = $value['content'];
                        $lesson->video = $value['video'] ?? null;
                        $lesson->resource = $value['resource'] ?? null;
                        if (isset($value['is_preview'])) {
                            $is_preview = true;
                        } else {
                            $is_preview = false;
                        }
                        $lesson->is_preview = $is_preview;
                        $lesson->subject_id = $subject->id;
                        $lesson->order = $k;
                        $lesson->save();
                    }
                }
                DB::commit();
                return redirect()->back()->with('msg', 'Khóa học của bạn đã được gửi đi, vui lòng chờ xác nhận')->with('i', 'success');
            } catch (\Exception $e) {
                DB::rollBack();
                dd($e->getMessage());
                return redirect()->back()->with('msg', 'Tạo khóa học thất bại')->with('i', 'error');
            }
        }

        private function saveImageToSystem(UploadedFile $file): string
        {
            $originName = $file->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            return $fileName . '_' . uniqid() . '.' . $extension;
        }

        /**
         * Show the form for creating a new resource.
         */
        public function create(): Factory|\Illuminate\Foundation\Application|View|Application
        {
            return view('client.pages.instructors.pages.create_course');
        }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy(int|string $id): RedirectResponse
        {
            try {
                $course = Course::with('subjects')->where('id', Crypt::decrypt($id))->first();

                foreach ($course->subjects as $subject) {
                    foreach ($subject->lessons as $lesson) {
                        $lesson->forceDelete();
                    }
                    $subject->forceDelete();
                }
                if ($course->thumbnail || file_exists(public_path($course->thumbnail))) {
                    unlink(public_path($course->thumbnail));
                }
                $course->forceDelete();
                return redirect()->back()->with('message', 'Xóa khóa học thành công')->with('icon', 'success');
            } catch (\Exception $e) {
                return redirect()->back()->with('message', 'Xóa khóa học thất bại')->with('icon', 'error');
            }
        }
    }
