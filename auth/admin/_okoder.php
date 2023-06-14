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
    
    $code_order     = check_string($_POST['code_order']);
    $id_order       = check_string($_POST['id']);
    
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
    
    $selectservice = $NHQ->get_row("SELECT * FROM `history_buft` WHERE `id` = '$id_order' ");
    
    if($selectservice['status'] == 'Start'){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Đơn hàng này đã duyệt trước đó";
        die(json_encode($return));
    }
    
    $update = $NHQ->update("history_buft", [
        'status' => 'Start'
    ], " `id` = '$id_order' ");
    if($update){
        $return['status'] = true;
        $return['error'] = false;
        $return['message'] = 'Duyệt thành công';
        die(json_encode($return));
    }else{
        $return['status'] = false;
        $return['error'] = true;
        $return['message'] = 'Đã xảy ra lỗi';
        die(json_encode($return));
    }
}