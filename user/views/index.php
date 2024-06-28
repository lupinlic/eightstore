<?php 
include "../../config/data.php";
$data = new database;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <script src="../../css/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../../css/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/icon/fontawesome-free-6.4.0-web/css/all.css">
    <link rel="stylesheet" href="../../css/icon/themify-icons-font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../../css/css/user.css">
    <link href='https://fonts.googleapis.com/css?family=Style Script' rel='stylesheet'>
    <!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<header>
        <div class="container py-3">
            <div class="row">
                <div class="col-md-3 ">
                    <img class="" style="width:50px; border-radius: 50%;" src="../../css/img/logo8.png" alt="">
                    <span style="font-family:'Style Script'; font-size: 30px;" >Eight Store</span>
                </div>
                <div class="col-md-4">
                    <div class="input-group mb-3">
                      
                        <input type="text" class="form-control" placeholder="Nhập từ khóa tìm kiếm" id="find" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <span class="input-group-text" id="basic-addon2"><i class="fa-solid fa-magnifying-glass " id="icon_find"></i></span>
                        
                      </div>
                </div>
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md">
                            <div class="row">
                                <div class="col-3">
                                    <div class="fs-3 text-danger"><i class="fa-solid fa-phone"></i></div>
                                </div>
                                <div class="col-9">Tư vấn hỗ trợ <br>
                                <strong class="text-danger">0328443736</strong></div>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="row">
                                <div class="col-3">
                                    <div class="fs-3 text-danger"><i class="fa-solid fa-user"></i></div>
                                </div>
                                <div class="col-9">Xin chào!<br>
                                    <strong class="text-danger">Tùng Lâm</strong></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="row">
                        <div class="col-md">
                            
                        </div>
                        
                        <div class="col-md">
                        <a href="./cart.php" class="  position-relative">
                                <span class="fs-3"><i class="fa-solid fa-bag-shopping text-dark"></i></span>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                  <?php
                                  $data->select("SELECT COUNT(*) AS cart_count FROM cart");
                                  $row = $data->fech();
                                  $cart_count = $row["cart_count"];
                                  echo $cart_count;
                                  ?>
                                </span>
                            </a>
                        </div>
                        <div class="col-md">
                        <a class="fs-3" href="../../index.php"><i class="fa-solid fa-right-from-bracket text-dark"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

   </header>
   <!--  -->
   <section class="menu" >
   <div class="mymenu container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-6">
                <ul class="menu nav">
                        <li class="nav-item ">
                            <a class="nav-link"  href="./index.php"><i class="fa-solid fa-house"></i> Trang chủ</a>
                        </li>
                        <li class="nav-item dropdown-item_parent">
                            <a class="nav-link"  href="./index.php"><i class="fa-solid fa-bars"></i> Danh mục</a>
                            <ul class="dropdown-item_child bg-light p-2">
                                        <?php 
                                        $data->select("SELECT * FROM tbl_category");
                                        $i=0;
                                        while($row = $data->fech()){
                                          $category_name = $row["category_name"];
                                          $category_id = $row["category_id"];
                                          
                                          $i++;
                                          echo "
                                          <li><a href='./product.php?category_id=$category_id'>$category_name</a></li>
                                          ";
                                        };
                                        ?>
                            </ul>
                        </li>
                        <!-- <li class="nav-item ">
                            <a class="nav-link"  href="#"></i> Tin tức</a>
                        </li> -->
                        <li class="nav-item ">
                            <a class="nav-link"  href="gioithieu.php"></i> Giới thiệu</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link"  href="lienhe.php"></i>Liên hệ</a>
                        </li>
                </ul>
                </div>
                <div class="col-6">
                <ul class="menu menu-2  nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link"  href="./donhang.php"></i>Tra cứu đơn hàng</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link dropdown-toggle"  href="./index.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Tải ứng dụng</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#"><img style="width: 300px;" src="../../css/img/qr.png" alt=""></a></li>
                                </ul>
                        </li>
                        
                </ul>
                </div>
            </div>
        </div>
    </div>
   </section>

   <section>
        <div class="container-fluid  py-2" style="background-color: #f1eeee;">
        <div class="container">
            <div class="row">
                <div class="col-8">
                <div id="demo" class="carousel slide" data-bs-ride="carousel">

                    <!-- Indicators/dots -->
                    <div class="carousel-indicators">
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                    </div>

                    <!-- The slideshow/carousel -->
                    <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../../css/img/anh/5.jpg" alt="Los Angeles" class="d-block w-100 rounded">
                    </div>
                    <div class="carousel-item">
                        <img src="../../css/img/anh/1.jpg" alt="Chicago" class="d-block w-100 rounded">
                    </div>
                    <div class="carousel-item">
                        <img src="../../css/img/anh/6.jpg" alt="New York" class="d-block w-100 rounded">
                    </div>
                    </div>

                    <!-- Left and right controls/icons -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
                </div>
                <div class="col-4">
                    <img class="img-fluid" src="../../css/img/anh/4.jpg" alt="">
                </div>
            </div>
        </div>
        </div>
   </section>
