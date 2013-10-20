<?php
session_start();
?>
<?php


require_once("./include/gpsvars.php");
require_once("./include/configure.php");
require_once("./include/db_func.php");

$db_conn = connect2db('mysqli', $dbhost, $dbuser, $dbpwd, $dbname);

//$rs = querydb($sqlcmd, $db_conn);

if(!isset($uid))	$uid = '';
if(!isset($uname))	$uname = '';


if(isset($confirm ))
{
	if(!isset($uid) || empty($uid))
	{
		$uid = '';
		$ErrMsg = '帳號不能是空白';
	}
	
	if(!isset($passwd) || empty($passwd))
		$ErrMsg = '密碼不能是空白';
		
	if(!isset($passwdConf))
		$ErrMsg = '確認密碼不能是空白';
		
	if(!isset($uname) || empty($uname))
	{
		$uname = '';
		$ErrMsg = '姓名不能是空白';
	}
	
	
	if(empty($ErrMsg))
	{
		if($passwd != $passwdConf)
			$ErrMsg = '兩次密碼輸入不一致';
	}
	var_dump($uid,$passwd,$uname);
    if(empty($ErrMsg))
    {
		
		
		$passwd = MD5($passwd);
		$sqlcmd = 'INSERT INTO `user` (userid,passwd,username)'
                 ."VALUES ('$uid','$passwd','$uname')";
        $result = updatedb($sqlcmd, $db_conn);
		
        header("Location: index.php");
		
    }
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Register</title>
<style type="text/css">
body,td,th {
	color: #000000;
}
body {
	background-attachment: fixed; 
	background-position:center;
	background-size:90% 90%;
	background-color: #F8F8D2;
	background-image: url(PIC/nobutton/U_login/U_register.JPG);
	background-repeat: no-repeat;
}
</style>
</head>
<button onClick="self.location.href='./index.php'" style="position: absolute; top: 10%; left:80%; width: 15%; height: 5%;"><img src= "./PIC/button/home.JPG"; width=100%; height=100%;></button>
<br>
<button onClick="self.location.href='./login.php'" style="position:absolute; top:20%; left:80%; width: 15%; height: 5%;"><img src= "./PIC/button/login.JPG"; width=100%; height=100%;></button>
<br>
<button onClick="self.location.href=''" style="position:absolute; top:30%; left:80%; -webkit-transform:rotate(-8deg); width=20%; height=10%; width: 15%; height: 5%;"><img src= "./PIC/button_green/G_register.JPG"; width=100%; height=100%;></button>

<div style="position: absolute; top: 45%; left: 30%; width: 40%; height: 80%;">
<form action="" method="post">
<table border="0" align="center" cellspacing="0" cellpadding="2">

<caption>輸入會員資料</caption>
<tr>
	<th>帳號</th>
	<th><input type="text" maxlength="20" name="uid" /></th>
</tr>
<tr>
	<th>密碼</th>
	<th><input type="password" maxlength="20" name="passwd" /></th>
</tr>
<tr>
	<th>再次輸入密碼</th>
	<th><input type="password" maxlength="20" name="passwdConf" /></th>
</tr>

<tr>
	<th>姓名</th>
	<th><input type="text" maxlength="20" name="uname" /></th>
</tr>

<tr>
	<td colspan="2" align="center"><input type="submit" name="confirm" value="註冊" /></td>
</tr>
</table>
</form>

</div>
</body>
</html>
