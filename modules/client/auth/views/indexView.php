<?php require "layout/client/header_client.php" ?>
<!----------------------------------------------------------------------------------------------------->
        <!--Đăng nhập-->
        <div class="container bg-light">
            <div class="row mt-5">
                <div class="col-md-6 img-login">
                    <img src="./public/image/logoKS.png" class="img-fluid" width="100%" alt="">
                </div>
                <div class="col-md-6 mt-5">
                    <h2>Đăng nhập</h2>
                    
                    <div class="form-row mt-3">
                       <div class="form-group col-lg-6 col-md-12 col-12">
                        <i class="fa-brands fa-google" style="position:absolute ; font-size: 23px; padding: 9px;"></i>
                        <input id="my-input" class="form-control" type="submit" name="" value="Đăng nhập Google">
                       </div>
                       <div class="form-group col-lg-6 col-md-12 col-12">
                        <i class="fa-brands fa-facebook" style="position:absolute ; font-size: 25px; padding: 8px ;"></i>
                        <input id="my-input" class="form-control" type="submit" name="" value="Đăng nhập Facebook">
                       </div>
                    </div>
                    <h5 class="text-center mt-2 mb-3">-Hoặc-</h5>
                  
                    <form action="/du_an_1_poly_hotel/?role=client&mod=auth" method="post">
                        <div class="form-group">
                            <!-- <label for="my-login">Email</label> -->
                            <input id="my-login" class="form-control border-bottom"  type="email" name="email" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <!-- <label for="my-login">Email</label> -->
                            <input id="my-login" class="form-control border-bottom"  type="password" name="password" placeholder="Password">
                        </div>
                        <div class="float-left" style="color:#00a79e;">
                            Đăng nhập bằng số điện thoại
                        </div>
                        <div class="float-right mb-3">
                        <a href="/du_an_1_poly_hotel/?role=client&mod=auth&action=forgotPassword">Quên mật khẩu?</a>

                        </div>
                        <br>
                        <?php foreach ($notifications as $notification) : ?>
                        <?php foreach ($notification['msgs'] as $msg): ?>
                            <span class="label label-lg label-light-<?php echo $notification['type'] ?> label-inline mb-3"><?php echo $msg ?></span>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                        <div class="form-group">
                            <!-- <button class="btn btn-primary"> Đăng nhập</button> -->
                            <!-- <label for="my-login">Email</label> -->
                            <input id="my-login" class="form-control bg-success text-white"  style="height:45px;"  type="submit" name="" value="Đăng nhập">
                        </div>
                    </form>
                    <div  style="margin-bottom:40px ;">
                        Bạn chưa có tài khoản? <a href="dangky.html" style="color:#00a79e;">Đăng ký</a>
                    </div>
                 
                </div>
            </div>
        </div>
        <!--ENd Đăng nhập-->
<?php require "layout/client/footer_client.php" ?>
