<?php
include $_SERVER['DOCUMENT_ROOT'].'/config/config.php';
/* <!-- Design by Nguyễn Hải Quang/facebook: https://facebook.com/quang.hai.uda77/zalo: 0359917579/3.x [XR&CO'2021], Tue, 2 Aug 2021 11:19:24 GMT --> */
$NHQ = new NHQ;
// $base_url = $NHQ->site('base_url');
$base_url = 'https://'.$_SERVER['SERVER_NAME'].'/';
$callback_cardvip = $NHQ->site('base_url').'api/callback_cardvip.php';

function apitele($message){
    return curl_get('https://api.telegram.org/bot1893429274:AAEvRFitx7nF88_W8IFt3U6_o3ZTvAvVf6g/sendMessage?chat_id=@tangsub&text='.urlencode($message).'');
}

function format_date($time){
    return date("d-m-Y H:i:s", $time);
}
function format_money($number){
    return number_format($number);
}
/*End huy hiệu và cấp thành viên*/

function levelmem($number){
    if($number == 0){
        return 'Thành viên';
    }elseif($number == 1){
        return 'Cộng tác viên';
    }elseif($number == 2){
        return 'Đại lý';
    }elseif($number == 3){
        return 'Admin';
    }else{
        #
    }
}
/* <!-- Design by Nguyễn Hải Quang/facebook: https://facebook.com/quang.hai.uda77/zalo: 0359917579/3.x [XR&CO'2021], Tue, 2 Aug 2021 11:19:24 GMT --> */
function sitenapthe($sitenap){
    if($sitenap == 'cardvip'){
        return 'Cardvip.vn';
    }elseif($sitenap == 'trumthe'){
        return 'Trumthe.vn';
    }elseif($sitenap == 'thesieure'){
        return 'Thesieure.com';
    }else{
        return 'Chưa xác định';
    }
}

function sttservice($number){
    if($number == '0'){
        return '<button type="button" class="btn btn-danger btn-sm">Bảo trì</button>';
    }elseif($number == '1'){
        return '<button type="button" class="btn btn-success btn-sm">Hoạt động</button>';
    }elseif($number == '2'){
        return '<button type="button" class="btn btn-warning btn-sm">Bảo trì</button>';
    }else{
        return 'Chưa xác định';
    }
}
/* <!-- Design by Bùi Văn Quyết/facebook: https://www.facebook.com/Bui.Van.Quyet.Vo.Dich.Thien.Ha.Can.All//zalo: 0846745505/3.x [XR&CO'2021], Tue, 2 Aug 2021 11:19:24 GMT --> */
function statusorder($number){
    if($number == 'Success'){
        return '<button type="button" class="btn btn-success btn-sm">Đã hoàn thành</button>';
    }elseif($number == 'Pause'){
        return '<button type="button" class="btn btn-danger btn-sm">Đã hủy</button>';
    }elseif($number == 'Report'){
        return '<button type="button" class="btn btn-warning btn-sm">Tạm dừng</button>';
    }elseif($number == 'Refund'){
        return '<button type="button" class="btn btn-success btn-sm">Đã hoàn tiền</button>';
    }elseif($number == 'Waiting'){
        return '<button type="button" class="btn btn-warning btn-sm">Chờ hủy</button>';
    }elseif($number == 'Expired'){
        return '<button type="button" class="btn btn-danger btn-sm">Đã hết hạn</button>';
    }elseif($number == 'CookieDie'){
        return '<button type="button" class="btn btn-danger btn-sm">Cookie die</button>';
    }elseif($number == 'ProxyError'){
        return '<button type="button" class="btn btn-warning btn-sm">Proxy lỗi</button>';
    }elseif($number == 'Pendding'){
        return '<button type="button" class="btn btn-warning btn-sm">Đang chờ</button>';
    }else{
        return '<button type="button" class="btn btn-info btn-sm">Đang hoạt động</button>';
    }
}
/* <!-- Design by Bùi Văn Quyết/facebook: https://www.facebook.com/Bui.Van.Quyet.Vo.Dich.Thien.Ha.Can.All//zalo: 0846745505/3.x [XR&CO'2021], Tue, 2 Aug 2021 11:19:24 GMT --> */
function statuscard($number){
    if($number == '0'){
        return '<button type="button" class="btn btn-warning btn-sm">Đang xử lý</button>';
    }elseif($number == '1'){
        return '<button type="button" class="btn btn-success btn-sm">Thẻ đúng</button>';
    }elseif($number == '2'){
        return '<button type="button" class="btn btn-danger btn-sm">Thẻ sai</button>';
    }else{
        return '<button type="button" class="btn btn-info btn-sm">Khác</button>';
    }
}

