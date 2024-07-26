<div class="dangnhap">
    <div class="img">
        <img src="upload/WZANG 1.png" alt="">
    </div>
    <div class="boxdangnhap">
        <div class="tiltle"> ĐĂNG NHẬP</div>
        <div class="formtaikhoan">
            <form action="index.php?act=dangnhap" method="post">
                <div class="nhap">
                    <input type="text" name="user" id="" placeholder="username...">
                </div>
                <div class="nhap">
                    <input type="password" name="pass" id="" placeholder="password...">
                </div>
                <a  class="quenmk" href="index.php?act=quenmk"> Quên mật khẩu?</a>
                <div class="nut">
                    <input type="reset" value="Nhập lại">
                    <input type="submit" value="Đăng nhập" name="dangnhap">
                </div>
                <a href="index.php?act=dangky"> Chưa có tài khoản? Đăng Ký</a>
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