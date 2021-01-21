<?php
include("header.php");
include("databaseconnection.php");

    $resultregno=mysql_query("SELECT * FROM registration where stid='$_SESSION[stid]' AND status='Enabled'",$db);
    $rsregno=mysql_fetch_array($resultregno);

$_SESSION["insid"] = rand();


?>
    <div id="studiv"> <!--white div element -->
        
                  <p>
<form method="post" action="" name="form1" onsubmit="return validation()">

            <h2 align="center" class="h2dash"><b>Fees details</b></h2>


<?php



?>
     <table class="tftable" width="100%" border="0">  <!--table css-->
    <tr align="center" bgcolor="skyblue">
    <td height="23" align="left"><strong >&nbsp;Expensive</strong></td>
    <td><strong>&nbsp;</strong></td>
    <td><strong>Cost</strong></td>
    </tr>
    
    <?php
    $totalfee=0;
    
$result=mysql_query("SELECT * from fees_structure");
    while($rs=mysql_fetch_array($result))
    {
        echo "<tr>
        <td>&nbsp; $rs[fee_type]</td>
        <td align='center'></td>
        <td align='center'>&nbsp; Rs.  $rs[cost] </td>  
        </tr>";
        $totalfee = $totalfee + $rs["cost"];
    
    }
$result=mysql_query("SELECT * FROM `student`,room,room_type WHERE room.room_id=student.room_id and room_type.rtid = room.rtid and stid='$_SESSION[stid]'",$db);    
    while($rs=mysql_fetch_array($result))
    {
        echo "<tr>
        <td>&nbsp; $rs[room_type]</td>
        <td align='center'></td>
        <td align='center'>&nbsp; Rs.  $rs[room_price] </td>	
        </tr>";

                if($rs["mservice"]==1){
                            echo "<tr>
        <td>&nbsp; Milk Service</td>
        <td align='center'></td>
        <td align='center'>&nbsp; Rs.  800 </td>  
        </tr>";
             $totalfee +=800;
                }

                if($rs["nservice"]==1){
                            echo "<tr>
        <td>&nbsp; News Paper</td>
        <td align='center'></td>
        <td align='center'>&nbsp; Rs.  100 </td>  
        </tr>";
             $totalfee +=100;
                }

                if($rs["lservice"]==1){
                            echo "<tr>
        <td>&nbsp; Laundry</td>
        <td align='center'></td>
        <td align='center'>&nbsp; Rs.  1000 </td>  
        </tr>";
             $totalfee +=1000;
                }
        if($rs["wifi"]==1){
            echo "<tr>
        <td>&nbsp; WIFI Service</td>
        <td align='center'></td>
        <td align='center'>&nbsp; Rs.  1000 </td>  
        </tr>";
            $totalfee +=1000;
        }

        if($rs["vault"]==1){
            echo "<tr>
        <td>&nbsp; Security Vault</td>
        <td align='center'></td>
        <td align='center'>&nbsp; Rs.  1000 </td>  
        </tr>";
            $totalfee +=1000;
        }

        if($rs["parking"]==1){
            echo "<tr>
        <td>&nbsp;2W Parking</td>
        <td align='center'></td>
        <td align='center'>&nbsp; Rs.  500 </td>  
        </tr>";
            $totalfee +=500;
        }

        $totalfee = $totalfee + $rs["room_price"];
    }
    while($rs1=mysql_fetch_array($result))
    {
        echo "<tr>
        <td>&nbsp; $rs[fee_type]</td>
        <td align='center'></td>
        <td align='center'>&nbsp; Rs.  $rs[room_price] </td>  
        </tr>";
        $totalfee = $totalfee + $rs["room_price"];
    
    }


echo "</table>";
echo "<h2 class='h2dash' style='padding-top: 15px'><b>Total Fess:$totalfee</b></h2>";
    ?>

    

<br />
<hr />
    
</table>
            <button class="but-s" onclick="window.print()">Print</button>  <!--button css-->
</p>
<div class="cleaner"></div>
                </div>
</div>           
           


<?php
include("footer.php");
?>