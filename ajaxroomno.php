<?php
include("databaseconnection.php");

$resultroomsno = mysql_query("SELECT MAX(room_id) FROM room where block_id='$_GET[q]'",$db);
$rsroomsno = mysql_fetch_array($resultroomsno);

$resultroomsno1 = mysql_query("SELECT room_no+1 FROM room where room_id='$rsroomsno[0]'",$db);
$rsroomsno1 = mysql_fetch_array($resultroomsno1);
?>
<input type="text" name="roomno" value="<?php echo $rsroomsno1[0]; ?>" />