function sendCSM($mail_nhan,$ten_nhan,$chu_de,$noi_dung,$bcc)
{
    global $site_gmail, $site_pass;
        // PHPMailer Modify
        $mail = new PHPMailer();
        $mail->SMTPDebug = 0;
        $mail ->Debugoutput = "html";
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $site_gmail; // GMAIL STMP
        $mail->Password = $site_pass; // PASS STMP
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom($site_gmail, $bcc);
        $mail->addAddress($mail_nhan, $ten_nhan);
        $mail->addReplyTo($site_gmail, $bcc);
        $mail->isHTML(true);
        $mail->Subject = $chu_de;
        $mail->Body    = $noi_dung;
        $mail->CharSet = 'UTF-8';
        $send = $mail->send();
        return $send;
}
/* <!-- Design by Bùi Văn Quyết/facebook: https://www.facebook.com/Bui.Van.Quyet.Vo.Dich.Thien.Ha.Can.All//zalo: 0846745505/3.x [XR&CO'2021], Tue, 2 Aug 2021 11:19:24 GMT --> */
function BASE_URL($url)
{
    global $base_url;
    return $base_url.$url;
}

function gettime()
{
    return date('d-m-Y H:i:s', time());
}
function check_string($data)
{
    return (trim(htmlspecialchars(addslashes($data))));
}
function format_cash($price)
{
    return str_replace(",", ".", number_format($price));
}
function curl_get($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($ch);
    
    curl_close($ch);
    return $data;
}
function random($string, $int)
{  
    return substr(str_shuffle($string), 0, $int);
}
function check_img($img)
{
    $filename = $_FILES[$img]['name'];
    $ext = explode(".", $filename);
    $ext = end($ext);
    $valid_ext = array("png","jpeg","jpg","PNG","JPEG","JPG","gif","GIF");
    if(in_array($ext, $valid_ext))
    {
        return true;
    }
}
/* <!-- Design by Bùi Văn Quyết/facebook: https://www.facebook.com/Bui.Van.Quyet.Vo.Dich.Thien.Ha.Can.All//zalo: 0846745505/3.x [XR&CO'2021], Tue, 2 Aug 2021 11:19:24 GMT --> */
function XoaDauCach($text)
{
    return trim(preg_replace('/\s+/',' ', $text));
}

function getHeader(){
    $headers = array();
    $copy_server = array(
        'CONTENT_TYPE'   => 'Content-Type',
        'CONTENT_LENGTH' => 'Content-Length',
        'CONTENT_MD5'    => 'Content-Md5',
    );
    foreach ($_SERVER as $key => $value) {
        if (substr($key, 0, 5) === 'HTTP_') {
            $key = substr($key, 5);
            if (!isset($copy_server[$key]) || !isset($_SERVER[$key])) {
                $key = str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', $key))));
                $headers[$key] = $value;
            }
        } elseif (isset($copy_server[$key])) {
            $headers[$copy_server[$key]] = $value;
        }
    }
    if (!isset($headers['Authorization'])) {
        if (isset($_SERVER['REDIRECT_HTTP_AUTHORIZATION'])) {
            $headers['Authorization'] = $_SERVER['REDIRECT_HTTP_AUTHORIZATION'];
        } elseif (isset($_SERVER['PHP_AUTH_USER'])) {
            $basic_pass = isset($_SERVER['PHP_AUTH_PW']) ? $_SERVER['PHP_AUTH_PW'] : '';
            $headers['Authorization'] = 'Basic ' . base64_encode($_SERVER['PHP_AUTH_USER'] . ':' . $basic_pass);
        } elseif (isset($_SERVER['PHP_AUTH_DIGEST'])) {
            $headers['Authorization'] = $_SERVER['PHP_AUTH_DIGEST'];
        }
    }
    return $headers;
}

