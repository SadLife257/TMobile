<?php 
    include './connect.php';
    include 'header.php';
?>
    <title>TMobile - Liên hệ</title>
</head>
<style>
    .header_bg {
        background-color: #ecfdff;
        height: 230px;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    
    .padding_top1 {
        padding-top: 20px;
    }
    
    .a1 {
        padding-top: 130px;
    }
    
    .a2 {
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
                        <h2>Thông Tin Liên Hệ</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb end-->

    <!-- ================ contact section start ================= -->
    <section class="contact-section" style="margin: 100px 0px 100px;">
        <div class="container">

            <div class="row">
                
                <div class="col-lg-8">
                        <div class="row">
                            <div class="col-12">
                                <div id="map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15680.09560268348!2d106.6997639!3d10.7326399!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528b2747a81a3%3A0x33c1813055acb613!2zxJDhuqFpIGjhu41jIFTDtG4gxJDhu6ljIFRo4bqvbmc!5e0!3m2!1svi!2s!4v1713712873594!5m2!1svi!2s" 
                                    width="600" 
                                    height="450" 
                                    style="border:0;" 
                                    allowfullscreen="" 
                                    loading="lazy" 
                                    referrerpolicy="no-referrer-when-downgrade">
                                </iframe>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="col-lg-4">
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-home"></i></span>
                        <div class="media-body">
                            <h3>Địa Chỉ</h3>
                            <p>19 Đ. Nguyễn Hữu Thọ, Tân Hưng, Quận 7, Thành phố Hồ Chí Minh</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                        <div class="media-body">
                            <h3>Hotline</h3>
                            <p>0987.654.321 (8h00 - 22h00)</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-email"></i></span>
                        <div class="media-body">
                            <h3>Email</h3>
                            <p>tmobile@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->

    <?php 
        include 'footer.php';
    ?>
</body>

</html>