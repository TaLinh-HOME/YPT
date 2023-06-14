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
    
    $baseurl            = check_string($_POST['baseurl']);
    $tenwebsite         = check_string($_POST['tenwebsite']);
    $ratectv            = check_string($_POST['ratectv']);
    $ratedaily          = check_string($_POST['ratedaily']);
    
    if(empty($baseurl)){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Bạn chưa nhập link website";
        die(json_encode($return));
    }
    if(empty($tenwebsite)){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Bạn chưa nhập tên website";
        die(json_encode($return));
    }
    if(empty($ratectv)){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Bạn chưa nhập rate ctv";
        die(json_encode($return));
    }
    if(empty($ratedaily)){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Bạn chưa nhập rate đại lý";
        die(json_encode($return));
    }
    
    $update = $NHQ->update("options", [
        'value' => $baseurl
    ], " `key` = 'base_url' ");
    
    $update1 = $NHQ->update("options", [
        'value' => $tenwebsite
    ], " `key` = 'ten_website' ");
    
    $update2 = $NHQ->update("options", [
        'value' => $ratectv
    ], " `key` = 'rate_ctv' ");
    
    $update3 = $NHQ->update("options", [
        'value' => $ratedaily
    ], " `key` = 'rate_daily' ");
    
    
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