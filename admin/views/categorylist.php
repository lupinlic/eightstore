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
    button{
        border: 1px solid #000;
        width: 100px;
        border-color: aqua;
        background-color: aliceblue;
    }
    input{
        border: none;
        border-bottom: 1px solid #000;
        outline: none;
    }
    .addcategory{
      display: none;
    }
    .editcategory{
      display: none;
    }
    .active{
      display: block;
    }

</style>

<div class=" main_right col-md-9  px-3">
<h1>Thêm/Sửa danh mục</h1>
    <div class="container py-3">
      <div class="row">
        <div class="col-4">
          <label for="">Tên danh mục<span style="color: red;">*</span></label>
          <input type="text" class="category_name">
        </div>
        <div class="col-4">
          <button class="addcategory active" onclick="Addcategory()">thêm</button>
          <button class="editcategory">Xác nhận</button>
        </div>
      
      
      
      </div>
    </div>
      <h1 class="py-3">Danh sách danh mục</h1>
    <div class="container">
        <form action="post">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">TÊN</th>
      <th scope="col">Chi tiết</th>
    </tr>
  </thead>
  <tbody>
      <?php 
      $data->select("SELECT * FROM tbl_category");
      $i=0;
      while($row = $data->fech()){
        $category_name = $row["category_name"];
        $category_id = $row["category_id"];
        
        $i++;
        echo "
        <tr>
        <th scope='row'>$i</th>
          <td>$category_name</td>
          <td><a onclick ='HandleEditcategory(\"$category_name\",$category_id)'>Sửa</a>|<a onclick='Deletecategory($category_id)'>Xóa</a></td>
        </tr>
        ";
      };
      
      ?>
    </tr>
   
  </tbody>
</table>
      </form>
    </div>
</div>

<script type="text/javascript">
  var isEdit =false;

  var category_name = document.querySelector(".category_name");
  var category_add = document.querySelector(".category_add");
  var editcategory = document.querySelector(".editcategory");
  var addcategory = document.querySelector(".addcategory");
  // $("document").ready(function(){
  //   category_add.onclick = function(e){
  //   const category_newname =category_name.value;

  //   $.post("category_API.php",{
  //     action: "category_add",
  //     category_name:category_name,
  //   },function(data){
  //     alert(data);
  //     location.reload();
  //   })
  // }
  // })

function Deletecategory(category_id){
  confirm("bạn có thực sự muốn xóa ko");
  if(confirm){
    var category_id = category_id;

  jQuery.ajax({
  url:"../views/category_API.php",
  method:"post",
  data:{
    action:"category_delete",
    category_id:category_id
  },
  success:function(data){
      location.reload();
  }
  })
  }
}

function Addcategory(){
  var category_newname =category_name.value;

  jQuery.ajax({
  url:"../views/category_API.php",
  method:"post",
  data:{
    action:"category_add",
    category_name:category_newname
  },
  success:function(data){
      location.reload();
  }
  })
}

function HandleEditcategory(category_namesql,category_id){
  isEdit = !isEdit;
  editcategory.classList.toggle("active",isEdit);
  addcategory.classList.toggle("active",!isEdit);

  category_name.value = category_namesql;

  editcategory.onclick = function(e){
    var category_newname =category_name.value;

    jQuery.ajax({
    url:"../views/category_API.php",
    method:"post",
    data:{
      action:"category_edit",
      category_name:category_newname,
      category_id :category_id,
    },
    success:function(data){
        location.reload();
    }
    })
  }
}

</script>