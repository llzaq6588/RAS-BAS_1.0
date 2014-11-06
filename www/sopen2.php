<html>

<head>
<meta http-equiv="content-type" content="text/html; charset=euc-kr">
<title>RAS-BAS SOPEN 회원정보</title>
</head>

<body bgcolor="white" text="black" link="blue" vlink="purple" alink="red">
<p align="center"><img src="sopen.jpg" border="0" width="388" height="65"></p>
<p align="center">&nbsp;</p>
<?php
	require_once('login.php');
?>

<?php

$id = $_POST['id'];
$key = $_POST['key'];

	$hostname = "localhost";
	$username = "rasbas";
	$password = "RASBAS!@#$1234";
	$dbname = "rasbas";

$connect = mysql_connect($hostname, $username, $password) or die("MySQL Server 연결에 실패했습니다"); 
mysql_select_db($dbname,$connect); 
	
	$sql1="TRUNCATE sms_id";
 
	$result=mysql_query($sql1);

 
$sql2="INSERT INTO `rasbas`.`sms_id` (`id` , `key` ) VALUES ( '$id','$key')";
$result=mysql_query($sql2);



mysql_close($connect);


echo '<p align="center"><font face="나눔고딕 ExtraBold"><span style="font-size:16pt;">&lt;----------------------- &nbsp;변경완료 &nbsp;-----------------------&gt;</span></font></p>';
 

?>


<p align="center">&nbsp;</p>
<table border="1" width="697" align="center">
    <tr>
        <td width="195" height="74">
            <p align="center"><font face="나눔고딕 ExtraBold"><span style="font-size:20pt;">ID</span></font></p>
</td>
        <td width="486" height="74">
            <p align="center">			
<font face="나눔고딕 ExtraBold"><span style="font-size:20pt;"><?php


	$hostname = "localhost";
	$username = "rasbas";
	$password = "RASBAS!@#$1234";
	$dbname = "rasbas";

 
	$connect = mysql_connect($hostname, $username, $password) or die("MySQL Server 연결에 실패했습니다"); 
	mysql_select_db($dbname,$connect); 
 
	$sql="SELECT * FROM sms_id";
 
	$result=mysql_query($sql);
 
	while($array=mysql_fetch_array($result))
	{ 
		echo $array[id];	
		}

	mysql_close($connect);
	?>	
</span></font></p>
</td>
    </tr>
</table><p>&nbsp;</p>

<p align="center"><span style="font-size:14pt;"><b><font face="맑은 고딕" color="red">※ ID와 KEY는 OPEN에서 발급받으실 수 있습니다.</font></b></span></p>
<p align="center"><a href="http://api.allat.co.kr/sopen/index/index.jsp" target="_blank"><img src="logo.png" width="200" height="86" border="0"></a></p>
</body>

</html><!--builded by KAERIUS-->
