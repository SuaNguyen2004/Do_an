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
                showsp($getspbydm);
                ?>
            </div>
        </div>
    </div>
    <!-- ! end home -->
    <?php
    // AI làm
} elseif (isset($allsp) && count($allsp) > 0 && isset($kyw)) {
    ?>
    <div class="container pb-5 bg-light" style="margin-top: 80px">
        <div class="text-center my-5">
            <h2 class="fw-bold main-title text-uppercase">Kết quả tìm kiếm cho: "<?= $kyw ?>"</h2>
        </div>

        <div class="mb-5">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 text-center">
                <?php
                showsp($allsp);
                ?>
            </div>
        </div>
    </div>

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
                showsp($allsp);
                ?>
            </div>
        </div>
    </div>
    <!-- ! end home -->
<?php } ?>