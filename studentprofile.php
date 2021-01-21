<style>
    label{
        color: #1A2223;
        font-size: 17px;
        font-weight: bold;
    }
    </style>

<?php
include("header.php");
include("databaseconnection.php");

$sqlquery = "SELECT * FROM student WHERE stid='$_SESSION[stid]'";
$sqlqueryresult = mysql_query($sqlquery,$db);
$sqlfetch = mysql_fetch_array($sqlqueryresult);


$_SESSION["insid"] = rand();

$resultcourse = mysql_query("SELECT * FROM course where status = 'Enabled' ",$db);
$rscourse = mysql_fetch_array($resultcourse);

    if(isset($_POST['button']))
    {

         
         $n=trim($_POST['name']," ");
         $rn=trim($_POST['rn']," ");
         $dob=trim($_POST['dob']," ");
         
         
         $gen=trim($_POST['gen']," ");
         
         
         $bgrp=trim($_POST['bgrp']," ");
         $stat=trim($_POST['stat']," ");
        $course=trim($_POST['course']," ");
        
mysql_query("update student set name='$n',rollno='$rn',gender='$gen',dob='$dob',blood_group='$bgrp' where stid='$_SESSION[stid]'") or die(mysql_error());
     
    echo "<head><script>alert('Profile Updated Successfully....');</script></head>";
    echo "<meta http-equiv=refresh content=0; url='studentprofile.php'>";
    }
?>








    <div id="studiv">  <!--white div element -->
        <div class="col_w900 col_w900_last">   <!--place all the element in middle  -->        
<div class="col_w580 float_l">     <!--h2 font place  -->        
            	<div class="">   <!--h2 font -->
                    <h2 align="center" class="h2dash"><b>Student details</b></h2>
                  <p>

<form method="post" action="" name="form1" onsubmit="return validation()">
<input type="hidden" name="insid" value="<?php echo $_SESSION["insid"]; ?>" />
 <table class="table table-hover" width="407" border="0">


</td>
</tr>
<tr>               <label " for="email"> Name:<font color="#FF0000" ><b>*</font></b></label>
 <input type="text"  name="name" value="<?php echo ucfirst($sqlfetch['name']); ?>" class="form-control" />
    </tr>

<tr>               <label for="email">ROll NO:<font color="#FF0000"><b>*</font></b></label>
 <input type="text"  name="rn" value="<?php echo $sqlfetch['rollno']; ?>" class="form-control" />
    </tr>

<tr>               <label for="email">Date Of Birth:<font color="#FF0000"><b>*</font></b></label>
 <input type="text"  name="dob" value="<?php echo ucfirst($sqlfetch['dob']); ?>" class="form-control" />
    </tr>



<tr>               <label for="email">Gender:<font color="#FF0000"><b>*</font></b></label>
 <input type="text"  name="gen" value="<?php echo ucfirst($sqlfetch['gender']); ?>" class="form-control" />
    </tr>


<tr>               <label for="email">Blood Group:<font color="#FF0000"><b>*</font></b></label>
 <input type="text"  name="bgrp" value="<?php echo ucfirst($sqlfetch['blood_group']); ?>" class="form-control" />
    </tr>
<tr>               <label for="email">Status:<font color="#FF0000"><b>*</font></b></label>
 <input type="text"  name="stat" value="<?php echo ucfirst($sqlfetch['status']); ?>" class="form-control" />
    </tr>

<tr>               <label for="email">Course:<font color="#FF0000"><b>*</font></b></label>
 <input type="text"  name="course" value="<?php echo $rscourse['course_name']; ?>" class="form-control" />
    </tr>
<br>

<button align=center name="button" class="but-s">Update Profile</button>   <!--button css-->

</table>
</form>
</p>

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