function check_username($data)
{
    if (preg_match('/^[a-zA-Z0-9_-]{3,16}$/', $data, $matches))
    {
        return true;
    }
    else
    {
        return false;
    }
}
function check_email($data)
{
    if (preg_match('/^.+@.+$/', $data, $matches))
    {
        return true;
    }
    else
    {
        return false;
    }
}
function check_phone($data)
{
    if (preg_match('/^\+?(\d.*){3,}$/', $data, $matches))
    {
        return true;
    }
    else
    {
        return false;
    }
}
function check_number($data)
{
    return is_numeric($data);
}
function check_url($url)
{
    $c = curl_init();
    curl_setopt($c, CURLOPT_URL, $url);
    curl_setopt($c, CURLOPT_HEADER, 1);
    curl_setopt($c, CURLOPT_NOBODY, 1);
    curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($c, CURLOPT_FRESH_CONNECT, 1);
    if(!curl_exec($c))
    {
        return false;
    }
    else
    {
        return true;
    }
}
function check_zip($img)
{
    $filename = $_FILES[$img]['name'];
    $ext = explode(".", $filename);
    $ext = end($ext);
    $valid_ext = array("zip","ZIP");
    if(in_array($ext, $valid_ext))
    {
        return true;
    }
}

function typepass($string)
{
    return base64_encode(urlencode(md5(urlencode(base64_encode(base64_encode(md5(md5(md5(md5(base64_encode(md5(base64_encode(md5(base64_encode(json_encode(array("user"=>base64_encode($string), "admin"=>"Nguyễn Hải Quang", "kieumahoa"=>"dangmahoavippro")))))))))))))))));
}
function phantrang($url, $start, $total, $kmess)
{
    $out[] = '<nav aria-label="Page navigation example"><ul class="pagination pagination-lg">';
    $neighbors = 2;
    if ($start >= $total) $start = max(0, $total - (($total % $kmess) == 0 ? $kmess : ($total % $kmess)));
    else $start = max(0, (int)$start - ((int)$start % (int)$kmess));
    $base_link = '<li class="page-item"><a class="page-link" href="' . strtr($url, array('%' => '%%')) . 'page=%d' . '">%s</a></li>';
    $out[] = $start == 0 ? '' : sprintf($base_link, $start / $kmess, '<i class="fas fa-angle-left"></i>');
    if ($start > $kmess * $neighbors) $out[] = sprintf($base_link, 1, '1');
    if ($start > $kmess * ($neighbors + 1)) $out[] = '<li class="page-item"><a class="page-link">...</a></li>';
    for ($nCont = $neighbors;$nCont >= 1;$nCont--) if ($start >= $kmess * $nCont) {
        $tmpStart = $start - $kmess * $nCont;
        $out[] = sprintf($base_link, $tmpStart / $kmess + 1, $tmpStart / $kmess + 1);
    }
    $out[] = '<li class="page-item active"><a class="page-link">' . ($start / $kmess + 1) . '</a></li>';
    $tmpMaxPages = (int)(($total - 1) / $kmess) * $kmess;
    for ($nCont = 1;$nCont <= $neighbors;$nCont++) if ($start + $kmess * $nCont <= $tmpMaxPages) {
        $tmpStart = $start + $kmess * $nCont;
        $out[] = sprintf($base_link, $tmpStart / $kmess + 1, $tmpStart / $kmess + 1);
    }
    if ($start + $kmess * ($neighbors + 1) < $tmpMaxPages) $out[] = '<li class="page-item"><a class="page-link">...</a></li>';
    if ($start + $kmess * $neighbors < $tmpMaxPages) $out[] = sprintf($base_link, $tmpMaxPages / $kmess + 1, $tmpMaxPages / $kmess + 1);
    if ($start + $kmess < $total)
    {
        $display_page = ($start + $kmess) > $total ? $total : ($start / $kmess + 2);
        $out[] = sprintf($base_link, $display_page, '<i class="fas fa-angle-right"></i>');
    }
    $out[] = '</ul></nav>';
    return implode('', $out);
}

