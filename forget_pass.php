<?php
include("header.php");
include("databaseconnection.php");
if (isset($_POST['submit'])) {
$sql="select * from student,forget_pass where qid=fpid and qid='$_POST[que]' and ans='$_POST[ans]'";
$res=mysql_query($sql) or die (mysql_error());
if(mysql_num_rows($res)>0)
{
  $a=mysql_fetch_array($res);
  echo "<script>alert('Your Password is $a[password] ');</script>";
}
else 
  echo "<script>alert('Incorrect Details provided... ');</script>";
}
?>
<div id="templatemo_body_wrapper">
<div id="templatemo_wrappr">
    <div id="templatemo_main" style="width:  100%;">
    <p>     
<form method="POST">     
      <label for="psw"><b>Select a Question:</b></label>
      <select name="que">
        <?php
          $sql="select * from forget_pass";
          $res= mysql_query($sql) or die(mysql_error());
          while ($a=mysql_fetch_array($res)) {
            echo "<option value=$a[fpid]>$a[question]";
          }
        ?>
      </select><br>

      <label for="psw"><b>Your Answer:</b></label>
      <input type="text" placeholder="Enter Answer" autocomplete="off" required name="ans" ><br>


      <center><button type="submit" class="btn btn-info" name="submit" value="submit">Submit</button></center>
</form>
    </p>   
<div>  
</div>        
</div>
                
              <div class="cleaner"></div>
    </div> <!-- end of main -->
    <div id="templatemo_main_bottom"></div> <!-- end of main -->
    <div id="templatemo_footer_wrappe" >
  <div id="templatemo_footer" style="width: 920px">
      
        Copyright © 2017
        Designed by KaDiR sHaIkH.. 
    
    </div> <!-- end of footer wrapper -->
</div> <!-- end of footer -->

</body>
</html>