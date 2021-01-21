<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Sign-Up/Login Form</title>
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
      <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="new/style.css">
      <script type="text/javascript">
  function mycheck()
  {
    var cpass = document.forms["form1"]["cpwd"].value;
    var pass = document.forms["form1"]["pwd"].value;    
    if(pass!=cpass)
    {
      alert("Password and Conform Password is not Matching...");      
      return false;     
    }
    else  
      return true;
  }
</script>

    <!-- -------------------------------------------------------------------------------------------- -->

<style>

    .bodyyy{
        -webkit-animation: bodyyy 2s linear infinite alternate both;
        animation: bodyyy 2s linear infinite alternate both;
    }

    @-webkit-keyframes bodyyy {
        0% {
            background: #0aea77;
        }
        100% {
            background: #5f25ff;
        }
    }
    @keyframes bodyyy {
        0% {
            background: #0aea77;
        }
        100% {
            background: #5f25ff;
        }
    }






</style



    <!-- -------------------------------------------------------------------------------------------- -->

</head>
<?php

/*if(isset($_SESSION["logid"]))
  header("Location: profile.php");
include("../mysql.php");
*/

session_start();
include("../databaseconnection.php");
if(isset($_POST["button2"]))
{
  $sqlquery = mysql_query("SELECT * FROM student WHERE email='$_POST[uname]' and password='$_POST[password]' and status='Enabled'");
  if($rs =mysql_fetch_array($sqlquery))
  {

    $_SESSION["visitorid"] = $rs["email"] ;
    $_SESSION["stid"] = $rs["stid"] ; 
    //echo $_SESSION["visitorid"]."<br>$_SESSION[stid]";
    echo "<head><script>alert('Logged in successfully...');</script></head>";
//    echo "<meta http-equiv=refresh content=2; url='../visitorpanel.php'>";
    header("Location:../visitorpanel.php");
  }
  else
  {
    echo "<head><script>alert('Login Failed...');</script></head>";  
  }
}

if(isset($_POST["button1"])) {
  if($_POST["uname"]=="warden@gmail.com" and $_POST["password"]=="warden123")
  {
    $_SESSION["emp_id"] = $_POST["uname"];
    echo "<head><script>alert('Logged in successfully...');</script></head>";  
    echo "<meta http-equiv=refresh content=2; url='../dashboard.php'>";
    header("Location:../dashboard.php");
  }
  else
       echo "<head><script>alert('Login Failed...');</script></head>";
}


if(isset($_POST["button4"])) {
    if($_POST["uname"]=="trustee@gmail.com" and $_POST["password"]=="trustee123")
    {
        $_SESSION["trst_id"] = $_POST["uname"];
        echo "<head><script>alert('Logged in successfully...');</script></head>";
        echo "<meta http-equiv=refresh content=2; url='../Trusty_dashboard.php'>";
        header("Location:../Trusty_dashboard.php");
    }
    else
        echo "<head><script>alert('Login Failed...');</script></head>";
}





if(isset($_POST["button3"]))
{
  $flag=0;
$rn=$_POST['rno'];
$res=mysql_query("select * from registered_stud");
while ($a=mysql_fetch_array($res)) {
 if($a["rno"]==$rn && $a["status"]==0)
  {
    $flag=1;
    break;
  }
}
if($flag==1)
{
  $n=$_POST['fname'];
  $dob=$_POST['dat'];
  $gen=$_POST['gen'];
  $add=$_POST['add'];
  $cont=$_POST['cont'];  
  $bgrp=$_POST['bgrp'];
  $course=$_POST['course'];
  $email=$_POST['email'];
  $pass=$_POST['pass'];
  $city=$_POST['city'];
  $state=$_POST['state'];
  $country=$_POST['country'];
  $nat=$_POST['nat'];

  $sql="insert into student(courseid,name,rollno,dob,gender,address,city,state, country, nat,contact_no,blood_group,status,email,password, `qid`, `ans`) values($course,'$n',$rn,'$dob','$gen','$add','$city','$state','$country','$nat',$cont,'$bgrp','disable','$email','$pass','$_POST[que]','$_POST[ans]')";
//  echo "$sql";
   mysql_query($sql) or die("<head> <script> alert('Unable to register...'); </script></head>");

      echo "<head><script>alert('Registered  successfully...');</script></head>";  
      mysql_query("update registered_stud set status=1 where rno=$rn") or die(mysql_error());
      echo "<meta http-equiv=refresh content=2; url='../visitorpanel.php'>";
}
else
  echo "<head><script>alert('User already Registered or Not of College...');</script></head>";  
}

