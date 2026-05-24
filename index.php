<?php
session_start();
ob_start();

include './model/connectdb.php';
include './model/user.php';

if (!isset($_SESSION['giohang'])) {
    $_SESSION['giohang'] = [];
}

include './view/header.php';

if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'giohang':
            if (isset($_POST['addtocart']) && $_POST['addtocart']) {
                $id = $_POST['id'];
                $tensp = $_POST['tensp'];
                $img = $_POST['img'];
                $gia = $_POST['gia'];
                $sl = 1;

                $item = array($id, $tensp, $img, $gia, $sl);
                array_push($_SESSION['giohang'], $item);
            }
            include './view/giohang.php';
            break;
        case 'delcart':
            if (isset($_SESSION['giohang']) && $_SESSION['giohang'] > 0) {
                unset($_SESSION['giohang']);
            }
            include './view/home.php';
            break;
        case 'home':
            include './view/home.php';
            break;

        case 'dangnhap':
            if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $kq = getuserinfo($user, $pass);
                $role = $kq[0]['role'];

                if ($role == 1) {
                    $_SESSION['role'] = $role;
                    header('location: ./admin/index.php');
                } elseif ($role == 0) {
                    $_SESSION['role'] = $role;
                    $_SESSION['id'] = $kq[0]['id'];
                    $_SESSION['user'] = $kq[0]['user'];
                    header('location: index.php');
                } else {
                    $txt = 'Tài khoản không tồn tại';
                    header('location: index.php?act=dangnhap');
                }
            }
            include './manager/dangnhap.php';
            break;
        case 'thoat':
            unset($_SESSION['role']);
            unset($_SESSION['id']);
            unset($_SESSION['user']);
            header('location: index.php');
            break;
        default:
            include './view/home.php';
            break;
    }
} else {
    include './view/home.php';
}


include './view/footer.php';
?>