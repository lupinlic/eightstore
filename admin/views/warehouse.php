<?php
  include("./silder.php")
  
?>
<style>
    a{
        text-decoration: none;
    }
    .new_order a{
        border: 1px solid #000;
        
    }
    .thongtin , .order_pro{
        border: 1px solid #000;
        border-radius: 20px;
    }
    .thongtin{
        padding-bottom: 50px;
    }
    .order_pro{
        height: 530px;
    }
    .thongtin_chitiet{
        display: flex;
        margin-bottom: 10px;
        align-items: center;
        
    }
    .thongtin_chitiet input{
        border: none;
        border-bottom: 1px solid #000;
        outline: none;
        width: 100%;
        flex: 65%;
        margin-right: 20px;
    }
    .thongtin_chitiet p{
        flex: 35%;
    }
    .thongtin_pro{
        border: 1px solid #000;
        border-radius: 20px;
    }
</style>

<div class=" main_right col-md-9  px-3">
    <h1>Thông tin nhập kho</h1>
    <div class="container">
        <div class="row">
            <div class="thongtin m-2 col-7">
                <form action="./thanhtoan.php" method="post">
                    <h1 class="text-center m-2 py-2">PHIẾU NHẬP KHO</h1>
                    <!-- <p class="text-center py-1">Mã phiếu #1111</p>
                    <p class="text-center py-1">Ngày nhập: 1/1/2024</p> -->
                    <div class="thongtin_pro py-3 m-3">
                        
                                    <div class="thongtin_chitiet">
                                    <p class="m-0 px-2">Ngày nhập kho:</p>
                                    <input type="date" placeholder="Ngày nhập kho" class="coupon_date">
                                    </div>
                              
                                    <div class="thongtin_chitiet">
                                    <p class="m-0 px-2">Tên đơn vị cung cấp</p>
                                    <select class="supplier_id" style="width: 75%;height:40px;margin-right: 15px;" aria-label="Default select example">
                                            <?php
                                            $data->select("SELECT * FROM supplier");
                                            while($row = $data->fech()){
                                                $supplier_name = $row["supplier_name"];
                                                $supplier_id = $row["supplier_id"];

                                                echo"
                                                    <option value='$supplier_id'>$supplier_name</option>
                                                ";
                                            }

                                            ?>
                                    </select>
                                    </div>
                            
                                    <div class="thongtin_chitiet">
                                    <p class="m-0 px-2">Ghi chú</p>
                                    <input type="text" placeholder="Ghi chú">
                                    </div>
                           
                            
                    </div>
                    <!-- bảng sản phẩm của đơn hàng -->
                    <!-- <table class="table py-3 table-bordered">
                            <thead>
                                <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Đơn giá</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                </tr>
                                
                            </tbody>
                    </table> -->
                <div class="container">
                    <div class="row">
                        <div class="col-8"></div>
                        <!-- <div class="col-4">Tổng tiền:</div> -->
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-9"><button  type="button"
                        class="btn btn-primary m-3" onclick="AddCoupon()">Tạo phiếu nhập</button></div>
                        <div class="col-3">
                        <!-- <button  type="button"  class="btn btn-primary m-3">Xóa tất cả</button> -->
                        </div>
                    </div>
                </div>
                </form>
            </div>
            <div class="order_pro m-2 col-4">
                <h1 class="m-2 py-3">Sản phẩm nhập</h1>
                <p class="m-2 py-2">Sản phẩm</p>
                <select  class="form-select m-2 py-2 product_id" aria-label="Default select example">
                    <?php
                    $data->select("SELECT * FROM tbl_product");
                    while($row = $data->fech()){
                        $product_name = $row["product_name"];
                        $product_id = $row["product_id"];

                        echo"
                            <option value='$product_id'>$product_name</option>
                        ";
                    }

                    ?>
              </select>
              
              <p class="m-2 py-2 ">Số lượng</p>
              <input class="m-2 py-2 product_sum" type="number" name="" id=""> 
              <p class="m-2 py-2">Đơn giá nhập</p>
              <input class="m-2 py-2 coupon_unitprice" type="text" name="" id=""> 
              <div>
              <p class="m-2 py-2">Tổng giá nhập</p>
              <input class="m-2 py-2 coupon_total" type="text" name="" id=""> 
              <div>
              </div>
            </div>
        </div>
    </div>
</div>
  
</div>

<script>
    var formData= new FormData();
    var coupon_date=document.querySelector(".coupon_date");
    var supplier_id=document.querySelector(".supplier_id");
    var product_id=document.querySelector(".product_id");
    var product_sum=document.querySelector(".product_sum");
    var coupon_unitprice=document.querySelector(".coupon_unitprice");
    var coupon_total=document.querySelector(".coupon_total");

function AddCoupon(){
    formData.append("coupon_date",coupon_date.value);
    formData.append("supplier_id",supplier_id.value);
    formData.append("product_id",product_id.value);
    formData.append("product_sum",product_sum.value);
    formData.append("coupon_unitprice",coupon_unitprice.value);
    formData.append("coupon_total",coupon_total.value);
    formData.append("action","coupon_add");
    jQuery.ajax({
            url:"coupon_API.php",
            method:"post",
            data : formData,
            contentType:false,
            processData:false,
            success:function(data){
                location.href="warehouselist.php";
            }
        })
}
</script>