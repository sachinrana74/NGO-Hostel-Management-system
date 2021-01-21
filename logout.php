<?php
session_start();  // Developed by www.freestudentprojects.com
session_destroy();
header("Location: index.php");
?>