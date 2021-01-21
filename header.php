<?php
session_start();
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Hostel Management System</title>

<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>
<link rel="stylesheet" href="templatemo_style.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="newstyle.css" type="text/css" media="screen" /
<link rel="stylesheet" href="log/css/bootstrap.css" type="text/css" media="screen" />

<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="script/jquery.nivo.slider.js" type="text/javascript"></script>

<script type="text/javascript">
$(window).load(function() {
	$('#slider').nivoSlider({
		effect:'random',
		slices:10,
		animSpeed:800,
		pauseTime:1600,
		startSlide:1, //Set starting Slide (0 index)
		directionNav:false,
		directionNavHide:false, //Only show on hover
		controlNav:false, //1,2,3...
		controlNavThumbs:false, //Use thumbnails for Control Nav
		pauseOnHover:true, //Stop animation while hovering
		manualAdvance:false, //Force manual transitions
		captionOpacity:0.6, //Universal caption opacity
		beforeChange: function(){},
		afterChange: function(){},
		slideshowEnd: function(){} //Triggers after all slides have been shown
	});
});
</script>

    <style type="text/css">
        #wrap	{
            display:inline-flex;
            width: 960px;
            height: 50px;
            margin: 0;
            padding-left: 245px;
            z-index: 99;
            position: relative;

        }

        .navbar		{

            height: 50px;
            padding: 0;
            padding-left: 5px;
            padding-right: 5px;
            padding-bottom: 5px;
            padding-top: 5px;
            margin: 0;
            position: absolute;
            border-right:0px solid #54879d;
        }

        .navbar li 	{
            height: auto;
            width: 120px;
            float: left;
            text-align: center;
            list-style: none;
            font: normal bold 12px/1.2em Arial, Verdana, Helvetica;
            padding: 0;
            margin: 0;
            background-color: #261345;
        }

        .navbar a	{
            padding: 18px 0;
            font-size: 12px;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            border-left: 5px solid #6a43ff;
            border-right: 3px solid #5f25ff;
            text-decoration: none;
            color: white;
            display: block;
        }

        .navbar li:hover, a:hover	{

            background-color: #5f25ff;
            color: black;
        }

        .navbar li ul 	{
            display: none;
            height: auto;
            margin: 0;
            padding: 0;

        }

        .navbar li:hover ul {
            display: block;
        }

        .navbar li ul li	{
            background-color: #261345;
        }

        .navbar li ul li a 	{
            border-left: 1px solid #1f5065;
            border-right: 1px solid #1f5065;
            border-top: 1px solid #74a3b7;
            border-bottom: 1px solid #6a43ff;
        }

        .navbar li ul li a:hover	{
            background-color: #5f25ff;
            color: black;
        }



    </style>
</head>



<body class="back" >     <!--  class="homepage"   background of the project--->


<!---------------------------------------------------------------------------------->
<div class="container" style="background-color: #002244 ">
    <div class="top-band">
        <marquee> <p class="quote"><span class="blinking">Let's built a great mind !!! &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp   Let's built a great mind !!!  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Let's built a great mind !!! &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp   Let's built a great mind !!! &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  Let's built a great mind !!! &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp   Let's built a great mind !!! </span></p> </marquee>
        <div class="position">
        <ul class="social-icons">
            <li><a href="" class="social-icon"> <i class="fa fa-facebook"></i></a></li>
            <li><a href="" class="social-icon"> <i class="fa fa-twitter"></i></a></li>
            <li><a href="" class="social-icon"> <i class="fa fa-youtube"></i></a></li>
            <li><a href="" class="social-icon"> <i class="fa fa-linkedin"></i></a></li>
            <li><a href="" class="social-icon"> <i class="fa fa-google-plus"></i></a></li>
        </ul>
        </div>
    </div>

            <div class="logo" style="padding-bottom: 20px ;">
             <!--   <img src="images/logo55.png" > -->
                <div  style="padding-left: 50px;padding-top: 30px; font-size: 45px;font-family: Cookie;"><h1  class="h1" style="font-size: 60px;color: #FFFFFF; text-decoration: underline;"><b>BrightStar</b></h1><span class="h1span"  style="color: #FFFFFF;font-size: 25px; text-decoration:none ;padding-left: 20px"> lets build a great mind</span> </div>

            </div>
        </div>
</div>
 <!---------------------------------------------------------------------------------->

<br>



<!--
<div id="templatemo_wrapper">        <put it in the center-

      <div id="site_title">   <h1> <a href="index.php"> Hostel Management System</a> </h1></div>     logo design
        <div class="cleaner"></div>      nothing
    </div>
 -->


<div class="center"  style= "text-align: center ">

       <div id="wrap">                                  <!--extra area of navigation buttons --->
		  <ul class="navbar" style="width: 850px">  <!-- navigation buttons --->

