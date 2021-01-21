<?php
include("header.php");
include("databaseconnection.php");
$resi=0;
?>
<script type="application/javascript">
function validation()
{
	var dateOne = new Date(document.form1.start_date.value); //Year, Month, Date
    var dateTwo = new Date(document.form1.enddate.value); //Year, Month, Date
    if(document.form1.messcardtype.value=="")
	{
		alert("Messcard Type should not  be empty..");
		return false;
	}
	else if(document.form1.start_date.value=="")
	{
		alert("Start date should not  be empty..");
		return false;
	}
	else if(document.form1.enddate.value=="")
	{
		alert("End date should not  be empty..");
		return false;
	}
	else if(dateOne > dateTwo)
	 {
		alert("Start date and End date not valid..");
		return false;
    }
	else
	{
		return true;
	}
}
</script>
<?php
if(isset($_POST["submit"]))
{
$result = mysql_query("insert into messcard(reg_id,messcard_type,start_date,enddate,status)values('$_GET[regid]','$_POST[messcardtype]','$_POST[start_date]','$_POST[enddate]','Enabled')",$db);
			if(!$result)
			{
				echo "Problem in SQL query". mysqli_error();
			}
			else
			{
				$res = "Inserted successfully...";
				$resi = 1;
			}
}


$_SESSION["insid"] = rand();

$resultstinfo = mysql_query("SELECT     registration.*, student.*, student.stid AS Expr1 FROM         student INNER JOIN  registration ON student.stid = registration.stid WHERE     (student.stid = '$_GET[studentid]')",$db);
$rsstinfo =mysql_fetch_array($resultstinfo);

?>
    <div id="templatemo_main">
        <div class="col_w900 col_w900_last">        
<div class="col_w580 float_l">            
            	<div class="post_box">            	
                    <h2>Add Mess card</h2>
                  <p>

<?php
if(isset($resi))
if($resi == 1)
{
	echo "<h1>Record inserted successfully..</h1>";
}
else
{
?>
<form method="post" action="" name="form1" onsubmit="return validation()">
<input type="hidden" name="insid" value="<?php echo $_SESSION['insid']; ?>" />
 <table class="tftable" width="475" border="1">
<tr>
  <td>&nbsp;Name</td>
  <td>&nbsp;<?php echo $rsstinfo["name"]; ?></td>
</tr>
<tr><td width="87">&nbsp;Roll No. </td><td width="215">&nbsp;<?php echo $rsstinfo["rollno"]; ?> </td></tr>
<tr><td>&nbsp; Food type</td><td><?php echo $rsstinfo["food_type"]; ?></td></tr>
<tr><td width="87">&nbsp;Beverage type. </td><td><?php echo $rsstinfo["beverage_type"]; ?></td></tr>
<tr><td width="87">&nbsp;Messcard type. </td><td>
<select name="messcardtype">
<option value="Temporary">Temporary</option>
<option value="Permenent">Permenent</option>
</select>
</td></tr>
<tr><td>&nbsp; Start date</td><td><input type="date" name="start_date"></td></tr>
<tr><td>&nbsp; End date</td><td><input type="date" name="enddate"></td></tr>
<tr><td>&nbsp; Status</td><td>
<select name="status">
<option value="Enabled">Enabled</option>
<option value="Disabled">Disabled</option>
</select>
</td>
</tr>
<tr><td colspan="2"><input type="submit" name="submit"></td></tr>
</table>
</form>
<?php
}
?>
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