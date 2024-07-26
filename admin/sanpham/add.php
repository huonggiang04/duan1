<div class="boxphai">
    <div class="add mb"> THÊM MỚI SẢN PHẨM</div>
        <div class="formcontent">
            <form action="index.php?act=addsp" method="post" enctype="multipart/form-data">
                <div class="mt20 mb ">
                    <span>Danh mục: &emsp; &nbsp; </span>
                    <select name="iddm">
                        <?php 
                        foreach ($listdanhmuc as $danhmuc) {
                           extract($danhmuc);
                           echo '<option value="'.$id.'">'.$name.'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="mt20 mb ">
                    <span>Tên sản phẩm:  </span>
                    <input type="text" name="tensp">
                </div>
                <div class="mt20 mb ">
                   <span>Giá: &emsp; &emsp; &emsp; &nbsp; &nbsp;</span>
                    <input type="text" name="giasp">
                </div>
                <div class="mt20 mb ">
                   <span>Hình ảnh:</span>
                    <input type="file" name="hinh">
                </div>
                <div class="mt20 mb ">
                    <span>Mô tả: </span> <br>
                    <textarea name="mota" cols="30" rows="10"></textarea>
                </div>
                
                <div class="row mb ">
                    <input type="submit" name="themmoi" value="THÊM MỚI">
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
