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
    <h1 class="py-1">Thêm tài khoản</h1>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="py-2">
                    <label for="">Tài khoản<span style="color: red;">*</span></label>
                    <input type="text" class="user_name">
                </div>
            </div>
            <div class="col-4">
            <div class="py-2">
                    <label for="">Mật khẩu<span style="color: red;">*</span></label>
                    <input  type="text" class="user_password">
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <div class="col-4">
                <div class="py-2">
                    <label for="">Email<span style="color: red;">*</span></label>
                    <input type="text" class="user_email">
                </div>
            </div>
            <div class="col-4">
            <div class="py-2">
                    <label for="">Phân quyền<span style="color: red;">*</span></label>
                    <select name="" id="user_role">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    
    <button onclick="Handleadduser()" style="margin-top: 20px;">Thêm</button>
</div>
<script> 
	CKEDITOR.replace( 'noidung' );
</script>


<script>
    var formData = new FormData();

    var user_name =document.querySelector(".user_name");
    var user_password =document.querySelector(".user_password");
    var user_email =document.querySelector(".user_email");
    var user_role=document.querySelector("#user_role");

    function Handleadduser(){
        name =user_name.value;
        password =user_password.value;
        email = user_email.value;
        role =user_role.value;

        formData.append("action","user_add");
        formData.append("user_name",name);
        formData.append("user_password",password);
        formData.append("user_role",role);
        formData.append("user_email",email);

        jQuery.ajax({
            url:"user_API.php",
            method:"post",
            data : formData,
            contentType:false,
            processData:false,
            success:function(data){
                window.location.href = "userlist.php";
            }
        })
        }
</script>