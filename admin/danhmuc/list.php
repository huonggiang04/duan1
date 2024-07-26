<div class="boxphai">
<div class="formcontent">
<div class="add mb"> DANH SÁCH DANH MỤC <a href="index.php?act=adddm"><input type="button" value="NHẬP MỚI"></a></div>

        <div class=" mb formdsloai">
            <table>
                    <tr>
                        <th>MÃ LOẠI</th>
                        <th>TÊN LOẠI</th>
                        <th></th>
                    </tr>
                    <?php 
                    foreach ($listdanhmuc as $danhmuc) {
                    extract($danhmuc);
                    $suadm="index.php?act=suadm&id=".$id;
                    $xoadm="index.php?act=xoadm&id=".$id;
                    echo ' <tr>
                        <th>'.$id.'</th>
                        <th>'.$name.'</th>
                        <th><a href="'.$suadm.'"><input type="button" value="Sửa"></a> <a href="'.$xoadm.'"><input type="button" value="Xóa"></a></th>
                    </tr>';
                    }
                    ?>                    
            </table>
        </div>
    </div>
</div>