<?php

include("header.php");
include("databaseconnection.php");
?>
    
    <div id="templatemo_middle_subpage">
    	<h2 align="center">Mess Bill Report</h2>
  </div>
        
    <div id="templatemo_main">

        <div class="col_w900 col_w900_last">
 <table class="tftable" width="851" border="1">
<tr bgcolor="#FFFFCC">
<td><strong>Bill ID</strong></td>
<td><strong>Paid date</strong></td>
<td><strong>Student name</strong></td>
<td><strong>Roll No.</strong></td>
<td><strong>Block</strong></td>
<td><strong>Room No.</strong></td>
<td><strong>Payment type</strong></td>
<td><strong>Paid Amount</strong></td>
</tr>

<?php
$result = mysql_query("SELECT     room.*, blocks.*, billing.*, registration.*, student.*, room.block_id, student.courseid AS Expr1
FROM         billing INNER JOIN
                      registration ON billing.reg_id = registration.reg_id INNER JOIN
                      student ON registration.stid = student.stid INNER JOIN
                      room ON registration.room_id = room.room_id INNER JOIN
                      blocks ON room.block_id = blocks.block_id INNER JOIN
                      course ON student.courseid = course.course_id",$db);
while($rs = mysql_fetch_array($result))
{
echo "<tr>
<td>$rs[billid]</td>
<td>$rs[paid_date]</td>
<td>$rs[name]</td>
<td>$rs[rollno]</td>
<td>$rs[block_name]</td>
<td>$rs[room_no]</td>
<td>$rs[bill_type]</td>
<td>$rs[paid_amt]</td>
</tr>";
}
?>
	
</table>   
<br>
<centeR><button onclick="myFunction()">Print this report</button></centeR>

<script>
function myFunction()
{
window.print();
}
</script>  
<div class="cleaner"></div>
		</div>
        
        <div class="cleaner"></div>
    </div> <!-- end of main -->
        
</div> <!-- end of wrapper -->

<?php
include("footer.php");
?>