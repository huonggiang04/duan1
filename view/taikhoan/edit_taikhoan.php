<div class="dangnhap">
    <div class="img">
        <img src="upload/WZANG 1.png" alt="">
    </div>
    <div class="boxdangnhap" style="width:440px;">
        <div class="tiltle"> CẬP NHẬT TÀI KHOẢN</div>
        <div class="formtaikhoan">
        <?php 
                if(isset($_SESSION['user'])&&(is_array($_SESSION['user']))){
                    extract($_SESSION['user']);

                }
                ?>
            <form action="index.php?act=edit_taikhoan" method="post">
                <div class="nhap">
                <input type="email" name="email" id="" placeholder="email..." value="<?=$email?>">
                </div>
                <div class="nhap">
                <input type="text" name="user" id="" placeholder="username..." value="<?=$user?>">
                </div>
                <div class="nhap">
                <input type="password" name="pass" id=""  placeholder="password..." value="<?=$pass?>">
                </div>
                <div class="nhap">
                <input type="text" name="address" id=""  placeholder="address..." value="<?=$address?>">
                </div>
                <div class="nhap">
                <input type="text" name="tel" id=""  placeholder="phone number..." value="<?=$tel?>">
                </div>
                <div class="nut">
                        <input type="hidden" name="id" value="<?=$id?>">
                        <input type="submit" value="Cập Nhật" name="capnhat">
                        <input type="reset" value="Nhập lại">
                </div>
                <div class="thongbao" style="color: green; margin-left:30px;">
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