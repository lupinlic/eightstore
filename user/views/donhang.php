<?php
include("./header.php");
$db= mysqli_connect("localhost","root","","eight_store");
$sql= "SELECT * FROM oder";
    $result = mysqli_query($db,$sql);
    $count=mysqli_num_rows($result);
?>

<section>
    <div class="container py-3">
    <div style="display: flex;">
        <p style="font-size: 20px; margin-left:8px">Đơn hàng</p>
        <p style="color: red; margin-left: 4px;font-size: 20px; "> <?php echo $count ?></p>
    </div>
        <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Mã đơn hàng</th>
                        <th scope="col">Ngày đặt</th>
                        <th scope="col">Tổng tiền</th>
                        <th scope="col">Trạng thái đơn hàng</th>
                        <th scope="col">Chi tiết đơn hàng</th>
                        <th scope="col" ></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i=0;
                        $data->select("SELECT * FROM oder");
                        while($row= $data->fech()){
                            $i++;
                            $oder_id = $row["oder_id"];
                            $oder_date = $row["oder_date"];
                            $oder_totalmoney = $row["oder_totalmoney"];
                            $oder_status = $row["oder_status"];
                            echo "
                            <tr>
                            <th scope='row'>$i</th>
                            <td>$oder_id</td>
                            <td>$oder_date</td>
                            <td>$oder_totalmoney</td>
                            <td>$oder_status</td>
                            <td><a href='./chitietdh.php?order_id=$oder_id'><i class='fa-solid fa-eye'></i></a></td>
                            <td><a href='' style='cursor: pointer;' onclick='DeleteOrder($oder_id)'>xóa</a></td>
                            </tr>
                            ";
                        }
                        ?>
                        
                    </tbody>
                </table>
    </div>
    
</section>


<?php
include("./footer.php")

?>

<script>
    function DeleteOrder(oder_id){
        confirm("bạn có thực sự muốn xóa đơn hàng này không");

        jQuery.ajax({
            url:"donhang_API.php",
            method:"post",
            data:{
                action:"oder_delete",
                oder_id:oder_id,
            }
            ,success:function(data){
                location.reload();
            }
        })
    }
</script>