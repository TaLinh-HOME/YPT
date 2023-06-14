<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
include'config.php';
include 'simple_html_dom.php'; // Gọi Class Html Dom 


Class TheSieuRe {
  
  public $username, $password;
  public $code_GD;
  public $user;
   
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
    // echo $lol ;
    if($lol) {

                    
                    foreach($lol->find('tr') as $article) {
                    $ma_GD = $article->find('td', 0)->plaintext;
                    $so_tien = $article->find('td', 1);
                    $txt_sotien = $article->find('td', 1)->find('span', 0)->plaintext;
                    $nguoinhan = $article->find('td', 2)->find('span', 0)->plaintext;
                    $ngaygui = $article->find('td', 3)->plaintext;
                    $trangthai = $article->find('td', 4)->find('span', 0)->plaintext;
                    $noi_dung = $article->find('td', 5)->plaintext;
                        $so_tien1 = str_replace('đ', '', $so_tien);
                      $so_tien1 = explode('">', $so_tien1);
                      $so_tien1 = $so_tien1[1];
                      $so_tien1 = explode('</', $so_tien1);
                      $so_tien1 = $so_tien1[0];
                      $so_tien1 = str_replace(',', '', $so_tien1);
                      $so_tien1 = str_replace('-', '', $so_tien1);
                      $so_tien1 = intval($so_tien1);
                    $return2["magd"] = $ma_GD;
                    $return2["money"] = $so_tien1;
                    $return2["nguoinhan"] = $nguoinhan;
                    $return2["trangthai"] = $trangthai;
                    $return2["date"] = $ngaygui;
                    $return2["noi_dung"] = $noi_dung;
                    
               echo json_encode($return2);
                    
                    
                    
                    
                    
                    
//      $to9xvn_magd = htmlspecialchars($_GET['magd']);  
     
//   if($to9xvn_magd == $ma_GD){
    
//     $so_tien1 = str_replace('đ', '', $so_tien);
//   $so_tien1 = explode('">', $so_tien1);
//   $so_tien1 = $so_tien1[1];
//   $so_tien1 = explode('</', $so_tien1);
//   $so_tien1 = $so_tien1[0];
//   $so_tien1 = str_replace(',', '', $so_tien1);
//   $so_tien1 = intval($so_tien1);
//      $to9xvn_nd = htmlspecialchars($ngay_tao);   
    
      
//       echo '{"status":"1", "magd":"'.$ma_GD.'","tien":"'.$so_tien1.'","noidung":"'.$to9xvn_nd.'"}';
//       exit;
//   // echo $so_tien1;  
      
//   }else{
      
//      echo '{"status":"3", "msg":"Mã giao dịch không tồn tại!"}';
//      exit;
//   }
                    
                    
//print_r($_GD);

                }
    
        }else {
            return json_encode(array("status" => "2", "msg" => "Bạn chưa có lịch sử giao dịch nào"));
    }

  }
  

  
} // End Classs



$kun = new TheSieuRe;


$kun->username = $config['username'];
$kun->password = $config['password'];
$kun->code_GD = $code;
$kun->user = $_GET['user'];
echo $kun->_Check_GD(),JSON_UNESCAPED_UNICODE;
unlink("cookie.txt");
