<?php 

if(isset($_POST["action"])){
    include "../../config/data.php";
    $data = new database;


    $action = $_POST["action"];

    switch($action){
        case "user_add":
            Adduser($data);
            break;
        case "user_edit":
            Edituser($data);
            break;
        case "user_delete":
            Deleteuser($data);
            break;
        default:
        break;
    }
};
function Adduser($data){
    $user_name = $_POST["user_name"];
    $user_password = $_POST["user_password"];
    $user_email = $_POST["user_email"];
    $user_role = $_POST["user_role"];

    $data->command("INSERT INTO tbl_user VALUE(NULL,'$user_name','$user_password','$user_email','$user_role')");
    echo("thành công");
}

function Edituser($data){
    $user_name = $_POST["user_name"];
    $user_password = $_POST["user_password"];
    $user_email = $_POST["user_email"];
    $user_role = $_POST["user_role"];
    $user_id = $_POST["user_id"];

    $data->command("UPDATE tbl_user SET user_name='$user_name',
    user_password='$user_password',user_email='$user_email',
    user_role='$user_role' WHERE user_id='$user_id'");
    echo("thành công");
}

function Deleteuser($data){
    $user_id = $_POST["user_id"];
    $data->command("DELETE FROM tbl_user WHERE user_id = '$user_id'");
    echo("thành công");
}
?>