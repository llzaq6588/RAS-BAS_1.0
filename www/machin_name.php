<?php
	require_once('login.php');
?>
<html>

<head>
<meta http-equiv="content-type" content="text/html; charset=euc-kr">
<title>RAS-BAS 기기 명칭 설정</title>
</head>

<body bgcolor="white" text="black" link="blue" vlink="purple" alink="red">
<p align="center"><img src="m_name.jpg" border="0" width="241" height="65"> </p>
<p align="center">&nbsp;</p>
<table border="1" width="485" align="center">
    <tr>
        <td width="160">

            <p align="center"><font face="나눔고딕 ExtraBold"><span style="font-size:20pt;">기기명칭</span></font></p>
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
            <p align="center"><font face="나눔고딕 ExtraBold"><span style="font-size:20pt;">MESSAGE 예시</span></font></p>
</td>
    </tr>
    <tr>
        <td width="223"><font face="나눔고딕 ExtraBold"><span style="font-size:20pt;">
				</span></font><font face="나눔고딕 ExtraBold"><span style="font-size:20pt;">
--경고--<br>
<?php


	$hostname = "localhost";
	$username = "rasbas";
	$password = "RASBAS!@#$1234";
	$dbname = "rasbas";

 
	$connect = mysql_connect($hostname, $username, $password) or die("MySQL Server 연결에 실패했습니다"); 
	mysql_select_db($dbname,$connect); 
 
	$sql="SELECT * FROM machin_name";
 
	$result=mysql_query($sql);
 
	while($array=mysql_fetch_array($result))
	{ 
		echo $array[machin_name];	
		}

	mysql_close($connect);
	?>	
		
		
		
		의 정전이 확인되었습니다.</span></font></td>
    </tr>
</table>
<p align="center">&nbsp;</p>
<form method="post" action="machin_name2.php">
    <p align="center"><font face="나눔고딕 ExtraBold"><span style="font-size:20pt;">기기&nbsp;명칭 변경 : <input type="text" name="machin_name" style="font-family:'나눔고딕 ExtraBold'; font-size:20;"></span></font><input type="submit" name="formbutton1" value="명칭 변경" style="font-family:'나눔고딕 ExtraBold'; font-size:20;"></p>
</form>
<p align="center">&nbsp;</p>
</body>

</html><!--builded by KAERIUS-->
