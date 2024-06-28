<?php
  include("./silder.php")
  
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
    <h1 class="py-1">Thêm sản phẩm</h1>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="py-2">
                    <label for="">Tên sản phẩm<span style="color: red;">*</span></label>
                    <input type="text" class="product_name">
                </div>
            </div>
            <div class="col-4">
            <div class="py-2">
                    <label for="">Giá sản phẩm<span style="color: red;">*</span></label>
                    <input  type="text" class="product_price">
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div style="padding-top: 70px;" class="col-4">
            <label for="">Danh mục sản phẩm<span style="color: red;">*</span></label>
            <select name='' id='product_category'>
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
            <div class="col-8">
                <img style="width: 150px;" src="../css/img/no_img.png" alt="">
                <input style="margin-top: 70px;border-bottom: none; " type="file" class="product_img" onchange="GetFile()">
            </div>
        </div>
    </div>
    <div class="py-3">
        <label for="">Mô tả <span style="color: red;">*</span></label>
        <textarea required name="noidung" id="product_mota" cols="30" rows="10"></textarea>
    </div>
    <button onclick="Handleaddproduct()">Thêm</button>
</div>
<script> 
	CKEDITOR.replace( 'noidung' );
</script>


<script>
    var file,isfile=false;
    var formData = new FormData();

    var product_img =document.querySelector(".product_img");
    var product_name =document.querySelector(".product_name");
    var product_price =document.querySelector(".product_price");
    var productcategoryg =document.querySelector("#product_category");
    var product_mota=document.querySelector("#product_mota");

    function GetFile(){
        file = product_img.files[0];
        if(file){
            isfile=!isfile;
            console.log(file);
        }
    }

    function Handleaddproduct(){
        if(isfile){
        name =product_name.value;
        price =product_price.value;
        category = productcategoryg.value;
        mota =product_mota.value;
        formData.append("action","product_add");
        formData.append("product_name",name);
        formData.append("product_price",price);
        formData.append("category_id",category);
        formData.append("product_mota",mota);
        formData.append("file",file);

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
        }else{
            alert("vui lòng chọn file ảnh");
        }
        
    }
</script>