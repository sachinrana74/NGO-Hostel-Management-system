<?php
session_start();  // Developed by www.freestudentprojects.com
include("databaseconnection.php");
?>
<script type="application/javascript">
function validation()
{
	
	if(document.form1.feetype.value=="")
	{
		alert("Fees Type should not be empty..");
		return false;
	}
	else if(document.form1.course.value=="")
	{
		alert("Course should be not be empty...");
		return false;
	}
	else if(document.form1.cost.value=="")
	{
		alert("Cost should not be empty...");
		return false;
	}
	else if(isNaN(document.form1.cost.value) == true)
	{
		alert("Cost should be numeric..");
		document.form1.cost.value = "";
		document.form1.cost.focus();
		return false;		
	}
	else
	{
		return true;
	}
}
</script>
<?php
if($_SESSION[insid]==$_POST[insid])
{
	if(isset($_POST[submit]))
	{
		if(isset($_GET[editid]))
		{
		$sql="UPDATE fees_structure SET fee_type='$_POST[feetype]',course_id='$_POST[course]',cost='$_POST[cost]',status='$_POST[status]' WHERE fee_str_id='$_GET[editid]'";
			if(!mysqli_query($dbconnection,$sql))
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
			$sqlquery1 = "SELECT * FROM fees_structure WHERE (fee_type='$_POST[feetype]' OR fee_type='$_POST[feetype]') AND course_id='$_POST[course]'";
			$sqlqueryresult1 = mysqli_query($dbconnection,$sqlquery1);
			echo mysqli_num_rows($sqlqueryresult1) ;
				if(mysqli_num_rows($sqlqueryresult1) == 0)
				{
				$result=mysqli_query($dbconnection, "INSERT INTO fees_structure(fee_type,course_id,cost,status)values('$_POST[feetype]','$_POST[course]','$_POST[cost]','$_POST[status]')");
					if(!result)
					{
						echo "problem in sql statement";
					}
					else
					{
						$res = "successfully inserted";
						$resi=1;
					}
				}
				else
				{
						$res = "Fee type already exit ";
						$resi=1;					
				}

		}
	}
}
	$_SESSION[insid]==rand();

$sqlquery = "SELECT * FROM fees_structure WHERE fee_str_id='$_GET[editid]'";
$sqlqueryresult = mysqli_query($dbconnection,$sqlquery);
$sqlfetch = mysqli_fetch_array($sqlqueryresult);

include("header.php");
?>
    <div id="templatemo_main">
        <div class="col_w900 col_w900_last">        
<div class="col_w580 float_l">            
            	<div class="post_box">            	
                    <h2>Fee type</h2>
                  <p>

    
<form method="post" action=""  name="form1" onsubmit="return validation()">
<input type="hidden" name="insid" value="<?php echo $_SESSION[insid];?>"/>
 <table class="tftable" width="406" height="181" border="2">
<?php
if($resi== 1)
{
echo "<tr><td colspan='2'> $res </td></tr>";
}
?>
<tr><td>Fee type</td><td>
<select name="feetype">
<?php
$arr = array("Select","Establishment Fee","Mess Advance","Others");
foreach($arr as $value)
{
	if($value == $sqlfetch[fee_type])
	{
		echo "<option value='$value' selected>$value</option>";
    }
	else
	{
		echo "<option value='$value'>$value</option>";		
	}
}
?>
</select>
</td></tr>
<tr><td>Course</td><td> 
<select name="course">
  <option value="">Select</option>
<?php  
$resultcourse = mysqli_query($dbconnection,"SELECT * FROM course where status = 'Enabled' ");
while($rscourse = mysqli_fetch_array($resultcourse))
{  
	if($rscourse[course_id] == $sqlfetch[course_id])
	{
	echo "<option value='$rscourse[course_id]' selected>$rscourse[course_name]</option>";
	}
	else
	{
	echo "<option value='$rscourse[course_id]'>$rscourse[course_name]</option>";	
	}
}
?>
</select></td>
</tr>
<tr><td>Cost</td><td><input type="text" name="cost" value="<?php echo $sqlfetch[cost] ; ?>" /></td></tr>
<tr><td>Status</td><td><select name="status">
<?php
$arr = array("Enabled","Disabled");
foreach($arr as $value)
{
	if($value == $sqlfetch[status])
	{
	echo "<option value='$value' selected>$value</option>";
	}
	else
	{
	echo "<option value='$value'>$value</option>";	
	}
}
?>
</select>
</td></tr>
<tr><td colspan="2" align="center"><input type="submit" name="submit" /></td></tr>
</table>
</form></p>
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
