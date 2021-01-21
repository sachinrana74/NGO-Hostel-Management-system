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
$delrec=mysqli_query($dbconnection,"DELETE FROM course where course_id='$_GET[delid]'");

?>
<?php
include("header.php");
?>
    <div id="templatemo_main">
        <div class="col_w900 col_w900_last">        
<div class="col_w580 float_l">            
            	<div class="post_box">            	
                    <h2>View course</h2>
                  <p>
 <table class="tftable" width="486" border="1">
<tr>
<td>Course name</td>
<td>No of year</td>
<td>Status</td>
<td>Action</td>
</tr>
<?php
$result = mysqli_query($dbconnection,"SELECT * from course");
while($rs = mysqli_fetch_array($result))
{
	echo "<tr>
	<td>$rs[course_name]</td>
	<td>$rs[no_of_year]</td>
	<td>$rs[status]</td>
	<td>
	<a href='course.php?editid=$rs[course_id]'>Edit</a> | 
	<a href='viewcourse.php?delid=$rs[course_id]'onclick='return ConfirmDelete()'>Delete</a></td>
	</tr>";
}
?>
</table></p>
<div class="cleaner"></div>
                </div>
</div>           
            <div class="col_w280 float_r">
            <?php
			include("sidebar.php");
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