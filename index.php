<?php 
session_start();
include "admin/model/pdo.php";
include "admin/model/sanpham.php";
include "admin/model/danhmuc.php";
include "admin/model/taikhoan.php";
include "admin/model/cart.php";
include "view/header.php";
include "global.php";
if(!isset($_SESSION['mycart'])) $_SESSION['mycart']=[];

$spnew=loadall_sanpham_home();
$dsdm=loadall_danhmuc();
$dstopbanchay = loadall_sanpham_topbanchay();
if((isset($_GET['act']))&&($_GET['act']!="")){
    $act=$_GET['act'];
    switch ($act) {
        case 'gioithieu':
            include 'view/gioithieu.php';
            break;
        case 'lienhe':
            include 'view/lienhe.php';
            break;
        case 'hotro':
            include "view/hotro.php";
            break;
        case 'dangky':
            if(isset($_POST['dangky'])&&($_POST['dangky'])){
                $email=$_POST['email'];
                $user=$_POST['user'];
                $pass=$_POST['pass'];
                $loipass;   
                if(strlen($pass)< 8){
                    $loipass = 'Mật khẩu phải đủ 8 kí tự! Vui lòng nhập lại';
                    $thongbao= " &#10006; Đăng ký KHÔNG thành công. Vui lòng đăng ký lại!";
                    
                } else{
                insert_taikhoan($email, $user, $pass);
                // $thongbao="&#10004; Đã đăng ký thành công. Vui lòng đăng nhập!";
                include 'view/taikhoan/dangnhap.php';
                }
            } 
            include 'view/taikhoan/dangky.php';
            break;
        case 'dangnhap';
            if(isset($_POST['dangnhap'])&&($_POST['dangnhap'])){
                $user=$_POST['user'];
                $pass=$_POST['pass'];
                $checkuser=checkuser($user,$pass);
                if(is_array($checkuser)){
                $_SESSION['user']=$checkuser;
                header('location: index.php');
                } else{
                    $thongbao="&#10006; Tài khoản không tồn tại!!! Vui lòng kiểm tra lại!!!";
                }
            }
                include 'view/taikhoan/dangnhap.php';
                break;
        case 'edit_taikhoan';
            if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                $email=$_POST['email'];
                $user=$_POST['user'];
                $pass=$_POST['pass'];
                $address=$_POST['address'];
                $tel=$_POST['tel'];
                $id=$_POST['id'];
                update_taikhoan($email,$user,$pass,$address, $tel, $id);
                $thongbao = 'Cập nhật tài khoản thành công! ';
                $_SESSION['user']=checkuser($user,$pass);
                //  header('location: index.php?act=edit_taikhoan');
            }
                include 'view/taikhoan/edit_taikhoan.php';
                break;
        case "quenmk":
            if(isset($_POST['submit'])&&($_POST['email'])!=""){
                    $email=htmlspecialchars($_POST['email']);
                    $_SESSION['email']=$email;
                    $sl=check_email_guive($email);
                    if($sl!=0){
                        $to_mail="$email";
                        $tennguoigui="lep";
                        $nguoigui="nguyenquang18052004@gmail.com";
                        goimail($nguoigui,$tennguoigui,$to_mail);
                    }else{
                        $thongbao="Mail này chưa được đăng kí";
                    }     
            }
            include "view/taikhoan/quenmk.php";
                break;
        case "thaydoimk":
            if(!isset($_REQUEST['submit'])){
    
            }else{
                if(empty($_POST['NewPass'])==false&&empty($_POST['again-Pass'])==false){
                    $NewPass=$_POST['NewPass'];
                    $again_Pass=$_POST['again-Pass'];
                    $email=$_SESSION['email'];
                    $sql="update taikhoan set pass='$NewPass' where email='$email'";
                    if($NewPass==($again_Pass)){
                            pdo_execute($sql);
                            $thongbao="Thay đổi thành công!!";
                            include 'view/taikhoan/dangnhap.php';
                    }else{
                        echo $thongbao="Pass phải trùng khớp nhau!!";
                    }
                }
            }               
            include "view/taikhoan/thaydoimk.php";
            break;
        case 'thoat':
            session_unset();
            header('Location: index.php');
            break;
// SẢN PHẨM
        case 'sanphamct':           
            if(isset($_GET['id'])&&$_GET['id']>0){
                $id = $_GET['id'];
                $onesp = loadone_sanpham($id);
                extract($onesp);
                $sp_cung_loai=load_sanpham_cungloai($id,$iddm);
                include 'view/sanphamct.php';
            }else{
                include "view/home.php";
            }
            break;
        case 'sanpham':
            if(isset($_GET['iddm'])&&$_GET['iddm']>0){
            $iddm = $_GET['iddm'];
            }else{
                $iddm=0;
            }
            $dssp=loadall_sanpham($iddm);
            $tendm=load_ten_dm($iddm);
            include 'view/sanpham.php';
            break;
// GIỎ HÀNG
        case 'addtocart':
            if(!isset($_SESSION['user'])){
                $thongbao = "Bạn cần đăng nhập";
                include 'view/taikhoan/dangnhap.php';
            }else {
            if(isset($_POST['addtocart'])&&($_POST['addtocart'])){
                $id=$_POST['id'];
                $name=$_POST['name'];
                $img=$_POST['img'];
                $price=$_POST['price'];
                $soluong=1;
                $ttien=$soluong * $price;
                $spadd=[$id,$name,$img,$price,$soluong,$ttien];
                array_push($_SESSION['mycart'],$spadd); // thêm $spadd vào sau mảng 
            }
                include "view/cart/viewcart.php";
            }
                break;
        case 'delcart': // xóa giỏ hàng
            if(isset($_GET['idcart'])){
                array_splice($_SESSION['mycart'],$_GET['idcart'],1); //  dùng để cắt 1 phần tử tại vị trí $_GET['idcart']
            }else{
                $_SESSION['mycart']=[];
            }
            header('Location: index.php?act=viewcart');
            break;  
        case 'viewcart':
            if(isset($_POST['tieptucdathang'])&&($_POST['tieptucdathang'])){
                include "view/cart/sanpham.php";
            }
            include "view/cart/viewcart.php";
            break;   
        case 'bill':
            include "view/cart/bill.php";
            break;  
        case 'billcomfirm':
            // tao bill
            if(isset($_POST['dongydathang'])&&($_POST['dongydathang'])){
                if(isset($_SESSION['user'])) $iduser=$_SESSION['user']['id'];
                else $id=0;
                $name=$_POST['name'];
                $email=$_POST['email'];
                $address=$_POST['address'];
                $tel=$_POST['tel'];
                $pttt=$_POST['pttt'];
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $ngaydathang=date("Y-m-d H:i:s A");
                $tongdonhang=tongdonhang();
                $idbill=insert_bill($iduser,$name,$address,$tel,$email,$pttt,$ngaydathang,$tongdonhang);
            // insert into cart: $session[mycart] &idbill
            foreach ($_SESSION['mycart'] as $cart) {
                insert_cart($_SESSION['user']['id'],$cart[0],$cart[2],$cart[1],$cart[3],$cart[4],$cart[5],$idbill);
            }
            $_SESSION['cart']=[];
            }
            $bill=loadone_bill($idbill);
            $billct=loadall_cart($idbill);
            include "view/cart/billcomfirm.php";
            break;
        case 'mybill':
            $listbill = loadall_bill("", $_SESSION['user']['id']); // Thêm một tham số rỗng cho $kyw
            include "view/cart/mybill.php";
            break;
        case 'xoabill':  
            if(isset($_GET['id']) && ($_GET['id'] > 0)) {
                $id=$_GET['id'];
                delete_bill($id);
            }
            $listbill=loadall_bill(1);
            include "view/cart/mybill.php";
        break;
        case 'xemct':
            if(isset($_GET['id']) && ($_GET['id'] > 0)) {
                $id=$_GET['id'];
                $listbill = loadall_bill($id);
                $billct=loadall_cart($id);
            }
            include 'view/cart/xemct.php';
            break;
        default:
        include "view/home.php";
            break;
    }
}else {
    include "view/home.php";
}
include "view/footer.php";
?>