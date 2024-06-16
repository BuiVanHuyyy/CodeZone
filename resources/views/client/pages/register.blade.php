@extends('client.layout.master')

@section('content')
    <div class="row py-5" style="width: 100%">
        <div class="col-lg-6">
            <div class="rbt-contact-form contact-form-style-1 max-width-auto">
            <h3 class="title">Đăng ký</h3>
            <form method="POST" action="{{ route('register') }}" class="max-width-auto">
                @csrf
                <div class="form-group">
                    <x-input-label for="name" :value="__('Tên')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" autofocus autocomplete="name" />
                    @error('name')
                        <span class="mt-2 text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <x-input-label for="email" :value="__('Địa chỉ email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')" autocomplete="username" />
                    @error('email')
                        <p class="mt-2 text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <x-input-label for="password" :value="__('Mật khẩu')" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" autocomplete="new-password" />
                    @error('password')
                        <p class="mt-2 text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" autocomplete="new-password" />
                    @error('password_confirmation')
                        <p class="mt-2 text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="d-flex justify-content-between my-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                        {{ __('Bạn đã có tài khoản ?') }}
                    </a>
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('client.become_instructor') }}">
                        {{ __('Đăng ký trở thành giảng viên ?') }}
                    </a>
                </div>
                <div class="form-submit-group">
                    <button type="submit" class="rbt-btn btn-md btn-gradient hover-icon-reverse w-100">
                        <span class="icon-reverse-wrapper">
                            <span class="btn-text">Đăng ký</span>
                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                        </span>
                    </button>
                </div>

            </form>
        </div>
        </div>
        <div class="col-lg-6">
            <img style="border-radius: 20px; width: 100%" src="{{ asset('client_assets/images/bg/sign_up.jpg') }}" alt=""/>
        </div>
    </div>
@endsection
