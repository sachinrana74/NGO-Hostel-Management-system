<?php
include("header.php");
include("databaseconnection.php");
?>

<?php
if(isset($_POST["submit"]))
{
$sql="insert into `leave`(sdate,edate,reason,stid) values('$_POST[frm]','$_POST[to]','$_POST[rel]','$_SESSION[stid]')";
		mysql_query($sql,$db) or die('ERROR:'. mysql_error());
echo "<head><script>alert('Leave Applied Successfully....');</script></head>";
}

?>
    <div id="studiv">
        <div class="col_w900 col_w900_last">        
<div class="col_w580 float_l">            
<div class="">
    <h2 class="h2dash"><b>Visitor Request</b></h2>
<p><form method="post" action="" name="form1">
 <table class="tftable" width="100%"  border="0">
<tr><td width="112">From Date:</td><td width="228"><input class="form-control" required type="date" name="frm"  value=""  /></td></tr>
<tr><td width="112">To Date:</td><td width="228"><input class="form-control" required type="date" name="to"  value=""  /></td></tr>
<tr><td>Reason:</td><td><input  class="form-control" required type="text" name="rel"/></td></tr>
</table>
<br><div style="text-align: center;"><button class="but-s" type="submit" name="submit" value="Change password">Submit</button></div>

</form> 


<br>
    <h2 class="h2dash"><b>Previous Request...</b></h2><br>
<table border="=1" class="tftable" style="width: 800px" >
	<th>Start Date</th>
    <th>End Date</th>
    	<th>Reasn</th>
	<th>Status</th></tr>
<?php
            $sql=mysql_query("select * from `leave` where stid='$_SESSION[stid]'");
            while($r=mysql_fetch_array($sql))
        echo "<tr><td>$r[sdate]</td><td>$r[edate]</td><td>$r[reason]</td><td>$r[status]</td></tr>";
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