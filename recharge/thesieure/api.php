<?php require_once('../../config/function.php');
include_once 'simple_html_dom.php'; // Gọi Class Html Dom 

Class TheSieuRe {
   
  public function Login() {
       
        $ch = curl_init();
        curl_setopt_array($ch, array(
        CURLOPT_URL => "https://thesieure.com/account/login",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_COOKIEFILE => "cookie.txt",
        CURLOPT_COOKIEJAR => "cookie.txt"
             ));
        $exec = curl_exec($ch);
        $_csrf_token = str_get_html($exec) -> find("input[name=_token]", 0) -> value;
        curl_close($ch);
        
        
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://thesieure.com/account/login",
            CURLOPT_COOKIEJAR => "cookie.txt",
            CURLOPT_COOKIEFILE => "cookie.txt",
            CURLOPT_CONNECTTIMEOUT => 30,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_FOLLOWLOCATION => 1,
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => "phoneOrEmail=".$this->username."&password=".$this->password."&_token=".$_csrf_token,
            CURLINFO_HEADER_OUT => true
         ));
        $exec = curl_exec($curl);
        $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        if (strpos($exec, "<h4>Đăng nhập tài khoản</h4>") !== false) {
           return json_encode(array("status" => "false", "msg" => "login fail"));
        }else {
           return json_encode(array("status" => "true", "msg" => "login success"));
        }}
  public function _Check_GD() {

    $this->Login(); // Đăng nhập
    
    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => "https://thesieure.com/wallet/transfer",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_COOKIEFILE => "cookie.txt",
        CURLOPT_COOKIEJAR => "cookie.txt"
         ));
    $exec = curl_exec($ch);
    curl_close($ch);
    $rs = str_get_html($exec);
    $lol =  $rs->find('tbody', 2);
    //echo $lol ;
    if($lol) {
        
        foreach($lol->find('tr') as $article) {
            $ma_GD = $article->find('td', 0)->plaintext;
            $so_tien = $article->find('td', 1);
            $txt_sotien = $so_tien->find('span', 0)->plaintext;
                $so_tien1 = str_replace('đ', '', $txt_sotien);
                $so_tien1 = str_replace(',', '', $so_tien1);
            $nguoinhan = $article->find('td', 2);
            $txtnguoinhan = $nguoinhan->find('span', 0)->plaintext;
            $ngaygui = $article->find('td', 3)->plaintext;
            $trangthai = $article->find('td', 4);
            $trangthaitxt = $trangthai->find('span', 0)->plaintext;
            $noidung = $article->find('td', 5)->plaintext;
            
            $_GD = array(
                "code" => $ma_GD,
                "money" => $so_tien1,
                "nguoinhan" => $txtnguoinhan,
                "status" => $trangthaitxt,
                "noidung" => $noidung,
                "thoigian" => $ngaygui
            );  
            
     
        }
        $trturn['status'] = true;
        $trturn['data'] = $_GD;
        return json_encode($trturn, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
    
    }else {
        return json_encode(array("status" => "false", "msg" => "login fail"));
}

}
  

  
} // End Classs



$nhquangtsr = new TheSieuRe;


$nhquangtsr->username = $NHQ->site('taikhoantsr');
$nhquangtsr->password = $NHQ->site('matkhautsr');
$nhquangtsr->code_GD = $code;
$nhquangtsr->user = $_GET['user'];
die($nhquangtsr->_Check_GD());
// unlink("cookie.txt");
