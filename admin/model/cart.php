<?php
function viewcart($del){
    global $img_path;
    $tong=0;
    $i=0;
    if($del==1){
        $xoasp_th=' <th>Thao tác</th>';
        $xoasp_th2='<th></th>';
    }else{
        $xoasp_th='';
        $xoasp_th2='';
    }
    echo '<tr>
    
    <th>Hình</th>
    <th>Sản phẩm</th>
    <th>Đơn giá</th>
    <th>Số lượng</th>
    <th>Thành tiền</th>
    '.$xoasp_th.'
</tr>';
    foreach ($_SESSION['mycart'] as $cart) {
        $hinh=$img_path.$cart[2];
        $ttien=$cart[3]*$cart[4];
        $tong+=$ttien;
        if($del==1){
            $xoasp_th='<th><a href="index.php?act=delcart&idcart='.$i.'"><input type="button" value="Xóa"></a></th>';
        }else{
            $xoasp_th='';
        }
        
        echo '
    <tr>
        <th><img src="'.$hinh.'" alt="" height="80px"></th>
        <th>'.$cart[1].'</th>
        <th>'.$cart[3].'</th>
        <th>'.$cart[4].'</th>
        <th>'.$ttien.'</th>
        '.$xoasp_th.'
     </tr>';
     $i+=1;
    }
    echo ' <tr>
    <th colspan="4">Tổng đơn hàng</th>

    <th>'.$tong.'VNĐ</th>
    '.$xoasp_th2.'
 </tr>';
}

function bill_chi_tiet($listbill){
    global $img_path;
    $tong=0;
    $i=0;
    
    echo '<tr>
    
    <th>Hình</th>
    <th>Sản phẩm</th>
    <th>Đơn giá</th>
    <th>Số lượng</th>
    <th>Thành tiền</th>
  </tr>';
    foreach($listbill as $cart) {
        $hinh=$img_path.$cart['img'];
        $tong+=$cart['thanhtien'];
        
        echo '
    <tr>
        <th><img src="'.$hinh.'" alt="" height="80px"></th>
        <th>'.$cart['name'].'</th>
        <th>'.$cart['price'].'</th>
        <th>'.$cart['soluong'].'</th>
        <th>'.$cart['thanhtien'].'</th>
     </tr>';
    $i+=1;
    }
    echo ' <tr>
    <th colspan="4">Tong don hang</th>

    <th>'.$tong.'</th>

</tr>';
}

function tongdonhang(){
    $tong=0;
    foreach ($_SESSION['mycart'] as $cart) {
        $ttien=$cart[3]*$cart[4];
        $tong+=$ttien;
    }
    return $tong;
}

function insert_bill($iduser,$name,$address,$tel,$email,$pttt,$ngaydathang,$tongdonhang){
    $sql="insert into bill(iduser,bill_name,bill_address,bill_tel,bill_email,bill_pttt,ngaydathang,total) values('$iduser','$name','$address','$tel','$email','$pttt','$ngaydathang','$tongdonhang')";
    return pdo_execute_return_lastInsertId($sql);
}

function insert_cart($iduser,$idpro,$img,$name,$price,$soluong,$thanhtien,$idbill){
    $sql="insert into cart(iduser,idpro,img,name,price,soluong,thanhtien,idbill) values('$iduser','$idpro','$img','$name','$price','$soluong','$thanhtien','$idbill')";
    return pdo_execute($sql);
}

function loadone_bill($id){
    $sql="select * from bill where id=".$id;
    $bill=pdo_query_one($sql);
    return $bill;
}

function loadall_cart($idbill){
    $sql="select * from cart where idbill=".$idbill;
    $bill=pdo_query($sql);
    return $bill;
}

function loadall_cart_count($idbill) {
    $sql = "SELECT * FROM cart WHERE idbill = :idbill";
    $params = array(':idbill' => $idbill);

    $result = pdo_query($sql, $params);
    return ($result) ? count($result) : 0;
}

function loadall_bill($kyw="",$iduser=0){

    $sql="select * from bill where 1";
    if($iduser>0) $sql.=" AND iduser=".$iduser;
    if($kyw!="") $sql.=" AND id like '%".$kyw."%'";
    $sql.=" order by id desc";
    $listbill=pdo_query($sql);
    return $listbill;
}

function get_ttdh($status){
    switch($status){
        case 0:
            $tt= "Đơn hàng mới";
            break;
        case 1:
            $tt="Đang xử lí";
            break;
        case 2:
            $tt= "Đã giao";
            break;
        case 3:
            $tt="Đã bị boom";
            break;
        default:
            $tt="Đơn hàng mới";
            break;
    }
    return $tt;
}

function delete_bill($id) {
    $sql = "delete from bill where id=?";
    pdo_execute($sql, $_GET['id']);
}
?>
