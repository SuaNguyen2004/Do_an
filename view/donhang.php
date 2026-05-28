<div class="container pb-5" style="margin-top: 100px">
    <div class="d-flex align-items-center gap-3 my-4">
        <i class="fs-2 text-warning"></i>
        <h3 class="fw-bold m-0 text-dark">Đơn hàng của bạn</h3>

    </div>
    <?php
    // var_dump($_SESSION['user']);
    // var_dump($_SESSION['id']);
    ?>
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
                    </tr>
                    <?php
                    // var_dump($_SESSION['giohang']);
                    if (isset($_SESSION['iddh']) && $_SESSION['iddh'] > 0) {
                        $getshowcart = getshowcart($_SESSION['iddh']);
                        $iduser = $_SESSION['id'];
                        $i = 0;
                        $tong = 0;
                        if (isset($getshowcart) && count($getshowcart) > 0) {
                            foreach ($getshowcart as $sp) {
                                $tt = $sp['gia'] * $sp['soluong'];
                                $tong += $tt;
                                echo '
                            <tr class="cart-item-row">
                                <td class="td">' . $i + 1 . '</td>
                                <td class="td">' . $sp['tensp'] . '</td>
                                <td class="td">
                                    <img src="./admin/uploads/' . $sp['img'] . '" width="100px" />
                                </td>
                                <td class="td">' . $sp['gia'] . '</td>
                                <td class="td">' . $sp['soluong'] . '</td>
                                <td class="td">' . $tt . '</td>
                            </tr>';
                                $i++;
                            }
                        }
                    } else {
                        echo 'Giỏ hàng rỗng. <a href="index.php">Tiếp tục đặt hàng</a> ';
                    }
                    ?>
                    <tr>
                        <td class="td fw-bold" colspan="5">Tổng giá trị đơn hàng</td>
                        <td class="td fw-bold"><?= $tong ?></td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="col-lg-4 contact-left-content">
            <?php
            if (isset($_SESSION['iddh']) && $_SESSION['iddh'] > 0) {
                $orderinfo = getorderinfo($_SESSION['iddh']);
                if (count($orderinfo) > 0) {
                    ?>
                    <h3>Mã đơn hàng:
                        <?= $orderinfo[0]['madh']; ?>
                    </h3>
                    <table class="dathang">
                        <tr>
                            <td><strong>Tên người nhận:</strong> <br>
                                <?= $orderinfo[0]['name']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Địa chỉ người nhận:</strong> <br>
                                <?= $orderinfo[0]['address']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Email người nhận:</strong> <br>
                                <?= $orderinfo[0]['email']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Điện thoại người nhận:</strong> <br>
                                <?= $orderinfo[0]['tel']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Phương thức thanh toán</strong><br>
                                <?php
                                switch ($orderinfo[0]['pttt']) {
                                    case '1':
                                        $txtmess = "Thanh toán khi nhận hàng";
                                        break;
                                    case '2':
                                        $txtmess = "Thanh toán chuyển khoản";
                                        break;
                                    case '3':
                                        $txtmess = "Thanh toán ví MoMo";
                                        break;

                                    default:
                                        $txtmess = "Quý khách chưa chọn phương thức thanh toán";
                                        break;
                                }
                                echo $txtmess;
                                ?>
                        </tr>
                    </table>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</div>