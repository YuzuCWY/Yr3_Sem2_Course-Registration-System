<?php
header("Content-Type: text/html; charset=utf-8");   // 宣告本頁字元為UTF8碼
include "con_db.inc";                               // 載入資料庫連結檔 
$sql_query = $_GET["sql"];                          // 取得GET傳進來的SQL查詢字串
//$sql_query = "SELECT * FROM 學生表";
//echo $sql_query."<br>";
$result=mysqli_query($db_link,$sql_query);                 // 將讀取的資料存入$result變數中
//如果有讀取資料時，則透過for迴圈來依序讀取欲顯示記錄的各「欄位名稱」
if ($result)
{
	for ($i=0; $i<mysqli_num_fields($result); $i++)             
	{
		$row_result = mysqli_fetch_field($result);
		echo $row_result->name;
	
		if ($i < mysqli_num_fields($result))
			echo "   ";
	}
}
else
	echo "查無此資料!";

mysqli_free_result($result);
mysqli_close($db_link);                               // 關閉MariaDB資料庫連結 
?>