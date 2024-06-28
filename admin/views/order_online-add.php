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
        height: 500px;
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
    }
    .thongtin_pro{
        border: 1px solid #000;
        border-radius: 20px;
    }
</style>

<div class=" main_right col-md-9  px-3 py-3">
    <h1>Tạo đơn hàng</h1>
    <div class="container">
        <div class="row">
            <div class="thongtin m-2 col-7">
                <form action="./thanhtoan.php" method="post">
                    <h1 class="text-center m-2 py-2">Đơn hàng</h1>
                    <!-- <p class="text-center py-1">Mã đơn hàng #1111</p>
                    <p class="text-center py-1">Ngày tạo: 1/1/2024</p> -->
                    <div class="thongtin_pro py-3 m-3">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="thongtin_chitiet">
                                    <p class="m-0 px-2">Tên KH:</p>
                                    <input name="fullname" required type="text" placeholder="Nhập họ tên" class="oder_name">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="thongtin_chitiet">
                                    <p class="m-0 px-2">SĐT:</p>
                                    <input name="phone" required type="text" placeholder="Nhập số điện thoại" class="oder_telephone">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="thongtin_chitiet">
                                    <p class="m-0 px-2">email:</p>
                                    <input name="email" required type="email" placeholder="Nhập email" class="oder_email">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="thongtin_chitiet">
                                    <p class="m-0 px-2">địa chỉ:</p>
                                    <input name="address" type="text" placeholder="Nhập địa chỉ" class="oder_address">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <!-- bảng sản phẩm của đơn hàng -->
                    <div class="container py-1 " style="background-color: #cccaca; ">
                <div class="row">
                    <div class="col-2">
                    <p style="float:right;">Chọn</p>
                    </div>
                    <div class="col-2">
                        <p >Sản phẩm</p>
                    </div>
                    <div class="col-2">
                        <p style="float:right;">Giá tiền</p>
                    </div>
                    <div class="col-2">
                        <p style="float:right;">Số lượng</p>
                    </div>
                    <div class="col-2" >
                        <p style="float:right;">Thành tiền</p>
                    </div>
                    <div class="col-2" >
                        <p style="float:right;"></p>
                    </div>
                </div>
            </div>
                    <div class='container py-2 ' style='border-bottom: 1px solid darkgrey ;' id='Rendercart'>

                    </div>
                <div class="container">
                    <div class="row">
                        <div class="col-7"></div>
                        <div class="col-2">Tổng tiền:</div>
                        <div class="col-2 cart_tongcong"></div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-9"><button  type="button"  class="btn btn-primary m-3"
                        onclick="ProceedToOder()">Tạo đơn hàng</button></a></div>
                        <div class="col-3">
                        <button  type="button"  class="btn btn-primary m-3">Xóa tất cả</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
            <div class="order_pro m-2 col-4">
                <h1 class="m-2 py-3">Tên sản phẩm</h1>
                <p class="m-2 py-2">Sản phẩm</p>
                <select  class="form-select m-2 py-2 product_id" aria-label="Default select example">
                <?php
                $data->select("SELECT * FROM tbl_product");
                while($row= $data->fech()){{
                    $product_name = $row["product_name"];
                    $product_id = $row["product_id"];
                    echo "
                    <option value='$product_id'>$product_name</option>
                    ";
                }}
                ?>
              </select>
              <!-- <p class="m-2 ">còn lại 5 sản phẩm</p> -->
              <p class="m-2 py-2">Số lượng</p>
              <input class="m-2 py-2" type="number" name="" id="input_number"> 
              <div>
              <button  type="button" class="btn btn-primary m-3" onclick="HandleAddproduct()">Thêm</button>
              </div>
            </div>
        </div>
    </div>
</div>

