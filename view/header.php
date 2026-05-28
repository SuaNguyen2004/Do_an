<!doctype html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MiniMart</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./view/css/header.css" />
    <link rel="stylesheet" href="./view/css/home.css" />
    <link rel="stylesheet" href="./view/css/footer.css" />
    <link rel="stylesheet" href="./view/css/cart.css" />
    <link rel="stylesheet" href="./view/css/auth.css" />
    <link rel="stylesheet" href="./view/css/chitietsanpham.css" />

    <!-- script -->
    <script src="./controller/script.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top custom-navbar">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center me-auto">
                <div class="dropdown">
                    <button
                        class="btn btn-light btn-sm me-3 d-flex align-items-center gap-2 dropdown-toggle-split fw-bold"
                        type="button" id="dropdownCategoryButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-bars text-dark"></i> Danh mục
                    </button>

                    <ul class="dropdown-menu category-dropdown-menu" aria-labelledby="dropdownCategoryButton">
                        <li>
                            <a class="dropdown-item category-dropdown-item" href="index.php?act=sanpham">Tất cả sản
                                phẩm</a>
                        </li>
                        <?php
                        // var_dump($dsdm);
                        if (isset($dsdm) && count($dsdm) > 0) {
                            foreach ($dsdm as $dm) {
                                echo '
                                <li>
                                    <a class="dropdown-item category-dropdown-item" href="index.php?act=sanpham&id=' . $dm['id'] . '">' . $dm['tendm'] . '</a>
                                </li>';
                            }
                        } else {
                            echo 'Chưa có danh mục.';
                        }
                        ?>
                        <!-- <li>
                            <a class="dropdown-item category-dropdown-item" href="#">Đồ uống</a>
                        </li>
                        <li>
                            <a class="dropdown-item category-dropdown-item" href="#">Đồ ăn
                                vặt</a>
                        </li> -->
                    </ul>
                </div>
                <a class="navbar-brand fw-bold text-white m-0 p-0 fs-4" href="index.php">MINIMART</a>
            </div>

            <div class="flex-grow-1 d-flex justify-content-center mx-5">
                <form class="search-container" action="index.php?act=sanpham&keyword=" method="POST">
                    <input class="form-control search-input" name="keyword" type="search"
                        placeholder="Tìm kiếm sản phẩm..." aria-label="Search" />
                    <!-- <input type="submit" value="Tìm" class="btn btn-warning rounded-circle btn-search-trigger"> -->
                    <button class="btn btn-warning rounded-circle btn-search-trigger" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>

            <div class="d-flex align-items-center ms-auto gap-3">
                <!-- <button class="btn btn-light btn-sm py-2 px-3">
                    <a href="index.php" class="text-decoration-none fw-bold text-dark">
                        <i class="fa-solid fa-house me-2 text-dark"></i>Trang Chủ
                    </a>
                </button> -->

                <?php
                if (isset($_SESSION['user']) && $_SESSION['user'] != "") {
                    echo '<button class="btn btn-light btn-sm py-2 px-3">
                                <a href="index.php?act=userinfo" class="text-decoration-none fw-bold text-dark">
                                <i class="fa-solid fa-user me-2 text-dark"></i>' . $_SESSION['user'] . '</a>
                            </button>
                            <button class="btn btn-light btn-sm py-2 px-3">
                                <a href="index.php?act=giohang" class="text-decoration-none fw-bold text-dark">
                                <i class="fa-solid fa-cart-shopping me-2 text-dark"></i>Giỏ hàng</a>
                            </button>
                            <button class="btn btn-warning btn-sm py-2 px-3">
                                <a href="index.php?act=thoat" class="text-decoration-none fw-bold text-dark">
                                <i class="fa-solid fa-arrow-right-from-bracket me-2 text-dark "></i>Đăng xuất</a>
                            </button>
                            ';
                } else {
                    ?>
                    <button class="btn btn-warning btn-sm py-2 px-3">
                        <a href="index.php?act=dangnhap" class="text-decoration-none fw-bold text-dark">
                            <i class="fa-solid fa-arrow-right-to-bracket me-2 text-dark"></i>Đăng nhập</a>
                    </button>
                    <button class="btn btn-warning btn-sm py-2 px-3">
                        <a href="index.php?act=dangky" class="text-decoration-none fw-bold text-dark">
                            <i class="fa-solid fa-arrow-right-to-bracket me-2 text-dark"></i>Đăng ký</a>
                    </button>
                    <?php
                }
                ?>
            </div>
        </div>
    </nav>