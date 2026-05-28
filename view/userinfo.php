<main class="mb-4 pt-5">
    <div class="bg-secondary-subtle p-5">
        <h2 class="mb-4 text-center">THÔNG TIN TÀI KHOẢN CỦA BẠN</h2>
        <?php
        // var_dump($userinfo);
        global $userinfo;
        if (isset($_SESSION['id']) && isset($_SESSION['user'])) {
            ?>
            <form action="index.php?act=updateuserinfo" method="post">
                <div class="mb-3">
                    <label for="" class="form-label fw-bold mb-2">Họ tên của bạn: </label>
                    <input type="text" name="name" class="form-control" value="<?= $userinfo[0]['name'] ?>" /><br />
                </div>
                <div class="mb-3">
                    <label for="" class="form-label fw-bold mb-2">Địa chỉ của bạn: </label>
                    <input type="text" name="address" class="form-control" value="<?= $userinfo[0]['address'] ?>" /><br />
                </div>
                <div class="mb-3">
                    <label for="" class="form-label fw-bold mb-2">Email của bạn: </label>
                    <input type="email" name="email" class="form-control" value="<?= $userinfo[0]['email'] ?>" /><br />
                </div>
                <div class="mb-2">
                    <label for="" class="form-label fw-bold mb-2">Số điện thoại của bạn: </label>
                    <input type="text" name="tel" class="form-control" value="<?= $userinfo[0]['tel'] ?>" /><br />
                </div>

                <input type="submit" value="Cập nhật" name="capnhat" class="btn btn-info mt-3 fw-bold text-uppercase" />
            </form>
            <?php
        }
        ?>
    </div>
</main>