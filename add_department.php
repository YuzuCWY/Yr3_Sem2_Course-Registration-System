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



// Retrieve the department code, name, and chair from the form submission
$code = $_POST['code'];
$name = $_POST['name'];
$chair = $_POST['chair'];


if (!$db_open_sql)
  die("無法開啟資料庫!");


mysqli_query($db_link,"SET NAMES 'UTF8'");       // 設定文字字元編碼為UTF8碼
$insert_record_sql="INSERT INTO dept (dept_id, dept_name, dept_man) VALUES ('$code', '$name', '$chair')";
mysqli_query($db_link,$insert_record_sql);
if (mysqli_affected_rows($db_link)) {
	echo "指令執行成功";
    echo "<a href='main.html'>Return to Main Page</a>";
}
else {
   echo "指令執行失敗";
   echo "<a href='main.html'>Return to Main Page</a>";
}
mysqli_close($db_link);           
?>