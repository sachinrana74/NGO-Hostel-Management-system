<?php
session_start();  // Developed by www.freestudentprojects.com
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
include("databaseconnection.php");
$delrec=mysqli_query($dbconnection,"DELETE FROM employee where emp_id='$_GET[delid]'");
?>
<?php
include("header.php");
?>
    <div id="templatemo_main">
        <div class="col_w900 col_w900_last">        
<h1>View Employees</h1>

<?php

$resultblocks = mysqli_query($dbconnection,"SELECT * FROM  blocks where status='Enabled'");
while($rsblocks = mysqli_fetch_array($resultblocks))
{
?>
<p>
<h2>Block Name: <?php echo $rsblocks[block_name]; ?></h2>		
 <table class="tftable" width="899" border="1"><tr>
<td><strong>name</strong></td> 
<td><strong>gender</strong></td> 
<td><strong>login_id</strong></td>
<td><strong>emp_type</strong></td>
<td><strong>dob</strong></td>
<td><strong>doj</strong></td>
<td><strong>address</strong></td>
<td><strong>Action</strong></td>
</tr>

<?php

$result=mysqli_query($dbconnection,"SELECT * FROM employee where block_id='$rsblocks[block_id]'");
while($rs=mysqli_fetch_array($result))
{
	echo"<tr>
	<td>$rs[emp_name]</td>
	<td>$rs[gender]</td>
	<td>$rs[login_id]</td>
	<td>$rs[emp_type]</td>
	<td>$rs[dob]</td>
	<td>$rs[doj]</td>
	<td>$rs[address]</td>
	<td>$rs[status]<br />
<a href='employee.php?editid=$rs[emp_id]'>Edit</a><br />
<a href='viewemployee.php?delid=$rs[emp_id]' onclick='return ConfirmDelete()'>Delete</a></td>

</tr>";
}
?>
</table>
</p>
<br />
<hr />
<?php
}
?>           
          <div class="cleaner"></div>
		</div>
        
        <div class="cleaner"></div>
    </div> <!-- end of main -->
        
</div> <!-- end of wrapper -->


<?php
include("footer.php");
?>