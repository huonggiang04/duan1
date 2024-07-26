


<div class="dangnhap">
    <div class="img">
        <img src="upload/WZANG 1.png" alt="">
    </div>
    <div class="boxdangnhap">
        <div class="tiltle"> Quên Mật Khẩu</div>
        <div class="formtaikhoan">
            <form action="index.php?act=quenmk" method="post">
                <div class="nhap">
                <input type="email" name="email" id="" placeholder="Nhập email...">
                </div>
               
              
                <div class="nut">
                <input type="submit"  value="Gửi" name="submit">
                        <input type="reset" value="Nhập lại">
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