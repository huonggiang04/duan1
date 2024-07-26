<div class="boxphai">
<div class=" formcontent">
            <div class="add mb">DANH SÁCH TÀI KHOẢN</div>
                <div class="row mb formdsloai">
                   <table>
                    <tr>
                        <th>MÃ TK</th>
                        <th>EMAIL</th>
                        <th>USERNAME</th>
                        <th>PASSWORD</th>
                        <th>ADDRESS</th>
                        <th>PHONE NUMBER</th>
                        
                    </tr>
                    <?php 
                    foreach ($listtaikhoan as $taikhoan) {
                    extract($taikhoan);
                    echo ' <tr>
                        <th>'.$id.'</th>
                        <th>'.$email.'</th>
                        <th>'.$user.'</th>
                        <th>'.$pass.'</th>
                        <th>'.$address.'</th>
                        <th>'.$tel.'</th>
                    </tr>';
                    }
                    ?>                    
                   </table>
                </div>
           
            </div>
 </div>