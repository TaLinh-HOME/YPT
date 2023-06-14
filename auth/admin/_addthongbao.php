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
    
    $thongbao     = check_string($_POST['thongbao']);
    if(empty($thongbao)){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Vui lòng nhập nội dung thông báo";
        die(json_encode($return));
    }else{
        $create = $NHQ->insert("note_thongbao", [
        'nguoidang'     => $checkusite['username'],
        'noidung'       => $thongbao,
        'date'          => gettime(),
        ]);
        if($create){
            $return['status'] = true;
            $return['error'] = false;
            $return['message']   = "Đăng thông báo thành công";
            die(json_encode($return));
        }else{
            $return['status'] = false;
            $return['error'] = true;
            $return['message']   = "Lỗi đăng thông báo";
            die(json_encode($return));
        }
    }
        
}