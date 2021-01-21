

<?php
include("header.php");
include("databaseconnection.php");
if(isset($_GET["stid"]))
{
$delrec=mysql_query("update student set status='Enabled'  where stid=$_GET[stid]");

}
?>
    <div id="studiv">
        <div class="col_w900 col_w900_last">        
<div class="col_w580 float_l">            
            	     	
                    <h2>View registration details</h2>
<p>

 <table class="tftable" width="922" border="1">
<tr align="center">
<td><strong>Name</strong></td>
<td><strong>Course ID</strong></td>
<td><strong>Roll No</strong></td>
<td><strong>Date of Birth</strong></td>
<td><strong>Gender</strong></td>
<td><strong>Status</strong></td>

</tr>
<tr>
<?php
	
//$result3=mysql_query("SELECT * FROM student left join course ON course.course_id = student.courseid where stid='$rs[stid]' and ",$db);
$result3=mysql_query("SELECT * FROM student WHERE student.status='Disable'",$db);
while($rs3=mysql_fetch_array($result3))
{
	echo "<tr><td>$rs3[name]</td><td>$rs3[courseid]</td><td>$rs3[rollno]</td><td>$rs3[dob]</td>
	<td>$rs3[gender]</td>";
	

	if($rs3["status"]=='disable')
	{
		echo "<td><a href=viewregistration?stid=$rs3[stid]><button name=sub>Disable</button></td></tr>";
	}
	
}	
/*$resultroom1=mysql_query("SELECT * FROM room where room_id='$rs[room_id]'",$db);
$rsroom1 =mysql_fetch_array($resultroom1);
echo "Room No.: $rsroom1[room_no]<br>";
echo "No. of Beds: $rsroom1[no_of_beds]<br>";

$resultblock2= mysql_query("SELECT * FROM blocks where block_id='$rsroom1[block_id]'",$db);
$rsblock2=mysql_fetch_array($resultblock2);
echo "Block Name: $rsblock2[block_name]<br>";

	echo "</td>
	<td>&nbsp; $rs[stud_type]</td>
	<td>
	&nbsp; Start date: $rs[start_date]<br>
	&nbsp; End date: $rs[end_date]</td>
	<td>&nbsp;
	Food type: $rs[food_type]<br>
	&nbsp;&nbsp;Beverage type: $rs[beverage_type]</td>
	<td align='center'>
	$rs[status]<br>
	<a href='viewregistration.php?delid=$rs[reg_id]' onclick='return ConfirmDelete()'>Delete</a></td>
	</tr>";*/

?>
</table>
	</p>
<div class="cleaner"></div>
                </div>
</div>           
            <div class="col_w280 float_r">
            <?php
			//include("sidebar.php");
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