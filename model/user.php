<?php
function getuserinfo($user, $pass)
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM tbl_user WHERE user ='" . $user . "' AND pass= '" . $pass . "'");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    if (count($kq) >= 0) {
        return $kq;
    } else {
        return 0;
    }
}
function insert_customer($user, $pass, $email)
{
    $conn = connectdb();
    if ($email == "") {
        $sql = "INSERT INTO tbl_user (user, pass, role)
            VALUES ('$user', '$pass', 0)";
    } else {
        $sql = "INSERT INTO tbl_user (user, pass, email, role)
            VALUES ('$user', '$pass', '$email', 0)";
    }
    $conn->exec($sql);
}
?>