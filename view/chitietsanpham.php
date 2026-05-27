<?php
global $kq;
?>

<main>
    <div class="container pb-5">
        <div class="product-container p-4 p-md-5">
            <div class="row g-5">
                <div class="col-12 col-md-6">
                    <div class="img-box">
                        <img src="./admin/uploads/<?= $kq[0]['img'] ?>" alt="" />
                    </div>
                </div>

                <div class="col-12 col-md-6 d-flex flex-column justify-content-center">
                    <h1 class="fw-bold text-dark mb-2 text-uppercase"><?= $kq[0]['tensp'] ?></h1>

                    <h2 class="product-price fw-bold mb-4"><?= number_format($kq[0]['gia'], 0, ',', '.') ?> đ</h2>

                    <form action="index.php?act=giohang" method="POST" enctype="multipart/form-data">
                        <div class="mb-4">
                            <label for="" class="fw-bold text-dark mb-2">Số lượng:</label>
                            <input type="number" name="sl" class="form-control input-box" value="1" min="1" max="20"
                                step="1" />
                            <input type="hidden" name="id" value="<?= $kq[0]['id'] ?>">
                            <input type="hidden" name="tensp" value="<?= $kq[0]['tensp'] ?>">
                            <input type="hidden" name="img" value="<?= $kq[0]['img'] ?>">
                            <input type="hidden" name="gia" value="<?= $kq[0]['gia'] ?>">
                        </div>

                        <div class="mt-4">
                            <input type="submit" value="THÊM VÀO GIỎ" name="addtocart"
                                class="btn px-4 py-3 rounded-pill text-light fw-bold"
                                style="background-color: #e57a8c" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>