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
    
    $nameadmin          = check_string($_POST['nameadmin']);
    $phonezalo          = check_string($_POST['phonezalo']);
    $facebook           = check_string($_POST['facebook']);
    $UIDfacebook        = check_string($_POST['UIDfacebook']);
    
    if(empty($nameadmin)){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Bạn chưa nhập họ tên admin";
        die(json_encode($return));
    }
    if(empty($phonezalo)){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Bạn chưa nhập số điện thoại zalo";
        die(json_encode($return));
    }
    if(empty($facebook)){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Bạn chưa nhập link facebook admin";
        die(json_encode($return));
    }
    if(empty($UIDfacebook)){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Bạn chưa nhập UID facebook admin";
        die(json_encode($return));
    }
    
    $update = $NHQ->update("options", [
        'value' => $nameadmin
    ], " `key` = 'full_name_admin' ");
    
    $update1 = $NHQ->update("options", [
        'value' => $phonezalo
    ], " `key` = 'phone_zalo' ");
    
    $update2 = $NHQ->update("options", [
        'value' => $facebook
    ], " `key` = 'facebook' ");
    
    $update3 = $NHQ->update("options", [
        'value' => $UIDfacebook
    ], " `key` = 'id_page' ");
    
    
    if($update || $update1 || $update2 || $update3){
        $return['status'] = true;
        $return['error'] = false;
        $return['message']   = "Cập nhật thành công";
        die(json_encode($return));
    }else{
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Lỗi hệ thống";
        die(json_encode($return));
    }
    
}