<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="./controller/script.js"></script>
    <title>ADMIN</title>
</head>

<body>
    <!-- header -->
    <header class="pb-4">
        <div class="bg-secondary-subtle p-5">
            <h1 class="fw-bold mb-4">TRANG CHỦ ADMIN</h1>
            <div class="ms-5">
                <button class="btn btn-info me-2 mb-2 mb-sm-0">
                    <a href="index.php" class="text-decoration-none text-dark fw-bold">Trang chủ</a>
                </button>
                <button class="btn btn-warning me-2 mb-2 mb-sm-0">
                    <a href="index.php?act=danhmuc" class="text-decoration-none text-dark fw-bold">Danh mục</a>
                </button>
                <button class="btn btn-success me-2 mb-2 mb-sm-0">
                    <a href="index.php?act=sanpham" class="text-decoration-none text-light fw-bold">Sản phẩm</a>
                </button>
                <button class="btn btn-primary me-2">
                    <a href="index.php?act=user" class="text-decoration-none text-light fw-bold">Tài khoản</a>
                </button>
                <button class="btn btn-danger me-2">
                    <a href="index.php?act=thoat" class="text-decoration-none text-light fw-bold text-center">Đăng
                        xuất</a>
                </button>
            </div>
        </div>
    </header>