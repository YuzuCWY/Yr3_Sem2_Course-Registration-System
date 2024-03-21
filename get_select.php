<?php
header("Content-Type: text/html; charset=utf-8");   // 宣告本頁字元為UTF8碼
include "con_db.inc";                              // 載入資料庫連結檔 

$sql_query = $_GET["sql"];                          // 取得GET傳進來的SQL查詢字串
//$sql_query = "SELECT * FROM 學生表";
//echo $sql_query."<br>";
$result=mysqli_query($db_link,$sql_query);  

if ($result)
{
	for ($i=0; $i<mysqli_num_fields($result); $i++)
	{
		$row_result = mysqli_fetch_field($result);
		$FieldName[$i]=$row_result->name;	
	}
	
	for ($i=0; $i<mysqli_num_rows($result); $i++)
	{
		mysqli_data_seek($result,$i);
		$resrow = mysqli_fetch_row($result);
		for ($j=0; $j<mysqli_num_fields($result); $j++)
		{
			echo $resrow[$j];
			if ($j < (mysqli_num_fields($result)-1))
				echo "@@";
		}
		if ($i < (mysqli_num_rows($result)-1))
			echo "@#@";
	}
}
else
	echo "no data has been found!";

mysqli_free_result($result);
mysqli_close($db_link);                                                 // 關閉MySQL連結 
?>