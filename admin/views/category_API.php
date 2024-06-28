<?php 

if(isset($_POST["action"])){
    include "../../config/data.php";
    $data = new database;


    $action = $_POST["action"];

    switch($action){
        case "category_add":
            Addcategory($data);
            break;
        case "category_edit":
            Editcategory($data);
            break;
        case "category_delete":
            Deletecategory($data);
            break;
        default:
        break;
    }
};
function Addcategory($data){
    $category_name = $_POST["category_name"];
    $data->command("INSERT INTO tbl_category VALUE(NULL,'$category_name')");
    echo("thành công");
}

function Editcategory($data){
    $category_name = $_POST["category_name"];
    $category_id = $_POST["category_id"];
    $data->command("UPDATE tbl_category SET category_name='$category_name' WHERE category_id='$category_id'");
    echo("thành công");
}

function Deletecategory($data){
    $category_id = $_POST["category_id"];
    $data->command("DELETE FROM tbl_category WHERE category_id = '$category_id'");
    echo("thành công");
}
?>