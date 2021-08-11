<?php
require_once "./libcurl.php";
require_once "./uuid_swap_name.php";

// uuid获取玩家名
function pull_skin_url($uuid)
{
    $result = geturl("https://sessionserver.mojang.com/session/minecraft/profile/" . $uuid);
    return json_decode(base64_decode($result['properties'][0]['value']), true)['textures']['SKIN']['url'];
    // 这样我们能直接获得图片url
}

function pull_img($imgurl, $name)
{
    $result = geturl_binary($imgurl);
    file_put_contents("./" . $name . ".png", $result);

}
