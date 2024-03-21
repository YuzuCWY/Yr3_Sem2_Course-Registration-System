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
$select_sql="SELECT * FROM student";
$result=mysqli_query($db_link,$select_sql);

echo "<TABLE BORDER='1'><TR ALIGN='CENTER'>";

//如果有讀取資料時，則透過for迴圈來依序讀取欲顯示記錄的各「欄位名稱」
for ($i=0; $i<mysqli_num_fields($result); $i++)             
	{
		$row_result = mysqli_fetch_field($result);
		echo "<TD>".$row_result->name."</TD>";  //取得欄位名稱
	}
echo "</TR>";
//如果有讀取資料時，則透過for迴圈來依序讀取欲顯示記錄的各「欄位內容」
for ($i=0; $i<mysqli_num_rows($result); $i++)             
	{
		mysqli_data_seek($result,$i);
		$resrow = mysqli_fetch_row($result);
		echo "<TR>";
		for ($j=0; $j<mysqli_num_fields($result); $j++)
		{
			echo "<TD>".$resrow[$j]."</TD>"; //取得欄位內容
		}
	    echo "</TR>";
	}
echo "</TABLE>";
mysqli_free_result($result);
mysqli_close($db_link);                // 關閉MariaDB資料庫連結 
          
?>
