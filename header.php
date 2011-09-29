<?php
$start_time = microtime(1);
$blog = unserialize(file_get_contents('data.php'));
$blog_link = dirname("http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']);
function echo_post($post,$time=NULL){
  echo "    <div class=\"post\">\n";
  echo "      <div class=\"title\"><a href=\"?timestamp=$time\">".$post->title."</a></div>\n";
  echo "      <div class=\"body\">".$post->body."</div>\n";
  if($time){
    echo "      <div class=\"timestamp\">".date(DATE_RFC822,$time)."</div>\n";
  }
  echo "    </div>\n";
}
?><!DOCTYPE html>
<html>
  <head>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" /> 
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="sh_main.min.js"></script>
    <script type="text/javascript" src="lang/sh_php.min.js"></script>
    <link type="text/css" rel="stylesheet" href="css/sh_darkness.min.css">
    <title><?=$blog->name?></title>
  </head>
  <body onload="sh_highlightDocument();">
    <div class="header">
      <div class="title"><a href="<?=$blog_link?>"><?=$blog->name?></a></div>
      <div class="tagline"><?=$blog->tagline?></div>
      <div class="links"><a href="rss.php"><img src="images/rss.png" /></a></div>
    </div>
