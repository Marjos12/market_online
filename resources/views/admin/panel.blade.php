<?php
session_start();
//check the session status
 if(!isset($_SESSION['admin'])){
  header('location:../login/index.blade.php');
 }
?>
<html>
<header>
    <title>
        Admin Panel
    </title>
</header>
<body>
<div class="header">
    <!-- upper link div design !-->
    <div class="icon">
        <span>Hello</span>
    </div>

    <div class="links">
        <a href="logout">Logout</a>
    </div>
</div>
<div class="sidebar">
    <div class="Links">
        <ul class="side_link">
            <li class="ad_link"><a href="Supermarket">Supermarket</a></li>
        </ul>
    </div>
</div>
</div>
</body>
</html>