function getip()
{
return $_SERVER['REMOTE_ADDR'];
}

function api_token() {
    $headers = array();
    foreach($_SERVER as $key => $value) {
        if (substr($key, 0, 5) <> 'HTTP_') {
            continue;
        }
        $header = str_replace(' ', '-', ucwords(str_replace('_', ' ', strtolower(substr($key, 5)))));
        $headers[$header] = $value;
    }
    return $headers['Api-Token'];
}
/* <!-- Design by Nguyễn Hải Quang/facebook: https://facebook.com/quang.hai.uda77/zalo: 0359917579/3.x [XR&CO'2021], Tue, 2 Aug 2021 11:19:24 GMT --> */
function x_csrf_token() {
    $headers = array();
    foreach($_SERVER as $key => $value) {
        if (substr($key, 0, 5) <> 'HTTP_') {
            continue;
        }
        $header = str_replace(' ', '-', ucwords(str_replace('_', ' ', strtolower(substr($key, 5)))));
        $headers[$header] = $value;
    }
    return $headers['X-Csrf-Token'];
}

function findidfb($urlfind){
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://findidfb.com/',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => array('url' => $urlfind),
      CURLOPT_HTTPHEADER => array(
        'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36',
        'origin: https://findidfb.com',
        'referer: https://findidfb.com/'
      ),
    ));
    
    $response = curl_exec($curl);
    
    curl_close($curl);
    return $response;
}
/* <!-- Design by Nguyễn Hải Quang/facebook: https://facebook.com/quang.hai.uda77/zalo: 0359917579/3.x [XR&CO'2021], Tue, 2 Aug 2021 11:19:24 GMT --> */
function graphhcaptcha($rescaptcha){
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://hcaptcha.com/siteverify?sitekey=9d821dbb-7d92-4089-94e6-e40b42a72867&secret=0x9Ef87F8b07AC003b648163B80F05463c146933fC&response=$rescaptcha",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
    ));
    
    $response = curl_exec($curl);
    
    curl_close($curl);
    // echo $response;
    return json_decode($response);
}

//xóa dấu tiếng việt, và chuyển chữ viết hoa
function xoa_dau($str=null)
{
	$str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
	$str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
	$str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
	$str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
	$str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
	$str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
	$str = preg_replace("/(đ)/", 'd', $str);
	$str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'a', $str);
	$str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ|E)/", 'e', $str);
	$str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'i', $str);
	$str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'o', $str);
	$str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ|U)/", 'u', $str);
	$str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ|Y)/", 'y', $str);
	$str = preg_replace("/(Đ)/", 'd', $str);
	$str = preg_replace("/(Q)/", 'q', $str);
	$str = preg_replace("/(R)/", 'r', $str);
	$str = preg_replace("/(T)/", 't', $str);
	$str = preg_replace("/(Y)/", 'y', $str);
	$str = preg_replace("/(I)/", 'i', $str);
	$str = preg_replace("/(O)/", 'o', $str);
	$str = preg_replace("/(P)/", 'p', $str);
	$str = preg_replace("/(A)/", 'a', $str);
	$str = preg_replace("/(S)/", 's', $str);
	$str = preg_replace("/(D)/", 'd', $str);
	$str = preg_replace("/(F)/", 'f', $str);
	$str = preg_replace("/(G)/", 'g', $str);
	$str = preg_replace("/(H)/", 'h', $str);
	$str = preg_replace("/(J)/", 'j', $str);
	$str = preg_replace("/(K)/", 'k', $str);
	$str = preg_replace("/(L)/", 'l', $str);
	$str = preg_replace("/(Z)/", 'z', $str);
	$str = preg_replace("/(X)/", 'x', $str);
	$str = preg_replace("/(C)/", 'c', $str);
	$str = preg_replace("/(V)/", 'v', $str);
	$str = preg_replace("/(B)/", 'b', $str);
	$str = preg_replace("/(N)/", 'n', $str);
	$str = preg_replace("/(M)/", 'm', $str);
	$str = preg_replace("/(W)/", 'w', $str);
	$str = preg_replace("/( )/", '', $str);
	return $str;
}

