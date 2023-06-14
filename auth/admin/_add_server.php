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
        $loaidv     = check_string($_POST['loaidv']);
        $server     = check_string($_POST['server']);
        $ratedv     = check_string($_POST['ratedv']);
        $title      = check_string($_POST['title']);
        
        if(empty($loaidv)){
            $return['status'] = false;
            $return['error'] = true;
            $return['message']   = "Vui lòng chọn loại dịch vụ";
            die(json_encode($return));
        }elseif(empty($server)){
            $return['status'] = false;
            $return['error'] = true;
            $return['message']   = "Vui lòng chọn server dịch vụ";
            die(json_encode($return));
        }elseif(empty($ratedv)){
            $return['status'] = false;
            $return['error'] = true;
            $return['message']   = "Vui lòng nhập rate dịch vụ";
            die(json_encode($return));
        }elseif(empty($title)){
            $return['status'] = false;
            $return['error'] = true;
            $return['message']   = "Vui lòng nhập tiêu đề dịch vụ";
            die(json_encode($return));
        }elseif($NHQ->get_row(" SELECT * FROM `server_service` WHERE `server_service` = '$server' AND `code_service` = '$loaidv' ")){
            $return['status'] = false;
            $return['error'] = true;
            $return['message']   = "Server $server đã tồn tại trên dịch vụ $loaidv";
            die(json_encode($return));
        }else{
            $create = $NHQ->insert("server_service", [
            'code_service'      => $loaidv,
            'server_service'    => $server,
            'rate_service'      => $ratedv,
            'title_service'     => $title,
            'key_service'       => md5($loaidv.$server),
            'status_service'    => 1,
            ]);
            
            if($create){
                $return['status'] = true;
                $return['message']   = "Thêm server $server vào dịch vụ $loaidv thành công";
                die(json_encode($return));
            }else{
                $return['status'] = false;
                $return['message']   = "Lỗi hệ thống, vui lòng liên hệ admin 0359917579";
                die(json_encode($return));
            }
        }
    }
    
    
    
    
    
    
}