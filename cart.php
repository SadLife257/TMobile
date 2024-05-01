<?php 
    include './connect.php';
    include 'header.php';
?>
  <title>TMobile - Giỏ hàng</title>
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
                            <h2>Giỏ Hàng</h2>
                        </div>
                </div>
            </div>
        </div>
    </section>
  <!-- breadcrumb end-->

  <!--================Cart Area =================-->
  <section class="cart_area padding_top1">
    <div class="container">
        <?php
        if (isset($_COOKIE["user"])) {
            $taikhoan = $_COOKIE["user"];
            foreach (selectAll("SELECT * FROM taikhoan WHERE taikhoan='$taikhoan'") as $row) {
                $idtaikhoan = $row['id'];
                $diachitaikhoan = $row['diachi'];

            }
        ?>
            <form class="cart_inner" method="post" action="">
                <div class="table-responsive">
                    <a href="history.php" class="btn_1" style="float:right; margin-bottom:20px;">Lịch sử đặt hàng</a>

                        <?php
                         
                            if (rowCount("SELECT * FROM donhang WHERE id_taikhoan=$idtaikhoan && status=0") > 0) {
                                foreach (selectAll("SELECT * FROM donhang WHERE status=0 && id_taikhoan=$id_nguoidung") as $item) {
                                    $idDh= $item['id'];
                                }
                                if (rowCount("SELECT * FROM ctdonhang WHERE id_donhang=$idDh") > 0) {
                        ?>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Sản phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Tổng</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $tongcong =0;
                                foreach (selectAll("SELECT * FROM ctdonhang WHERE id_donhang=$idDh") as $item) {
                                    $idSp = $item['id_sanpham'];
                                    $tong = $item['soluong'] * $item['gia'];
                                    $tongcong = $tongcong + $tong;
                            ?>
                            <tr>
                                <td>
                                <?php 
                                foreach (selectAll("SELECT * FROM sanpham WHERE id={$item['id_sanpham']}") as $row) {
                                    ?>
                                <div class="media">
                                    <div class="d-flex">
                                    <img src="img/product/<?= $row['anh1'] ?>" alt="" style="width:50px; height:50px;"/>
                                    </div>
                                    <div class="media-body">
                                    
                                                <p><?= $row['ten'] ?></p>
                                            <?php
                                        }
                                    ?>
                                    </div>
                                </div>
                                </td>
                                <td>
                                <h5><?= number_format($item['gia']) ?>đ</h5>
                                </td>
                                <td>
                                <div class="product_count">
                                    <input class="input-number" type="number" name="soluong" value="<?= $item['soluong'] ?>" min="1" max="100"/>

                                </div>
                                </td>
                                <td>
                                <h5><?= number_format($tong) ?>đ</h5>
                                </td>
                                <td>
                                    <a class="genric-btn primary circle" href="?removeproduct=<?= $item['id_sanpham'] ?>">Xóa</a>
                                </td>
                                
                            </tr>
                            <?php
                                }
                            ?>
                            <tr class="bottom_button">
                                
                                <td>
                                <!-- <a class="btn_1" href="?updatecart=<?= $item['id_donhang'] ?>">Cập nhật</a> -->
                                </td>
                                <td></td>
                                <td>
                                    <h5>Tổng cộng: </h5>
                                </td>
                                <td>
                                    <h5><?= number_format($tongcong) ?>đ</h5>
                                </td>
                                <td>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <div class="checkout_btn_inner">
                                        <h5>Nhập địa chỉ nhận hàng: </h5>
                                        <textarea name="diachi" id="" cols="70" rows="4" placeholder="Nhập địa chỉ nhận hàng" required> <?= $diachitaikhoan ?></textarea>
                                    </div>
                                </td>
                                <td></td>
                                <td>
                                <h5></h5>
                                </td>
                                <td>
                                <h5></h5>
                                </td>
                                <td></td>
                            </tr>
                           
                            </tbody>
                        </table>
                
                <div class="checkout_btn_inner float-right">
                    <a class="btn_1" href="product.php">Tiếp Tục Mua Sắm</a>
                    <input class="btn_1" type='submit' name="dathang" value="Đặt Hàng" style="border: none"/>
                </div>
                </div>
                <?php
                    } else {
                    ?>
                        <a href="product.php" class="btn_1" style="float:right; margin:0px 20px 20px 0px;">Mua Ngay</a>
                        <h2>Giỏ hàng của bạn đang trống</h2>
                        
                    <?php
                    }
                    ?>
            </form>
        <?php
        } else {
        ?>
        <h2>Giỏ hàng của bạn đang trống</h2>
        <?php
        }
        if (isset($_GET['removeproduct'])) {
            selectAll("DELETE FROM ctdonhang WHERE id_donhang=$idDh && id_sanpham={$_GET['removeproduct']}");
            header('location:cart.php');
        } 
        ?>
    <?php
    }
    ?>
    <?php
     
        if (isset($_POST["dathang"])) {
            $diachi = $_POST["diachi"];
            selectall("UPDATE donhang SET diachi='$diachi',thoigian='$today', tongtien= $tongcong, status=1 WHERE id_taikhoan=$idtaikhoan && status=0");
            echo "<script>alert('Đặt hàng thành công')
                location.href='product.php'
            </script>";
        }
    ?>
  </section>

  <!--================login_part end =================-->

  <?php 
        include 'footer.php';
    ?>
</body>

</html>