<?php
include("header.php");
include("databaseconnection.php");
?>
<script type="application/javascript">
function validation()
{
	if(document.form1.login.value=="")
	{
		alert("Login ID should be empty..");
		return false;
	}
	else if(document.form1.oldpassword.value=="")
	{
		alert("Old password should be empty..");
		return false;
	}
		else if(document.form1.newpassword.value=="")
	{
		alert("New password should be empty..");
		return false;
	}
		else if(document.form1.cpassword.value=="")
	{
		alert("Confirm password should be empty..");
		return false;
	}	
			else if(document.form1.cpassword.value != document.form1.newpassword.value)
	{
		alert("Password mismatch...");
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
$sql="UPDATE student SET password='$_POST[newpassword]' WHERE email='$_SESSION[visitorid]' and password='$_POST[oldpassword]'";


			mysql_query($sql,$db) or die('ERROR:'. mysql_error());
				$res="<font color='purple'><strong>Password Updated Successfully......</strong></font><br>";
				$resi=1;
}


$resst="select * FROM student WHERE email='$_SESSION[visitorid]'";


$g=mysql_query($resst,$db);
$s=mysql_fetch_array($g);
?>
    <div id="studiv"> <!--white div element -->
        <div class="col_w900 col_w900_last">   <!--put element in midddle  -->      
<div class="col_w580 float_l ">          <!--put element in midddle  -->    
            	<div class="">      <!--nothing-->
                    <h2 class="h2dash"><b>Change Password</b></h2>
<p><form method="post" action="" name="form1" onsubmit="return validation()">
 <table class="tftable" width="100%"  border="0"> <!--css hover table  and seprate the inpyut box -->
<?php
if (isset($resi))
if($resi== 1)
{
echo "<tr><td colspan='2'> $res </td></tr>";
}
?>                                                             <!--username css to not edit -->  
<tr><td width="112">User name</td><td width="228"><input class="form-control" type="text" name="login" readonly="readonly" value="<?php echo  $s['email']; ?>" readonly /></td></tr>
<tr><td>Old password</td><td><input class="form-control" type="password" name="oldpassword" /></td></tr>
<tr><td>New password</td><td><input  class="form-control" type="password" name="newpassword"/></td></tr>
<tr><td>Confirm password</td><td><input class="form-control" type="password" name="cpassword"/></td></tr></table>
<br><center><button class="but-s" type="submit" name="submit" value="Change password"/>Change password</button></center> <!--button css-->

</form> 
</p>
<div class="cleaner"></div>
                </div>
</div>           
            <div class="col_w280 float_r">
            
            </div>            
            <div class="cleaner"></div>
		</div>
        
        <div class="cleaner"></div>
    </div> <!-- end of main -->
        
</div> <!-- end of wrapper -->


<?php
include("footer.php");
?>