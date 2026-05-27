<?php
// var_dump($getspbydm);
if (isset($getspbydm) && count($getspbydm) > 0) {
    ?>
    <!-- ! home -->
    <div class="container pb-5 bg-light" style="margin-top: 80px">
        <div class="text-center my-5">
            <h2 class="fw-bold main-title text-uppercase">Danh mục: <?= $getspbydm[0]['tendm'] ?></h2>
        </div>

        <div class="mb-5">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 text-center">
                <?php
                // var_dump($allsp);
                foreach ($getspbydm as $sp) {
                    echo '
            <!-- ! sản phẩm 1 -->
                <div class="col">
                    <div class="card h-100 product-card">
                        <a href="index.php?act=chitietsanpham&id=' . $sp['id'] . '" class="product-img-box">
                            <img src="./admin/uploads/' . $sp['img'] . '" alt="" />
                        </a>

                        <div class="card-body d-flex flex-column pt-0">
                            <a href="index.php?act=chitietsanpham&id=' . $sp['id'] . '" class="text-decoration-none">
                                <h5 class="product-name fw-bold">' . $sp['tensp'] . '</h5>
                            </a>
                            <p class="product-price fw-bold">' . number_format($sp['gia'], 0, ',', '.') . ' đ</p>
                            <form action="index.php?act=giohang" method="post">
                                <input type="hidden" name="id" value="' . $sp['id'] . '">
                                <input type="hidden" name="tensp" value="' . $sp['tensp'] . '">
                                <input type="hidden" name="img" value="' . $sp['img'] . '">
                                <input type="hidden" name="gia" value="' . $sp['gia'] . '">
                                <input type="submit" value="Thêm vào giỏ" name="addtocart"
                                    class="rounded-pill mt-auto d-flex justify-content-between align-items-center w-100 fw-bold btn-add-cart p-2">
                            </form>
                        </div>
                    </div>
                </div>
            ';
                }
                ?>
            </div>
        </div>
    </div>
    <!-- ! end home -->
    <?php
}
// var_dump($allsp);
elseif (isset($allsp) && count($allsp) > 0) {
    ?>
    <!-- ! home -->
    <div class="container pb-5 bg-light" style="margin-top: 80px">
        <div class="text-center my-5">
            <h2 class="fw-bold main-title text-uppercase">Tất cả sản phẩm</h2>
        </div>

        <div class="mb-5">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 text-center">
                <?php
                // var_dump($allsp);
                foreach ($allsp as $sp) {
                    echo '
            <!-- ! sản phẩm 1 -->
                <div class="col">
                    <div class="card h-100 product-card">
                        <a href="index.php?act=chitietsanpham&id=' . $sp['id'] . '" class="product-img-box">
                            <img src="./admin/uploads/' . $sp['img'] . '" alt="" />
                        </a>

                        <div class="card-body d-flex flex-column pt-0">
                            <a href="index.php?act=chitietsanpham&id=' . $sp['id'] . '" class="text-decoration-none">
                                <h5 class="product-name fw-bold">' . $sp['tensp'] . '</h5>
                            </a>
                            <p class="product-price fw-bold">' . number_format($sp['gia'], 0, ',', '.') . ' đ</p>
                            <form action="index.php?act=giohang" method="post">
                                <input type="hidden" name="id" value="' . $sp['id'] . '">
                                <input type="hidden" name="tensp" value="' . $sp['tensp'] . '">
                                <input type="hidden" name="img" value="' . $sp['img'] . '">
                                <input type="hidden" name="gia" value="' . $sp['gia'] . '">
                                <input type="submit" value="Thêm vào giỏ" name="addtocart"
                                    class="rounded-pill mt-auto d-flex justify-content-between align-items-center w-100 fw-bold btn-add-cart p-2">
                            </form>
                        </div>
                    </div>
                </div>
            ';
                }

                ?>
            </div>
        </div>
    </div>
    <!-- ! end home -->
<?php } ?>