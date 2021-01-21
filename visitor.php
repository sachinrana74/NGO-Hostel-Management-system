<?php
session_start();  // Developed by www.freestudentprojects.com
include("databaseconnection.php");
?>
<script type="application/javascript">
function validation()
{
	if(document.form1.name.value=="")
	{
		alert("Parents Name should be Text...");
		return false;
	}
	else if(document.form1.username.value=="")
	{
		alert("Username should be not empty..");
		return false;
	}
	else if(document.form1.password.value=="")
	{
		alert("Password should be not empty..");
		return false;
	}
	else if(document.form1.contactno.value=="")
	{
		alert("Contact Number should not be empty..");
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
	else if(document.form1.loginid.value=="")
	{
		alert("Login ID should be empty..");
		return false;
	}
	else if(document.form1.password.value=="")
	{
		alert("Password should be empty..");
		return false;
	}
	else if(document.form1.comments.value=="")
	{
		alert("Comments should be Text..");
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
		$sql="UPDATE visitor SET stid='$_POST[stid]',name='$_POST[name]',type='$_POST[type]',username='$_POST[username]',password='$_POST[password]',contactno='$POST[contactno],comments='$POST[comments]',status='$_POST[status]' WHERE visitorid='$_POST[visitorid]'";
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
	$result = mysqli_query($dbconnection,"insert into visitor(stid,name,type,username,password,contactno,comments,status)values('$_POST[stid]',
	'$_POST[name]','$_POST[type]','$_POST[username]','$_POST[password]','$_POST[contactno]','$_POST[comments]','$_POST[status]')");
	
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
                    <h2>Add New visitor</h2>
<?php
	if(isset($_POST[submit]))
	{
		echo "<h1> Visitor record inserted successfully..</h1>";
	}
	else
	{
?>		                    
                  <p>
<?php                  
	$result1= mysqli_query($dbconnection,"SELECT * FROM student where stid='$_GET[visitorid]'");	
	$rs1=mysqli_fetch_array($result1);
?>
<form method="post" action="" name="form1" onsubmit="return validation()">
<input type="hidden" name="insid" value="<?php echo $_SESSION[insid]; ?>" />
 <table class="tftable" width="471" border="1">
<tr><td width="172"><strong>Student Information</strong></td><td width="283"><input type="hidden" name="stid" value="<?php echo $_GET[visitorid]; ?>" >
<?php 
echo "Student Name: ".$rs1[name]. "<br>"; 
echo "Roll No.: ".$rs1[rollno]. "<br>"; 
?>
</td></tr>
<tr><td><strong>Parents Name</strong></td><td><input type="text" name="name"></td></tr>
<tr><td><strong>Visitor type</strong></td>
<td><select name="type">
<option value="">Select</option>
<option value="Parents">Parents</option>
<option value="Guardian">Guardian</option>
</select>
</td>
</tr>
<tr><td><strong>Username</strong></td><td><input type="text" name="username"></td></tr>
<tr><td><strong>Password</strong></td><td><input type="password" name="password"></td></tr>
<tr><td><strong>Contact No</strong></td><td><input type="text" name="contactno" value="<?php echo $sqlfetch[contact_no]; ?>" maxlength="10" /></td></tr>
<tr><td><strong>Information</strong></td><td><input type="text" name="comments"></td></tr>
<tr><td><strong>Status</strong></td>
<td><select name="status">
<option>Enabled</option>
<option>Disabled</option>
</select>
</td>
</tr>
<tr><td colspan="2" align="center"><input name="submit" type="submit" value="Add New Visitor"></td></tr>
</table>
</form>
</p>
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