<div class="auth-body d-flex align-items-center justify-content-center p-3">
    <div class="auth-container w-100 p-3 border border-1">
        <h3 class="auth-title text-uppercase fw-bold text-center fs-3 mb-3">Đăng Nhập</h3>
        <?php
        if (isset($txt) && $txt != "") {
            echo '<font color = "red">' . $txt . '</font>';
        }
        ?>
        <form action="index.php?act=dangnhap" method="POST">
            <div class="mb-3">
                <label class="form-label fw-bold">Tên đăng nhập: </label>
                <div class="position-relative d-flex align-items-center">
                    <input type="text" class="form-control auth-input" placeholder="Nhập tên đăng nhập" name="user"
                        required />
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Mật khẩu: </label>
                <div class="position-relative d-flex align-items-center">
                    <input type="password" class="form-control auth-input" placeholder="Nhập mật khẩu" name="pass"
                        required />
                </div>
            </div>


            <input type="submit" value="ĐĂNG NHẬP" name="dangnhap" class="btn btn-success w-100 fw-bold mb-3">

            <div class="text-center">
                Bạn chưa có tài khoản?
                <a href="index.php?act=dangky" class="auth-link fw-bold">Đăng ký ngay</a>
            </div>
            <div class="text-center mt-3">
                <a href="index.php" class="auth-link fw-bold">Quay lại trang chủ</a>
            </div>
        </form>
    </div>
</div>