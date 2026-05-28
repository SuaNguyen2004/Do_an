<!-- main -->
<main class="mb-4">
    <div class="bg-secondary-subtle p-5">
        <h2 class="mb-4">QUẢN LÝ TÀI KHOẢN</h2>
        <table class="table table-hover text-center w-75">
            <tr class="table-primary">
                <th>STT</th>
                <th>Tên đăng nhập</th>
                <th>Địa chỉ</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Hành động</th>
            </tr>
            <?php
            // var_dump($kq);
            if (isset($kq) && count($kq) > 0) {
                $i = 0;
                foreach ($kq as $user) {
                    echo '<tr>
                        <td class="p-3">' . $i + 1 . '</td>
                        <td class="p-3">' . $user['user'] . '</td>
                        <td class="p-3">' . $user['address'] . '</td>
                        <td class="p-3">' . $user['email'] . '</td>
                        <td class="p-3">' . $user['tel'] . '</td>
                        <td class="p-3">
                            <a href="index.php?act=deluser&id=' . $user['id'] . '" class="text-decoration-none text-danger ms-2">Xoá</a>
                        </td>
                    </tr>';
                    $i++;
                }
            } else {
                echo 'Hiện tại chưa có khách hàng nào.';
            }
            ?>
        </table>
    </div>
</main>