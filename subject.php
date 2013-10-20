<?php
session_start();
?>
<?php
// 變數及函式處理，請注意其順序
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
$flag = 0;
if(isset($submit)){
	$flag = 1;
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>subject</title>
<style type="text/css">
body,td,th {
	color: #000000;
}
body {
	background-attachment: fixed; 
	background-position:center;
	background-size:90% 90%;
	background-color: #F8F8D2;
	background-image: url(PIC/nobutton/U_notelist/U_subject.JPG);
	background-repeat: no-repeat;
}
</style>
</head>
<button onClick="self.location.href='./home.php'" style="position: absolute; top: 10%; left:80%; width: 15%; height: 5%;"><img src= "./PIC/button/home.JPG"; width=100%; height=100%;></button>
<br>
<button onClick="self.location.href='./list.php'" style="position:absolute; top:20%; left:80%;  -webkit-transform:rotate(-8deg);  width: 15%; height: 5%;"><img src= "./PIC/button_green/G_notelist.JPG"; width=100%; height=100%;></button>
<br>
<button onClick="self.location.href='./post_edit.php'" style="position:absolute; top:30%; left:80%;  width=20%; height=10%; width: 15%; height: 5%; "><img src= "./PIC/button/new note.JPG"; width=100%; height=100%;></button>
<button onClick="self.location.href='./logout.php'" style="position:absolute; top:40%; left:80%; width=20%; height=10%; width: 15%; height: 5%; "><img src= "./PIC/button/logout.JPG"; width=100%; height=100%;></button>
<div style="position: absolute; top: 35%; left: 30%; width: 40%; height: 80%;";>
<form action="subject.php" method="post">
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
	<input type="submit" value="Submit" name="submit" />
</form>
<table >
<tr >
	<th>ID</th>
	<th>Owner</th>
	<th>File Name</th>
	<th>Date</th>
<?php
//echo $typeid;
$sqlcmd = "SELECT * FROM `note` WHERE typeid = '$typeid'  ";
$rs = querydb($sqlcmd, $db_conn);

if($flag == 1){
	$i=0;
	foreach ($rs as $item)
	{
		$sqlcmd = "SELECT * FROM `note` WHERE typeid = '$typeid'";
		$dogdb = querydb($sqlcmd, $db_conn);

		$noteid = $dogdb[$i]['noteid'];
		$userid = $dogdb[$i]['userid'];
		$content = $dogdb[$i]['content'];
		$time = $dogdb[$i]['time'];
		
	 ?>
	  <tr align="center">
		<td><?php echo $noteid ?></td> 
	  <td><?php echo $userid ?></td>  
	  <td><?php echo $content ?></td>  
	  <td><?php echo $time ?></td>  
	  
	  
	  </tr>
	<?php
		$i++;
	}
	
}
?>
</table>
</div>
</body>
</html>
