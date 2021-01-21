<?php
include("header.php");
include("databaseconnection.php");
?>

<?php
if(isset($_POST["submit"]))
{
$sql="insert into vistor_req(dat,time,vname,email,rel) values('$_POST[dat]',$_POST[time],'$_POST[name]','$_SESSION[visitorid]','$_POST[rel]')";

		mysql_query($sql,$db) or die('ERROR:'. mysql_error());
echo "<head><script>alert('Request Sent  Successfully....');</script></head>";

}

?>
    <div id="studiv">
        <div class="col_w900 col_w900_last">        
<div class="col_w580 float_l">            
            	<div class="">
                    <h2 class="h2dash"><b>Visitor Request</b></h2>
<p><form method="post" action="" name="form1" onsubmit="return validation()">
 <table class="tftable" width="100%"  border="0">
<tr><td width="112">Date:</td><td width="228"><input class="form-control" required type="date" name="dat"  value=""  /></td></tr>
<tr><td>Time</td><td><input class="form-control" required type="number" name="time"  min="1" max="24"/></td></tr>
<tr><td>Visitor Name:</td><td><input  class="form-control" required type="text" name="name"/></td></tr>
<tr><td>Relation with Visitor:</td><td><input  class="form-control" required type="text" name="rel"/></td></tr>
</table>
<br><center><button class="but-s" type="submit" name="submit" value="Change password"/>Submit</button></center>

</form> 


<br>
                    <h2 class="h2dash"><b>Previous Request...</b></h2><br>
<table border="=1" class="tftable" style="width: 800px" >
	<tr><th>Request No</th>
	<th>Date</th>
	<th>Time</th>
	<th>Name</th>
	<th>Relation</th>	
	<th>Status</th></tr>

<?php
            $sql=mysql_query("select * from vistor_req where email='$_SESSION[visitorid]'");
            
            while($r=mysql_fetch_array($sql))
        echo "<tr><td>$r[vrid]</td><td>$r[dat]</td><td>$r[time]00 HRS</td><td>$r[vname]</td><td>$r[rel]</td><td>$r[status]</td></tr>";


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
    </div> <!-- end of main -->
        
</div> <!-- end of wrapper -->


<?php
include("footer.php");
?>