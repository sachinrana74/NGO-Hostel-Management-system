<?php
include("header.php");
?>

   
   <!-- <div id="templatemo_middl" style="padding: 0px">        nothing at the most
    <img src="images/hostel_logo.jpg" style="float: right;margin-bottom: 20px">       logo photo
    	<div id="intro">  header of rosarian ..
        	<h2 class="font" style="font-size: 50px">Rosarians Hostel</h2>
        </div>  -->
<div>

        <p ><?php include("example.php"); ?></p>
</div>
<div  style="background: white;opacity: 0.9%;width:100%;height: 100px; text-align: center; margin: auto; padding-top: 20px; padding-bottom:20px ;font-size: 20px;" >

        <marquee direction="up"  style="text-align: center; background: #3d5b91">
            <?php
                include "databaseconnection.php";
                $r=mysql_query("select * from notice");
                while ($a=mysql_fetch_array($r)){
                    echo "<div class=\"noticemarque\" style=\" padding: 5px 5px 5px 5px ; background: #3B3175;text-align: center; \">
                                <strong><a href=\"#\" class=\"alert-link\">$a[notice]</a></strong>.
                            </div>";
                }
            ?>
        </marquee>

</div>
  <!--  <div id="templatemo_main">    make the down white bar big



    </div> < end of main

</div> end of wrapper -->




<div class="foot" style="width: 1389px">      <!--nothing  -->
	<div class="infoot">        <!--footer id="templatemo_footer" -->
    	<div class="ininfoot">
        Copyright © 2019
        Designed by Sachin Rana.. 
    
    </div> <!-- end of footer wrapper -->
</div> <!-- end of footer -->

</body>
</html></div>