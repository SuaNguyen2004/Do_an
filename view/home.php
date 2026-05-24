<!-- ! home -->
<div class="container pb-5 bg-light" style="margin-top: 80px">
    <div class="text-center my-5">
        <h2 class="fw-bold main-title">DANH SÁCH SẢN PHẨM</h2>
    </div>

    <!-- ? danh mục 1 -->
    <div class="mb-5">
        <div>
            <h3 class="category-title text-uppercase fw-bold">Đồ uống</h3>
            <div class="border-bottom border-2 mb-4"></div>
        </div>

        <!-- ! sản phẩm 1 -->
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 text-center">
            <div class="col">
                <div class="card h-100 product-card">
                    <a href="chi-tiet-san-pham.html" class="product-img-box">
                        <img src="./view/images/heineken.jpg" alt="Bia Heineken" />
                    </a>

                    <div class="card-body d-flex flex-column pt-0">
                        <a href="chi-tiet-san-pham.html" class="text-decoration-none">
                            <h5 class="product-name fw-bold">Sản phẩm 1</h5>
                        </a>
                        <p class="product-price fw-bold">10.000 VNĐ</p>
                        <form action="index.php?act=giohang" method="post">
                            <input type="hidden" name="id" value="1">
                            <input type="hidden" name="tensp" value="Sản phẩm 1">
                            <input type="hidden" name="img" value="heineken.jpg">
                            <input type="hidden" name="gia" value="10000">
                            <input type="submit" value="Thêm vào giỏ" name="addtocart"
                                class="rounded-pill mt-auto d-flex justify-content-between align-items-center w-100 fw-bold btn-add-cart p-2">
                        </form>
                    </div>
                </div>
            </div>

            <!-- ! sản phẩm 2 -->
            <div class="col">
                <div class="card h-100 product-card shadow-sm">
                    <a href="chi-tiet-san-pham.html" class="product-img-box">
                        <img src="./view/images/heineken.jpg" alt="Bia Heineken" />
                    </a>
                    <div class="card-body d-flex flex-column pt-0">
                        <a href="chi-tiet-san-pham.html" class="text-decoration-none">
                            <h5 class="product-name fw-bold">Sản phẩm 2</h5>
                        </a>
                        <p class="product-price fw-bold">20.000 VNĐ</p>
                        <form action="index.php?act=giohang" method="post">
                            <input type="hidden" name="id" value="2">
                            <input type="hidden" name="tensp" value="Sản phẩm 2">
                            <input type="hidden" name="img" value="heineken.jpg">
                            <input type="hidden" name="gia" value="20000">
                            <input type="submit" value="Thêm vào giỏ" name="addtocart"
                                class="rounded-pill mt-auto d-flex justify-content-between align-items-center w-100 fw-bold btn-add-cart p-2">
                        </form>
                    </div>
                </div>
            </div>

            <!-- ! sản phẩm 3 -->
            <div class="col">
                <div class="card h-100 product-card shadow-sm">
                    <a href="chi-tiet-san-pham.html" class="product-img-box">
                        <img src="./view/images/heineken.jpg" alt="Bia Heineken" />
                    </a>
                    <div class="card-body d-flex flex-column pt-0">
                        <a href="chi-tiet-san-pham.html" class="text-decoration-none">
                            <h5 class="product-name fw-bold">Sản phẩm 3</h5>
                        </a>
                        <p class="product-price fw-bold">30.000 VNĐ</p>
                        <form action="index.php?act=giohang" method="post">
                            <input type="hidden" name="id" value="3">
                            <input type="hidden" name="tensp" value="Sản phẩm 3">
                            <input type="hidden" name="img" value="heineken.jpg">
                            <input type="hidden" name="gia" value="30000">
                            <input type="submit" value="Thêm vào giỏ" name="addtocart"
                                class="rounded-pill mt-auto d-flex justify-content-between align-items-center w-100 fw-bold btn-add-cart p-2">
                        </form>
                    </div>
                </div>
            </div>

            <!-- ! sản phẩm 4 -->
            <div class="col">
                <div class="card h-100 product-card shadow-sm">
                    <a href="chi-tiet-san-pham.html" class="product-img-box">
                        <img src="./view/images/heineken.jpg" alt="Bia Heineken" />
                    </a>
                    <div class="card-body d-flex flex-column pt-0">
                        <a href="chi-tiet-san-pham.html" class="text-decoration-none">
                            <h5 class="product-name fw-bold">Bia Heineken</h5>
                        </a>
                        <p class="product-price fw-bold">0 VNĐ</p>
                        <form action="index.php?act=giohang" method="post">
                            <button type="submit"
                                class="rounded-pill mt-auto d-flex justify-content-between align-items-center w-100 fw-bold btn-add-cart"
                                name="addtocart">
                                <span>THÊM VÀO GIỎ</span>
                                <i class="fas fa-cart-plus"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ! end home -->