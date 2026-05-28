<!-- main -->
<main class="mb-4">
    <div class="bg-secondary-subtle p-5">
        <h2 class="mb-4">QUẢN LÝ SẢN PHẨM</h2>
        <form action="index.php?act=addsp" method="post" enctype="multipart/form-data">
            <?php
            // var_dump($dsdm);
            ?>
            <div class="mb-3 ">
                <label for="" class="form-label fw-bold mb-2">Danh mục: </label>
                <select name="iddm" id="iddm" class="form-control">
                    <option value="0">--Chọn danh mục--</option>
                    <?php
                    global $dsdm;

                    foreach ($dsdm as $dm) {
                        echo '<option value="' . $dm['id'] . '">' . $dm['tendm'] . '</option>';
                    }
                    ?>
                    <!-- <option value="1">Đồ ăn</option>
                    <option value="2">Đồ uống</option> -->
                </select><br />
            </div>
            <div class="mb-3">
                <label for="" class="form-label fw-bold mb-2">Tên sản phẩm: </label>
                <input type="text" name="tensp" id="tensp" class="form-control" /><br />
            </div>
            <div class="mb-3">
                <label for="" class="form-label fw-bold mb-2">Hình ảnh: </label>
                <input type="file" name="img" id="img" class="form-control" /><br />
            </div>
            <div class="mb-3">
                <label for="" class="form-label fw-bold mb-2">Giá: </label>
                <input type="number" name="gia" class="form-control" min="0" value="0" /><br />
            </div>

            <input type="submit" value="Thêm mới" name="themmoi" onclick="return checkEmptySP()"
                class="btn btn-success mt-3" />
        </form>
        <br />
        <table class="table table-hover text-center w-75">
            <tr class="table-primary">
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Giá</th>
                <th>Hành động</th>
            </tr>
            <?php
            // var_dump($kq);
            if (isset($kq) && count($kq) > 0) {
                $i = 0;
                foreach ($kq as $sp) {
                    echo '<tr>
                        <td class="p-3">' . $i + 1 . '</td>
                        <td class="p-3">' . $sp['tensp'] . '</td>
                        <td class="p-3"><img src = "./uploads/' . $sp['img'] . '" width = "70px"></td>
                        <td class="p-3">' . number_format($sp['gia'], 0, ',', '.') . ' đ</td>

                        <td class="p-3">
                            <a href="index.php?act=updatespform&id=' . $sp['id'] . '" class="text-decoration-none me-2">Sửa</a> |
                            <a href="index.php?act=delsp&id=' . $sp['id'] . '" class="text-decoration-none text-danger ms-2">Xoá</a>
                        </td>
                    </tr>';
                    $i++;
                }
            }
            ?>
            <!-- <tr>
                <td>1</td>
                <td>Bia heineken</td>
                <td>Bia.jpg</td>
                <td>30000</td>
                <td>
                    <a href="#" class="text-decoration-none me-2">Sửa</a> |
                    <a href="#" class="text-decoration-none text-danger ms-2">Xoá</a>
                </td>
            </tr> -->
        </table>
    </div>
</main>