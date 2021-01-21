<?php
include("header.php");
include("databaseconnection.php");
?>
<script type="application/javascript">
function validation()
{

	var datestart = new Date(document.form1.dtst.value); //Year, Month, Date
    var dateend = new Date(document.form1.dtdn.value); //Year, Month, Dat    
	var datebirth = new Date(document.form1.dob.value); //Year, Month, Date
			
	if(document.form1.course.value=="")
	{
		alert("Course Name should not be empty..");
		return false;
	}
	else if(document.form1.name.value=="")
	{
		alert("Name should be text..");
		return false;
	}
	else if(isNaN(document.form1.name.value) == false)
	{
		alert("Name should be character.");
		document.form1.name.value = "";
		document.form1.name.focus();
		return false;
	}
	else if(document.form1.rollno.value=="")
	{
		alert("Roll No should not be empty..");
		return false;
	}
	else if(isNaN(document.form1.rollno.value) == true)
	{
		alert("Roll number should be numeric..");
		document.form1.rollno.value = "";
		document.form1.rollno.focus();
		return false;		
	}
	else if(document.form1.dob.value=="")
	{
		alert("Date of Birth should not be empty.");
		return false;
	}
    else if(datestart > datebirth ) {
		// datestart1990 dateend 1996  datebirth|| dateend < datebirth
            alert("DOB Not allowed");
			document.form1.dob.focus();
			return false;
    }
    else if(dateend < datebirth) {
		// datestart1990 dateend 1996  datebirth|| dateend < datebirth
            alert("DOB Not allowed..");
			document.form1.dob.focus();
			return false;
    }
	else if(document.form1.fname.value=="")
	{
		alert("Father Name should not be empty.");
		return false;
	}
	else if(document.form1.mname.value=="")
	{
		alert("Mother Name should not be empty...");
		return false;
	}
	else if(document.form1.b1.value=="")
	{
		alert("Gender should not be empty...");
		return false;
	}
	else if(document.form1.address.value=="")
	{
		alert("Address should not be empty...");
		return false;
	}
	else if(document.form1.contactno.value=="")
	{
		alert("Contact no should not be empty..");
		return false;
	}
	else if(isNaN(document.form1.contactno.value) == true)
	{
		alert("Contact number should be numeric..");
		document.form1.contactno.value = "";
		document.form1.contactno.focus();
		return false;		
	}
	else if(document.form1.contactno.value.length < 9)
	{
		alert("Contact number is not valid.");
		return false;
	}
	/*
	else if(document.form1.contactno.value.length > 11)
	{
		alert("Invalid contact number...");
		return false;
	}
	*/
	else if(document.form1.parentsno.value=="")
	{
		alert("Parents Contact no should be numeric..");
		return false;
	}
	else if(isNaN(document.form1.parentsno.value) == true)
	{
		alert("Parents number should be numeric..");
		document.form1.parentsno.value = "";
		document.form1.parentsno.focus();
		return false;		
	}
	else if(document.form1.parentsno.value.length < 9)
	{
		alert("Contact number is not valid.");
		return false;
	}
		else if(document.form1.parentsno.value.length > 11)
	{
		alert("Invalid contact number..");
		return false;
	}
	else if(document.form1.contactno.value < 10 && document.form1.contactno.value > 11 )
	{
		alert("Invalid Contact Number..");
		return false;
	}
	else if(document.form1.parentsno.value < 10 && document.form1.parentsno.value > 15 )
	{
		alert("Invalid Parent Contact Number..");
		return false;
	}	
		else if(document.form1.bloodgroup.value == "")
	{
		alert("Please select blood group..");
		return false;
	}
		else if(document.form1.status.value == "")
	{
		alert("Please select status..");
		return false;
	}
	else
	{
		return true;
	}
}


</script>
<?php
if(isset($_POST["insid"]))
if($_SESSION["insid"] == $_POST["insid"])
{
	if(isset($_POST["submit"]))
	{
		if(isset($_GET["editid"]))
		{

		$sql="UPDATE student SET courseid='$_POST[course]',name='$_POST[name]',rollno='$_POST[rollno]',dob='$_POST[dob]',father_name='$_POST[fname]',mother_name='$_POST[mname]',gender='$_POST[b1]',address='$_POST[address]',contact_no='$_POST[contactno]',parents_no='$_POST[parentsno]',blood_group='$_POST[bloodgroup]',status='$_POST[status]' WHERE stid='$_GET[editid]'";
		
			if(!mysql_query($sql,$db))
			{
				die('ERROR:'. mysql_error($db));
			}
			
			if(mysql_affected_rows($db) ==1)
			{
				$res="<font color='purple'><strong>Record Updated Successfully......</strong></font><br>";
				$resi=1;
			}
			else
			{
				$res="<font color='purple'><strong>No records to update......</strong></font><br>";
				$resi=1;
			}
		}
		else
		{
	$result = mysql_query("insert into student(courseid,name,rollno,dob,father_name,mother_name,gender,address,contact_no,parents_no,blood_group,status)values(
'$_POST[course]','$_POST[name]','$_POST[rollno]','$_POST[dob]','$_POST[fname]','$_POST[mname]','$_POST[b1]','$_POST[address]','$_POST[contactno]','$_POST[parentsno]','$_POST[bloodgroup]','$_POST[status]')",$db);
	
			if(!$result)
			{
				//echo "Problem in SQL query".    mysqli_error($dbconnection);
$res="<font color='#990099'><strong>Student Roll Number Already Exists......</strong></font><br>";
$resi=1;
			
			}
			else
			{
				$res="<font color='purple'><strong>Student record inserted successfully......</strong></font><br>";
				$resi=1;
			}
		}
	}
}
if(isset($_GET["editid"]))
{
$sqlquery = "SELECT * FROM student WHERE stid='$_GET[editid]'";
$sqlqueryresult = mysql_query($sqlquery,$db);
$sqlfetch = mysql_fetch_array($sqlqueryresult);
}
$_SESSION["insid"] = rand();


