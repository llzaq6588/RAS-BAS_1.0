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
<p align="center"><?php

$machin_name = $_POST['machin_name'];


	$hostname = "localhost";
	$username = "rasbas";
	$password = "RASBAS!@#$1234";
	$dbname = "rasbas";

$connect = mysql_connect($hostname, $username, $password) or die("MySQL Server ���ῡ �����߽��ϴ�"); 
mysql_select_db($dbname,$connect); 

	$sql1="TRUNCATE machin_name";
 
	$result=mysql_query($sql1);
 
 
$sql2="INSERT INTO `rasbas`.`machin_name` (`machin_name` ) VALUES ( '$machin_name')";

$result=mysql_query($sql2);



mysql_close($connect);


echo '<p align="center"><font face="������� ExtraBold"><span style="font-size:16pt;">&lt;----------------------- &nbsp;����Ϸ� &nbsp;-----------------------&gt;</span></font></p>';
 

?>
</p>
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
</table><p>&nbsp;</p>
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
</table><p align="center">&nbsp;</p>
</body>

</html><!--builded by KAERIUS-->
