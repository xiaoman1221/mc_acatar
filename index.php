<?php

echo '<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8" />
    <title>数据库链接测试</title>
    <link id="favicon" rel="shortcut icon" href="//common.cnblogs.com/favicon.svg" type="image/svg+xml" />
    <script>./upload.js</script>
    </head>
    ';
include("./database_config.php");
// include("./image_base64.php");
//引入文件
$mysql = mysqli_connect($hostname, $username, $password);
if (!$mysql) {
  die('Could not connect: ' . mysql_error());
} else echo '<h1>数据库链接成功</h1>';
//链接数据库
mysqli_select_db($mysql, $database);
// //选择数据库
// $sql = "CREATE TABLE mc_avatar 
// (
// uuid varchar(36),
// name varchar(100),
// skin ,
// avatar (48323),
// time int
// )";
// mysqli_query($mysql,$sql);
mysqli_close($mysql);
//img转base64
echo '<input type="file" id="imagesfile">';


function base64imgsave($img)
{
  //文件夹日期
  $ymd = date("Ymd");
  //图片路径地址  
  $basedir = 'upload/base64/' . $ymd . '';
  $fullpath = $basedir;
  if (!is_dir($fullpath)) {
    mkdir($fullpath, 0777, true);
  }
  $types = empty($types) ? array('jpg', 'gif', 'png', 'jpeg') : $types;
  $img = str_replace(array('_', '-'), array('/', '+'), $img);
  $b64img = substr($img, 0, 100);
  if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $b64img, $matches)) {
    $type = $matches[2];
    if (!in_array($type, $types)) {
      return array('status' => 1, 'info' => '图片格式不正确，只支持 jpg、gif、png、jpeg哦！', 'url' => '');
    }
    $img = str_replace($matches[1], '', $img);
    $img = base64_decode($img);
    $photo = '/' . md5(date('YmdHis') . rand(1000, 9999)) . '.' . $type;
    file_put_contents($fullpath . $photo, $img);
    $ary['status'] = 1;
    $ary['info'] = '保存图片成功';
    $ary['url'] = $basedir . $photo;
    return $ary;
  }
  $ary['status'] = 0;
  $ary['info'] = '请选择要上传的图片';
  return $ary;
}