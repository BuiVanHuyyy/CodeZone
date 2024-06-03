<?php

    namespace App\Http\Controllers\Auth;

    use App\Http\Controllers\Controller;
    use App\Http\Requests\Auth\RegisterRequest;
    use App\Models\Student;
    use App\Models\User;
    use Illuminate\Auth\Events\Registered;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Str;
    use Illuminate\View\View;

    class RegisteredUserController extends Controller
    {
        /**
         * Display the registration view.
         */
        public function create(): View
        {
            return view('client.pages.register');
        }

        /**
         * Handle an incoming registration request.
         *
         * @throws \Illuminate\Validation\ValidationException
         */
        public function store(RegisterRequest $request): RedirectResponse
        {
            DB::beginTransaction();
            try {
                $id = Str::uuid();
                $user = new User();
                $user->id = $id->toString();
                $user->name = $request->name;
                $user->slug = Str::slug($request->name);
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                $user->role = 'student';
                $user->status = 'active';
                $user->save();

                $student = new Student();
                $student->id = Str::uuid()->toString();
                $student->user_id = $user->id;
                $student->save();

                DB::commit();
                Auth::login($user);
                event(new Registered($user));
                return redirect()->route('client.student.profile');
            } catch (\Exception $e) {
                DB::rollBack();
                session()->put([
                    'message' => $e->getMessage(),
                    'icon' => 'error'
                ]);
                return redirect()->back();
            }
        }
    }
