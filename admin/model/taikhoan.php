<?php 
function insert_taikhoan($email, $user, $pass){
    $sql = "INSERT INTO taikhoan(email,user,pass) values('$email','$user','$pass')";
            pdo_execute($sql);
}

function checkuser($user,$pass){
    $sql="select * from taikhoan where user='".$user."' AND pass='".$pass."'";
            $sp=pdo_query_one($sql);
            return $sp;
}

function update_taikhoan($email,$user,$pass,$address, $tel, $id){
$sql = "update taikhoan set email='".$email."', user='".$user."', pass='".$pass."',address='".$address."',tel='".$tel."' where id=".$id;
     pdo_execute($sql);
}
function loadall_taikhoan(){
    $sql="select * from taikhoan order by id desc";
    $listtaikhoan=pdo_query($sql);
    return $listtaikhoan;
}

function delete_taikhoan($id) {
        $sql = "delete from taikhoan where id=?";
        pdo_execute($sql, $_GET['id']);
}




    function goimail($nguoigui,$tennguoigui,$to){ 
        require "PHPMailer-master/src/PHPMailer.php";  //nhúng thư viện vào để dùng, sửa lại đường dẫn cho đúng nếu bạn lưu vào chỗ khác
        require "PHPMailer-master/src/SMTP.php"; //nhúng thư viện vào để dùng
        require "PHPMailer-master/src/Exception.php"; //nhúng thư viện vào để dùng
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);  //true: enables exceptions
          try {
              $mail->SMTPDebug = 0;  // 0,1,2: chế độ debug. khi mọi cấu hình đều tớt thì chỉnh lại 0 nhé
              $mail->isSMTP();  
              $mail->CharSet  = "utf-8";
              $mail->Host = 'smtp.gmail.com';  //SMTP servers
              $mail->SMTPAuth = true; // Enable authentication
            $nguoigui = 'nguyenquang18052004@gmail.com';
          $matkhau = 'juau lkmh ihgx chsp';
          $tennguoigui = 'Admin';
              $mail->Username = $nguoigui; // SMTP username
              $mail->Password = $matkhau;   // SMTP password
              $mail->SMTPSecure = 'tls';  // encryption TLS/SSL 
              $mail->Port = 587;  // port to connect to                
              $mail->setFrom($nguoigui, $tennguoigui ); 
            //   $to = "nhập email của người nhận";
              $to_name = "Người dùng";
              
              $mail->addAddress($to, $to_name); //mail và tên người nhận  
              $mail->isHTML(true);  // Set email format to HTML
              $mail->Subject = 'THAY ĐỔI MẬT KHẨU';      
              $noidungthu = "http://localhost/wzangshop/index.php?act=thaydoimk" ;
              $mail->Body = $noidungthu;
              $mail->smtpConnect( array(
                  "ssl" => array(
                      "verify_peer" => false,
                      "verify_peer_name" => false,
                      "allow_self_signed" => true
                  )
              ));
              $mail->send();
              echo $thongbao='Thành Công! Vui lòng vào Gmail để thực hiện...';
          } catch (Exception $e) {
              echo 'Mail không gửi được. Lỗi: ', $mail->ErrorInfo;
          }
        }
        function check_email_guive($email){
                $pdo = new PDO("mysql:host=localhost;dbname=wzang", 'root', ''); // Thay các giá trị này bằng thông tin đăng nhập vào CSDL của bạn
            
                $sql = "SELECT * FROM taikhoan WHERE email = :email";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':email', $email);
                $stmt->execute();
            
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result;
            }
            
function check_user($user,$pass){
    $sql="select * from taikhoan where user='$user' and mat_khau='$pass'";
    $arr=pdo_query_one($sql);
    return $arr;
}
function update_mk($id,$mat_khau_moi){
    
        $sql="update taikhoan set pass='$mat_khau_moi' where id='$id'";
        pdo_execute($sql);
}

function check_doimk($id,$pass){
    $sql="select * from taikhoan where pass='$pass' and id='$id'";
    $sl=pdo_query_row($sql);
    return $sl;
}

?>