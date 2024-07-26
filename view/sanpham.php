<div class="boxbao">
<div class="boxtrai" >
<?php                 
                $i=0;
                foreach ($dssp as $sp) {
                    extract($sp);
                    $linksp="index.php?act=sanphamct&id=".$id;
                    $hinh = $img_path.$img;
                    echo '<div class="boxnho ">
                    <div class="img"> <a href="'.$linksp.'"> <img src="'.$hinh.'" alt=""></a></div> <hr>
                    <a href="'.$linksp.'" class="namesp">'.$name.'</a>
                    <div class="star">
                        &emsp; &nbsp; <i class="fa-solid fa-star" style="color: #ffc800;"></i> <i
                            class="fa-solid fa-star" style="color: #ffc800;"></i> <i class="fa-solid fa-star"
                            style="color: #ffc800;"></i> <i class="fa-solid fa-star" style="color: #ffc800;"></i><i
                            class="fa-solid fa-star" style="color: #ffc800;"></i>
                    </div>
                    <div class="hi">
                    <div class="price"">
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
                $i+=1;
                }
?>

       

</div>
