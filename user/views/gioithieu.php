<?php
include("./header.php")

?>
<style>
    .main_gt{
        background-color: antiquewhite;
        border-radius: 10px;
        margin: 20px 0px;
        width:100%;

    }
    .gt{
        background-color: antiquewhite;
        border-radius: 10px;
        margin-top: 20px;
    }
    @import url('https://fonts.googleapis.com/css2?family=Snowburst+One&display=swap');
body{
    margin:0;
    
}
#container1{
    position: relative;
    width:100%;
   
    /* height:100vh; */
    /* background-image: url(background.jpg);
    background-size: cover;
    background-position: center; */
    overflow: hidden;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
h1{
    color:#fff;
    margin:0;
    font-size: 100px;
    font-family: 'Snowburst One', cursive;
}
.snow{
    position: absolute;
    top:0;
    left:0;
    width:50px;
    height:50px;
    background-image: url(snow.png);
    background-size: cover;
    animation: animationSnow 4s ease-in-out infinite;
}
@keyframes animationSnow{
    0%{
        transform: translate(0,0);
        opacity: 0;
    }
    50%{
        opacity: 1;
    }
    100%{
        opacity: 0;
        transform: translate(100px,50vh);
    }
}
</style>
<section>
    <div id="container1" class="container py-3">
    <div class="snow"></div>
    <div class=" main_gt p-3">
        <div class="row">
            <div class="col-5"><p>Trang chủ> Giới thiệu</p></div>
            <div class="col-7">
                <!-- <img style="height:50px; width:300px" src="../../css/img/noel/GIAY HOA.png" alt=""> -->
            </div>
        </div>
        
    </div>
    <div class=" gt p-3">
        <div class="row">
            <div class="col-6">
            <p style="font-weight: 500; font-size: 20px;">Giới thiệu</p>
        <p style="font-weight: 500;">EIGHT STORE - Mỹ phẩm chính hãng tại Triều Khúc: LAN TỎA ĐIỀU ĐẸP ĐẼ</p>
        <p>Dù chỉ là cửa hàng nhỏ nhắn thuộc Triều Khúc xinh đẹp nhưng Eight Store
             thật sự hạnh phúc khi lúc nào cũng nhận được sự yêu thương và ủng hộ của các bạn.</p>
        <p>Eight Store ra đời với niềm tin rằng, mọi chúng ta không phân biệt giới tính, 
            tuổi tác đều thuộc về những điều đẹp đẽ, tinh tế và lành mạnh nhất !</p>
        <p>Hành trình Eight Store chọn là hành trình mang đến bạn sự tự tin và xinh đẹp – từ trong ra ngoài – theo cách mà chúng ta mong muốn nhất.</p>
        <p style="font-weight: 500; font-style: italic; ">Chúng tớ trải nghiệm và lựa chọn các thương hiệu mỹ phẩm chính hãng, uy tín</p>
        <p>Chúng tớ không chỉ yêu mỹ phẩm, mê làm đẹp mà còn khao khát mang những điều đẹp đẽ đến với bạn – những cô nàng giống tớ và luôn muốn bản thân tự tin, xinh đẹp mỗi ngày!</p>
        <p>Tất cả đều là những brand đình đám, có bảng thành phần tuyệt vời và siêu thân thiện với làn da.</p>
        
            </div>
            <div class="col-6">
                <img style="height:px; width:px" src="../../css/img/noel/pngtree-exquisite-christmas-tree-gift-box-png-image_6211227-removebg-preview.png"  alt="">
            </div>
        </div>
        <div class="row">
            <div class="col-6">
            <img style="height:px; width:px" src="../../css/img/noel/lovepik-christmas-tree-png-image_401650324_wh1200-removebg-preview.png"  alt="">
            </div>
            <div class="col-6">
            <p style="font-weight: 500; font-style: italic; ">Eight Store lựa chọn phân phối chính hãng, mua tận gốc, uy tín tận răng</p>
        <p>Ban đầu, Eight Store chỉ là order thêm một vài sản phẩm cho người quen và bạn bè thân thiết.
         Lâu dần thì Eight Store bắt đầu có khách hàng và nhu cầu cũng tăng rất nhiều. Vẫn theo định hướng ban đầu, 
         Eight Store muốn mua tận gốc và trao tận tay bạn những sản phẩm chất lượng nhất.</p>
        <p>Eight Store dần dà có thêm nhân viên hỗ trợ kinh doanh nhưng vẫn không đáp ứng kịp nhu cầu của khách.
             Cũng từ đây, Eight Store  xinh xẻo chính thức mở cửa tại Triều Khúc thơ mộng.</p>
        <p style="font-weight: 500; font-style: italic; ">Tiêu chuẩn mỹ phẩm tại Eight Store</p>
        <p>Đến với Eight Store , có thể bạn không tìm thấy các thương hiệu hot hit nhưng chúng tớ chắc chắn, mỗi sản phẩm trên kệ 
            Eight Store đều là sản phẩm xịn xò giúp cải thiện da đỉnh cao và được hàng loạt chuyên gia lẫn đông đảo tín đồ khen ngợi hết lời.</p>
        <p style="font-weight: 500; font-style: italic; ">Mang lại trải nghiệm hoàn hảo, không ưu tiên lợi nhuận</p>
        <p>Điều mà Eight Store lúc nào cũng ấp ủ đó chính mọi cô gái đều được trải nghiệm sản phẩm tuyệt vời với mức giá tốt nhất. 
            Cũng vì vậy mà Eight Store  đến giờ vẫn là một cửa hàng bé xinh nép mình trên con đường nhỏ của Triều Khúc.</p>
        <p>Thế nhưng shop lúc nào nhận được sự ủng hộ từ các bạn gần xa. Đặc biệt là các makeup artist luôn luôn tin tưởng lựa chọn bộ sản phẩm chuyên nghiệp từ Eight Store.</p>
            </div>
        </div>
        
        <p style=" font-style: italic; ">Chỉ là đôi lời nhắn gởi đến nàng thơ của Eight Store. Chúng tớ vẫn luôn là Eight Store với khát khao ban đầu và cố gắng hoàn thiện thêm một chút mỗi ngày. Mong các bạn luôn tin yêu và ủng hộ Eight Store  nhé. 
            Đừng quên những review của bạn sẽ giúp chúng tớ trưởng thành hơn trên chặng đường lan tỏa điều đẹp đẽ nha!</p>

    </div>
    </div>
</section>

<script>
    let container = document.getElementById('container1');
let count = 50;
for(var i = 0; i<50; i++){
    let leftSnow = Math.floor(Math.random() * container.clientWidth);
    let topSnow = Math.floor(Math.random() * container.clientHeight);
    let widthSnow = Math.floor(Math.random() * 50);
    let timeSnow = Math.floor((Math.random() * 5) + 5);
    let blurSnow = Math.floor(Math.random() * 1);
    console.log(leftSnow);
    let div = document.createElement('div');
    div.classList.add('snow');
    div.style.left = leftSnow + 'px';
    div.style.top = topSnow + 'px';
    div.style.width = widthSnow + 'px';
    div.style.height = widthSnow + 'px';
    div.style.animationDuration = timeSnow + 's';
    div.style.filter = "blur(" + blurSnow + "px)";
    container.appendChild(div);
}
</script>
<?php
include("./footer.php")

?>