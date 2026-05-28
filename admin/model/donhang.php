<?php
function getalldh()
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM tbl_donhang WHERE 1 ORDER BY id DESC LIMIT 10");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}
?>