<?php
include("header.php");
include("databaseconnection.php");
?>
    
    <div id="templatemo_middle_subpage">
    	<h2>Select block</h2>
  </div>
        
    <div id="templatemo_main">

        <div class="col_w900 col_w900_last">
            <div id="gallery" bg>
                <ul>   
<?php
$resultblocks = mysqli_query($dbconnection,"
SELECT     blocks.*, block_allotment.*, blocks.gender AS Expr1, block_allotment.course_id AS Expr2
FROM         blocks LEFT OUTER JOIN
                      block_allotment ON blocks.block_id = block_allotment.block_id
WHERE     (blocks.gender = '$_GET[gender]') AND (block_allotment.course_id = '$_GET[courseid]') AND (blocks.status = 'Enabled') AND (block_allotment.status = 'Enabled')");
while($rsblocks = mysqli_fetch_array($resultblocks))
{
$resultblocks1 = mysqli_query($dbconnection,"SELECT * FROM room where block_id='$rsblocks[block_id]' AND status = 'Enabled'");
$rsblocks1 = mysqli_fetch_array($resultblocks1);
	echo "<li>
	<center><strong><font size='3'>$rsblocks[block_name]</font></strong></center><br>
	<strong>&nbsp;&nbsp;Gender: </strong> $rsblocks[gender]<br>
	<strong>&nbsp;&nbsp;No. of Rooms: </strong>";
	echo mysqli_num_rows($resultblocks1);
	echo "<br><br>
	<center><strong><a href='selectrooms.php?blockid=$rsblocks[block_id]&studentid=$_GET[studentid]'><font size='3'>Select Block</font></a></strong></center><br>
	</li>";   
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