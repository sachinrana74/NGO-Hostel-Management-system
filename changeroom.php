<style>

    </style>

<?php
include("header.php");
include("databaseconnection.php");
?>

<?php


if(isset($_POST["submit"]))
{
$sql="insert into room_req(type,stid) values('$_POST[type]',$_SESSION[stid])";

		mysql_query($sql,$db) or die('ERROR:'. mysql_error());
echo "<head><script>alert('Request Sent  Successfully....');</script></head>";
}






?>
<center>
    <div id="studiv">
        <div class="col_w900 col_w900_last">
<div class="col_w580 float_l">            
            	<div class="">
                    <h2 class="h2dash"><b>Change Room</b></h2>
<p><form method="post" action="" name="form1" onsubmit="return validation()">
 <table class="tftable" width="100%"  border="0">
<?php
if (isset($resi))
if($resi== 1)
{
echo "<tr><td colspan='2'> $res </td></tr>";
}
?>

<select name="type" style="width: 400px; height: 35px; ">            
<?php
            $sql=mysql_query("SELECT room.rtid,room_type as type FROM `room`,room_type  WHERE room_type.rtid = room.rtid GROUP by room_type.rtid");
            while($r=mysql_fetch_array($sql))

        echo "<option value=$r[type]>$r[type]</option>";


?>
  </select></tr>
</table>
<br><center><button class="but-s" type="submit" name="submit" value="Change password"/>Change</button></center>

</form><br>
                    <h3 class="h2dash"><b>Previous Request...</b></h3><br>
<table border="=1" class="tftable" style="width: 800px" >
	<tr><th>Request No</th>
	<th>Type Of Room</th>	
	<th>Status</th></tr>

<?php
            $sql=mysql_query("select * from room_req where stid=$_SESSION[stid]");
            while($r=mysql_fetch_array($sql))
        echo "<tr><td>$r[rrid]</td><td>$r[type]</td><td>$r[status]</td></tr>";


?>






</table>

</p>
<div class="cleaner"></div>
                </div>
</div>           
            <div class="col_w280 float_r">
            
            </div>            
            <div class="cleaner"></div>
		</div>
        
        <div class="cleaner"></div>
    
  </div>      
</div> <!-- end of wrapper -->

</center>
<?php
include("footer.php");
?>