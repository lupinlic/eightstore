<?php
  include("./silder.php")
  
?>
<style>
    a{
        text-decoration: none;
    }
    .sanpham{
        border: 1px solid #000;
        border-radius: 20px;
    }
</style>

<div class=" main_right col-md-9  px-3">
Thanh toán tại quầy
  <div class="container">
    <div class="row">
        <div class="col-6">

        </div>
        <div class="col-6">
            <!-- các sản phẩm của đơn hàng -->
            <div class="sanpham">
                <div class="container">
                    <div class="row">
                        <div class="col-2">mã</div>
                        
                        <div class="col-5">Tên sản phẩm</div>
                        <div class="col-2">Số lượng</div>
                        <div class="col-3">Tổng tiền</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>