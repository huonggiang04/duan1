<style>  .trove a:hover{
    font-weight: bolder;
}</style>
<div class="bill">
    <div class="bill1">
        <div class="boxtitle">CẢM ƠN</div>
        <div class="boxcontent" style="text-align: center;min-height: 100px;">
            <h2>ĐẶT HÀNG THÀNH CÔNG <br>CẢM ƠN BẠN ĐÃ ĐẶT HÀNG Ở WZANG SHOP! RẤT VUI KHI ĐƯỢC PHỤC VỤ BẠN  !!! </h2>
        </div>
    </div>
    <?php
        if(isset($bill)&&(is_array($bill))){
            extract($bill);
        }   
    ?>
    <div class="bill1">
        <div class="boxtitle" >MÃ ĐƠN HÀNG</div>
        <div class="boxcontent" style="padding-left: 30px;min-height: 100px">
            <li style="margin-bottom:15px; margin-top: 10px">Mã đơn hàng: WZANG-<?=$bill['id'];?></li>
            <li style="margin-bottom:15px;">Ngày đặt hàng: <?=$bill['ngaydathang'];?></li>
            <li style="margin-bottom:15px;">Tổng đơn hàng: <?=$bill['total'];?> VNĐ</li></li>
            <li style="margin-bottom:15px;">Phương thức thanh toán: <?php 
            if($bill['bill_pttt'] == 0) echo "Thanh toán khi nhận hàng" ; else echo "Thanh toán chuyển khoản ngân hàng"
            ?></li>
        </div>
    </div>
    <div class="bill1">
        <div class="boxtitle" >THÔNG TIN ĐẶT HÀNG</div>
        <div class="boxcontent" style="min-height: 100px">
            <table>
                <tr>
                    <td>Người đặt hàng:</td>
                    <td><?=$bill['bill_name'];?></td>
                </tr>
                <tr>
                    <td>Địa chỉ:</td>
                    <td><?=$bill['bill_address'];?></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><?=$bill['bill_email'];?></td>
                </tr>
                <tr>
                    <td>Điện thoại:</td>
                    <td><?=$bill['bill_tel'];?></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="bill1">
        <div class="boxtitle">CHI TIẾT GIỎ HÀNG</div>
        <div class="boxcontent3">
            <table>
            <?php viewcart(0);?>
            </table>
            <div class="trove">
                <a href="index.php" style="text-decoration: none; color: #8A603A; font-size: 2vw;"> &#10094;	Trở về trang chủ </a>
            </div>
            <?php if(isset($_GET['idcart'])){
                            array_splice($_SESSION['mycart'],$_GET['idcart'],1);
                        }else{
                            $_SESSION['mycart']=[];
                        }?>
        </div>
    </div>
</div>
