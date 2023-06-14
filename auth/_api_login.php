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
    if(empty(check_string($_POST['username'])) || empty(check_string($_POST['password']))){
        $return['status'] = false;
        $return['error'] = true;
        $return['data'] = '<div class="alert alert-danger text-center" role="alert"><strong>Vui lòng nhập đầy đủ các trường còn thiếu!</strong></div>';
        $return['message']   = 'Vui lòng nhập đầy đủ các trường còn thiếu!';
        die(json_encode($return));
    }else{
        if(check_string($_POST['_token']) != x_csrf_token()){
            $return['status'] = false;
            $return['error'] = true;
            $return['data'] = '<div class="alert alert-danger text-center" role="alert"><strong>Lỗi cookie, vui lòng load lại trang!</strong></div>';
            $return['message']   = 'error_request_response';
            die(json_encode($return));
        }else{
            if(check_username(check_string($_POST['username'])) == false)
            {
                $return['status'] = false;
                $return['error'] = true;
                $return['data'] = '<div class="alert alert-danger text-center" role="alert"><strong>Định dạng tài khoản không hợp lệ!</strong></div>';
                $return['message']   = 'Vui lòng nhập định dạng tài khoản hợp lệ !';
                die(json_encode($return));
            }else{
                if(!$NHQ->get_row(" SELECT * FROM `users` WHERE `username` = '".check_string($_POST['username'])."' "))
                {
                    $return['status'] = false;
                    $return['error'] = true;
                    $return['data'] = '<div class="alert alert-danger text-center" role="alert"><strong>Tên đăng nhập không tồn tại!</strong></div>';
                    $return['message']   = 'Tên đăng nhập không tồn tại!';
                    die(json_encode($return));
                }else{
                    $checkuseriui = $NHQ->get_row(" SELECT * FROM `users` WHERE `username` = '".check_string($_POST['username'])."' AND `password` = '".check_string(typepass($_POST['password']))."' ");
                    if(!$checkuseriui)
                    {
                        $return['status'] = false;
                        $return['error'] = true;
                        $return['data'] = '<div class="alert alert-danger text-center" role="alert"><strong> Mật khẩu bạn nhập không chính xác!</strong></div>';
                        $return['message']   = 'Mật khẩu bạn nhập không chính xác!';
                        die(json_encode($return));
                    }else{
                        if($NHQ->get_row(" SELECT * FROM `users` WHERE `username` = '".check_string($_POST['username'])."' AND `banned` > '1' ")){
                            $return['status'] = false;
                            $return['error'] = true;
                            $return['data'] = '<div class="alert alert-danger text-center" role="alert"><strong>Bạn đã bị block vì vi phạm chính sách cộng đồng của chúng tôi!</strong></div>';
                            $return['message']   = 'Bạn đã bị block vì vi phạm chính sách cộng đồng của chúng tôi!';
                            die(json_encode($return));
                        }else{
                            $remember = check_string($_POST['remember']);
                            if($remember == 'on'){
                                
                            }
                            
                            $NHQ->update("users", [
                            'otp' => NULL,
                            'lastdate' => gettime()
                            ], " `username` = '".check_string($_POST['username'])."' ");
                            
                            $_SESSION['username'] = check_string($_POST['username']);
                            // $_SESSION['money'] = $checkuseriui['money'];
                            $ghilog = $NHQ->insert("log_site", [
                                'note'          => check_string($_POST['username']).' vừa đăng nhập thành công vào lúc '.gettime().'',
                                'ip'            => getip(),
                                'date'          => gettime()
                                ]);
                            
                            $return['status'] = true;
                            $return['error'] = false;
                            $return['data'] = '<div class="alert alert-success text-center" role="alert"><strong>Đăng nhập thành công!</strong></div>';
                            $return['message']   = 'Đăng nhập thành công!';
                            die(json_encode($return));
                        }
                    }
                }
            }
        }
    }
}