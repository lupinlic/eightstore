<?php 

if(isset($_POST["action"])){
    include "../../config/data.php";
    $data = new database;


    $action = $_POST["action"];

    switch($action){
        case "product_add":
            Updlloadfile($data);
            Addproduct($data);
            break;
        case "product_edit":
            echo"đã vào edit";
            Editproduct($data);
            break;
        case "product_delete":
            Deleteproduct($data);
            break;
        case "product_find":
            getfindProduct($data);
            break;
        default:
        break;
    }
};

function Updlloadfile($data){

    if(isset($_FILES["file"])){
        $file = $_FILES["file"];

        $filetmpname = $file["tmp_name"];
        $filename = $file["name"];
        $path = '../../css/img/upload/'.$filename;
    
        move_uploaded_file($filetmpname,$path);
        echo($filename);
    }else{
        echo "ko tồn tại file";
    }
}
function Addproduct($data){
    $product_name = $_POST["product_name"];

    $product_img = '../../css/img/upload/'.$_FILES["file"]["name"];
    $product_price = $_POST["product_price"];
    $product_mota = $_POST["product_mota"];
    $category_id = $_POST["category_id"];
    $data->command("INSERT INTO tbl_product VALUES(NULL,'$product_name','$product_img','$product_price','$product_mota','$category_id')");
    echo("thành công");
}

function Editproduct($data){
    $ischekfile=false;

    $product_name = $_POST["product_name"];
    $product_price = $_POST["product_price"];
    $product_mota = $_POST["product_mota"];
    $category_id = $_POST["category_id"];
    $product_id = $_POST["product_id"];
    $product_img = $_POST["product_img"];

    $file = $_FILES["file"];


    if($file){
        $ischekfile = !$ischekfile;
        unlink($product_img);

        $filetmpname = $file["tmp_name"];
        $filename = $file["name"];
        $path = '../../css/img/upload/'.$filename;
        $product_pathfile = '../../css/img/upload/'.$_FILES["file"]["name"];
    
        move_uploaded_file($filetmpname,$path);
        $data->command("UPDATE tbl_product SET product_name='$product_name',
        product_img='$product_pathfile',product_price='$product_price',
        product_mota='$product_mota',category_id='$category_id' WHERE product_id='$product_id'");
        echo "file";   
    }
    else{
        $data->command("UPDATE tbl_product SET product_name='$product_name',
        product_img='$product_img',product_price='$product_price',
        product_mota='$product_mota',category_id='$category_id' WHERE product_id='$product_id'");
        echo "img cu";
    }
    
}

function Deleteproduct($data){
    $product_id = $_POST["product_id"];
    $data->command("DELETE FROM tbl_product WHERE product_id = '$product_id'");
    echo("thành công");
}

function getfindProduct($data) {
    $name = $_POST["name"];
    $data->select("SELECT * FROM tbl_product WHERE product_name LIKE('%$name%')");
    while($row = $data->fech()){
        
        $rows[] = $row;
    }
    echo json_encode($rows);
}

?>