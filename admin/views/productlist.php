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
    .product_img{
      width: 70px;
      height: 70px;
      border-radius: 10px;
    }
    .phantrang{
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 20px 0;
    }
    .phantrang ul{
        display: flex;
    }
    .phantrang li{
        border: 1px solid #000;
        background-color: aqua;
        margin-left: 10px;
        padding: 5px;
    }
    li{
      list-style: none;
    }
</style>

<div class=" main_right col-md-9  px-3">
    
    <div class="container">
        <div class="row">
            <div class="col-md-3">
            <h1 class="py-3">Danh sách sản phẩm</h1>
            </div>
            <div class="col-md-7">

            </div>
            <div class="new_order col-md-2 py-3 border-black">
                <a href="./productadd.php" class="p-2 bg-info">Thêm sản phẩm</a>
            </div>
        </div>
    </div>
    <div class="container">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Tên</th>
      <th scope="col">Ảnh</th>
      <th scope="col">Giá</th>
      <th scope="col">Mô tả</th>
      <th scope="col">Chi tiết</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody id="Renderproduct">
    <?php
    $db= mysqli_connect("localhost","root","","eight_store");
    $query= "SELECT * FROM tbl_product";
    $result = mysqli_query($db,$query);
    $count = mysqli_num_rows($result);;
    $page= ceil($count/4);
    if (!isset ($_GET['page']) ) {

      $current_page = 1;
      
      } else {
      
      $current_page = $_GET['page'];
      
      }
      $index= ($current_page-1)*4;
      $query= "SELECT * FROM tbl_product LIMIT $index, 4 ";
      $rs = mysqli_query($db,$query);  

    
    $i=0;
    while($row=$rs->fetch_assoc()){
      $i++;
      $product_name = $row["product_name"];
      $product_img = $row["product_img"];
      $product_price = $row["product_price"];
      $product_mota = $row["product_mota"];
      $product_id = $row["product_id"];
      $category_id = $row["category_id"];
      echo "
      <tr class='hang'>
      <th scope='row'>$i</th>
      <td class='product_name'>$product_name</td>
      <td><img class='product_img' src='$product_img' alt='ảnh'></td>
      <td>$product_price</td>
      <td>$product_mota</td>
      <td><a href='productedit.php?product_id=$product_id''>Sửa</a>|<a onclick='Deleteproduct($product_id)'>Xóa</a></td>
      <td ><i class='chitiet' ></i></td>
      <!-- <i class='fa-regular fa-eye'></i> -->
    </tr>
      ";
    }
    ?>
    
  </tbody>
</table>
    </div>



    <div class="phantrang">
                <ul>
                    <?php 
                    for($i=1; $i<=$page; $i++){  
                    ?>
                    <li><a href="productlist.php?page=<?php echo $i ?>"><?php echo $i ?></a></li>
                    <?php  }  ?>
                </ul>
            </div>
</div>

<script>
  const chitiet=document.querySelector('.chitiet');
  const hangs=document.querySelectorAll('.hang');
  for(let i=0; i<hangs.length;i++){
    const hang=hangs[i];
    hang.onmouseover=function(){
      chitiet.classList.add("fa-regular fa-eye");
    }
  }
</script>


<script>
  var formData = new FormData();
  var Renderproduct =document.querySelector("#Renderproduct");
  var product_name =document.querySelectorAll(".product_name");
  for(let i=0;i<product_name.length;i++){
    product_name[i].onclick=function(e){
    alert(e.target.textContent);
  }
  }
  
  function Deleteproduct(product_id){
    confirm("bạn có thực sự muốn xóa ko");
    if(confirm){
      jQuery.ajax({
      url:"product_API.php",
      method:"post",
      data:{
        product_id:product_id,
        action:"product_delete",
      },
      success:function(data){
        location.reload();
      }
    })
    }
  }
</script>