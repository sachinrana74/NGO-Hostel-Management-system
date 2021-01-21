<?php
include("databaseconnection.php");
?>
<script type="application/javascript">
function validation()
{
	if(document.form1.coursename.value=="")
	{
		alert("Course Name should not be empty..");
		return false;
	}
	else if(isNaN(document.form1.coursename.value) == false)
	{
		alert("Course Name should be character.");
		document.form1.coursename.value = "";
		document.form1.coursename.focus();
		return false;
	}
	else if(document.form1.year.value=="")
	{
		alert("Number of Year should be numeric...");
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
		$resultblocks = mysqli_query($dbconnection,"SELECT * FROM course where course_name='$_POST[coursename]'");
		$rsblocks = mysqli_fetch_array($resultblocks);
		if($rsblocks)
		{
			$res ="<font color='red'>Course name already exist in database</font>";
			$resi =1;
		}
		else
		{
			if(isset($_GET[editid]))
			{
			$sql="UPDATE course SET course_name='$_POST[coursename]',no_of_year='$_POST[year]',status='$_POST[status]' WHERE course_id='$_GET[editid]'";
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
		$result = mysqli_query($dbconnection,"insert into course(course_name,no_of_year,status)values('$_POST[coursename]',
		'$_POST[year]','$_POST[status]')");
		
				if(!result)
				{
					$res="Failed to insert record";
					$resi=1;
				}
				else
				{
					$res="Inserted successfully...";
					$resi=1;
				}
			}
		}
	}
}

$_SESSION[insid] = rand();

$resultcourse = mysqli_query($dbconnection,"SELECT * FROM course where course_id='$_GET[editid]'");
$rscourse = mysqli_fetch_array($resultcourse);

include("header.php");
?>
    <div id="templatemo_main">
        <div class="col_w900 col_w900_last">        
<div class="col_w580 float_l">            
            	<div class="post_box">            	
                    <h2>Add course</h2>
                  <p>



<form method="post" action=""  name="form1" onsubmit="return validation()">
<input type="hidden" name="insid" value="<?php echo $_SESSION[insid]; ?>" />
 <table class="tftable" width="428" height="142" border="1">
<?php
if($resi==1)
{
	echo "<tr><td colspan=2>$res</td></tr>";
}
else
{
?>
<tr><td><strong>Course Name</strong></td><td><input type="text" name="coursename" value="<?php echo $rscourse[course_name]; ?>"></td></tr>
<tr><td><strong>No of Year</strong></td><td><input type="text" name="year" value="<?php echo $rscourse[no_of_year]; ?>"></td></tr>
<tr><td><strong>Status</strong></td>
<td><select name="status">
    <?php
        $arr = array("Enabled","Disabled");
        foreach($arr as $value)
        {
            if($value == $rscourse[status])
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
</td>
</tr>
<tr><td colspan="2" align="center"><input type="submit" name="submit" value="Add course"></td></tr>
<?php
}
?>
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