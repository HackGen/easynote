<?php
session_start();

if(!isset($_SESSION['loginID'])){
	//die('你沒有登入');
	//echo "<script>alert('你沒有登入!');</script>";
	header("Location: login.php");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home</title>
<style type="text/css">
body,td,th {
	color: #D6D6D6;
}
body {
	background-attachment: fixed; 
	background-position:center;
	background-size:90% 90%;
	background-color: #F8F8D2;
	background-image: url(PIC/nobutton/U_home/U_home.JPG);
	background-repeat: no-repeat;
}
</style>
</head>
<button onClick="self.location.href=''" style="position: absolute; top: 10%; left:80%; -webkit-transform:rotate(-8deg); width: 15%; height: 5%;"><img src= "./PIC/button_green/G_home.JPG"; width=100%; height=100%;></button>
<br>
<button onClick="self.location.href='./list.php'" style="position:absolute; top:20%; left:80%; width: 15%; height: 5%;"><img src= "./PIC/button/notelist.JPG"; width=100%; height=100%;></button>
<br>
<button onClick="self.location.href='./post_edit.php'" style="position:absolute; top:30%; left:80%; width=20%; height=10%; width: 15%; height: 5%; "><img src= "./PIC/button/new note.JPG"; width=100%; height=100%;></button>
<button onClick="self.location.href='./logout.php'" style="position:absolute; top:40%; left:80%; width=20%; height=10%; width: 15%; height: 5%; "><img src= "./PIC/button/logout.JPG"; width=100%; height=100%;></button>
</body>
</html>
