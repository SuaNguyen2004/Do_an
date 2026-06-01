<div class="auth-body d-flex align-items-center justify-content-center p-3">
    <div class="auth-container w-100 p-3 border border-1">
        <h3 class="auth-title text-uppercase fw-bold text-center fs-3 mb-3">Đăng Ký</h3>

        <form action="#" method="POST">
            <div class="mb-3">
                <label class="form-label fw-bold">Tên đăng nhập: </label>
                <div class="position-relative d-flex align-items-center">
                    <input type="text" name="user" id="user" class="form-control auth-input"
                        placeholder="Nhập tên đăng nhập" />
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Email: </label>
                <div class="input-group-custom">
                    <input type="email" name="email" class="form-control auth-input"
                        placeholder="Nhập địa chỉ email hoặc để trống" />
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Mật khẩu: </label>
                <div class="position-relative d-flex align-items-center">
                    <input type="password" name="pass" id="pass" class="form-control auth-input"
                        placeholder="Nhập mật khẩu" />
                </div>
            </div>

            <!-- <button type="submit"  class="btn btn-success w-100 fw-bold mb-3">
                ĐĂNG KÝ
            </button> -->
            <input type="submit" value="ĐĂNG KÝ" name="dangky" onclick="return validateForm()"
                class="btn btn-success w-100 fw-bold mb-3">

            <div class="text-center auth-footer-text">
                Đã có tài khoản?
                <a href="index.php?act=dangnhap" class="auth-link fw-bold">Đăng nhập tại đây</a>
            </div>
        </form>
    </div>
</div>