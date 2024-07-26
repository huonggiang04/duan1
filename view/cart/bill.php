<div class="bill">
    <form action="index.php?act=billcomfirm" method="post">
        <div class="bill1">
            <div class="boxtitle">Thông Tin Đặt Hàng</div>
            <div class="boxcontent">
                <table>
                    <?php 
                        if(isset($_SESSION['user'])){
                            $name=$_SESSION['user']['user'];
                            $address=$_SESSION['user']['address'];
                            $email=$_SESSION['user']['email'];
                            $tel=$_SESSION['user']['tel'];
                        }else{
                            $name="";
                            $address="";
                            $email="";
                            $tel="";
                        }
                    ?>
                    <tr>
                        <td>Người Đặt Hàng:</td>
                        <td><input type="text" name="name" value="<?=$name?>"></td>
                    </tr>
                    <tr>
                        <td>Địa Chỉ:</td>
                        <td><input type="text" name="address" value="<?=$address?>"></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><input type="text" name="email" value="<?=$email?>"></td>
                    </tr>
                    <tr>
                        <td>Điện Thoại:</td>
                        <td><input type="text" name="tel" value="<?=$tel?>"></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="bill1">
            <div class="boxtitle">Phương Thức Thanh Toán</div>
            <div class="boxcontent" style="min-height:50px; margin-top: 10px;">
                <table>
                    <tr>
                        <td><input type="radio" name="pttt" checked style="margin-left:70px" >Trả Tiền Khi Nhận Hàng</td>
                        <td><input type="radio" name="pttt" style="margin-left:100px" >Chuyển Khoản Ngân Hàng</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="bill1">
            <div class="boxtitle">Thông Tin Giỏ Hàng</div>
            <div class="row boxcontent cart">
                <table>
                    <?php viewcart(0);?>
                </table>
            </div>
        </div>
        <div class="bill1">
            <input type="submit" value="Đồng Ý Đặt Hàng" name="dongydathang">
        </div>
                    </form>
</div>         
