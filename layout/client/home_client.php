<!--Slide Show-->


<div id="my-carousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li class="active" data-target="#my-carousel" data-slide-to="0" aria-current="location"></li>
        <li data-target="#my-carousel" data-slide-to="1"></li>
        <li data-target="#my-carousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="public/image/banner1.png" alt="">
            <div class="carousel-caption d-none d-md-block">
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="public/image/banner2.png" alt="">
            <div class="carousel-caption d-none d-md-block">

            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="public/image/banner3.png" alt="">
            <div class="carousel-caption d-none d-md-block">
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#my-carousel" data-slide="prev" role="button">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#my-carousel" data-slide="next" role="button">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!--End Slide show-->
<!-------------------------------------------------------------------------------------------->

<!--Form Search, Lọc -->
<div class="container">
    <form action="/du_an_1_poly_hotel/?role=client&mod=search&action=index" method="POST">
        <div class="row mt-4">
            <div class="form-group col-md-9 col-sm-12 mt-2">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" class="form-control pl-5" id="exampleInput" placeholder="Tìm kiếm..." name="keyword">
            </div>
            <div class="form-group col-md-3 col-sm-12 mt-2">
                <!-- <button type="submit" class="form-control bg-success" >Tìm kếm</button> -->
                <input type="submit" class="form-control bg-success"  value="Tìm kiếm" name="search">
            </div>
        </div>
    </form>

    <form action="">
        <div class="row">
            <div class="form-group col-md-6 col-sm-12">
                <select id="my-select" class="form-control" name="">
                    <option value="">Lọc theo giá</option>
                    <option>Dưới 1tr</option>
                    <option>Trên 1tr</option>
                    <option>Dưới 500k</option>
                    <option>Dưới 1tr</option>
                    <option>Dưới 1tr</option>
                </select>
            </div>

            <div class="form-group col-md-6 col-sm-12">
                <div class="dropdown show">
                    <a class="btn border dropdown-toggle col-12 " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Lọc theo loại phòng
                    </a>
                    <ul class="dropdown-menu bg-color1 col-12" aria-labelledby="dropdownMenuLink">
                    <?php foreach ($categories as $category) : ?>
                           <a class="dropdown-item bg-light " href="/du_an_1_poly_hotel/?role=client&mod=category&action=index&id=<?= $category['id'] ?>">
                               <?= $category['name'] ?>
                           </a>
                   <?php endforeach ?>
                     
                    </ul>
                       
                
            </div>

           



        </div>
</div>
</form>


</div>
<!--End form search, lọc-->
<!-------------------------------------------------------------------------------------------->
<hr class="display-4">
<!--Content-->

<div class="container-fluid">
    <div class="row text-center">
        <div class="col-12 text">
            <h1>Khám phá khách sạn Poly's Hotel tiêu chuẩn</h1>
            <p style="font-size: 15px; color:gray;">Poly's Hotel đảm bảo các tiêu chí về chất lượng phòng,
                thiết bị nội thất và dịch vụ cơ bản, đáp ứng linh hoạt nhu cầu thuê phòng cùng mức giá hợp lý.</p>
        </div>
    </div>


    <div class="slide-container swiper mt-4">
        <div class="row slide-content">
            <!-- sp -->
            <div class="card-wrapper swiper-wrapper col-12">

             

              <?php foreach($production4 as $item) : ?>
                <div class="card swiper-slide ">
                    <div class="card-image">
                        <img src="<?=$item['image'] ?>" alt="" width="100%" class="img-fluid">
                    </div>
                    
                    <div class="card-name text col-12">
                        <a href="/du_an_1_poly_hotel/?role=client&mod=product_details&action=index&id=<?= $item['id'] ?>">
                            <h2 class="text"><?= $item['name']?> </h2>
                        </a>
                        <a href="" class="text-danger" style="float:left ; font-size:20px ;">$<?= $item['price']?></a>
                        <a href="/du_an_1_poly_hotel/?role=client&mod=cart&id=<?php echo $item['id']?>" class="text" style="float:right ; "><span class="rounded-circle"><i class="fa-solid fa-heart" style="margin:0px 0px 0px 3.5px;"></i></span></a>
                    </div>
                </div>
                <?php endforeach ?>
                </div>
            </div>

            <div class="swiper-button-next swiper-navBtn"></div>
            <div class="swiper-button-prev swiper-navBtn"></div> <br>
            <div class="swiper-pagination"></div>
        </div>
    </div>



    <!--End Content-->
    <!-------------------------------------------------------------------------------------------->

  

    <!-------------------------------------------------------------------------------------------->

   
