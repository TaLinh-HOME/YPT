<?php require_once('../../config/function.php');

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://localhost/api/api_money/the-sieu-re',
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
$result = json_decode($response)->data;

$check = $NHQ->get_row("SELECT * FROM `history_naptien` WHERE `tranid` = '".$result->code."'");

if(!$check){
    $create = $NHQ->insert("history_naptien", [
        'type'          => 'napthesieure',
        'username'      => $result->noidung,
        'loaithe'       => 'thesieure',
        'menhgia'       => $result->money,
        'sothe'         => '',
        'soseri'        => '',
        'thucnhan'      => 0,
        'trangthai'     => 1,
        'date'          => date('H:i:s d-m-Y'),
        'tranid'        => $result->code
    ]);
    
    if($create){
        $update2= $NHQ->cong("users", "money", $result->money, " `cuphap` = '$result->noidung' ");
        $update3= $NHQ->cong("users", "tongnap", $result->money, " `cuphap` = '$result->noidung' ");
    }
}
print_r($result);