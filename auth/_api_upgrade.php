<?php require('../config/function.php');

if ( $_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
    /****
       Up to you which header to send, some prefer 403 even if 
       the files does exist for security
    ****/
    /**** header( 'HTTP/1.0 403 Not Found', TRUE, 403 ); ****/
    /**** include('403.html'); ****/
    include('../pages/error405.php');
            // $return['status'] = false;
            // $return['error'] = 'error';
            // $return['msg']   = 'Method GET not allowed!';
            // die(json_encode($return));
    /**** choose the appropriate page to redirect users ****/

}else{
    
    $x_csrf_token = x_csrf_token();
    $api_token = api_token();
    $checkusite = $NHQ->get_row(" SELECT * FROM `users` WHERE `token` = '$api_token' ");
    
    if(empty($api_token)){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Thiếu API Token";
        die(json_encode($return));
    }
    
    if(!$checkusite){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "API Token không hợp lệ";
        die(json_encode($return));
    }
    $type = check_string($_POST['type']);
    
    if($type == 'collaborators'){
        if($checkusite['tongnap'] < $NHQ->site('rate_ctv')){
            $return['status'] = false;
            $return['error'] = true;
            $return['message']   = "Bạn chưa đủ điều kiện để upgrade cấp bậc cộng tác viên";
            die(json_encode($return));
        }else{
            $update1 = $NHQ->update("users", ['capbac' => 1], " `username` = '".$checkusite['username']."' ");
            
            if($update1){
                $return['status'] = true;
                $return['error'] = false;
                $return['message']   = "Upgrade thành công cấp bậc cộng tác viên, bạn có thể tạo site con và hưởng đặc quyền của level";
                die(json_encode($return));
            }else{
                $return['status'] = false;
                $return['error'] = true;
                $return['message']   = "Chức năng đang bảo trì, liên hệ admin";
                die(json_encode($return));
            }
        }
    }
    
    if($type == 'agency'){
        if($checkusite['tongnap'] < $NHQ->site('rate_daily')){
            $return['status'] = false;
            $return['error'] = true;
            $return['message']   = "Bạn chưa đủ điều kiện để upgrade cấp bậc đại lý";
            die(json_encode($return));
        }else{
            $update2 = $NHQ->update("users", ['capbac' => 2], " `username` = '".$checkusite['username']."' ");
            
            if($update2){
                $return['status'] = true;
                $return['error'] = false;
                $return['message']   = "Upgrade thành công cấp bậc đại lý, bạn có thể tạo site con và hưởng đặc quyền của level";
                die(json_encode($return));
            }else{
                $return['status'] = false;
                $return['error'] = true;
                $return['message']   = "Chức năng đang bảo trì, liên hệ admin";
                die(json_encode($return));
            }
        }
    }
    
    if($type !== 'collaborators' || $type !== 'agency'){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Website không hỗ trợ chức năng này";
        die(json_encode($return));
    }
}