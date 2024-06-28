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
        case "cart_add":
            Addcart($data,$user_id);
            break;
        case "cart_edit":
            Editcart($data);
            break;
        case "cart_delete":
            Deletecart($data);
            break;
        case "cart_deletes":
            Deletecarts($data);
            break;
        case "cart_save":
            Savecart($data);
            break;
        case "admin->product_add":
            Adminaddcart($data,$user_id);
            break;
        default:
        break;
    }
}elseif(isset($_GET["action"])){
    include "../../config/data.php";
    $data = new database;

    $action = $_GET["action"];
    switch($action){
        case "cart_select":
            Selectcart($data,$user_id);
            break;
        case "admin->product_select":
            Selectproduct($data,$user_id);
            break;
        default:
        break;
    }
}
;
function Addcart($data,$user_id){
    echo ($user_id);
    $product_id = $_POST["product_id"];
    $cart_quantity = $_POST["cart_quantity"];

    $data->select("SELECT * FROM tbl_product WHERE product_id='$product_id' ");
    $row = $data->fech();
    $product_price = $row["product_price"];

    $data->select("SELECT * FROM cart WHERE product_id='$product_id' ");
    $row = $data->fech();
    if($row>0){
        $newcar_quantity = $row["cart_quantity"]+$cart_quantity;
        $cart_totalmoney = intval($newcar_quantity) * intval($product_price);

        $data->command("UPDATE cart SET cart_quantity='$newcar_quantity',cart_totalmoney='$cart_totalmoney'
        WHERE product_id='$product_id'");
    }else{
        $data->select("SELECT * FROM tbl_product WHERE product_id='$product_id' ");
        $row = $data->fech();
        $product_price = $row["product_price"];
    
        $cart_totalmoney = intval($cart_quantity) * intval($product_price);
    
        $data->command("INSERT INTO cart VALUE(NULL,'$user_id','$product_id','$cart_quantity','$cart_totalmoney')");
        echo("thành công");
    }
}

function Editcart($data){
    $cart_quantity = $_POST["cart_quantity"];
    $cart_id = $_POST["cart_id"];
    $product_id = $_POST["product_id"];

    $data->select("SELECT * FROM tbl_product WHERE product_id='$product_id' ");
    $row = $data->fech();
    $product_price = $row["product_price"];
    $cart_totalmoney = intval($cart_quantity) * intval($product_price);

    $data->command("UPDATE cart SET cart_quantity='$cart_quantity',cart_totalmoney='$cart_totalmoney' WHERE cart_id='$cart_id'");
    echo("thành công");
}

function Deletecarts($data){
    if(isset($_SESSION["cart_save"])){
        $carts = $_SESSION["cart_save"]->cart;

        for($i=0;$i<count($carts);$i++){
            $cart_id  = $carts["$i"]->cart_id;
    
            $data->command("DELETE FROM cart WHERE cart_id = '$cart_id'");
        }
        unset($_SESSION["cart_save"]);
    }else{
        echo("ko thành công");
    }
    
}

function Deletecart($data){
    $cart_id= $_POST["cart_id"];
    $data->command("DELETE FROM cart WHERE cart_id = '$cart_id'");
    echo("thành công");
}

function Selectcart($data,$user_id) {
    $data->select("SELECT cart.*,tbl_product.* FROM cart INNER JOIN tbl_product 
                ON cart.product_id=tbl_product.product_id WHERE user_id=$user_id");
                while($row = $data->fech()){
                    $rows[] = $row;
                }
        header('Content-Type: application/json');
        echo json_encode($rows);

}

function Savecart(){
    if(isset($_POST["Savecart"])){
        $cart_save = json_decode($_POST["Savecart"]);
    }else{
        echo "thất bại";

    }
    $_SESSION["cart_save"] = $cart_save;
    echo json_encode($cart_save);
}

function Selectproduct($data,$user_id) {
    
    $data->select("SELECT cart.*,tbl_product.* FROM cart INNER JOIN tbl_product 
    ON cart.product_id=tbl_product.product_id WHERE user_id=$user_id");
    while($row = $data->fech()){
        $rows[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($rows);
}

function Adminaddcart($data,$user_id){
    echo ($user_id);
    $product_id = $_POST["product_id"];
    $cart_quantity = $_POST["cart_quantity"];

    $data->select("SELECT * FROM tbl_product WHERE product_id='$product_id' ");
    $row = $data->fech();
    $product_price = $row["product_price"];

    $data->select("SELECT * FROM cart WHERE product_id='$product_id' ");
    $row = $data->fech();
    if($row>0){
        $newcar_quantity = $row["cart_quantity"]+$cart_quantity;
        $cart_totalmoney = intval($newcar_quantity) * intval($product_price);

        $data->command("UPDATE cart SET cart_quantity='$newcar_quantity',cart_totalmoney='$cart_totalmoney'
        WHERE product_id='$product_id'");
    }else{
        $data->select("SELECT * FROM tbl_product WHERE product_id='$product_id' ");
        $row = $data->fech();
        $product_price = $row["product_price"];
    
        $cart_totalmoney = intval($cart_quantity) * intval($product_price);
    
        $data->command("INSERT INTO cart VALUE(NULL,'$user_id','$product_id','$cart_quantity','$cart_totalmoney')");
        echo("thành công");
    }
}
?>