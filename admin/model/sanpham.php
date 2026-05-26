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
function updatesp($id, $iddm, $tensp, $gia, $img)
{
    $conn = connectdb();
    if ($img == "") {
        $sql = "UPDATE tbl_sanpham SET iddm='" . $iddm . "', tensp='" . $tensp . "', gia='" . $gia . "'   WHERE id=" . $id;
    } else {
        $sql = "UPDATE tbl_sanpham SET iddm='" . $iddm . "', tensp='" . $tensp . "', gia='" . $gia . "', img='" . $img . "'   WHERE id=" . $id;
    }

    // execute the query
    $conn->exec($sql);
}
?>