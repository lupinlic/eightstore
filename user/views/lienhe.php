<?php
include("./header.php")

?>

<section class="py-3">

    <div class="container">
    <p style="font-weight: 600; font-size:28px;">Phản hồi</p>
        <div class="row">
            <div class="col-6">
                <div class="phanhoi">
                    <form action="" method="post">
                    <div class="name">
                        <input name="firstname" required type="text" placeholder="Nhập tên">
                        <input name="lastname" required type="text" placeholder="Nhập họ">
                    </div>
                    <input name="email" required type="email" placeholder="Nhập email">
                    <input name="phone" required type="text" placeholder="Nhập số điện thoại">
                    <input name="subject_name" type="text" placeholder="Nhập chủ đề">
                    <label  for="">Nội dung <span style="color: red;">*</span></label>
                    <textarea required name="note" id="" cols="30" rows="10"></textarea>
                    <button type="submit" name="submit">PHẢN HỒI</button>
                    </form>
                </div>
            </div>
            <div class="col-6">
            <div id="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.3145689762046!2d105.80335757499925!3d20.980023889451157!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ace9d38693e7%3A0xf86cd3380fc6615!2zNi83LzIwIMSQLiBUw6JuIFRyaeG7gXUsIFRow7RuIFRyaeG7gXUgS2jDumMsIFRoYW5oIFRyw6wsIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1696599514402!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            </div>
        </div>
    </div>
</section>


<?php
include("./footer.php")

?>


<style>
    .name{
        display: flex;
        align-items: center;
        justify-content: center;
    }
   .phanhoi form{
        display: flex;
        flex-direction: column;
    }
    .lienhe{
        display: flex;
        align-items: center;
        justify-content: center;
    }
    /* .map img{
        width: 700px;
    } */
   .phanhoi input{
        border: 1px solid #c4c2c2;
        border-radius: 3px;
        height: 35px;
        margin: 20px;
    }
   .phanhoi textarea{
    
        margin: 20px;
    }
   .phanhoi label{
        font-size: 20px;
    }
   .phanhoi button{
        height: 35px;
        width: 100px;
        background-color: red;
        color: aliceblue;
        border: none;
    }
  .phanhoi  button:hover{
        cursor: pointer;
    }
    
</style>