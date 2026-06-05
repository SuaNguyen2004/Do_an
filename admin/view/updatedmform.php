<!-- main -->
<main class="mb-4">
    <div class="bg-secondary-subtle p-5">
        <h2 class="mb-4">CẬP NHẬP DANH MỤC</h2>
        <?php
        // var_dump($kqone);
        global $kqone;
        ?>
        <form action="index.php?act=updatedmform" method="post">
            <label for="" class="fw-bold mb-2">Tên danh mục</label><br />
            <input type="text" name="tendm" id="tendm" class="form-control" maxlength="50"
                value="<?= $kqone[0]['tendm'] ?>" />
            <label for="" class="fw-bold mb-2">Ưu tiên:</label>
            <input type="text" name="uutien" id="uutien" class="form-control" maxlength="2"
                value="<?= $kqone[0]['uutien'] ?>" />
            <label for="" class="fw-bold mb-2">Hiển thị:</label>
            <input type="text" name="hienthi" id="hienthi" class="form-control" maxlength="1"
                value="<?= $kqone[0]['hienthi'] ?>" />
            <input type="hidden" name="id" value="<?= $kqone[0]['id'] ?>" />
            <input type="submit" value="Cập nhật" name="capnhat" onclick="return checkEmptyDM()"
                class="btn btn-info ms-3" />
        </form>

        <br />

        <table class="table table-hover text-center w-75">
            <tr class="table-dark">
                <th>STT</th>
                <th>Tên danh mục</th>
                <th>Ưu tiên</th>
                <th>Hiển thị</th>
                <th>Hành động</th>
            </tr>
            <?php
            $i = 0;
            if (isset($kq) && count($kq) > 0) {
                foreach ($kq as $dm) {
                    echo '<tr>
                            <td>' . $i + 1 . '</td>
                            <td>' . $dm['tendm'] . '</td>
                            <td>' . $dm['uutien'] . '</td>
                            <td>' . $dm['hienthi'] . '</td>
                            <td>
                                <a href="index.php?act=updatedmform&id=' . $dm['id'] . '" class="text-decoration-none me-2">Sửa</a> |
                                <a href="index.php?act=delcart&id=' . $dm['id'] . '" class="text-decoration-none text-danger ms-2">Xoá</a>
                            </td>
                        </tr>';
                    $i++;
                }
            }
            ?>

        </table>
    </div>
</main>