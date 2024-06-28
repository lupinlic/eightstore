<?php
//chức năng là tạo ra 1 cái class data   
//co cac thuoc tinh la 
//connect
//host
//use
//pass
//csdl
//resoult
class database {
    private $conn = null;
    private $host = 'localhost';
    private $use = 'root';
    private $pass = '';
    private $csdl = 'eight_store';
    private $resoult = null;

    // chung nang connect data
    private function connect(){
        $this->conn = new mysqli($this->host,$this->use,$this->pass,$this->csdl) or die("kết nối đến csdl thất bại");
        $this->conn->query('SET NAMES UTF8');
    }

    //select dữ liệu lên màn hình
    //1 tao cau truy van 2 tra ve re 
    public function select($sql){
        $this->connect();
        $this->resoult = $this->conn->query($sql);
    }
    
    //2 thuc hien in ra man hinh 1 dong dl
    public function fech(){
        if($this->resoult->num_rows >0){
            $row = $this->resoult->fetch_assoc();
        }else{
            $row = 0;
        }
        return $row;
    }


    //thực hiện các hàm delete update hoặc insert
    public function command($sql) {
        $this->connect();
        $this->conn->query($sql);
    }

    public function ChekNull($a){
        if(!empty($a)){
            return true;
        }else{
            return false;
        }
    }

    public function ChekNumber($a) {
        if(is_numeric($a)){
            return true;
        }else{
            return false;
        }
    }

    public function Deletecart($idgh){
        $this->command("DELETE FROM giohang WHERE idGioHang= '$idgh' ");
    }

}
// tạo ra các chức năng như sau
//          1
// thực hiện hành động kết nối sql

            // 2 hiển thị 1 dòng dữ liệu ra mh
// 2 thực hiện hành động lấy dữ liệu từ sql bằng các ts như lấy truy vấn r gán lại cho resould
// 3 thực hiện hành động in dữ liệu bằng cách in dl 1 dòng ra fech

            // 3 truy vấn đến csdl delete insert update

   
?>