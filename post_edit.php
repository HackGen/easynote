

<?php
session_start();
date_default_timezone_set('Asia/Taipei');
require_once("./include/gpsvars.php");
require_once("./include/configure.php");
require_once("./include/db_func.php");
$db_conn = connect2db('mysqli', $dbhost, $dbuser, $dbpwd, $dbname);

$sqlcmd = "SELECT typeid,typeCode,typeName FROM `type` ";
$rs = querydb($sqlcmd, $db_conn);

foreach($rs as $item)
{
//var_dump($item);
	$index = $item['typeid'];
	if(!isset($typeid))	$typeid = $index;
	$typeName[$index] = $item['typecode'].$item['typename'];
	
}

$userid = $_SESSION['loginID'];

if(isset($submit)){
	$t=time();
	
	$filename = date("ymdHis",$t).$_SESSION['loginID'].".html";
	$path = "/var/www/html/i4010/ttt/files/";
	$path = $path.$filename;
	$file = fopen($path,"w+");
	fwrite($file,$textfield);
	fclose($file);
	
	$addTime = date("Y-m-d H:i:s",$t);
	
	$textfield = ereg_replace("\n", "<BR>\n", $textfield);
	//$sql="INSERT INTO 'note' (userid, content, typeid) VALUES('10','$textfield','')";
	$sql='INSERT INTO `note` (userid,content,typeid,time)'
                 ."VALUES ('$userid','$filename','$typeid','$addTime')";
	$result = updatedb($sql, $db_conn);

	//echo $sql;
}
?>
<!DOCTYPE html PUBLIC “-//W3C//DTD XHTML 1.0 Transitional//EN" “http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link href="ckeditor/_samples/sample.css" rel="stylesheet" type="text/css">
<title>NewNote</title>
<style type="text/css">
body,td,th {
	color: #D6D6D6;
}
body {
	background-attachment: fixed; 
	background-position:center;
	background-size:90% 90%;
	background-color: #F8F8D2;
	background-image: url(./newnote_header.JPG);
	background-repeat: no-repeat;
}
</style>
</head>
<body>
<button onClick="self.location.href='./home.html'" style="position: absolute; top: 10%; left:80%; width: 15%; height: 5%;"><img src= "./PIC/button/home.JPG"; width=100%; height=100%;></button>
<br>
<button onClick="self.location.href='./list.php'" style="position:absolute; top:20%; left:80%; width: 15%; height: 5%;"><img src= "./PIC/button/notelist.JPG"; width=100%; height=100%;></button>
<br>
<button onClick="self.location.href='./post_edit.php'" style="position:absolute; top:30%; left:80%;  width=20%; height=10%; width: 15%; height: 5%; -webkit-transform:rotate(-8deg);  ; "><img src= "./PIC/button_green/G_new note.JPG"; width=100%; height=100%;></button>
<button onClick="self.location.href='./logout.php'" style="position:absolute; top:40%; left:80%; width=20%; height=10%; width: 15%; height: 5%; "><img src= "./PIC/button/logout.JPG"; width=100%; height=100%;></button>
<div id="editor" style="width:70%;position:fixed;left:15%;top:43%;">
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<form action="post_edit.php" method="post">
	<select name="typeid">
		<?php
			foreach($typeName as $index => $item)
			{
				echo "<option value='$index'";
				//if($ideex == $gid)	echo ' selected';
				echo ">$item</option>";
			}
		?>
	</select>

	<textarea name="textfield" class="ckeditor" id="textfield"></textarea>
	<input type="submit" value="Submit" name="submit" />
</form>
</div>
</body>
</html>
