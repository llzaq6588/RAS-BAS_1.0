<?php
	require_once('login.php');
?>
<html>

<head>
<meta http-equiv="content-type" content="text/html; charset=euc-kr">
<title>RAS-BAS �߽��� ��ȣ ����</title>
</head>

<body bgcolor="white" text="black" link="blue" vlink="purple" alink="red">
<p align="center"><img src="sendnum.jpg" border="0" width="239" height="65"></p>
<p align="center">&nbsp;</p>
<table border="1" width="485" align="center">
    <tr>
        <td width="160">
            <p align="center"><font face="������� ExtraBold"><span style="font-size:20pt;">�߽��� ��ȣ</span></font></p>
</td>
        <td width="309">            <p align="center">
<font face="������� ExtraBold"><span style="font-size:20pt;"><?php


	$hostname = "localhost";
	$username = "rasbas";
	$password = "RASBAS!@#$1234";
	$dbname = "rasbas";

 
	$connect = mysql_connect($hostname, $username, $password) or die("MySQL Server ���ῡ �����߽��ϴ�"); 
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
</table><p>&nbsp;</p>
<p align="center"><font face="������� ExtraBold"><span style="font-size:15pt;">�߽��� ��ȣ ���� ���� : </span></font><span style="font-size:15pt;"><font face="������� ExtraBold" color="red">000-1234-5678</font></span><font face="������� ExtraBold"><span style="font-size:15pt;"> &nbsp;&nbsp;or &nbsp;&nbsp;</span></font><span style="font-size:15pt;"><font face="������� ExtraBold" color="red">00012345678</font></span></p>
<p align="center">&nbsp;</p>
<form method="post" action="send_num2.php">
    <p align="center"><font face="������� ExtraBold"><span style="font-size:20pt;">�߽��� ��ȣ ���� : <input type="text" name="num" style="font-family:'������� ExtraBold'; font-size:20;"></span></font></p>
    <p align="center"><input type="submit" name="formbutton1" value="��ȣ ����" style="font-family:'������� ExtraBold'; font-size:20;"></p>
</form>
<p>&nbsp;</p>
</body>

</html><!--builded by KAERIUS-->
