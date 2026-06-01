<?php
function getallsp($kyw = "")
{
    $conn = connectdb();
    $sql = "SELECT * FROM tbl_sanpham WHERE 1";
    if ($kyw != "") {
        $sql .= " AND tensp LIKE '%" . $kyw . "%'";
    }
    $sql .= " ORDER BY id DESC LIMIT 48";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}
function getspbydm($iddm)
{
    $conn = connectdb();
    $sql = "SELECT tbl_sanpham.id, tensp,img,gia,tendm,soluongkho FROM tbl_sanpham
    INNER JOIN tbl_danhmuc ON tbl_danhmuc.id = tbl_sanpham.iddm
    WHERE tbl_sanpham.iddm = " . $iddm . " ORDER BY id DESC LIMIT 8";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}
function getonesp($id)
{
    $conn = connectdb();
    $sql = "SELECT * FROM tbl_sanpham WHERE id=" . $id;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}
function getspdb()
{
    $conn = connectdb();
    $sql = "SELECT * FROM tbl_sanpham WHERE special = 1 ORDER BY id DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}
function updatesoluongkho($sl_mua, $product_id)
{
    $conn = connectdb();
    // Thực hiện câu lệnh cập nhật giảm tồn kho trực tiếp dựa trên ID sản phẩm
    $sql = "UPDATE tbl_sanpham SET soluongkho = soluongkho - $sl_mua WHERE id = $product_id";
    $conn->exec($sql);
}

function showsp($getspbydm)
{
    foreach ($getspbydm as $sp) {
        echo '
            <!-- ! sản phẩm 1 -->
                <div class="col">
                    <div class="card h-100 product-card sphover">
                        <a href="index.php?act=chitietsanpham&id=' . $sp['id'] . '" class="product-img-box">
                            <img src="./admin/uploads/' . $sp['img'] . '" alt="" />
                        </a>

                        <div class="card-body d-flex flex-column pt-0">
                            <a href="index.php?act=chitietsanpham&id=' . $sp['id'] . '" class="text-decoration-none">
                                <h5 class="product-name fw-bold">' . $sp['tensp'] . '</h5>
                            </a>
                            <p class="product-price fw-bold">' . number_format($sp['gia'], 0, ',', '.') . ' đ</p>
                            <form action="index.php?act=giohang" method="post">
                                <input type="hidden" name="id" value="' . $sp['id'] . '">
                                <input type="hidden" name="tensp" value="' . $sp['tensp'] . '">
                                <input type="hidden" name="img" value="' . $sp['img'] . '">
                                <input type="hidden" name="gia" value="' . $sp['gia'] . '">
                                <input type="submit" value="Thêm vào giỏ" name="addtocart"
                                    class="rounded-pill mt-auto d-flex justify-content-between align-items-center w-100 fw-bold btn-add-cart p-2">
                            </form>
                        </div>
                    </div>
                </div>
            ';
    }
}
?>