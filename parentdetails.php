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

$sqlquery = "SELECT * FROM parents WHERE stid='$_SESSION[stid]'";
$sqlqueryresult = mysql_query($sqlquery,$db);
$sqlfetch = mysql_fetch_array($sqlqueryresult);


$_SESSION["insid"] = rand();


    if(isset($_POST['button']))
    {         
         $n=trim($_POST['name']," ");
         $add=trim($_POST['add']," ");
         $cno=trim($_POST['cno']," ");
         $email=trim($_POST['email']," ");
         $acard=trim($_POST['acard']," ");
         if(mysql_num_rows($sqlqueryresult)>0) {
            $sql="update parents set name='$n',cno='$cno',address='$add',email='$email',acard='$acard' where stid='$_SESSION[stid]'";
        }
        else
        {

            $sql="INSERT INTO `parents`(`name`, `address`, `cno`, `email`, `acard`, `stid`) VALUES ('$n','$add','$cno','$email','$acard',$_SESSION[stid])";
        }
mysql_query($sql) or die(mysql_error());
     
    echo "<head><script>alert('Profile Updated Successfully....');</script></head>";
    echo "<meta http-equiv=refresh content=0; url='studentprofile.php'>";
    }
?>








    <div id="studiv">
        <div class="col_w900 col_w900_last">        
<div class="col_w580 float_l">            
            	<div class="">
                    <h2 align="center" class="h2dash"><b>Parent details</b></h2>
                  <p>

<form method="post" action="" name="form1" onsubmit="return validation()">
<input type="hidden" name="insid" value="<?php echo $_SESSION["insid"]; ?>" />
 <table class="table table-hover" width="407" border="0">


</td>
</tr>
<tr>
   <label for="email"> Name:<font color="#FF0000"><b>*</font></b></label>
   <input type="text"  name="name" value="<?php echo ucfirst($sqlfetch['name']); ?>" class="form-control" />
</tr>

<tr>               
    <label for="email">Address:<font color="#FF0000"><b>*</font></b></label>
    <input type="text"  name="add" value="<?php echo ucfirst($sqlfetch['address']); ?>" class="form-control" />
</tr>

<tr>               
    <label for="email">Contact No:<font color="#FF0000"><b>*</font></b></label>
    <input type="number"  name="cno" value="<?php echo ucfirst($sqlfetch['cno']); ?>" class="form-control" />
</tr>

<tr>               
    <label for="email">Email ID:<font color="#FF0000"><b>*</font></b></label>
    <input type="email"  name="email" value="<?php echo ucfirst($sqlfetch['email']); ?>" class="form-control" />
</tr>

<tr>               
    <label for="email">Adhar Card :<font color="#FF0000"><b>*</font></b></label>
    <input type="number"  name="acard" value="<?php echo ucfirst($sqlfetch['acard']); ?>" class="form-control" />
</tr>

<button align=center name="button" class="but-s">Update Profile</button>

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