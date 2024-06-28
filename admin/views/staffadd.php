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
    <h1 class="py-1">Thêm nhân viên</h1>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="py-2">
                    <label for="">Tên nhân viên<span style="color: red;">*</span></label>
                    <input type="text" class="staff_name">
                </div>
            </div>
            <div class="col-4">
            <div class="py-2">
                    <label for="">SĐT<span style="color: red;">*</span></label>
                    <input  type="text" class="staff_telephone">
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <div class="col-4">
                <div class="py-2">
                    <label for="">Lương<span style="color: red;">*</span></label>
                    <input type="text" class="staff_wage">
                </div>
            </div>
        </div>
    </div>
    
    <button onclick="Handleaddstaff()" style="margin-top: 20px;">Thêm</button>
</div>
<script> 
	CKEDITOR.replace( 'noidung' );
</script>


<script>
    var formData = new FormData();

    var staff_name =document.querySelector(".staff_name");
    var staff_telephone =document.querySelector(".staff_telephone");
    var staff_wage =document.querySelector(".staff_wage");

    function Handleaddstaff(){
        name =staff_name.value;
        telephone =staff_telephone.value;
        wage = staff_wage.value;

        formData.append("action","staff_add");
        formData.append("staff_name",name);
        formData.append("staff_telephone",telephone);
        formData.append("staff_wage",wage);

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