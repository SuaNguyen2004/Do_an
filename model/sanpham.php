<?php
function getallsp($kyw = "")
{
    $conn = connectdb();
    $sql = "SELECT * FROM tbl_sanpham WHERE 1";
    if ($kyw != "") {
        $sql .= " AND tensp LIKE '%" . $kyw . "%'";
    }
    $sql .= " ORDER BY id DESC LIMIT 24";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}
function getspbydm($iddm)
{
    $conn = connectdb();
    $sql = "SELECT tbl_sanpham.id, tensp,img,gia,tendm FROM tbl_sanpham
    INNER JOIN tbl_danhmuc ON tbl_danhmuc.id = tbl_sanpham.iddm
    WHERE tbl_sanpham.iddm = " . $iddm . " ORDER BY id DESC LIMIT 4";
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
?>