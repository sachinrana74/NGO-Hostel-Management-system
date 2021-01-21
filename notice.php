<?php
include("header.php");
include("databaseconnection.php");
?>

<?php
if(isset($_GET["submit"])){
    mysql_query("INSERT INTO `notice`(`notice`) VALUES ('$_GET[notice]')",$db);
    echo "<script>alert('Notice Uploded...');</script>";
}
?>
<div id="studiv">

        <div class="col_w900 col_w900_last">
            <form>
                <h2 class="h2dash"><b>Add Notice</b></h2>
            <textarea name="notice" rows="5" cols="5" style="width: 800px"></textarea>
                <br>
            <button name="submit" value="submit" class="but-s">Submit</button>
            </form>
        </div>
</div>
</div>
<?php
include("footer.php");
?>