<?php
session_start();
ob_start('minify_output');
date_default_timezone_set('Asia/Ho_Chi_Minh'); // Timezone VIET NAM <3
$authoradmin = '0359917579'; // Nếu bạn xóa dòng này, all web sẽ bị lỗi
$namews = $_SERVER['SERVER_NAME'];
error_reporting(0);
/* <!-- Design by Bùi Văn Quyết /facebook: https://www.facebook.com/Bui.Van.Quyet.Vo.Dich.Thien.Ha.Can.All//zalo: 0846745505/3.x [XR&CO'2021], Tue, 2 Aug 2021 11:19:24 GMT --> */
class NHQ
{
    private $ketnoi;
    function connect()
    {
        if (!$this->ketnoi)
        {
            $this->ketnoi = mysqli_connect('localhost', 'lequocda_die122', 'lequocda_die122', 'lequocda_die122') or die ('Hệ thống đang bảo trì, xin lỗi các bạn vì sự bất tiện này');
            mysqli_query($this->ketnoi, "set names 'utf8'");
        }
    }
    function dis_connect()
    {
        if ($this->ketnoi)
        {
            mysqli_close($this->ketnoi);
        }
    }
    function site($data)
    {
        $this->connect();
        $row = $this->ketnoi->query("SELECT * FROM `options` WHERE `key` = '$data' ")->fetch_array();
        return $row['value'];
    }
    function getUsers($data)
    {
        $this->connect();
        $row = $this->ketnoi->query("SELECT * FROM `users` WHERE `username` = '".$_SESSION['username']."' ")->fetch_array();
        return $row[$data];
    }
    function query($sql)
    {
        $this->connect();
        $row = $this->ketnoi->query($sql);
        return $row;
    }
    function cong($table, $data, $sotien, $where)
    {
        $this->connect();
        $row = $this->ketnoi->query("UPDATE `$table` SET `$data` = `$data` + '$sotien' WHERE $where ");
        return $row;
    }
    function tru($table, $data, $sotien, $where)
    {
        $this->connect();
        $row = $this->ketnoi->query("UPDATE `$table` SET `$data` = `$data` - '$sotien' WHERE $where ");
        return $row;
    }
    function insert($table, $data)
    {
        $this->connect();
        $field_list = '';
        $value_list = '';
        foreach ($data as $key => $value)
        {
            $field_list .= ",$key";
            $value_list .= ",'".mysqli_real_escape_string($this->ketnoi, $value)."'";
        }
        $sql = 'INSERT INTO '.$table. '('.trim($field_list, ',').') VALUES ('.trim($value_list, ',').')';
 
        return mysqli_query($this->ketnoi, $sql);
    }
    function update($table, $data, $where)
    {
        $this->connect();
        $sql = '';
        foreach ($data as $key => $value)
        {
            $sql .= "$key = '".mysqli_real_escape_string($this->ketnoi, $value)."',";
        }
        $sql = 'UPDATE '.$table. ' SET '.trim($sql, ',').' WHERE '.$where;
        return mysqli_query($this->ketnoi, $sql);
    }
    function update_value($table, $data, $where, $value1)
    {
        $this->connect();
        $sql = '';
        foreach ($data as $key => $value){
            $sql .= "$key = '".mysqli_real_escape_string($this->ketnoi, $value)."',";
        }
        $sql = 'UPDATE '.$table. ' SET '.trim($sql, ',').' WHERE '.$where.' LIMIT '.$value1;
        return mysqli_query($this->ketnoi, $sql);
    }
    function remove($table, $where)
    {
        $this->connect();
        $sql = "DELETE FROM $table WHERE $where";
        return mysqli_query($this->ketnoi, $sql);
    }
    function get_list($sql)
    {
        $this->connect();
        $result = mysqli_query($this->ketnoi, $sql);
        if (!$result)
        {
            die ('Lỗi kết nối database 2');
        }
        $return = array();
        while ($row = mysqli_fetch_assoc($result))
        {
            $return[] = $row;
        }
        mysqli_free_result($result);
        return $return;
    }
    function get_row($sql)
    {
        $this->connect();
        $result = mysqli_query($this->ketnoi, $sql);
        if (!$result)
        {
            die ('Lỗi kết nối database 2');
        }
        $row = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        if ($row)
        {
            return $row;
        }
        return false;
    }
    function num_rows($sql)
    {
        $this->connect();
        $result = mysqli_query($this->ketnoi, $sql);
        if (!$result)
        {
            die ('Lỗi kết nối database 2');
        }
        $row = mysqli_num_rows($result);
        mysqli_free_result($result);
        if ($row)
        {
            return $row;
        }
        return false;
    }
}
/* <!-- Design by Nguyễn Hải Quang/facebook: https://facebook.com/quang.hai.uda77/zalo: 0359917579/3.x [XR&CO'2021], Tue, 2 Aug 2021 11:19:24 GMT --> */
if(isset($_SESSION['username']))
{ 
    $NHQ = new NHQ;
    $getUser = $NHQ->get_row(" SELECT * FROM users WHERE username = '".$_SESSION['username']."' ");
    $my_username = 'True';
    $my_user  = $getUser['username'];
    $my_email  = $getUser['email'];
    $my_money = $getUser['money'];
    $my_level = $getUser['level'];
    $my_capbac = $getUser['capbac'];
    
    if(!$getUser)
    {
        session_start();
        session_destroy();
        header('location: /');
    }
    
    if($getUser['banned'] >= 1){
        die('Chúc mừng bạn đã bị banned vĩnh viễn vì đã vi phạm chính sách cộng đồng của chúng tôi');
        exit;
    }
    
    if ($getUser['money'] < 0)
    {
        $NHQ->update("users", array(
            'banned' => 1
        ), "username = '$my_user' ");
        session_start();
        session_destroy();
        header('location: /');
        die();
    }
    
    // if($my_level != 'admin' || $getUser['capbac'] != 3){
    //     die('Trang web đang bảo trì');
    //     exit;
    // }
}
else
{
    $my_level = NULL;
    $my_money = 0;
}

// function CheckLogin()
// {
//     global $my_username;
//     if($my_username == 'True')
//     {
//         return die('<script type="text/javascript">setTimeout(function(){ location.href = "'.BASE_URL('').'" }, 0);</script>');
//     }
// }
/* <!-- Design by Nguyễn Hải Quang/facebook: https://facebook.com/quang.hai.uda77/zalo: 0359917579/3.x [XR&CO'2021], Tue, 2 Aug 2021 11:19:24 GMT --> */
function CheckAdmin()
{
    global $my_level;global $my_capbac;
    if($my_level != 'admin' && $my_capbac != 3)
    {
        return die('<script type="text/javascript">setTimeout(function(){ location.href = "'.BASE_URL('').'" }, 0);</script>');
    }
}