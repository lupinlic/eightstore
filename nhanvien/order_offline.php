<?php
  include("./silder.php")
  
?>
<style>
    a{
        text-decoration: none;
    }
    .new_order a{
        border: 1px solid #000;
        
    }
    .search button{
        background: none;
        border: none;
        font-size: 20px;
        margin-top: -5px;
    }
    .search form{
        display: flex;
    }
    .input-field {
      width: 100%;
      height: 100%;
      background: none;
      border: none;
      outline: none;
      border-bottom: 1px solid #bbb;
      padding: 0;
      font-size: 0.95rem;
      color: #151111;
      transition: 0.4s;
    }
    .search button:hover{
      animation: thu2 1.5s forwards;
    }
    @keyframes thu2{
    to{
        transform: scale(1.5,1.5);
    }
}
</style>

<div class=" main_right col-md-9  px-3">
    
    <div class="container">
        <div class="row">
            <div class="col-md-3">
            <h1 class="py-3">Danh sách đơn hàng tại quầy </h1>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-3 py-3">
              <div class="search">
                <form action="">
                  <input type="text" name="search"
                    placeholder="Nhập mã đơn hàng"
                    class="input-field" required>
                  <button name="" type="submit"><i class="ti-search"></i></button>
                </form>
              </div>
            </div>
            <div class="col-md-2 py-2">
              <select class="form-select" aria-label="Default select example">
                <option selected>1 ngày</option>
                <option value="1">1 ngày</option>
                <option value="2">1 tuần</option>
                <option value="3">1 tháng</option>
                <option value="3">Tất cả</option>
              </select>
            </div>
            <div class="new_order col-md-2 py-3 border-black">
                <a href="./order_offline-add.php" class="p-2" style="background-color: rgb(47, 130, 51); color:#fff;font-weight: 500;">Tạo đơn hàng</a>
            </div>
        </div>
    </div>
    <div class="container">
        <form action="post">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
      <th scope="col">Chi tiết</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>Chi tiết</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
      <td>Chi tiết</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
      <td>Chi tiết</td>
    </tr>
  </tbody>
</table>
        </form>
    </div>
</div>