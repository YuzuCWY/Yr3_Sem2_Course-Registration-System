<?php
$db_host = "localhost";      
$db_id = "user";             
$db_pw = "user106118";
$db_name = "ch17_db";
$db_port = 3307;             
$db_link = @mysqli_connect($db_host,$db_id,$db_pw,$db_name,$db_port);    
if (!$db_link)
  die ("連線失敗!");  
$db_open_sql =mysqli_select_db($db_link,"ch17_db");
if (!$db_open_sql)
  die("無法開啟資料庫!");
mysqli_query($db_link,"SET NAMES 'UTF8'");           // 設定文字字元編碼為UTF8碼
$create_table_sql="CREATE TABLE 學生表(學號  CHAR(8) ,姓名  CHAR(4) NOT NULL,性別  CHAR(1) Default '男',電話  CHAR(12),地址  CHAR(20),PRIMARY  KEY(學號),UNIQUE(電話))";
if (mysqli_query($db_link,$create_table_sql))
  echo "建立「資料表」成功!";  
else
  echo "建立「資料表」失敗!";
mysqli_close($db_link);           
?>
