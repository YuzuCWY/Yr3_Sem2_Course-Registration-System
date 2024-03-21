<?php
$db_host = "localhost";      
$db_id = "user";             
$db_pw = "user106118";
$db_name = "ai2";
$db_port = 3307;              
$db_link = @mysqli_connect($db_host,$db_id,$db_pw,$db_name,$db_port);    
if (!$db_link)
  die ("連線失敗!");  
$db_open_sql =mysqli_select_db($db_link,"ai2");
if (!$db_open_sql)
  die("無法開啟資料庫!");
mysqli_query($db_link,"SET NAMES 'UTF8'");       // 設定文字字元編碼為UTF8碼
$insert_record_sql="INSERT INTO student VALUES('S0006','六心','D001')";
mysqli_query($db_link,$insert_record_sql);
if (mysqli_affected_rows($db_link))
	echo "指令執行成功";
else
   echo "指令執行失敗";
mysqli_close($db_link);           
?>
