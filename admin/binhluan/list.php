<div class="boxphai">
    <div class="add mb"> DANH SÁCH BÌNH LUẬN</div>
    <div class="formcontent">
        <div class=" mb formdsloai">
            <table>
                <tr>
                    <th>Id</th>
                    <th>Nội dung</th>
                    <th>User</th>
                    <th>Idpro</th>
                    <th>Ngày bình luận</th>
                    <th></th>
                </tr>
                    <?php 
                    foreach ($listbinhluan as $binhluan) {
                    extract($binhluan);
                    $xoabl="index.php?act=xoabl&id=".$id;
                    echo ' <tr>
                        <th>'.$id.'</th>
                        <th>'.$noidung.'</th>
                        <th>'.$user.'</th>
                        <th>'.$idpro.'</th>
                        <th>'.$ngaybinhluan.'</th>
                        <th><a href="'.$xoabl.'"><input type="button" value="Xóa"></a></th>
                    </tr>';
                    }
                    ?>                    
                   </table>
                </div>
            </div>
 </div>