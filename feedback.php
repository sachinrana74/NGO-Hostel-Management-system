<?php
include("header.php");
include("databaseconnection.php");
?>
<?php
if(isset($_POST["submit"]))
{
    $sql="insert into feedback(feedback,stid) values('$_POST[feedback]',$_SESSION[stid])";
    mysql_query($sql,$db) or die('ERROR:'. mysql_error());
    echo "<head><script>alert('Feedback Sent  Successfully....');</script></head>";
}
?>
    <center>    <div id="studiv">
            <div class="col_w900 col_w900_last">
                <div class="col_w580 float_l">
                    <div class="">
                        <h2 class="h2dash"><b>Please Provide your valueable <br><br>
                                feebdack...</b></h2>
                            <form method="post">
                                <textarea name="feedback" required rows="5" cols="5" style="width: 800px"></textarea>
                                <button class="but-s" name="submit">Submit</button>
                            </form>

                        <table border="=1" class="tftable" style="width: 800px" >
                            <tr><th>Your Feedback</th>
                                <th>Admin's Responce</th></tr>

                            <?php
                            $sql=mysql_query("select * from feedback where stid=$_SESSION[stid]");
                            while($r=mysql_fetch_array($sql))
                                echo "<tr><td>$r[feedback]</td><td>$r[responce]</td></tr>";
                            ?>
                        </table>
                        <div class="cleaner"></div>
                    </div>
                </div>
                <div class="col_w280 float_r">

                </div>
                <div class="cleaner"></div>
            </div>

            <div class="cleaner"></div>

        </div>
        </div> <!-- end of wrapper -->

    </center>
<?php
include("footer.php");
?>