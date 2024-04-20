<div class="modal fade" id="signUpModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="row position-relative">
                <button type="button" class="btn-close position-absolute" data-bs-dismiss="modal" aria-label="Close"
                        style="top: 10px; right: 10px; z-index: 1"></button>
                <div class="col-lg-6">
                    <div class="rbt-contact-form contact-form-style-1 max-width-auto">
                        <h3 class="title">Đăng ký</h3>
                        <form class="max-width-auto">
                            <div class="form-group">
                                <input name="register-email" type="text"/>
                                <label>Họ tên *</label>
                                <span class="focus-border"></span>
                            </div>
                            <div class="form-group">
                                <input name="register-email" type="text"/>
                                <label>Địa chỉ email *</label>
                                <span class="focus-border"></span>
                            </div>

                            <div class="form-group">
                                <input name="register_password" type="password"/>
                                <label>Mật khẩu *</label>
                                <span class="focus-border"></span>
                            </div>

                            <div class="form-group">
                                <input name="register_conpassword" type="password"/>
                                <label>Xác nhận mật khẩu *</label>
                                <span class="focus-border"></span>
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
                    <img src="{{ asset('client_assets/images/huy/sign_up.jpg') }}" width="100%" alt=""/>
                </div>
            </div>
        </div>
    </div>
</div>
