<?php
  include("./silder.php");

  if(isset($_GET["product_id"])){
    $product_id= $_GET["product_id"];
    $data->select("SELECT * FROM tbl_product WHERE product_id='$product_id'");
    $row = $data->fech();

    $product_name = $row["product_name"];
    $product_price = $row["product_price"];
    $product_mota = $row["product_mota"];
    $category_id = $row["category_id"];
    $product_img = $row["product_img"];

    $data->select("SELECT * FROM tbl_category WHERE category_id='$category_id'");
    $row = $data->fech();
    $category_name = $row["category_name"];
    $category_id = $row["category_id"];

  }


?>
<style>
    a{
        text-decoration: none;
    }
    input{
        border: none;
        border-bottom: 1px solid #000;
        outline: none;
    }
    button{
        border: 1px solid #000;
        width: 100px;
        border-color: aqua;
        background-color: aliceblue;
    }
</style>
<script src="../css/ckeditor/ckeditor.js"> </script>
<div class=" main_right col-md-9  px-3">
    <h1 class="py-1">Sửa sản phẩm</h1>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="py-2">
                    <label for="">đường dẫn ảnh sản phâm<span style="color: red;">*</span></label>
                    <input type="text" value="<?php echo $product_img ?>" class="product_img">
                </div>
            </div>
            <div class="col-4">
                <div class="py-2">
                    <label for="">Tên sản phẩm<span style="color: red;">*</span></label>
                    <input type="text" value="<?php echo $product_name ?>" class="product_name">
                </div>
            </div>
            <div class="col-4">
            <div class="py-2">
                    <label for="">Giá sản phẩm<span style="color: red;">*</span></label>
                    <input  type="text" value="<?php echo $product_price ?>" class="product_price">
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div style="padding-top: 70px;" class="col-4">
            <label for="">Danh mục sản phẩm<span style="color: red;">*</span></label>
            <select name='' id='product_category'>
                <option value="<?php echo $category_id ?>" hidden><?php echo $category_name ?></option>
            <?php 
            $data->select("SELECT * FROM tbl_category");
            while($row = $data->fech()){
                $category_name = $row["category_name"];
                $category_id = $row["category_id"];
                echo "
                <option value='$category_id'>$category_name</option>
                ";
                
            }
            ?>
            </select>
            </div>
            <!-- <div class="col-4">
                <img style="width: 150px;float: right;" src="../css/img/no_img.png" alt="">
            </div> -->
            <div class="col-8">
                <input style="margin-top: 70px;border-bottom: none; " type="file" onchange="Getfile()" id="file">chọn ảnh nếu muốn thay đổi
            </div>
        </div>
    </div>
    <div class="py-3">
        <label for="">Mô tả <span style="color: red;">*</span></label>
        <textarea required name="noidung" id="product_mota" cols="30" rows="10"> <?php echo $product_mota ?> </textarea>
    </div>
    <button onclick="HandleEditproduct(<?php echo $product_id ?>,'<?php echo $product_img ?>')">Sửa</button>
</div>
<script>
    
	CKEDITOR.replace( 'noidung' );
</script>


<script>
    var formData = new FormData();
    var file;
    var isfile=false;
    const product_mota = document.querySelector("#product_mota");
    const product_img =document.querySelector(".product_img");
    const product_name =document.querySelector(".product_name");
    const product_price =document.querySelector(".product_price");
    const productcategoryg =document.querySelector("#product_category");
    const product_file =document.querySelector("#file");

function Getfile(){
    file = product_file.files[0];
    if(file){
        console.log(file);
        isfile = !isfile;
        formData.append("file",file);
    }
}

function HandleEditproduct(product_id,product_img){
    name =product_name.value;
    price =product_price.value;
    category = productcategoryg.value;
    mota =product_mota.value;

    formData.append("action","product_edit");
    formData.append("product_name",name);
    formData.append("product_price",price);
    formData.append("category_id",category);
    formData.append("product_mota",mota);
    formData.append("product_id",product_id);
    formData.append("product_img",product_img);

    jQuery.ajax({
        url:"product_API.php",
        method:"post",
        data : formData,
        contentType:false,
        processData:false,
        success:function(data){
            window.location.href = "productlist.php"; 
        }
    })

}

</script>