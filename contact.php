<?php
include("header.php");
include("databaseconnection.php");


if(isset($_REQUEST['submit']))
{
$author=$_REQUEST['author'];
$email=$_REQUEST['email'];
$phone=$_REQUEST['phone'];
$text=$_REQUEST['message'];

$d=mysql_query("select curdate()",$db)or die(mysql_error());
$date=mysql_fetch_array($d);

$sql="insert into contact (date,author,email,phone,text) values ('$date[0]','$author','$email','$phone','$text')";

$res=mysql_query($sql,$db)or die(mysql_error());

?>

<script>alert('Thank you for contact us');</script>
<!-- <meta http-equiv="refresh" content="0; url='contact.php'" > </head> -->
<?php
}  
?>
<div class="abtback">
<div class="condiv">
    <div id="">
        <h2 class="abthead"><b>Contact Us</b></h2>

    </div>

    <div  style="clear: both;width:810px;padding: 30px 0;background: #fff;">

        <div class="col_w900 col_w900_last">

            <div class="col_w420 float_l">
            <span class="contact100-form-title">
               Contact Form
            </span>
                <!--<h3>Contact Form</h3>-->

                <div   class="divstyle" id="cp_contact_form">

                    <form method="post" name="contact" action="#">

                        <label for="author"></label> <input  class="input100"   name="author" type="text" placeholder="Name" id="author" maxlength="60"   pattern="[A-Za-z]+" required />

                        <div class="cleaner_h10"></div>



                        <label for="email"></label> <input  class="input100"  name="email"  type="email"  placeholder="Email" id="email" maxlength="60" required/>
                        <div class="cleaner_h10"></div>

                        <label for="subject"></label> <input  class="input100"  name="phone" type="number" placeholder="Phone Number" id="phone"  max="9999999999" min="1000000000" required/>
                        <div class="cleaner_h10"></div>

                        <label for="text"></label> <textarea  class="input100"  id="message" name="message" placeholder="Message" rows="0" cols="0" class="required"   required  style=" font-size: 15px;,border: 1px solid #ccc;,border-radius: 4px; "></textarea>
                        <div class="cleaner_h10"></div>
                        <div class="but-float">
                            <input type="submit" class="but-s" class="submit_btn float_l" name="submit" id="submit" value="Send" />
                            <input type="reset"  class="but-r" class="submit_btn float_r" name="reset" id="reset" value="Reset" />
                        </div>
                    </form>

                </div>

            </div>

            <div class="mapouter">

                <h3 class="mapborder">Map</h3>

                <!--<<img src="images/map.jpg" style="width:400px; height:300px; border:0"> -->
                <div class="">
                    <div class="gmap_canvas">
                     <iframe width="350" height="250" id="gmap_canvas" src="https://maps.google.com/maps?q=narangi%20baug%20numd%20garden%20pune&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                        <!--<a href="https://www.jetzt-drucken-lassen.de">jetzt drucken lassen</a>-->
                    </div> <!-- Google Maps by<a href="https://www.embedgooglemap.net" rel="nofollow" target="_blank">Embedgooglemap.net</a>--></div>

                <br>
            </div>

                <div class="add">
                    <h3>Our Address</h3>
                    <h6>Hostel Name:- Bright Star Hostel</h6>
                    <p >
                    Hostel Address:- narangi baug 11 boat club road pune, <br>
                    Maharashtra 411001.
                    Email Id:-brightstar@gmail.com.
                    <br />
                    Tel: 020-060-4090<br />
                        Fax: 020-240-8675</p>
                </div>

            </div>
    </div>
            <div class="cleaner"></div>
		</div>
        
        <div class="cleaner"></div>
    </div> <!-- end of main -->
        
</div> <!-- end footer -->

<?php
include("footer.php");
?>