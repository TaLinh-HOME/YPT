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
    
    $sitenapthe     = check_string($_POST['sitenapthe']);
    $cuphapnap       = check_string($_POST['cuphapnap']);
    $PartnerID     = check_string($_POST['PartnerID']);
    $PartnerKEY       = check_string($_POST['PartnerKEY']);
    
    if(empty($sitenapthe)){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Bạn chưa chọn site nạp thẻ";
        die(json_encode($return));
    }
    if(empty($cuphapnap)){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Bạn chưa nhập cú pháp nạp tiền";
        die(json_encode($return));
    }
    if(empty($PartnerID)){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Bạn chưa nhập Partner ID";
        die(json_encode($return));
    }
    if(empty($PartnerKEY)){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Bạn chưa nhập Partner KEY";
        die(json_encode($return));
    }
    
    $update = $NHQ->update("options", [
        'value' => $sitenapthe
    ], " `key` = 'site_napthe' ");
    
    $update1 = $NHQ->update("options", [
        'value' => $cuphapnap
    ], " `key` = 'cuphap' ");
    
    $update2 = $NHQ->update("options", [
        'value' => $PartnerID
    ], " `key` = 'partner_id' ");
    
    $update3 = $NHQ->update("options", [
        'value' => $PartnerKEY
    ], " `key` = 'partner_key' ");
    
    
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