<?php require('../../config/function.php');

if ( $_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
    /****
       Up to you which header to send, some prefer 403 even if 
       the files does exist for security
    ****/
    /**** header( 'HTTP/1.0 403 Not Found', TRUE, 403 ); ****/
    /**** include('403.html'); ****/
    include('../../pages/error405.php');
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
    
    if(check_string($_POST['urluid']) != ''){
        $getrequest = findidfb(check_string($_POST['urluid']));
            if(preg_match('#<b>(.+?)</b>#is', $getrequest, $quanghai)){
            $return['status']   = true;
            $return['data']     = $quanghai[1];
            $return['message']  = 'Get thành công';
            return(json_decode(json_encode($return)));
            }else{
                $return['status']   = false;
                $return['data']     = NULL;
                $return['message']  = 'Không tìm thấy UID';
                return(json_decode(json_encode($return)));
            }
    }else{
        $return['status']   = false;
        $return['message']  = 'Vui lòng nhập link facebook cần lấy uid';
        return(json_decode(json_encode($return)));
    }
}