?>
<body class="bodyyy">
  <div class="form">
      
      <ul class="tab-group">
        
        <li class="tab active"><a href="#login">Log In</a></li>
        <li class="tab "><a href="#signup">Sign Up</a></li>
      </ul>

      <div class="tab-content">


<div id="login">   
          <h1>Welcome Back! </h1>
          
          <form action="" method="post">
          
            <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input name="uname" type="email"required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input name="password" type="password"required autocomplete="off"/><br>
          <a href="../forget_pass.php">Forgot Password?</a>
        </div>

          
          <button type="submit" name="button2" class="button button-block"/>Student Log In</button>
          <br>
          <button type="submit" name="button1" class="button button-block"/>Warden Log In</button>
            <br>
          <button type="submit" name="button4" class="button button-block"/>Trustee Log In</button>

          </form>

        </div>


        <div id="signup">   
          <h1>Sign Up for Free</h1>
          
          <form action="" method="post">
          
          
            <div class="field-wrap">
 

              <label>
                 Name<span class="req">*</span>
              </label>
              <input name="fname" type="text" required autocomplete="off" />
            </div>
        
          

<div class="field-wrap">
            <label>
              Roll No:<span class="req">*</span>
              </label>
            <input type="number" name="rno" required autocomplete="off"/>
          </div>
           
          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input name="email" type="email"required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Set A Password<span class="req">*</span>
            </label>
            <input name="pass" type="password"required autocomplete="off"/>
          </div>


           <div class="field-wrap">
            <label>
              Confirm Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off"/>
          </div>

          <div class="field-wrap">
            <label>
              Address<span class="req">*</span>
            </label>
            <input type="textarea" name="add" required autocomplete="off"/>
          </div>

          <div class="field-wrap">
            <label>
              City<span class="req">*</span>
            </label>
            <input type="text" name="city" required autocomplete="off"/>
          </div>

          <div class="field-wrap">
            <label>
              State<span class="req">*</span>
            </label>
            <input type="text" name="state" required autocomplete="off"/>
          </div>

          <div class="field-wrap">
            <label>
              Country<span class="req">*</span>
            </label>
            <input type="text" name="country" required autocomplete="off"/>
          </div>

          <div class="field-wrap">
            <label>
              Nationality<span class="req">*</span>
            </label>
            <input type="text" name="nat" required autocomplete="off"/>
          </div>

          <div class="field-wrap">
            <label>
              Contact No<span class="req">*</span>
            </label>
            <input type="number" name="cont" required autocomplete="off"/>
          </div>
          <div class="field-wrap">
            <label>
              Blood Group<span class="req">*</span>
            </label>
            <input type="text" name="bgrp" required autocomplete="off"/>
          </div>

              <span class="req"><p style="color: white">DOB*</p></span>            
           <div class="field-wrap">
            <input name="dat" type="date"required autocomplete="off"/>
          </div>

       <span class="req"><p style="color: white">Course*&nbsp;&nbsp;&nbsp; <select name="course" style="width: 400px; height: 35px; ">            
<?php
            $sql=mysql_query("select * from course");
            while($r=mysql_fetch_array($sql))
        echo "<option value=$r[course_id]>$r[course_name]</option>";


?>
  </select>
  </p> </span><br>


        <span class="req"><p style="color: white">Gender*<br><br>
                <select  name="gen" >
                    <option>Male</option>
                    <option>Female</option>
                    <option>Other</option>
                </select>
                  </p> </span>
                <span class="req"><p style="color: white">Select a Question*<br><br>

      <select name="que" style="width: 400px; height: 35px; ">
        <?php
          $sql="select * from forget_pass";
          $res= mysql_query($sql) or die(mysql_error());
          while ($a=mysql_fetch_array($res)) {
            echo "<option value=$a[fpid]>$a[question]";
          }

        ?>
      </select><br><br>

      <label for="psw"><b>Your Answer</b></label>
      <input type="text" placeholder="Enter Answer" required name="ans" ><br>

          <button type="submit" name="button3" class="button button-block"/>Get Started</p>
          
          </form>

        </div>
        
        
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>


  <script src="new/index.js"></script>


  <!-- -------------------------------------------------------------------------------------------- -->




  <!-- -------------------------------------------------------------------------------------------- -->

</body>
</html>
