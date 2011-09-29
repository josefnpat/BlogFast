<?php
$blog = unserialize(file_get_contents("data.php"));
$rss_link = "http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
$blog_link = dirname($rss_link);
include("FeedWriter.php");
$TestFeed = new FeedWriter(RSS2);
$TestFeed->setTitle($blog->name);
$TestFeed->setLink($blog_link);
$TestFeed->setDescription($blog->tagline);
$TestFeed->setImage($blog->name,$blog->tagline,"$blog_link/images/favicon.ico");
asort($blog->posts);
foreach($blog->posts as $time => $post){
	$newItem = $TestFeed->createNewItem();
	$newItem->setTitle($post->title);
	$newItem->setLink("$blog_link?timestamp=$time");
	$newItem->setDate($time);
	$newItem->setDescription($post->body);
	$TestFeed->addItem($newItem);
}
$TestFeed->genarateFeed();

//print_r($_SERVER);
?>
