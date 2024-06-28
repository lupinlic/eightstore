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
    .thongtin , .order_pro{
        border: 1px solid #000;
        border-radius: 20px;
    }
    .thongtin{
        padding-bottom: 50px;
    }
    .order_pro{
        height: 500px;
    }
</style>

<div class=" main_right col-md-9  px-3">
    <h1>Tạo đơn hàng</h1>
    <div class="container">
        <div class="row">
            <div class="thongtin m-2 col-7">
                <form action="./thanhtoan.php" method="post">
                    <h1 class="text-center m-2 py-2">Đơn hàng</h1>
                    <p class="text-center py-1">Mã đơn hàng #1111</p>
                    <p class="text-center py-1">Ngày tạo: 1/1/2024</p>
                    <table class="table py-3 table-bordered">
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
                                <td >Larry the Bird</td>
                                <td>@twitter</td>
                                <td>@fat</td>
                                <td>Chi tiết</td>
                                </tr>
                            </tbody>
                    </table>
                <div class="container">
                    <div class="row">
                        <div class="col-9"></div>
                        <div class="col-3">Tổng tiền:</div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-9"><a href="./thanhtoanoffline.php"><button  type="button"  class="btn btn-primary m-3">Tạo đơn hàng</button></a></div>
                        <div class="col-3">
                        <button  type="button"  class="btn btn-primary m-3">Xóa tất cả</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
            <div class="order_pro m-2 col-4">
                <h1 class="m-2 py-3">Tên sản phẩm</h1>
                <p class="m-2 py-2">Sản phẩm</p>
                <select  class="form-select m-2 py-2" aria-label="Default select example">
                <option selected>1 ngày</option>
                <option value="1">1 ngày</option>
                <option value="2">1 tuần</option>
                <option value="3">1 tháng</option>
                <option value="3">Tất cả</option>
              </select>
              <p class="m-2 ">còn lại 5 sản phẩm</p>
              <p class="m-2 py-2">Số lượng</p>
              <input class="m-2 py-2" type="number" name="" id=""> 
              <div>
              <button  type="button" class="btn btn-primary m-3">Thêm</button>
              </div>
            </div>
        </div>
    </div>
</div>