?>
    <div id="templatemo_main">
        <div class="col_w900 col_w900_last">        
<div class="col_w580 float_l">            
            	<div class="post_box">            	
                    <h2>Student details</h2>
                  <p>

<form method="post" action="" name="form1" onsubmit="return validation()">
<input type="hidden" name="insid" value="<?php echo $_SESSION['insid']; ?>" />
 <table class="tftable" width="407" border="1" > 
<?php
if(isset($resi))
if($resi== 1)
{
echo "<tr><td colspan='2'> $res </td></tr>";
}
?>
<tr><td>Course</td><td> 
<select name="course">
  <option value="">Select</option>
<?php  
$resultcourse = mysql_query("SELECT * FROM course where status = 'Enabled' ",$db);
while($rscourse = mysql_fetch_array($resultcourse))
{ 	echo "<option value='$rscourse[course_id]'>$rscourse[course_name]</option>";	

}
?>
</select></td>
</tr>
<tr><td>Name</td><td><input type="text" name="name" value="<?php  if(isset($sqlfetch['name'])) echo ucfirst($sqlfetch['name']); ?>" /></td></tr>
<tr><td>Roll no</td><td><input type="text" name="rollno" value="<?php if(isset($sqlfetch['rollno'])) echo $sqlfetch['rollno']; ?>"  /></td></tr>
<td>Date of Birth</td><td>
<?php
$tomorrow = mktime(0,0,0,date("m"),date("d"),date("Y")-24);
$dtst = date("Y-m-d", $tomorrow);
?>
<input type="hidden" name="dtst" value="<?php echo $dtst; ?>"  />

<?php
$tomorrow = mktime(0,0,0,date("m"),date("d"),date("Y")-18);
$dtdn = date("Y-m-d", $tomorrow);
?>
<input type="hidden" name="dtdn" value="<?php echo $dtdn; ?>"  />

<input type="date" name="dob" value="<?php if(isset($sqlfetch['dob'])) echo $sqlfetch['dob']; ?>"  /></td></tr>
<tr><td>Father's Name</td><td><input type="text" name="fname" value="<?php if(isset($sqlfetch['father_name'])) echo $sqlfetch['father_name']; ?>" /></td></tr>
<tr><td>Mother's Name</td><td><input type="text" name="mname" value="<?php if(isset($sqlfetch['mother_name'])) echo $sqlfetch['mother_name']; ?>" /></td></tr>
<tr><td>Gender</td><td>
<input type="radio" name="b1" value="Male"
<?php
if(isset($sqlfetch["gender"]))
if($sqlfetch["gender"] == "Male")
{
	echo "checked";
}
?>
 />Male
<input type="radio" name="b1" value="Female" 
<?php
if(isset($sqlfetch["gender"]))
if($sqlfetch["gender"] == "Female")
{
	echo "checked";	
}
?>/>Female
</td></tr>
<tr><td>Address</td><td><textarea name="address"><?php if(isset($sqlfetch['address'])) echo $sqlfetch["address"]; ?></textarea></td></tr>
<tr><td>Contact No</td><td>
<input type="text" name="contactno"  value="<?php if(isset($sqlfetch["contact_no"])) echo $sqlfetch['contact_no']; ?>" maxlength="10" /></td></tr>
<tr><td>Parents No</td><td><input type="text" name="parentsno" value="<?php if(isset($sqlfetch["parents_no"])) echo $sqlfetch['parents_no']; ?>" maxlength="10" /></td></tr>
<tr><td>Blood group</td><td>
<select name="bloodgroup">
<option value="">Select</option>
<?php
$arr = array("A+","O-","A-","B+","B-","AB+","AB-","O+");
foreach($arr as $value)
{	echo "<option value='$value'>$value</option>";	
	
}
?>
</select></td></tr>
<tr><td>Status</td><td>
<select name="status" >
<?php
$arr = array("Enabled","Disabled");
foreach($arr as $value)
{echo "<option value='$value'>$value</option>";	

}
?>
</select>
</td></tr>
<tr><td colspan="2">
<input type="submit" name="submit" value="Submit" />
</td></tr>
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