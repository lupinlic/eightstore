<?php
  include("./silder.php");
  
  if(isset($_GET["staff_id"])){
    $staff_id = $_GET["staff_id"];
    $data->select("SELECT * FROM staff WHERE staff_id='$staff_id'");
    $row=$data->fech();

    $staff_name = $row["staff_name"];
    $staff_telephone = $row["staff_telephone"];
    $staff_wage = $row["staff_wage"];
    $staff_id = $row["staff_id"];
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
    <h1 class="py-1">Thêm sản phẩm</h1>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="py-2">
                    <label for="">Tên nhân viên<span style="color: red;">*</span></label>
                    <input type="text" class="staff_name" value="<?php echo $staff_name ?>">
                </div>
            </div>
            <div class="col-4">
            <div class="py-2">
                    <label for="">SĐT<span style="color: red;">*</span></label>
                    <input  type="text" class="staff_telephone" value="<?php echo $staff_telephone ?>">
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <div class="col-4">
                <div class="py-2">
                    <label for="">Lương<span style="color: red;">*</span></label>
                    <input type="text" class="staff_wage" value="<?php echo $staff_wage ?>">
                </div>
            </div>
        </div>
    </div>
    
    <button onclick="Handleeditstaff('<?php echo $staff_id ?>')" style="margin-top: 20px;">Sửa</button>
</div>
<script> 
	CKEDITOR.replace( 'noidung' );
</script>


<script>
    var formData = new FormData();

    var staff_name =document.querySelector(".staff_name");
    var staff_telephone =document.querySelector(".staff_telephone");
    var staff_wage =document.querySelector(".staff_wage");

    function Handleeditstaff(staff_id){
        name =staff_name.value;
        telephone =staff_telephone.value;
        wage = staff_wage.value;

        formData.append("action","staff_edit");
        formData.append("staff_name",name);
        formData.append("staff_telephone",telephone);
        formData.append("staff_wage",wage);
        formData.append("staff_id",staff_id);

        jQuery.ajax({
            url:"staff_API.php",
            method:"post",
            data : formData,
            contentType:false,
            processData:false,
            success:function(data){
                window.location.href = "stafflist.php";
            }
        })
        }
</script>