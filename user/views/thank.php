<?php
include("./header.php")

?>

<style>
    .thanks{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    .thanks p{
        color: #000;
        margin: 20px;
    }
  .thanks img{
    width: 200px;

  }
  .thanks button{
    border: none;
    height: 40px;
    width: 200px;
    background-color: red;
    color: aliceblue;
    margin: 10px;
  }
  .thanks button:hover{
    cursor: pointer;
  }
</style>

<section>
<div class="thanks">
    <img src="../css/img/camon.png" alt="">
    <p>CẢM ƠN QUÝ KHÁCH ! ĐƠN HÀNG SẼ ĐƯỢC NHÂN VIÊN KIỂM TRA VÀ GIAO HÀNG TRONG THỜI GIAN SỚM NHẤT.</p>
    <a href="./index.php"><button>TIẾP TỤC MUA HÀNG</button></a>
</div>
</section>


<?php
include("./footer.php")

?>