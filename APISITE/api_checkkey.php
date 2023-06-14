<?php require_once('../config/function.php');
$keysite = check_string($_GET['keysite']);
$keyuser = check_string($_GET['keyuser']);
$domain = check_string($_GET['domain']);
$ip = check_string($_GET['ip']);


$checkky = $NHQ->get_row("SELECT * FROM `list_sitecon` WHERE `token` = '$keysite' AND `domain` = '$domain'");
// $checkuky = $NHQ->get_row("SELECT * FROM `users` WHERE `token` = '$keyuser'");
if($checkky){
    $checkuky = $NHQ->get_row("SELECT * FROM `users` WHERE `token` = '$keyuser'");
    if($checkuky){
        if($checkuky['username'] == $checkky['username']){
            $return['status'] = true;
            $return['message'] = 'Key active đang hoạt động';
            $return['domain'] = $domain;
            die(json_encode($return));
        }else{
            $return['status'] = false;
            $return['message'] = 'Key active này không phải của bạn';
            $return['domain'] = $domain;
            die(json_encode($return));
        }
    }else{
        $return['status'] = false;
        $return['message'] = 'Token thành viên của bạn không tồn tại';
        $return['domain'] = $domain;
        die(json_encode($return));
    }
}else{
    $return['status'] = false;
    $return['message'] = 'Key active không tồn tại trên hệ thống';
    $return['domain'] = $domain;
    die(json_encode($return));
}