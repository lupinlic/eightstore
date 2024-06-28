<?php
include("./header.php");
if(isset($_GET["category_id"])){
  $category_id= $_GET["category_id"];
}

?>

<section class="py-3" style="background-color: #f1eeee;">
<div class="container-fluid">
      <div class="container">
      <p style="font-weight: 500; font-size:26px;">Sản phẩm</p>
        <div class="row">
        <?php
        $data->select("SELECT * FROM tbl_product WHERE category_id=$category_id");
        $i=0;
        while($row = $data->fech()){
          $i++;
          $product_name = $row["product_name"];
          $product_img = $row["product_img"];
          $product_price = $row["product_price"];
          $product_mota = $row["product_mota"];
          $product_id = $row["product_id"];
          $category_id = $row["category_id"];
          echo "
          <div class=' p-1 col-2'>
              <div class='sanp'>
              <a href='./chitiet.php?product_id=$product_id'>
              <div class='sp'>
                <img style='height:220px;' src='$product_img' alt=''>
                <p style='color: red;font-size:20px;font-weight: 500;'>$product_price</p>
                <p style='color: #000;'>$product_name</p>
                  </div>
                </a>
              </div>
            </div>
          ";
        }
        ?>
        </div>
      </div>

    </div>
</section>


<?php
include("./footer.php")

?>