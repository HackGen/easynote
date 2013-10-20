<?php
#查詢Mssql函式
require_once('MDB2.php');

function connect2db($DBMS, $dbhost, $dbuser, $dbpwd, $dbname) {
    $dsn = "$DBMS://$dbuser:$dbpwd@$dbhost/$dbname";
    $db = MDB2::connect($dsn);
    if (MDB2::isError($db)) {
        die ($db->getMessage('MySQL 無法連結資料庫'));
    }
    $db->exec('SET NAMES UTF8');  
    return $db;
}

function querydb($querystr, $dbconn) {
    $dbconn->setFetchMode(MDB2_FETCHMODE_ASSOC);
    $rs = $row = array();
    $result = $dbconn->query($querystr);
    if (MDB2::isError ($result)) return $rs;
    if ($result->numRows() == 0) return $rs;
    $Index = 0;
    while ($row = $result->fetchRow()) {
        $rs[$Index++] = $row;
    }
    return $rs;
}
function updatedb($querystr, $dbconn) {
    $result = $dbconn->query($querystr);
    if (!$result) die('無法新增或異動資料..');
    return $result;
}

// 簡單XSS防護
function xssfix($InString) {
    return htmlspecialchars($InString);
}
?>
