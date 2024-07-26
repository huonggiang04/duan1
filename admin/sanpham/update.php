<?php
if(is_array($sanpham)){
    extract($sanpham);
}
  ?>
<div class="boxphai">
            <div class="add mb"> CHỈNH SỬA HÀNG HÓA</div>
            <div class="formcontent">
            <form action="index.php?act=updatesp" method="post" enctype="multipart/form-data">
                    <div class="mb">
                        <span> Danh mục: &emsp; &nbsp; </span> 
                    <select name="iddm" id="">
                            <option value="0">Tất cả</option>
                        <?php 
                        foreach ($listdanhmuc as $danhmuc) {
                           extract($danhmuc);
                           if($iddm==$id) $s="selected"; else $s="";
                           echo '<option value="'.$id.'" '.$s.'>'.$name.'</option>';
                        }
                        ?>
                        
                        </select>
                    </div>
                    <?php 
                        if(is_array($sanpham)){
                            extract($sanpham);
                        }
                        $hinhpath="../upload/".$img;
                        if(is_file($hinhpath)){
                        $hinh = "<img src='".$hinhpath."'height='80'>";
                        } else {
                        $hinh = " không có hình ảnh";
                        }
                    ?>
                <div class="mt20 mb ">
                    <span>Tên sản phẩm:  </span>
                    <input type="text" name="tensp" value="<?=$name?>">
                </div>
                <div class="mt20 mb ">
                   <span>Giá: &emsp; &emsp; &emsp; &nbsp; &nbsp;</span>
                    <input type="text" name="giasp" value="<?=$price?>">
                </div>
                <div class="mt20 mb ">
                   <span>Hình ảnh:</span>
                    <input type="file" name="hinh"> <?=$hinh?>
                </div>
                <div class="mt20 mb ">
                    <span>Mô tả: </span> <br>
                    <textarea name="mota" cols="30" rows="10"> <?=$mota?></textarea>
                </div>
                
                
                <div class="row mb ">
                    <input type="hidden" name="id" value="<?=$id?>">
                    <input type="submit" name="capnhat" value="CẬP NHẬT">
                    <input type="reset" value="NHẬP LẠI">
                    <a href="index.php?act=listsp"><input type="button" value="DANH SÁCH"></a>
                    </div>
                    <?php 
                    if(isset($thongbao)&&($thongbao!="")){
                    echo $thongbao;
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>
