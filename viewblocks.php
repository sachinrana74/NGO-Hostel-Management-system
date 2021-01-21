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
include("databaseconnection.php");
$delrec=mysqli_query($dbconnection,"DELETE FROM blocks where block_id='$_GET[delid]'");

?>
<?php
include("header.php");
?>
    <div id="templatemo_main">
        <div class="col_w900 col_w900_last">        
<div class="col_w580 float_l">            
            	<div class="post_box">            	
                    <h2>View blocks</h2>
                  <p>
 <table class="tftable" width="853" border="1">
<tr>
<td width="93"><strong>Block name</strong></td>
<td width="264"><strong>Gender</strong></td>
<td width="204"><strong>Description</strong></td>
<td width="114"><strong>Status</strong></td>
<td width="144"><strong>Action</strong></td>
</tr>

<?php
$result = mysqli_query($dbconnection,"SELECT * FROM blocks");
while($rs = mysqli_fetch_array($result))
{
echo "<tr>
<td>$rs[block_name]</td>
<td>$rs[gender]</td>
<td>$rs[description]</td>
<td>$rs[status]</td>
<td>
<a href='block.php?editid=$rs[block_id]' >Edit</a>
 | 
<a href='viewblocks.php?delid=$rs[block_id]' onclick='return ConfirmDelete()'>Delete</a>
</td>
</tr>";
}
?>

</table></p>
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