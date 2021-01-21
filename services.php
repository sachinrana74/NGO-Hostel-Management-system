<?php
include("header.php");
include("databaseconnection.php");
if(isset($_GET['mid'])){    
    $sql="update student set mservice=$_GET[mid] WHERE stid=$_SESSION[stid]";    
    mysql_query($sql) or die(mysql_error());
}

if(isset($_GET['lid'])){    
    $sql="update student set lservice=$_GET[lid] WHERE stid=$_SESSION[stid]";    
    mysql_query($sql) or die(mysql_error());
}

if(isset($_GET['nid'])){    
    $sql="update student set nservice=$_GET[nid] WHERE stid=$_SESSION[stid]";    
    mysql_query($sql) or die(mysql_error());
}

if(isset($_GET['wifi'])){
    $sql="update student set wifi=$_GET[wifi] WHERE stid=$_SESSION[stid]";
    mysql_query($sql) or die(mysql_error());
}

if(isset($_GET['vault'])){
    $sql="update student set vault=$_GET[vault] WHERE stid=$_SESSION[stid]";
    mysql_query($sql) or die(mysql_error());
}

if(isset($_GET['par'])){
    $sql="update student set parking=$_GET[par] WHERE stid=$_SESSION[stid]";
    mysql_query($sql) or die(mysql_error());
}

$sqlquery = "SELECT * FROM student WHERE stid='$_SESSION[stid]'";
$sqlqueryresult = mysql_query($sqlquery,$db);
$sqlfetch = mysql_fetch_array($sqlqueryresult);



?>

    <div id="studiv">
    <div class="col_w900 col_w900_last">        
    <div class="col_w580 float_l">            
    <div class="">
        <h1 align="center" class="h2dash"><b>Service details</b></h1>
    <table class="tftable">
    
<?php
if($sqlfetch["nservice"]==0)
    echo "<tr><td><h3>News Paper</h3></td><td><a href=services.php?nid=1><button class='btn btn-danger'>OFF</button></a></td></tr>";
else
    echo "<td><h3>News Paper</h3></td><td><a href=services.php?nid=0><button class='btn btn-success'>ON</button></a></td></tr>";

if($sqlfetch["mservice"]==0)

echo "<tr><td><h3>Milk Service</h3></td><td><a href=services.php?mid=1><button class='btn but-fal'>OFF</button></a></td></tr>";
else
    echo "<td><h3>Milk Service</h3></td><td><a href=services.php?mid=0><button class='btn btn-success'>ON</button></a></td></tr>";

if($sqlfetch["lservice"]==0)
echo "<tr><td><h3>Laundary</h3></td><td><a href=services.php?lid=1><button class='btn but-fal'>OFF</button></a></td></tr>";
else
    echo "<td><h3>Laundary</h3></td><td><a href=services.php?lid=0><button class='btn btn-success'>ON</button></a></td></tr>";

if($sqlfetch["wifi"]==0)
    echo "<tr><td><h3>WIFI</h3></td><td><a href=services.php?wifi=1><button class='btn but-fal'>OFF</button></a></td></tr>";
else
    echo "<td><h3>WIFI</h3></td><td><a href=services.php?wifi=0><button class='btn btn-success'>ON</button></a></td></tr>";

if($sqlfetch["vault"]==0)
    echo "<tr><td><h3>Security Vault</h3></td><td><a href=services.php?vault=1><button class='btn but-fal'>OFF</button></a></td></tr>";
else
    echo "<td><h3>Security Vault</h3></td><td><a href=services.php?vault=0><button class='btn btn-success'>ON</button></a></td></tr>";

if($sqlfetch["parking"]==0)
    echo "<tr><td><h3>Parking</h3></td><td><a href=services.php?par=1><button class='btn but-fal'>OFF</button></a></td></tr>";
else
    echo "<td><h3>Parking</h3></td><td><a href=services.php?par=0><button class='btn btn-success'>ON</button></a></td></tr>";
 ?>
</table>

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