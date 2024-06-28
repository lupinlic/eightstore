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
        case "coupon_add":
            Addcoupon($data,$user_id);
            break;
        case "coupon_edit":
            echo "1";
            Editcoupon($data,$user_id);
            break;
        case "coupon_delete":
            Deletecoupon($data);
            break;
        case "coupon_remaining":
            HandleRemaining($data);
            break;
        default:
        break;
    }
}elseif(isset($_GET["action"])){
    include "../../config/data.php";
    $data = new database;

    $action = $_GET["action"];
    switch($action){
        case "coupon_select":
            Selectcoupon($data);
            break;
        case "coupon_selectDate":
            SelectcouponDate($data);
            break;
        default:
        break;
    }
}
;
function Addcoupon($data,$user_id){
    $coupon_date = $_POST["coupon_date"];
    $supplier_id = $_POST["supplier_id"];
    $product_id = $_POST["product_id"];
    $product_sum = $_POST["product_sum"];
    $coupon_unitprice = $_POST["coupon_unitprice"];
    $coupon_total = $_POST["coupon_total"];

    $data->command("INSERT INTO coupon VALUE(NULL,'$coupon_date','$supplier_id','$product_id','$product_sum',
    '$coupon_unitprice','$coupon_total')");
    
    echo ("thành công");
}

function Editcoupon($data,$user_id){
    $coupon_id = $_POST["coupon_id"];
    $coupon_date = $_POST["coupon_date"];
    $supplier_id = $_POST["supplier_id"];
    $product_id = $_POST["product_id"];
    $product_sum = $_POST["product_sum"];
    $coupon_unitprice = $_POST["coupon_unitprice"];
    $coupon_total = $_POST["coupon_total"];

    $data->command("UPDATE coupon SET coupon_date='$coupon_date',supplier_id='$supplier_id',product_id='$product_id'
    ,product_sum='$product_sum',coupon_unitprice='$coupon_unitprice',coupon_total='$coupon_total' WHERE coupon_id='$coupon_id'");
    echo("thành công");
}

function Deletecoupon($data){
    $coupon_id = $_POST["coupon_id"];
    $data->command("DELETE FROM coupon WHERE coupon_id = '$coupon_id'");
    echo("thành công");
}

function Selectcoupon($data) {
    $data->select("SELECT * FROM coupon ");

                while($row = $data->fech()){
                    $rows[] = $row;
                }

        header('Content-Type: application/json');
        echo json_encode($rows);

}

function SelectcouponDate($data)  {
    $data->select("SELECT* FROM coupon");
    $row = $data->fech();
    $coupon_date = $row["coupon_date"];
    echo json_encode($coupon_date);
}

function HandleRemaining($data) {
    $product_id = $_POST["product_id"];
    $coupon_date = $_POST["coupon_Date"];
    $timeline = $_POST["timeline"];

    $product_number=0;
    $index=0;
    $data->select("SELECT oder.oder_date, `order-detail`.* FROM oder INNER JOIN `order-detail` 
    ON oder.oder_id = `order-detail`.order_id 
    WHERE `order-detail`.product_id = $product_id AND oder.oder_date BETWEEN '$coupon_date' AND '$timeline'");
    while($row = $data->fech()){
        $index++;
        $product_number+=$row["order-detail_num"];
    }
    
    $data->select("SELECT* FROM coupon");
    $row = $data->fech();
    $product_sum = $row["product_sum"];

    echo ($product_sum-$product_number);
}
?>

