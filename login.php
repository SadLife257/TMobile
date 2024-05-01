<?php 
    include './connect.php';
    include 'header.php';
?>
    <title>TMobile - Đăng nhập</title>
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
                            <h2>Đăng Nhập</h2>
                        </div>
                </div>
            </div>
        </div>
    </section>
  <!-- breadcrumb end-->

    <!--================login_part Area =================-->
    <section class="login_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <h2>Mới đến cửa hàng của chúng tôi?</h2>
                            <p>Vui lòng đăng ký tài khoản để có trải nghiệm tốt nhất</p>
                            <a href="register.php" class="btn_3">Đăng ký</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>Chào Mừng Trở Lại ! <br> Đăng Nhập Ngay</h3>
                            <?php
                                if (isset($_POST["dangnhap"])) {
                                    $email = ($_POST["email"]);
                                    $matkhau = ($_POST["matkhau"]);
                                    if (rowCount("SELECT * FROM taikhoan WHERE taikhoan='$email' && matkhau='$matkhau' && status =0") == 1) {
                                        setcookie('user', $email, time() + (86400 * 30), "/");
                                        header('location:index.php');
                                    } 
                                    else if (rowCount("SELECT * FROM taikhoan WHERE status =1") == 1){
                                        $error = 'Tài khoản của bạn đã bị khóa. Vui lòng liên hệ admin';
                                    }
                                    else{
                                        $error = 'Tài khoản hoặc mật khẩu không chính xác. Vui lòng kiểm tra lại';
                                    }
                                }
                            ?>
                            <form class="row contact_form" action="" method="post" novalidate="novalidate">
                                <?php
                                    if (isset($error)) {
                                    ?>
                                        <p class="text-danger ml-3 mb-3"><?= $error ?></p>
                                    <?php
                                    }
                                ?>
                                <div class="col-md-12 form-group p_star exampleInputName1">
                                    <input type="text" class="form-control"  name="email" value="" required placeholder="Tài khoản (Email)">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" name="matkhau" value="" required placeholder="Mật khẩu">
                                </div>
                                <div class="col-md-12 form-group">
                                    <!-- <div class="creat_account d-flex align-items-center">
                                        <input type="checkbox" id="f-option" name="selector">
                                        <label for="f-option">Remember me</label>
                                    </div> -->
                                    <button type="submit" name="dangnhap" class="btn_3">
                                        đăng nhập
                                    </button>
                                    <!-- <a class="lost_pass" href="#">quên mật khẩu?</a> -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================login_part end =================-->

    <?php 
        include 'footer.php';
    ?>
</body>

</html>