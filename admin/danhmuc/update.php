<?php 
if(is_array($dm)){
    extract($dm);
}
?>
<div class="boxphai">
            <div class="add mb">CHỈNH SỬA LOẠI HÀNG</div>
            <div class="formcontent">
                <form action="index.php?act=updatedm" method="post">
                    <!-- <div class="row mb ">
                        <span> Mã loại: </span>Mã loại <br>
                        <input type="text" name="maloai" disabled>
                    </div> -->
                    <div class="mb mb20">
                    <span> Tên loại: </span>
                    <input type="text" name="tenloai" value="<?php if(isset($name)&&($name!="")){echo $name;}else {echo "";}?>">
                </div>
                <div class="mb ">
                    <input type="hidden" name="id" value="<?php if(isset($id)&&($id>0)){echo $id;}?>">
                    <input type="submit" name="capnhat" value="CẬP NHẬT">
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
