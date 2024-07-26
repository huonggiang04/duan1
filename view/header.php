<?php $dsdm=loadall_danhmuc(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
    integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <header>
    <div class="menu">
      <div class="img"> <img src="upload/wzang-1@2x.png" alt="" srcset=""></div>
      <ul>
        <li> <a href="index.php"> Trang chủ</a></li>
        <li> <a href="~"> Sản phẩm</a>
        <ul class="menuconsp">
                     <?php 
            foreach ($dsdm as $dm) {
                extract($dm);
                $linkdm = "index.php?act=sanpham&iddm=".$id;
                echo '<li><a href="'.$linkdm.'">'.$name.'</a></li>';
            }
            ?> 
                </ul>
      
        </li>
        <li> <a href="index.php?act=hotro"> Hỗ trợ</a></li>
        <?php
        if(isset($_SESSION['user'])){
            extract($_SESSION['user']); ?>
            <li> <a href="#"> Xin Chào <?=$user?></a>
            <ul class="menucon">
              <li><a href="index.php?act=edit_taikhoan">Cập nhật tài khoản</a></li>
              <li><a href="index.php?act=mybill">Đơn hàng của tôi</a></li>
                            <?php
              if($role==1){?>
              <li><a href="admin/index.php">Đăng nhập admin</a></li>
              <?php }?>
              
              <li><a href="index.php?act=thoat">Đăng xuất</a></li>
              
            </ul>
          </li> 
            <?php
        } else { ?>
          <li> <a href="index.php?act=dangnhap"> Đăng nhập</a></li> 
          <?php
        }
      
?>

        
        <li> <a href="index.php?act=addtocart"> <img class="logo_cart" src="upload/bag.png" alt=""> </a></li>
      </ul>
    </div>
  </header>
