<?php

function insert_sanpham($tensp, $giasp, $hinh, $mota, $iddm){
    $sql = "INSERT INTO sanpham(name,price,img,mota,iddm) values('$tensp','$giasp','$hinh','$mota','$iddm')";
            pdo_execute($sql);
}

function delete_sanpham($id){
    $sql = "delete from sanpham where id=".$id;
            pdo_execute($sql);
}

function loadall_sanpham_home(){
    $sql="select * from sanpham where 1 order by id desc limit 0,9";
    $listsanpham=pdo_query($sql);
    return $listsanpham;
}

function loadall_sanpham_topbanchay(){
    $sql="select * from sanpham limit 0,4";
    $listsanpham=pdo_query($sql);
    return $listsanpham;
}
function loadall_sanpham($iddm=0){
    $sql="select * from sanpham where 1";
    if($iddm>0){
        $sql.=" and iddm = '".$iddm."'";
    }
    $sql.=" order by id desc";
    $listsanpham=pdo_query($sql);
    return $listsanpham;
}

function loadone_sanpham($id){
    $sql="select * from sanpham where id=".$id;
            $sp=pdo_query_one($sql);
            return $sp;
}

function load_sanpham_cungloai($id,$iddm){
    $sql="select * from sanpham where iddm=".$iddm." and id <>".$id;
    $listsanpham=pdo_query($sql);
    return $listsanpham;
}

function update_sanpham($id, $tensp, $giasp, $hinh, $mota, $iddm) {
    // Kiểm tra xem sản phẩm với id đã tồn tại chưa
    $existingProduct = pdo_query_one("SELECT * FROM sanpham WHERE id = ?", $id);

    if ($existingProduct) {
        // Nếu sản phẩm tồn tại, thực hiện câu lệnh UPDATE
        $sql = "UPDATE sanpham SET name=?, price=?, mota=?";

        $params = array($tensp, $giasp, $mota);

        if ($hinh != "") {
            $sql .= ", img=?";
            $params[] = $hinh;
        }

        $sql .= " WHERE id=? AND iddm=?";

        $params[] = $id;
        $params[] = $iddm;

        pdo_execute($sql, $params);
    } else {
        // Nếu sản phẩm không tồn tại, thực hiện các bước khác hoặc thông báo lỗi
        echo "Sản phẩm không tồn tại!";
    }
}
function load_ten_dm($iddm){
    if($iddm>0){
         $sql="select * from danhmuc where id=".$iddm;
            $dm=pdo_query_one($sql);
            extract($dm);
            return $name;
    }else{
        return "";
    }
}

?>