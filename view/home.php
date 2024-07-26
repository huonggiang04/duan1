 <!-- banner slide -->
 <div class="banner mb">
    <!-- Slideshow container -->
    <div class="slideshow-container">
      <!-- Full-width upload with number and caption text -->
      <div class="mySlides fade">
        <img src="upload/ban1.jpg" style="width:100%; height:300px;">
      </div>

      <div class="mySlides fade">
        <img src="upload/ban2.jpg" style="width:100%; height: 300px; ">
      </div>

      <div class="mySlides fade">
        <img src="upload/ban3.jpg" style="width:100%;height: 300px;">
      </div>


    </div>
    <br>

    <!-- The dots/circles -->
    <div style="text-align:center">
      <span class="dot" onclick="currentSlide(1)"></span>
      <span class="dot" onclick="currentSlide(2)"></span>
      <span class="dot" onclick="currentSlide(3)"></span>
    </div>
  </div>

  <div class="why">
    <div class="why1">
      <p style="font-size: 1.8vw; color: #F6973F;"> <b>TẠI SAO NÊN CHỌN WZANG?</b></p>
    </div>
    <div class="why1">
      <p><b>Sản phẩm chất lượng</b> <br> WZANG xin cam kết sản phẩm được nhập khẩu nơi uy tín, chất lượng</p>
    </div>
    <div class="why1">
      <p><b>Sản phẩm theo trend</b> <br> Mọi sản phẩm đều bắt kịp trend của giới trẻ hiện nay </p>
    </div>
    <div class="why1">
      <p><b>Miễn phí giao hàng</b> <br> Giao hàng trong vòng 1 ngày đối với nội thành và 2 - 4 ngày đối với ngoại thành</p>
    </div>
  </div>
  <div class="banchay">
    <p> SẢN PHẨM BÁN CHẠY</p>
    <div class="sp">
      <ul>
      <?php 
            foreach ($dsdm as $dm) {
extract($dm);
                $linkdm = "index.php?act=sanpham&iddm=".$id;
                echo '<li><a href="'.$linkdm.'">'.$name.'</a></li>';
            }
            ?> 
        <!-- <li> <a href=""> Giày</a></li>
        <li> <a href="#">Áo</a></li>
        <li> <a href="#"> Quần</a></li>
        <li> <a href="#"> Dép</a></li> -->
      </ul>
    </div>
    <div class="boxallsp">
    <?php
        foreach ($dstopbanchay as $sp) {
          extract($sp);
          $linksp="index.php?act=sanphamct&id=".$id;
          $hinh = $img_path.$img;
          echo '<div class="boxsp ">
          <div class="img"> <a href="'.$linksp.'"> <img src="'.$hinh.'" alt=""></a></div>
          <a href="'.$linksp.'" class="namesp">'.$name.'</a>
          <div class="star">
              &emsp; &nbsp; <i class="fa-solid fa-star" style="color: #ffc800;"></i> <i
                  class="fa-solid fa-star" style="color: #ffc800;"></i> <i class="fa-solid fa-star"
                  style="color: #ffc800;"></i> <i class="fa-solid fa-star" style="color: #ffc800;"></i><i
                  class="fa-solid fa-star" style="color: #ffc800;"></i>
          </div>
          <div class="hi">
                    <div class="price" style="margin-left: 10px;">
                        <p style="margin-left: 20px;">'.$price.'VNĐ</p>
                    </div>
                    <div class="btnaddtocart">
                    <form action="index.php?act=addtocart" method="post">
                        <input type="hidden" name="id" value="'.$id.'">
                        <input type="hidden" name="name" value="'.$name.'">
                        <input type="hidden" name="img" value="'.$img.'">
                        <input type="hidden" name="price" value="'.$price.'">
                        <input type="submit" name="addtocart" value="&#10010;">
                    </form>
                    </div>
                    </div>
      </div>';
        }
        ?> 
   </div>
  </div>
  </div>



