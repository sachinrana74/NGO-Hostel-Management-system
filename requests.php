
<style>
    input[type='submit']{
        font-size: 20px;
        border-bottom: 2px solid #3B3175;
        border-top: 2px solid #3B3175;
        border-left: 2px solid #3B3175 ;
        border-right: 2px solid #3B3175;
        padding-left: 10px;
        padding-top: 10px;
        padding-bottom: 10px;
        padding-right: 10px;
        background-color: #6d518a;
    }
    input[type='submit']:hover{
        cursor: pointer;
        background-color: #3B3175;
        border-radius: 20px;
        -webkit-animation: input[type='submit'] 0.8s cubic-bezier(0.455, 0.030, 0.515, 0.955)  both;
        animation: input[type='submit'] 0.8s cubic-bezier(0.455, 0.030, 0.515, 0.955)  both;
    }
    @-webkit-keyframes input[type='submit'] {
        0%,
        100% {
            -webkit-transform: translateX(0);
            transform: translateX(0);
        }
        10%,
        30%,
        50%,
        70% {
            -webkit-transform: translateX(-10px);
            transform: translateX(-10px);
        }
        20%,
        40%,
        60% {
            -webkit-transform: translateX(10px);
            transform: translateX(10px);
        }
        80% {
            -webkit-transform: translateX(8px);
            transform: translateX(8px);
        }
        90% {
            -webkit-transform: translateX(-8px);
            transform: translateX(-8px);
        }
    }
    @keyframes input[type='submit'] {
        0%,
        100% {
            -webkit-transform: translateX(0);
            transform: translateX(0);
        }
        10%,
        30%,
        50%,
        70% {
            -webkit-transform: translateX(-10px);
            transform: translateX(-10px);
        }
        20%,
        40%,
        60% {
            -webkit-transform: translateX(10px);
            transform: translateX(10px);
        }
        80% {
            -webkit-transform: translateX(8px);
            transform: translateX(8px);
        }
        90% {
            -webkit-transform: translateX(-8px);
            transform: translateX(-8px);
        }
    }




</style>
<?php
include("header.php");
include("databaseconnection.php");

if (isset($_GET['sub1']))
 {
    $s=substr($_GET['stat'], 0, 6);
    $id=substr($_GET['stat'],6,7);
        $sql="Update room_req set status='$s' where rrid=$id";
    mysql_query($sql) or die(mysql_error());
    echo "<head><script>alert('Request Updated Successfully....');</script></head>";    
}


if (isset($_GET['sub2']))
 {
    $s=substr($_GET['stat'], 0, 6);
    $id=substr($_GET['stat'],6,7);
        $sql="Update vistor_req set status='$s' where vrid=$id";
    mysql_query($sql) or die(mysql_error());
    echo "<head><script>alert('Request Updated Successfully....');</script></head>";    
}


?>
    <div id="studiv">
        <div class="col_w900 col_w900_last">        

            	
                    
                  <p>
     <p>
            <h2 class="h2dash"><b>Room Request...</b></h2></p><br>
<table border="=1" class="tftable" style="width: 800px" align="center"
    <tr align="center"><th>Request No</th>
    <th>Type Of Room</th>
    <th>Student ID</th>
    <th>Status</th>
    <th>Action</th></tr>

<?php
            $sql=mysql_query("select * from room_req ");
            while($r=mysql_fetch_array($sql))
    {
            

                            if($r["status"]=='Pending')
                    {
                    
                        echo "<tr align=center><td>$r[rrid]</td><td>$r[type]</td><td>$r[stid]</td><td>$r[status]</td>";
                        echo "<form action=> <td colspan=2><select name=stat>";
                        echo "<option value=Accept$r[rrid]>Accept</option>";
                        echo "<option value=Reject$r[rrid]>Reject</option>";
                        echo "</select><input type=submit name=sub1></form>";
    

                    }
                    else
                    {
                    echo "<tr align=center><td>$r[rrid]</td><td>$r[type]</td><td>$r[stid]</td><td>$r[status]</td><td>No Action Required</td></tr>";
                    
                    }

    }
echo "</table>";
?><br>
     <p>
            <h2 class="h2dash"><b>Visitor Request...</b></h2></p><br>
<table border="=1" class="tftable" style="width: 800px" align="center">
    <tr align="center"><th>Request No</th>
    <th>Date</th>
    <th>Time</th>
    <th>Visitor Name</th>
    <th>Requested By</th>
    <th>Status</th><th>Action</th></tr>

<?php
            $sql=mysql_query("select * from vistor_req ");
            while($r=mysql_fetch_array($sql))
    {
        

                            if($r["status"]=='Pending')
                    {
                    
                        echo "<tr align=center><td>$r[vrid]</td><td>$r[dat]</td><td>$r[time]</td>
                        <td>$r[vname]</td><td>$r[email]</td><td>$r[status]</td>";
                        echo "<form action=> <td colspan=2><select name=stat>";
                        echo "<option value=Accept$r[vrid]>Accept</option>";
                        echo "<option value=Reject$r[vrid]>Reject</option>";
                        echo "</select><input type=submit name=sub2></form>";
                    }
                    else
                    {
                    
                        echo "<tr align=center><td>$r[vrid]</td><td>$r[dat]</td><td>$r[time]</td>
                        <td>$r[vname]</td><td>$r[email]</td><td>$r[status]</td>";
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