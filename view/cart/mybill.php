    
        <div class="row" style="text-align:center;">
            <div class="boxtilte add">ĐƠN HÀNG CỦA TÔI</div>
            <div class="row boxcontent cart">
                <table>
                    <tr>
                        <th>MÃ ĐƠN HÀNG</th>
                        <th>NGÀY ĐẶT HÀNG</th>
                        <th>SỐ LƯỢNG SẢN PHẨM</th>
                        <th>TỔNG GIÁ TRỊ ĐƠN HÀNG</th>
                        <th>TÌNH TRẠNG ĐƠN HÀNG</th>
                        <th></th>
                    </tr>
                    <?php
                    if (is_array($listbill)) {
                        
                        foreach ($listbill as $bill) {
                            extract($bill);
                            $xoabill="index.php?act=xoabill&id=".$id;
                            $xemct = "index.php?act=xemct&id=".$id;
                            $ttdh = get_ttdh($bill['bill_status']);
                            $countsp = loadall_cart_count($bill['id']);
                            echo ' <tr>
                            <th>DAM-' . $bill['id'] . '</th>
                            <th>' . $bill['ngaydathang'] . '</th>
                            <th>' . $countsp . '</th>
                            <th>' . $bill['total'] . '</th>
                            <th>' . $ttdh . '</th>
                            <th><a href="'.$xoabill.'"><input type="button" value="Xóa"><a href="'.$xemct.'"><input type="button" value="Chi tiết"></th>
                            </tr>';
                        }
                    }
                    ?>

                </table>
            </div>
        </div>
