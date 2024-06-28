<?php
  include("./silder.php")
  
?>
<style>
    a{
        text-decoration: none;
    }
    .sanpham{
        border: 1px solid #c3c1c1;
        border-radius: 10px;
        background-color: #fff;
        height: 70px;
        padding-top: 10px;
        margin-top: 10px;
        box-shadow: 4px 4px 4px rgb(223, 223, 222);

    }
    input{
      border: none;
    }
    .xacnhan{
      border: 1px solid #c3c1c1;
        border-radius: 10px;
        background-color: #fff;
        height: 570px;
        padding-top: 10px;
        margin-top: 10px;
        box-shadow: 4px 4px 4px rgb(223, 223, 222);
        position: fixed;
        right: 30px;
        width: 23%;
    }
    .tinhtien{
      width: 205%;
      height: 100px;
      position: absolute;
      border: 1px solid #c3c1c1;
      border-radius: 10px;
      background-color: #fff;
      box-shadow: 4px 4px 4px rgb(223, 223, 222);
      bottom: 0;
      right: 105%;
    }
    .btxn button{
      position: absolute;
      bottom: 10px;
      height: 70px;
      border: 1px solid #c3c1c1;
      border-radius: 20px;
      background-color: aqua;
      width: 100%;
    }
    .main_right{
      background-color: #F9FAFF;
    }
</style>

<div class=" main_right col-md-9  px-3">
Thanh toán tại quầy
  <div class="container">
    <div class="row">
        <div class="col-8">
          <!-- các sản phẩm của đơn hàng -->
          <div class="sanpham ">
                <div class="container">
                    <div class="row">
                        <div class="col-2">mã</div>
                        
                        <div class="col-5">Tên sản phẩm</div>
                        <div class="col-2">Số lượng</div>
                        <div class="col-3">Tổng tiền</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="xacnhan">
              <h1 class="text-center py-2">Hình thức thanh toán</h1>
              <div style="margin-left: 30px;">
                <div class="form-check ">
                  <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault1">
                  <label class="form-check-label" for="flexRadioDefault1">
                    Chuyển khoản
                  </label>
                </div>
                <div style="display: none;" class="qr p-3">
                  <img style="width:200px" src="../css/img/qr.png" alt="">
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault2" checked>
                  <label class="form-check-label" for="flexRadioDefault2">
                    Tiền mặt
                  </label>
                </div>
              </div>
              <div class="tinhtien">
                <div class="container">
                  <div class="row py-3">
                    <div class="col-6">
                      <i class="fa-solid fa-pen"></i><input placeholder="Ghi chú đơn hàng" type="text" name="" id="">
                    </div>
                    <div class="col-3">
                      <p>Tổng tiền hàng</p>
                      <p style=" font-weight:600">Khách cần trả</p>
                    </div>
                    <div class="col-3">
                      <p style="padding-left: 40px;">10000</p>
                      <p style="padding-left: 40px; font-weight:600">10000</p>

                    </div>
                  </div>
                </div>
              </div>
              <div class="btxn">
                <button>Xác nhận thanh toán</button>
              </div>
            </div>
        </div>

    </div>
  </div>
</div>

<!-- chuyển khoản -->
         <script language="javascript">
          const chon1=document.getElementById('flexRadioDefault1');
          const chon2=document.getElementById('flexRadioDefault2');
            chon1.onclick = function(e){
                if (this.checked){
                    document.querySelector(".qr").style.display="block"
                    chon2.checked=false;
                }
                else{
                    document.querySelector(".qr").style.display="none"
                    chon2.checked=true;
                }
            };
            chon2.onclick=function(){
              if (this.checked){
                    document.querySelector(".qr").style.display="none"
                    chon1.checked=false;
                }
                else{
                    document.querySelector(".qr").style.display="block"
                    chon1.checked=true;
                }
            }
        </script>