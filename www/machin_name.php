<?php
	require_once('login.php');
?>
<html>

<head>
<meta http-equiv="content-type" content="text/html; charset=euc-kr">
<title>RAS-BAS ��� ��Ī ����</title>
</head>

<body bgcolor="white" text="black" link="blue" vlink="purple" alink="red">
<p align="center"><img src="m_name.jpg" border="0" width="241" height="65"> </p>
<p align="center">&nbsp;</p>
<table border="1" width="485" align="center">
    <tr>
        <td width="160">

            <p align="center"><font face="������� ExtraBold"><span style="font-size:20pt;">����Ī</span></font></p>
</td>
        <td width="309">            
            <p align="center">
<font face="������� ExtraBold"><span style="font-size:20pt;"><?php


	$hostname = "localhost";
	$username = "rasbas";
	$password = "RASBAS!@#$1234";
	$dbname = "rasbas";

 
	$connect = mysql_connect($hostname, $username, $password) or die("MySQL Server ���ῡ �����߽��ϴ�"); 
	mysql_select_db($dbname,$connect); 
 
	$sql="SELECT * FROM machin_name";
 
	$result=mysql_query($sql);
 
	while($array=mysql_fetch_array($result))
	{ 
		echo $array[machin_name];	
		}

	mysql_close($connect);
	?>	
</span></font></p>
</td>
    </tr>
</table><p align="center">&nbsp;</p>
<table border="1" width="233" align="center">
    <tr>
        <td width="223">
            <p align="center"><font face="������� ExtraBold"><span style="font-size:20pt;">MESSAGE ����</span></font></p>
</td>
    </tr>
    <tr>
        <td width="223"><font face="������� ExtraBold"><span style="font-size:20pt;">
				</span></font><font face="������� ExtraBold"><span style="font-size:20pt;">
--���--<br>
<?php


	$hostname = "localhost";
	$username = "rasbas";
	$password = "RASBAS!@#$1234";
	$dbname = "rasbas";

 
	$connect = mysql_connect($hostname, $username, $password) or die("MySQL Server ���ῡ �����߽��ϴ�"); 
	mysql_select_db($dbname,$connect); 
 
	$sql="SELECT * FROM machin_name";
 
	$result=mysql_query($sql);
 
	while($array=mysql_fetch_array($result))
	{ 
		echo $array[machin_name];	
		}

	mysql_close($connect);
	?>	
		
		
		
		�� ������ Ȯ�εǾ����ϴ�.</span></font></td>
    </tr>
</table>
<p align="center">&nbsp;</p>
<form method="post" action="machin_name2.php">
    <p align="center"><font face="������� ExtraBold"><span style="font-size:20pt;">���&nbsp;��Ī ���� : <input type="text" name="machin_name" style="font-family:'������� ExtraBold'; font-size:20;"></span></font><input type="submit" name="formbutton1" value="��Ī ����" style="font-family:'������� ExtraBold'; font-size:20;"></p>
</form>
<p align="center">&nbsp;</p>
</body>

</html><!--builded by KAERIUS-->
