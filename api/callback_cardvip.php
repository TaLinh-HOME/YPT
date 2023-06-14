<?php
require('../config/function.php');

$status = $_GET['status']; 

# Đối số pricesvalue là mệnh giá thẻ cào lúc quý khách gửi thẻ
$pricesvalue = $_GET['pricesvalue'];

# Đối số value_receive là mệnh giá thực của thẻ, quý khách chỉ quan tâm đối số này khi status nhận giá trị 200 hoặc 201
$value_receive = $_GET['value_receive'];

# Đối số card_code là mã thẻ cào quý khách gửi
$card_code = $_GET['card_code'];

# Đối số card_seri là serial cào quý khách gửi
$card_seri = $_GET['card_seri'];

# Đối số value_customer_receive là mệnh giá mà quý khách nhận được sau khi đã trừ chiết khấu, mệnh giá này là mệnh giá được cộng vào tài khoản CARDVIP
$value_customer_receive = $_GET['value_customer_receive'];

# Đối số requestid là mã đơn thẻ cào mà quý khách đã gửi sang
$requestid = $_GET['requestid'];

# Quý khách check thẻ cào có tồn tại trong hệ thống hoặc thẻ cào đó đã xử lý chưa thông qua các điều kiện như card_code, card_seri, requestid, trạng thái xử lý của thẻ
# Sau đó sẽ check trạng thái của biến $status để cập nhật trạng thái của thẻ theo hướng dẫn trên.

if(isset($status) && isset($card_code)  && isset($card_seri)){
    $checkthe = $NHQ->get_row("SELECT * FROM `history_naptien` WHERE `sothe` = '$card_code' AND `soseri` = '$card_seri' AND `tranid` = '$requestid'");
    $getusernap = $checkthe['username'];
    
    if($status == 200){
        /* update trạng thái thẻ*/
         $update2 = $NHQ->update("history_naptien", ['trangthai' => 1], " `tranid` = '$requestid' ");
         $update2 = $NHQ->update("history_naptien", ['thucnhan'  => $value_customer_receive], " `tranid` = '$requestid' ");
        /* update tiền user*/
        $update1= $NHQ->cong("users", "money", $value_customer_receive, " `username` = '$getusernap' ");
        $update3= $NHQ->cong("users", "tongnap", $value_customer_receive, " `username` = '$getusernap' ");

    }elseif($status == 201){
        /* update trạng thái thẻ*/
         $update2 = $NHQ->update("history_naptien", ['trangthai' => 2], " `tranid` = '$requestid' ");
    }elseif($status == 100){
        /* update trạng thái thẻ*/
         $update2 = $NHQ->update("history_naptien", ['trangthai' => 2], " `tranid` = '$requestid' ");
    }else{
        
    }
    
        /* Lưu lại callback*/
        $myfile = fopen("logcardvip.txt", "w") or die("Unable to open file!");
        $txt = $_GET['status']."|".$_GET['pricesvalue']."|".$_GET['value_receive'].$_GET['card_code']."|".$_GET['card_seri']."|".$_GET['value_customer_receive'].$_GET['requestid']."\n";
        fwrite($myfile, $txt);
        fclose($myfile);
}

