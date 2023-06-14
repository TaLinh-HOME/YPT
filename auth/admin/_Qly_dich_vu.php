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
    
    $id         = check_string($_POST['id']);
    $key        = check_string($_POST['key']);
    $type       = check_string($_POST['type']);
    
    $api_token = api_token();
    $checkusite = $NHQ->get_row(" SELECT * FROM `users` WHERE `token` = '$api_token' ");
    
    if(empty($api_token)){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Thiếu API Token";
        die(json_encode($return));
    }elseif(!$checkusite){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "API Token không hợp lệ";
        die(json_encode($return));
    }elseif($checkusite['level'] != 'admin' || $checkusite['capbac'] != 3){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "error_level";
        die(json_encode($return));
    }else{
        $selectservice = $NHQ->get_row("SELECT * FROM `server_service` WHERE `id` = '$id' ");
    
        if($key != $selectservice['key_service']){
            $return['status'] = false;
            $return['message']   = "Không tìm thấy dịch vụ này";
            die(json_encode($return));
        }elseif($type == 'tatsv'){
            
            $update = $NHQ->update("server_service", [
                'status_service' => '0'
            ], " `key_service` = '$key' ");
            if($update){
                $return['status'] = true;
                $return['message']   = "Đã tắt server $id";
                die(json_encode($return));
            }else{
                $return['status'] = false;
                $return['message']   = "Lỗi hệ thống, vui lòng liên hệ admin";
                die(json_encode($return));
            }
            
        }elseif($type == 'batsv'){
            $update2 = $NHQ->update("server_service", [
                'status_service' => '1'
            ], " `key_service` = '$key' ");
            if($update2){
                $return['status'] = true;
                $return['message']   = "Đã bật server $id";
                die(json_encode($return));
            }else{
                $return['status'] = false;
                $return['message']   = "Lỗi hệ thống, vui lòng liên hệ admin";
                die(json_encode($return));
            }
        }elseif($type == 'xoasv'){
            $remocve = $NHQ->remove("server_service", "`key_service` = '$key'");
            if($remocve){
                $return['status'] = true;
                $return['message']   = "Đã xóa server $id";
                die(json_encode($return));
            }else{
                $return['status'] = false;
                $return['message']   = "Lỗi hệ thống, vui lòng liên hệ admin";
                die(json_encode($return));
            }
            
        }else{
            #notthinghere
        }
    }
    
    
    
    
    
    
}