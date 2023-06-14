<?php require('../../../config/function.php');

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
    
    $link_post      = check_string($_POST['link_post']);
    $amount         = check_string($_POST['amount']);
    $note           = check_string($_POST['note']);
    $noye_cmt       = check_string($_POST['note_cmt']);
    
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
    
    
    $server_order   = check_string($_POST['server_order']);
    if(empty($server_order)){
        $return['status'] = false;
        $return['error'] = true;
        $return['message'] = 'Vui lòng chọn server order';
        die(json_encode($return));
    }else{
        $selectservice = $NHQ->get_row("SELECT * FROM `server_service` WHERE `code_service` = 'comment_sale' AND `status_service` = '1' AND `server_service` = '$server_order'");
        $ratesv = $selectservice['rate_service'];
    }
    
    if(empty($link_post)){
        $return['status'] = false;
        $return['error'] = true;
        $return['message'] = 'Vui lòng nhập link post';
        die(json_encode($return));
    }
    if(empty($amount)){
        $return['status'] = false;
        $return['error'] = true;
        $return['message'] = 'Vui lòng nhập số lượng muốn order';
        die(json_encode($return));
    }
    if($amount < 100){
        $return['status'] = false;
        $return['error'] = true;
        $return['message'] = 'Số lượng order phải lớn hơn 100';
        die(json_encode($return));
    }
    if(check_number($amount) != 1){
        $return['status'] = false;
        $return['error'] = true;
        $return['message'] = 'Số lượng order phải là một số.';
        die(json_encode($return));
    }
    
    if(empty($noye_cmt)){
        $return['status']  = false;
        $return['error']   = true;
        $return['message'] = 'Vui lòng nhập nội dung cần bình luận';
        die(json_encode($return));
    }
    
    $tongtien = $ratesv * $amount; // tính tiền
    
    if($checkusite['money'] < $tongtien){
        $return['status'] = false;
        $return['error'] = true;
        $return['message'] = 'Số coin của bạn không đủ để thực hiện giao dịch này';
        die(json_encode($return));
    }
    
    $token_site_con = check_string($_POST['token_sitecon']);
    $domain_site_con = check_string($_POST['domain_sitecon']);
    if(isset($getUser)){
        $hinhthuc_buff = 'LOGIN WEB';
    }elseif(isset($api_token)){
        $hinhthuc_buff = 'POST API';
    }elseif(isset($token_site_con)){
        $checksitetoken = $NHQ->get_row(" SELECT * FROM `users` WHERE `token` = '$api_token' AND `token_sitecon` = '$token_site_con' AND `domain_sitecon` = '$domain_site_con' ");
        if(!$checksitetoken){
            $return['status'] = false;
            $return['error'] = true;
            $return['message'] = 'Site con này chưa được kích hoạt';
            die(json_encode($return));
        }
        $hinhthuc_buff = 'API SITE CON';
        
    }else{
        $hinhthuc_buff = 'BUFF BAN';
    }
    
    $pay_coinu = $checkusite['money'] - $tongtien; // trừ tiền
    $utongtru = $checkusite['tongtru'] + $tongtien; // ghi lại tổng tiền đã tiêu
    $code_order = 'ORDER_'.random('QWERTYUIOPASDFGHJKLZXCVBNM1234567890',10).rand(0,99999);
    
        $create = $NHQ->insert("history_buft", [
            'type'          => 'comment_sale',
            'username'      => $checkusite['username'],
            'hinhthuc_buff' => $hinhthuc_buff,
            'soluong'       => $amount,
            'tong_tien'     => $tongtien,
            'link_buft'     => $link_post,
            'server_buft'   => $server_order,
            'note_buft'     => $note,
            'noye_cmt'      => $noye_cmt,
            'status'        => 'Pendding',
            'da_buft'       => 0,
            'ma_gd'         => $code_order,
            'date'          => gettime()
        ]);
        
        if($create){
           apitele('tangsub.vn bạn có đơn hàng chưa xử lý buff cmt sale của '.$checkusite['username'].' 
           link buff: '.$link_post.'
           số lượng: '.$amount.'
           nội dung cmt: '.$noye_cmt.'
           lời nhắn riêng: '.$note.'
           tổng tiền: '.number_format($tongtien).'đ
               ');
            $update = $NHQ->update("users", [
                'money' => $pay_coinu,
                'tongtru' => $utongtru
            ], " `username` = '".$checkusite['username']."' ");
            if($update){
                $ghilog = $NHQ->insert("log_site", [
                'note'          => $checkusite['username'].' sử dụng buff comment_sale với giá tiền '.$tongtien.' vào lúc '.gettime().'',
                'ip'            => getip(),
                'date'          => gettime()
                ]);

                
                
                $return['status'] = true;
                $return['code_order'] = $code_order;
                $return['message']   = "Thêm đơn thành công ok";
                die(json_encode($return));
            }else{
                $return['status'] = false;
                $return['message']   = "Lỗi hệ thống";
                die(json_encode($return));
            }
        }else{
            $return['status'] = false;
            $return['message']   = "Lỗi hệ thống";
            die(json_encode($return));
        }
    
    
    
    // $return['status'] = true;
    // $return['error'] = false;
    // $return['message'] = $ratesv;
    // die(json_encode($return));
}