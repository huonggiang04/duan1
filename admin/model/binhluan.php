<?php
    function insert_binhluan($noidung,$user,$idpro,$ngaybinhluan){
        $sql="insert into binhluan(noidung,user,idpro,ngaybinhluan) values('$noidung','$user','$idpro','$ngaybinhluan')";
        pdo_execute($sql);
    }

    function loadall_binhluan($idpro){
        $sql="select * from binhluan where 1";
        if($idpro>0) $sql.=" AND idpro='".$idpro."'";
        $sql.=" order by id desc";
        $listbl=pdo_query($sql);
        return $listbl;
    }
    
    function delete_binhluan($id) {
        $sql = "delete from binhluan where id=?";
        pdo_execute($sql, $_GET['id']);
    } 
?>

