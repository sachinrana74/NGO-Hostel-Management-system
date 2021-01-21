<?php
include("header.php");
include("databaseconnection.php");
?>
<script type="application/javascript">
function validation()
{
	if(document.form1.block.value=="")
	{
		alert("Block should not be Empty...");
		return false;
	}
	else if(document.form1.roomno.value=="")
	{
		alert("Room Number should not be Empty...");
		return false;
	}
	else if(document.form1.roomno.value>10000)
	{
		alert("Room Number is not valid...");
		return false;
	}
	else if(document.form1.noofbeds.value=="")
	{
		alert("No of Beds should not be Empty...");
		return false;
	}
	else if(document.form1.description.value=="")
	{
		alert("Description should be Text...");
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
				$sqlquery ="INSERT INTO room (room_no,no_of_beds,floor_no,washroom,description,rtid) VALUES ($_POST[rno],$_POST[noofbeds],$_POST[fno],$_POST[wash],'$_POST[desc]','$_POST[type]')";		
echo "$sqlquery";
			mysql_query($sqlquery) or die("Unable to insert...");

				echo "<head><script>alert('One room inserted successfully......');</script></head>";
				
			
	}

?>
    <div id="studiv">  <!--white div element -->
        <div class="col_w900 col_w900_last">      <!--nothing -->      
        
<div class="col_w580 float_l">          <!--nothing -->   
            	<div class="">    <!--nothing -->
                    <h2 class="h2dash"><b>Add rooms</b></h2>
                  <p>

<form method="post" action="" name="form1" >

 <table class="tftable" border="0" style="width: 900px">    <!--table hover and seprate the input -->
<?php
?>
<tr><td width="123">Type</td><td width="219">
<select name="type"  >
<option value="">Select</option>
<?php
$resultblocks = mysql_query("SELECT room.rtid,room_type as type FROM `room`,room_type  WHERE room_type.rtid = room.rtid GROUP by room_type.rtid",$db);
while($rsblocks = mysql_fetch_array($resultblocks))
{	
		echo "<option value='$rsblocks[rtid]'>$rsblocks[type]</option>";
	
}
?>
</select>
</td></tr>

<tr><td width="123">Floor No</td><td width="219">
<select name="fno"  >
<option value="">Select</option>
<?php
$resultblocks = mysql_query("SELECT floor_no FROM `room` GROUP by floor_no ",$db);
while($rsblocks = mysql_fetch_array($resultblocks))
{	
		echo "<option value='$rsblocks[floor_no]'>$rsblocks[floor_no]</option>";
}
?>
</select>
</td></tr>

<tr><td>Washroom</td><td><select name="wash">
<option value='1' selected>1</option>
<option value='2' >2</option>
<option value='3' >3</option>
</select>
</td></tr>


<tr><td>Room no</td><td><div id="txtroomno">

<input type="number" name="rno">

<tr><td>No of beds</td><td><select name="noofbeds">


<option value='1' selected>1</option>
<option value='2' >2</option>
<option value='3' >3</option>



</select>
</td></tr>
<tr><td>Discription</td><td><input type=textarea name="desc"></td></tr>



<tr><td colspan="2" align="center"><button type="submit" class="but-s" name="submit" />Submit</button></td></tr>
</table>
</form>
</p>
<div class="cleaner"></div>
                </div>
</div>           
            <div class="col_w280 float_r">
            <?php
//			include("sidebar.php");
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