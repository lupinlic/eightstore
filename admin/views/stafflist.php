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
            <h1 class="py-3">Danh sách nhân viên</h1>
            </div>
            <div class="col-md-7">

            </div>
            <div class="new_order col-md-2 py-3 border-black">
                <a href="./staffadd.php" class="p-2 bg-info">Thêm nhân viên</a>
            </div>
        </div>
    </div>
    <div class="container">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Tên nhân viên</th>
      <th scope="col">SĐT</th>
      <th scope="col">Lương</th>
      <th scope="col">Chi tiết</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php
    $data->select("SELECT * FROM staff");
    $i=0;
    while($row = $data->fech()){
      $i++;
      $staff_name = $row["staff_name"];
      $staff_telephone = $row["staff_telephone"];
      $staff_wage = $row["staff_wage"];
      $staff_id = $row["staff_id"];
      echo "
      <tr class='hang'>
      <th scope='row'>$i</th>
      <td class='staff_name'>$staff_name</td>
      <td class='staff_password'>$staff_telephone</td>
      <td>$staff_wage</td>
      <td><a href='staffedit.php?staff_id=$staff_id''>Sửa</a>|<a onclick='Deletestaff($staff_id)'>Xóa</a></td>
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
  var staff_name =document.querySelectorAll(".staff_name");
  for(let i=0;i<staff_name.length;i++){
    staff_name[i].onclick=function(e){
    alert(e.target.textContent);
  }
  }
  
  function Deletestaff(staff_id){
    confirm("bạn có thực sự muốn xóa ko");
    if(confirm){
      jQuery.ajax({
      url:"staff_API.php",
      method:"post",
      data:{
        staff_id:staff_id,
        action:"staff_delete",
      },
      success:function(data){
        location.reload();
      }
    })
    }
  }
</script>