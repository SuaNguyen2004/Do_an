<?php
function getallsp()
{
    $conn = connectdb();
    $sql = "SELECT * FROM tbl_sanpham";
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
?>