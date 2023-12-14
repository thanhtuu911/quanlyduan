
<?php require "layout/client/header_client.php";

?>


<!----------------------------------------------------------------------------------------------------->
        <!--Đăng ký-->
        <div class="container bg-light">
            <div class="row mt-5">
                <div class="col-md-6 img-login">
                    <img src="public/image/logoKS.png" class="img-fluid" width="100%" alt="">
                </div>
                <div class="col-md-6 mt-5">
                    <h2>Quên mật khẩu</h2>
                    <form action="/du_an_1_poly_hotel/?role=client&mod=auth&action=saveForgotPassword" method="POST">
                       
                        <div class="form-group">
                            <!-- <label for="my-login">Email</label> -->
                            <input id="my-login" class="form-control border-bottom"  type="email" name="email" placeholder="Email" required>
                        </div>
                        
                        <div class="form-group">
                        <?php foreach ($notifications as $notification) : ?>
                        <?php foreach ($notification['msgs'] as $msg): ?>
                            <span class="label label-lg label-light-<?php echo $notification['type'] ?> label-inline mb-3"><?php echo $msg ?></span>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                        </div>
                        <div class="form-group">
                            <!-- <label for="my-login">Email</label> -->
                            <input id="my-login" class="form-control border-bottom bg-success text-white"   type="submit" name="submit" value="Lấy lại mật khẩu">
                           
                       
                        </div>
                        
                    </form>
                    <!-- <div style="margin-bottom:40px ;">
                        Bạn đã có tài khoản? <a href="/du_an_1_poly_hotel/?role=client&mod=auth" style="color:#00a79e;">Đăng nhập</a>
                    </div> -->
                 
                </div>
            </div>
        </div>
        <!--ENd Đăng ký-->
<?php require "layout/client/footer_client.php" ?>