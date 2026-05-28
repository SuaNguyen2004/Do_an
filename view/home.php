<!-- ! home -->
<div class="container pb-5 bg-light" style="margin-top: 80px">
    <div class="text-center my-5">
        <h2 class="fw-bold main-title">DANH SÁCH SẢN PHẨM</h2>
    </div>

    <!-- ? danh mục 1 -->
    <?php
    // var_dump($dsdm);
    $limit_danhmuc = 2;

    if (isset($dsdm) && count($dsdm) > 0) {

        // Tính toán số lượng vòng lặp sẽ chạy (Tránh trường hợp DB có ít danh mục hơn số LIMIT)
        $total_loop = min($limit_danhmuc, count($dsdm));

        // VÒNG LẶP CHA: Chạy tự động từ danh mục đầu tiên (i = 0) đến số LIMIT
        for ($i = 0; $i < $total_loop; $i++) {

            $iddm = $dsdm[$i]['id'];
            $tendm = $dsdm[$i]['tendm'];

            // Tự động gọi hàm lấy sản phẩm của danh mục đang chạy hiện tại
            $dssp_theo_dm = getspbydm($iddm);
            ?>
            <div class="mb-5">
                <div>
                    <h3 class="category-title text-uppercase fw-bold"><?= $tendm ?></h3>
                    <div class="border-bottom border-2 mb-4"></div>
                </div>


                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 text-center">
                    <?php
                    // VÒNG LẶP CON: Foreach hiển thị toàn bộ sản phẩm của danh mục đó
                    if (count($dssp_theo_dm) > 0) {
                        foreach ($dssp_theo_dm as $sp) {
                            ?>

                            <div class="col">
                                <!-- ! sản phẩm 1 -->
                                <div class="card h-100 product-card sphover">
                                    <a href="index.php?act=chitietsanpham&id=<?= $sp['id'] ?>" class="product-img-box">
                                        <img src="./admin/uploads/<?= $sp['img'] ?>" />
                                    </a>

                                    <div class="card-body d-flex flex-column pt-0">
                                        <a href="index.php?act=chitietsanpham&id=<?= $sp['id'] ?>" class="text-decoration-none">
                                            <h5 class="product-name fw-bold text-uppercase"><?= $sp['tensp'] ?></h5>
                                        </a>
                                        <p class="product-price fw-bold"><?= number_format($sp['gia'], 0, ',', '.') ?> đ</p>
                                        <form action="index.php?act=giohang" method="post">
                                            <input type="hidden" name="id" value="<?= $sp['id'] ?>">
                                            <input type="hidden" name="tensp" value="<?= $sp['tensp'] ?>">
                                            <input type="hidden" name="img" value="<?= $sp['img'] ?>">
                                            <input type="hidden" name="gia" value="<?= $sp['gia'] ?>">
                                            <input type="submit" value="Thêm vào giỏ" name="addtocart"
                                                class="rounded-pill mt-auto d-flex justify-content-between align-items-center w-100 fw-bold btn-add-cart p-2">
                                        </form>
                                    </div>
                                </div>
                                <!-- kết sp 1 -->
                            </div>
                            <?php
                        }
                    } else {
                        echo '<p class="ps-3">Danh mục này hiện chưa có sản phẩm nào.</p>';
                    }
                    ?>
                </div>
            </div>
            <?php
        } // kết for dm
    } else {
        echo '<p class="ps-3">Chưa có danh mục nào trong hệ thống.</p>';
    }
    ?>
</div>

<!-- ! spdb -->
<?php
if (isset($spdb)) {
    ?>
    <div class="special-product-clean my-5 p-4 bg-white border rounded-3">
        <h2 class="text-center text-uppercase fw-bold">Sản phẩm đặc biệt</h2>
        <div class="row align-items-center g-4">
            <div class="col-md-6 text-center">
                <div class="special-clean-img">
                    <img src="./admin/uploads/<?= $spdb[0]['img'] ?>" alt="" class="img-fluid" />
                </div>
            </div>

            <div class="col-md-5 text-start ps-md-4 me-3">
                <h2 class="fw-bold mb-3"><?= $spdb[0]['tensp'] ?></h2>

                <p class="special-clean-desc text-secondary mb-4">
                    <?= $spdb[0]['mota'] ?>
                </p>

                <a href="index.php?act=chitietsanpham&id=<?= $spdb[0]['id'] ?>"
                    class="btn btn-warning fw-bold px-4 py-2 rounded-pill text-dark text-decoration-none">
                    Xem chi tiết sản phẩm
                </a>
            </div>
        </div>
    </div>
<?php } ?>

<!-- ! end home -->