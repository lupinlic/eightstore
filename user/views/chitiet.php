<?php
include("./header.php");
if(isset($_GET["product_id"])){
    $product_id = $_GET["product_id"];

    $data->select("SELECT * FROM tbl_product WHERE product_id=$product_id");
    while($row = $data->fech()){
        $product_name = $row["product_name"];
        $product_img = $row["product_img"];
        $product_price = $row["product_price"];
        $product_mota = $row["product_mota"];
        $product_id = $row["product_id"];
        $category_id = $row["category_id"];
    }
}


?>



<!-- mua hàng -->
<section style="background-color: #f1eeee;">
    <div class="container py-3" >
        <div class="row">
            <div class="col-9 ">
                <div class="p-2">
                <div class="row" style="background-color: #fff;">
                    <div class="col-5">
                        <img style="width:400px" src="<?php echo $product_img ?>" alt="">
                    </div>


                    <!--  -->
                    <div class="col-7">
                        <p style="font-weight: 500; font-size:20px;"><?php echo $product_name ?></p>
                        <p>
                        <i style="color: red;" class="fa-regular fa-star"></i>
                        <i style="color: red;" class="fa-regular fa-star"></i>
                        <i style="color: red;" class="fa-regular fa-star"></i>
                        <i style="color: red;" class="fa-regular fa-star"></i>
                        <i style="color: red;" class="fa-regular fa-star"></i>
                        </p>
                        <p style="color: #fa7551;font-weight: 500; font-size:20px;"><?php echo $product_price ?></p>
                        <div style="display: flex; ">
                            <p>Số lượng</p>
                            <input style="width: 40px; height: 20px; margin-left: 8px;" type="number" id="cart_quantity">
                        </div>
                        <div style="display: flex; " >
                            <img src="../../css/img/vanchuyen/icon_nowfree.png" alt="">
                            <p style="padding-top: 10px;padding-left: 10px;font-weight: 500; font-size:20px;">Giao Nhanh Miễn Phí 2H </p>
                        </div>
                        <div>

                        <button onclick="Handleaddcart('<?php echo $product_id ?>')" style="margin-top: 20px;height: 40px;border: none; border-radius: 5px; background-color: #326E51;color: #fff;" >
                        <i class="fa-solid fa-cart-shopping" style="margin-right: 4px;">
                        </i>Thêm vào giỏ hàng</button>

                        <button style="margin-top: 20px;height: 40px;border: none; border-radius: 5px; background-color: #fa7551;color: #fff;margin-left: 8px; width: 100px;" >Mua ngay</button>
                        </div>
                    </div>
                </div>
                </div>
            </div>


            <!--  -->
            <div class="col-3 p-2">
                <div style="background-color: #fff;">
                    <div>
                        <img style="width:100px" src="../../css/img/vanchuyen/2h.png" alt="">
                        Giao nhanh , miễn phí 2h
                    </div>
                    <div>
                        <img style="width:100px" src="../../css/img/vanchuyen/chinhhang.png" alt="">
                        EightStore đền bù 100%
                    </div>
                    <div>
                        <img style="width:100px" src="../../css/img/vanchuyen/mienphi.png" alt="">
                        Giao hàng miễn phí
                    </div>
                    <div>
                        <img style="width:100px" src="../../css/img/vanchuyen/doitra.png" alt="">
                        Đổi trả trong 14 ngày
                    </div>
                </div>
            </div>
        </div>
        
    </div>


    <!-- mô tả -->
    <div class="container py-3">
        <p style="font-weight: 500; font-size:20px;">Mô tả sản phẩm</p>
        <p><?php echo $product_mota ?> </p>
        <div class="row">
            <div class="col-6">
                <img style="width: 600px;" src="<?php echo $product_img ?>" alt="">
            </div>
            <div class="col-6">
                        <div class="big-title">
                            <div class="title-item gioithieu">
                               <p>Thành phần</p>
                            </div>
                            <div class="title-item chitiet">
                                <p>Công dụng</p>
                            </div>
                            <div class="title-item baoquan">
                                <p>Hướng dẫn sử dụng</p>
                            </div> 
                        </div>
                        <div class="title-content">

                            <!-- thành phần -->
                            <div class="content-gioithieu">              
                            <p>- Zinc Oxide và Titanium Dioxide được xem như một  là thành phần giúp chống nắng ưu việt, thân thiện với mọi làn da da và không gây kích ứng như những dòng chất chống nắng khác.
                            Chúng sẽ hoạt động bằng cách cản lại các tia UV không làm cho thâm nhập vào da.<br>
                            -Kem chống nắng Some By Mi chứa đến 10.000PPM phức hợp độc quyền Truecica™ sẽ có tác dụng làm dịu, phục hồi và nuôi dưỡng các vùng da dang bị tổn thương, sử dụng được trên những làn da nhạy cảm, kích ứng.
                            Sử dụng 100% bộ lọc khoáng nano giúp giảm thiểu đi những vệt trắng trên da, khiến cho kem chống nắng Some By Mi vô cùng nhẹ thoáng, mịn màng và trong suốt trên ở trên làn da của bạn.<br>
                            -Sản phẩm sẽ hỗ trợ kiềm dầu, điều tiết bã nhờn, nhưng vẫn duy trì được độ ẩm cho làn da nhờ vào các thành phần như : Dipropylene Glycol, Butylene Glycol, Glycerin.
                            Cùng chỉ số chống nắng hoàn hảo SPF 50+ và PA ++++ bảo vệ làn da trước tác hại đến từ tia UVA và UVB cực mạnh.
                            </p>
                            </div>

                            <!-- công dụng -->
                            <div class="content-chitiet">
                                <p>- Sản phẩm có chỉ số chống nắng SPF 50+ PA++++ sẽ giúp bảo vệ làn da bạn tránh khỏi tác hại của ánh nắng mặt trời mỗi ngày.<br>
                                - Ngăn chặn các dấu hiệu lão hóa và cải thiện tình trạng da đang bị sạm đen.<br>
                                - Cùng với chất kem không quá đặc sẽ rất dễ dàng thấm vào da<br>
                                - . Không hề tạo hiệu ứng trắng bệch mất tự nhiên, rất thich hợp các cô gái yêu thích phong cách trang điểm nhẹ nhàng chắc chắn bạn sẽ phải lòng với em ấy ngay thôi.<br>
                                - Bởi vì chỉ cần một lớp mỏng thoa lên da là tone da của bạn sẽ được cải thiện rõ riệt, mà lại không hề mất đi nét tự nhiên của các nàng .<br>
                                -  Sản phẩm này còn sở hữu khả năng chống nước vượt trội.<br>
                                - Góp phần giữ cho lớp kem chống nắng ngày càng hoạt động tốt hơn kể cả trong môi trường nước và mồ hôi.<br>
                                - Chính vì thế, nếu bạn có là người tôn thờ chủ nghĩa dịch chuyển thì đây cũng không cần phải lo lắng đâu.<br>
                                - Em ấy sẽ giữ được cho bạn luôn tươi tắn, chống lại tác hại của tia UV.<br>
                                </p>
                            </div>

                        <!-- hướng dẫn sử dụng -->
                            <div class="content-baoquan">
                                <p>- Để sử dụng Kem chống nắng Some by Mi đúng cách và hiệu quả nhất, bạn hãy tham khảo những bước sau nhé : <br>
                                - Sử dụng vào buổi sáng sau khi đã hoàn thành được các bước dưỡng da và dùng trước bước Kem Dưỡng Some By Mi<br>
                                - Lấy 1 lượng kem vừa đủ ra tay rồi chấm vào các điểm trên gương mặt: Trán, cằm, mũi, hai bên má và cả vùng cổ<br>
                                - Sau đó massage đều cho kem chống nắng thẩm thấu hết vào da<br>
                                </p>
                            </div>
                        </div>
                

            </div>
        </div>
        
    </div>
