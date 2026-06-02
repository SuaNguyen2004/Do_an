<div class="container pb-5" style="margin-top: 100px">
    <div class="d-flex align-items-center gap-3 my-4">
        <i class="fs-2 text-warning"></i>
        <h3 class="fw-bold m-0 text-dark">Giỏ hàng của bạn</h3>
    </div>
    <?php
    // var_dump($_SESSION['user']);
    // var_dump($_SESSION['id']);
    ?>
    <div class="row g-4">
        <div class="col-12">
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
                    $iduser = $_SESSION['id'];
                    $i = 0;
                    $tong = 0;
                    if (isset($_SESSION['giohang'][$iduser]) && count($_SESSION['giohang'][$iduser]) > 0) {
                        foreach ($_SESSION['giohang'][$iduser] as $sp) {
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
                if (count($_SESSION['giohang'][$iduser]) > 0) {
                    echo '
                    <button class="btn btn-danger me-3">
                        <a href="index.php?act=delcart" class="text-decoration-none p-3 fw-bold text-light">Xoá giỏ hàng</a>
                    </button>
                ';
                }
                ?>
            </div>
        </div>

        <div class="col-12 contact-left-content">
            <!-- right -->
            <?php if (isset($_SESSION['giohang'][$iduser]) && count($_SESSION['giohang'][$iduser]) > 0) { ?>
                <h3>THÔNG TIN ĐẶT HÀNG</h3>
                <form action="index.php?act=thanhtoan" method="post">
                    <input type="hidden" name="tongdonhang" value="<?= $tong ?>">
                    <table class="dathang w-100">
                        <tr>
                            <td>Họ tên:<br>
                                <input type="text" name="name" id="name" placeholder="Nhập họ tên" class="form-control">
                            </td>
                        </tr>
                        <!-- <tr>
                        <td>Địa chỉ:<br>
                            <input type="text" name="address" id="address" placeholder="Nhập địa chỉ"
                                class="form-control">
                        </td>
                    </tr> -->
                        <tr>
                            <td>Địa chỉ: <br>
                                <div class=" p-3">
                                    <label class="small text-muted">Địa chỉ cụ thể:</label><br>
                                    <input type="text" name="address_detail" id="address_detail"
                                        placeholder="Nhập số nhà, tên đường" class="form-control mb-2">

                                    <label class="small text-muted">Tỉnh / Thành phố</label>
                                    <select name="province" id="province" class="form-control mb-2">
                                        <option value="">--Chọn Tỉnh / Thành phố--</option>
                                        <option value="Hà Nội">Hà Nội</option>
                                    </select>

                                    <label class="small text-muted">Quận / Huyện</label>
                                    <select name="district" id="district" class="form-control mb-2">
                                        <option value="">--Chọn Quận / Huyện--</option>
                                        <option value="Huyện Thường Tín">Huyện Thường Tín</option>
                                        <option value="Huyện Thanh Trì">Huyện Thanh Trì</option>
                                        <option value="Huyện Phú Xuyên">Huyện Phú Xuyên</option>
                                        <option value="Huyện Thanh Oai">Huyện Thanh Oai</option>
                                    </select>

                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Email:<br>
                                <input type="email" name="email" id="email" placeholder="Nhập email" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td>Số điện thoại:<br>
                                <input type="tel" name="tel" id="tel" pattern="0[0-9]{9}"
                                    placeholder="Nhập số điện thoại ví dụ : 0987654321" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td>Phương thức thanh toán<br>
                                <input type="radio" class="form-check-input" name="pttt" id="pttt" value="1"> Thanh toán khi
                                nhận hàng<br>
                                <input type="radio" class="form-check-input" name="pttt" id="pttt" value="2"> Thanh toán
                                chuyển khoản<br>
                                <input type="radio" class="form-check-input" name="pttt" id="pttt" value="3"> Thanh toán ví
                                MoMo<br>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="submit" value="Thanh toán" onclick="return checkPayment()" name="thanhtoan"
                                    class="btn btn-success mt-2">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <?php
            }
            ?>
    </div>
</div>
</div>