<!-------------------------------------------------------------------------------------------->

<!--Banner 2-->
<div class="container-fluid">
    <div class="row mt-4">
        <img src="public/image/banner4.png" alt="" class="img-fluid">
    </div>
</div>
<!--End Banner 2-->

<!-------------------------------------------------------------------------------------------->

<!--Top Favorite Rooms-->

<div class="container-fluid mt-4">
    <div class="row text-center">
        <div class="col-12 text">
            <h1>Phòng được nhiều người yêu thích nhất</h1>
        </div>
    </div>



    <div class="slide-container swiper mt-4">
        <div class="row slide-content2">
            <div class="card-wrapper swiper-wrapper col-12">
                <?php foreach ($production as $item) : ?>
                    <div class="card swiper-slide ">
                        <div class="card-image">
                            <img src="<?= $item['image'] ?>" alt="" width="100%" class="img-fluid">
                        </div>

                        <div class="card-name text col-12">
                            <a href="/du_an_1_poly_hotel/?role=client&mod=product_details&action=index&id=<?= $item['id'] ?>">
                                <h2 class="text"><?= $item['name'] ?> </h2>
                            </a>
                            <a href="/du_an_1_poly_hotel/?role=client&mod=product_details&action=index&id=<?= $item['id'] ?>" class="text-danger" style="float:left ; font-size:20px ;">$<?= $item['price'] ?></a>
                                                       <a href="" class="text" style="float:right ; "><span class="rounded-circle"><i class="fa-solid fa-heart" style="margin:0px 0px 0px 3.5px;"></i></span></a>

                        </div>
                    </div>
                <?php endforeach ?>
            </div>

        </div>

        <div class="swiper-button-next swiper-navBtn"></div>
        <div class="swiper-button-prev swiper-navBtn"></div> <br>
        <div class="swiper-pagination2 mx-auto"></div>


    </div>
</div>
<!--End Top Favorite Rooms-->
<!-------------------------------------------------------------------------------------------->
<hr class="display-4">
<!--List Room-->
<div class="container-fluid mt-4">
    <div class="row text-center">
        <div class="col-12 text">
            <h1>Khám phá thêm</h1>
            <p style="font-size: 15px; color:gray;"> Chúng tôi đưa ra cho bạn những gợi ý khác có thể bạn sẽ quan
                tâm</p>

        </div>
    </div>
    <div class="slide-container swiper mt-4">
        <div class="row slide-content3">
            <div class="card-wrapper swiper-wrapper col-12">
                <?php foreach ($productions as $item) : ?>
                    <div class="card swiper-slide ">
                        <div class="card-image">
                            <img src="<?= $item['image'] ?>" alt="" class="img-fluid" width="100%">
                        </div>
                        <div class="card-name text col-12">
                            <a href="/du_an_1_poly_hotel/?role=client&mod=product_details&action=index&id=<?= $item['id'] ?>">
                                <h2 class="text"><?= $item['name'] ?> </h2>
                            </a>
                            <a href="" class="text-danger" style="float:left ; font-size:20px ;"> $<?= $item['price'] ?></a>
                                                       <a href="" class="text" style="float:right ; "><span class="rounded-circle"><i class="fa-solid fa-heart" style="margin:0px 0px 0px 3.5px;"></i></span></a>

                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
        <div class="swiper-button-next swiper-navBtn"></div>
        <div class="swiper-button-prev swiper-navBtn"></div> <br>
        <div class="swiper-pagination3 mx-auto"></div>
    </div>