function cardvip($telCo, $amount, $pin, $serial, $requestId, $partner_key, $callback_cardvip){
    $dataPost = array(
        'APIKey' => $partner_key,
        'NetworkCode' => $telCo,
        'PricesExchange' => $amount,
        'NumberCard' => $pin,
        'SeriCard' => $serial,
        'IsFast' => 'true',
        'RequestId' => $requestId,
        'UrlCallback' => $callback_cardvip
    );
    
    $curl = curl_init();
    
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://partner.cardvip.vn/api/createExchange',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => json_encode($dataPost),
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json'
      ),
    ));
    
    $response = curl_exec($curl);

    curl_close($curl);
    $jsonData = json_decode($response, true);
    
    return $jsonData;
}
function minify_output($buffer) {
    $search = array(
        '/\>[^\S ]+/s',
        '/[^\S ]+\</s',
        '/(\s)+/s'
    );
    $replace = array(
        '>',
        '<',
        '\\1'
    );

    if (preg_match("/\<html/i", $buffer) == 1 && preg_match("/\<\/html\>/i", $buffer) == 1) {
        $buffer = preg_replace($search, $replace, $buffer);
    }

    return $buffer;
}
/* <!-- Design by Nguyễn Hải Quang/facebook: https://facebook.com/quang.hai.uda77/zalo: 0359917579/3.x [XR&CO'2021], Tue, 2 Aug 2021 11:19:24 GMT --> */
function trumthe($telCo, $amount, $pin, $serial, $requestId, $partner_id, $partner_key)
{
    $url = 'https://trumthe.vn/chargingws/v2?sign='.md5($partner_key.$pin.$serial).'&telco='.$telCo.'&code='.$pin.'&serial='.$serial.'&amount='.$amount.'&request_id='.$requestId.'&partner_id='.$partner_id.'&command=charging';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($ch);
    curl_close($ch);
    $jsonData = json_decode($data, true);
    return $jsonData;
}

function thesieure($telCo, $amount, $pin, $serial, $requestId, $partner_id, $partner_key)
{
    $url = 'https://thesieure.com/chargingws/v2?sign='.md5($partner_key.$pin.$serial).'&telco='.$telCo.'&code='.$pin.'&serial='.$serial.'&amount='.$amount.'&request_id='.$requestId.'&partner_id='.$partner_id.'&command=charging';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($ch);
    curl_close($ch);
    $jsonData = json_decode($data, true);
    return $jsonData;
}
/* <!-- Design by Nguyễn Hải Quang/facebook: https://facebook.com/quang.hai.uda77/zalo: 0359917579/3.x [XR&CO'2021], Tue, 2 Aug 2021 11:19:24 GMT --> */
class checkdomain{
    public function check($domain){
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://azdigivn.com/api/checkdomain',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => array('domain' => $domain),
        //   CURLOPT_HTTPHEADER => array(
        //     'Cookie: csrf-token=RjhsbpO6TpRC14Bm6YJGeh1wBTA8e6yYHDoC13; PHPSESSID=3b1de6db55a3b4bad835de2ec6772a0f'
        //   ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return json_decode($response);
    }
}