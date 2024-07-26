<?php
    session_start();
    include '../../admin/model/pdo.php';
    include '../../admin/model/binhluan.php';
    
    $idpro=$_REQUEST['idpro'];
    $dsbl=loadall_binhluan($idpro);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/index.css">
    <style>
        body{
            margin: 0;
        }
        *{
            font-size: 1.8vw;
            color: gray;
        }
       
    </style>
</head>
<body>
    <div class="cmt">
        <div class="boxbinhluan">BÌNH LUẬN</div>
        <div class="boxnoidung" >
                <?php
                foreach ($dsbl as $bl){
                    extract ($bl);
                    echo $user. ': '; 
                    echo $noidung. '&emsp;&emsp;&emsp;' ;
                    echo $ngaybinhluan. '<br>';
                }
                ?>
        </div>
        <div class="binhluanform ">
            <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
                <input type="hidden" name="idpro" value="<?=$idpro?>">
                <input type="text" name="noidung">
                <input type="submit" name="guibinhluan" value="Gửi">
            </form>
        </div>
        <?php
            if(isset($_POST['guibinhluan'])&&($_POST['guibinhluan'])){
                $noidung=$_POST['noidung'];
                $idpro=$_POST['idpro'];
                $user=$_SESSION['user']['user'];
                $ngaybinhluan=date('d/m/Y');
                if($noidung != ""){
                insert_binhluan($noidung,$user,$idpro,$ngaybinhluan);
                header("location: ".$_SERVER['HTTP_REFERER']); // đưa  người dùng về trang web trước đó mà người dùng đã truy cập trước khi chuyển đến trang hiện tại.
                } else {
                    echo 'Cần có nội dung khi bình luận';
                }
            }
        ?>
    </div>
</body>
</html>