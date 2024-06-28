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
    
</style>

<div class=" main_right col-md-9  px-3">
    
    <div class="container">
        <div class="row">
            <div class="col-md-3">
            <h1 class="py-3">Danh sách tài khoản</h1>
            </div>
            <div class="col-md-7">

            </div>
            <div class="new_order col-md-2 py-3 border-black">
                <a href="./useradd.php" class="p-2 bg-info">Thêm tài khoản</a>
            </div>
        </div>
    </div>
    <div class="container">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Tên tài khoản</th>
      <th scope="col">Mật khẩu</th>
      <th scope="col">Email</th>
      <th scope="col">Phân quyền</th>
      <th scope="col">Chi tiết</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php
    $data->select("SELECT * FROM tbl_user");
    $i=0;
    while($row = $data->fech()){
      $i++;
      $user_name = $row["user_name"];
      $user_password = $row["user_password"];
      $user_email = $row["user_email"];
      $user_role = $row["user_role"];
      $user_id = $row["user_id"];
      echo "
      <tr class='hang'>
      <th scope='row'>$i</th>
      <td class='user_name'>$user_name</td>
      <td class='user_password'>$user_password</td>
      <td>$user_email</td>
      <td>$user_role</td>
      <td><a href='useredit.php?user_id=$user_id''>Sửa</a>|<a onclick='Deleteuser($user_id)'>Xóa</a></td>
      <td ><i class='chitiet' ></i></td>
      <!-- <i class='fa-regular fa-eye'></i> -->
    </tr>
      ";
    }
    ?>
    
  </tbody>
</table>
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
  var user_name =document.querySelectorAll(".user_name");
  for(let i=0;i<user_name.length;i++){
    user_name[i].onclick=function(e){
    alert(e.target.textContent);
  }
  }
  
  function Deleteuser(user_id){
    confirm("bạn có thực sự muốn xóa ko");
    if(confirm){
      jQuery.ajax({
      url:"user_API.php",
      method:"post",
      data:{
        user_id:user_id,
        action:"user_delete",
      },
      success:function(data){
        location.reload();
      }
    })
    }
  }
</script>