<?php

header("Content-Type: text/html; charset=utf-8");   // 宣告本頁字元為UTF8碼

include "con_db.inc";                      // 載入資料庫連結檔 


$sql_query = $_GET["sql"];
//$sql_query="INSERT INTO 學生表 values ('S006','六合','女','6666666', '楠梓區')";
//$sql_query="INSERT INTO 課程表 values ('C009','巨量資料分析',4)";
//$sql_query="INSERT INTO 選課表 values ('S006','C001',85)";
mysqli_query($db_link,$sql_query);	// 送出SQL字串給MySQL

if (mysqli_affected_rows($db_link))
	echo "(INSERT UPDATE DELETE)指令執行成功";
else
   echo "(INSERT UPDATE DELETE)指令執行失敗";

mysqli_close($db_link);                               // 關閉MySQL連結 

?>