</section>


<?php
include("./footer.php")

?>


<script>
const baoquan=document.querySelector(".baoquan")
const chitiet=document.querySelector(".chitiet")
const gioithieu=document.querySelector(".gioithieu")
if(baoquan){
    baoquan.addEventListener("click",function(){
        document.querySelector(".content-baoquan").style.display="block"
        document.querySelector(".content-chitiet").style.display="none"
        document.querySelector(".content-gioithieu").style.display="none"
    })
}
if(chitiet){
    chitiet.addEventListener("click",function(){
        document.querySelector(".content-baoquan").style.display="none"
        document.querySelector(".content-chitiet").style.display="block"
        document.querySelector(".content-gioithieu").style.display="none"
    })
}
if(gioithieu){
    gioithieu.addEventListener("click",function(){
        document.querySelector(".content-baoquan").style.display="none"
        document.querySelector(".content-chitiet").style.display="none"
        document.querySelector(".content-gioithieu").style.display="block"
    })
}
  </script>

  <style>
    .big-title{
    display: flex;
    border-bottom: 2px solid #cfcfcf;
    margin-bottom: 10px;
    }
    .content-chitiet, .content-baoquan{
    display: none;
    }
    .title-item :hover {
  font-weight: bold;
    }
    .title-item{
    padding: 6px;
    cursor: pointer;
    margin-right: 6px;
    font-weight: 500;
}
  </style>


<script>
    cart_quantity =document.querySelector("#cart_quantity");

    function Handleaddcart(product_id){
        cart_newquantity =cart_quantity.value;

        jQuery.ajax({
            url:"cart_API.php",
            method:"post",
            data:{
                action:"cart_add",
                product_id:product_id,
                cart_quantity:cart_newquantity,
            },
            success:function(data){
                location.reload();
            }
        })
    }
</script>