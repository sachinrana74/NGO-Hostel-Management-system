<?php

include("header.php");
include("databaseconnection.php");
?>        

<div id="templatemo_main">
<div class="col_w900 col_w900_last">
		<script>
function ConfirmDelete()
{
	var result=confirm("Are you sure want to delete this record?");
	if(result==true)
	{
		return true;
	}
	else
	{
		return false;
	}
}
</script>



<?php
if(isset($_GET["delido"]))
$delrec=mysql_query("DELETE FROM messcard where messcardid='$_GET[delid]'",$db);

?>
<h1>View Mess card</h1>
 <table class="tftable" width="584" border="1">
<tr align="center"> 
<td><strong>Registration ID</strong></td>
<td><strong>Messcard type</strong></td>
<td><strong>Start date</strong></td>
<td><strong>End date</strong></td>
<td><strong>Action</strong></td>
</tr>

<?php
$result=mysql_query("SELECT * FROM messcard",$db);
while($rs=mysql_fetch_array($result))
{
	echo "<tr>
	<td>$rs[reg_id]</td>
	<td>$rs[messcard_type]</td>
	<td>$rs[start_date]</td>
	<td>$rs[enddate]</td>
	<td align='center'><a href='viewmesscard.php?delid=$rs[messcardid]'onclick='return ConfirmDelete()'>Delete</a></td>
	</tr>";
}
?>
</table>
        <div class="cleaner"></div>
  </div> <!-- end of main -->
        
</div> <!-- end of wrapper -->

<?php
include("footer.php");
?>