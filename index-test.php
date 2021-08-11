<?php
    include("./database_config.php");
    include("./libcurl.php");
    $mysql = mysqli_connect($hostname, $username, $password);
if (!$mysql) {
  die('Could not connect: ' . mysqli_error());
} else {
  echo '<h1>数据库链接成功</h1>';
}









?>