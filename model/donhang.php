<?php
function taodonhang($madh, $tongdonhang, $pttt, $name, $address, $email, $tel, $iduser)
{
    $conn = connectdb();
    $sql = "INSERT INTO tbl_donhang (madh, tongdonhang, pttt, name, address, email, tel, iduser) 
    VALUES ('" . $madh . "','" . $tongdonhang . "','" . $pttt . "','" . $name . "','" . $address . "','" . $email . "','" . $tel . "','" . $iduser . "')";
    // use exec() because no results are returned
    $conn->exec($sql);
    $last_id = $conn->lastInsertId();
    return $last_id;
}

function addtocart($iddh, $idsp, $tensp, $img, $soluong, $gia)
{
    $conn = connectdb();
    $sql = "INSERT INTO tbl_cart (iddh, idsp, tensp, img, soluong, gia) 
    VALUES ('" . $iddh . "','" . $idsp . "','" . $tensp . "','" . $img . "','" . $soluong . "','" . $gia . "')";
    // use exec() because no results are returned
    $conn->exec($sql);
}

function getshowcart($iddh)
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM tbl_cart WHERE iddh =" . $iddh);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}

function getorderinfo($iddh)
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM tbl_donhang WHERE id =" . $iddh);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}
?>