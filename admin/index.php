<?php
session_start();
ob_start();

if (isset($_SESSION['role']) && ($_SESSION['role'] == 1)) {
    include './model/connectdb.php';
    include './model/danhmuc.php';
    include './model/sanpham.php';
    include './model/user.php';

    include './view/header.php';

    if (isset($_GET['act'])) {
        $act = $_GET['act'];

        switch ($act) {
            case 'danhmuc':
                $kq = getalldm();
                include './view/danhmuc.php';
                break;
            case 'adddm':
                if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                    $tendm = $_POST['tendm'];
                    themdm($tendm);
                }
                $kq = getalldm();
                include './view/danhmuc.php';
                break;
            case 'delcart':
                if (isset($_GET['id']) && $_GET['id']) {
                    $id = $_GET['id'];
                    deldm($id);
                }
                $kq = getalldm();
                include './view/danhmuc.php';
                break;
            case 'updatedmform':
                if (isset($_GET['id']) && $_GET['id']) {
                    $id = $_GET['id'];
                    $kqone = getonedm($id);

                    $kq = getalldm();
                    include './view/updatedmform.php';
                }
                if (isset($_POST['id']) && $_POST['id']) {
                    $id = $_POST['id'];
                    $tendm = $_POST['tendm'];
                    updatedm($id, $tendm);

                    $kq = getalldm();
                    include './view/danhmuc.php';
                }
                // include './view/updatedmform.php';
                break;
            case 'sanpham':
                // lay dsdm
                $dsdm = getalldm();

                // lay dssp
                $kq = getallsp();
                include './view/sanpham.php';
                break;
            case 'addsp':
                if (isset($_POST['themmoi']) && $_POST['themmoi']) {
                    $iddm = $_POST['iddm'];
                    $tensp = $_POST['tensp'];
                    // $img = $_POST['img'];
                    $gia = $_POST['gia'];

                    $target_dir = "uploads/";
                    $target_file = $target_dir . basename($_FILES["img"]["name"]);
                    $img = $_FILES["img"]["name"];
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                    if (
                        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                        && $imageFileType != "gif"
                    ) {
                        echo '
                        <script>
                            alert("Ảnh không hợp lệ");
                        </script>
                    ';
                        $uploadOk = 0;
                    }

                    if ($uploadOk == 1) {
                        move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
                        insertsp($iddm, $tensp, $gia, $img);
                    }

                }

                // dsdm
                $dsdm = getalldm();

                // dssp
                $kq = getallsp();
                include './view/sanpham.php';
                break;
            case 'delsp':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $id = $_GET['id'];
                    delsp($id);
                }
                // dsdm
                $dsdm = getalldm();

                // dssp
                $kq = getallsp();
                include './view/sanpham.php';
                break;
            case 'updatespform':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $id = $_GET['id'];
                    $spct = getonesp($id);
                }
                // dsdm
                $dsdm = getalldm();

                // dssp
                $kq = getallsp();
                include './view/updatespform.php';
                break;
            case 'updatedm':
                if (isset($_POST['capnhat']) && $_POST['capnhat']) {
                    $id = $_POST['id'];
                    $iddm = $_POST['iddm'];
                    $tensp = $_POST['tensp'];
                    $gia = $_POST['gia'];

                    if ($_FILES["img"]["name"] != "") {
                        $target_dir = "uploads/";
                        $target_file = $target_dir . basename($_FILES["img"]["name"]);
                        $img = $_FILES["img"]["name"];
                        $uploadOk = 1;
                        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                        if (
                            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                            && $imageFileType != "gif"
                        ) {
                            echo '
                        <script>
                            alert("Ảnh không hợp lệ");
                        </script>
                    ';
                            $uploadOk = 0;
                        }

                        if ($uploadOk == 1) {
                            move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
                            // insertsp($iddm, $tensp, $gia, $img);
                        }
                    } else {
                        $img = "";
                    }
                    updatesp($id, $iddm, $tensp, $gia, $img);
                }
                // dsdm
                $dsdm = getalldm();

                // dssp
                $kq = getallsp();
                include './view/sanpham.php';
                break;
            case 'user':
                $kq = getalluser();
                include './view/user.php';
                break;
            case 'deluser':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $id = $_GET['id'];
                    deluser($id);
                }
                $kq = getalluser();
                include './view/user.php';
                break;
            case 'thoat':
                unset($_SESSION['role']);
                header('location: ../index.php');
                break;
            default:
                include './view/home.php';
                break;
        }
    } else {
        include './view/home.php';
    }
    include './view/footer.php';
} else {
    echo 'Bạn không phải là admin. Mời quay lại <a href="../index.php">TRANG CHỦ</a> ';
}
?>