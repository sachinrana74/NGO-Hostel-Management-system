<?php
include("header.php");
include("databaseconnection.php");
if (isset($delrec))
$delrec=mysql_query("DELETE FROM fees_structure where fee_str_id='$_GET[delid]'",$db);
?>
    <div id="studiv">  <!--  the white area on whch other elements sit-->
        <div class="col_w900 col_w900_last">        

            	
            <h2 class="h2dash"><b>Room Information...</b></h2>
                  <p>
 <table class="tftable" border="0">
<tr>
<td width="132"><strong>Room ID</strong></td>
<td width="100"><strong>Room No</strong></td>
<td width="93"><strong>Number of Beds</strong></td>
<td width="132"><strong>Floor No</strong></td>
<td width="100"><strong>Washrooms</strong></td>
<td width="93"><strong>Cost</strong></td>
<td width="93"><strong>Type</strong></td>
</tr>

<?php


$result = mysql_query("select * from room,room_type where room.rtid=room_type.rtid");

while($rs = mysql_fetch_array($result))
{
	echo "<tr>
	<td> &nbsp; $rs[room_id]</td>
	<td> &nbsp; $rs[room_no]</td>
	<td> &nbsp; $rs[no_of_beds]</td>

    <td> &nbsp; $rs[floor_no]</td>
    <td> &nbsp; $rs[washroom]</td>
    <td> &nbsp; $rs[room_price]</td>
    <td> &nbsp; $rs[room_type]</td>
	</tr>";
}
?>
</table></p>
    
                </div>
</div>          
 
  <div class="cleaner"></div>
		</div>

<?php
include("footer.php");
?>