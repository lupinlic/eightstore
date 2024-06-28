<?php 

if(isset($_POST["action"])){
    include "../../config/data.php";
    $data = new database;


    $action = $_POST["action"];

    switch($action){
        case "supplier_add":
            Addsupplier($data);
            break;
        case "supplier_edit":
            Editsupplier($data);
            break;
        case "supplier_delete":
            Deletesupplier($data);
            break;
        default:
        break;
    }
};
function Addsupplier($data){
    $supplier_name = $_POST["supplier_name"];
    $supplier_address = $_POST["supplier_address"];
    $data->command("INSERT INTO supplier VALUE(NULL,'$supplier_name','$supplier_address')");
    echo("thành công");
}

function Editsupplier($data){
    $supplier_name = $_POST["supplier_name"];
    $supplier_address= $_POST["supplier_address"];
    $supplier_id = $_POST["supplier_id"];
    $data->command("UPDATE supplier SET supplier_name='$supplier_name', supplier_address = '$supplier_address' WHERE supplier_id='$supplier_id'");
    echo("thành công");
}

function Deletesupplier($data){
    $supplier_id = $_POST["supplier_id"];
    $data->command("DELETE FROM supplier WHERE supplier_id = '$supplier_id'");
    echo("thành công");
}
?>