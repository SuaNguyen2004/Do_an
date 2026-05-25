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
function themdm($tendm)
{
    $conn = connectdb();
    $sql = "INSERT INTO tbl_danhmuc (tendm)
            VALUES ('$tendm')";
    $conn->exec($sql);
}
?>