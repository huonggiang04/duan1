<div class="boxphai">
    <div class="mb formcontent">
        <div class="mb add  ">DANH SÁCH ĐƠN HÀNG </div>
        <form action="index.php?act=listbill" method="post" class="mb">
            <input type="text" name="kyw" placeholder="Nhập mã đơn hàng">
            <input type="submit" name="litsok" value="GO">
            <a href="index.php?act=addsp"> <input type="button" value="Nhập thêm"></a>
        </form>
        
        <div class=" mb formdsloai">
            <table class="formdsloai">
                <tr>
                    <th>Mã đơn hàng</th>
                    <th>Khách hàng</th>
                    <th>Số lượng đơn hàng</th>
                    <th>Giá trị đơn hàng</th>
                    <th>Tình trạng đơn hàng </th>
                    <th>Ngày đặt hàng</th>
                    <th>Thao tác</th>
                </tr>
                <?php
                foreach ($listbill as $bill) {
                    extract($bill);
                    $xemct = "index.php?act=xemct&id=".$id;
                    $kh=$bill["bill_name"].'
                    <br> '.$bill["bill_email"].'
                    <br> '.$bill["bill_address"].'
                    <br>'.$bill["bill_tel"];
                    $ttdh=get_ttdh($bill["bill_status"]);
                    $countsp=loadall_cart_count($bill["id"]);
                    echo'<tr>
                    <th>DAM-'.$bill['id'].'</th>
                    <th>'.$kh.'</th>
                    <th>'.$countsp.'</th>
                    <th><strong>'.$bill["total"].'</strong>VND</th>
                    <th>'.$ttdh.'</th>
                    <th>'.$bill["ngaydathang"].'</th>
                    <th><a style="margin-left:-20px;" href="'.$xemct.'"><input type="button" value="Chi tiết"></th>
                    </tr> ';
                }
                ?>
            </table>
        </div>
       
        <div class=" mb">
           
        </div>
    </div>
</div>
