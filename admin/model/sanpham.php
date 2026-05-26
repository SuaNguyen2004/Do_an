<?php
function getallsp()
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM tbl_sanpham");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}
function insertsp($iddm, $tensp, $gia, $img)
{
    $conn = connectdb();
    $sql = "INSERT INTO tbl_sanpham (iddm, tensp, gia, img) 
            VALUES ('$iddm', '$tensp', '$gia', '$img')";
    $conn->exec($sql);
}
?>