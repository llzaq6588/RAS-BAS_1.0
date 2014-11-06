<?php
	require_once('login.php');
?>
<html>

<head>
<meta http-equiv="content-type" content="text/html; charset=euc-kr">
<title>RAS-BAS 발신자 번호 설정</title>
</head>

<body bgcolor="white" text="black" link="blue" vlink="purple" alink="red">
<p align="center"><img src="sendnum.jpg" border="0" width="239" height="65"></p>
<p align="center">&nbsp;</p>
<p align="center"><?php

$num = $_POST['num'];

	$hostname = "localhost";
	$username = "rasbas";
	$password = "RASBAS!@#$1234";
	$dbname = "rasbas";

$connect = mysql_connect($hostname, $username, $password) or die("MySQL Server 연결에 실패했습니다"); 
mysql_select_db($dbname,$connect); 

	$sql1="TRUNCATE send_num";
 
	$result=mysql_query($sql1);
 
 
$sql2="INSERT INTO `rasbas`.`send_num` (`send_num` ) VALUES ( '$num')";

$result=mysql_query($sql2);




mysql_close($connect);


echo '<p align="center"><font face="나눔고딕 ExtraBold"><span style="font-size:16pt;">&lt;----------------------- &nbsp;변경완료 &nbsp;-----------------------&gt;</span></font></p>';
 

?>
</p>
<p align="center">&nbsp;</p>
<table border="1" width="485" align="center">
    <tr>
        <td width="160">

            <p align="center"><font face="나눔고딕 ExtraBold"><span style="font-size:20pt;">발신자 번호</span></font></p>
</td>
        <td width="309">            
            <p align="center">
<font face="나눔고딕 ExtraBold"><span style="font-size:20pt;"><?php


	$hostname = "localhost";
	$username = "rasbas";
	$password = "RASBAS!@#$1234";
	$dbname = "rasbas";

 
	$connect = mysql_connect($hostname, $username, $password) or die("MySQL Server 연결에 실패했습니다"); 
	mysql_select_db($dbname,$connect); 
 
	$sql="SELECT * FROM send_num";
 
	$result=mysql_query($sql);
 
	while($array=mysql_fetch_array($result))
	{ 
		echo $array[send_num];	
		}

	mysql_close($connect);
	?>	
</span></font></p>
</td>
    </tr>
</table>
<p align="center">&nbsp;</p>
<p>&nbsp;</p>
</body>
<p>&nbsp;</p>
</body>

</html><!--builded by KAERIUS-->
