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
            <h1 class="py-3">Danh sách đơn hàng online</h1>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-3 py-3">
              <!-- <div class="search">
                <form action="">
                  <input type="text" name="search"
                    placeholder="Nhập mã đơn hàng"
                    class="input-field" required>
                  <button name="" type="submit"><i class="ti-search"></i></button>
                </form>
              </div> -->
            </div>
            <div class="col-md-2 py-2">
              <!-- <select class="form-select" aria-label="Default select example">
                <option selected>1 ngày</option>
                <option value="1">1 ngày</option>
                <option value="2">1 tuần</option>
                <option value="3">1 tháng</option>
                <option value="3">Tất cả</option>
              </select> -->
            </div>
            <div class="new_order col-md-2 py-3 border-black">
                <a href="./order_online-add.php" class="p-2 bg-info">Tạo đơn hàng</a>
            </div>
        </div>
    </div>
    <div class="container">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Ngày tạo</th>
      <th scope="col">Trạng thái</th>
      <th scope="col">Tổng tiền</th>
      <!-- <th scope="col">Tài khoản</th> -->
      <th scope="col">Người nhận</th>
      <!-- <th scope="col">Email</th> -->
      <th scope="col">SĐT</th>
      <th scope="col">Địa chỉ</th>
      <th scope="col">Chi tiết</th>
      <th scope="col" ></th>
      
    </tr>
  </thead>
  <tbody id="Render_order">
  </tbody>
</table>
    </div>
</div>

<script>
  var formdata = new FormData();

  var Render_orderview =document.querySelector("#Render_order");
  var isEdit =false;

  function Render_order(){
    fetch('order_API.php?action=oder_select ')
      .then(response => response.json())
      .then((data) => {
        htmls =data.map((item,index) =>{
          return `
          <tr>
            <th scope="row" >${index+1}</th>
            <td class="oder_date-${item.oder_id}" contenteditable="true">${item.oder_date}</td>
            <td class="oder_status-${item.oder_id}" contenteditable="true">${item.oder_status}</td>
            <td class="oder_totalmoney-${item.oder_id}" contenteditable="true">${item.oder_totalmoney}</td>
           
            <td class="oder_name-${item.oder_id}" contenteditable="true">${item.oder_name}</td>
            
            <td class="oder_telephone-${item.oder_id}" contenteditable="true">${item.oder_telephone}</td>
            <td class="oder_address-${item.oder_id}" contenteditable="true">${item.oder_address}</td>
            <td><a href='./order_online_details.php?order_id=${item.oder_id}'><i class='fa-solid fa-eye'></i></a></td>
            <td><span style="cursor: pointer;" onclick="Editorder(${item.oder_id})" class="contenedit">Lưu</span> || 
            <span style="cursor: pointer;" onclick = "DeleteOrder(${item.oder_id})">xóa</span></td>
          </tr>
          `
        })
        const html = htmls.join("");
        Render_orderview.innerHTML = html;
      })
      .catch(()=>{
        console.log("có lỗi");
      })
  }
  // <td class="oder_email-${item.oder_id}" contenteditable="true">${item.oder_email}</td>
  var order = {
    start: function(){
      Render_order();
  }
  }

  order.start();

  function Editorder(oder_id){
    confirm("bạn có thực sự muốn sửa không");
    if(confirm){
      const oder_date =document.querySelector(".oder_date-"+oder_id).textContent;
      formdata.append("oder_date",oder_date);

      const oder_status =document.querySelector(".oder_status-"+oder_id).textContent;
      formdata.append("oder_status",oder_status);

      const oder_totalmoney =document.querySelector(".oder_totalmoney-"+oder_id).textContent;
      formdata.append("oder_totalmoney",oder_totalmoney);

      const oder_name =document.querySelector(".oder_name-"+oder_id).textContent;
      formdata.append("oder_name",oder_name);

      // const oder_email =document.querySelector(".oder_email-"+oder_id).textContent;
      // formdata.append("oder_email",oder_email);

      const oder_telephone =document.querySelector(".oder_telephone-"+oder_id).textContent;
      formdata.append("oder_telephone",oder_telephone);

      const oder_address =document.querySelector(".oder_address-"+oder_id).textContent;
      formdata.append("oder_address",oder_address);

      // const oder_content =document.querySelector(".oder_content-"+oder_id).textContent;
      // formdata.append("oder_content",oder_content);
      formdata.append("action","oder_edit");
      formdata.append("oder_id",oder_id);


      jQuery.ajax({
        url:"order_API.php",
        method:"post",
        data: formdata,
        contentType:false,
        processData:false,
        success:function(data){
          alert("thành công");
          Render_order();
        },
        error: function (error) {
        console.error("Error in AJAX request:", error);
        }
      })
    }
  }

  function DeleteOrder(oder_id){
    confirm("bạn có thực sự muốn xóa không");
    if(confirm){
      jQuery.ajax({
        url:"order_API.php",
        method:"post",
        data: {
          action:"oder_delete",
          oder_id,
        },
        success:function(data){
          alert("thành công");
          Render_order();
        },
        error: function (error) {
        console.error("Error in AJAX request:", error);
        }
      })
    }
  }
</script>