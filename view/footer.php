
<footer>
    <div class="footer">
      <img src="upload/wzang-1@2x.png" alt="" style="width: 250px;">
      <p>Sự khác biệt giữa phong cách và thời trang là chất lượng. Uy tín tạo nên thương hiệu </p>
    </div>
    <div class="footer">
      <h2>TÀI TRỢ</h2>
      <p>LV</p>
      <p>ADIDAS</p>
      <p>MLB</p>
    </div>
    <div class="footer">
      <h2>CHẤT LƯỢNG</h2>
      <p>Uy Tín </p>
      <p>Giá Rẻ</p>
      <p>Thịnh Hành</p>
    </div>
    <div class="footer">
      <h2>LIÊN HỆ</h2>
      <p><a href="https://www.facebook.com/nguyenquang1805/"> <i class="fa-brands fa-facebook"></i> Facebook </a></p>
      <p><a href="https://www.instagram.com/ngyi.wangg/"><i class="fa-brands fa-instagram"></i> Instagram</a></p>
      <p> <a href="https://www.tiktok.com/@nquang_18"> <i class="fa-brands fa-tiktok"></i> Tiktok</a></p>
    </div>

  </footer>




  <!-- JS SLIDE SHOW -->
  <script>
    let slideIndex = 0;
    showSlides();

    function showSlides() {
      let i;
      let slides = document.getElementsByClassName("mySlides");
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      slideIndex++;
      if (slideIndex > slides.length) { slideIndex = 1 }
      slides[slideIndex - 1].style.display = "block";
      setTimeout(showSlides, 2000); // Change image every 2 seconds
    }
  </script>
</body>

</html>