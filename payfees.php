<?php
include("header.php");
include("databaseconnection.php");
$dt = date("Y-m-d");
if(isset($_POST["submit"]))
{
$feetype = $_POST["feetype"];
$cost	= $_POST["cost"];
$fee_str_id = $_POST["fee_str_id"];


 $resultfee=mysql_query("SELECT * FROM fees_structure where course_id='$_GET[courseid]'");
    while($rsfee=mysql_fetch_array($resultfee))
    {
		if($rsfee["fee_type"] == "Mess Advance")
		{
	$result = mysql_query("insert into mess_bill(reg_id,fee_str_id,date,mess_bill,status)values('$_GET[regid]','$rsfee[fee_str_id]','$dt','$rsfee[cost]','Enabled')");		
		}
		else
		{
	$result = mysql_query("insert into fees(reg_id,fee_str_id,total_fees,invoice_date,status)values('$_GET[regid]','$rsfee[fee_str_id]','$rsfee[cost]','$dt ','Enabled')");			
		}
	}
}

?>
    <div id="templatemo_main">
        <div class="col_w900 col_w900_last">        
<div class="col_w580 float_l">            
            	<div class="post_box">      
<?php
if(isset($_POST["submit"]))
{
	echo "<h1>Invoice generated successfully...</h1>";
}
else
{
?>                      	
<form method="post" action="">
 <table class="tftable" width="922" border="1">
    <tr align="center" bgcolor="#FFFFCC">
    <td height="23"><strong>Particulars</strong></td>
    <td><strong>Invoice Date</strong></td>
    <td><strong>Cost</strong></td>
    </tr>
    
    <?php
	$dt = date("d-m-Y");
    $totalfee=0;
    $result=mysql_query("SELECT * FROM fees_structure");
    while($rs=mysql_fetch_array($result))
    {
        echo "<tr>
        <td>&nbsp; $rs[fee_type] </td>
        <td align='center'>$dt</td>
        <td align='center'>&nbsp; Rs.  $rs[cost] </td>	
        </tr>";
			echo "<input type='hidden' name='fee_str_id[]' value='$rs[fee_str_id]' >";
			echo "<input type='hidden' name='feetype[]' value='$rs[fee_type]' >";
			echo "<input type='hidden' name='cost[]' value='$rs[cost]' >";
        $totalfee = $totalfee + $rs["cost"];
    }
    
        echo "<tr bgcolor='#99FFFF'>
        <td colspan='2'  align='center'>&nbsp; <strong>Total Invoice : </strong></td>
        <td align='center'>&nbsp;<strong> Rs.  $totalfee </strong></td>	
        </tr>";
    ?>
</table>
<br>
<p align="center">
<input type="submit" name="submit" value="Create Invoice"></p>
</form>
<?php
}
?>
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