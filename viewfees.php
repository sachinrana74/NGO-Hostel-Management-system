
<?php
include("header.php");
include("databaseconnection.php");

    $resultregno=mysql_query("SELECT * FROM registration ",$db);
    $rsregno=mysql_fetch_array($resultregno);

$_SESSION["insid"] = rand();


?>
    <div id="studiv">
        
                  <p>
<form method="post" action="" name="form1" onsubmit="return validation()">

            <h2 align="center" class="h2dash"><b>Default Charges</b></h2>


<?php



?>
     <table class="tftable" width="100%" border="0">
    <tr align="center" bgcolor="skyblue">
    <td height="23" align="left"><strong >&nbsp;Expensive</strong></td>
    <td><strong>&nbsp;</strong></td>
    <td><strong>Cost</strong></td>
    </tr>
    
    <?php
    $totalfee=0;
    $g=0;$s=0;$p=0;

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
    echo "</table><table>";

?>	<br><br><br><br>
     <table class="tftable" width="100%" border="0">
<tr align="center" bgcolor="skyblue">
    
    <td><strong>Name</strong></td>
    <td><strong>Roll No</strong></td>
    <td><strong>DOB</strong></td>
    <td><strong>Gender</strong></td>
    <td><strong>Address</strong></td>
    <td><strong>Email</strong></td>
    <td><strong>Room NO</strong></td>
    <td><strong>Type</strong></td>
    <td><strong>Cost</strong></td>
    </tr>
<?php
$result=mysql_query("SELECT * FROM `student`,room,room_type WHERE room.room_id=student.room_id and room_type.rtid = room.rtid",$db);    
    while($rs=mysql_fetch_array($result))
    {
        echo "<tr>
        <td align='center'>$rs[name]</td>
        <td align='center'>$rs[rollno]</td>
        <td align='center'>$rs[dob] </td>	
        <td align='center'>$rs[gender]</td>
        <td align='center'>$rs[address]</td>
        <td align='center'>$rs[email] </td>	
        <td align='center'>$rs[room_no]</td>
        <td align='center'>$rs[room_type]</td>
        <td align='center'>$rs[room_price] </td>	
        </tr>";
        if($rs["room_type"]=="Gold")
        $g = $totalfee + $rs["room_price"];
            if($rs["room_type"]=="Silver")
        $s = $totalfee + $rs["room_price"];
            if($rs["room_type"]=="Bronze")
        $p = $totalfee + $rs["room_price"];
    
    }


echo "</table>";
echo "<h2 class='h2dash' style='padding-top:15px; font-size: 30px;font-weight: bolder '>Total Fess for Gold :$g</h2>";
echo "<h2 class='h2dash' style='padding-top:15px; font-size: 30px;font-weight: bolder '>Total Fess for Silver :$s</h2>";
echo "<h2 class='h2dash' style='padding-top:15px; font-size: 30px;font-weight: bolder '>Total Fess for Platinium :$p</h2>";
    ?>

    

<br />
<hr />

</table>
         <button class="but-s" onclick="window.print()">Print</button>
</p>
<div class="cleaner"></div>
                </div>
</div>           
           


<?php
include("footer.php");
?>