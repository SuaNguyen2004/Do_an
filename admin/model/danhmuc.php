<?php
function getalldm()
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM tbl_danhmuc");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;

}
function themdm($tendm, $uutien, $hienthi)
{
    $conn = connectdb();
    $sql = "INSERT INTO tbl_danhmuc (tendm, uutien, hienthi)
            VALUES ('$tendm', '$uutien', '$hienthi')";
    $conn->exec($sql);
}

function deldm($id)
{
    $conn = connectdb();
    $sql = "DELETE FROM tbl_danhmuc WHERE id=" . $id;
    // use exec() because no results are returned
    $conn->exec($sql);
}
function getonedm($id)
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM tbl_danhmuc WHERE id =" . $id);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}
function updatedm($id, $tendm, $uutien, $hienthi)
{
    $conn = connectdb();
    $sql = "UPDATE tbl_danhmuc SET tendm='" . $tendm . "', uutien = '" . $uutien . "', hienthi = '" . $hienthi . "' WHERE id=" . $id;
    // execute the query
    $conn->exec($sql);
}
?>