<!-- main -->

  <section class="py-3" style="background-color: #f1eeee;">
    
    <div class="container-fluid">
      <div class="container">
      <p style="font-weight: 600; font-size:28px;">Gợi ý cho bạn</p>
        <div class="row" id="render_product">
        <?php
        $data->select("SELECT * FROM tbl_product LIMIT 6");
        $i=0;
        while($row = $data->fech()){
          $i++;
          $product_name = $row["product_name"];
          $product_img = $row["product_img"];
          $product_price = $row["product_price"];
          $product_mota = $row["product_mota"];
          $product_id = $row["product_id"];
          $category_id = $row["category_id"];
          echo "
          <div class=' p-1 col-2'>
              <div class='sanp'>
                <a href='./chitiet.php?product_id=$product_id'>
                  <div class='sp'>
                <img style='height:220px;' src='$product_img' alt=''>
                <p style='color: red;font-size:20px;font-weight: 500;'>$product_price</p>
                <p style='color: #000;'>$product_name</p>
                  </div>
                </a>
              </div>
            </div>
          ";
        }
        ?>
        </div>
      </div>

    </div>
    <div class="container them">     
          <button><a style="color: #000;" href="./pro.php">Xem thêm</a></button>
    </div>
  </section>


<!-- footer -->
   <footer style="background-color: #326E51;" class=" text-light pt-4">
      <div class="container-fluid ">


        <!-- trên -->
        <div class="container footer">
          <div class="row border-bottom">
            <div class="col-md-3">
              <p>HỖ TRỢ KHÁCH HÀNG </p>
              <ul>
                <li><a style="color: orange;" href="">Hotline: 0406 2003</a></li>
                <li><a href="">Giới thiệu</a></li>
                <li><a href="">Sản phẩm</a></li>
                <li><a href="">Tin mới nhất</a></li>
                <li><a href="">Câu hỏi thường gặp</a></li>
                <li><a href="">Tuyển dụng</a></li>
                <li><a href="">Liên hệ</a></li>
              </ul>

            </div>
            <div class="col-md-3">
              <p>VỀ EIGHTSTORE.VN</p>
              <ul>
                <li><a href="">Giới thiệu</a></li>
                <li><a href="">Sản phẩm</a></li>
                <li><a href="">Tin mới nhất</a></li>
                <li><a href="">Câu hỏi thường gặp</a></li>
                <li><a href="">Tuyển dụng</a></li>
                <li><a href="">Liên hệ</a></li>
              </ul>
            </div>
            <div class="col-md-3">
              <p>CHÍNH SÁCH BÁN HÀNG</p>
              <ul>
                <li><a href="">Trang chủ</a></li>
                <li><a href="">Giới thiệu</a></li>
                <li><a href="">Sản phẩm</a></li>
                <li><a href="">Tin mới nhất</a></li>
                <li><a href="">Câu hỏi thường gặp</a></li>
                <li><a href="">Tuyển dụng</a></li>
                <li><a href="">Liên hệ</a></li>
              </ul>
            </div>
            <div class="col-md-3">
              <p>THEO DÕI CHÚNG THÔI</p>
              <ul>
                <li><a href="">Trang chủ</a></li>
                <li><a href="">Giới thiệu</a></li>
                <li><a href="">Sản phẩm</a></li>
                <li><a href="">Tin mới nhất</a></li>
                <li><a href="">Câu hỏi thường gặp</a></li>
                <li><a href="">Tuyển dụng</a></li>
                <li><a href="">Liên hệ</a></li>
              </ul>
            </div>
          </div>
          <!-- dưới -->
        <div class="row pt-3">
          <div class="col-md-6">
            <p>TTHẾ GIỚI SKINCARE</p>
            <ul>
              <li>Copyright@ 2023 Công ty cổ phần thương mại Eight Store</li>
              <li>Chứng nhận ĐKKD: do sở KH & ĐT TP.Hà Nội cấp</li>
              <li>Địa chỉ: 54 Triều Khúc, Hà Nội</li>
              <li>Điện thoại: 0328443736 - Email: huatunglam1205@gmail.com</li>
            </ul>
          </div>
          <div class="col-md-6">
            <p>NHẬN TIN KHUYẾN MÃI</p>
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Nhập email của bạn">
              <button class="btn btn-success" type="submit">Đăng kí</button>
            </div>

          </div>
        </div>
        </div>
      </div>
   </footer>
</body>
</html>


<script>
  const find =document.querySelector("#find");
  const icon_find=document.querySelector("#icon_find");
  const render_product=document.querySelector("#render_product");

  icon_find.onclick =function(e){
    const name =find.value;
    window.location.href= `pro.php?name=${name}`;
  }
</script>