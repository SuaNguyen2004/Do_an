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
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top custom-navbar">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center me-auto">
                <div class="dropdown">
                    <button class="btn btn-light btn-sm me-3 d-flex align-items-center gap-2 dropdown-toggle-split"
                        type="button" id="dropdownCategoryButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-bars"></i> Danh mục
                    </button>

                    <ul class="dropdown-menu category-dropdown-menu" aria-labelledby="dropdownCategoryButton">
                        <li>
                            <a class="dropdown-item category-dropdown-item" href="danh-muc.html?cat=do-uong">Đồ uống</a>
                        </li>
                        <li>
                            <a class="dropdown-item category-dropdown-item" href="danh-muc.html?cat=do-an-vat">Đồ ăn
                                vặt</a>
                        </li>
                    </ul>
                </div>
                <a class="navbar-brand fw-bold text-white m-0 p-0 fs-4" href="index.php">MINIMART</a>
            </div>

            <div class="flex-grow-1 d-flex justify-content-center mx-5">
                <form class="search-container" action="#" method="POST">
                    <input class="form-control search-input" type="search" placeholder="Tìm kiếm sản phẩm..."
                        aria-label="Search" />
                    <button class="btn btn-warning rounded-circle btn-search-trigger" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>

            <div class="d-flex align-items-center ms-auto gap-4">
                <a href="index.php" class="nav-link-custom d-flex align-items-center gap-2">
                    <i class="fa-solid fa-house"></i> Trang Chủ
                </a>

                <a href="dang-nhap.html" class="btn-login-custom btn-sm">Đăng nhập</a>
                <a href="index.php?act=giohang" class="btn-login-custom btn-sm">Giỏ hàng</a>
            </div>
        </div>
    </nav>