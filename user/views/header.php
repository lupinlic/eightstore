<?php 
include "../../config/data.php";
$data = new database;
session_start();
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
                        <span class="input-group-text" id="basic-addon2"><i class="fa-solid fa-magnifying-glass" id="icon_find"></i></span>
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
                        <a class="fs-3" href="../index.php"><i class="fa-solid fa-right-from-bracket text-dark"></i></a>
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


   <script>
  const find =document.querySelector("#find");
  const icon_find=document.querySelector("#icon_find");
  const render_product=document.querySelector("#render_product");

  icon_find.onclick =function(e){

    const name =find.value;
    jQuery.ajax({
      url:"../../admin/views/product_API.php",
      method:"post",
      data:{
        action:"product_find",
        name,
      }
      ,success:function(data){
        const newdata =JSON.parse(data);
        var htmls =newdata.map((item,index)=>{
          return `
          <div class=' p-1 col-2'>
              <div class='sanp'>
                <a href='./chitiet.php?product_id=${item.product_id}'>
                  <div class='sp'>
                <img style='height:220px;' src='${item.product_img}' alt=''>
                <p style='color: red;font-size:20px;font-weight: 500;'>${item.product_price}</p>
                <p style='color: #000;'>${item.product_name}</p>
                  </div>
                </a>
              </div>
            </div>
          `;
        });
        render_product.innerHTML=htmls.join("");
      }
    })
  }
</script>