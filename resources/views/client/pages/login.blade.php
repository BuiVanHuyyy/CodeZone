@extends('client.layout.master')
@section('content')
    <div class="row py-5" style="width: 100%">
        <div class="col-lg-6">
            <div class="rbt-contact-form contact-form-style-1 max-width-auto">
                <h3 class="title">Đăng nhập</h3>
                <form method="post" action="{{ route('login') }}" class="max-width-auto">
                    @csrf
                    <div class="form-group">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')" autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2 error-input" />
                    </div>
                    <div class="form-group">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2 error-input" />
                    </div>
                    <div class="rbt-lost-password my-3">
                        <a class="rbt-btn-link" href="#">Quên mật khẩu ?</a>
                    </div>

                    <div class="form-submit-group">
                        <button type="submit" class="rbt-btn btn-md btn-gradient hover-icon-reverse w-100">
                            <span class="icon-reverse-wrapper">
                                <span class="btn-text">Log In</span>
                                <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                            </span>
                        </button>
                    </div>
                    <div class="social-login">
                        <p>hoặc đăng nhập bằng</p>
                        <div class="choice_list">
                            <a href="{{ route('client.facebook.redirect') }}" class="btn btn-facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="{{ route('client.google.redirect') }}" class="btn btn-google">
                                <i class="fab fa-google"></i>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-6">
            <img style="border-radius: 20px" src="{{ asset('client_assets/images/huy/sign_in.jpg') }}" alt=""/>
        </div>
    </div>
@endsection

@section('cus_js')
    <script>
        let loginRequiredMessage = "{{ session('login_required') }}";
        if (loginRequiredMessage) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: loginRequiredMessage,
            });
        }
    </script>
@endsection
