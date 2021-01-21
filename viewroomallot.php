<?php
include("header.php");
include("databaseconnection.php");



?>
<?php

?>
    <div id="studiv">
        <div class="" style="padding-left: 100px">
<div class="col_w580 float_l">            
            	<div class="">
                    <h2 class="h2dash"><b>View Room allotment</b></h2>
                  <p>
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
if(isset($_GET["delid"]))
{
$delrec=mysql_query("update student set room_id='NUll' where stid='$_GET[delid]'");
echo "<head><script>alert('Room Unallocated...');</script></head>";
}
?>
 <table class="tftable" width="577" border="1">
<tr>
<td width="125" align="center"><strong>Student ID</strong></td>
<td width="154" align="center"><strong>Name:</strong></td>
<td width="146" align="center"><strong>Room NO</strong></td>
<td width="124" align="center"><strong>Action</strong></td>
</tr>

<?php
$result=mysql_query("SELECT * FROM student,room where room.room_id=student.room_id and status='Enabled'",$db);
while($rs=mysql_fetch_array($result))
{
	echo "<tr>
	<td>$rs[stid]</td>
	<td>$rs[name]</td>
	<td>$rs[room_no]</td>
	<td><a href='viewroomallot.php?delid=$rs[stid]'onclick='return ConfirmDelete()'>Delete</a></td>
	</tr>";
}
?>
</table>
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
  
        
</div> <!-- end of wrapper -->
</div>

<?php
include("footer.php");
?>