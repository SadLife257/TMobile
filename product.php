<?php 
    include './connect.php';
    if (isset($_GET["id"])) {
        foreach (selectAll("SELECT * FROM danhmuc WHERE id={$_GET['id']}") as $item) {
           $tendanhmuc = $item['danhmuc'];
            $iddanhmuc = $item['id'];
        }
    }
    include 'header.php';
?>
<?php include 'header.php';?>
    <title>TMobile - Sản phẩm</title>
</head>

<style>
.header_bg {
    background-color: #ecfdff;
    height: 230px;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
.padding_top1{
    padding-top:20px;
}
.a1{
    padding-top:130px;
}

.a2{
    height: 230px;

}
.parentContainer {
    position: relative;
    text-align: center;
    color: white;
}
.centered {
    position: absolute;
    top: 50%;
    left: 50%;
}
</style>

<body>
<?php include 'navbar.php';?>
  <!--================Home Banner Area =================-->
  <!-- breadcrumb start-->
  <section class="breadcrumb header_bg">
        <div class="container">
            <div class="row justify-content-center a2">
                <div class="col-lg-8 a2">
                        <div class="a1">
                            <h2>Sản Phẩm</h2>
                        </div>
                </div>
            </div>
        </div>
    </section>
  <!-- breadcrumb end-->

    <!--================Category Product Area =================-->
    <section class="cat_product_area ">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="left_sidebar_area">
                        <aside class="left_widgets p_filter_widgets">
                            <div class="l_w_title">
                                <h3>Danh Mục Sản Phẩm</h3>
                            </div>
                            <div class="widgets_inner">
                                <ul class="list">
                                <?php 
                                    foreach (selectAll("SELECT * FROM danhmuc") as $item) {
                                        ?>
                                            <li><a href="category.php?id=<?= $item['id_dm'] ?>"><?= $item['danhmuc'] ?></a></li>
                                        <?php
                                    }
                                ?>
                                </ul>
                            </div>
                        </aside>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product_top_bar d-flex justify-content-between align-items-center">
                                
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center latest_product_inner">
                    <?php 
                        if (isset($_GET["tim"])) {
                            $keyword = $_GET["tim"];
                            $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:6;
                            $current_page = !empty($_GET['page'])?$_GET['page']:1;
                            $offset = ($current_page - 1) * $item_per_page;
                            $numrow = rowCount("SELECT * FROM `sanpham` WHERE `ten` LIKE '%$keyword%' AND status = 0");
                            $totalpage = ceil($numrow / $item_per_page);
                            if (rowCount("SELECT * FROM `sanpham` WHERE `ten` LIKE '%$keyword%' AND status = 0")>0) {
                                foreach (selectAll("SELECT * FROM `sanpham` WHERE `ten` LIKE '%$keyword%' AND status = 0 LIMIT $item_per_page OFFSET $offset") as $row) {
                                ?>              
                                <div class="col-lg-4 col-sm-6" style="height: 400px;">
                                    <div class="single_product_item" <?= $row['id'] ?> >
                                        <a href="detail.php?id=<?= $row['id'] ?>" >
                                            <img src="img/product/<?= $row['anh1'] ?>" style="width: 230px;height: 230px;" alt="">
                                        </a>
                                        <div class="single_product_text">
                                            <h4 style="font-size: 16px"><?= $row['ten'] ?></h4>
                                            <h3><?= number_format($row['gia']) . 'đ' ?></h3>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                }
                            }else{
                            ?>
                                <p>Không tìm thấy sản phẩm</p>
                            <?php
                            }?>
                            <div class="col-lg-12">
                            <div class="pageination">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">
                                    <?php 
                                        if ($current_page>1){
                                            $prev_page = $current_page - 1;
                                    ?>
                                        <li class="page-item">
                                            <a class="page-link" href="?tim=<?=$keyword?>&per_page=<?=$item_per_page?>&page=<?=$prev_page?>" aria-label="Previous">
                                                <i class="ti-angle-double-left"></i>
                                            </a>
                                        </li>
                                    <?php 
                                    } ?>
                                        
                                        <?php for($num = 1; $num <=$totalpage;$num++) { ?>
                                            <?php 
                                                if ($num != $current_page){ 
                                            ?>
                                                <?php if ($num > $current_page-3 && $num < $current_page+3){ ?>
                                                <li class="page-item"><a class="page-link" href="?tim=<?=$keyword?>&per_page=<?=$item_per_page?>&page=<?=$num?>"><?=$num?></a></li>
                                                <?php } ?>
                                            <?php 
                                            } 
                                            else{ 
                                            ?>
                                                <strong class="page-item"><a class="page-link"><?=$num?></a></strong>
                                            <?php 
                                            }
                                        } 
                                        ?>

                                    <?php 
                                        if ($current_page < $totalpage - 1){
                                            $next_page = $current_page + 1;
                                    ?>
                                        <li class="page-item">
                                            <a class="page-link" href="?tim=<?=$keyword?>&per_page=<?=$item_per_page?>&page=<?=$next_page?>" aria-label="Next">
                                                <i class="ti-angle-double-right"></i>
                                            </a>
                                        </li>
                                    <?php 
                                        } ?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <?php    
                        }
                        else{
                        ?>
                            <div class="row align-items-center latest_product_inner">
                                
                                <?php 
                                $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:6;
                                $current_page = !empty($_GET['page'])?$_GET['page']:1;
                                $offset = ($current_page - 1) * $item_per_page;
                                $numrow = rowCount("SELECT * FROM sanpham WHERE status = 0");
                                $totalpage = ceil($numrow / $item_per_page);
                                foreach (selectAll("SELECT * FROM sanpham WHERE status = 0 LIMIT $item_per_page OFFSET $offset") as $row) {    
                                ?>
                                    <div class="col-lg-4 col-sm-6" style="height: 400px;">
                                        <div class="single_product_item" <?= $row['id'] ?> >
                                            <a href="detail.php?id=<?= $row['id'] ?>" >
                                                <img src="img/product/<?= $row['anh1'] ?>" style="width: 230px;height: 230px;" alt="">
                                            </a>
                                            <div class="single_product_text">
                                                <h4 style="font-size: 16px"><?= $row['ten'] ?></h4>
                                                <h3><?= number_format($row['gia']) . 'đ' ?></h3>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                                <div class="col-lg-12">
                            <div class="pageination">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">
                                    <?php 
                                        if ($current_page>1){
                                            $prev_page = $current_page - 1;
                                    ?>
                                        <li class="page-item">
                                            <a class="page-link" href="?per_page=<?=$item_per_page?>&page=<?=$prev_page?>" aria-label="Previous">
                                                <i class="ti-angle-double-left"></i>
                                            </a>
                                        </li>
                                    <?php 
                                    } ?>
                                        
                                        <?php for($num = 1; $num <=$totalpage;$num++) { ?>
                                            <?php 
                                                if ($num != $current_page){ 
                                            ?>
                                                <?php if ($num > $current_page-3 && $num < $current_page+3){ ?>
                                                <li class="page-item"><a class="page-link" href="?per_page=<?=$item_per_page?>&page=<?=$num?>"><?=$num?></a></li>
                                                <?php } ?>
                                            <?php 
                                            } 
                                            else{ 
                                            ?>
                                                <strong class="page-item"><a class="page-link"><?=$num?></a></strong>
                                            <?php 
                                            }
                                        } 
                                        ?>

                                    <?php 
                                        if ($current_page < $totalpage - 1){
                                            $next_page = $current_page + 1;
                                    ?>
                                        <li class="page-item">
                                            <a class="page-link" href="?per_page=<?=$item_per_page?>&page=<?=$next_page?>" aria-label="Next">
                                                <i class="ti-angle-double-right"></i>
                                            </a>
                                        </li>
                                    <?php 
                                        } ?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <?php
                        }?>

                        
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Category Product Area =================-->

       <!-- product_list part start-->
       <section class="product_list best_seller">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section_tittle text-center">
                        <h3>Sản Phẩm HOT</h3>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-12">
                    <div class="best_product_slider owl-carousel">
                    <?php 
                        foreach (selectAll("SELECT * FROM sanpham ORDER BY luotxem DESC LIMIT 5 ") as $item) {
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
    <?php 
        include 'footer.php';
    ?>
</body>

</html>