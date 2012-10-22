<?php
require("inc/blog.php");
$blog = new blog("db.php");
$rss_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
$blog_link = dirname($rss_link);
include("inc/libs/FeedWriter.php");
$TestFeed = new FeedWriter(RSS2);
$TestFeed->setTitle($blog->getName());
$TestFeed->setLink($blog_link);
$TestFeed->setDescription($blog->getTagline());
$TestFeed->setImage($blog->getName(),$blog->getTagline(),"$blog_link/images/favicon.ico");
foreach($blog->getPosts() as $post){
  if($post->getTime() <= time() and $post->getTime() != 0){
	  $newItem = $TestFeed->createNewItem();
	  $newItem->setTitle($post->getTitle());
	  $newItem->setLink("$blog_link?post=".$post->getTime());
	  $newItem->setDate($post->getTime());
	  $newItem->setDescription($post->getBody());
	  $TestFeed->addItem($newItem);
  }
}
$TestFeed->genarateFeed();