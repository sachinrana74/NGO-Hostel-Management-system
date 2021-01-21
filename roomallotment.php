<?php
include("header.php");
include("databaseconnection.php");
?>
<script type="application/javascript">
function validation()
{
	if(document.form1.room_no.value=="")
	{
		alert("Room No should not be Empty...");
		return false;
	}
	else if(document.form1.stid.value=="")
	{
		alert("Student ID should not be Empty...");
		return false;
	}
	else
	{
		return true;
	}
}
</script>
<?php
	if(isset($_POST["submit"]))
	{
					$sql="UPDATE student SET room_id=$_POST[room_no] where stid=$_POST[stid]";
					
					mysql_query($sql) or die(mysql_error());

					echo "<head><script>alert('Room Alloted successfully...');</script></head>";
				 	}

?>
<?php

?>
    <div id="studiv">
        <div class="col_w900 col_w900_last" >
<div class="col_w580 float_l">            
            	<div class="" style="padding-left: 100px">
                    <h2 class="h2dash"><b>Room allotment</b></h2>
                  <p>
<form method="post" action="" name="form1" onsubmit="return validation()">
<input type="hidden" name="insid" value="" />
 <table class="tftable" border="1">
<?php
if(isset($resi))
if($resi == 1)
{
	echo "<tr><td colspan=2>$res</td></tr>";
}
?>
<!-- <tr>
  <td width="120">Room Type</td><td width="240">
  <select name="type" >
<option value="">Select</option>
<?php
$resultblocks = mysql_query("SELECT room.rtid,room_type as type FROM `room`,room_type  WHERE room_type.rtid = room.rtid GROUP by room_type.rtid",$db);
while($rsblocks = mysql_fetch_array($resultblocks))
{		echo "<option value='$rsblocks[rtid]'>$rsblocks[type]</option>";	

}
?>
</select></td></tr> -->
<tr>
<td>Student ID</td>
<td><select name="stid">
  <option value="">Select</option>
<?php  
$resultcourse = mysql_query("SELECT * FROM student where status = 'Enabled' ",$db);
while($rscourse = mysql_fetch_array($resultcourse))
{	echo "<option value='$rscourse[stid]'>$rscourse[name]</option>";	

}
?>
</select>
</td> </tr>


<tr>
<td>Room NO</td>
<td><select name="room_no">
  <option value="">Select</option>
<?php  
$resultcourse = mysql_query("SELECT * FROM room order by room_no",$db);
while($rscourse = mysql_fetch_array($resultcourse))
{	echo "<option value='$rscourse[room_id]'>$rscourse[room_no]</option>";	

}
?>
</select>
</td> </tr>



<tr><td colspan="2"><input type="submit" name="submit" class="but-s"></td></tr>
</table>
</form>
</p>
<div class="cleaner"></div>
                </div>
</div>           
            <div class="col_w280 float_r">
            <?php
//			include("sidebar.php");
			?>   
            </div>            
            <div class="cleaner"></div>
		</div>
        
        <div class="cleaner"></div>
    </div> <!-- end of main -->
        
</div> <!-- end of wrapper -->


<?php
include("footer.php");
?>