<?php
function getallsp()
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM tbl_sanpham WHERE 1 ORDER BY id DESC");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}
function insertsp($iddm, $tensp, $gia, $mota, $soluongkho, $img)
{
    $conn = connectdb();
    $sql = "INSERT INTO tbl_sanpham (iddm, tensp, gia, mota, soluongkho, img) 
            VALUES ('$iddm', '$tensp', '$gia', '$mota','$soluongkho', '$img')";
    $conn->exec($sql);
}

function delsp($id)
{
    $conn = connectdb();
    $sql = "DELETE FROM tbl_sanpham WHERE id=" . $id;
    $conn->exec($sql);
}
function getonesp($id)
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM tbl_sanpham WHERE id =" . $id);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}
function updatesp($id, $iddm, $tensp, $gia, $mota, $soluongkho, $img)
{
    $conn = connectdb();
    if ($img == "") {
        $sql = "UPDATE tbl_sanpham SET iddm='" . $iddm . "', tensp='" . $tensp . "', gia='" . $gia . "', mota = '" . $mota . "', soluongkho = '" . $soluongkho . "'  WHERE id=" . $id;
    } else {
        $sql = "UPDATE tbl_sanpham SET iddm='" . $iddm . "', tensp='" . $tensp . "', gia='" . $gia . "',mota = '" . $mota . "', soluongkho = '" . $soluongkho . "' , img='" . $img . "'    WHERE id=" . $id;
    }

    // execute the query
    $conn->exec($sql);
}
?>