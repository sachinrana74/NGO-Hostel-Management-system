<?php
include("header.php");
include("databaseconnection.php");
    $totalfee=0;
?>
<script>
function ConfirmDelete()
{
	var result=confirm("Are you sure want to delete this record?");
	if(result==true)
	{
		return true;
	}
	else
	{
		return false;
	}
}
</script>
<?php
if(isset($_GET["delid"]))
{
$delrec=mysql_query("DELETE FROM student where stid='$_GET[delid]'",$db);
$delrec = mysql_query("DELETE FROM visitor where visitorid='$_GET[delid]'",$db);
}
?>

<div id="templatemo_main">

        <div class="col_w900 col_w900_last">
        

        <h2>Student Profile</h2>
         <table class="tftable" width="915" border="1">
<tr bgcolor="#FFFFCC">
<th width="143"><div align="center"><strong>Name</strong></div></th>
<th width="114"><div align="center"><strong>Course details</strong></div></th>
<th width="119"><div align="center"><strong>Profile</strong></div></th>
<th width="175"><div align="center"><strong>Parents</strong></div></th>
<th width="206"><div align="center"><strong>Contact Info</strong></div></th>
<th width="118"><div align="center"><strong>Action</strong></div></th>
</tr>

<?php
$result=mysql_query("SELECT * FROM student left join course ON course.course_id = student.courseid WHERE student.stid='$_GET[studentid]' ",$db);
while($rs=mysql_fetch_array($result))
{
	echo "<tr>
	<td>$rs[name]</td>
	<td>
	Course: $rs[course_name]<br>
	Roll No.: $rs[rollno]</td>
	<td>DOB: $rs[dob]
	<br> Gender: $rs[gender]
	<br>Blood group: $rs[blood_group]
	</td>
	<td>Father's Name: $rs[father_name]
	<br> Mother's name: $rs[mother_name]
	</td>
	<td>$rs[address]
	<br>Contact No. $rs[contact_no]
	<br>Parents No. $rs[parents_no]</td>
	<td align='center'>Status: $rs[status]<br>
	<a href='students.php?editid=". $rs["stid"]. "'>Edit</a>
	</td>
	</tr>";
	
}
?>
</table>
<br />
   <hr /> 

<h2>Room Registration details </h2>

<?php
if(isset($_GET["studentid"]))
$result=mysql_query("SELECT * FROM registration where stid='$_GET[studentid]'",$db);

