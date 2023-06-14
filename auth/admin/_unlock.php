<?php require('../../config/function.php');

if ( $_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
    /****
       Up to you which header to send, some prefer 403 even if 
       the files does exist for security
    ****/
    /**** header( 'HTTP/1.0 403 Not Found', TRUE, 403 ); ****/
    /**** include('403.html'); ****/
    include('../../../pages/error405.php');
            // $return['status'] = false;
            // $return['error'] = 'error';
            // $return['msg']   = 'Method GET not allowed!';
            // die(json_encode($return));
    /**** choose the appropriate page to redirect users ****/

}else{
    
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
    
    if($checkusite['level'] != 'admin' || $checkusite['capbac'] != 3){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "error_level";
        die(json_encode($return));
    }
    
    $keyuser     = check_string($_POST['keyuser']);
    $checkusite2 = $NHQ->get_row(" SELECT * FROM `users` WHERE `username` = '$keyuser' ");
    
    if(!$checkusite2){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Username không tồn tại";
        die(json_encode($return));
    }else{
        if($checkusite2['banned'] == 0){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Username đã unlock rồi";
        die(json_encode($return));
        }else{
            $update2 = $NHQ->update("users", ['banned'  => 0], " `username` = '$keyuser' ");
            if($update2){
                $return['status'] = true;
                $return['error'] = false;
                $return['message']   = "Đã unlock user $keyuser";
                die(json_encode($return));
            }else{
                $return['status'] = false;
                $return['error'] = true;
                $return['message']   = "Lỗi hệ thống, không thể unlock $keyuser";
                die(json_encode($return));
            }
        }
    }
        
}