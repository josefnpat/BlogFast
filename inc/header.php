<?php
$start_time = microtime(1);
require("inc/blog.php");
require("inc/template.php");
$blog = new blog("db.php");

$blog_link = dirname("http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']);

?><!DOCTYPE html>
<html>
  <head>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link href='http://fonts.googleapis.com/css?family=Ubuntu|Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/sh_main.min.js"></script>
<?php
  $scripts = glob("js/lang/sh_*.js");
  foreach($scripts as $script){
    echo "    <script type=\"text/javascript\" src=\"".$script."\"></script>\n";
  }
?>
    <link type="text/css" rel="stylesheet" href="css/sh_darkness.min.css">
    <title><?php echo $blog->getName(); ?></title>
  </head>
  <body onload="sh_highlightDocument();">
    <div class="header">
      <div class="title"><a href="<?php echo $blog_link; ?>"><?php echo $blog->getName(); ?></a></div>
      <div class="tagline"><?php echo $blog->getTagline();?></div>
      <div class="links"><a href="rss.php"><img src="images/rss.png" /></a></div>
    </div>