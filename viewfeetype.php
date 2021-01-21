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
$delrec=mysqli_query($dbconnection,"DELETE FROM fees_structure where fee_str_id='$_GET[delid]'");
?><?php
include("header.php");
?>
    <div id="templatemo_main">
        <div class="col_w900 col_w900_last">        
<div class="col_w580 float_l">            
            	<div class="post_box">            	
                    <h2>View fee types</h2>
                  <p>
 <table class="tftable" width="582" border="1">
<tr>
<td width="132"><strong>Fee type</strong></td>
<td width="100"><strong>Course</strong></td>
<td width="93"><strong>Cost</strong></td>
<td width="93"><strong>Status</strong></td>
<td width="131"><strong>Action</strong></td>
</tr>

<?php


$result = mysqli_query($dbconnection,"SELECT     fees_structure.*, course.*
FROM         fees_structure LEFT OUTER JOIN
                      course ON fees_structure.course_id = course.course_id");

while($rs = mysqli_fetch_array($result))
{
	echo "<tr>
	<td>$rs[fee_type]</td>
	<td>$rs[course_name]</td>
	<td>$rs[cost]</td>
	<td>$rs[8]</td>
	<td>
	<a href='feetype.php?editid=$rs[fee_str_id]' >Edit</a> | 
	<a href='viewfeetype.php?delid=$rs[fee_str_id]'onclick='return ConfirmDelete()'>Delete</a></td>
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