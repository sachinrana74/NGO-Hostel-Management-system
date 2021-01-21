<?php
include("header.php");
include("databaseconnection.php");
?>
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
$delrec=mysql_query("DELETE FROM student where stid='$_GET[delid]'",$db);
?>

<div id="studiv">

        <div class="col_w900 col_w900_last">
        <h2>View students</h2>
         <table class="tftable" width="915" border="1">
<tr>
<td width="143"><div align="center"><strong>Name</strong></div></td>
<td width="114"><div align="center"><strong>Course details</strong></div></td>
<td width="138"><div align="center"><strong>Profile</strong></div></td>
<td width="183"><div align="center"><strong>Parents</strong></div></td>
<td width="195"><div align="center"><strong>Contact Info</strong></div></td>
<td width="102"><div align="center"><strong>Action</strong></div></td>
</tr>

<?php
$result=mysql_query("SELECT * FROM student,parents,course where course.course_id = student.courseid and student.stid=parents.stid ",$db);
while($rs=mysql_fetch_array($result))
{
	echo "<tr>
	<td>$rs[2]</td>
	<td>
	Course: $rs[course_name]<br>
	Roll No.: $rs[rollno]</td>
	<td>DOB: $rs[dob]
	<br> Gender: $rs[gender]
	<br>Blood group: $rs[blood_group]
	</td>
	<td>Parents's Name: $rs[name]
	
	</td>
	<td>$rs[address]
	<br>Contact No. $rs[contact_no]
	<br>Parents No. $rs[cno]</td>
	<td align='center'>Status: $rs[status]<br>
		<a href='viewstudent.php?delid=$rs[stid]'onclick='return ConfirmDelete()'>Delete</a>
	</td>
	</tr>";
/*	<a href='viewstudentdetails.php?studentid=$rs[stid]'>View</a><br>
	<a href='viewstudent.php?delid=$rs[stid]'onclick='return ConfirmDelete()'>Delete</a>
	</td>
	</tr>";*/
}
?>
</table>
        </div>
</div>
</div>
<?php
include("footer.php");
?>