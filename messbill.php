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
	else if(document.form1.messbill.value=="")
	{
		alert("Mess Bill should be numeric...");
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
		$sql="UPDATE messbill SET bill_id='$_POST[billid]',payment_id='$_POST[paymentid]',bill_type='$_POST[billtype]',paid_amt='$_POST[paidamt]',paid_date='$_POST[paiddate]',status='$_POST[status]' WHERE bill_id='$_POST[bill_id]'";
		if(!mysqli_query($con,$sql))
		{
			die('ERROR:'. mysqli_error($dbconnection));
		}
		else
		{
			$res="<font color='purple'><strong>Record Updated Successfully......</strong></font><br>";
			$resi=1;
		}
	$result = mysqli_query($dbconnection,"insert into mess_bill(mess_bill_id,reg_id,fee_str_id,date,mess_bill,status)values('$_POST[mbid]',
	'$_POST[regid]','$_POST[feestrid]','$_POST[date]','$_POST[messbill]','$_POST[status]')");
	
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
<tr><td>Mess Bill id </td><td><input type="text" name="mbid"></td></tr>
<tr><td>Register id </td><td><input type="text" name="regid"></td></tr>
<tr><td>Fees Structure id </td><td><input type="text" name="feestrid"></td></tr>
<tr><td>Date</td><td><input type="date" name="date"></td></tr>
<tr><td>Mess Bill </td><td><input type="text" name="messbill"></td></tr>
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