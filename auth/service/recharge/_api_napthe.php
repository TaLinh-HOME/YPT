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
    
    $NetworkCode        = check_string($_POST['NetworkCode']);
    $PricesExchange     = check_string($_POST['PricesExchange']);
    $SeriCard           = check_string($_POST['SeriCard']);
    $NumberCard         = check_string($_POST['NumberCard']);
    
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
    
    if(empty($NetworkCode)){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Bạn chưa chọn loại thẻ";
        die(json_encode($return));
    }else{
        if(empty($PricesExchange)){
            $return['status'] = false;
            $return['error'] = true;
            $return['message']   = "Bạn chưa chọn mệnh giá";
            die(json_encode($return));
        }else{
            if(empty($SeriCard)){
                $return['status'] = false;
                $return['error'] = true;
                $return['message']   = "Vui lòng nhập số seri";
                die(json_encode($return));
            }else{
                if(empty($NumberCard)){
                    $return['status'] = false;
                    $return['error'] = true;
                    $return['message']   = "Vui lòng nhập mã số thẻ";
                    die(json_encode($return));
                }else{
                    $tranid = rand(100000000, 999999999);
                    
                    if($NHQ->site('site_napthe') == 'cardvip'){
                        $resultcardvip = cardvip($NetworkCode, $PricesExchange, $NumberCard, $SeriCard, $tranid, $NHQ->site('partner_key'), $callback_cardvip);
                        if($resultcardvip['status'] == 200){
                            $create = $NHQ->insert("history_naptien", [
                            'type'          => 'napthe',
                            'username'      => $checkusite['username'],
                            'loaithe'       => $NetworkCode,
                            'menhgia'       => $PricesExchange,
                            'sothe'         => $NumberCard,
                            'soseri'        => $SeriCard,
                            'thucnhan'      => 0,
                            'trangthai'     => 0,
                            'date'          => gettime(),
                            'tranid'        => $tranid
                            ]);
                
                            if($create){
                                $ghilog = $NHQ->insert("log_site", [
                                'note'          => $checkusite['username'].' vừa nạp thẻ '.$NetworkCode.' với mệnh giá '.$tongtien.' vào lúc '.gettime().'',
                                'ip'            => getip(),
                                'date'          => gettime()
                                ]);
                                $return['status']    = true;
                                $return['error']     = false;
                                $return['tranid']    = $tranid;
                                $return['message']   = "Nạp thẻ thành công";
                                die(json_encode($return));
                                
                            }else{
                                $return['status'] = false;
                                $return['error'] = true;
                                $return['message']   = "Lỗi hệ thống";
                                die(json_encode($return));
                            }
                        }else{
                            $return['status'] = false;
                            $return['error'] = true;
                            $return['message']   = $resultcardvip['message'];
                            die(json_encode($return));
                        }
                    }
                    if($NHQ->site('site_napthe') == 'trumthe'){
                        $resulttrumthe = trumthe($NetworkCode, $PricesExchange, $NumberCard, $SeriCard, $tranid, $NHQ->site('partner_id'), $NHQ->site('partner_key'));
                        if($resulttrumthe['status'] == 99){
                            $create = $NHQ->insert("history_naptien", [
                            'type'          => 'napthe',
                            'username'      => $checkusite['username'],
                            'loaithe'       => $NetworkCode,
                            'menhgia'       => $PricesExchange,
                            'sothe'         => $NumberCard,
                            'soseri'        => $SeriCard,
                            'thucnhan'      => 0,
                            'trangthai'     => 0,
                            'date'          => time(),
                            'tranid'        => $tranid
                            ]);
                
                            if($create){
                                $ghilog = $NHQ->insert("log_site", [
                                'note'          => $checkusite['username'].' vừa nạp thẻ '.$NetworkCode.' với mệnh giá '.$tongtien.' vào lúc '.gettime().'',
                                'ip'            => getip(),
                                'date'          => gettime()
                                ]);
                                $return['status']    = true;
                                $return['error']     = false;
                                $return['tranid']    = $tranid;
                                $return['message']   = "Nạp thẻ thành công";
                                die(json_encode($return));
                            }else{
                                $return['status'] = false;
                                $return['error'] = true;
                                $return['message']   = "Lỗi hệ thống";
                                die(json_encode($return));
                            }
                        }else{
                            $return['status'] = false;
                            $return['error'] = true;
                            $return['message']   = $resulttrumthe['message'];
                            die(json_encode($return));
                        }
                    }
                    if($NHQ->site('site_napthe') == 'thesieure'){
                        $resultthesieure = thesieure($NetworkCode, $PricesExchange, $NumberCard, $SeriCard, $tranid, $NHQ->site('partner_id'), $NHQ->site('partner_key'));
                        if($resultthesieure['status'] == 99){
                            $create = $NHQ->insert("history_naptien", [
                            'type'          => 'napthe',
                            'username'      => $checkusite['username'],
                            'loaithe'       => $NetworkCode,
                            'menhgia'       => $PricesExchange,
                            'sothe'         => $NumberCard,
                            'soseri'        => $SeriCard,
                            'thucnhan'      => 0,
                            'trangthai'     => 0,
                            'date'          => time(),
                            'tranid'        => $tranid
                            ]);
                
                            if($create){
                                $ghilog = $NHQ->insert("log_site", [
                                'note'          => $checkusite['username'].' vừa nạp thẻ '.$NetworkCode.' với mệnh giá '.$tongtien.' vào lúc '.gettime().'',
                                'ip'            => getip(),
                                'date'          => gettime()
                                ]);
                                $return['status']    = true;
                                $return['error']     = false;
                                $return['tranid']    = $tranid;
                                $return['message']   = "Nạp thẻ thành công";
                                die(json_encode($return));
                            }else{
                                $return['status'] = false;
                                $return['error'] = true;
                                $return['message']   = "Lỗi hệ thống";
                                die(json_encode($return));
                            }
                        }else{
                            $return['status'] = false;
                            $return['error'] = true;
                            $return['message']   = $resultthesieure['message'];
                            die(json_encode($return));
                        }
                    }
                }
            }
        }
    }
    
    
    
    // $return['status'] = true;
    //                 $return['error'] = false;
    //                 $return['message']   = "Nạp thẻ thành công";
    //                 die(json_encode($return));
    
    
}