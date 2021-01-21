<?php

include("header.php");
include("databaseconnection.php");
echo $_SESSION["visitorid"];
$res="select visitor.*,student.* FROM visitor inner join student on student.stid=visitor.stid WHERE visitorid='$_SESSION[visitorid]'";
$g=mysql_query($res,$db);
$s=mysql_fetch_array($g);
?>
    <div id="templatemo_main">

        <div class="col_w900 col_w900_last">
        
<div class="col_w580 float_l">
            
            	<div class="post_box">
            	 
                    <h2>Visitor Profile</h2>
                  <p>
                <table class="tftable" width="208" border="2">
               <tr><td width="107">Name</td><td width="83">
               <?php echo $s["name"]; ?></td></tr>   
                <tr><td>Type</td><td><?php
                echo $s["type"];?></td></tr>
                 <tr><td>Username</td><td><?php
                echo $s["username"];?></td></tr>      
                  <tr><td>Contactno</td><td><?php
                echo $s["contactno"];?></td></tr>
                   <tr><td>Comment</td><td><?php
                echo $s["comments"];?></td></tr>      
                  </table>
                   
                   
                   <h2>Student Profile</h2>
                   
                    <table class="tftable" width="311"  border="2">
                <tr><td>Name</td><td><?php
                echo $s["name"];?></td></tr>
                 <tr><td>Rollno</td><td><?php
                echo $s["rollno"];?></td></tr>      
                  <tr><td>DOB</td><td><?php
                echo $s["dob"];?></td></tr>
                   <tr><td>Father name</td><td><?php
                echo $s["father_name"];?></td></tr>
                <tr><td>Mother name</td><td><?php
                echo $s["mother_name"];?></td></tr>
                 <tr><td>Gender</td><td><?php
                echo $s["gender"];?></td></tr>      
                  <tr><td>Address</td><td><?php
                echo $s["address"];?></td></tr>
                   <tr><td>Contactno</td><td><?php
                echo $s["contact_no"];?></td></tr> 
                <tr><td>Parentsno</td><td><?php
                echo $s["parents_no"];?></td></tr>
                   <tr><td>Bloodgroup</td><td><?php
                echo $s["blood_group"];?></td></tr> 
                
                     
                 
                   
                  </table>
                  </p>
                    <div class="cleaner"></div>
                </div>
</div>
            
         
            
            <div class="cleaner"></div>
		</div>
        
        <div class="cleaner"></div>
    </div> <!-- end of main -->
        
</div> <!-- end of wrapper -->


<?php
include("footer.php");
?>