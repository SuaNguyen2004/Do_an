<?php
session_start();
ob_start();

include './model/connectdb.php';
include './model/danhmuc.php';

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
        default:
            include './view/home.php';
            break;
    }
} else {
    include './view/home.php';
}
include './view/footer.php';

?>