<script>
    var Rendercart = document.querySelector("#Rendercart");
    const outproduct_id = document.querySelector(".product_id");
    const outproduct_number = document.querySelector("#input_number");
    var cart_tongcong = document.querySelector(".cart_tongcong");
    var checksoluongsp =0;
    var sum_total=0;
    var Savecart = {
            cart:[],
            sumtotal:0,
        };
    
    const oder_name =document.querySelector(".oder_name");
    const oder_email =document.querySelector(".oder_email");
    const oder_telephone =document.querySelector(".oder_telephone");
    const oder_address =document.querySelector(".oder_address");
    const oder_content =document.querySelector(".oder_content");


    function HandleAddproduct(){
        const product_id =outproduct_id.value;
        const product_number =outproduct_number.value;
        
        jQuery.ajax({
            url:"../../user/views/cart_API.php",
            method:"post",
            data:{
                action:"admin->product_add",
                product_id,
                cart_quantity:product_number,
            },
            success:function(data){
                startRendercart();
            }
        }
        )
    }
    function startRendercart(){
        fetch('../../user/views/cart_API.php?action=admin->product_select')
            .then((response) =>response.json())
            .then((data)=>{
                console.log(data);
                    var htmls =data.map(function(item,index){
                    return`
                    <div class='row'>
                        <div class='col-2' style='display: flex; align-items: center; justify-content: end;'>
                            <input type='checkbox' name='' id='cart_check' 
                            onclick='HandleCartcheck(event,${item.cart_id},
                            ${item.product_id}, ${item.cart_quantity},
                            ${item.cart_totalmoney},"${item.product_name}")'
                            data-cart_totalmoney='${item.cart_totalmoney}'>
                        </div>
                        <div class='col-2'>
                            <div style='display: flex;'>
                            <img style='width: 70px;' src='../css/img/anh/sp1.jpg' alt=''>
                            <p style='font-weight: 500;' >${item.product_name}</p>
                            </div>
                        </div>
                        <div class='col-2' style='display: flex; align-items: center; justify-content: end;'>
                            <p style='float:right;font-weight: 500;'>${item.product_price}</p>
                        </div>
                        <div class='col-2' style='display: flex; align-items: center; justify-content: end;'>
                        <input style='width: 40px; height: 20px; margin-left: 8px;' type='number' id='cart_quantity-${item.cart_id}'
                        value='${item.cart_quantity}' onchange='HandleEditcart(${item.cart_id},${item.product_id})'
                        >
                        </div>
                        <div class='col-2' style='display: flex; align-items: center; justify-content: end;' >
                            <p style='float:right;font-weight: 500;'>${item.cart_totalmoney}</p>
                        </div>
                        <div class='col-2' style='display: flex; align-items: center; justify-content: end;' class='cart_check'>
                            <p style='float:right;font-weight: 500;cursor: pointer;' onclick='HandleDeletecart(${item.cart_id})'>Xóa</p>
                        </div>
                    </div>
                    `
                });
                var html =htmls.join("");
                Rendercart.innerHTML=html;

            })
            .catch(()=>{
                Rendercart.innerHTML="";
            })
    }
    startRendercart();

    function HandleDeletecart(cart_id){
        confirm("bạn có chắc chắn muốn xóa không");
        if(confirm){
            jQuery.ajax({
            url:"../../user/views/cart_API.php",
            method:"post",
            data:{
                action:"cart_delete",
                cart_id:cart_id,
            },
            success:function(data){
                startRendercart();
                // console.log(data);
            }
        })
        }
    }

    function HandleEditcart(cart_id,product_id){
        const idcart_quantity = "#cart_quantity-"+cart_id;
        const cart_quantity =document.querySelector(idcart_quantity);

        cart_newquantity = cart_quantity.value;
        jQuery.ajax({
            url:"../../user/views/cart_API.php",
            method:"post",
            data:{
                action:"cart_edit",
                cart_id:cart_id,
                cart_quantity:cart_newquantity,
                product_id:product_id,
            },
            success:function(data){
                startRendercart();
            }
        })
    }

    function HandleCartcheck(e, cart_id, product_id, cart_number, cart_totalmoney,product_name){
        var cart_item = {
            cart_id:cart_id,
            product_id:product_id,
            cart_number:cart_number,
            cart_totalmoney:cart_totalmoney,
            product_name:product_name,
        }
            if(e.target.checked){
                // tăng số lượng cộng tiền và add vào obj
                checksoluongsp++;

                sum_total+=parseInt(e.target.dataset.cart_totalmoney);
                Savecart.cart.push(cart_item);
            }else{
                checksoluongsp--;
                sum_total-=parseInt(e.target.dataset.cart_totalmoney);
                var cart_index =Savecart.cart.indexOf(cart_item);
                Savecart.cart.splice(cart_index,1);
            }
            console.log(Savecart);

        cart_tongcong.textContent=sum_total;
    }

    function ProceedToOder(){
        Savecart.sumtotal=sum_total;

        console.log(JSON.stringify(Savecart));
        jQuery.ajax({
            url:"../../user/views/cart_API.php",
            method:"post",
            data:{
                action:"cart_save",
                Savecart:JSON.stringify(Savecart),
            },
            success:function(data){
                dataparse =JSON.parse(data);
                const sumtotal = dataparse.sumtotal;
                HandleOder(sumtotal)
            }
        })
    }

    function HandleOder(sumtotal){
        var currentDate = new Date();

        // Lấy thông tin ngày và giờ từ đối tượng Date
        var day = currentDate.getDate(); // Lấy ngày trong tháng (1-31)
        var month = currentDate.getMonth() + 1; // Lấy tháng (0-11), cộng thêm 1 để hiển thị từ 1 đến 12
        var year = currentDate.getFullYear(); // Lấy năm
        var hours = currentDate.getHours(); // Lấy giờ
        var minutes = currentDate.getMinutes(); // Lấy phút
        var seconds = currentDate.getSeconds(); // Lấy giây
        var date =year+"-"+month+"-"+day+" "+hours+"-"+minutes+"-"+seconds; 

        const getoder_name =oder_name.value;
        const getoder_email =oder_email.value;
        const getoder_telephone =oder_telephone.value;
        const getoder_address =oder_address.value;
        const getoder_content ="";
        
        jQuery.ajax({
            url:"../../user/views/donhang_API.php",
            method:"post",
            data:{
                action:"oder_add",
                oder_name:getoder_name,
                oder_email:getoder_email,
                oder_telephone:getoder_telephone,
                oder_address:getoder_address,
                oder_content:getoder_content,
                sumtotal:sumtotal,
                oder_date:date,
                oder_totalmoney:sumtotal,
            },
            success:function(data){
                console.log(data);
                HandleOderdetail(data);
            }
        })
    }
    function HandleOderdetail(oder_id){
        jQuery.ajax({
            url:"../../user/views/donhangchitiet_API.php",
            method:"post",
            data:{
                action:"oder-detail_add",
                oder_id:oder_id,
            },
            success:function(data){
                console.log(data)
                HandleDeletecartischeck();
            }
        })
    }
    function HandleDeletecartischeck(){
        jQuery.ajax({
            url:"../../user/views/cart_API.php",
            method:"post",
            data:{
                action:"cart_deletes",
            },
            success:function(data){
                window.location.href= "order_online.php"
                // console.log(data);
            }
        })
    }
</script>