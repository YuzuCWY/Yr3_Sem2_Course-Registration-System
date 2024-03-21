<?php
$db_host = "localhost";      
$db_id = "user";             
$db_pw = "user106118";
$db_name = "mydb";
$db_port = 3307;
$db_link = @mysqli_connect($db_host,$db_id,$db_pw,$db_name,$db_port);    
if (!$db_link)
die ("連線失敗!");     
echo ("連線成功!");      
mysqli_close($db_link);         
?>
