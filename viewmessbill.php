<?php

include("header.php");
include("databaseconnection.php");
?>
    
    <div id="templatemo_middle_subpage">
    	<h2 align="center">Mess Bill Report</h2>
  </div>
        
    <div id="templatemo_main">

        <div class="col_w900 col_w900_last">
 <table class="tftable" width="924" border="1">
<tr bgcolor="#FFFFCC">
<td width="102"><strong>Name</strong></td>
<td width="99"><strong>Roll No.</strong></td>
<td width="134"><strong>Start date.</strong></td>
<td width="102"><strong>End date.</strong></td>
<td width="88"><strong>Food type</strong></td>
<td width="144"><strong>Beverage type</strong></td>
<td width="88"><strong>Date</strong></td>
<td width="115"><strong>Mess bill</strong></td>
</tr>

<?php
$result = mysql_query("SELECT     registration.*, mess_bill.*, student.*
FROM         mess_bill INNER JOIN
                      registration ON mess_bill.reg_id = registration.reg_id RIGHT OUTER JOIN
                      student ON registration.stid = student.stid",$db);
while($rs = mysql_fetch_array($result))
{
echo "<tr>
<td>$rs[name]</td>
<td>$rs[rollno]</td>
<td>$rs[start_date]</td>
<td>$rs[end_date]</td>
<td>$rs[food_type]</td>
<td>$rs[beverage_type]</td>
<td>$rs[12]</td>
<td>$rs[mess_bill]</td>
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