<?php
	require_once('login.php');
?>
<html>

<head>
<meta http-equiv="content-type" content="text/html; charset=euc-kr">
<title>RAS-BAS 정전 감지 알리미 시스템</title>
</head>

<body bgcolor="white" text="black" link="blue" vlink="purple" alink="red">
<p align="center"><img src="main_title.jpg" border="0" width="916" height="129"></p>
<p align="center">&nbsp;</p>
<p align="center">
<IMG style="OVERFLOW-X: hidden; CURSOR: hand" onclick="window.open('./sopen.php','window','width=800, height=700, left=0, top=0, scrollbars=1, resizable=0')" src="sopen.jpg" border="0" width="388" height="65">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<IMG style="OVERFLOW-X: hidden; CURSOR: hand" onclick="window.open('./send_num.php','window','width=600, height=500, left=0, top=0, scrollbars=1, resizable=0')" src="sendnum.jpg" border="0" width="239" height="65">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<IMG style="OVERFLOW-X: hidden; CURSOR: hand" onclick="window.open('./machin_name.php','window','width=600, height=600, left=0, top=0, scrollbars=1, resizable=0')" src="m_name.jpg" border="0" width="241" height="65"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<IMG style="OVERFLOW-X: hidden; CURSOR: hand" onclick="window.open('./recv_num.php','window','width=800, height=700, left=0, top=0, scrollbars=1, resizable=0')" src="rec_num.jpg" border="0" width="297" height="65">
</p>
<p align="center">&nbsp;</p>
<table border="1" bordercolordark="black" bordercolorlight="black" width="1062" align="center">
    <tr>
        <td width="523" bordercolordark="black" bordercolorlight="black">
            <p align="center"><span style="font-size:28pt;"><font face="나눔고딕 ExtraBold">정전 감지 시간</font></span></p>
</td>
        <td width="523" bordercolordark="black" bordercolorlight="black">
            <p align="center"><span style="font-size:28pt;"><font face="나눔고딕 ExtraBold">전원 복구 시간</font></span></p>
</td>
    </tr>

	
	<?php


	$hostname = "localhost";
	$username = "rasbas";
	$password = "RASBAS!@#$1234";
	$dbname = "rasbas";

 
	$connect = mysql_connect($hostname, $username, $password) or die("MySQL Server 연결에 실패했습니다"); 
	mysql_select_db($dbname,$connect); 
 
	$sql="SELECT * FROM rec";
 
	$result=mysql_query($sql);
 
	while($array=mysql_fetch_array($result))
	{ 
		echo '<tr><td width="523" bordercolordark="black" bordercolorlight="black"><p align="center"><span style="font-size:28pt;"><font face="나눔고딕 ExtraBold">';
		echo $array[blackoutstart];
		echo '</font></span></p></td><td width="523" bordercolordark="black" bordercolorlight="black"><p align="center"><span style="font-size:28pt;"><font face="나눔고딕 ExtraBold">';
		echo $array[blackoutstop];
		echo '</font></span></p></td></tr>';
	}

	mysql_close($connect);
	?>
</table>
</body>

</html><!--builded by KAERIUS-->
