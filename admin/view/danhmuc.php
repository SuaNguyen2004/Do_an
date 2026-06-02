<!-- main -->
<main class="mb-4">
    <div class="bg-secondary-subtle p-5">
        <h2 class="mb-4">QUẢN LÝ DANH MỤC</h2>
        <form action="index.php?act=adddm" method="post">
            <label for="" class="fw-bold mb-2">Tên danh mục:</label>
            <input type="text" name="tendm" id="tendm" class="form-control" maxlength="50" />
            <input type="submit" value="Thêm mới" name="themmoi" onclick="return checkEmptyDM()"
                class="btn btn-success mt-3" />
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