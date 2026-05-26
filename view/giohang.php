<div class="container pb-5" style="margin-top: 100px">
    <div class="d-flex align-items-center gap-3 my-4">
        <i class="fs-2 text-warning"></i>
        <h3 class="fw-bold m-0 text-dark">Giỏ hàng của bạn</h3>
    </div>

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="cart-table-container bg-white p-3 shadow-sm">
                <table class="table table-hover align-middle m-0 text-center">
                    <tr class="text-center text-dark fw-bold">
                        <th class="th">STT</th>
                        <th class="th">Tên sản phẩm</th>
                        <th class="th">Hình ảnh</th>
                        <th class="th">Giá</th>
                        <th class="th">Số lượng</th>
                        <th class="th">Thành tiền</th>
                        <th class="th">Hành động</th>
                    </tr>
                    <?php
                    // var_dump($_SESSION['giohang']);
                    $i = 0;
                    $tong = 0;
                    foreach ($_SESSION['giohang'] as $sp) {
                        $tt = $sp[3] * $sp[4];
                        $tong += $tt;
                        echo '
                            <tr class="cart-item-row">
                                <td class="td">' . $i + 1 . '</td>
                                <td class="td">' . $sp[1] . '</td>
                                <td class="td">
                                    <img src="./admin/uploads/' . $sp[2] . '" width="100px" />
                                </td>
                                <td class="td">' . $sp[3] . '</td>
                                <td class="td">' . $sp[4] . '</td>
                                <td class="td">' . $tt . '</td>
                                <td class="td"> <button class="btn btn-danger"><a href="index.php?act=delcart&id=' . $i . '" class="text-decoration-none text-light fw-bold">Xoá</a></button> </td>
                            </tr>';
                        $i++;
                    }
                    ?>
                    <tr>
                        <td class="td fw-bold" colspan="5">Tổng giá trị đơn hàng</td>
                        <td class="td fw-bold"><?= $tong ?></td>
                        <td class="td"></td>
                    </tr>
                </table>
            </div>

            <div class="mt-3">
                <button class="btn btn-warning me-3">
                    <a href="index.php?act=home" class="text-decoration-none p-3 fw-bold text-dark">Tiếp tục mua
                        hàng</a>
                </button>
                <?php
                if (count($_SESSION['giohang']) > 0) {
                    echo '
                    <button class="btn btn-danger me-3">
                    <a href="index.php?act=delcart" class="text-decoration-none p-3 fw-bold text-light">Xoá giỏ hàng</a>
                </button>
                <button class="btn btn-success me-3">
                    <a href="#" class="text-decoration-none p-3 fw-bold text-light">Thanh toán</a>
                </button>
                ';
                }
                ?>
            </div>
        </div>

    </div>
</div>