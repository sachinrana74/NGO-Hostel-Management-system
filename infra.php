<script type="text/javascript">
  function showcat1() {
    document.getElementById('main').style.display='none';
    document.getElementById('cat1').style.display='block';
    document.getElementById('cat2').style.display='none';
    document.getElementById('cat3').style.display='none';
    document.getElementById('cat4').style.display='none';
    document.getElementById('cat5').style.display='none';
    document.getElementById('cat6').style.display='none';
  }

    function showcat2() {
    document.getElementById('main').style.display='none';
    document.getElementById('cat2').style.display='block';
    document.getElementById('cat1').style.display='none';
    document.getElementById('cat3').style.display='none';
    document.getElementById('cat4').style.display='none';
    document.getElementById('cat5').style.display='none';
    document.getElementById('cat6').style.display='none';
  }

      function showcat3() {
    document.getElementById('main').style.display='none';
    document.getElementById('cat3').style.display='block';
    document.getElementById('cat2').style.display='none';
    document.getElementById('cat1').style.display='none';
    document.getElementById('cat4').style.display='none';
    document.getElementById('cat5').style.display='none';
    document.getElementById('cat6').style.display='none';
  }

     function showcat4() {
    document.getElementById('main').style.display='none';
    document.getElementById('cat4').style.display='block';
    document.getElementById('cat2').style.display='none';
    document.getElementById('cat3').style.display='none';
    document.getElementById('cat1').style.display='none';
    document.getElementById('cat5').style.display='none';
    document.getElementById('cat6').style.display='none';
  }

     function showcat5() {
    document.getElementById('main').style.display='none';
    document.getElementById('cat5').style.display='block';
    document.getElementById('cat2').style.display='none';
    document.getElementById('cat3').style.display='none';
    document.getElementById('cat4').style.display='none';
    document.getElementById('cat1').style.display='none';
    document.getElementById('cat6').style.display='none';
  }
     function showcat6() {
    document.getElementById('main').style.display='none';
    document.getElementById('cat6').style.display='block';
    document.getElementById('cat2').style.display='none';
    document.getElementById('cat3').style.display='none';
    document.getElementById('cat4').style.display='none';
    document.getElementById('cat5').style.display='none';
    document.getElementById('cat1').style.display='none';
  }

</script>
<style>
    table{
        border: 3px dot-dot-dash #3B3175;
    }

</style>

<?php
include("header.php");
?>
    <div class="abtback">
    <div id="templatemo_main" class="condiv">   <!--white div element-->

        <div >
            <h2 class="abthead"><b>Infrastructure</b></h2>

        </div>



        <table class="table" id="main">  <!--seprates the pictures-->
              <tr>

           	  <td><img src="images/cat1/1.jpg" width="300" height="300" onclick="showcat1()"></td>
              <td><img src="images/cat2/1.jpg" width="300" height="300" onclick="showcat2()"></td>
              <td><img src="images/cat3/1.jpg" width="300" height="300" onclick="showcat3()"></td>
            </tr>
            <tr>
              <td><img src="images/cat4/1.jpg" width="300" height="300" onclick="showcat4()"></td>
              <td><img src="images/cat5/1.jpg" width="300" height="300" onclick="showcat5()"></td>
              <td><img src="images/cat6/1.jpg" width="300" height="300" onclick="showcat6()"></td>
             </tr> 
              </table>

              <table id="cat1" class="table" style="display: none;">
                <tr>
              <td><img src="images/cat1/1.jpg" width="300" height="300"></td>
              <td><img src="images/cat1/2.jpg" width="300" height="300"></td>
              <td><img src="images/cat1/3.jpg" width="300" height="300"></td>
            </tr>
            <tr>
              <td><img src="images/cat1/4.jpg" width="300" height="300"></td>
              <td><img src="images/cat1/5.jpg" width="300" height="300"></td>
              <td><img src="images/cat1/6.jpg" width="300" height="300"></td>
            </tr>
              </table>

              <table id="cat2" class="table" style="display: none;">
                  <tr>
              <td><img src="images/cat2/1.jpg" width="300" height="300"></td>
              <td><img src="images/cat2/2.jpg" width="300" height="300"></td>
              <td><img src="images/cat2/3.jpg" width="300" height="300"></td>
            </tr>
            <tr>
              <td><img src="images/cat2/4.jpg" width="300" height="300"></td>
              <td><img src="images/cat2/5.jpg" width="300" height="300"></td>
              <td><img src="images/cat2/6.jpg" width="300" height="300"></td>
            </tr>
              </table>

              <table id="cat3" class="table" style="display: none;">
                  <tr>
              <td><img src="images/cat3/1.jpg" width="300" height="300"></td>
              <td><img src="images/cat3/2.jpg" width="300" height="300"></td>
              <td><img src="images/cat3/3.jpg" width="300" height="300"></td>
            </tr>
            <tr>
              <td><img src="images/cat3/4.png" width="300" height="300"></td>
              <td><img src="images/cat3/5.jpg" width="300" height="300"></td>
              <td><img src="images/cat3/6.jpg" width="300" height="300"></td>
            </tr>
              </table>

              <table id="cat4" class="table" style="display: none;">
                  <tr>
              <td><img src="images/cat4/1.jpg" width="300" height="300"></td>
              <td><img src="images/cat4/2.jpg" width="300" height="300"></td>
              <td><img src="images/cat4/3.jpg" width="300" height="300"></td>
            </tr>
            <tr>
              <td><img src="images/cat4/4.jpg" width="300" height="300"></td>
              <td><img src="images/cat4/5.jpg" width="300" height="300"></td>
              <td><img src="images/cat4/6.jpg" width="300" height="300"></td>
            </tr>
              </table>

              <table id="cat5" class="table" style="display: none;">
                  <tr>
              <td><img src="images/cat5/1.jpg" width="300" height="300"></td>
              <td><img src="images/cat5/2.jpg" width="300" height="300"></td>
              <td><img src="images/cat5/3.jpg" width="300" height="300"></td>
            </tr>
            <tr>
              <td><img src="images/cat5/4.jpg" width="300" height="300"></td>
              <td><img src="images/cat5/5.jpg" width="300" height="300"></td>
              <td><img src="images/cat5/6.jpg" width="300" height="300"></td>
            </tr>
              </table>

              <table id="cat6" class="table" style="display: none;">
                  <tr>
              <td><img src="images/cat6/1.jpg" width="300" height="300"></td>
              <td><img src="images/cat6/2.jpg" width="300" height="300"></td>
              <td><img src="images/cat6/3.jpg" width="300" height="300"></td>
            </tr>
            <tr>
              <td><img src="images/cat6/4.jpg" width="300" height="300"></td>
              <td><img src="images/cat6/5.jpg" width="300" height="300"></td>
              <td><img src="images/cat6/6.jpg" width="300" height="300"></td>
            </tr>
              </table>
			  

            </div>
    </div>
<?php
include("footer.php");
?>