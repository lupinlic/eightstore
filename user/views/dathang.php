<?php
include("./header.php");

if(isset($_SESSION["cart_save"])){
    $cart_save = $_SESSION["cart_save"];
    $carts = $cart_save->cart;
    $sumtotal = $cart_save->sumtotal;
}else{
    echo "chưa vào";
}
?>

<section>
    <div class="container py-3">
        <div class="row">
            <div class="col-6">
                <p style="font-size: 20px; margin-left:8px">Thông tin nhận hàng</p>
                <div class="checkout">
                    <input name="fullname" required type="text" placeholder="Nhập họ tên" class="oder_name">
                    <input name="email" required type="email" placeholder="Nhập email" class="oder_email">
                    <input name="phone" required type="text" placeholder="Nhập số điện thoại" class="oder_telephone">
                    <input name="address" type="text" placeholder="Nhập địa chỉ" class="oder_address">
                    <label for="">Nội dung <span style="color: red;">*</span></label>
                    <textarea required name="note" id="" cols="30" rows="10" class="oder_content"></textarea>
                </div>
            </div>
            <div class="col-6">
                <p style="font-size: 20px; margin-left:8px">Hóa đơn</p>
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Sản phẩm</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                       
                        for($i=0; $i< count($carts);$i++){
                            $product_name = $carts["$i"]->product_name;
                            $cart_number = $carts["$i"]->cart_number;
                            $cart_totalmoney = $carts["$i"]->cart_totalmoney;
                            $index = $i+1;
                            echo "
                            <tr>
                            <th scope='row'>$index</th>
                            <td>$product_name</td>
                            <td>$cart_number</td>
                            <td>$cart_totalmoney</td>
                            </tr>
                            ";
                        };
                        ?>
                       
                        <tr>
                        <th scope="row">Tổng</th>
                        <td colspan="3"><?php echo $sumtotal ?></td>
                        
                        </tr>
                    </tbody>
                </table>
                <div style="display: flex; justify-content:center">
                <button style="background-color: #fa7551; width:200px;
                height:50px; border:none; border-radius: 5px;color: #fff;
                " onclick="HandleOder(<?php echo $sumtotal ?>)">Xác nhận đặt hàng</button>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
include("./footer.php")

?>

<style>
    .checkout{
    flex: 1;
    display: flex;
    flex-direction: column;
  }
  .checkout input{
    border: 1px solid #c4c2c2;
        border-radius: 3px;
        height: 35px;
        margin: 10px;
  }
  textarea{
    border: 1px solid #c4c2c2;
        border-radius: 3px;
        
        margin: 10px;
  }
  label{
    margin: 10px 0px;
    font-size: 20px;
  }
</style>


<script>
    const oder_name =document.querySelector(".oder_name");
    const oder_email =document.querySelector(".oder_email");
    const oder_telephone =document.querySelector(".oder_telephone");
    const oder_address =document.querySelector(".oder_address");
    const oder_content =document.querySelector(".oder_content");

    function HandleOderdetail(oder_id){
        jQuery.ajax({
            url:"donhangchitiet_API.php",
            method:"post",
            data:{
                action:"oder-detail_add",
                oder_id:oder_id,
            },
            success:function(data){
                HandleDeletecartischeck();
            }
        })
    }
    function HandleDeletecartischeck(){
        jQuery.ajax({
            url:"cart_API.php",
            method:"post",
            data:{
                action:"cart_deletes",
            },
            success:function(data){
                window.location.href= "thank.php"
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
        const getoder_content =oder_content.value;
        
        jQuery.ajax({
            url:"donhang_API.php",
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
</script>