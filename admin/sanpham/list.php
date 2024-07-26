<div class="boxphai">
            <div class="add mb"> DANH SÁCH LOẠI HÀNG HÓA</div>
            <div class=" formcontent mb">         
            <form action="index.php?act=listsp" method="post">
                        <select name="iddm" id="" class="mb">
                            <option value="0">Tất cả</option>
                        <?php 
                        foreach ($listdanhmuc as $danhmuc) {
                           extract($danhmuc);
                           echo '<option value="'.$id.'">'.$name.'</option>';
                        }
                        ?>
                        </select>
                        <input type="submit" name="listok" value="Hiển thị">
                        <a href="index.php?act=addsp"><input type="button" value="NHẬP MỚI"></a>
                    </form>
                    


                <div class="row mb formdsloai">
                    
                   <table>
                    <tr>
                        <th>MÃ SẢN PHẨM</th>
                        <th>TÊN SẢN PHẨM</th>
                        <th>HÌNH</th>
                        <th>GIÁ</th>
                        <th>LƯỢT XEM</th>
                        <th></th>
                    </tr>
                    <?php 
                    foreach ($listsanpham as $sanpham) {
                    extract($sanpham);
                    $suasp="index.php?act=suasp&id=".$id;
                    $xoasp="index.php?act=xoasp&id=".$id;
                    $hinhpath="../upload/".$img;
                    if(is_file($hinhpath)){
                        $hinh = "<img src='".$hinhpath."'height='80'>";
                    } else {
                        $hinh = "";
                    }
                    echo ' <tr>
                        <th>'.$id.'</th>
                        <th>'.$name.'</th>
                        <th>'.$hinh.'</th>
                        <th>'.number_format($price, 0, ',', '.').'</th>
                        <th>'.$luotxem.'</th>
                        <th><a href="'.$suasp.'"><input type="button" value="Sửa"></a> <a href="'.$xoasp.'"><input type="button" value="Xóa"></a></th>
                    </tr>';
                    }
                    ?>                    
                   </table>
                </div>
            </div>
 </div>