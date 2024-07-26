






<div class="dangnhap">
    <div class="img">
        <img src="upload/WZANG 1.png" alt="">
    </div>
    <div class="boxdangnhap">
        <div class="tiltle">Đổi Mật Khẩu</div>
        <div class="formtaikhoan">
            <form action="index.php?act=thaydoimk" method="post">
                <div class="nhap">
                <input type="password" name="NewPass" id="" placeholder=" Mật khẩu mới" required>
                </div>
                <div class="nhap">
                <input type="password" name="again-Pass" id="" placeholder=" Nhập lại Pass" required>
                </div>
              
                <div class="nut">
                <input type="submit"  value="Thay Đổi" name="submit">
                <a href="index.php?act=dangnhap">Đăng Nhập</a>
                </div>
                <div class="thongbao">
                <?php 
                if(isset($thongbao) && ($thongbao!="")){
                    echo $thongbao;
                }
                ?>
                </div>
            </form>
        </div>
    </div>
</div>