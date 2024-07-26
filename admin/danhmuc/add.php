
<div class="boxphai">
            <div class="add mb">THÊM MỚI DANH MỤC</div>
            <div class="formcontent">
                <form action="index.php?act=adddm" method="post">
                    <!-- <div class="mb">
                       <p>Mã loại</p>
                        <input type="text" name="maloai" disabled>
                    </div> -->
                    <div class="mb mt20">
                   <span> Tên loại: </span> <input type="text" name="tenloai" placeholder="Nhập tên loại...">
                    
                </div>
                <div class="mb mt20">
                    <input type="submit" name="themmoi" value="THÊM MỚI">
                    <input type="reset" value="NHẬP LẠI">
                    <a href="index.php?act=listdm"><input type="button" value="DANH SÁCH"></a>
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
