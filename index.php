<?php
session_start();
ob_start();

include './model/connectdb.php';
include './model/user.php';
include './model/danhmuc.php';
include './model/sanpham.php';

$dsdm = getalldm();
$spdb = getspdb();

if (!isset($_SESSION['giohang'])) {
    $_SESSION['giohang'] = [];
}

include './view/header.php';

if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'giohang':
            // check dang nhap va sua gio hang theo tung id
            if (isset($_SESSION['id']) && isset($_SESSION['user'])) {
                $iduser = $_SESSION['id'];
                if (!isset($_SESSION['giohang']) || !isset($_SESSION['giohang'][$iduser])) {
                    $_SESSION['giohang'][$iduser] = [];
                }
                if (isset($_POST['addtocart']) && $_POST['addtocart']) {
                    $id = $_POST['id'];
                    $tensp = $_POST['tensp'];
                    $img = $_POST['img'];
                    $gia = $_POST['gia'];
                    if (isset($_POST['sl']) && $_POST['sl'] > 0) {
                        $sl = $_POST['sl'];
                    } else {
                        $sl = 1;
                    }
                    $i = 0;
                    $fg = 0;

                    foreach ($_SESSION['giohang'][$iduser] as $cart) {
                        if ($cart[0] == $id) {
                            $slnew = $sl + $cart[4];
                            $_SESSION['giohang'][$iduser][$i][4] = $slnew;
                            $fg = 1;
                            break;
                        }
                        $i++;
                    }

                    if ($fg == 0) {
                        $item = array($id, $tensp, $img, $gia, $sl);
                        array_push($_SESSION['giohang'][$iduser], $item);
                    }
                    header('location: index.php?act=giohang');
                }
                include './view/giohang.php';
            } else {
                echo '
                <script>
                alert("Vui lòng đăng nhập");
                window.location.href = "index.php?act=dangnhap";
                </script>
                ';
                // header('location: index.php?act=dangnhap');
            }
            break;

        case 'delcart':
            // xoa gio hang theo tung id
            if (isset($_SESSION['id']) && isset($_SESSION['user'])) {
                $iduser = $_SESSION['id'];
                if (isset($_SESSION['giohang'][$iduser]) && $_SESSION['giohang'][$iduser] > 0) {
                    if (isset($_GET['id']) && $_GET['id'] >= 0) {
                        array_splice($_SESSION['giohang'][$iduser], $_GET['id'], 1);
                    } else {
                        // unset($_SESSION['giohang']);
                        $_SESSION['giohang'][$iduser] = [];
                    }

                    if (count($_SESSION['giohang'][$iduser]) > 0) {
                        header('location: index.php?act=giohang');
                    } else {
                        header('location: index.php');
                    }
                }
            }
            // include './view/home.php';
            break;

        case 'home':
            include './view/home.php';
            break;

        case 'dangnhap':
            if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $kq = getuserinfo($user, $pass);
                if (count($kq) > 0) {
                    $role = $kq[0]['role'];

                    if ($role == 1) {
                        $_SESSION['role'] = $role;
                        header('location: ./admin/index.php');
                    } elseif ($role == 0) {
                        $_SESSION['role'] = $role;
                        $_SESSION['id'] = $kq[0]['id'];
                        $_SESSION['user'] = $kq[0]['user'];
                        header('location: index.php');
                    }
                } else {
                    header('location: index.php?act=dangnhap&erro=1');
                }
            }
            include './manager/dangnhap.php';
            break;
        case 'dangky':
            if (isset($_POST['dangky']) && $_POST['dangky']) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];

                if ($_POST['email'] != "") {
                    $email = $_POST['email'];
                } else {
                    $email = "";
                }

                $checkuser = checkuser($user);
                if ($checkuser > 0) {
                    echo '
                        <script>
                        alert("Tên đăng nhập đã tồn tại! Vui lòng nhập tên đăng nhập khác");
                        window.location.href = "index.php?act=dangky";
                        </script>
                    ';
                } else {
                    insert_customer($user, $pass, $email);
                    echo '
                    <script>
                    alert("Chúc mừng bạn đã đăng ký thành công!");
                    window.location.href = "index.php?act=dangnhap";
                    </script>
                ';
                }
            }
            include './manager/dangky.php';
            break;
        case 'thoat':
            unset($_SESSION['role']);
            unset($_SESSION['id']);
            unset($_SESSION['user']);
            header('location: index.php');
            break;
        case 'danhmuc':
            include './view/sanpham.php';
            break;
        case 'sanpham':
            $allsp = getallsp();
            include './view/sanpham.php';
            break;
        case 'chitietsanpham':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                $kq = getonesp($id);
            }
            include './view/chitietsanpham.php';
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