<?php   

$db_host = "localhost";      // MariaDB 主機位置
$db_id = "user";             // MariaDB 登入帳號
$db_pw = "user106118";             // MariaDB 登入密碼
$db_name = "ai2";
$db_port = 3307;

$db_link = @mysqli_connect($db_host,$db_id,$db_pw,$db_name,$db_port);     // 連結MariaDB資料庫系統

if (!$db_link)                                         // 如果連結不到MariaDB資料庫系統
	die ("MysqlLinkError");                        // 送出錯誤訊息
//else
	//echo "successful connection"."<br>";


$sel_db = mysqli_select_db($db_link,"ai2");                     // 選擇要連結的資料庫(本專案建立的資料庫Ai2)
if (!$sel_db)                                          // 如果連結不到Ai2資料庫
	die ("SelectDbError");                         // 送出錯誤訊息 
//else
	//echo "database is alive"."<br>";


mysqli_query($db_link,"SET NAMES 'UTF8'");                       // 設定文字字元編碼為UTF8碼

?>