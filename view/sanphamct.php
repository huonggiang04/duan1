<div class="ct">
    <?php extract($onesp);?>
    <div class="chitietsp">
        <div class="img">
            <?php                 
                $img=$img_path.$img;
                echo '<div class="anh" ><img style="height:500px" src="'.$img.'"><br></div>';
            ?>
        </div>
        <div class="mota">
            <div class="namespct">
                <?=$name?>
            </div>
            <div class="price">
                <?=$price?> VNĐ
            </div>
            <div class="motact">
                <h3>Mô Tả Sản Phẩm</h3>
                <?=$mota?> 
            </div> 
        </div>
    </div>
    <div class="binhluan">
        <iframe src="view/binhluan/binhluanform.php?idpro=<?=$id?>" frameborder="0" width="90%" height="300px"></iframe>
    </div>
    <div class="sptuongtu banchay">
        <p> SẢN PHẨM TƯƠNG TỰ</p>
        <div class="boxallsp">
                        <?php 
                        foreach ($sp_cung_loai as $sp_cung_loai) {
                            extract($sp_cung_loai);
                            $hinh = $img_path.$img;
                            $linksp="index.php?act=sanphamct&id=".$id;
                            echo '<div class="boxsp ">
            <div class="img"> <a href="'.$linksp.'"> <img src="'.$hinh.'" alt=""></a></div>
            <a href="'.$linksp.'" class="namesp">'.$name.'</a>
            <div class="star">
                &emsp; &nbsp; <i class="fa-solid fa-star" style="color: #ffc800;"></i> <i
                    class="fa-solid fa-star" style="color: #ffc800;"></i> <i class="fa-solid fa-star"
                    style="color: #ffc800;"></i> <i class="fa-solid fa-star" style="color: #ffc800;"></i><i
                    class="fa-solid fa-star" style="color: #ffc800;"></i>
            </div>
            <div class="hi">
                        <div class="price" style="margin-left: 10px;">
                            <p style="margin-left: 20px;">'.$price.'VNĐ</p>
                        </div>
                        <div class="btnaddtocart">
                        <form action="index.php?act=addtocart" method="post">
                            <input type="hidden" name="id" value="'.$id.'">
                            <input type="hidden" name="name" value="'.$name.'">
                            <input type="hidden" name="img" value="'.$img.'">
                            <input type="hidden" name="price" value="'.$price.'">
                            <input type="submit" name="addtocart" value="&#10010;">
                        </form>
                        </div>
                        </div>
            </div>';
            }
        
            ?>
        </div>      
    </div>
</div>