<?php 
session_start();
if(isset($_SESSION["user_id"])){
    $user_id = $_SESSION["user_id"];
}

if(isset($_POST["action"])){
    include "../../config/data.php";
    $data = new database;

    $action = $_POST["action"];

    switch($action){
        case "oder-detail_add":
            echo "đã vào";
            Addoderdetail($data,$user_id);
            break;
        case "oder-detail_edit":
            Editoderdetail($data,$user_id);
            break;
        case "oder-detail_delete":
            Deleteoderdetail($data);
            break;
        default:
        break;
    }
}elseif(isset($_GET["action"])){
    include "../../config/data.php";
    $data = new database;

    $action = $_GET["action"];
    switch($action){
        case "oder-detail_select":
            Selectoderdetail($data,$user_id);
            break;
        default:
        break;
    }
}
;
function Addoderdetail($data,$user_id){
    $carts = $_SESSION["cart_save"]->cart;
    $order_id  = $_POST["oder_id"];

    for($i=0;$i<count($carts);$i++){
        $product_id  = $carts["$i"]->product_id;
        $orderdetail_num  = $carts["$i"]->cart_number;
        $orderdetail_total  = $carts["$i"]->cart_totalmoney;

        $data->command("INSERT INTO `order-detail` VALUES(NULL,'$product_id','$order_id','$orderdetail_num',
        '$orderdetail_total','$user_id')");
    }
    
    echo("đơn hàng chi tiết thành công");
}

function Editoderdetail($data,$user_id){
    $oderdetail_id= $_POST[["oder-detail_id"]];
    $product_id  = $_POST["product_id "];
    $order_id  = $_POST["order_id "];
    $orderdetail_num = $_POST["order-detail_num"];
    $orderdetail_total = $_POST["order-detail_total"];

    $data->command("UPDATE order-detail SET product_id='$product_id',order_id='$order_id',
    order-detail_num='$orderdetail_num',order-detail_total='$orderdetail_total',user_id='$user_id'

    WHERE oder-detail_id='$oderdetail_id'");
    echo("thành công");
}

function Deleteoderdetail($data){
    $oderdetail_id = $_POST["oder-detail_id"];
    $data->command("DELETE FROM oder-detail WHERE oder-detail_id = '$oderdetail_id'");
    echo("thành công");
}

function Selectoderdetail($data,$user_id) {
    $data->select("SELECT oder-detail.*,tbl_product.* FROM oder-detail INNER JOIN tbl_product 
                ON oder-detail.product_id=tbl_product.product_id WHERE user_id=$user_id");
                while($row = $data->fech()){
                    $rows[] = $row;
                }
        header('Content-Type: application/json');
        echo json_encode($rows);

}

?>