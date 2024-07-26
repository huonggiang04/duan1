<style>  .trove a:hover{
    font-weight: bolder;
}
 .bill{
    width: 75%;
    margin-left: 15%;;
    margin-bottom: 10px;
 }
.bill1{
    background-color: #f3f3f3;
}
.bill .bill1 .boxcontent td{
    padding-left: 30px;
}

.boxtitle{
    color: #FFFFFF ;
    padding: 10px;
    background-color: #8A603A;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
    border: 1px #CCC solid;
}
.boxcontent{
    border-left: 1px #CCC solid;
    border-right: 1px #CCC solid;
    border-bottom: 1px #CCC solid;
    border-bottom-left-radius: 5px;
    border-bottom-right-radius: 5px;
    min-height: 200px;
    margin-bottom: 10px;
}
.cart table, .boxcontent3 table{
    width: 100%;
    border-collapse: collapse;
    border: 1px solid #8A603A ;
}
.cart table th, .boxcontent3 table th{
    padding: 10px;
    border: 1px solid #8A603A ;
    width: auto;
}
</style>
<div class="bill">
    <?php
        foreach ($listbill as $bill) {
                extract($bill)            
      
    ?>
    <div class="trove">
                <a href="index.php?act=mybill" style="text-decoration: none; color: #8A603A; font-size: 2vw;"> &#10094;	Trở về</a>
            </div>
    <div class="bill1">
        <div class="boxtitle" >MÃ ĐƠN HÀNG</div>
        <div class="boxcontent" style="min-height: 100px">
            <table>
                <tr>
                    <td>Mã đơn hàng:</td>
                    <td>WZANG-<?=$bill['id'];?></td>
                </tr>
                <tr>
                    <td>Ngày đặt hàng:</td>
                    <td><?=$bill['ngaydathang'];?></td>
                </tr>
                <tr>
                    <td>Tổng đơn hàng:</td>
                    <td><?=$bill['total'];?> VNĐ</td>
                </tr>
                <tr>
                    <td>Phương thức tt:</td>
                    <td><?php 
            if($bill['bill_pttt'] == 0) echo "Thanh toán khi nhận hàng" ; else echo "Thanh toán chuyển khoản ngân hàng"
            ?></td>
                </tr>
            </table>
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
    <?php  } ?>
    <div class="bill1">
        
        <div class="boxtitle">CHI TIẾT GIỎ HÀNG</div>
        <div class="boxcontent3">
            <table>
            <?php 
            
           
    echo '<tr>
    
    <th>Hình</th>
    <th>Sản phẩm</th>
    <th>Đơn giá</th>
    <th>Số lượng</th>
    <th>Thành tiền</th>
</tr>';
$tong=0;
$img_path="upload/";
 foreach ($billct as $cart) { 
   
    $i=0;
        $hinh=$img_path.$cart[3];
        $ttien=$cart[5]*$cart[6];
        $tong+=$ttien;
        echo '
    <tr>
        <th><img src="'.$hinh.'" alt="" height="80px"></th>
        <th>'.$cart[4].'</th>
        <th>'.$cart[5].'</th>
        <th>'.$cart[6].'</th>
        <th>'.$ttien.'</th>
     </tr>';
     $i+=1;
 }
    echo ' <tr>
    <th colspan="4">Tổng đơn hàng</th>
    <th>'.$tong.'VNĐ</th>
 </tr>';
            ?>
            </table>
        </div>
    </div>
</div>