if(mysql_num_rows($result) == 0)
{
	$resultgender=mysql_query("SELECT * FROM student left join course ON course.course_id = student.courseid where stid='$_GET[studentid]'",$db);
    $rsgender=mysql_fetch_array($resultgender);
?>
    <h1 align="center"><a href='selectblocks.php?studentid=<?php echo $_GET['studentid']; ?>&gender=<?php echo $rsgender['gender']; ?>&courseid=<?php echo $rsgender['course_id']; ?>'>Allot room</a></h1>
<?php	
}
else
{
?>


     <table class="tftable" width="922" border="1">
    <tr align="center" bgcolor="#FFFFCC">
    <th><strong>Room details</strong></th>
    <th><strong>Student type</strong></th>
    <th><strong>Date</strong></th>
    <th><strong>Types of food</strong></th>
    <th><strong>Action</strong></th>
    </tr>
    
    <?php
    while($rs=mysql_fetch_array($result))
    {
        $regid = $rs["reg_id"];
        
        echo "<tr>";
    $result3=mysql_query("SELECT * FROM student left join course ON course.course_id = student.courseid where stid='$rs[stid]'",$db);
    $rs3=mysql_fetch_array($result3);
    
        echo "<td>";
    
    $resultroom1=mysql_query("SELECT * FROM room where room_id='$rs[room_id]'",$db);
    $rsroom1 =mysql_fetch_array($resultroom1);
    echo "Room No.: $rsroom1[room_no]<br>";
	
    $resultblock2= mysql_query("SELECT * FROM blocks where block_id='$rsroom1[block_id]'",$db);
    $rsblock2=mysql_fetch_array($resultblock2);
    echo "Block Name: $rsblock2[block_name]<br>";
    
        echo "</td>
        <td>&nbsp; $rs[stud_type]</td>
        <td>
        &nbsp; Start date: $rs[start_date]<br>
        &nbsp; End date: $rs[end_date]</td>
        <td>&nbsp;
        Food type: $rs[food_type]<br>
        &nbsp;&nbsp;Beverage type: $rs[beverage_type]</td>
        <td align='center'>
        $rs[status]</td>
        </tr>";
    }
    ?>
    </table>
<?php
}
?>
<br />
<?php
if(mysql_num_rows($result) !=0)
{
?>
   <hr /> 
   <h2>Invoice details  </h2>
<?php
$result=mysql_query("SELECT * FROM fees where reg_id='$regid'",$db);
if(mysql_num_rows($result) == 0)
{
?>
    <h1 align="center"><a href='payfees.php?regid=<?php echo $regid; ?>&studentid=<?php echo $rs3['stid']; ?>&courseid=<?php echo $rs3['courseid']; ?>'>Create invoice</a><br></h1>
<?php	
}
else
{
?>
     <table class="tftable" width="922" border="1">
    <tr align="center" bgcolor="#FFFFCC">
    <th height="23"><strong>Particulars</strong></th>
    <th><strong>Invoice Date</strong></th>
    <th><strong>Cost</strong></th>
    </tr>
    
    <?php

    
    while($rs=mysql_fetch_array($result))
    {
        echo "<tr>
        <td>&nbsp; Establishment Fee. </td>
        <td align='center'>$rs[invoice_date]</td>
        <td align='center'>&nbsp; Rs.  $rs[total_fees] </td>	
        </tr>";
        $totalfee = $totalfee + $rs["total_fees"];
    }
    
    $result=mysql_query("SELECT * FROM mess_bill where reg_id='$regid'",$db);
    while($rs=mysql_fetch_array($result))
    {
        echo "<tr>
        <td>&nbsp; Mess Advance</td>
        <td align='center'>$rs[date]</td>
        <td align='center'>&nbsp; Rs.  $rs[mess_bill] </td>	
        </tr>";
        $totalfee = $totalfee + $rs["mess_bill"];
    }
    
        echo "<tr bgcolor='#99FFFF'>
        <td colspan='2'  align='center'>&nbsp; <strong>Total Invoice : </strong></td>
        <td align='center'>&nbsp;<strong> Rs.  $totalfee </strong></td>	
        </tr>";
    ?>
    </table>
<?php
}
?>
<br />
<hr />
 <h2>Payment details  </h2>

<a href='billing.php?regid=<?php echo $regid; ?>&studentid=<?php echo $rs3['stid']; ?>&courseid=<?php echo $rs3['courseid']; ?>'>Pay Fee</a>
    
 <table class="tftable" width="922" border="1">
<tr align="center" bgcolor="#FFFFCC">
<th height="23"><strong>Payment type</strong></th>
<th><strong>Date</strong></th>
<th><strong>Paid Amount</strong></th>
</tr>
<?php
$paidfee = 0;
$result=mysql_query("SELECT * FROM billing where reg_id='$regid'",$db);
while($rs=mysql_fetch_array($result))
{
	echo "<tr>
	<td>&nbsp; $rs[bill_type]</td>
	<td align='center'>$rs[paid_date]</td>
	<td align='center'>&nbsp; Rs.  $rs[paid_amt] </td>	
	</tr>";
	$paidfee = $paidfee  + $rs["paid_amt"];
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
        <hr />
        <h2>View Mess card </h2>

<a href='messcard.php?regid=<?php echo $regid; ?>&studentid=<?php echo $rs3['stid']; ?>&courseid=<?php echo $rs3['courseid']; ?>'>Add Mess card</a><br>

  <table class="tftable" width="909" border="1">
<tr align="center" bgcolor="#FFFFCC"> 
<th><strong>Messcard type</strong></th>
<th><strong>Food type</strong></th>
<th><strong>Beverage type</strong></th>
<th><strong>Start date</strong></th>
<th><strong>End date</strong></th>
<th><strong>Status</strong></th>
<th><strong>Action</strong></th>
</tr>

<?php
$result=mysql_query("SELECT messcard.*, registration.*, student.*, messcard.messcardid AS Expr1 FROM         student INNER JOIN  registration ON student.stid = registration.stid RIGHT OUTER JOIN messcard ON registration.reg_id = messcard.reg_id",$db);
while($rs=mysql_fetch_array($result))
{
	echo "<tr>
		<td>$rs[messcard_type]</td>
	<td>$rs[food_type]</td>
	<td>$rs[beverage_type]</td>

	<td>$rs[start_date]</td>
	<td>$rs[enddate]</td>
	<td>$rs[status]</td>
	<td align='center'><a href='viewmesscard.php?delid=$rs[messcardid]'onclick='return ConfirmDelete()'>Delete</a></td>
	</tr>";
}
?>
</table>
        <br />
        <hr />
        <h2>View Visitor details</h2>
        <p><strong><a href="visitor.php?visitorid=<?php echo $_GET['studentid']; ?>">Add New Visitor</a></strong></p>
 <table class="tftable" border="1">
<tr bgcolor="#FFFFCC">
<th width="138"><strong>Parents Name</strong></th>
<th width="131"><strong>Relation type</strong></th>
<th width="103"><strong>Username</strong></th>
<th width="124"><strong>Contact no</strong></th>
<th width="110"><strong>Comments</strong></th>
<th width="110"><strong>Status</strong></th>
<th width="161"><strong>Action</strong></th>
</tr>

<?php
if(isset($_GET["studentid"]))
{
	$result= mysql_query("SELECT visitor.*,student.* FROM visitor LEFT JOIN  student ON visitor.stid= student.stid ",$db);
}
else
{
	$result= mysql_query("SELECT visitor.*,student.* FROM visitor LEFT JOIN  student ON visitor.stid= student.stid",$db);	
}
while($rs=mysql_fetch_array($result))
{
	echo "<tr>
	<td>$rs[2]</td>
	<td>$rs[type]</td>
	<td>$rs[username]</td>
	<td>$rs[contactno]</td>
	<td>$rs[comments]</td>
	<td>$rs[status]</td>
	<td><a href='viewstudentdetails.php?delid=$rs[visitorid]&studentid=$_GET[studentid]' onclick='return ConfirmDelete()'>Delete</a></td>
	</tr>";
}
?>
</table>

<br />
   <hr />     
<?php
}
?>

        
</div>
</div>

<?php
include("footer.php");
?>
	