<?php
session_start();
?>


<?php
require_once("./include/gpsvars.php");
require_once("./include/configure.php");
require_once("./include/db_func.php");

?>

<?php
if(isset($id) && isset($passwd))
{
	if(empty($id))	$id = '';
	if(empty($passwd))	$passwd = '';
	// Demo for XSS
	$name = xssfix($id);
	$passwd = xssfix($passwd);
    
    // Demo for the reason to use addslashes
    
	if (!get_magic_quotes_gpc())
	{
		$name = addslashes($id);
		$passwd = addslashes($passwd);
	}
   
	$db_conn = connect2db('mysqli', $dbhost, $dbuser, $dbpwd, $dbname);
	$sqlcmd = "SELECT * FROM `user` WHERE userid='$id' AND valid='y'";
	$rs = querydb($sqlcmd, $db_conn);
	
	if(count($rs) != 0)
	{	
		$passwd = md5($passwd);
		
		if($rs[0]['passwd'] == $passwd)
		{
			$_SESSION['loginID'] = $rs[0]['userid'];
			$_SESSION['name'] = $rs[0]['username'];
			$_SESSION['admin'] = $rs[0]['admin'];
			
			
			// $sqlcmd = "SELECT * FROM `group` WHERE gid='".$rs[0]['gid']."'";
			// $rs = querydb($sqlcmd, $db_conn);
			
			// $_SESSION['gid'] = $rs[0]['gid'];
			// $_SESSION['gtype'] = $rs[0]['type'];
			// $_SESSION['gname'] = $rs[0]['gname'];
			
			//if($rs[0]['type'] == 'class')
				header("Location: home.php");
			//else
				//header("Location: vendor.php");
		}
		else echo "<p align='center'>帳號或密碼錯誤</p>";
	}
	else echo "<p align='center'>帳號或密碼錯誤</p>";
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
<style type="text/css">
body,td,th {
	color: #000000;
}
body {
	background-attachment: fixed; 
	background-position:center;
	background-size:90% 90%;
	background-color: #F8F8D2;
	background-image: url(PIC/nobutton/U_login/U_login.JPG);
	background-repeat: no-repeat;
}
</style>
</head>
<button onClick="self.location.href='./index.php'" style="position: absolute; top: 10%; left:80%; width: 15%; height: 5%;"><img src= "./PIC/button/home.JPG"; width=100%; height=100%;></button>
<br>
<button onClick="self.location.href=''" style="position:absolute; top:20%; left:80%; -webkit-transform:rotate(-8deg); width: 15%; height: 5%;"><img src= "./PIC/button_green/G_login.JPG"; width=100%; height=100%;></button>
<br>
<button onClick="self.location.href='./register.php'" style="position:absolute; top:30%; left:80%; width: 15%; height: 5%;"><img src= "./PIC/button/register.JPG"; width=100%; height=100%;></button>
<div style="position: absolute; top: 45%; left: 30%; width: 40%; height: 80%;">
<form action="" method="post">
	<table align='center'>
	<caption>請輸入帳號密碼登入</caption>
	  <tr>
		<td align='center'>帳號</td>
		<td><input type="text" maxlength=20 name="id" /></td>
	  </tr>
	  <tr>
		<td align='center'>密碼</td>
		<td><input type="password" maxlength=20 name="passwd" /></td>
	  </tr>
	  <tr>
		<td colspan=2 align='center'><input type="submit" name="confirm" alue="登入" /></td>
		</tr>
	</table>
</form>
</div>
</body>
</html>
