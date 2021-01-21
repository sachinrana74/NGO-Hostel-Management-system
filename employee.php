<?php
include("header.php");
include("databaseconnection.php");
?>

<script type="application/javascript">
function validation()
{		
//Year, Month, Date
var dateOne = new Date(document.form1.dtst.value); 
//Year, Month, Date
var dateTwo = new Date(document.form1.dob.value); 

//Year, Month, Date
var dateThree = new Date(document.form1.doj.value); 

var datestart = new Date(document.form1.dtst.value); //Year, Month, Date
var dateend = new Date(document.form1.dtdn.value); //Year, Month, Dat    
var datebirth = new Date(document.form1.dob.value); //Year, Month, Date

    if(document.form1.block.value=="")
	{
		alert("Block Name should not be empty..");
		return false;
	}
	else if(document.form1.name.value=="")
	{
		alert("Name should be text..");
		return false;
	}

	else if(document.form1.loginid.value=="")
	{
		alert("Login ID should not be empty..");
		return false;
	}
	else if(document.form1.loginid.value.length>=10)
	{
		alert("Login id length exceeds..");
		return false;
	}	
	else if(document.form1.password.value=="")
	{
		alert("Password should not be empty..");
		return false;
	}
	else if(document.form1.cpassword.value=="")
	{
		alert("Confirm Password should not be empty..");
		return false;
	}
	else if(document.form1.password.value != document.form1.cpassword.value)
	{
		alert("Password mismatch..");
		document.form1.password.value= "";
		document.form1.cpassword.value ="";
		document.form1.password.focus();
		return false;
	}	
	else if(document.form1.dob.value=="")
	{
		alert("Date of birth should not be empty..");
		return false;
	}
    else if(datestart > datebirth ) {
		// datestart1990 dateend 1996  datebirth|| dateend < datebirth
            alert("DOB Not Allowed");
			document.form1.dob.focus();
			return false;
    }
    else if(dateend < datebirth) {
		// datestart1990 dateend 1996  datebirth|| dateend < datebirth
            alert("DOB Not Allowed..");
			document.form1.dob.focus();
			return false;
    }
	else if(document.form1.doj.value=="")
	{
		alert("Date of Join should not be empty..");
			document.form1.doj.focus();
		return false;
	}
    else if( datebirth > dateThree ) {
		// datestart1990 dateend 1996  datebirth|| dateend < datebirth
            alert("Date of join not valid");
			document.form1.doj.focus();
			return false;
    }
	else if(document.form1.address.value=="")
	{
		alert("Address should be Text..");
		return false;
	}
	else if(document.form1.status.value=="Select")
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
if (isset($_POST["insid"]))
if($_SESSION["insid"] == $_POST["insid"])
{
	if(isset($_POST["submit"]))
	{
		if($_SESSION["emp_designation"] == "Employee")
		{
			$sql="UPDATE employee SET login_id='$_POST[loginid]',emp_name='$_POST[name]',gender='$_POST[b1]',dob='$_POST[dob]',designation='$_POST[designation]',address='$_POST[address]',salary='$_POST[salary]' WHERE emp_id='$_GET[empid]'";
			if(!mysqli_query($dbconnection,$sql))
			{
				die('ERROR:'. mysqli_error($dbconnection));
			}
			if(mysqli_affected_rows($dbconnection) ==1)
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
		else if($_SESSION[emp_designation] == "Administrator")
		{
			if(isset($_GET[editid]))
			{
				$sql="UPDATE employee SET block_id='$_POST[block]',emp_name='$_POST[name]',gender='$_POST[b1]',dob='$_POST[dob]',doj='$_POST[doj]',designation='$_POST[designation]',address='$_POST[address]',salary='$_POST[salary]',status='$_POST[status]',emp_type='$_POST[emp_type]',login_id='$_POST[loginid]' WHERE emp_id='$_GET[editid]'";
				if(!mysqli_query($dbconnection,$sql))
				{
					die('ERROR:'. mysqli_error($dbconnection));
				}
				if(mysqli_affected_rows($dbconnection) ==1)
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
				
$sqlquery = "SELECT * FROM employee WHERE block_id='$_POST[block]' and status='Enabled'";
$sqlqueryresult = mysqli_query($dbconnection,$sqlquery);
$sqlfetch = mysqli_fetch_array($sqlqueryresult);
				
				if(mysqli_num_rows($sqlqueryresult) == 1)
				{
					$res =  "<strong><font color='green'>Warden already exist..</font></strong>";
					$resi =1;
				}
				else
				{
					$result=mysqli_query($dbconnection,"INSERT INTO employee(block_id,emp_name,gender,dob,doj,designation,address,salary,status,password,emp_type,login_id) values ('$_POST[block]','$_POST[name]','$_POST[b1]','$_POST[dob]','$_POST[doj]','$_POST[designation]','$_POST[address]','$_POST[salary]','$_POST[status]','$_POST[password]','$_POST[emp_type]','$_POST[loginid]')");
					if(!$result)
					{
							echo "problem in sql statement". mysqli_error($dbconnection);
					}
					else
					{
						$res =  "<strong><font color='green'>Employee record inserted successfully..</font></strong>";
						$resi =1;
					}
				}
				
			}
		}
		
	}
}

if(isset($_GET["empid"]))
{
$sqlquery = "SELECT * FROM employee WHERE emp_id='$_GET[empid]'";
$sqlqueryresult = mysqli_query($dbconnection,$sqlquery);
$sqlfetch = mysqli_fetch_array($sqlqueryresult);
}
else if(isset($_GET["editid"]))
{
$sqlquery = "SELECT * FROM employee WHERE emp_id='$_GET[editid]'";
$sqlqueryresult = mysql_query($sqlquery,$db);
$sqlfetch = mysql_fetch_array($sqlqueryresult);
}


$_SESSION["insid"] = rand();
?>
    <div id="templatemo_main">
        <div class="col_w900 col_w900_last">        
<div class="col_w580 float_l">            
            	<div class="post_box">
            	  <h2 align="center">Warden  Profile</h2>
                  <p>
                        
<form method="post" action="" name="form1" onsubmit="return validation()">
<input type="hidden" name="insid" value="<?php if(isset($_SESSION['insid'])) echo $_SESSION['insid'];?>"/>
 <table class="tftable" width="647" height="474" border="1">
<?php
if (isset($resi))
if($resi==1)
{
?>
<tr><td colspan="2">
<?php
	echo $res;
?>
</td></tr>
<?php
}

if($sqlfetch["emp_id"] != 1)
{
?>
<tr><td width="142">Block</td><td width="344"><select name="block">
  <option value="Select">Select</option>
  <?php
$sqlblockquery = "SELECT * FROM blocks WHERE status='Enabled'";
$sqlblockqueryresult = mysql_query($sqlblockquery,$db);
while($rssec = mysql_fetch_array($sqlblockqueryresult))
{
	if($rssec["block_id"] == $sqlfetch["block_id"])
	{
	echo "<option value='$rssec[block_id]' selected>$rssec[block_name]</option>";
	}
	else
	{
	echo "<option value='$rssec[block_id]'>$rssec[block_name]</option>";
	}
}
?>
</select></td></tr>
<?php
}
?>
<tr><td>Name</td><td><input name="name" type="text" size="35" value="<?php echo ucfirst($sqlfetch['emp_name']); ?>" /></td></tr>
<tr><td width="142">Login ID</td><td width="344"><input name="loginid" type="text" size="35" value="<?php echo $sqlfetch['login_id']; ?>"></td></tr>

<?php
if(!isset($_GET["editid"]))
{
?>
<tr>
  <td>Password</td>
  <td><input name="password" type="password" size="35" /></td>
</tr>
<tr>
  <td>Confirm password</td>
  <td><input name="cpassword" type="password" size="35" /></td>
</tr>
<?php
}
?>
<tr><td>Gender</td><td>
<input type="radio" name="b1" value="Male" 
<?php
if($sqlfetch["gender"] == "Male")
{
	echo "checked";
}
?>
>Male  
<input type="radio" name="b1" value="Female"
<?php
if($sqlfetch["gender"] == "Female")
{
	echo "checked";
}
?>
>Female
</td>
</tr>
<tr><td>Date of Birth</td><td>
<?php
$tomorrow = mktime(0,0,0,date("m"),date("d"),date("Y")-30);
$dtst = date("Y-m-d", $tomorrow);
?>
<input type="hidden" name="dtst" value="<?php echo $dtst; ?>"  />

<?php
$tomorrow = mktime(0,0,0,date("m"),date("d"),date("Y")-18);
$dtdn = date("Y-m-d", $tomorrow);
?>
<input type="hidden" name="dtdn" value="<?php echo $dtdn; ?>"  />

<input type="date" name="dob" value="<?php echo $sqlfetch['dob']; ?>"></td></tr>
<?php
if(!isset($_GET["empid"]))
{
?>
<tr><td>Date of Join</td><td>
<input type="date" name="doj" value="<?php echo $sqlfetch['doj']; ?>"  ></td></tr>
<?php
}
?>
<tr>
  <td>&nbsp;Employee type:</td>
  <td>&nbsp;
<select name="emp_type">
<?php
//$arr = array("Select","Warden","Administrator");
$arr = array("Warden");
foreach($arr as $value)
{
	if($value == $sqlfetch["emp_type"])
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
<!--
<tr><td>Designation</td><td>
<input type="text" name="designation" value="<?php echo $sqlfetch[designation]; ?>">
</td></tr>
-->
<tr><td>Address</td><td><textarea name="address" ><?php echo $sqlfetch["address"]; ?></textarea></td></tr>
<!--
<tr><td>Salary</td><td><input type="text" name="salary" value="<?php echo $sqlfetch[salary]; ?>"></td></tr>
-->
<tr><td>Status</td><td>
<?php
if($_SESSION["emp_designation"] == "Employee")
{
	echo $sqlfetch["status"];
}
else
{
?>
    <select name="status">
    <?php
        $arr = array("Enabled","Disabled");
        foreach($arr as $value)
        {
            if($value == $sqlfetch["status"])
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
<?php
}
?>
</td></tr>
<tr><td colspan="2" align="center"><input type="submit" name="submit"></td></tr>
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