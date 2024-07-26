<div class="boxphai ">
        <div class="row mb ">
            <div class="boxtitle">DANH MỤC</div>
            <div class="boxcontent2 menudoc">
                <ul>
                     <?php 
            foreach ($dsdm as $dm) {
                extract($dm);
                $linkdm = "index.php?act=sanpham&iddm=".$id;
                echo '<li><a href="'.$linkdm.'">'.$name.'</a></li>';
            }
            ?> 
                </ul>
            </div>
            <div class="boxfooter searchbox">
                <form action="index.php?act=sanpham" method="post">
                    <input type="text" name="kyw">
                    <input type="submit" name="timkiem" value="Tìm Kiếm">
                </form>
            </div>
        </div>
        <div class="row">
            <div class="boxtitle">TOP YÊU THÍCH</div>
            <div class="boxcontent row">
                 <?php
        foreach ($dstop10 as $sp) {
            extract($sp);
            $linksp="index.php?act=sanphamct&idsp=".$id;
            $img=$img_path.$img;
            echo '<div class="row mb10 top10">
            <img src="'.$img.'" alt="">
            <a href="'.$linksp.'">'.$name.'</a>
        </div>';
        }
        ?> 
            </div>
        </div>
    </div>
    </div>
