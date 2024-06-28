<?php
  include("./silder.php");
  
?>
<style>
    a{
        text-decoration: none;
    }
</style>

<div class=" main_right col-md-9  px-3">
<h1>Danh sách hàng trong kho</h1>

<div class="container">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Sản phẩm</th>
      <th scope="col">Số lượng</th>
      <th scope="col">Số lượng còn lại</th>
    </tr>
  </thead>
  <tbody id="rendercoupon">
  </tbody>
</table>
    </div>
  
</div>

<script>
  function RenderCoupon(){
    const rendercoupon =document.querySelector("#rendercoupon");
    fetch("coupon_API.php?action=coupon_select")
      .then(Response => Response.json())
      .then(data => {
        const htmls =data.map((item,index)=>{

          var coupon_Date =new Date(item.coupon_date);
          var timeline =new Date();
          var gettimeline = timeline.getFullYear()+"-"+(timeline.getMonth()+1)+"-"+timeline.getDate()+" "+timeline.getHours()+":"+timeline.getMinutes()+":"+timeline.getSeconds();
          var getcoupon_Date = coupon_Date.getFullYear()+"-"+(coupon_Date.getMonth()+1)+"-"+coupon_Date.getDate()+" "+coupon_Date.getHours()+":"+coupon_Date.getMinutes()+":"+coupon_Date.getSeconds();
          HandlecouponDate(getcoupon_Date,gettimeline,item.product_id);

          return `
          <tr class="hang">
            <th scope="row">${index+1}</th>
            <td>${item.product_id}</td>
            <td>${item.product_sum}</td>
            <td class="inventory-${item.product_id}"></td>
          </tr>
          `
        })
        rendercoupon.innerHTML =htmls.join("");
      })
  }
  RenderCoupon();

//   function GetcouponDate(getDay){
// //  lấy ra ngày nhập
//   fetch("coupon_API.php?action=coupon_selectDate")
//       .then(Response => Response.json())
//       .then(data => {
//         var coupon_Date =new Date(data);
//         var timeline =coupon_Date;
//         timeline.setDate(timeline.getDate()+getDay);
        
//       })
//   }
//   console.log(GetcouponDate(360));
function HandlecouponDate(coupon_Date,timeline,product_id){
  jQuery.ajax({
    url:"coupon_API.php",
    method:"post",
    data:{
      action:"coupon_remaining",
      coupon_Date,
      timeline,
      product_id,
    },
    success:function(data){
      coupon_remaining = data;
      console.log(data);
      Setinventory(data,product_id);
    }
  })
}

function Setinventory(data,product_id){
  const inventory =document.querySelector(".inventory-"+product_id);
  console.log(data)
  inventory.textContent = data;
}
</script>



<!-- 1 ngày -->

<!-- 
  1. xác định điểm bắt đầu và kết thúc
  bắt đầu sẽ là từ ngày nhập và sẽ lấy ra ngày hiện tại là kết thúc
  bắt đầu từ ngày nhập kết thúc cộng 7 ngày -> cộng 30 ngày ->360 ngày

  vd ta có 2 điểm này rồi 
 -->