</div>
<!--End List Room-->
<!-------------------------------------------------------------------------------------------->
<hr class="display-4">
<!--Dịch vụ tiện ích-->
<div class="container-fluid">
    <div class="row text-center">
        <div class="col-12 text">
            <h1>Dịch vụ tiện ích</h1>
            <p style="font-size: 15px; color:gray;"> Poly's Hotel còn có các dịch vụ tiện ích khác với mong muốn làm
                hài lòng du khách</p>
        </div>
    </div>

    <div class="row text-center">
        <!-- <p>Ăn uống, giặt ủi, thuê xe, spa, thu đổi ngoại tệ, dọn phòng</p> -->
        <?php foreach ($services as $item) :?>

            <div class="col-md-2 col-sm-4 col-4">
                <a href=""><img src="<?= $item['image'] ?>" width="100" height="108" alt=""></a> <br>
                <a href=""><?= $item['name'] ?></a>
            </div>

        <?php endforeach ?>
    </div>

</div>
</div>
<!--End dịch vụ tiện ích-->
<!-------------------------------------------------------------------------------------------->
<hr class="display-4">
<!--Bài viết nổi bật-->
<div class="container-fluid">
    <div class="row text-center">
        <div class="col-12 text">
            <h1>Bài viết nổi bật</h1>
        </div>
    </div>

    <div class="row text-center mt-4">
        <div class="col-md-4 col-sm-6 ">
            <div class="card">
                <a href=""><img src="public/image/sp1.jpg" class="img-fluid" alt=""></a>
                <div class="card-body">
                    <a href="">
                        <h5 class="card-title">Cách làm giàu sau một đêm</h5>
                    </a>
                    <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                        Voluptatem nihil fugit, omnis animi eius voluptatibus sed dolores? Debitis, sequi,
                        laboriosam dolor tempore omnis suscipit qui nihil doloribus voluptas amet quam!</p>
                    <a href="">Xem thêm</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 ">
            <div class="card">
                <a href=""><img src="public/image/sp1.jpg" class="img-fluid" alt=""></a>
                <div class="card-body">
                    <a href="">
                        <h5 class="card-title">Cách làm giàu sau một đêm</h5>
                    </a>
                    <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                        Voluptatem nihil fugit, omnis animi eius voluptatibus sed dolores? Debitis, sequi,
                        laboriosam dolor tempore omnis suscipit qui nihil doloribus voluptas amet quam!</p>
                    <a href="">Xem thêm</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 ">
            <div class="card">
                <a href=""><img src="public/image/sp1.jpg" class="img-fluid" alt=""></a>
                <div class="card-body">
                    <a href="">
                        <h5 class="card-title">Cách làm giàu sau một đêm</h5>
                    </a>
                    <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                        Voluptatem nihil fugit, omnis animi eius voluptatibus sed dolores? Debitis, sequi,
                        laboriosam dolor tempore omnis suscipit qui nihil doloribus voluptas amet quam!</p>
                    <a href="">Xem thêm</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End Bài viết nổi bật-->

<!-------------------------------------------------------------------------------------------->
<hr class="display-4 mt-5">
<!--Đối tác tiêu biểu-->
<div class="container-fluid">
    <div class="row text-center">
        <div class="col-12 text">
            <h1>Đối tác tiêu biểu</h1>
        </div>
    </div>

</div>
<hr class="display-4">
<div class="container-fluid">
    <div class="row text-center">
        <img src="public/image/banner5.png" class="img-fluid" alt="">
    </div>
</div>
<hr class="display-4">
<!--End Đối tác tiêu biểu-->