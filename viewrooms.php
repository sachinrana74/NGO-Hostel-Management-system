<?php

include("header.php");
include("databaseconnection.php");
if(isset($_GET["delid"]))
{
$resultdelid = mysql_query("DELETE FROM room where room_id='$_GET[delid]'",$db);
echo "<head><script>alert('Room deleted successfully...');</script></head>";
}

?>
<div id="studiv">

        <div class="col_w900 col_w900_last">
         
	<div class="">
        <h2 class="h2dash"><b>View Rooms</b></h2>
                  <p>              
                  <form method="get" action="">
                     <table class="tftable" height="104" border="1" align="center">
  <tr>
  <td height="28" colspan="2" align="center">Select Room</td>
  </tr>
<tr><td width="123" height="38">Room No:</td><td width="219">
<select name="rno">
<option value="">Select</option>
<?php
$resultblocks = mysql_query("SELECT room_no FROM room ",$db);
while($rsblocks = mysql_fetch_array($resultblocks))
{ 
 	echo "<option value='$rsblocks[room_no]'>$rsblocks[room_no]</option>";

}
?>
</select>
</td></tr>
<tr><td height="28" colspan="2" align="center"><input type="submit" name="submit" class="but-s" /></td></tr>
</table>
</form>
<hr />
</p>
		<div class="cleaner"></div>
    </div>
   
		</div>
        

   
        <div class="col_w900 col_w900_last">

    
<?php
if(isset($_GET["submit"]))
{
  
$resultrooms = mysql_query("SELECT * FROM `room`,room_type  WHERE room_type.rtid = room.rtid and room_no=$_GET[rno]") or die(mysql_error());


while($rsrooms = mysql_fetch_array($resultrooms))
{
  
/*$resultblocks1 = mysql_query("SELECT * FROM blocks where block_id='$rsrooms[block_id]' AND status = 'Enabled'",$db);
$rsblocks1 = mysql_fetch_array($resultblocks1);*/
	echo "<li><center> <a href='viewrooms.php?delid=$rsrooms[room_id]'>Delete</a></center><hr>
	<center><strong><font size='3'>Room No. : $rsrooms[room_no]</font></strong></center><br>
	<strong>&nbsp;&nbsp;Floor No: </strong> $rsrooms[floor_no]<br>
  <strong>&nbsp;&nbsp;Washroom: </strong> $rsrooms[washroom]<br>
  <strong>&nbsp;&nbsp;Description: </strong> $rsrooms[description]<br>
  <strong>&nbsp;&nbsp;Cost: </strong> $rsrooms[room_price]<br>
  <strong>&nbsp;&nbsp;Type: </strong> $rsrooms[room_type]<br>
	<strong>&nbsp;&nbsp;No. of Beds: </strong>";
	echo $rsrooms["no_of_beds"];
	echo "<br><br>
	</li>";   
}
}
?>                                   
                </ul>
            <div class="cleaner"></div>
        </div>
    </div>

<?php
include("footer.php");
?>