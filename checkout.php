<?php 
    include './connect.php';
    include 'header.php';
?>
    <title>TMobile - Đặt hàng</title>
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
                            <h2>Đặt Hàng</h2>
                        </div>
                </div>
            </div>
        </div>
    </section>
  <!-- breadcrumb end-->

    <!--================Checkout Area =================-->
    <section class="checkout_area padding_top">
        <div class="container">
            <div class="billing_details">
                <div class="row" >
                    <div class="col-lg-12" style="align-items: center;">
                        <div class="order_box">
                            <h2>Đơn Hàng Của Bạn</h2>
                            <ul class="list">
                                <li>
                                    <a href="#">Sản Phẩm
                                        <span>Thành Tiền</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">Fresh Blackberry 
                                        <span class="middle">x 02</span>
                                        <span class="last">$720.00</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">Fresh Tomatoes
                                        <span class="middle">x 02</span>
                                        <span class="last">$720.00</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">Fresh Brocoli
                                        <span class="middle">x 02</span>
                                        <span class="last">$720.00</span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="list list_2">
                                <li>
                                    <a href="#">Tổng
                                        <span>$2160.00</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">Phí Ship
                                        <span> $50.00</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">Tổng cộng
                                        <span>$2210.00</span>
                                    </a>
                                </li>
                            </ul>
                            
                            <div class="payment_item active">
                                    <label for="f-option6">Điền địa chỉ nhận hàng </label>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="email" name="compemailany">
                                    <span class="placeholder" data-placeholder="Email Address"></span>
                                </div>
                            </div>
                        </div>
                        <div style="margin:auto;padding-top: 10px">
                            <a class="btn_3" href="#" >Đặt hàng</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Checkout Area =================-->

    <?php include 'footer.php';?>
</body>

</html>