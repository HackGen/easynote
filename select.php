<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
//session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Register</title>
<style type="text/css">
body,td,th {
	color: #D6D6D6;
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
<?php if (!isset($PageTitle)) $PageTitle="easynote"; ?>
<title><?php echo $PageTitle ?></title>
</head>
<button onClick="self.location.href='./unlogin_home.html'" style="position: absolute; top: 10%; left:80%; width: 15%; height: 5%;"><img src= "./PIC/button/home.JPG"; width=100%; height=100%;></button>
<br>
<button onClick="self.location.href='./login.html'" style="position:absolute; top:20%; left:80%; width: 15%; height: 5%;"><img src= "./PIC/button/login.JPG"; width=100%; height=100%;></button>
<br>
<button onClick="self.location.href=''" style="position:absolute; top:30%; left:80%; -webkit-transform:rotate(-8deg); width=20%; height=10%; width: 15%; height: 5%;"><img src= "./PIC/button_green/G_register.JPG"; width=100%; height=100%;></button>
</body>
</html>
