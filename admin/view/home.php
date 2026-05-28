<!-- main -->
<main class="pb-4">
    <div class="bg-secondary-subtle p-5">
        <h2>THỐNG KÊ ĐƠN HÀNG</h2>


        <table class="table table-hover text-center w-75">
            <tr class="table-primary">
                <th>STT</th>
                <th>Mã Đơn hàng</th>
                <th>Tổng tổng số tiền</th>
                <th>Tên khách hàng</th>
                <th>Địa chỉ</th>
                <th>Email</th>
                <th>Số điện thoại</th>
            </tr>
            <?php
            // var_dump($kq);
            if (isset($kq) && count($kq) > 0) {
                $i = 0;
                foreach ($kq as $dh) {
                    echo '<tr>
                        <td class="p-3">' . $i + 1 . '</td>
                        <td class="p-3">' . $dh['madh'] . '</td>
                        <td class="p-3">' . number_format($dh['tongdonhang'], 0, ',', '.') . ' đ</td>
                        <td class="p-3">' . $dh['name'] . '</td>
                        <td class="p-3">' . $dh['address'] . '</td>
                        <td class="p-3">' . $dh['email'] . '</td>
                        <td class="p-3">' . $dh['tel'] . '</td>
                    </tr>';
                    $i++;
                }
            }
            ?>
        </table>
    </div>
</main>