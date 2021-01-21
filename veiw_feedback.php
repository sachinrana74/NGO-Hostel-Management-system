<?php
include("header.php");
include("databaseconnection.php");

if (isset($_GET['sub1']))
 {
        $sql="Update feedback set responce='$_GET[responce]' where fbid=$_GET[fbid]";
        mysql_query($sql) or die(mysql_error());
    echo "<head><script>alert('Feedback sent Successfully....');</script></head>";
}


if (isset($_GET['sub2']))
 {
    $s=substr($_GET['stat'], 0, 6);
    $id=substr($_GET['stat'],6,7);
        $sql="Update `leave` set status='$s' where lid=$id";
    mysql_query($sql) or die(mysql_error());
    echo "<head><script>alert('Leave Accepted Successfully....');</script></head>";
}


?>
    <div id="studiv">
        <div class="col_w900 col_w900_last">
            <h2 class="h2dash"><b>Feedback Recived...</b></h2><br>
<table border="=1" class="tftable" style="width: 800px" align="center">
    <tr align="center">
    <th>Feedback</th>
    <th>Student ID</th>
        <th style="text-align: center;">Responce</th></tr>

<?php
            $sql=mysql_query("select * from feedback");
            while($r=mysql_fetch_array($sql))
    {
                       if($r["responce"]=='' || $r["responce"]==null)
                    {
                        echo "<tr align=center><td>$r[feedback]</td><td>$r[stid]</td>";
                        echo "<form action=> <td colspan=2>";
                        echo "<input type='text'  required name='responce' style='width: 500px'><input type='hidden' name='fbid' value='$r[fbid]'><input class='btn btn-success' type=submit name=sub1></form>";
                    }
                    else
                    {
                    echo "<tr align=center><td>$r[feedback]</td><td>$r[stid]</td><td>$r[responce]</td></tr>";
                    
                    }

    }
echo "</table>";
?><br>
     <p>
    <h2 class="h2dash"><b>Leave Request...</b></h2></table><br>
<table border="=1" class="tftable" style="width: 800px" align="center">
    <tr align="center">
    <th>Start Date</th>
    <th>End date</th>
    <th>Status</th>
    <th>Reason</th>
    <th>Requested By</th>
    <th>Action</th></tr>

<?php
            $sql=mysql_query("select * from `leave`");
            while($r=mysql_fetch_array($sql)){
            if($r["status"]=='pending')
                    {
                        echo "<tr align=center><td>$r[sdate]</td><td>$r[edate]</td><td>$r[status]</td><td>$r[reason]</td><td>$r[stid]</td>";
                        echo "<form action=> <td colspan=2><select name=stat>";
                        echo "<option value=Accept$r[lid]>Accept</option>";
                        echo "<option value=Reject$r[lid]>Reject</option>";
                        echo "</select><input type=submit name=sub2></form>";
                    }
                    else
                    {
                        echo "<tr align=center><td>$r[sdate]</td><td>$r[edate]</td><td>$r[status]</td><td>$r[reason]</td><td>$r[stid]</td>";
                        echo "<td colspan=2>No Action Required</td></tr>";
 
                    }
    }
echo "</table>";
?>






</table>
    
                </div>
</div>           
            <div class="cleaner"></div>
		</div>
        
  
    </div> <!-- end of main -->
        

</div>

<?php
include("footer.php");
?>