<?php
session_start();
?>


<div class="wrapper col5">
  <div id="footer">

    <div id="copyright">
      <p class="fl_left">Copyright &copy; 2019 - All Rights Reserved |
       <!-- <a href="adminlogin.php">Admin Login Panel</a>  -->
       <?php
       if(count($_SESSION)==0){

       ?>
       | <a href="doctorlogin.php">Doctor Login Panel</a></p>
       <?php }
       ?>
      <p class="fl_right">Developed by Patan College</p>
      <br class="clear" />
    </div>
    <div class="clear"></div>
  </div>
</div>
</body>
</html>