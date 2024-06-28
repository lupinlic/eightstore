<?php 

if(isset($_POST["action"])){
    include "../../config/data.php";
    $data = new database;


    $action = $_POST["action"];

    switch($action){
        case "staff_add":
            Addstaff($data);
            break;
        case "staff_edit":
            Editstaff($data);
            break;
        case "staff_delete":
            Deletestaff($data);
            break;
        default:
        break;
    }
};
function Addstaff($data){
    $staff_name = $_POST["staff_name"];
    $staff_telephone = $_POST["staff_telephone"];
    $staff_wage = $_POST["staff_wage"];

    $data->command("INSERT INTO staff VALUE(NULL,'$staff_name','$staff_telephone','$staff_wage')");
    echo("thành công");
}

function Editstaff($data){
    $staff_name = $_POST["staff_name"];
    $staff_telephone = $_POST["staff_telephone"];
    $staff_wage = $_POST["staff_wage"];
    $staff_id = $_POST["staff_id"];

    $data->command("UPDATE staff SET staff_name='$staff_name',
    staff_telephone='$staff_telephone',staff_wage='$staff_wage'
    WHERE staff_id='$staff_id'");
    echo("thành công");
}

function Deletestaff($data){
    $staff_id = $_POST["staff_id"];
    $data->command("DELETE FROM staff WHERE staff_id = '$staff_id'");
    echo("thành công");
}
?>