<?php
if(isset($_SESSION["visitorid"]))
{
?>	
			 <li><a href="visitorpanel.php">Home</a></li>      
			 <li><a href="#">Profile</a>
				<ul>
				   <li><a href="studentprofile.php">Student profile</a></li>
				   <li><a href="visitorchpassword.php">Change Password</a></li>
				   <li><a href="parentdetails.php">Parents Details</a></li>
				</ul>         
			 </li>

			 <li><a href="#">Request</a>
				<ul>
				   <li><a href="changeroom.php">Room Change</a></li>
				   <li><a href="visitor_req.php">Vistor Request</a></li>
				   <li><a href="services.php">Services</a></li>
                   <li><a href="feedback.php">Feedback</a></li>
                   <li><a href="leave.php">Leave Application</a></li>
				   
				</ul>         
			 </li>
			 		<li><a href="#">Fees</a>
				<ul>
				   <li><a href="visitorviewfees.php">View Fees</a></li>
				   
				</ul>         
			 </li>
             <li><a href="visitorviewfeetype.php">Rooms</a></li>
             <li><a href="logout.php">Logout</a></li>            
<?php
}
else if(isset($_SESSION["emp_id"]))
{
?>
<li><a href="dashboard.php">Home</a></li>           
			 <!--<li><a href="#">Profile</a>
				<ul>
				   <li><a href="employee.php?editid=<?php echo $_SESSION['emp_id'] ; ?>">Edit profile</a></li>
				   <li><a href="changepassword.php">Change Password</a></li>
				</ul>         
			 </li>-->
			 <li><a href="">Rooms</a>
				<ul>
				   <!-- <li><a href="rooms.php">Add rooms</a></li>
				   <li><a href="viewrooms.php">View rooms</a></li>				  -->
                   <li><a href="roomallotment.php">Allot rooms</a></li>			
                    <li><a href="viewroomallot.php">View room allotment</a></li>				   
				</ul>         
			 </li>
             <li><a href="">Students</a>
				<ul>
				   <li><a href="viewstudent.php">View students</a></li>
                   <li><a href="viewregistration.php">View Registration</a></li>
                   <li><a href="requests.php">Requests</a></li>
                    <li><a href="veiw_feedback.php">Feedback/Leave</a></li>
				</ul>         
			 </li>
    <li><a href="">Reports</a>
        <ul>
            <li><a href="viewfees.php">View fees</a></li>
            <!--<li><a href="viewmessbill.php">View Messbill</a></li>
               <li><a href="viewbilling.php">View Billing</a></li>-->
        </ul>
    </li>
    <li><a href="">Notice</a>
        <ul>
            <li><a href="notice.php">Add Notice</a></li>


        </ul>
    </li>

<!--             <li><a href="#">Settings</a>
				<ul>
				   <li><a href="employee.php">Add Employee</a></li>
				   <li><a href="viewemployee.php">View Employee</a></li>
                   <li><a href="course.php">Add course</a></li>
				   <li><a href="viewcourse.php">View course</a></li>
                   <li><a href="block.php">Add blocks</a></li>
				   <li><a href="viewblocks.php">View blocks</a></li>
                   <li><a href="feetype.php">Add Fees type</a></li>
                   <li><a href="viewfeetype.php">View Fees type</a></li>
                   			
				</ul>-->         
				<li><a href="logout.php">Logout</a></li>
			 </li>

<?php
}
else if(isset($_SESSION["trst_id"]))
{
?>
<li><a href="dashboard.php">Home</a></li>           
			 <li><a href="">Rooms</a>
				<ul>
				   <li><a href="rooms.php">Add rooms</a></li>
				   <li><a href="viewrooms.php">View rooms</a></li>				        
				   <li><a href="change_rate.php">Chnage rooms rent</a></li>

				</ul>

			 </li>
    <li>
    <li><a href="">Reports</a>
        <ul>
            <li><a href="viewfees.php">View fees</a></li>
            <!--<li><a href="viewmessbill.php">View Messbill</a></li>
               <li><a href="viewbilling.php">View Billing</a></li>-->
        </ul>
    </li>
    </li>
				<li><a href="logout.php">Logout</a></li>
			 </li>

<?php
}
else
{
?>
			 <li><a href="index.php">Home</a></li>           
             <li><a href="about.php">About Us</a></li>
             <li><a href="contact.php">Contact Us</a></li>
             <li><a href="infra.php">Infrastructure</a></li>
			 <li><a href="rules_regulation.php">Rules & Regulation</a></li>
             <li><a href="log/index.php">Login</a></li>
<?php
}
?>

		  </ul>
		 </div>

</div>
<br>
</body>
    <!-- end of templatemo_menu -->