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
    /**** choose the appropriate page to redirect users graphhcaptcha($rescaptcha) ****/

}else{
    if(empty($_REQUEST['h-captcha-response'])){
        $return['status'] = false;
        $return['error'] = true;
        $return['data'] = '<div class="alert alert-danger text-center" role="alert"><strong>Vui lòng xác nhận captcha!</strong></div>';
        $return['message']   = 'error_captcha_paramter!';
        die(json_encode($return));
    }else{
    
    if(empty(check_string($_POST['name'])) || empty(check_string($_POST['email'])) || empty(check_string($_POST['username'])) || empty(check_string($_POST['password']))){
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
                $return['data'] = '<div class="alert alert-danger text-center" role="alert"><strong>Vui lòng nhập định dạng tài khoản hợp lệ!</strong></div>';
                $return['message']   = 'Vui lòng nhập định dạng tài khoản hợp lệ !';
                die(json_encode($return));
            }else{
                if(strlen(check_string($_POST['username'])) < 6 || strlen(check_string($_POST['username'])) > 12)
                {
                    $return['status'] = false;
                    $return['error'] = true;
                    $return['data'] = '<div class="alert alert-danger text-center" role="alert"><strong>Vui lòng nhập tài khoản từ 6 đến 12 ký tự !</strong></div>';
                    $return['message']   = 'Vui lòng nhập tài khoản từ 6 đến 12 ký tự !';
                    die(json_encode($return));
                }else{
                    if($NHQ->get_row(" SELECT * FROM `users` WHERE `username` = '".check_string($_POST['username'])."' "))
                    {
                        $return['status'] = false;
                        $return['error'] = true;
                        $return['data'] = '<div class="alert alert-danger text-center" role="alert"><strong>Tên đăng nhập đã tồn tại trên hệ thống!</strong></div>';
                        $return['message']   = 'Tên đăng nhập đã tồn tại trên hệ thống !';
                        die(json_encode($return));
                    }else{
                        if(check_email(check_string($_POST['email'])) == false)
                        {
                            $return['status'] = false;
                            $return['error'] = true;
                            $return['data'] = '<div class="alert alert-danger text-center" role="alert"><strong>Vui lòng nhập định dạng email hợp lệ!</strong></div>';
                            $return['message']   = 'Vui lòng nhập định dạng email hợp lệ !';
                            die(json_encode($return));
                        }else{
                            if($NHQ->get_row(" SELECT * FROM `users` WHERE `email` = '".check_string($_POST['email'])."' "))
                            {
                                $return['status'] = false;
                                $return['error'] = true;
                                $return['data'] = '<div class="alert alert-danger text-center" role="alert"><strong>Email đã tồn tại trên hệ thống !</strong></div>';
                                $return['message']   = 'Email đã tồn tại trên hệ thống !';
                                die(json_encode($return));
                            }else{
                                if($NHQ->num_rows(" SELECT * FROM `users` WHERE `ip` = '".getip()."' ") >= 1)
                                {
                                    $return['status'] = false;
                                    $return['error'] = true;
                                    $return['data'] = '<div class="alert alert-danger text-center" role="alert"><strong>Bạn đã bị giới hạn tạo tài khoản, vui lòng liên hệ admin để khôi phục lại!</strong></div>';
                                    $return['message']   = 'error_code_spam';
                                    die(json_encode($return));
                                }else{
                                    if(graphhcaptcha($_REQUEST['h-captcha-response'])->success == false){
                                        $return['status'] = false;
                                        $return['error'] = true;
                                        $return['data'] = '<div class="alert alert-danger text-center" role="alert"><strong>Captcha không chính xác!</strong></div>';
                                        $return['message']   = 'error_captcha_paramter!';
                                        die(json_encode($return));
                                    }else{
                                    
                                    
                                    if($NHQ->get_row(" SELECT * FROM `users` WHERE `cuphap` = '".$NHQ->site('cuphap').rand(0,9999)."' "))
                                    {
                                        $cuphapnap = $NHQ->site('cuphap').rand(9999,99999);
                                    }
                                    else
                                    {
                                        $cuphapnap = $NHQ->site('cuphap').rand(0,9999);
                                    }
                                
                                    $create = $NHQ->insert("users", [
                                        'username'      => xoa_dau(check_string($_POST['username'])),
                                        'name'          => check_string($_POST['name']),
                                        'email'         => check_string($_POST['email']),
                                        'password'      => typepass(check_string($_POST['password'])),
                                        'token'         => typepass(random('qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890', 100)),
                                        'capbac'        => 0,
                                        'money'         => 0,
                                        'tongnap'       => 0,
                                        'tongtru'       => 0,
                                        'banned'        => 0,
                                        'ip'            => getip(),
                                        'cuphap'        => $cuphapnap,
                                        'date'          => gettime()
                                    ]);
                                    
                                    if($create){
                                        
                                        $ghilog = $NHQ->insert("log_site", [
                                            'note'          => xoa_dau(check_string($_POST['username'])).' vừa đăng ký tài khoản vào lúc '.gettime().'',
                                            'ip'            => getip(),
                                            'date'          => gettime()
                                            ]);
                                            
                                        $_SESSION['username'] = xoa_dau(check_string($_POST['username']));
                                        
                                        $return['status'] = true;
                                        $return['error'] = false;
                                        $return['data'] = '<div class="alert alert-success text-center" role="alert"><strong>Đăng ký thành công, chuyển hướng sau 1s!</strong></div>';
                                        $return['message']   = 'Đăng ký thành công';
                                        die(json_encode($return));
                                    }else{
                                        $return['status'] = false;
                                        $return['error'] = true;
                                        $return['data'] = '<div class="alert alert-danger text-center" role="alert"><strong>Đã xảy ra lỗi khi đăng ký, vui lòng liên hệ admin!</strong></div>';
                                        $return['message']   = 'Đã xảy ra lỗi khi đăng ký, vui lòng liên hệ admin';
                                        die(json_encode($return));
                                    }
                                }
                            }
                            }
                        }
                        
                    }
        
                }
        
            }
        
        }
    }
    }
}