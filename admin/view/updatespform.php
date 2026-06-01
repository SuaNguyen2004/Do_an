<!-- main -->
<main class="mb-4">
    <div class="bg-secondary-subtle p-5">
        <h2 class="mb-4">CẬP NHẬT SẢN PHẨM</h2>
        <form action="index.php?act=updatedm" method="post" enctype="multipart/form-data">
            <?php
            // var_dump($dsdm);
            // var_dump($spct);
            ?>
            <div class="mb-3 ">
                <label for="" class="form-label fw-bold mb-2">Danh mục: </label>
                <select name="iddm" id="" class="form-control">
                    <!-- <option value="0">--Chọn danh mục--</option> -->
                    <?php
                    global $spct;

                    $iddmcur = $spct[0]['iddm'];
                    if (isset($dsdm)) {
                        foreach ($dsdm as $dm) {
                            if ($dm['id'] == $iddmcur) {
                                echo '<option value="' . $dm['id'] . '" selected>' . $dm['tendm'] . '</option>';
                            } else {
                                echo '<option value="' . $dm['id'] . '">' . $dm['tendm'] . '</option>';
                            }
                        }
                    }
                    ?>
                </select><br />
            </div>
            <div class="mb-3">
                <label for="" class="form-label fw-bold mb-2">Tên sản phẩm: </label>
                <input class="form-control" type="text" name="tensp" value="<?= $spct[0]['tensp'] ?>" /><br />
            </div>
            <div class="mb-3">
                <label for="" class="form-label fw-bold mb-2">Hình ảnh: </label>
                <input class="form-control" type="file" name="img" /><br />
            </div>
            <div class="mb-3">
                <p class="fw-bold">Ảnh hiện tại :</p> <img src="./uploads/<?= $spct[0]['img'] ?>" width="100px" alt="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label fw-bold mb-2">Giá: </label>
                <input class="form-control" type="number" name="gia" value="<?= $spct[0]['gia'] ?>" /><br />
            </div>
            <div class="mb-3">
                <label for="" class="form-label fw-bold mb-2">Mô tả: </label>
                <input class="form-control" type="text" name="mota" class="form-control"
                    value="<?= $spct[0]['mota'] ?>" /><br />
            </div>
            <div class="mb-3">
                <label for="" class="form-label fw-bold mb-2">Số lượng kho: </label>
                <input class="form-control" type="number" name="soluongkho" class="form-control" min="0"
                    value="<?= $spct[0]['soluongkho'] ?>" /><br />
            </div>

            <input type="hidden" name="id" value="<?= $spct[0]['id'] ?>">

            <input type="submit" value="Cập nhật" name="capnhat" class="btn btn-info ms-3" />
        </form>
        <br />
        <table class="table table-hover text-center w-100">
            <tr class="table-primary">
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Giá</th>
                <th>Mô tả</th>
                <th>Số lượng kho</th>
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
                        <td class="p-3">' . number_format($sp['gia'], 0, ',', '.') . '₫</td>
                        <td class="p-3">' . $sp['mota'] . '</td>
                        <td class="p-3">' . $sp['soluongkho'] . '</td>

                        <td class="p-3">
                            <a href="index.php?act=updatespform&id=' . $sp['id'] . '" class="text-decoration-none me-2">Sửa</a> |
                            <a href="index.php?act=delsp&id=' . $sp['id'] . '" class="text-decoration-none text-danger ms-2">Xoá</a>
                        </td>
                    </tr>';
                    $i++;
                }
            }
            ?>
        </table>
    </div>
</main>