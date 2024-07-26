<div class="dangnhap">
    <div class="img">
        <img src="upload/WZANG 1.png" alt="">
    </div>
    <div class="boxdangnhap">
        <div class="tiltle"> ĐĂNG KÝ</div>
        <div class="formtaikhoan">
            <form action="index.php?act=dangky" method="post">
            <div class="nhap">
            <input type="email" name="email" id="" placeholder="email...">
                </div>
                <div class="nhap">
                    <input type="text" name="user" id="" placeholder="username...">
                </div>
                <div class="nhap">
                    <input type="password" name="pass" id="" placeholder="password...">
                </div>
                <?php 
                if(isset($loipass) && ($loipass!="")){
                   ?> <h3 style="font-size: 1vw; color: red;"> <?=$loipass?></h3><?php
                }
                ?>
                <input type="checkbox" name="nho" id=""> Ghi nhớ mật khẩu?
                <div class="nut">
                    <input type="reset" value="Nhập lại">
                    <input type="submit" value="Đăng Ký" name="dangky">
                </div>
                <a href="index.php?act=dangnhap"> Đã có tài khoản? Đăng Nhập</a>
                <div class="thongbao">
                <?php 
                if(isset($thongbao) && ($thongbao!=" ")){
                    echo $thongbao;
                }
                ?>
                </div>
            </form>
            
        </div>
    </div>
</div>