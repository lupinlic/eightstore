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
    <link rel="stylesheet" href="../../css/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/css/index.css">
    <script src="../../css/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../../css/icon/fontawesome-free-6.4.0-web/css/all.css">
    <link rel="stylesheet" href="../../css/icon/themify-icons-font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href='https://fonts.googleapis.com/css?family=Style Script' rel='stylesheet'>
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</head>
<style>
    .header{
            background-color: rgb(222, 249, 224);
        }
</style>
<body>
    <header class="">
        <div class="header position-fixed container-fluid py-3">
           
                <div class="row">
                    <div class="col-md-3 ">

                        <img class="logo px-3" src="../../css/img/logo8.png" alt="">
                        <span>Eight Store</span>
                    </div>
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-2">
                        <div class="row">
                            <div class="col-3">
                                <div class="fs-3 text-danger"><i class="diachi fa-solid fa-location-dot"></i></div>
                            </div>
                            <div class=" col-9">54 Triều Khúc<br>
                                (8:00-20:00)
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 lienhe">
                        <div class="row">
                            <div class="col-3">
                                <div class="fs-3 text-danger"><i class="phone fa-solid fa-phone"></i></div>
                            </div>
                            <div class=" col-9">0328443736<br>
                                (8:00-20:00)
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-user icon-pos-right"></i>
                            </a>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="#"><i class="fa-solid fa-user px-2"></i>Profile</a></li>
                              <li><a class="dropdown-item" href="#"><i class="fa-solid fa-gear px-2"></i>Setting</a></li>
                              <li><hr class="dropdown-divider"></li>
                              <li><a class="dropdown-item" href="../../index.php"><i class="fa-solid fa-right-to-bracket px-2"></i>Logout</a></li>
                            </ul>
                          </div>
                    </div>
                </div>
           
        </div>
    </header>
    <!-- main -->
    <section class="main container-fluid">
        
            <div class="row">
            <div class="slider  col-md-3 px-3 ">
                    <ul class="menu1 nav flex-column">
                        <li class="nav-item ">
                            <a class="nav-link"  href="../index.php"><i class="fa-solid fa-house"></i>Trang chủ</a>
                          </li>
                        <li class="nav-item ">
                          <a class="nav-link parent"  ><i id="icon-sidebar" class="fa-solid fa-cart-shopping "></i>Đơn hàng
                                <i class=" trangthai ti-angle-down"></i>
                            </a>
                          <ul class="menu2">
                            <!-- <li class="menu2-item"><a href="../views/order_offline.php">Đơn hàng tại quầy</a></li> -->
                            <li class="menu2-item"><a href="../views/order_online.php">Danh sách đơn hàng </a></li>
                          </ul>
                            
                        </li>
                        <li class="nav-item">
                          <a class="nav-link parent" ><i id="icon-sidebar" class="fa-solid fa-box "></i>Sản phẩm
                            <i class="trangthai ti-angle-down"></i>
                            </a>
                          <ul class="menu2">
                            <li class="menu2-item"><a href="../views/productlist.php">Danh sách sản phẩm</a></li>
                            <li class="menu2-item"><a href="../views/categorylist.php">Danh mục sản phẩm</a></li>
                          </ul>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#"><i id="icon-sidebar" class="fa-solid fa-users"></i>Khách hàng</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="../views/userlist.php"><i id="icon-sidebar" class="fa-solid fa-user"></i>Tài khoản</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../views/supplier.php"><i id="icon-sidebar" class="fa-solid fa-user"></i>Nhà cung cấp</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../views/stafflist.php"><i id="icon-sidebar" class="fa-solid fa-user"></i>Nhân viên</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link parent" ><i id="icon-sidebar" class="fa-solid fa-shop"></i>Quản lí kho
                            <i class="trangthai ti-angle-down"></i>
                            </a>
                          <ul class="menu2">
                            <li class="menu2-item"><a href="./inventory.php">Hàng tồn kho</a></li>
                            <li class="menu2-item"><a href="./warehouselist.php">Phiếu nhập kho</a></li>
                          </ul>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link "href="./thongke.php"><i id="icon-sidebar" class="fa-solid fa-chart-simple"></i>Thống kê</a>
                        </li>
                        <!--  -->
                        
                      </ul>

                </div>
                <script>
    var parents= document.querySelectorAll(".parent");
    var childs= document.querySelectorAll(".menu2");
    var trangthais= document.querySelectorAll(".trangthai");
    const $= document.querySelector.bind(document);
    var istrangthai= false;
    for(let i= 0; i<parents.length;i++){
       let parent= parents[i];
       let child= childs[i];
       let trangthai=trangthais[i];
        parent.onclick= function(e){
            istrangthai=!istrangthai;
                trangthai.classList.toggle("ti-angle-up",istrangthai);
                trangthai.classList.toggle("ti-angle-down",!istrangthai);
                child.style.display = 'block';
            if(istrangthai==false){
                child.style.display = 'none';
            }
        } 
            
        };
    

</script>