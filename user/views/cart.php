<?php
include("./header.php");

if(isset($_SESSION["user_id"])){
    $user_id = $_SESSION["user_id"];

    $thanhtien = 0;
}




?>

<section>
   <div class="container py-2">
    <p style="color:darkgrey">Trang chủ > Giỏ hàng</p>
    <div style="display: flex;">
        <p style="font-size: 20px; margin-left:8px">Sản phẩm</p>
        <!-- <p style="color: red; margin-left: 4px;font-size: 20px; "> 1</p> -->
    </div>
    <div class="row">
        <div class="left col-9">
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
            <?php
                // $data->select("SELECT cart.*,tbl_product.* FROM cart INNER JOIN tbl_product 
                // ON cart.product_id=tbl_product.product_id WHERE user_id=$user_id");

                // while($row = $data->fech()){
                    
                //     $product_id = $row["product_id"];
                //     $product_name = $row["product_name"];
                //     $product_price = $row["product_price"];
                //     $cart_id = $row["cart_id"];
                //     $cart_quantity = $row["cart_quantity"];
                //     $cart_totalmoney = $row["cart_totalmoney"];

                //     $thanhtien+=intval($cart_totalmoney);

                //     echo"
                //         <div class='row'>
                //         <div class='col-2' style='display: flex; align-items: center; justify-content: end;'>
                //             <input type='checkbox' name='' id=''>
                //         </div>
                //         <div class='col-2'>
                //             <div style='display: flex;'>
                //             <p style='font-weight: 500;' >$product_name</p>
                //             </div>
                //         </div>
                //         <div class='col-2' style='display: flex; align-items: center; justify-content: end;'>
                //             <p style='float:right;font-weight: 500;'>$product_price</p>
                //         </div>
                //         <div class='col-2' style='display: flex; align-items: center; justify-content: end;'>
                //         <input style='width: 40px; height: 20px; margin-left: 8px;' type='number' id='cart_quantity-$cart_id'
                //         value='$cart_quantity' onchange='HandleEditcart(\"$cart_id\",\"$product_id\")'
                //         >
                //         </div>
                //         <div class='col-2' style='display: flex; align-items: center; justify-content: end;' >
                //             <p style='float:right;font-weight: 500;'>$cart_totalmoney</p>
                //         </div>
                //         <div class='col-2' style='display: flex; align-items: center; justify-content: end;' >
                //             <p style='float:right;font-weight: 500;cursor: pointer;' onclick='HandleDeletecart(\"$cart_id\")'>Xóa</p>
                //         </div>
                //         </div>
                //     ";

                // }   
                ?>
            </div>
            <div class="py-3" >
            <a href="./index.php" class="tieptuc" style="color: darkgrey;"><i class="ti-arrow-left"></i>Tiếp tục mua hàng</a>
            </div>
        </div>


        <!-- right -->
        <div class="right col-3">
            <div class="py-1" style=" border-bottom: 1px solid darkgrey ;"><p style="font-size: 18px; margin-left:8px ; font-weight: 500;">Hóa đơn của bạn</p></div>
            
            <div class="py-1" style="border-bottom: 1px solid darkgrey ;">
                <div class="row">
                    <div class="col">
                        <p style="">số sản phẩm:</p>
                    </div>
                    <div class="col">
                        <p style="float:right;font-weight: 500;" class="cart_sosp">0</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p>Giảm giá:</p>
                    </div>
                    <div class="col">
                        <p style="float:right;font-weight: 500;">0</p>
                    </div>
                </div>
            </div>
            <div>
            <div class="row py-1">
                    <div class="col">
                        <p>Tổng cộng:</p>
                    </div>
                    <div class="col">
                        <p style="color: #fa7551;float:right;" class="cart_tongcong">0</p>
                    </div>
                </div>
            </div>
            <button style="background-color: #fa7551; width:100%; border:none; border-radius: 5px; " 
            class="py-2 " onclick="ProceedToOder()">Tiến hành đặt hàng</button>
        </div>
    </div>
   </div>
   
</section>


<?php
include("./footer.php")

?>


<style>
  
</style>


<script>
        var Rendercart = document.querySelector("#Rendercart");
        var cart_sosp = document.querySelector(".cart_sosp");
        var cart_tongcong = document.querySelector(".cart_tongcong");
        var sum_total = 0;
        var checksoluongsp =0;
        var Savecart = {
            cart:[],
            sumtotal:0,
        };

    var cart = {
        startRendercart:startRendercart(),

        start:function(){
            startRendercart();


      
        }
    }

    cart.start();
  

    function startRendercart(){
        fetch('cart_API.php?action=cart_select')
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

  

    function HandleDeletecart(cart_id){
        confirm("bạn có chắc chắn muốn xóa không");
        if(confirm){
            jQuery.ajax({
            url:"cart_API.php",
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
            url:"cart_API.php",
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

        cart_sosp.textContent=checksoluongsp;
        cart_tongcong.textContent=sum_total;
    }

    function ProceedToOder(){
        Savecart.sumtotal=sum_total;

        console.log(JSON.stringify(Savecart));
        jQuery.ajax({
            url:"cart_API.php",
            method:"post",
            data:{
                action:"cart_save",
                Savecart:JSON.stringify(Savecart),
            },
            success:function(data){
                window.location.href = "dathang.php";
                console.log(JSON.parse(data));
            }
        })
    }

</script>


<!-- trang này thực hiện nhiệm vụ này :
1. check oder>0
2. post ajax 
-->

<!-- 
    // contentType:"application/json",
    nếu dùng cái này thì bên php pai dùng như sau
    1. đọc đoạn mã dc gửi đến 
    2. giải mã
    3.truy cập vào các datta như thg

    tức là pai thêm 2 bước 1 đọc 2 decode
 -->