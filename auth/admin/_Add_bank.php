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
    
    $tentaikhoan     = check_string($_POST['tentaikhoan']);
    $sotaikhoan     = check_string($_POST['sotaikhoan']);
    $naptoithieu     = check_string($_POST['naptoithieu']);
    $logobank     = check_string($_POST['logobank']);
    
    if(empty($tentaikhoan)){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Vui lòng nhập tên chủ tài khoản";
        die(json_encode($return));
    }
    if(empty($sotaikhoan)){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Vui lòng nhập số tài tài khoản";
        die(json_encode($return));
    }
    if(empty($naptoithieu)){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Vui lòng nhập mức nạp tối thiểu";
        die(json_encode($return));
    }
    if(empty($logobank)){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Vui lòng nhập logo ngân hàng";
        die(json_encode($return));
    }
    
    
    
        $create = $NHQ->insert("bank", [
        'namectk'     => $tentaikhoan,
        'namestk'       => $sotaikhoan,
        'id_xep'       => $naptoithieu,
        'status'       => 1,
        'img'          => $logobank,
        ]);
        if($create){
            $return['status'] = true;
            $return['error'] = false;
            $return['message']   = "Đăng ngân hàng thành công";
            die(json_encode($return));
        }else{
            $return['status'] = false;
            $return['error'] = true;
            $return['message']   = "Lỗi đăng ngân hàng";
            die(json_encode($return));
        }
        
}