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
    
</style>

<div class=" main_right col-md-9  px-3">
    
    <div class="container">
        <div class="row">
            <div class="col-md-3">
            <h1 class="py-3">Danh sách phiếu nhập</h1>
            </div>
            <div class="col-md-7">

            </div>
            <div class="new_order col-md-2 py-3 border-black">
                <a href="./warehouse.php" class="p-2 bg-info">Tạo phiếu nhập</a>
            </div>
        </div>
    </div>
    <div class="container">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Ngày nhập</th>
      <th scope="col">Sản phẩm</th>
      <th scope="col">Nhà cung cấp</th>
      <th scope="col">Số lượng</th>
      <th scope="col">Đơn giá</th>
      <th scope="col">Tổng tiền</th>
      <th scope="col" >Chi tiết</th>
    </tr>
  </thead>
  <tbody id="render_coupon">
    <!-- <tr class="hang">
      <th scope="row">1</th>
      <td contenteditable="true">Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td><a>sửa</a>||<a>xóa</a></td>
    </tr> -->
  </tbody>
</table>
    </div>
</div>

<script>
  var formData = new FormData();

  var render_coupon = document.querySelector("#render_coupon");
function RenderCoupon(){
  fetch("coupon_API.php?action=coupon_select")
    .then(response=>response.json())
    .then((data)=>{
      const htmls =data.map((item,index)=>{
        return `
        <tr class="hang">
          <th scope="row">${index+1}</th>
          <td class="coupon_date-${item.coupon_id}" contenteditable="true">${item.coupon_date}</td>
          <td class="product_id-${item.coupon_id}" contenteditable="true">${item.product_id}</td>
          <td class="supplier_id-${item.coupon_id}" contenteditable="true">${item.supplier_id}</td>
          <td class="product_sum-${item.coupon_id}" contenteditable="true">${item.product_sum}</td>
          <td class="coupon_unitprice-${item.coupon_id}" contenteditable="true">${item.coupon_unitprice}</td>
          <td class="coupon_total-${item.coupon_id}" contenteditable="true">${item.coupon_total}</td>
          <td><a onclick="EditCoupon(${item.coupon_id})" style="cursor: pointer;">sửa</a>||
          <a style="cursor: pointer;" onclick="DeleteCoupon(${item.coupon_id})">xóa</a></td>
        </tr>
        `
      })

      render_coupon.innerHTML = htmls.join("");
    })
  }

  RenderCoupon();

  function DeleteCoupon(coupon_id){
    confirm("bạn có thực sự muốn xóa không");
    if(confirm){
      jQuery.ajax({
        url:"coupon_API.php",
        method:"post",
        data: {
          action:"coupon_delete",
          coupon_id,
        },
        success:function(data){
          alert("thành công");
          RenderCoupon();
        },
        error: function (error) {
        console.error("Error in AJAX request:", error);
        }
      })
    }
  }



  function EditCoupon(coupon_id){
    var coupon_date=document.querySelector(".coupon_date-"+coupon_id);
    var supplier_id=document.querySelector(".supplier_id-"+coupon_id);
    var product_id=document.querySelector(".product_id-"+coupon_id);
    var product_sum=document.querySelector(".product_sum-"+coupon_id);
    var coupon_unitprice=document.querySelector(".coupon_unitprice-"+coupon_id);
    var coupon_total=document.querySelector(".coupon_total-"+coupon_id);

    confirm("bạn có thực sự muốn sửa không");
    if(confirm){
    formData.append("coupon_date",coupon_date.textContent);
    formData.append("supplier_id",supplier_id.textContent);
    formData.append("product_id",product_id.textContent);
    formData.append("product_sum",product_sum.textContent);
    formData.append("coupon_unitprice",coupon_unitprice.textContent);
    formData.append("coupon_total",coupon_total.textContent);
    formData.append("coupon_id",coupon_id);
    formData.append("action","coupon_edit");

    jQuery.ajax({
      url:"coupon_API.php",
      method:"post",
      data: formData,
      contentType:false,
      processData:false,
      success:function(data){
        alert(data);
        RenderCoupon();
      },
      error: function (error) {
      console.error("Error in AJAX request:", error);
      }
    })
    }
    }
</script>