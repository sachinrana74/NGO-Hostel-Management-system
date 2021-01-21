<?php
include("header.php");
include("databaseconnection.php");
?>
<script>
function validation()
{ 
if(document.form1.stud_type.value=="")
	{
		alert("Student Type should not  be empty..");
		return false;
	}
	else if(document.form1.start_date.value=="")
	{
		alert("Join date should not  be empty..");
		return false;
	}
	else if(document.form1.end_date.value=="")
	{
		alert("End date should not  be empty..");
		return false;
	}
	else if(document.form1.food_type.value=="")
	{
		alert("Food Type should not  be empty..");
		return false;
	}
 	var dateOne = new Date(document.form1.start_date.value); //Year, Month, Date
    var dateTwo = new Date(document.form1.end_date.value); //Year, Month, Date
       if (dateOne > dateTwo) 
	   {
            alert("Start Date should be greather than End Date..");
			return false;
       }
		

//if (d1 > d2) {
 // alert ("do something");
//}
//var firstValue = document.form1.end_date.value.split('-');
//var secondValue = document.form1.start_date.value.split('-');
alert(d1[0]);
/*
 if(document.form1.end_date.value > document.form1.start_date.value )
 {
	 alert("date is not valid");
	 return false;
 }
 */

}
</script>
<?php
if (isset($_POST["insid"]))
if($_SESSION["insid"] == $_POST["insid"])
{
	if(isset($_POST["submit"]))
	{
			if(isset($_GET["editid"]))
			{
		$sql="UPDATE registration SET stid='$_POST[stid]',stud_type='$_POST[stud_type]',start_date='$_POST[start_date]',end_date='$_POST[end_date]',room_id='$_POST[room_id]',course_id='$_POST[course_id]',food_type='$_POST[food_type]',beverage_type='$_POST[beverage_type]',status='$_POST[status]' WHERE reg_id='$_POST[reg_id]'";
				if(!mysql_query($sql,$db))
				{
					die('ERROR:'. mysql_error());
				}
				else
				{
					$res="<font color='purple'><strong>Record Updated Successfully......</strong></font><br>";
					$resi=1;
				}
			}
			else
			{
	$result = mysqli_query($dbconnection,"insert into registration(stid,room_id,stud_type,start_date,end_date,food_type,beverage_type,status)values('$_POST[stud_id]','$_POST[room_id]','$_POST[stud_type]','$_POST[start_date]','$_POST[end_date]','$_POST[food_type]','$_POST[beverage_type]','$_POST[status]')");
				if(!$result)
				{
					echo "Problem in SQL query". mysqli_error();
				}
				else
				{
					echo "Inserted successfully...";
				}
			}
	}
}

$_SESSION["insid"] = rand();

?>

    <div id="templatemo_main">
        <div class="col_w900 col_w900_last">        
<div class="col_w580 float_l">            
            	<div class="post_box">            	
                    <h2>Room Registration</h2>
<p>
<?php
if(isset($_POST["submit"]))
{
	
	echo "<h1>Room registration record submitted successfully...</h1>";	
}
else
{
?>
<form method="post" action="" name="form1" onsubmit="return validation()">
<input type="hidden" name="insid" value='<?php //echo $_SESSION[insid]; ?>' />
<input type="hidden" name="stud_id" value="<?php //echo $_GET[studentid]; ?>">
<input type="hidden" name="room_id" value="<?php //echo $_GET[roomid]; ?>">
 <table class="tftable" width="540" height="404" border="1">
<tr>
  <td width="87"><strong>Student details</strong></td><td width="215">

<?php
$result=mysqli_query("SELECT * FROM student left join course ON course.course_id = student.courseid where stid='$_GET[studentid]'",$db);
$rs=mysqli_fetch_array($result);
	echo "Name: $rs[name]<br>
	Course: $rs[course_name]<br>
	Roll No.: $rs[rollno]<br>
	DOB: $rs[dob]<br>
	Gender: $rs[gender]<br>";
?>  
  </td></tr>
<tr>
  <td width="87"><strong>Room details</strong></td><td width="215">
<?php
$resultroom=mysqli_query($dbconnection,"SELECT * FROM room where room_id='$_GET[roomid]'");
$rsroom =mysqli_fetch_array($resultroom);
echo "Room No.: $rsroom[room_no]<br>";
echo "No. of Beds: $rsroom[no_of_beds]<br>";
$resultblock= mysqli_query($dbconnection,"SELECT * FROM blocks where block_id='$_GET[blockid]'");
$rsblock =mysqli_fetch_array($resultblock);
echo "Block Name: $rsblock[block_name]<br>";
?>  
  </td></tr>  
<tr><td><strong>Student type</strong></td>
<td><select name="stud_type">
<option value="">Select</option>
<option value="Hosteler">Hosteler</option>
<option value="Day Scholar">Day Scholar</option>
</select>
</td>
</tr>
<tr><td><strong>Join date</strong></td><td><input type="date" name="start_date" ></td></tr>
<tr><td><strong>End date</strong></td><td>
<input type="date" name="end_date">
</td></tr>
<tr><td><strong>Food type</strong></td>
<td><select name="food_type">
<option value="">Select</option>
<option>Vegeterian</option>
<option>Non-vegeterian</option>
</select>
</td>
</tr>
<tr><td><strong>Beverage type</strong></td>
<td><select name="beverage_type">
<option value="">Select</option>
<option>Milk</option>
<option>Coffee</option>
<option>Tea</option>
<option>Juice</option>
</select>
</td>
</tr>
<?php
if(isset($_GET[editid]))
{
?>
<tr><td><strong>Status</strong></td>
<td><select name="status">
<option value="Enabled">Enabled</option>
<option value="Disabled">Disabled</option>
</select>
</td>
</tr>
<?php
}
else
{
	echo "<input type='hidden' name='status' value='Enabled'>";
}
?>
<tr><td colspan="2" align="center"><input type="submit" name="submit"></td></tr>
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
