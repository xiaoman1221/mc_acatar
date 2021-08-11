<?php
require_once "./libcurl.php";
function uuid_swap_name($uuid)
{
    $result = geturl("https://sessionserver.mojang.com/session/minecraft/profile/" . $uuid);
    return $result['name'];

}
