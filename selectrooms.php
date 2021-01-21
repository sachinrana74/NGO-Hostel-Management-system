<?php
include("header.php");
include("databaseconnection.php");
?>
    
    <div id="templatemo_middle_subpage">
    	<h2>Select Room </h2>
  </div>
        
    <div id="templatemo_main">

        <div class="col_w900 col_w900_last">
            <div id="gallery" bg>
                <ul>   
<?php
$availablebeds =0;
$resultrooms = mysqli_query($dbconnection,"SELECT * FROM room where status = 'Enabled' AND block_id='$_GET[blockid]'");
while($rsrooms = mysqli_fetch_array($resultrooms))
{
$resultblocks1 = mysqli_query($dbconnection,"SELECT * FROM blocks where block_id='$rsrooms[block_id]' AND status = 'Enabled'");
$rsblocks1 = mysqli_fetch_array($resultblocks1);

$resultavailablebeds = mysqli_query($dbconnection,"SELECT * FROM registration where room_id='$rsrooms[room_id]' AND status = 'Enabled'");
$availablebeds = $rsrooms[no_of_beds] - mysqli_num_rows($resultavailablebeds);

	echo "<li><hr>
	<center><strong><font size='3'>Room No. : $rsrooms[room_no]</font></strong></center><br>
	<strong>&nbsp;&nbsp;Block name: </strong> $rsblocks1[block_name]<br>
	<strong>&nbsp;&nbsp;No. of  Beds: </strong>";
	echo $rsrooms[no_of_beds];
	
	echo "<br><strong>&nbsp;&nbsp;available Beds: </strong>";
	echo $availablebeds;
	echo "<br><br><center><strong>";
		if($availablebeds == 0)
		{
		echo "Fully occupied";			
		}
		else
		{
		echo "<a href='registration.php?blockid=$rsrooms[block_id]&roomid=$rsrooms[room_id]&studentid=$_GET[studentid]'><font size='3'>Select Room</font></a>";
		}
	echo "</strong></center><br></li>";   
}
?>                                   
                </ul>  
                <div class="cleaner"></div>
            </div>
            
            <div class="cleaner"></div>
		</div>
        
        <div class="cleaner"></div>
    </div> <!-- end of main -->
        
</div> <!-- end of wrapper -->

<?php
include("footer.php");
?>