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
    
     $old_password        = check_string($_POST['old_password']);
    $new_password     = check_string($_POST['new_password']);
    $confirm_new_password           = check_string($_POST['confirm_new_password']);
    
    if(empty($old_password)){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Vui lòng nhập mật khẩu cũ";
        die(json_encode($return));
    }
    
    if(empty($new_password)){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Vui lòng nhập mật khẩu mới";
        die(json_encode($return));
    }
    
    if(empty($confirm_new_password)){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Vui lòng xác nhận mật khẩu mới";
        die(json_encode($return));
    }
    
    
    if(typepass($old_password) != $checkusite['password']){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Mật khẩu cũ bạn nhập không chính xác";
        die(json_encode($return));
    }
    
    if(typepass($confirm_new_password) != typepass($new_password)){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Mật khẩu xác nhận không trùng khớp";
        die(json_encode($return));
    }
    
    if($update2 = $NHQ->update("users", ['password' => typepass($new_password)], " `username` = '".$checkusite['username']."' ")){
        $return['status'] = true;
        $return['error'] = false;
        $return['message']   = "Cập nhật thành công";
        die(json_encode($return));
    }else{
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Đã có lỗi xảy ra";
        die(json_encode($return));
    }
}