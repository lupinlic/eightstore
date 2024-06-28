<?php
include("./header.php");
if(isset($_GET["order_id"])){
    $order_id= $_GET["order_id"];
}


?>

<section>
    <div class="container py-3">
        <div style="display: flex;">
        <p style="font-weight: 500; font-size:20px;">Đơn hàng của tôi/</p>
        <p style="font-weight: 500; font-size:20px; padding-left:4px; color:darkgray"><?php echo $order_id ?> </p>
        </div>
        <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Sản phẩm</th>
                        <th scope="col"></th>
                        <th scope="col">Số lượng</th>
                        
                        <th scope="col">Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $i=0;
                        $data->select("SELECT tbl_product.product_name,`order-detail`.* 
                        FROM `order-detail` INNER JOIN tbl_product ON `order-detail`.product_id = tbl_product.product_id
                        WHERE order_id='$order_id' ");
                        while($row = $data->fech()){
                            $i++;
                            $product_name = $row["product_name"];
                            $orderdetail_num = $row["order-detail_num"];
                            $orderdetail_total = $row["order-detail_total"];
                            echo "
                            <tr>
                            <th scope='row'>$i</th>
                            <td>$product_name</td>
                            <th><img style='width: 50px;' src='../css/img/anh/sp1.jpg' alt=''></th>
                            <td>$orderdetail_num</td>
                            <td>$orderdetail_total</td>
                            </tr>
                            ";
                        }
                         

                        ?>
                        
                    </tbody>
                </table>
        <a  href="./index.php"><button style="background-color: #fa7551; width:200px; height:50px; border:none; border-radius: 5px;color: #fff; ">Về trang chủ</button></a>
    </div>
</section>


<?php
include("./footer.php")

?>