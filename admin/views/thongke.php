<?php
  include("./silder.php")
  
?>


<?php
  $db= mysqli_connect("localhost","root","","eight_store");
  $sum =0;
  $count=0;
  if($_POST){
    $tungay=$_POST['tungay'];
    $denngay=$_POST['denngay'];
    $sql= "SELECT * FROM oder WHERE  oder_date BETWEEN '$tungay 00:00:00' AND '$denngay 23:59:59'  and oder_status like '%hoàn thành%'";
    $result = mysqli_query($db,$sql);
    
    $count=mysqli_num_rows($result);
    if($result->num_rows>0){
        $i=0;
        while($row=$result->fetch_assoc()){
            $tien=$row['oder_totalmoney'];
          $i++;
          $sum += $tien;         
        }
    }
  }
  
?>

<div class=" main_right col-md-9  px-3 py-3">
                    <div class="container">
                        <div class="row">
                        <div class="col-3">
                                
                                </div>
                                <div class="col-3">
                                    <div class="thongke">
                                        <h1> Tổng số đơn hàng </h1>
                                        <p><?php echo $count ?></p>
                                    </div>
                                </div>
                                <div class="col-3">
                                <div class="thongke">
                                        <h1>Doanh thu </h1>
                                        <p><?php echo $sum ?></p>
                                    </div>
                                </div>
                                <div class="col-3">
                                    
                                </div>
                        </div>
                    </div>
                    <div class="chart px-2 py-3">
                        <h1>Thống kê doanh thu</h1>
                        <div id="myfirstchart" style="height: 250px;"></div>
                        <!-- lịch -->
                        <form action="" method="post">
                            <div class="thoigian">
                            <div class="theongay">
                                <label for="">Từ ngày:</label>
                                <input name="tungay" id="myID" type="text">
                            </div>
                            <div class="theongay">
                                <label for="">Đến ngày:</label>
                                <input name="denngay" id="myID" type="text">
                            </div>
                            <div class="theongay">
                                <button>Lọc</button>
                            </div>
                            </div>
                        </form>
                    </div>
</div>



<!-- lịch -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr("#myID", {});
</script>


</script>
<!-- biểu đồ -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script>
   var char = new Morris.Area({
  element: 'myfirstchart', 
 data: [
    { month: '2023-1', Total:  70000000},
    { month: '2023-2', Total:  75000000},
    { month: '2023-3', Total: 80000000 },
    { month: '2023-4', Total: 72000000 },
    { month: '2023-5', Total: 73000000 },
    { month: '2023-6', Total: 81000000 },
    { month: '2023-7', Total: 76000000 },
    { month: '2023-8', Total: 70000000 },
    { month: '2023-9', Total: 69000000 },
    { month: '2023-10', Total: 74000000 } ,
    { month: '2023-11', Total: 76000000 } ,
    { month: '2023-12', Total: 80000000} 
  ], 
  xkey: 'month',
  ykeys: ['Total'],
  labels: ['Tổng tiền']
});
</script>


