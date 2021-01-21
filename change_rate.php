<?php
include("header.php");
include("databaseconnection.php");
?>
<?php
	

	if(isset($_POST["submit"]))
	{
				$sqlquery ="UPDATE `room_type` SET `room_price`=$_POST[gold] WHERE room_type = 'Gold'";		
				mysql_query($sqlquery);

				$sqlquery ="UPDATE `room_type` SET `room_price`=$_POST[silver] WHERE room_type = 'Silver'"		;
				mysql_query($sqlquery);

				$sqlquery ="UPDATE `room_type` SET `room_price`=$_POST[bronze] WHERE room_type = 'Bronze'"		;
				mysql_query($sqlquery);

				echo "<head><script>alert('Room Deatails Updated successffly......');</script></head>";							
	}
	$res=mysql_query("select * from room_type");

?>
    <div id="studiv">
        <div class="col_w900 col_w900_last">        
        
<div class="col_w580 float_l">            
            	<div class="">
                    <h2 class="h2dash"><b>Change Rooms Rent</b></h2>
                  <p>

<form method="post" action="" name="form1" >

 <table class="tftable" border="0" style="width: 900px">

<?php
$arr = mysql_fetch_array($res);

echo "<tr><td>Gold  </td><td>
<input type=number name=gold value=$arr[room_price]>";
$arr = mysql_fetch_array($res);
echo "<tr><td>Silver  </td><td>
<input type=number name=silver value=$arr[room_price]>";
$arr = mysql_fetch_array($res);
echo "<tr><td>Bronze  </td><td>
<input type=number name=bronze value=$arr[room_price]>";

?>





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