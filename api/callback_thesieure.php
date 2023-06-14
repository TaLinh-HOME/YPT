<?php
require('../config/function.php');

if(isset($_GET['status'])) {
$code = $_GET['code'];
$serial = $_GET['serial'];
$thucnhan = $_GET['amount'];
$tranid = $_GET['request_id'];
			
$callback_sign = md5($NHQ->site('partner_key').$_GET['code'].$_GET['serial']);
	if($_GET['callback_sign'] == $callback_sign) { 
			$checkthe = $NHQ->get_row("SELECT * FROM `history_naptien` WHERE `sothe` = '$code' AND `soseri` = '$serial' AND `tranid` = '$tranid'");
            $getusernap = $checkthe['username'];
            if(!$checkthe)
            {
                exit('Request ID không tồn tại');
            }else{
                if($callback_sign != md5($NHQ->site('partner_key').$code.$serial))
                {
                    exit('Key xác minh không đúng');
                }else{
                    if ($_GET['status'] == 1) {
				
            			/* update trạng thái thẻ*/
                         $update2 = $NHQ->update("history_naptien", ['trangthai' => 1], " `tranid` = '$tranid' ");
                         $update2 = $NHQ->update("history_naptien", ['thucnhan'  => $thucnhan], " `tranid` = '$tranid' ");
                        /* update tiền user*/
                        $update1= $NHQ->cong("users", "money", $thucnhan, " `username` = '$getusernap' ");
                        $update3= $NHQ->cong("users", "tongnap", $thucnhan, " `username` = '$getusernap' ");
    
            			} else {
            			    
                            /* update trạng thái thẻ*/
                            $update2 = $NHQ->update("history_naptien", ['trangthai' => 2], " `tranid` = '$tranid' ");
            			    		
            			}
                }
                
            }
			
			
			

 
 }
                
 $myfile = fopen("logthesieure.txt", "w") or die("Unable to open file!");
 $txt = $_GET['status']."|".$_GET['request_id']."|".$_GET['amount']."\n";
fwrite($myfile, $txt);
 fclose($myfile);
}



		
	
	


?>