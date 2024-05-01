<?php 
    include './connect.php';
    include 'header.php';
?>

    <title>TMobile</title>
</head>

<body>
    <?php include 'navbar.php';?>

    <!-- banner part start-->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="banner_slider owl-carousel">
                    <?php 
                    foreach (selectAll("SELECT * FROM slide") as $item) {
                        ?>
                        <div class="single_banner_slider">
                            <div class="row">
                                <div class="col-lg-5 col-md-8">
                                    <div class="banner_text">
                                        <div class="banner_text_iner">
                                            <h1 class="addfont" style="text-transform: none;"><?= $item['ten'] ?></h1>
                                            <p><?= $item['mota'] ?></p>
                                            <a href="<?= $item['link'] ?>" class="btn_2">mua ngay</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="banner_img d-none d-lg-block">
                                    <img src="img/slide/<?= $item['anh'] ?>" alt="">
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                    ?>
                    </div>
                    <!-- <div class="slider-counter"></div> -->
                </div>
            </div>
        </div>
    </section>
    <!-- banner part start-->

    <!-- feature_part start-->
    <section class="feature_part padding_top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section_tittle text-center">
                        <h2>Sản Phẩm Nổi Bật</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-between">
                <?php 
                    foreach (selectAll("SELECT * FROM sanpham ORDER BY luotxem DESC LIMIT 4 ") as $item) {
                ?>
                <div class="col-lg-6 col-sm-6">
                    <div class="single_feature_post_text">
                        <p>Apple</p>
                        <h3><?= $item['ten'] ?></h3>
                        <a href="detail.php?id=<?= $item['id'] ?>" class="feature_btn">KHÁM PHÁ NGAY <i class="fas fa-play"></i></a>
                        <img height="250px" src="img/product/<?= $item['anh1'] ?>" alt="">
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>

    <!-- product_list part start-->
    <section class="product_list best_seller">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section_tittle text-center">
                        <h3>Sản Phẩm Mới</h3>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-12">
                    <div class="best_product_slider owl-carousel">
                    <?php 
                        foreach (selectAll("SELECT * FROM sanpham ORDER BY id DESC LIMIT 8 ") as $item) {
                    ?>
                        <div class="single_product_item">
                            <a href="detail.php?id=<?= $item['id'] ?>" >
                                <img src="img/product/<?= $item['anh1'] ?>" alt="">
                            </a>
                            <div class="single_product_text">
                                <a href="detail.php?id=<?= $item['id'] ?>" >
                                <h4><?= $item['ten'] ?></h4>
                                <h3><?= number_format($item['gia']) . 'đ' ?></h3>
                                </a>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product_list part end-->

    <!-- subscribe_area part start-->
    <section class="subscribe_area section_padding" style="margin-bottom: 50px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="subscribe_area_text text-center">
                        <h5>THAM GIA BẢN TIN CỦA CHÚNG TÔI</h5>
                        <h2>Đăng ký để được cập nhật các ưu đãi mới nhất</h2>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="nhập địa chỉ email" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <a href="#" class="input-group-text btn_2" id="basic-addon2">theo dõi ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <?php include 'footer.php';?>
</body>

</html>