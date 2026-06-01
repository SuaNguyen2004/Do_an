<?php
session_start();
ob_start();

include './model/connectdb.php';
include './model/user.php';
include './model/danhmuc.php';
include './model/sanpham.php';
include './model/donhang.php';

$dsdm = getalldm();
$spdb = getspdb();
$allsp = getallsp();

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

                    // Kiểm tra số lượng kho thực tế
                    $oneprod = getonesp($id);
                    $soluongkho_hientai = $oneprod[0]['soluongkho'];

                    $i = 0;
                    $fg = 0;
                    $sl_trong_gio = 0;

                    // Tìm xem sản phẩm đã có trong giỏ chưa và lấy số lượng hiện tại
                    foreach ($_SESSION['giohang'][$iduser] as $cart) {
                        if ($cart[0] == $id) {
                            $sl_trong_gio = $cart[4];
                            break;
                        }
                    }

                    // KIỂM TRA SỐ LƯỢNG VƯỢT QUÁ TRONG KHO
                    if (($sl + $sl_trong_gio) > $soluongkho_hientai) {
                        echo '
                        <script>
                        alert("Số lượng bạn đặt vượt quá lượng hàng còn lại trong kho (Tối đa bạn có thể mua thêm: ' . ($soluongkho_hientai - $sl_trong_gio) . ' sản phẩm).");
                        window.location.href = "index.php?act=chitietsanpham&id=' . $id . '";
                        </script>
                        ';
                        exit();
                    }

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
            // if (isset($_GET['id']) && $_GET['id'] > 0) {
            //     $id = $_GET['id'];
            //     $getspbydm = getspbydm($id);
            // } else {
            //     $getspbydm = [];
            // }

            // 1. Kiểm tra nếu người dùng thực hiện hành động TÌM KIẾM
            if (isset($_POST['keyword']) && $_POST['keyword'] != "") {
                $kyw = $_POST['keyword'];
                $allsp = getallsp($kyw); // Gọi hàm getallsp có truyền từ khóa tìm kiếm
                $getspbydm = []; // Đặt mảng này bằng rỗng để kích hoạt khối hiển thị tìm kiếm

                // 2. Nếu người dùng chọn xem theo DANH MỤC cụ thể
            } elseif (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                $getspbydm = getspbydm($id);
                $allsp = [];

                // 3. Nếu người dùng chọn xem TẤT CẢ SẢN PHẨM mặc định
            } else {
                $allsp = getallsp(); // Lấy toàn bộ không truyền từ khóa
                $getspbydm = [];
            }
            include './view/sanpham.php';
            break;

        case 'chitietsanpham':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                $kq = getonesp($id);
            }
            include './view/chitietsanpham.php';
            break;
        case 'userinfo':
            if (isset($_SESSION['id']) && isset($_SESSION['user'])) {
                $id = $_SESSION['id'];
                $user = $_SESSION['user'];
                $userinfo = userinfo($id, $user);
            }
            include './view/userinfo.php';
            break;
        case 'updateuserinfo':
            if (isset($_SESSION['id']) && isset($_SESSION['user'])) {
                $id = $_SESSION['id'];
                $user = $_SESSION['user'];
                if (isset($_POST['capnhat']) && $_POST['capnhat']) {
                    $name = $_POST['name'];
                    $address = $_POST['address'];
                    $email = $_POST['email'];
                    $tel = $_POST['tel'];

                    update($id, $name, $address, $email, $tel);
                }
            }
            $userinfo = userinfo($id, $user);
            include './view/userinfo.php';
            break;
        case 'thanhtoan':
            if (isset($_SESSION['id']) && isset($_SESSION['user'])) {
                $iduser = $_SESSION['id'];
                if (!isset($_SESSION['giohang']) || !isset($_SESSION['giohang'][$iduser])) {
                    $_SESSION['giohang'][$iduser] = [];
                }
                if (isset($_POST['thanhtoan']) && $_POST['thanhtoan']) {
                    //lấy dữ liệu 

                    $address_detail = $_POST['address_detail'];
                    $district = $_POST['district'];
                    $province = $_POST['province'];
                    $address = $address_detail . ", " . $district . ", " . $province;

                    $tongdonhang = $_POST['tongdonhang'];
                    $name = $_POST['name'];

                    $email = $_POST['email'];
                    $tel = $_POST['tel'];
                    $pttt = $_POST['pttt'];
                    $madh = "#MNM" . rand(0, 999999);
                    // tạo đơn hàng
                    // và trả về 1 id đơn hàng
                    // $item = array($id, $tensp, $img, $gia, $sl);
                    $iddh = taodonhang($madh, $tongdonhang, $pttt, $name, $address, $email, $tel, $iduser);
                    $_SESSION['iddh'] = $iddh;
                    if (isset($_SESSION['giohang'][$iduser]) && $_SESSION['giohang'][$iduser] > 0) {
                        foreach ($_SESSION['giohang'][$iduser] as $item) {
                            addtocart($iddh, $item[0], $item[1], $item[2], $item[4], $item[3]);

                            // 2. LOGIC TRỪ SỐ LƯỢNG KHO THỰC TẾ
                            $product_id = $item[0];
                            $sl_mua = $item[4];
                            
                            updatesoluongkho($sl_mua, $product_id);
                        }
                        unset($_SESSION['giohang'][$iduser]);
                    }
                }
            }
            include './view/donhang.php';
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