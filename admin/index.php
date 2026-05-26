<?php
session_start();
ob_start();

include './model/connectdb.php';
include './model/danhmuc.php';
include './model/sanpham.php';

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
                $img = basename($_FILES["img"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                if (
                    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif"
                ) {
                    // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
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
        default:
            include './view/home.php';
            break;
    }
} else {
    include './view/home.php';
}
include './view/footer.php';

?>