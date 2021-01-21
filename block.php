<?php
session_start();  // Developed by www.freestudentprojects.com
include("databaseconnection.php");
?>
<script type="application/javascript">
function validation()
{
		
	if(document.form1.blockname.value=="")
	{
		alert("Block Name should not be empty..");
		return false;
	}
	else if(document.form1.gender.value=="")
	{
		alert("Gender should not be empty..");
		return false;
	}
	else if(document.form1.description.value=="")
	{
		alert("Description should not be empty..");
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
		$resultblocks = mysqli_query($dbconnection,"SELECT * FROM blocks where block_name='$_POST[blockname]'");
		$rsblocks = mysqli_fetch_array($resultblocks);
		if($rsblocks)
		{
			$res ="<font color='red'>Block name already exist in database</font>";
			$resi =1;
		}
		else
		{
			if(isset($_GET[editid]))
			{		
				$sql="UPDATE blocks SET block_name='$_POST[blockname]',gender='$_POST[gender]',description='$_POST[description]',status='$_POST[status]' WHERE block_id='$_GET[editid]'";
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
					$result=mysqli_query($dbconnection,"INSERT INTO blocks(
			block_name,gender,description,status)values('$_POST[blockname]','$_POST[gender]','$_POST[description]','$_POST[status]')");
				
				if(!result)
				{
					$res="problem in sql statement</strong></font><br>";
					$resi=1;				
				}
				else
				{
					$res="<font color='purple'><strong>successfully inserted</strong></font><br>";
					$resi=1;
				}
			}
		}
}
}

$resultblocks = mysqli_query($dbconnection,"SELECT * FROM blocks where block_id='$_GET[editid]'");
$rsblocks = mysqli_fetch_array($resultblocks);

$_SESSION[insid]=rand();


include("header.php");
?>
    <div id="templatemo_main">
        <div class="col_w900 col_w900_last">        
<div class="col_w580 float_l">            
            	<div class="post_box">            	
                    <h2>Blocks</h2>
                  <p>
<form method="post" action="" name="form1"onsubmit="return validation()">
<input type="hidden" name="insid" value="<?php echo $_SESSION[insid];?>"/>
 <table class="tftable" border="1">
<?php
if($resi==1)
{
	echo "<tr><td colspan=2>$res</td></tr>";
}
else
{
?>
<tr><td>Block name</td><td> <input type="text" name="blockname" value="<?php echo $rsblocks[1]; ?>"  /></td></tr>
<tr><td>Gender</td><td>
<select name="gender">
    <?php
        $arr = array("Select","Male","Female");
        foreach($arr as $value)
        {
            if($value == $rsblocks[gender])
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
<tr><td>Description</td><td><textarea name="description"><?php echo $rsblocks[3]; ?></textarea></td></tr>
<tr><td>Status</td>
<td>
<select name="status">
    <?php
        $arr = array("Enabled","Disabled");
        foreach($arr as $value)
        {
            if($value == $rsblocks[status])
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
<tr><td colspan="2"><input type="submit" name="submit" /></td></tr>
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