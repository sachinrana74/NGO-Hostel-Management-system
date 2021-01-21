<?php
session_start();  // Developed by www.freestudentprojects.com  // Developed by www.freestudentprojects.com
include("databaseconnection.php");
?>
<script type="application/javascript">
function validation()
{
	var paidamt = parseFloat(document.form1.paidamt.value);
	var remainingfee = parseFloat(document.form1.remainingfee.value);
	if(document.form1.billtype.value=="Select")
	{
		alert("Bill type is not selected..");
		return false;
	}
	else if(document.form1.paidamt.value=="")
	{
		alert("Paid amount should not be empty..");
		return false;
	}
	else if(document.form1.paidamt.value<=0)
	{
		alert("Paid amount Not valid...");
		document.form1.paidamt.value ="";
		document.form1.paidamt.focus();
		return false;
	}
	else if(paidamt >  remainingfee)
	{
		alert("Paid amount greater than Remaining amount..");
		document.form1.paidamt.value ="";
		document.form1.paidamt.focus();
		return false;	
	}

	else if(document.form1.paiddate.value=="")
	{
		alert("Paid date should not be empty..");
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
		if(isset($_GET[editid]))
		{
		$sql="UPDATE billing SET bill_id='$_POST[billid]',payment_id='$_POST[paymentid]',bill_type='$_POST[billtype]',paid_amt='$_POST[paidamt]',paid_date='$_POST[paiddate]',status='$_POST[status]' WHERE bill_id='$_POST[bill_id]'";
			if(!mysqli_query($con,$sql))
			{
				die('ERROR:'. mysqli_error($dbconnection));
			}
			else
			{
				$res="<font color='purple'><strong>Record Updated Successfully......</strong></font><br>";
				$resi=1;
			}
		}
		else
		{
			$result = mysqli_query($dbconnection,"insert into billing(reg_id,bill_type,paid_amt,paid_date,status) 
			values('$_GET[regid]','$_POST[billtype]','$_POST[paidamt]','$_POST[paiddate]','Enabled')");
	
			if(!result)
			{
				echo "Problem in SQL query";
			}
			else
			{
				$msg ="<h1 align='center'>Payment record inserted successfully...</h1>";
				$msgi = 1;
			}
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
                    <h2>Fees payment Form</h2>
                  <p>
<form method="post" action="" name="form1" onsubmit="return validation()">

   <h2>Invoice details  </h2>


<?php
$result=mysqli_query($dbconnection,"SELECT * FROM fees where reg_id='$_GET[regid]'");
?>
     <table class="tftable" width="922" border="1">
    <tr align="center" bgcolor="#FFFFCC">
    <td height="23"><strong>Particulars</strong></td>
    <td><strong>Invoice Date</strong></td>
    <td><strong>Cost</strong></td>
    </tr>
    
    <?php
    $totalfee=0;
    
    while($rs=mysqli_fetch_array($result))
    {
        echo "<tr>
        <td>&nbsp; Establishment Fee</td>
        <td align='center'>$rs[invoice_date]</td>
        <td align='center'>&nbsp; Rs.  $rs[total_fees] </td>	
        </tr>";
        $totalfee = $totalfee + $rs[total_fees];
    }
    
    $result=mysqli_query($dbconnection,"SELECT * FROM mess_bill where reg_id='$_GET[regid]'");
    while($rs=mysqli_fetch_array($result))
    {
        echo "<tr>
        <td>&nbsp; Mess Advance</td>
        <td align='center'>$rs[date]</td>
        <td align='center'>&nbsp; Rs.  $rs[mess_bill] </td>	
        </tr>";
        $totalfee = $totalfee + $rs[mess_bill];
    }
    
        echo "<tr bgcolor='#99FFFF'>
        <td colspan='2'  align='center'>&nbsp; <strong>Total Invoice : </strong></td>
        <td align='center'>&nbsp;<strong> Rs.  $totalfee </strong></td>	
        </tr>";
    ?>
    </table>

<br />
<hr />
 <h2>Payment details  </h2>
    
 <table class="tftable" width="922" border="1">
<tr align="center" bgcolor="#FFFFCC">
<td height="23"><strong>Payment type</strong></td>
<td><strong>Date</strong></td>
<td><strong>Paid Amount</strong></td>
</tr>
<?php
$paidfee = 0;
$result=mysqli_query($dbconnection,"SELECT * FROM billing where reg_id='$_GET[regid]'");
while($rs=mysqli_fetch_array($result))
{
	echo "<tr>
	<td>&nbsp; $rs[bill_type]</td>
	<td align='center'>$rs[paid_date]</td>
	<td align='center'>&nbsp; Rs.  $rs[paid_amt] </td>	
	</tr>";
	$paidfee = $paidfee  + $rs[paid_amt];
}

	echo "<tr bgcolor='#99FFFF'>
	<td colspan='2'  align='center'>&nbsp; <strong>Total Paid amount: </strong></td>
	<td align='center'>&nbsp;<strong> Rs.  $paidfee </strong></td>	
	</tr>";
	$remainingfee = $totalfee - $paidfee;
	echo "<tr bgcolor='#99FFFF'>
	<td colspan='2'  align='center'>&nbsp; <strong>Remaining Fee: </strong></td>
	<td align='center'>&nbsp;<strong> Rs.  $remainingfee </strong></td>	
	</tr>";
?>

</table>
<br />
<?php
if($msgi == 1)
{
	echo $msg;
?>

<?php	
}
else
{
?>
<input type="hidden" name="remainingfee" value="<?php echo $remainingfee; ?>" />
<input type="hidden" name="insid" value="<?php echo $_SESSION[insid]; ?>" />
 <table class="tftable" width="555" border="1" align="center">
<tr>
  <td><strong>Payment type</strong></td>
  <td><select name="billtype">
    <option value="Select">Select</option>
    <option value="Cash">Cash</option>
    <option value="Credit card">Credit card</option>
    <option value="Debit card">Debit card</option>
  </select>
</td></tr>
<tr><td><strong>Paid Amount </strong></td><td><input type="text" name="paidamt"></td></tr>
<tr><td><strong>Paid Date </strong></td><td><input type="date" name="paiddate"></td></tr>
<tr><td colspan="2" align="center"><input name="submit" type="submit" value="Make payment"></td></tr>
<?php
}
?>
</table>
</form>
<strong><a href='viewstudentdetails.php?studentid=<?php echo $_GET[studentid]; ?>'>Back</a></strong>
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