<?php
date_default_timezone_set("PRC"); //設定時區
?>
<?php
session_start();
session_destroy();
?>
<html>
<Script language=Javascript>
<!--
  function logout()
  {
   setTimeout("stop()",2000) ;
  }
-->
</script>
<body onload="logout();return true" bgcolor="#ffffdd">
<center>
<h2>登出</h2>
五秒後自動關閉視窗<br /><br />
</center>
<Script Language="Javascript">
<!--
	top.location.href="index.php";
-->
</Script>
</body>
</html>