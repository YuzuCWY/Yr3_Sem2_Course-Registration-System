<?php   

$db_host = "localhost";      // MariaDB �D����m
$db_id = "user";             // MariaDB �n�J�b��
$db_pw = "user106118";             // MariaDB �n�J�K�X
$db_name = "ai2";
$db_port = 3307;

$db_link = @mysqli_connect($db_host,$db_id,$db_pw,$db_name,$db_port);     // �s��MariaDB��Ʈw�t��

if (!$db_link)                                         // �p�G�s������MariaDB��Ʈw�t��
	die ("MysqlLinkError");                        // �e�X���~�T��
//else
	//echo "successful connection"."<br>";


$sel_db = mysqli_select_db($db_link,"ai2");                     // ��ܭn�s������Ʈw(���M�׫إߪ���ƮwAi2)
if (!$sel_db)                                          // �p�G�s������Ai2��Ʈw
	die ("SelectDbError");                         // �e�X���~�T�� 
//else
	//echo "database is alive"."<br>";


mysqli_query($db_link,"SET NAMES 'UTF8'");                       // �]�w��r�r���s�X��UTF8�X

?>