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

$userid = $_SESSION['loginID'];
//echo $_SESSION['loginID'];


?>
<html>
<head>
<style type="text/css">
body,td,th {
	color: #000000;
}
body {
	background-attachment: fixed; 
	background-position:center;
	background-size:90% 90%;
	background-repeat: no-repeat;
}
</style>
</head>
<body>
<table >
<tr >
	<th>Date</th>
	<th>Type</th>
	<th>NoteID</th>
	<th>Link</th>
<?php
//echo $typeid;

$sqlcmd = "SELECT * FROM `note` WHERE userid = '$userid'  ";
$rs = querydb($sqlcmd, $db_conn);


	$i=0;
	foreach ($rs as $item)
	{
		$sqlcmd = "SELECT * FROM `note` WHERE userid = '$userid'  ";
		$dogdb = querydb($sqlcmd, $db_conn);

		$noteid = $dogdb[$i]['noteid'];
		$typeid = $dogdb[$i]['typeid'];
		$content = $dogdb[$i]['content'];
		$time = $dogdb[$i]['time'];
		//echo $content;
		//echo "140.129.6.67:4010/i4010/ttt/files/".$content ;
	 ?>
	  <tr align="center">
		<td><?php echo $time ?></td> 
	  <td><?php echo $typeid ?></td>  
	  <td><?php echo $noteid ?></td>  
	  <td><a href = "http://140.129.6.67:4010/i4010/ttt/files/<?php echo $content ?>" target="_new"><?php echo $content ?> </td>  
	  
	  
	  </tr>
	<?php
		$i++;
		
		
	}
	

?>
</table>


</body>
</html>