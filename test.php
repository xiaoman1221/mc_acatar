<?php
require_once "./avatar.class.php";

// parameters: Minecraft username (case sensitive!), size
$avatar = new Avatar("xiaoman1221", 64, "./skins/xiaoman1221.png");
$avatar->show();
// echo $acatar;
