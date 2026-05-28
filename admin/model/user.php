<?php
function getalluser()
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM tbl_user WHERE 1 AND role = 0 ORDER BY id DESC");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}

function deluser($id)
{
    $conn = connectdb();
    $sql = "DELETE FROM tbl_user WHERE id=" . $id;
    $conn->exec($sql);
}
?>