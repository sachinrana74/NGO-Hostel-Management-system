<?php
include("databaseconnection.php");
?>
<script type="application/javascript">
function validation()
{
	
	if(document.form1.reg_id.value=="")
	{
		alert("Registation ID should be empty..");
		return false;
	}
	else if(document.form1.fee_str_id.value=="")
	{
		alert("Fee Structure ID should be empty..");
		return false;
	}
		
	else if(document.form1.total_fees.value=="")
	{
		alert("Total Fees should be numeric...");
		return false;
	}
	else
	{
		return true;
	}
}
</script>
<?php

if($_SESSION[insid] == $_POST[insid])
{
	if(isset($_POST[submit]))
	{
			$sql="UPDATE fees SET reg_id='$_POST[reg_id]',fee_str_id='$_POST[fee_str_id]',paid_date='$_POST[paid_date]',invoice_date='$_POST[invoice_date]',total_fees='$_POST[total_fees]',status='$_POST[status]' WHERE fee_id='$_POST[fee_id]'";
		if(!mysqli_query($con,$sql))
		{
			die('ERROR:'. mysqli_error($dbconnection));
		}
		else
		{
			$res="<font color='purple'><strong>Record Updated Successfully......</strong></font><br>";
			$resi=1;
		}
	$result = mysqli_query($dbconnection,"insert into fees(reg_id,fee_str_id,paid_date,invoice_date,total_fees,status)values('$_POST[reg_id]',
	'$_POST[fee_str_id]','$_POST[paid_date]','$_POST[invoice_date]','$_POST[total_fees]','$_POST[status]')");
	
			if(!result)
			{
				echo "Problem in SQL query";
			}
			else
			{
				echo "Inserted successfully...";
			}
			
	}
}

$_SESSION[insid] = rand();

?>
<?php
include("header.php");
?>
    <div id="templatemo_main">
        <div class="col_w900 col_w900_last">        
<div class="col_w580 float_l">            
            	<div class="post_box">            	
                    <h2>Administrator Dashboard</h2>
                  <p>
<form method="post" action="" name="form1" onsubmit="return validation()">
<input type="hidden" name="insid" value="<?php echo $_SESSION[insid]; ?>" />
 <table class="tftable" border="1">
<tr><td>Register id</td><td><input type="text" name="reg_id"></td></tr>
<tr><td>Fee structure id</td><td><input type="text" name="fee_str_id"></td></tr>
<tr><td>Paid date</td><td><input type="date" name="paid_date"></td></tr>
<tr><td>Invoice date</td><td><input type="date" name="invoice_date"></td></tr>
<tr><td>Total fees</td><td><input type="text" name="total_fees"></td></tr>
<tr><td>Status</td>
<td><select name="status">
<option>Enabled</option>
<option>Disabled</option>
</select>
</td>
</tr>
<tr><td colspan="2"><input type="submit" name="submit"></td></tr>
</table>
</form>
</p>
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