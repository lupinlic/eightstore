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
    .addsupplier{
      display: none;
    }
    .editsupplier{
      display: none;
    }
    .active{
      display: block;
    }

</style>

<div class=" main_right col-md-9  px-3">
<h1>Thêm/Sửa nhà cung cấp</h1>
    <div class="container py-3">
      <div class="row">
        <div class="col-4">
          <label for="">Tên nhà cung cấp<span style="color: red;">*</span></label>
          <input type="text" class="supplier_name">
        </div>
        <div class="col-4">
          <label for="">Địa chỉ nhà cung cấp<span style="color: red;">*</span></label>
          <input type="text" class="supplier_address">
        </div>
        <div class="col-4">
          <button class="addsupplier active" onclick="Addsupplier()">thêm</button>
          <button class="editsupplier">Xác nhận</button>
        </div>
      
      
      
      </div>
    </div>
      <h1 class="py-3">Danh sách nhà cung cấp</h1>
    <div class="container">
        <form action="post">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Tên</th>
      <th scope="col">Địa chỉ</th>
      <th scope="col">Chi tiết</th>
    </tr>
  </thead>
  <tbody>
      <?php 
      $data->select("SELECT * FROM supplier");
      $i=0;
      while($row = $data->fech()){
        $supplier_name = $row["supplier_name"];
        $supplier_id = $row["supplier_id"];
        $supplier_address= $row["supplier_address"];
        $i++;
        echo "
        <tr>
        <th scope='row'>$i</th>
          <td>$supplier_name</td>
          <td>$supplier_address</td>
          <td><a onclick ='HandleEditsupplier(\"$supplier_name\",\"$supplier_address\",$supplier_id)'>Sửa</a>|<a onclick='Deletesupplier($supplier_id)'>Xóa</a></td>
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

  var supplier_name = document.querySelector(".supplier_name");
  var supplier_address = document.querySelector(".supplier_address");
  var supplier_add = document.querySelector(".supplier_add");
  var editsupplier = document.querySelector(".editsupplier");
  var addsupplier = document.querySelector(".addsupplier");

function Deletesupplier(supplier_id){
  confirm("bạn có thực sự muốn xóa ko");
  if(confirm){
    var supplier_id = supplier_id;

  jQuery.ajax({
  url:"../views/supplier_API.php",
  method:"post",
  data:{
    action:"supplier_delete",
    supplier_id:supplier_id
  },
  success:function(data){
      location.reload();
  }
  })
  }
}

function Addsupplier(){
  var supplier_newname =supplier_name.value;
  var supplier_newaddress =supplier_address.value;
  jQuery.ajax({
  url:"../views/supplier_API.php",
  method:"post",
  data:{
    action:"supplier_add",
    supplier_name:supplier_newname,
    supplier_address:supplier_newaddress
  },
  success:function(data){
      location.reload();
  }
  })
}

function HandleEditsupplier(supplier_namesql,supplier_addresssql,supplier_id){
  isEdit = !isEdit;
  editsupplier.classList.toggle("active",isEdit);
  addsupplier.classList.toggle("active",!isEdit);

  supplier_name.value = supplier_namesql;
  supplier_address.value=supplier_addresssql;
  editsupplier.onclick = function(e){
    var supplier_newname =supplier_name.value;
    var supplier_newaddress =supplier_address.value;
    jQuery.ajax({
    url:"../views/supplier_API.php",
    method:"post",
    data:{
      action:"supplier_edit",
      supplier_name:supplier_newname,
      supplier_id :supplier_id,
      supplier_address:supplier_newaddress
    },
    success:function(data){
        location.reload();
    }
    })
  }
}

</script>