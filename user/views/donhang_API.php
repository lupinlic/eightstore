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
        case "oder_add":
            Addoder($data,$user_id);
            break;
        case "oder_edit":
            Editoder($data,$user_id);
            break;
        case "oder_delete":
            Deleteoder($data);
            break;
        default:
        break;
    }
}elseif(isset($_GET["action"])){
    include "../../config/data.php";
    $data = new database;

    $action = $_GET["action"];
    switch($action){
        case "oder_select":
            Selectoder($data);
            break;
        default:
        break;
    }
}
;
function Addoder($data,$user_id){
    $oder_date = $_POST["oder_date"];
    $oder_status = "chưa thanh toán";
    $oder_totalmoney = $_POST["oder_totalmoney"];
    $oder_classify = "online";
    $oder_name = $_POST["oder_name"];
    $oder_email = $_POST["oder_email"];
    $oder_telephone = $_POST["oder_telephone"];
    $oder_address = $_POST["oder_address"];
    $oder_content = $_POST["oder_content"];

    $data->command("INSERT INTO oder VALUE(NULL,'$oder_date','$oder_status','$oder_totalmoney','$oder_classify',
    '$user_id','$oder_name','$oder_email','$oder_telephone',
    '$oder_address','$oder_content')");
    
    $data->select("SELECT * FROM oder WHERE oder_date='$oder_date'");
    $row = $data->fech();
    $oder_id = $row["oder_id"];
    echo ($oder_id);
}

function Editoder($data,$user_id){
    $oder_id = $_POST["oder_id"];
    $oder_date = $_POST["oder_date"];
    $oder_status = $_POST["oder_status"];
    $oder_totalmoney = $_POST["oder_totalmoney"];
    $oder_classify = $_POST["oder_classify"];
    $oder_name = $_POST["oder_name"];
    $oder_email = $_POST["oder_email"];
    $oder_telephone = $_POST["oder_telephone"];
    $oder_address = $_POST["oder_address"];
    $oder_content = $_POST["oder_content"];

    $data->command("UPDATE oder SET oder_date='$oder_date',oder_status='$oder_status',oder_totalmoney='$oder_totalmoney'
    ,oder_classify='$oder_classify',user_id='$user_id',oder_name='$oder_name',oder_email='$oder_email'
    ,oder_telephone='$oder_telephone',oder_address='$oder_address',oder_content='$oder_content'

    WHERE oder_id='$oder_id'");
    echo("thành công");
}

function Deleteoder($data){
    $oder_id = $_POST["oder_id"];
    $data->command("DELETE FROM oder WHERE oder_id = '$oder_id'");
    echo("thành công");
}

function Selectoder($data) {
    $data->select("SELECT * FROM oder WHERE oder_classify='online' ");

                while($row = $data->fech()){
                    $rows[] = $row;
                }

        header('Content-Type: application/json');
        echo json_encode($rows);

}

?>