<?php
	require_once('login.php');
?>
<html>

<head>
<meta http-equiv="content-type" content="text/html; charset=euc-kr">
<title>RAS-BAS SOPEN ȸ������</title>
</head>

<body bgcolor="white" text="black" link="blue" vlink="purple" alink="red">
<p align="center"><img src="sopen.jpg" border="0" width="388" height="65"></p>
<p align="center">&nbsp;</p>
<table border="1" width="697" align="center">
    <tr>
        <td width="195" height="74">

            <p align="center"><font face="������� ExtraBold"><span style="font-size:20pt;">ID</span></font></p>
</td>
        <td width="486" height="74">

            <p align="center">
			
<font face="������� ExtraBold"><span style="font-size:20pt;"><?php


	$hostname = "localhost";
	$username = "rasbas";
	$password = "RASBAS!@#$1234";
	$dbname = "rasbas";

 
	$connect = mysql_connect($hostname, $username, $password) or die("MySQL Server ���ῡ �����߽��ϴ�"); 
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
</table>
<p>&nbsp;</p>
<form name="form1" method="post" action="sopen2.php">
    <p align="center"><font face="������� ExtraBold"><span style="font-size:20pt;">ID :&nbsp;&nbsp;&nbsp; <input type="text" name="id" style="font-family:'������� ExtraBold'; font-size:20;"></span></font></p>
    <p align="center"><font face="������� ExtraBold"><span style="font-size:20pt;">KEY : <input type="password" name="key" style="font-family:'������� ExtraBold'; font-size:20;" size="35"></span></font></p>
    <p align="center"><input type="submit" name="formbutton1" value="����" style="font-family:'������� ExtraBold'; font-size:20;"></p>
</form>
<p>&nbsp;</p>
<p align="center"><span style="font-size:14pt;"><b><font face="���� ���" color="red">�� ID�� KEY�� OPEN���� �߱޹����� �� �ֽ��ϴ�.</font></b></span></p>
<p align="center"><a href="http://api.allat.co.kr/sopen/index/index.jsp" target="_blank"><img src="logo.png" width="200" height="86" border="0"></a></p>
</body>

</html><!--builded by KAERIUS-->
